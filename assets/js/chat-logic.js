// assets/js/chat-logic.js
import * as ChatKitModule from 'https://cdn.jsdelivr.net/gh/jakins177/Chat1@latest/dist/chatkit.bundle.es.js';

function resolveChatKitInitializer(module) {
  if (!module) {
    throw new Error('ChatKit module failed to load.');
  }

  const candidates = [
    module.initializeChatKit,
    module.createChatKit,
    module.createChat,
    module.default,
  ];

  const initializer = candidates.find((candidate) => typeof candidate === 'function');

  if (!initializer) {
    throw new Error('Unable to find a ChatKit initializer in the loaded module.');
  }

  return initializer;
}

export function initializeChatKit(config) {
  const initialize = resolveChatKitInitializer(ChatKitModule);

  const chatOptions = {
    webhookUrl: config.webhookUrl,
    initialMessages: config.initialMessages,
    i18n: config.i18n,
    target: config.target,
    mode: config.mode,
    autoOpen: config.autoOpen,
    hideToggle: config.hideToggle,
  };

  if (config.theme) {
    chatOptions.theme = config.theme;
  }

  if (config.headers) {
    chatOptions.headers = config.headers;
  }

  const chatInstance = initialize(chatOptions);

let chatKitScriptPromise = null;

function loadChatKitScript(bundleUrl = DEFAULT_CHATKIT_BUNDLE_URL) {
  if (typeof document === 'undefined') {
    return Promise.reject(
      new Error('ChatKit can only be initialized in a browser environment.'),
    );
  }

  if (window.customElements?.get('openai-chatkit')) {
    return Promise.resolve();
  }

  if (!chatKitScriptPromise) {
    chatKitScriptPromise = new Promise((resolve, reject) => {
      const script = document.createElement('script');
      script.src = bundleUrl || DEFAULT_CHATKIT_BUNDLE_URL;
      script.async = true;
      script.onload = () => resolve();
      script.onerror = () =>
        reject(new Error(`Failed to load ChatKit bundle from ${script.src}`));
      document.head.appendChild(script);
    });
  }

  return chatKitScriptPromise;
}

function getTargetElement(target) {
  if (!target) return document.body;
  if (typeof target === 'string') {
    return document.querySelector(target);
  }

  return chatInstance;
}

function buildChatKitOptions(config) {
  const options = { ...(config?.chatkitOptions || {}) };

  if (!options.api) {
    if (config?.chatkitApi) {
      options.api = config.chatkitApi;
    } else if (config?.webhookUrl) {
      options.api = {
        url: config.webhookUrl,
        domainKey:
          config.chatkitDomainKey ||
          (typeof window !== 'undefined' ? window.location.hostname : ''),
      };
    }
  }

  const locale = config?.i18n?.locale || config?.i18n?.defaultLocale;
  if (locale) {
    options.locale = locale;
  }

  const title = config?.i18n?.en?.title || config?.i18n?.title;
  const subtitle = config?.i18n?.en?.subtitle || config?.i18n?.subtitle;
  if (title || subtitle) {
    options.header = {
      enabled: true,
      ...(options.header || {}),
      title: {
        ...(options.header?.title || {}),
        text: title || options.header?.title?.text,
      },
    };
    if (subtitle) {
      options.startScreen = {
        ...(options.startScreen || {}),
        greeting: subtitle,
      };
    }
  }

  if (Array.isArray(config?.initialMessages) && config.initialMessages.length) {
    const [greeting, ...prompts] = config.initialMessages;
    options.startScreen = {
      ...(options.startScreen || {}),
      greeting: options.startScreen?.greeting || greeting,
    };
    if (prompts.length) {
      options.startScreen.prompts =
        options.startScreen?.prompts ||
        prompts.map((message, index) => ({
          label: `Suggestion ${index + 1}`,
          prompt: message,
        }));
    }
  }

  const placeholder = config?.i18n?.en?.inputPlaceholder;
  if (placeholder) {
    options.composer = {
      ...(options.composer || {}),
      placeholder,
    };
  }

  return options;
}

const GASERGY_STYLE_ID = 'gasergy-overlay-styles';

function ensureGasergyStyles() {
  if (document.getElementById(GASERGY_STYLE_ID)) {
    return;
  }

  const style = document.createElement('style');
  style.id = GASERGY_STYLE_ID;
  style.textContent = `
    .gasergy-overlay {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      background: rgba(7, 9, 16, 0.85);
      color: #ffffff;
      text-align: center;
      z-index: 50;
      pointer-events: auto;
    }

    .gasergy-overlay__content {
      max-width: 28rem;
      background: rgba(20, 24, 35, 0.92);
      border-radius: 1.25rem;
      padding: 1.75rem;
      border: 1px solid rgba(255, 255, 255, 0.18);
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.35);
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .gasergy-overlay__content p {
      font-size: 1.05rem;
      line-height: 1.6;
      margin: 0;
    }

    .gasergy-overlay__content a {
      color: #ffd166;
      font-weight: 600;
      text-decoration: underline;
    }
  `;

  document.head.appendChild(style);
}

function createGasergyOverlay(targetElement, refillPath) {
  if (!targetElement) return null;

  ensureGasergyStyles();

  const computedStyle = window.getComputedStyle(targetElement);
  if (computedStyle.position === 'static' || computedStyle.position === '') {
    targetElement.style.position = 'relative';
  }

  const overlay = document.createElement('div');
  overlay.className = 'gasergy-overlay';
  const actualRefillPath = refillPath || '#';
  overlay.innerHTML = `
    <div class="gasergy-overlay__content">
      <p>I am out of Gasergy. As an SRN Master HTML AI assistant, I need Gasergy to continue functioning. Please re-charge my tank: <a href="${actualRefillPath}" target="_blank" rel="noopener noreferrer">Get Gasergy</a></p>
    </div>
  `;

  targetElement.appendChild(overlay);
  return overlay;
}

function removeGasergyOverlay(targetElement, overlay) {
  if (targetElement && overlay && targetElement.contains(overlay)) {
    targetElement.removeChild(overlay);
  }
}

function initGasergyObserver(gasergyConfig, chatkitElement, chatTarget) {
  if (!gasergyConfig || !chatkitElement) {
    return;
  }

  if (chatkitElement.dataset.gasergyObserverAttached === 'true') {
    return;
  }
  chatkitElement.dataset.gasergyObserverAttached = 'true';

  const targetElement =
    chatTarget instanceof HTMLElement
      ? chatTarget
      : typeof chatTarget === 'string'
        ? document.querySelector(chatTarget)
        : null;

  if (!targetElement) {
    console.error(
      'Gasergy Observer: Chat target element not found for selector:',
      chatTarget,
    );
    return;
  }

  const state = {
    depleted: false,
    overlay: null,
  };

  const balanceDisplayElement = gasergyConfig.balanceDisplaySelector
    ? document.querySelector(gasergyConfig.balanceDisplaySelector)
    : null;

  const updateBalanceDisplay = (balance) => {
    if (balanceDisplayElement) {
      balanceDisplayElement.textContent = 'Gasergy balance: ⚡ ' + balance;
    }
  };

  const applyDepletedState = () => {
    if (state.depleted) return;
    state.depleted = true;
    chatkitElement.inert = true;
    chatkitElement.setAttribute('data-gasergy-depleted', 'true');
    state.overlay = state.overlay || createGasergyOverlay(targetElement, gasergyConfig.refillPath);
    console.log('Gasergy Observer: Chat disabled due to depleted Gasergy.');
  };

  const liftDepletedState = (balance) => {
    if (!state.depleted) return;
    if (typeof balance === 'number' && balance > 0) {
      state.depleted = false;
      chatkitElement.inert = false;
      chatkitElement.removeAttribute('data-gasergy-depleted');
      removeGasergyOverlay(targetElement, state.overlay);
      state.overlay = null;
    }
  };

  const handleBalanceData = (data) => {
    if (typeof data?.balance === 'undefined') {
      console.warn('Gasergy Observer: Balance missing from response data.', data);
      return;
    }

    updateBalanceDisplay(data.balance);
    if (data.balance <= 0) {
      applyDepletedState();
    } else {
      liftDepletedState(data.balance);
    }
  };

  const fetchInitialBalance = () => {
    if (!gasergyConfig.balancePath) {
      console.warn('Gasergy Observer: balancePath not provided in config for initial check.');
      return;
    }

    fetch(gasergyConfig.balancePath)
      .then((response) => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then(handleBalanceData)
      .catch((err) => {
        console.error('Gasergy Observer: Error fetching initial balance:', err);
      });
  };

  const deductGasergy = () => {
    const formData = new URLSearchParams();
    formData.append('amount', '30');

    fetch(gasergyConfig.fetchPath, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: formData.toString(),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then((data) => {
        if (data?.success && typeof data.balance !== 'undefined') {
          updateBalanceDisplay(data.balance);
          if (data.balance <= 0) {
            applyDepletedState();
          }
        } else {
          console.error('Gasergy Observer: Failed to update balance after deduction, API data:', data);
        }
      })
      .catch((error) => {
        console.error('Gasergy Observer: Error decreasing Gasergy:', error);
      });
  };

  fetchInitialBalance();

  chatkitElement.addEventListener('chatkit.response.end', () => {
    if (state.depleted) {
      applyDepletedState();
      return;
    }
    deductGasergy();
  });

  chatkitElement.addEventListener('chatkit.ready', () => {
    if (state.depleted) {
      applyDepletedState();
    }
  });
}

export function initializeChatKit(config = {}) {
  const initialize = () => {
    const targetElement = getTargetElement(config.target);
    if (!targetElement) {
      throw new Error('ChatKit initialization failed: target element not found.');
    }

    let chatkitElement = targetElement.querySelector('openai-chatkit');
    if (!chatkitElement) {
      chatkitElement = document.createElement('openai-chatkit');
      targetElement.appendChild(chatkitElement);
    }

    const options = buildChatKitOptions(config);

    if (!options.api) {
      console.warn(
        'ChatKit initializer: Missing API configuration. Provide config.chatkitOptions.api or config.webhookUrl.',
      );
    } else {
      try {
        chatkitElement.setOptions(options);
      } catch (err) {
        console.error('ChatKit initializer: Failed to apply options.', err);
      }
    }

    if (config.mode) {
      chatkitElement.dataset.chatMode = config.mode;
    }
    if (typeof config.autoOpen === 'boolean') {
      chatkitElement.dataset.autoOpen = String(config.autoOpen);
    }
    if (typeof config.hideToggle === 'boolean') {
      chatkitElement.dataset.hideToggle = String(config.hideToggle);
    }

    if (config.gasergy) {
      initGasergyObserver(config.gasergy, chatkitElement, targetElement);
    }

    return chatkitElement;
  };

  if (typeof window === 'undefined') {
    console.error('ChatKit initialization is not available during server-side rendering.');
    return Promise.resolve(null);
  }

  const scriptUrl = config.bundleUrl || DEFAULT_CHATKIT_BUNDLE_URL;

  if (window.customElements?.get('openai-chatkit')) {
    return Promise.resolve(initialize());
  }

  return loadChatKitScript(scriptUrl)
    .then(initialize)
    .catch((error) => {
      console.error('ChatKit initializer: Unable to load bundle.', error);
      throw error;
    });
}

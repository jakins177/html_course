// File: assets/js/chat-logic.js

import { createChat } from 'https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js';

export function initializeN8NChat(config) {
  createChat({
    webhookUrl: config.webhookUrl,
    initialMessages: config.initialMessages,
    i18n: config.i18n,
    target: config.target,
    mode: config.mode,
    autoOpen: config.autoOpen,
    hideToggle: config.hideToggle,
  });

  if (config.gasergy) {
    const gasergyConfig = {
      fetchPath: config.gasergy.fetchPath,
      refillPath: config.gasergy.refillPath,
      balanceDisplaySelector: config.gasergy.balanceDisplaySelector,
      balancePath: config.gasergy.balancePath,
    };
    initGasergyObserver(gasergyConfig, config.target);
  }
}

function disableChatInput(chatTargetSelectorForInput) {
  const chatRootElement = document.querySelector(chatTargetSelectorForInput);
  if (!chatRootElement) {
    // console.error('Gasergy Observer: Could not find chat root element for input disabling:', chatTargetSelectorForInput);
    return false;
  }

  const inputElement = chatRootElement.querySelector('.chat-input .chat-inputs textarea');
  if (inputElement) {
    if (!inputElement.disabled) {
      inputElement.disabled = true;
      inputElement.placeholder = 'Gasergy depleted. Please recharge.';
      console.log('Gasergy Observer: Chat input disabled using selector:', chatTargetSelectorForInput + ' .chat-input .chat-inputs textarea');
    } else {
      // console.log('Gasergy Observer: Chat input already disabled (main selector).');
    }
    return true;
  }

  const fallbackInputElement = chatRootElement.querySelector('textarea');
  if (fallbackInputElement) {
    if (!fallbackInputElement.disabled) {
      fallbackInputElement.disabled = true;
      fallbackInputElement.placeholder = 'Gasergy depleted. Please recharge.';
      console.warn('Gasergy Observer: Used fallback selector to disable textarea:', chatTargetSelectorForInput + ' textarea');
    } else {
      // console.log('Gasergy Observer: Chat input already disabled (fallback selector).');
    }
    return true;
  }

  // console.error('Gasergy Observer: Could not find chat input textarea using specific or fallback selectors for disabling within:', chatTargetSelectorForInput);
  return false;
}

function displayOutOfGasergyMessage(refillPath, messagesContainerElement, chatTargetSelectorForInput) {
  if (!messagesContainerElement) {
    console.error('Gasergy Observer: messagesContainerElement is null in displayOutOfGasergyMessage. Cannot display message or disable input.');
    return;
  }

  const existingMessages = messagesContainerElement.querySelectorAll('.chat-message-markdown p');
  let messageExists = false;
  existingMessages.forEach(existingP => {
    if (existingP.textContent.includes("I am out of Gasergy.")) {
      messageExists = true;
    }
  });

  if (!messageExists) {
    const messageDiv = document.createElement('div');
    messageDiv.className = 'chat-message chat-message-from-bot';

    const markdownDiv = document.createElement('div');
    markdownDiv.className = 'chat-message-markdown';

    const p = document.createElement('p');
    const actualRefillPath = refillPath || '#';
    if (!refillPath) {
        console.warn('Gasergy Observer: refillPath not provided for OutOfGasergyMessage. Using "#" as fallback.');
    }
    p.innerHTML = `I am out of Gasergy. As an SRN Master HTML AI assistant, I need Gasergy to continue functioning. Please re-charge my tank: <a href='${actualRefillPath}' target='_blank'>Get Gasergy</a>`;

    markdownDiv.appendChild(p);
    messageDiv.appendChild(markdownDiv);
    messagesContainerElement.appendChild(messageDiv);
    messagesContainerElement.scrollTop = messagesContainerElement.scrollHeight;
    console.log('Gasergy Observer: "Out of Gasergy" message displayed.');
  } else {
    // console.log('Gasergy Observer: "Out of Gasergy" message already exists. Not adding duplicate.');
  }

  // Attempt to disable input, retry if necessary
  if (!disableChatInput(chatTargetSelectorForInput)) {
    let attempts = 0;
    const maxAttempts = 50; // Max attempts (e.g., 50 * 100ms = 5 seconds)
    const intervalId = setInterval(() => {
      attempts++;
      if (disableChatInput(chatTargetSelectorForInput)) {
        clearInterval(intervalId);
        // console.log('Gasergy Observer: Chat input disabled after attempts in displayOutOfGasergyMessage.');
      } else if (attempts >= maxAttempts) {
        clearInterval(intervalId);
        console.error('Gasergy Observer: Failed to disable chat input after multiple attempts in displayOutOfGasergyMessage.');
      }
    }, 100); // Retry interval (e.g., every 100ms)
  }
}

function initGasergyObserver(gasergyConfig, chatTargetSelector) {
  console.log("Initializing Gasergy observer with config:", gasergyConfig, "and chat target selector:", chatTargetSelector);

  let gasergyDepletedMessageShown = false;

  const chatContainer = document.querySelector(chatTargetSelector);
  if (!chatContainer) {
    console.error("Gasergy Observer: Chat container not found with selector:", chatTargetSelector);
    return;
  }

  const setupObserverAndBalance = (currentMessagesList) => {
    if (!currentMessagesList) {
        console.error("Gasergy Observer: currentMessagesList is null in setupObserverAndBalance. Cannot proceed.");
        return;
    }
    let balanceDisplayElement = null;
    if (gasergyConfig.balanceDisplaySelector) {
      balanceDisplayElement = document.querySelector(gasergyConfig.balanceDisplaySelector);
      if (!balanceDisplayElement) {
        console.warn("Gasergy Observer: Balance display element not found with selector:", gasergyConfig.balanceDisplaySelector);
      }
    }

    // Initial balance check
    if (gasergyConfig.balancePath) {
      fetch(gasergyConfig.balancePath)
        .then((response) => {
          if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
          return response.json();
        })
        .then((data) => {
          if (typeof data.balance !== 'undefined') {
            if (balanceDisplayElement) {
              balanceDisplayElement.textContent = 'Gasergy balance: ⚡ ' + data.balance;
            }
            if (data.balance <= 0) {
              if (!gasergyDepletedMessageShown) { // Check flag before showing message
                console.log('Gasergy Observer: Initial balance is zero or less. Displaying out of gasergy message and disabling input.');
                gasergyDepletedMessageShown = true; // Set flag
                displayOutOfGasergyMessage(
                  gasergyConfig.refillPath,
                  currentMessagesList,
                  chatTargetSelector
                );
              }
            }
          }
        })
        .catch((err) => console.error('Gasergy Observer: Error fetching initial balance:', err));
    } else {
      console.warn('Gasergy Observer: balancePath not provided in config for initial check.');
    }

    const observer = new MutationObserver((mutationsList, obs) => {
      // If Gasergy is already depleted, ensure input remains disabled and do not process new messages for Gasergy.
      if (gasergyDepletedMessageShown) {
        disableChatInput(chatTargetSelector);
        return;
      }

      for (const mutation of mutationsList) {
        if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
          const newBotMessages = Array.from(mutation.addedNodes).filter(node =>
            node.nodeType === Node.ELEMENT_NODE &&
            node.classList.contains('chat-message') &&
            node.classList.contains('chat-message-from-bot') &&
            !node.dataset.gasergyProcessed &&
            node.querySelector('.chat-message-markdown p')
          );

          if (newBotMessages.length > 0) {
            // If gasergyDepletedMessageShown became true due to another async operation
            // before this message processing, just disable input and exit.
            if (gasergyDepletedMessageShown) {
                disableChatInput(chatTargetSelector);
                return;
            }

            const newestMessage = newBotMessages[newBotMessages.length - 1];
            newestMessage.dataset.gasergyProcessed = 'true';

            const formData = new URLSearchParams();
            formData.append('amount', '30');

            fetch(gasergyConfig.fetchPath, {
              method: 'POST',
              headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
              body: formData
            })
            .then(response => {
              if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
              return response.json();
            })
            .then(data => {
              if (data.success && typeof data.balance !== 'undefined') {
                if (balanceDisplayElement) {
                  balanceDisplayElement.textContent = 'Gasergy balance: ⚡ ' + data.balance;
                }
                if (data.balance <= 0) {
                  if (!gasergyDepletedMessageShown) { // Check flag again before showing message
                    console.log('Gasergy Observer: Gasergy is zero or less after deduction. Balance:', data.balance);
                    gasergyDepletedMessageShown = true; // Set flag

                    // Use currentMessagesList directly as it's already available in this scope
                    if (currentMessagesList) {
                      if (newestMessage && newestMessage.parentNode) {
                        // It might be better to not remove the bot's last message that triggered
                        // the Gasergy depletion, as it could be confusing for the user.
                        // Instead, just display the "out of Gasergy" message.
                        // newestMessage.remove();
                      }
                      displayOutOfGasergyMessage(
                        gasergyConfig.refillPath,
                        currentMessagesList, // Use the messages list from setupObserverAndBalance
                        chatTargetSelector
                      );
                    } else {
                      // This case should ideally not be reached if setupObserverAndBalance was called with a valid currentMessagesList
                      console.error('Gasergy Observer: currentMessagesList is unexpectedly null during deduction message display.');
                    }
                  }
                }
              } else {
                console.error('Gasergy Observer: Failed to update balance after deduction, API data:', data);
              }
            })
            .catch(error => {
              console.error('Gasergy Observer: Error decreasing Gasergy:', error);
            });
          }
        }
      }
    });

    observer.observe(currentMessagesList, { childList: true, subtree: true });
    // console.log("Gasergy Observer: MutationObserver attached to messages list:", currentMessagesList);
  };

  // Attempt to find .chat-messages-list, retry after a delay if not immediately available
  let messagesList = chatContainer.querySelector('.chat-messages-list');
  if (!messagesList) {
    // console.log("Gasergy Observer: .chat-messages-list not found initially, will retry after a delay.");
    setTimeout(() => {
      const delayedMessagesList = chatContainer.querySelector('.chat-messages-list');
      if (delayedMessagesList) {
        // console.log("Gasergy Observer: Found .chat-messages-list after delay.");
        setupObserverAndBalance(delayedMessagesList);
      } else {
        console.error("Gasergy Observer: Chat messages list (.chat-messages-list) not found even after delay. Gasergy logic might not work correctly.");
      }
    }, 750); // Delay for DOM rendering
  } else {
    // console.log("Gasergy Observer: Found .chat-messages-list immediately.");
    setupObserverAndBalance(messagesList);
  }
}

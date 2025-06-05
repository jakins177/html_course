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
    initGasergyObserver(config.gasergy, config.target);
  }
}

function initGasergyObserver(gasergyConfig, chatTargetSelector) {
  console.log("Initializing Gasergy observer with config:", gasergyConfig);

  const chatContainer = document.querySelector(chatTargetSelector);
  if (!chatContainer) {
    console.error("Gasergy Observer: Chat container not found with selector:", chatTargetSelector);
    return;
  }

  const messagesList = chatContainer.querySelector('.chat-messages-list');
  if (!messagesList) {
    console.error("Gasergy Observer: Chat messages list not found within chat container:", chatTargetSelector);
    return;
  }

  let balanceDisplayElement = null;
  if (gasergyConfig.balanceDisplaySelector) {
    balanceDisplayElement = document.querySelector(gasergyConfig.balanceDisplaySelector);
    if (!balanceDisplayElement) {
      console.warn("Gasergy Observer: Balance display element not found with selector:", gasergyConfig.balanceDisplaySelector);
    }
  }

  const observer = new MutationObserver((mutationsList, observer) => {
    for (const mutation of mutationsList) {
      if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
        mutation.addedNodes.forEach(node => {
          if (node.nodeType === Node.ELEMENT_NODE) {
            const isUserMessage = node.classList.contains('chat-message-user');
            if (isUserMessage) {
              console.log("Gasergy Observer: User message detected.");
              fetch(gasergyConfig.fetchPath, {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                  action: 'decrease_gasergy',
                  userId: 1 // Replace with actual user ID
                })
              })
              .then(response => response.json())
              .then(data => {
                console.log("Gasergy API response:", data);
                if (data.success && balanceDisplayElement) {
                  balanceDisplayElement.textContent = data.newBalance;
                  console.log("Gasergy balance updated to:", data.newBalance);
                } else if (!data.success) {
                  console.error("Gasergy API error:", data.message);
                }
              })
              .catch(error => {
                console.error('Error calling Gasergy API:', error);
              });
            }
          }
        });
      }
    }
  });

  observer.observe(messagesList, { childList: true });
  console.log("Gasergy Observer: MutationObserver attached to messages list:", messagesList);
}

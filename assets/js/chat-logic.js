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
    initGasergyObserver(config.gasergy, config.target);
  }
}

function initGasergyObserver(gasergyConfig, chatTargetSelector) {
  console.log("Initializing Gasergy observer with config:", gasergyConfig, "and chat target selector:", chatTargetSelector);

  const chatContainer = document.querySelector(chatTargetSelector);
  if (!chatContainer) {
    console.error("Gasergy Observer: Chat container not found with selector:", chatTargetSelector);
    return;
  }

  const messagesList = chatContainer.querySelector('.chat-messages-list');
  if (!messagesList) {
    console.error("Gasergy Observer: Chat messages list not found within chat container using selector .chat-messages-list on element:", chatContainer);
    return;
  }

  let balanceDisplayElement = null;
  if (gasergyConfig.balanceDisplaySelector) {
    balanceDisplayElement = document.querySelector(gasergyConfig.balanceDisplaySelector);
    if (!balanceDisplayElement) {
      console.warn("Gasergy Observer: Balance display element not found with selector:", gasergyConfig.balanceDisplaySelector);
    } else {
      console.log("Gasergy Observer: Found balance display element:", balanceDisplayElement);
    }
  } else {
    console.log("Gasergy Observer: No balanceDisplaySelector provided in config.");
  }

  const observer = new MutationObserver((mutationsList, observer) => {
    for (const mutation of mutationsList) {
      console.log('Gasergy Observer: Mutation detected:', mutation); // Log each mutation record

      if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
        mutation.addedNodes.forEach(node => { // Iterate with forEach for logging individual nodes
          console.log('Gasergy Observer: Checking added node:', node);
          if (node.nodeType === Node.ELEMENT_NODE) {
            console.log('Gasergy Observer: Node classes:', node.classList);
            console.log('Gasergy Observer: Node dataset.gasergyProcessed:', node.dataset.gasergyProcessed);
            const markdownContent = node.querySelector('.chat-message-markdown p');
            console.log('Gasergy Observer: Node querySelector .chat-message-markdown p:', markdownContent ? markdownContent.textContent : null);
          }
        });

        // Now, apply the precise filter logic
        const newBotMessages = Array.from(mutation.addedNodes).filter(node =>
          node.nodeType === Node.ELEMENT_NODE &&
          node.classList.contains('chat-message') &&
          node.classList.contains('chat-message-from-bot') &&
          !node.dataset.gasergyProcessed && // Check for the flag
          node.querySelector('.chat-message-markdown p') // Check for the specific content structure
        );

        if (newBotMessages.length > 0) {
          const newestMessage = newBotMessages[newBotMessages.length - 1];
          newestMessage.dataset.gasergyProcessed = 'true'; // Set the flag
          console.log('Gasergy Observer: New bot message detected. Contents:', newestMessage.textContent);

          const formData = new URLSearchParams();
          formData.append('amount', '30'); // As per instruction

          fetch(gasergyConfig.fetchPath, { // Use gasergyConfig.fetchPath
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded', // As per instruction
            },
            body: formData
          })
          .then(response => {
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return response.json();
          })
          .then(data => {
            console.log('Gasergy Observer: API response data:', data); // Log API response
            if (data.success && typeof data.balance !== 'undefined') {
              if (balanceDisplayElement) { // Check if balanceDisplayElement exists
                balanceDisplayElement.textContent = 'Gasergy balance: ⚡ ' + data.balance;
                console.log('Gasergy Observer: Balance updated to:', data.balance);
              } else {
                console.log('Gasergy Observer: Balance updated (no display element):', data.balance);
              }
            } else {
              console.error('Gasergy Observer: Failed to update balance, API data:', data);
            }
          })
          .catch(error => {
            console.error('Gasergy Observer: Error decreasing Gasergy:', error);
          });
        }
      }
    }
  });

  observer.observe(messagesList, { childList: true, subtree: true }); // Added subtree: true for deeper changes if necessary
  console.log("Gasergy Observer: MutationObserver attached to messages list:", messagesList);
}

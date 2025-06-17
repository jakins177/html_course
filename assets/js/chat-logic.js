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
    console.error('Gasergy Observer: Could not find chat root element for input disabling:', chatTargetSelectorForInput);
    return false;
  }

  const inputElement = chatRootElement.querySelector('.chat-input .chat-inputs textarea');
  if (inputElement) {
    inputElement.disabled = true;
    inputElement.placeholder = 'Gasergy depleted. Please recharge.';
    console.log('Gasergy Observer: Chat input disabled using selector:', chatTargetSelectorForInput + ' .chat-input .chat-inputs textarea');
    return true;
  }

  const fallbackInputElement = chatRootElement.querySelector('textarea');
  if (fallbackInputElement) {
    fallbackInputElement.disabled = true;
    fallbackInputElement.placeholder = 'Gasergy depleted. Please recharge.';
    console.warn('Gasergy Observer: Used fallback selector to disable textarea:', chatTargetSelectorForInput + ' textarea');
    return true;
  }

  console.error('Gasergy Observer: Could not find chat input textarea using specific or fallback selectors within:', chatTargetSelectorForInput);
  return false;
}

function displayOutOfGasergyMessage(refillPath, messagesContainerElement, chatTargetSelectorForInput) {
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

  // Ensure Scroll-to-Bottom
  messagesContainerElement.scrollTop = messagesContainerElement.scrollHeight;
  console.log('Gasergy Observer: "Out of Gasergy" message displayed.');

  if (!disableChatInput(chatTargetSelectorForInput)) {
    const intervalId = setInterval(() => {
      if (disableChatInput(chatTargetSelectorForInput)) {
        clearInterval(intervalId);
      }
    }, 500);
  }
}

function initGasergyObserver(gasergyConfig, chatTargetSelector) {
  console.log("Initializing Gasergy observer with config:", gasergyConfig, "and chat target selector:", chatTargetSelector);

  let gasergyDepletedMessageShown = false; // Flag to ensure message is shown only once

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
            gasergyDepletedMessageShown = true;
            displayOutOfGasergyMessage(
              gasergyConfig.refillPath,
              messagesList,
              chatTargetSelector
            );
          }
        }
      })
      .catch((err) => console.error('Gasergy Observer: Error fetching balance:', err));
  } else {
    console.warn('Gasergy Observer: balancePath not provided in config.');
  }

  const observer = new MutationObserver((mutationsList, observer) => {
    if (gasergyDepletedMessageShown) {
      // console.log('Gasergy Observer: Depleted message already shown, skipping further processing.'); // Optional for debugging
      return;
    }

    for (const mutation of mutationsList) {
      console.log('Gasergy Observer: Mutation detected:', mutation); 

      if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
        mutation.addedNodes.forEach(node => { 
          console.log('Gasergy Observer: Checking added node:', node);
          if (node.nodeType === Node.ELEMENT_NODE) {
            console.log('Gasergy Observer: Node classes:', node.classList);
            console.log('Gasergy Observer: Node dataset.gasergyProcessed:', node.dataset.gasergyProcessed);
            const markdownContent = node.querySelector('.chat-message-markdown p');
            console.log('Gasergy Observer: Node querySelector .chat-message-markdown p:', markdownContent ? markdownContent.textContent : null);
          }
        });

        const newBotMessages = Array.from(mutation.addedNodes).filter(node =>
          node.nodeType === Node.ELEMENT_NODE &&
          node.classList.contains('chat-message') &&
          node.classList.contains('chat-message-from-bot') &&
          !node.dataset.gasergyProcessed && 
          node.querySelector('.chat-message-markdown p') 
        );

        if (newBotMessages.length > 0) {
          const newestMessage = newBotMessages[newBotMessages.length - 1];
          newestMessage.dataset.gasergyProcessed = 'true'; 
          console.log('Gasergy Observer: New bot message detected. Contents:', newestMessage.textContent);

          const formData = new URLSearchParams();
          formData.append('amount', '30'); 

          fetch(gasergyConfig.fetchPath, { 
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded', 
            },
            body: formData
          })
          .then(response => {
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return response.json();
          })
          .then(data => {
            console.log('Gasergy Observer: API response data:', data); 
            if (data.success && typeof data.balance !== 'undefined') {
              if (balanceDisplayElement) { 
                balanceDisplayElement.textContent = 'Gasergy balance: ⚡ ' + data.balance;
                console.log('Gasergy Observer: Balance updated to:', data.balance);
              } else {
                console.log('Gasergy Observer: Balance updated (no display element):', data.balance);
              }

              if (data.balance <= 0) {
                console.log('Gasergy Observer: Gasergy is zero or less. Current balance:', data.balance);
                gasergyDepletedMessageShown = true; // Set the flag immediately
                
                const chatTargetElement = document.querySelector(chatTargetSelector);
                if (chatTargetElement) {
                  const messagesContainer = chatTargetElement.querySelector('.chat-messages-list');
                    if (messagesContainer) {
                      if (newestMessage && newestMessage.parentNode) {
                        newestMessage.remove();
                      }
                      displayOutOfGasergyMessage(
                        gasergyConfig.refillPath,
                        messagesContainer,
                        chatTargetSelector
                      );
                  } else {
                    console.error('Gasergy Observer: Could not find .chat-messages-list within', chatTargetSelector);
                  }
                } else {
                  console.error('Gasergy Observer: Could not find chat target element:', chatTargetSelector);
                }
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

  observer.observe(messagesList, { childList: true, subtree: true }); 
  console.log("Gasergy Observer: MutationObserver attached to messages list:", messagesList);
}

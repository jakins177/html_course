// assets/js/chat-logic.js
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
    }
    return true; 
  }

  const fallbackInputElement = chatRootElement.querySelector('textarea');
  if (fallbackInputElement) {
    if (!fallbackInputElement.disabled) {
      fallbackInputElement.disabled = true;
      fallbackInputElement.placeholder = 'Gasergy depleted. Please recharge.';
      console.warn('Gasergy Observer: Used fallback selector to disable textarea:', chatTargetSelectorForInput + ' textarea');
    }
    return true; 
  }
  
  // console.error('Gasergy Observer: Could not find chat input textarea using specific or fallback selectors within:', chatTargetSelectorForInput);
  return false;
}

function displayOutOfGasergyMessage(refillPath, messagesContainerElement, chatTargetSelectorForInput) {
  if (!messagesContainerElement) {
    console.error('Gasergy Observer: messagesContainerElement is null in displayOutOfGasergyMessage. Cannot display message or disable input.');
    return;
  }
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
  
  const existingMessages = messagesContainerElement.querySelectorAll('.chat-message-markdown p');
  let messageExists = false;
  existingMessages.forEach(existingP => {
    if (existingP.textContent.includes("I am out of Gasergy.")) {
      messageExists = true;
    }
  });

  if (!messageExists) {
    messagesContainerElement.appendChild(messageDiv);
    messagesContainerElement.scrollTop = messagesContainerElement.scrollHeight;
    console.log('Gasergy Observer: "Out of Gasergy" message displayed.');
  } else {
    // console.log('Gasergy Observer: "Out of Gasergy" message already present, not adding duplicate.');
  }

  if (!disableChatInput(chatTargetSelectorForInput)) {
    let attempts = 0;
    const maxAttempts = 50; // Try for 5 seconds (50 * 100ms)
    const intervalId = setInterval(() => {
      attempts++;
      if (disableChatInput(chatTargetSelectorForInput)) {
        clearInterval(intervalId);
        // console.log('Gasergy Observer: Chat input disabled after initial attempts.');
      } else if (attempts >= maxAttempts) {
        clearInterval(intervalId);
        console.error('Gasergy Observer: Failed to disable chat input after multiple attempts in displayOutOfGasergyMessage.');
      }
    }, 100); // Check every 100ms
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
      } else {
         // console.log("Gasergy Observer: Found balance display element:", balanceDisplayElement);
      }
    }

    // Initial balance check
    if (gasergyConfig.balancePath) {
      console.log('Gasergy Observer: Attempting to fetch initial balance from:', gasergyConfig.balancePath); // ADDED
      fetch(gasergyConfig.balancePath)
        .then((response) => {
          console.log('Gasergy Observer: Initial balance fetch - .then() block reached. Response status:', response.status); // ADDED
          if (!response.ok) {
            console.error('Gasergy Observer: Initial balance fetch - Response not OK. Status:', response.status); // ADDED
            throw new Error(`HTTP error! status: ${response.status}`);
          }
          return response.json();
        })
        .then((data) => {
          console.log('Gasergy Observer: Initial balance fetch - processing data:', data); // ADDED
          if (typeof data.balance !== 'undefined') {
            if (balanceDisplayElement) {
              balanceDisplayElement.textContent = 'Gasergy balance: ⚡ ' + data.balance;
            }
            if (data.balance <= 0) {
              if (!gasergyDepletedMessageShown) {
                console.log('Gasergy Observer: Initial balance is zero or less. Displaying out of gasergy message and disabling input.');
                gasergyDepletedMessageShown = true;
                displayOutOfGasergyMessage(
                  gasergyConfig.refillPath,
                  currentMessagesList,
                  chatTargetSelector
                );
              }
            }
          } else {
            console.warn('Gasergy Observer: Initial balance fetch - data.balance is undefined.'); // ADDED
          }
        })
        .catch((err) => {
          console.error('Gasergy Observer: Error fetching initial balance - .catch() block reached. Error:', err); // ADDED
        });
    } else {
      console.warn('Gasergy Observer: balancePath not provided in config for initial check.');
    }

    const observer = new MutationObserver((mutationsList, obs) => {
      if (gasergyDepletedMessageShown) {
        disableChatInput(chatTargetSelector); 
        return; 
      }

      for (const mutation of mutationsList.filter(m => m.type === 'childList' && m.addedNodes.length > 0)) {
        const newBotMessages = Array.from(mutation.addedNodes).filter(node =>
          node.nodeType === Node.ELEMENT_NODE &&
          node.classList.contains('chat-message') &&
          node.classList.contains('chat-message-from-bot') &&
          !node.dataset.gasergyProcessed && 
          node.querySelector('.chat-message-markdown p') 
        );

        if (newBotMessages.length > 0) {
          if (gasergyDepletedMessageShown) return;

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
                if (!gasergyDepletedMessageShown) {
                  console.log('Gasergy Observer: Gasergy is zero or less after deduction. Balance:', data.balance);
                  gasergyDepletedMessageShown = true; 
                  
                  const chatTargetElement = document.querySelector(chatTargetSelector);
                  const messagesContainerForDeduction = chatTargetElement ? chatTargetElement.querySelector('.chat-messages-list') : null;
                  
                  if (messagesContainerForDeduction) {
                    if (newestMessage && newestMessage.parentNode) {
                      newestMessage.remove(); 
                    }
                    displayOutOfGasergyMessage(
                      gasergyConfig.refillPath,
                      messagesContainerForDeduction,
                      chatTargetSelector
                    );
                  } else {
                    console.error('Gasergy Observer: Could not find .chat-messages-list for deduction message display.');
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
    });

    observer.observe(currentMessagesList, { childList: true, subtree: true }); 
    // console.log("Gasergy Observer: MutationObserver attached to messages list:", currentMessagesList);
  };

  let messagesList = chatContainer.querySelector('.chat-messages-list');
  if (!messagesList) {
    // console.log("Gasergy Observer: .chat-messages-list not found initially, will retry shortly.");
    setTimeout(() => {
      const delayedMessagesList = chatContainer.querySelector('.chat-messages-list');
      if (delayedMessagesList) {
        // console.log("Gasergy Observer: Found .chat-messages-list after delay.");
        setupObserverAndBalance(delayedMessagesList);
      } else {
        console.error("Gasergy Observer: Chat messages list (.chat-messages-list) not found even after delay. Gasergy logic might not work correctly.");
      }
    }, 750); 
  } else {
    // console.log("GaserGasergy Observer: Found .chat-messages-list immediately.");
    setupObserverAndBalance(messagesList);
  }
}

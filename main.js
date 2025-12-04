async function initChatKit() {
  // Step: call backend to create a session
  const response = await fetch("chatkit_session.php", { method: "POST" });
  const data = await response.json();
  console.log('Response from chatkit_session.php:', data);

  // Extract the client secret from the response object.
  // The API returns `{ client_secret: { value: "...", expires_at: ... } }`.
  let clientSecretValue = data?.client_secret?.value;

  // If the structure changes or we receive the value directly as a string, fall back.
  if (typeof clientSecretValue !== "string" || clientSecretValue.length === 0) {
    clientSecretValue =
      typeof data?.client_secret === "string" ? data.client_secret : undefined;
  }

  if (typeof clientSecretValue !== "string" || clientSecretValue.length === 0) {
    console.error("Failed to extract client secret value:", data);
    alert("ChatKit failed to initialize.");
    return;
  }
  console.log("Extracted client secret:", clientSecretValue);

  // Wait for chatkit Web Component to be defined
  if (customElements?.whenDefined) {
    await customElements.whenDefined("openai-chatkit");
  }

  const chatElement = document.getElementById("my-chat");
  if (!chatElement?.setOptions) {
    console.error("ChatKit web component not available.");
    alert("ChatKit failed to initialize.");
    return;
  }

  // const sessionId = data?.id;
  // if (typeof sessionId !== "string" || sessionId.length === 0) {
  //   console.error("Failed to extract session id:", data);
  //   alert("ChatKit failed to initialize.");
  //   return;
  // }
  // console.log("Extracted session ID:", sessionId);

  // Initialize ChatKit widget
  chatElement.setOptions({
    api: {
      async getClientSecret() {
        return clientSecretValue;
      }
    }
    // you can add other options here (theme, placeholder, etc.)
  });

  // Setup toggle launcher
  const launcherBtn = document.getElementById("chatLauncher");
  const containerDiv = document.getElementById("chatContainer");
  let isOpen = false;

  launcherBtn.addEventListener("click", () => {
    if (!isOpen) {
      containerDiv.style.display = "block";
      launcherBtn.textContent = "Close";
      // Optionally focus composer if supported:
      if (typeof chatElement.focusComposer === "function") {
        chatElement.focusComposer();
      }
    } else {
      containerDiv.style.display = "none";
      launcherBtn.textContent = "Chat";
    }
    isOpen = !isOpen;
  });
}

window.addEventListener("load", initChatKit);

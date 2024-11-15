<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Administrator - Chat</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f4f6;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .chat-container {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 100%;
      display: flex;
      flex-direction: column;
    }

    .chat-box {
      border: 1px solid #ccc;
      padding: 15px;
      height: 300px;
      overflow-y: auto;
      margin-bottom: 10px;
      background-color: #f9f9f9;
      border-radius: 10px;
    }

    .chat-box p {
      margin: 5px 0;
    }

    .chat-box .user-message {
      color: #239B56;
      text-align: left;
    }

    .chat-box .admin-message {
      color: #e74c3c;
      text-align: right;
    }

    .message-input {
      display: flex;
      justify-content: space-between;
    }

    .message-input textarea {
      width: 80%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      resize: none;
    }

    .message-input button {
      width: 15%;
      background-color: #239B56;
      color: white;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      border: none;
    }

    .message-input button:hover {
      background-color: #1e7a40;
    }

    .offline-message {
      color: #555;
      font-style: italic;
      text-align: center;
    }

  </style>
</head>
<body>

  <div class="chat-container">
    <h2>Chat with Administrator</h2>
    <div class="chat-box" id="chatBox">
      <!-- Messages will be displayed here -->
      <p class="admin-message">Hello! How can I help you today?</p>
    </div>

    <div class="message-input">
      <textarea id="userMessage" placeholder="Type your question..." rows="3"></textarea>
      <button onclick="sendMessage()">Send</button>
    </div>

    <!-- Offline message -->
    <p class="offline-message" id="offlineMessage" style="display:none;">
      No one is available to chat right now. Please leave your email, and we'll get back to you shortly.
    </p>
  </div>

  <script>
    let isAdminAvailable = false;  // Simulate admin availability

    function sendMessage() {
      const userMessage = document.getElementById("userMessage").value;
      if (userMessage.trim() === "") {
        alert("Please type a message.");
        return;
      }

      const chatBox = document.getElementById("chatBox");

      // Add user's message
      const userMessageElement = document.createElement("p");
      userMessageElement.classList.add("user-message");
      userMessageElement.textContent = userMessage;
      chatBox.appendChild(userMessageElement);

      // If admin is available, simulate a response
      if (isAdminAvailable) {
        setTimeout(() => {
          const adminMessageElement = document.createElement("p");
          adminMessageElement.classList.add("admin-message");
          adminMessageElement.textContent = "Thank you for your question! We will get back to you shortly.";
          chatBox.appendChild(adminMessageElement);
        }, 1000); // Simulate admin response time
      } else {
        // Show offline message
        setTimeout(() => {
          const offlineMessage = document.getElementById("offlineMessage");
          offlineMessage.style.display = "block";
        }, 1000);
      }

      // Clear the input field
      document.getElementById("userMessage").value = "";
      
      // Scroll to the latest message
      chatBox.scrollTop = chatBox.scrollHeight;
    }
  </script>

</body>
</html>

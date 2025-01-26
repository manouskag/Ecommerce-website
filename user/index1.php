<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Background Styling */
        body {
            background-color: #f0f0f0;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: overlay; /* This blends the color with the image */
        }

        /* Adding a gradient overlay */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.5), rgba(0, 0, 0, 0.5));
            z-index: -1; /* Ensures the gradient is behind the content */
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8); /* Light background for cards */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for cards */
        }

        h1, .card-title, .card-text {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Adds a slight shadow to text */
        }
    </style>
    <?php
        include 'header1.php';
    ?>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Get Answers To Your Queries Here</h1>
        <div class="card">
            <div class="card-body">
                <div id="chat-box" class="mb-3" style="height: 300px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;">
                    <!-- Chat messages will appear here -->
                </div>
                <form id="chat-form">
                    <div class="input-group">
                        <input type="text" id="user-input" class="form-control" placeholder="Type your message here..." required>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('chat-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const userInput = document.getElementById('user-input').value;
            const chatBox = document.getElementById('chat-box');

            // Display user's message
            const userMessage = document.createElement('div');
            userMessage.className = 'text-end';
            userMessage.textContent = 'You: ' + userInput;
            chatBox.appendChild(userMessage);

            // Clear the input field
            document.getElementById('user-input').value = '';

            // Scroll to the bottom of the chat box
            chatBox.scrollTop = chatBox.scrollHeight;

            // Send user's message to the server
            fetch('chatbot.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'message=' + encodeURIComponent(userInput)
            })
            .then(response => response.text())
            .then(botResponse => {
                // Display bot's response
                const botMessage = document.createElement('div');
                botMessage.className = 'text-start';
                botMessage.textContent = 'Bot: ' + botResponse;
                chatBox.appendChild(botMessage);

                // Scroll to the bottom of the chat box
                chatBox.scrollTop = chatBox.scrollHeight;
            });
        });
    </script>

    <?php
        include 'footer.php';
    ?>
</body>
</html>

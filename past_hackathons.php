<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        /* Header Section */
        .header {
            width: 100%;
            background-color: #000;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .header h1 {
            margin: 0;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 20px;
            width: 90%; /* Makes the container fill most of the page */
            height: 80%; /* Keeps the blocks within the screen */
            max-width: 1200px; /* Optional: max-width to keep the layout centered */
            margin-top: 20px;
        }

        .block {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center the dropdown vertically */
            align-items: center; /* Center the dropdown horizontally */
        }

        .block:hover {
            background-color: #f1f1f1;
        }

        .block h2 {
            margin-top: 0;
        }

        select {
            padding: 10px;
            border-radius: 5px;
            width: 80%;
            margin-top: 10px;
            cursor: pointer;
        }

        .block a {
            display: block;
            text-decoration: none;
            color: #333;
            font-size: 18px;
            padding: 10px;
            background-color: #6200ea;
            color: white;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .block a:hover {
            background-color: #4a00b4;
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">
        <h1>Past Hackathons</h1>
    </div>

    <div class="container">
        <!-- First Block: Previous Hackathons -->
        <div class="block">
            <h2>Previous Hackathons</h2>
            <select id="hackathonDropdown">
                <option value="">Select Hackathon Info</option>
                <option value="winners.php">Winners</option>
                <option value="shortlisted.php">Shortlisted</option>
            </select>
        </div>

        <!-- Second Block: Blog -->
        <div class="block" onclick="window.location.href='blog.php';">
            <h2>Blog</h2>
            <p>Read our latest blogs on hackathons, technology, and more.</p>
            <a href="blog.php" target="_blank">Visit Blog</a>
        </div>

        <!-- Third Block: Pre-requisites -->
        <div class="block" onclick="window.location.href='prereq.php';">
            <h2>Pre-requisites</h2>
            <p>Check the required skills and tools for upcoming hackathons.</p>
            <a href="prereq.php" target="_blank">View Pre-requisites</a>
        </div>

        <!-- Fourth Block: Chatbot -->
        <div class="block" onclick="window.location.href='https://www.example.com/chatbot';">
            <h2>Chatbot</h2>
            <p>Need help? Chat with our bot for quick answers.</p>
            <a href="https://www.example.com/chatbot" target="_blank">Chat with Bot</a>
        </div>
    </div>

    <script>
        // JavaScript for handling dropdown redirection
        document.getElementById("hackathonDropdown").addEventListener("change", function() {
            var selectedValue = this.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        });
    </script>

</body>
</html>

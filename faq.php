<?php
// faq.php

// An array of questions and answers related to hackathon participation.
$faq = [
    [
        'question' => 'What is a hackathon?',
        'answer' => 'A hackathon is an event where participants collaborate intensively on software development or hardware projects, often around a specific theme or problem.'
    ],
    [
        'question' => 'Do I need to be an expert to participate?',
        'answer' => 'No, hackathons are open to all skill levels. Whether you’re a beginner or an experienced developer, you can contribute to a project and learn new things.'
    ],
    [
        'question' => 'How do I register for a hackathon?',
        'answer' => 'You can register by visiting the event website or platform hosting the hackathon. There is usually a registration link or form to sign up.'
    ],
    [
        'question' => 'Do hackathons provide food and accommodation?',
        'answer' => 'It depends on the hackathon. Some hackathons offer food, drinks, and accommodation, while others may not. You should check the event details for specifics.'
    ],
    [
        'question' => 'What are the prizes in a hackathon?',
        'answer' => 'Prizes can vary from cash rewards, tech gadgets, internships, or even funding for your project. Check the event details to see what prizes are available.'
    ],
    [
        'question' => 'Can I participate in a hackathon solo?',
        'answer' => 'Yes, many hackathons allow solo participation. However, it’s often a good idea to form a team to benefit from collaboration and skill sharing.'
    ],
    [
        'question' => 'How long do hackathons last?',
        'answer' => 'Hackathons typically last anywhere from 24 hours to several days, depending on the event. Some may also be held virtually, so you can participate from anywhere.'
    ],
    [
        'question' => 'What tools or technologies can I use during a hackathon?',
        'answer' => 'You can use any tools, libraries, or technologies you’re comfortable with, but some hackathons may provide specific APIs or frameworks for participants to use.'
    ],
    [
        'question' => 'Are there any costs associated with hackathons?',
        'answer' => 'Some hackathons are free to participate in, while others may have an entry fee. Make sure to check the event details for any costs involved.'
    ],
    [
        'question' => 'How do I prepare for a hackathon?',
        'answer' => 'Prepare by reviewing relevant skills and technologies, brainstorming project ideas, and reviewing the event’s rules and themes. You can also network with teammates in advance.'
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Hackathon Participation</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .topbar {
            background-color: #6A0DAD;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar h1 {
            margin: 0;
        }
        .faq-container {
            padding: 20px;
        }
        .faq-item {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            cursor: pointer;
        }
        .faq-item h3 {
            margin: 0;
            font-size: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .faq-item p {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
            display: none; /* Initially hidden */
        }
        .faq-item.open p {
            display: block; /* Show when clicked */
        }
        .arrow {
            font-size: 18px;
            transition: transform 0.3s ease;
        }
        .faq-item.open .arrow {
            transform: rotate(180deg);
        }
    </style>
    <script>
        // Toggle answer visibility
        function toggleAnswer(element) {
            const answer = element.nextElementSibling;
            const arrow = element.querySelector('.arrow');
            answer.classList.toggle('open');
            arrow.classList.toggle('open');
        }
    </script>
</head>
<body>

    <!-- Topbar Section -->
    <div class="topbar">
        <h1>Frequently Asked Questions</h1>
    </div>

    <!-- FAQ Section -->
    <div class="faq-container">
        <?php foreach ($faq as $item): ?>
            <div class="faq-item" onclick="toggleAnswer(this)">
                <h3><?php echo $item['question']; ?>
                    <span class="arrow">&#x2193;</span>
                </h3>
                <p><?php echo $item['answer']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>

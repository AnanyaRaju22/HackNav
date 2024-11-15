<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hackathon Portal</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f3f4f6;
    }
    /* Top Bar */
    .top-bar {
      background-color: #e74c3c;
      color: white;
      padding: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .account-icon {
      font-size: 20px;
      cursor: pointer;
    }
    /* Main Container */
    .container {
      display: flex;
      justify-content: space-around;
      padding: 20px;
    }
    /* Left and Right Sections - Image with Centered Button */
    .hackathon-section, .comments-section {
      background-color: #e0e4ff;
      padding: 20px;
      border-radius: 10px;
      width: 45%;
      text-align: center;
    }
    .section-title {
      font-weight: bold;
      margin-bottom: 10px;
    }
    .section-image {
      width: 100%;
      max-width: 500px;
      border-radius: 10px;
      margin-bottom: 15px;
    }
    .view-all-button, .more-details-button {
      background-color: #239B56;
      color: white;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      margin-top: 10px;
      display: inline-block;
    }
    /* Floating Chat Icon */
    .chat-icon {
      position: fixed;
      bottom: 20px;
      left: 20px;
      background-color: #239B56;
      color: white;
      padding: 15px;
      border-radius: 50%;
      font-size: 24px;
      cursor: pointer;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }
    .chat-icon:hover {
      background-color: #1e7a40;
    }
    /* Lower Section - Quotes */
    .quotes-section {
      background-color: #fff;
      padding: 20px;
      text-align: center;
      margin: 20px;
      border-radius: 10px;
      font-style: italic;
    }
    .quote {
      margin: 10px 0;
      color: #555;
    }
  </style>
</head>
<body>

  <!-- Top Bar with Account Icon -->
  <div class="top-bar">
    <h1>HackNav - Navigate Your Next Hackathon</h1>
    <div></div>
    <a href="signup.php" class="account-icon">👤 Account</a>
  </div>

  <!-- Main Container -->
  <div class="container">
    <!-- Left Section: Image with Centered Button -->
    <div class="hackathon-section">
      <div class="section-title">Upcoming Hackathons</div>
      <img src="i1.jpg" alt="Hackathon" class="section-image">
      <center><a href="upcoming_hackathons.php" class="view-all-button">View All Hackathons</a></center>
    </div>

    <!-- Right Section: Image with Centered Button -->
    <div class="comments-section">
      <div class="section-title">Participant Stories</div>
      <img src="i2.jpg" alt="Participant Feedback" class="section-image">
      <center><a href="past_hackathons.php" class="more-details-button">More Reviews & Ideas</a></center>
    </div>
  </div>

  <!-- Lower Section: Quotes or Lines about Hackathons -->
  <div class="content">
    <h1>About Hackathons</h1>
    <p>Hackathons are dynamic events that bring together individuals from various backgrounds to collaborate intensively on projects, often within a limited time frame, typically 24 to 48 hours. These events are a hotbed of innovation and creativity, fostering an environment where ideas can come to life rapidly. Participants, often including software developers, designers, project managers, and subject matter experts, work in teams to develop solutions to specific challenges or to create new, innovative applications. The high-energy, fast-paced nature of hackathons encourages out-of-the-box thinking and problem-solving, pushing participants to their creative and technical limits.</p>
        
        <p>The importance of hackathons cannot be overstated. They provide a unique platform for individuals to hone their skills, learn new technologies, and gain hands-on experience in a collaborative setting. Hackathons are particularly valuable for students and early-career professionals, as they offer an opportunity to work on real-world problems, build a portfolio of projects, and network with peers and industry leaders. Moreover, these events often attract the attention of companies and recruiters looking for talented individuals who can thrive in high-pressure, innovative environments. For many participants, hackathons can lead to job offers, internships, or even the seed funding needed to turn their project into a startup.</p>
        
        <p>Participating in a hackathon requires a blend of technical and soft skills, as well as a clear strategy for collaboration and time management. Teams typically need to have a mix of roles, including developers to write the code, designers to craft the user experience, and project managers to keep the project on track. Effective communication is crucial, as is the ability to pivot and adapt quickly based on feedback and new insights. Access to resources such as development tools, APIs, and hardware can also play a significant role in a team’s success. Additionally, many hackathons provide mentors and workshops to help participants navigate challenges and learn new skills on the fly.</p>
        
        <p>In conclusion, hackathons are more than just a competition; they are a celebration of technology, creativity, and collaboration. They provide a fertile ground for innovation, personal growth, and community building. Whether you are looking to test your skills, launch a new product, or simply meet like-minded individuals, hackathons offer an unparalleled experience that can have lasting impacts on your career and personal development. By fostering a spirit of cooperation and innovation, hackathons help drive technological advancements and empower the next generation of problem solvers to tackle the world’s most pressing issues.</p>
    <!-- More content here -->
  </div>

  <!-- Floating Chat Icon -->
  <div class="chat-icon" onclick="window.location.href='contact_admin.php'">
    🤖
  </div>

</body>
</html>

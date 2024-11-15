<?php
// Include database connection
include 'config.php'; 

// Handle form submission to add new shortlisted participant
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get participant details from the form
    $participant_name = $_POST['participant_name'];
    $hackathon_name = $_POST['hackathon_name'];
    $idea = $_POST['idea'];
    $submission_date = $_POST['submission_date'];

    // Insert the new participant into the database
    $sql = "INSERT INTO shortlisted_participants (participant_name, hackathon_name, idea, submission_date) 
            VALUES ('$participant_name', '$hackathon_name', '$idea', '$submission_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Participant added to the shortlist successfully!</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

// Fetch the list of shortlisted participants from the database
$sql = "SELECT participant_name, hackathon_name, idea, submission_date FROM shortlisted_participants";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortlisted Participants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .header {
            background-color: #6200ea;
            color: white;
            padding: 20px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 10;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 60%;
        }

        input, textarea, button {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            background-color: #6200ea;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #4a00b4;
        }

        .shortlist-block {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .shortlist-card {
            background-color: #fff;
            padding: 15px;
            width: 45%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .shortlist-card h3 {
            margin-top: 0;
        }

        .shortlist-card p {
            margin: 5px 0;
        }

        .shortlist-card .idea {
            text-align: left;
            margin-top: 15px;
        }

    </style>
</head>
<body>

    <!-- Header with Add Shortlisted Form -->
    <div class="header">
        <h1>Add New Shortlisted Participant</h1>
    </div>

    <!-- Main Content Container -->
    <div class="container">
        <!-- Form to add a new shortlisted participant -->
        <div class="form-container">
            <form action="shortlist.php" method="POST">
                <input type="text" name="participant_name" placeholder="Participant Name" required>
                <input type="text" name="hackathon_name" placeholder="Hackathon Name" required>
                <textarea name="idea" placeholder="Idea Description" required rows="5"></textarea>
                <input type="date" name="submission_date" required>
                <button type="submit">Add Participant</button>
            </form>
        </div>

        <h2>Shortlisted Participants</h2>

        <!-- Display list of shortlisted participants -->
        <div class="shortlist-block">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='shortlist-card'>
                            <h3>" . htmlspecialchars($row['participant_name']) . "</h3>
                            <p><strong>Hackathon:</strong> " . htmlspecialchars($row['hackathon_name']) . "</p>
                            <p><strong>Submission Date:</strong> " . htmlspecialchars($row['submission_date']) . "</p>
                            <div class='idea'>
                                <p><strong>Idea:</strong> " . htmlspecialchars($row['idea']) . "</p>
                            </div>
                          </div>";
                }
            } else {
                echo "<p>No shortlisted participants found</p>";
            }
            ?>
        </div>
    </div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

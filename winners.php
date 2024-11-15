<?php
// Include database connection
include 'config.php'; 

// Handle form submission to add new winner
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get winner name, hackathon name, date, and idea from the form
    $winner_name = $_POST['winner_name'];
    $hackathon_name = $_POST['hackathon_name'];
    $date = $_POST['date'];
    $idea = $_POST['idea'];

    // Insert the new winner into the database
    $sql = "INSERT INTO winners (winner_name, hackathon_name, date, idea) 
            VALUES ('$winner_name', '$hackathon_name', '$date', '$idea')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Winner added successfully!</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

// Fetch the list of winners from the database
$sql = "SELECT winner_name, hackathon_name, date, idea FROM winners";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winners List</title>
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
            gap: 10px;
        }

        input, button {
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

        .winner-block {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .winner-card {
            background-color: #fff;
            padding: 15px;
            width: 45%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .winner-card h3 {
            margin-top: 0;
        }

        .winner-card p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <!-- Header with Add Winner Form -->
    <div class="header">
        <h1>Previous Champions</h1>
        <div class="form-container">
            <button type="submit">Add Winner</button>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="container">
        <!-- Form to add a new winner -->

        <h2>Past Hackathon Winners</h2>

        <!-- Display list of winners -->
        <div class="winner-block">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='winner-card'>
                            <h3>" . htmlspecialchars($row['winner_name']) . "</h3>
                            <p><strong>Hackathon:</strong> " . htmlspecialchars($row['hackathon_name']) . "</p>
                            <p><strong>Date:</strong> " . htmlspecialchars($row['date']) . "</p>
                            <p><strong>Idea:</strong> " . htmlspecialchars($row['idea']) . "</p>
                          </div>";
                }
            } else {
                echo "<p>No winners found</p>";
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

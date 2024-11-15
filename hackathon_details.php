<?php
// Include the database configuration
include 'config.php';

// Get the event ID from the URL
$id = $_GET['id'];

// Query the database for the event details
$sql = "SELECT * FROM hackathons WHERE id = $id";
$result = $conn->query($sql);

// Check if any results were found
if ($result->num_rows > 0) {
    // Fetch the event data
    $row = $result->fetch_assoc();
} else {
    echo "No details found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['name']); ?> | Hackathon Details</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Basic styling for the event details page */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .container {
            display: flex;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .poster-container {
            width: 50%;
            height: 400px;
            background-color: #333;
        }

        .poster-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .details-container {
            width: 50%;
            padding: 30px;
            background-color: #fff;
            color: #333;
        }

        .details-container h2 {
            font-size: 32px;
            color: #6A0DAD;
            margin-bottom: 15px;
        }

        .details-container p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .details-container p strong {
            color: #6A0DAD;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6A0DAD;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #4B0082;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Event Poster Section -->
        <div class="poster-container">
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
        </div>

        <!-- Event Details Section -->
        <div class="details-container">
            <h2><?php echo htmlspecialchars($row['name']); ?></h2>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
            <p><strong>Date:</strong> <?php echo htmlspecialchars($row['date']); ?></p>
            <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
            
            <!-- Back Button -->
            <a href="upcoming_hackathons.php" class="back-button">Back to Listings</a>
        </div>
    </div>

</body>
</html>

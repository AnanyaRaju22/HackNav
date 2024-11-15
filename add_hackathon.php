<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "INSERT INTO hackathons (name, location, date, description, image) VALUES ('$name', '$location', '$date', '$description', '$image')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New hackathon created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Hackathon</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form action="add_hackathon.php" method="POST">
        <label for="name">Hackathon Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required>
        <button type="submit">Add Hackathon</button>
    </form>
</body>
</html>

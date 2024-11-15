<?php
include 'config.php';

// Fetch search query and filter criteria from URL if they exist
$search = isset($_GET['search']) ? $_GET['search'] : '';
$venue = isset($_GET['venue']) ? $_GET['venue'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$duration = isset($_GET['duration']) ? $_GET['duration'] : '';
$accommodation = isset($_GET['accommodation']) ? $_GET['accommodation'] : '';
$entry_fee = isset($_GET['entry_fee']) ? $_GET['entry_fee'] : '';
$domain = isset($_GET['domain']) ? $_GET['domain'] : '';

// Build the SQL query with the filters
$sql = "SELECT * FROM hackathons WHERE name LIKE '%$search%'";

if ($venue) {
    $sql .= " AND venue LIKE '%$venue%'";
}
if ($date) {
    $sql .= " AND date='$date'";
}
if ($location) {
    $sql .= " AND location LIKE '%$location%'";
}
if ($duration) {
    $sql .= " AND duration='$duration'";
}
if ($accommodation) {
    $sql .= " AND accommodation LIKE '%$accommodation%'";
}
if ($entry_fee) {
    $sql .= " AND entry_fee='$entry_fee'";
}
if ($domain) {
    $sql .= " AND domain LIKE '%$domain%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Hackathons</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Inline styles can go here, or you can use your external CSS */
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
        .add-event {
            background-color: #0A8A00;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .search-bar {
            padding: 10px;
            display: flex;
            justify-content: center;
            background-color: #fff;
        }
        .search-bar input {
            width: 300px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .search-bar button {
            padding: 8px 12px;
            margin-left: 10px;
            border-radius: 5px;
            background-color: #6A0DAD;
            color: white;
            border: none;
            cursor: pointer;
        }
        .filter-button {
            background-color: #6A0DAD;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }
        .filter-form {
            display: none;
            flex-direction: column;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .filter-form input, .filter-form select {
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .container {
            padding: 20px;
        }
        .hackathon-box {
            display: flex;
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: black;
        }
        .hackathon-image {
            width: 150px;
            height: 150px;
            background-color: #dcdcdc;
            border-radius: 5px;
            margin-right: 20px;
            background-size: cover;
            background-position: center;
        }
        .hackathon-info h2 {
            margin: 0;
            font-size: 20px;
        }
        .hackathon-info p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }
    </style>
    <script>
        function toggleFilterForm() {
            const filterForm = document.getElementById('filterForm');
            if (filterForm.style.display === 'none' || filterForm.style.display === '') {
                filterForm.style.display = 'flex';
            } else {
                filterForm.style.display = 'none';
            }
        }
    </script>
</head>
<body>

    <!-- Topbar Section -->
    <div class="topbar">
        <h1>Upcoming Hackathons</h1>
        <a href="add_hackathon.php" class="add-event">+ Add Event</a>
    </div>

    <!-- Search Bar Section -->
    <div class="search-bar">
        <form method="GET" action="upcoming_hackathons.php">
            <input type="text" name="search" placeholder="Search Hackathons" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
            <button type="button" class="filter-button" onclick="toggleFilterForm()">Filter</button>
        </form>
    </div>

    <!-- Filter Form Section -->
    <div id="filterForm" class="filter-form">
        <form method="GET" action="upcoming_hackathons.php">
            <input type="text" name="search" placeholder="Search Hackathons" value="<?php echo htmlspecialchars($search); ?>">
            <input type="text" name="venue" placeholder="Venue" value="<?php echo htmlspecialchars($venue); ?>">
            <input type="date" name="date" placeholder="Date" value="<?php echo htmlspecialchars($date); ?>">
            <input type="text" name="location" placeholder="Location" value="<?php echo htmlspecialchars($location); ?>">
            <input type="text" name="duration" placeholder="Duration" value="<?php echo htmlspecialchars($duration); ?>">
            <input type="text" name="accommodation" placeholder="Accommodation" value="<?php echo htmlspecialchars($accommodation); ?>">
            <input type="text" name="entry_fee" placeholder="Entry Fee" value="<?php echo htmlspecialchars($entry_fee); ?>">
            <input type="text" name="domain" placeholder="Domain" value="<?php echo htmlspecialchars($domain); ?>">
            <button type="submit">Apply Filters</button>
        </form>
    </div>

    <!-- Hackathon List Section -->
    <div class="container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="hackathon-box" onclick="location.href='hackathon_details.php?id=<?php echo $row['id']; ?>'">
                    <div class="hackathon-image" style="background-image: url('<?php echo $row['image']; ?>');"></div>
                    <div class="hackathon-info">
                        <h2><?php echo $row['name']; ?></h2>
                        <p>Location: <?php echo $row['location']; ?></p>
                        <p>Date: <?php echo $row['date']; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hackathons found.</p>
        <?php endif; ?>
    </div>
    <!-- FAQ Box Section -->
<div class="container">
    <div class="faq-box" onclick="location.href='faq.php'">
        <h2>Frequently Asked Questions (FAQs)</h2>
        <p>Click here to see the most common questions about hackathon participation.</p>
    </div>
</div>

<style>
    .faq-box {
        background-color: #fff;
        padding: 15px;
        margin-top: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        color: black;
    }
    .faq-box h2 {
        margin: 0;
        font-size: 20px;
    }
    .faq-box p {
        color: #555;
        font-size: 16px;
    }
</style>


</body>
</html>

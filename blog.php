<?php
// Include database connection
include 'config.php'; 

// Handle form submission to add new blog post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get blog post details from the form
    $blog_title = $_POST['blog_title'];
    $blog_content = $_POST['blog_content'];
    $author_name = $_POST['author_name'];
    $date = $_POST['date'];

    // Insert the new blog post into the database
    $sql = "INSERT INTO blog_posts (title, content, author_name, date) 
            VALUES ('$blog_title', '$blog_content', '$author_name', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Blog post added successfully!</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

// Fetch the list of blog posts from the database
$sql = "SELECT title, content, author_name, date FROM blog_posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
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

        .blog-block {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .blog-card {
            background-color: #fff;
            padding: 15px;
            width: 45%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .blog-card h3 {
            margin-top: 0;
        }

        .blog-card p {
            margin: 5px 0;
        }

        .blog-card .content {
            text-align: left;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <!-- Header with Add Blog Form -->
    <div class="header">
        <h1>Add New Blog Post</h1>
    </div>

    <!-- Main Content Container -->
    <div class="container">
        <!-- Form to add a new blog post -->
        <div class="form-container">
            <form action="blog.php" method="POST">
                <input type="text" name="blog_title" placeholder="Blog Title" required>
                <textarea name="blog_content" placeholder="Blog Content" required rows="5"></textarea>
                <input type="text" name="author_name" placeholder="Author Name" required>
                <input type="date" name="date" required>
                <button type="submit">Add Blog Post</button>
            </form>
        </div>

        <h2>Latest Blog Posts</h2>

        <!-- Display list of blog posts -->
        <div class="blog-block">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='blog-card'>
                            <h3>" . htmlspecialchars($row['title']) . "</h3>
                            <p><strong>By:</strong> " . htmlspecialchars($row['author_name']) . "</p>
                            <p><strong>Date:</strong> " . htmlspecialchars($row['date']) . "</p>
                            <div class='content'>
                                <p>" . htmlspecialchars($row['content']) . "</p>
                            </div>
                          </div>";
                }
            } else {
                echo "<p>No blog posts found</p>";
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

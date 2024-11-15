<?php
// Include the database configuration file (config.php)
include 'config.php';

// Initialize success and error messages
$successMessage = '';
$errorMessage = '';

// Handle POST request for Login and Sign Up
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle Sign Up
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); // In production, use a stronger hash like password_hash() and password_verify()

        // SQL query to insert the user into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            $successMessage = 'Sign up successful!';
        } else {
            $errorMessage = 'Error: ' . $conn->error;
        }
    }

    // Handle Login
    elseif (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']); // In production, use a stronger hash like password_hash() and password_verify()

        // SQL query to check user credentials
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $successMessage = 'Successfully Logged In!';
        } else {
            $errorMessage = 'Login failed. Invalid email or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            padding: 30px;
            text-align: center;
            position: relative;
        }
        h2 {
            color: #444;
            margin-bottom: 20px;
        }
        .form-container {
            display: none;
        }
        .form-container.active {
            display: block;
        }
        .toggle-buttons {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .toggle-buttons button {
            width: 48%;
            padding: 10px;
            background-color: #6200ea;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .toggle-buttons button:hover {
            background-color: #4a00b4;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border 0.3s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="number"]:focus {
            border-color: #6200ea;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .success-message, .error-message {
            display: none;
            padding: 10px;
            color: #fff;
            border-radius: 5px;
            margin-top: 10px;
            font-weight: bold;
            transition: opacity 0.3s;
        }
        .success-message.show {
            background-color: #28a745;
            display: block;
        }
        .error-message.show {
            background-color: #dc3545;
            display: block;
        }
    </style>
    <script>
        function toggleForm(formType) {
            document.getElementById('loginForm').classList.remove('active');
            document.getElementById('signupForm').classList.remove('active');
            if (formType === 'login') {
                document.getElementById('loginForm').classList.add('active');
            } else {
                document.getElementById('signupForm').classList.add('active');
            }
            document.getElementById('successMessage').classList.remove('show');
            document.getElementById('errorMessage').classList.remove('show');
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Do you want to Login or Sign Up?</h2>
    <div class="toggle-buttons">
        <button onclick="toggleForm('login')">Login</button>
        <button onclick="toggleForm('signup')">Sign Up</button>
    </div>

    <!-- Success or Error Message -->
    <?php if (!empty($successMessage)): ?>
        <div id="successMessage" class="success-message show"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    <?php if (!empty($errorMessage)): ?>
        <div id="errorMessage" class="error-message show"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <!-- Login Form -->
    <div id="loginForm" class="form-container active">
        <form action="index.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
    </div>

    <!-- Sign Up Form -->
    <div id="signupForm" class="form-container">
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="signup" value="Sign Up">
        </form>
    </div>
</div>

</body>
</html>

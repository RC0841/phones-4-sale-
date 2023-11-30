<?php
session_start();

$host = "localhost";
$username = "2010604";
$password = "Choudhury1212";
$database = "db2010604";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user id']) && isset($_POST['password'])) {
        $username = $_POST['user_id'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$user_id' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $_SESSION['user id'] = $user_id;
            header("Location: dashboard.php");
            exit();
        } else {
            $login_error = "Invalid username or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phones 4 Sale - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #4caf50;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #4caf50;
            display: inline-block;
            padding-bottom: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        p {
            margin-top: 16px;
            text-align: center;
            font-size: 14px;
        }
        a {
            color: #4caf50;
            text-decoration: none;
            margin-top: 20px;
            display: block;
            text-align: center;
            font-size: 14px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h2>Login</h2>
        <?php if(isset($login_error)) { echo "<p style='color: red;'>$login_error</p>"; } ?>
        <label for="username">User ID:</label>
        <input type="text" id="user id" name="user id" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>

    <!-- Home Button -->
    <a href="home.php">Home</a>
</body>
</html>


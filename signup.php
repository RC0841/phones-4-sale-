<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Phones 4 Sale</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #f5f5f5 50%, #d9d9d9 50%);
            color: #333;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4caf50;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container input[type="submit"] {
            width: calc(100% - 18px);
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .form-container input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        p.success,
        p.error {
            text-align: center;
            margin-top: 10px;
            padding: 8px;
            border-radius: 3px;
        }

        p.success {
            background-color: #d4edda;
            color: #155724;
        }

        p.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Sign Up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="text" name="user_id" placeholder="User ID" required>
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Sign Up">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_POST['user_id'];
        $fullname = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $host = "localhost";
        $username = "2010604";
        $password_db = "Choudhury1212";
        $database = "db2010604";

        $conn = new mysqli($host, $username, $password_db, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO Users (user_id, `full name`, `Email`, `Password`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $user_id, $fullname, $email, $password);

        if ($stmt->execute()) {
            echo "<p class='success'>Account successfully created!</p>";
        } else {
            echo "<p class='error'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</div>

</body>
</html>


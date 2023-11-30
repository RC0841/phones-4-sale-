<?php
$signup_success = false; // Flag to track signup success

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to your database
    $host = "localhost";
    $username = "2010604";
    $db_password = "Choudhury1212";
    $database = "db2010604";

    $conn = new mysqli($host, $username, $db_password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute your SQL insert query
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $signup_success = true; // Set the flag to true upon successful signup
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        /* Your existing styles */
        /* Updated confetti styles */
        .confetti {
            width: 8px;
            height: 8px;
            background-color: #f00; /* Adjust the color as needed */
            position: absolute;
            top: 0;
            left: 0;
            animation: confettiAnimation 3s infinite;
            pointer-events: none;
        }

        @keyframes confettiAnimation {
            0% {
                transform: translateY(0) rotate(0);
                opacity: 1;
            }
            100% {
                transform: translateY(400px) rotate(720deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <?php
    if ($signup_success) {
        // Trigger the confetti animation if signup was successful
        echo "<div class='confetti'></div>";
    }
    ?>

    <!-- Your signup form -->
    <form method="post" action="">
        <!-- Your form fields -->
        <input type="text" name="fullname" placeholder="Full Name" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Sign Up">
    </form>

    <script>
        // Check if the signup was successful and trigger confetti
        window.onload = function() {
            const signupSuccess = <?php echo $signup_success ? 'true' : 'false'; ?>;
            if (signupSuccess) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                document.body.appendChild(confetti);
                setTimeout(() => {
                    confetti.remove();
                }, 3000);
            }
        };
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phones 4 Sale</title>
    <style>
        /* Your CSS styles go here */
    </style>
</head>
<body>

<?php
$host = "localhost";
$username = "2010604";
$password = "Choudhury1212";
$database = "db2010604";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM `Phones 4 Sale` WHERE 
            Product_ID LIKE '%$search%' OR 
            Brand LIKE '%$search%' OR 
            Model LIKE '%$search%' OR 
            Stock LIKE '%$search%' OR 
            Price LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM `Phones 4 Sale`";
}

$result = $conn->query($sql);

?>

    <h2>Phones 4 Sale</h2>

    <form method='GET' action=''>
        <label for='search'>Search:</label>
        <input type='text' id='search' name='search' placeholder='Enter search term'>
        <input type='submit' value='Search'>
    </form>

    <?php
    if (isset($result) && $result !== false) {
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Product ID</th><th>Brand</th><th>Model</th><th>Stock</th><th>Price</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Product_ID"] . "</td>";
                echo "<td>" . $row["Brand"] . "</td>";
                echo "<td>" . $row["Model"] . "</td>";
                echo "<td>" . $row["Stock"] . "</td>";
                echo "<td>" . $row["Price"] . "</td>";
                // Add image column if applicable
                // echo "<td><img src='" . $row["Image"] . "' alt='Phone Image'></td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<p><a href='javascript:history.go(-1)'>Back</a></p>";
        } else {
            echo "<p>No results found</p>";
        }
    } else {
        echo "Error: Unable to retrieve data";
    }

    // Close the connection
    $conn->close();
    ?>

</body>
</html>

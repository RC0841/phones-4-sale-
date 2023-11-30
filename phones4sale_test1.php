<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phones 4 Sale</title>
    <style>
        /* Your existing styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #f5f5f5 50%, #d9d9d9 50%);
        }
        h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 20px;
            color: #4caf50;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 2px solid #4caf50;
            display: inline-block;
            padding-bottom: 5px;
        }
        /* Other styles remain the same */
        table {
            font-size: 22px;
            width: 80%;
            margin: 0 auto;
        }
        th, td {
            text-align: center;
            padding: 10px;
        }
        td.image-cell {
            width: 150px;
            height: 150px;
        }
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .accounts-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .signup-btn {
            display: block;
            margin-top: 20px;
            text-align: center;
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        button.add-to-basket {
            padding: 8px 16px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button.add-to-basket:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = array();
}

// Database connection details
$host = "localhost";
$username = "2010604";
$password = "Choudhury1212";
$database = "db2010604";

$conn = new mysqli($host, $username, $password, $database);

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

if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    echo "<h2>Phones 4 Sale</h2>";

    echo "<form method='GET' action=''>";
    echo "<label for='search'>Search:</label>";
    echo "<input type='text' id='search' name='search' placeholder='Enter search term'>";
    echo "<input type='submit' value='Search'>";
    echo "</form>";

    echo "<a href='user_accounts.php'><button class='accounts-btn'>Accounts</button></a>";
    echo "<a href='signup.php' class='signup-btn'><button>Sign Up</button></a>";

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Product ID</th><th>Image</th><th>Brand</th><th>Model</th><th>Stock</th><th>Price</th><th>Basket</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Product_ID"] . "</td>";
            echo "<td class='image-cell'>";
            if (isset($row["Image"])) {
                echo "<img src='" . $row["Image"] . "' alt='Product Image'>";
            } else {
                echo "No image available";
            }
            echo "</td>";
            echo "<td>" . $row["Brand"] . "</td>";
            echo "<td>" . $row["Model"] . "</td>";
            echo "<td>" . $row["Stock"] . "</td>";
            echo "<td>" . $row["Price"] . "</td>";
            echo "<td><button class='add-to-basket' onclick='addToBasket(" . $row["Product_ID"] . ", \"" . $row["Brand"] . "\", \"" . $row["Model"] . "\", " . $row["Stock"] . ", " . $row["Price"] . ")'>Add to Basket</button></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }
}

$conn->close();
?>

<div>
    <!-- View Basket Button -->
    <form action="customer_basket.php" method="post">
        <!-- Add any customer details as hidden inputs -->
        <input type="hidden" name="customer_id" value="CUSTOMER_ID">
        <input type="hidden" name="name" value="CUSTOMER_NAME">
        <input type="hidden" name="email" value="CUSTOMER_EMAIL">
        <input type="submit" value="View Basket">
    </form>
</div>

<script>
    function addToBasket(productId, brand, model, stock, price) {
        var product = {
            id: productId,
            brand: brand,
            model: model,
            stock: stock,
            price: price
        };

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "customer_basket.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert('Your device has been added to the basket. Thank you!');
            }
        };
        xhr.send(JSON.stringify({ product: product }));
    }
</script>
</body>
</html>

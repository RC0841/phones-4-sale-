<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f7f7f7;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 20px;
            color: #4caf50;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 2px solid #4caf50;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-from-basket,
        .add-to-basket,
        .clear-basket {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 5px;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .delete-from-basket {
            background-color: #f44336;
            color: white;
        }

        .add-to-basket {
            background-color: #4caf50;
            color: white;
        }

        .clear-basket {
            background-color: #ff9800;
            color: white;
        }

        .btn-back {
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: #333;
            color: white;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-right: 5px;
        }

        .btn-back:hover {
            background-color: #555;
        }

        .total-price {
            text-align: right;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <!-- Your existing HTML content and PHP logic -->
    <div class="container">
        <h2>Your Basket</h2>

        <table>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php
            $servername = "localhost";
            $username = "2010604";
            $password = "Choudhury1212";
            $dbname = "db2010604";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM `Phones 4 Sale`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Brand"] . "</td>";
                    echo "<td>" . $row["Model"] . "</td>";
                    echo "<td>" . $row["Stock"] . "</td>";
                    echo "<td>" . $row["Price"] . "</td>";
                    echo "<td>";
                    echo "<button class='delete-from-basket' onclick='updateTotal(-" . $row["Price"] . ")'>Delete</button>";
                    echo "<button class='add-to-basket' onclick='updateTotal(" . $row["Price"] . ")'>Add to Basket</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </table>

        <p class="total-price">Total Price: <span id="totalPrice">$0</span></p>

        <button class="clear-basket" onclick="clearBasket()">Clear Basket</button>

        <a href="home.php" class="btn-back">Back to Shop</a>
    </div>

    <script>
        // Check if there's any saved total price in localStorage
        let totalPrice = localStorage.getItem('basketTotal') ? parseFloat(localStorage.getItem('basketTotal')) : 0;
        const totalPriceSpan = document.getElementById('totalPrice');

        // Update the total price display
        totalPriceSpan.textContent = `$${totalPrice}`;

        function updateTotal(price) {
            // Update the total price
            totalPrice += price;
            totalPriceSpan.textContent = `$${totalPrice}`;

            // Save the updated total price in localStorage
            localStorage.setItem('basketTotal', totalPrice.toString());
        }

        function clearBasket() {
            // Clear the total price
            totalPrice = 0;
            totalPriceSpan.textContent = `$${totalPrice}`;

            // Remove the total price from localStorage
            localStorage.removeItem('basketTotal');
        }
    </script>
</body>

</html>

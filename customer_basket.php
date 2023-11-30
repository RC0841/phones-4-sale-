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

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-from-basket, .add-to-basket, .btn-back, .clear-basket {
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }

        .delete-from-basket {
            background-color: #f44336;
            color: white;
        }

        .add-to-basket {
            background-color: #4caf50;
            color: white;
        }

        .clear-basket, .btn-back {
            background-color: #333;
            color: white;
        }

        .clear-basket:hover, .btn-back:hover {
            background-color: #555;
        }

        .total-price {
            text-align: right;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 18px;
        }

        .notification {
            background-color: #e8f5e9;
            border-left: 5px solid #4caf50;
            padding: 10px;
            margin-bottom: 20px;
            color: #4caf50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Your Basket</h2>

        <div class="notification">
            <p>Product deleted from the basket successfully and stock level updated</p>
        </div>

        <table>
            <tr>
                <th>Product ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php
            // Your PHP code to fetch data from the database
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
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Product_ID"] . "</td>";
                    echo "<td>" . $row["Brand"] . "</td>";
                    echo "<td>" . $row["Model"] . "</td>";
                    echo "<td class='stock'>" . $row["Stock"] . "</td>";
                    echo "<td>$" . $row["Price"] . "</td>";
                    echo "<td>";
                    echo "<button class='delete-from-basket' onclick='updateTotal(-" . $row["Price"] . "," . $row["Product_ID"] . ")'>Delete</button>";
                    echo "<button class='add-to-basket' onclick='updateTotal(" . $row["Price"] . "," . $row["Product_ID"] . ")'>Add to Basket</button>";
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
        let totalPrice = 0;
        const totalPriceSpan = document.getElementById('totalPrice');

        function updateTotal(price, productId) {
            totalPrice += price;
            totalPriceSpan.textContent = `$${totalPrice}`;
            const stockElement = document.querySelector(`.stock[data-id='${productId}']`);
            const currentStock = parseInt(stockElement.textContent);
            stockElement.textContent = currentStock + (price > 0 ? -1 : 1);
        }

        function clearBasket() {
            const stockElements = document.querySelectorAll('.stock');
            stockElements.forEach(element => {
                element.textContent = "0";
            });
            totalPrice = 0;
            totalPriceSpan.textContent = `$${totalPrice}`;
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Phones 4 Sale!</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f8f8;
            color: #333;
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            text-align: center;
            padding: 50px 0;
            background-color: #4caf50;
            color: #fff;
        }

        header h1 {
            font-size: 3em;
            margin: 0;
        }

        /* Main Content Styles */
        main {
            padding: 20px;
            text-align: center;
        }

        main p {
            font-size: 1.2em;
            margin-top: 20px;
        }

        /* Button Styles */
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 0 10px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        /* Featured Products Section */
        .featured-products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 40px;
        }

        .product-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 15px;
            width: 300px;
            text-align: center;
            transition: box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .product-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 200px;
            height: auto;
            margin-bottom: 15px;
            border-radius: 5px;
            transition: transform 0.5s ease;
        }

        .product-card:hover img {
            transform: scale(1.1);
        }

        .product-card h3 {
            font-size: 1.5em;
            margin-top: 10px;
        }

        .product-card p {
            font-size: 1.1em;
            margin-bottom: 15px;
        }

        /* Footer Styles */
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: #fff;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

<!-- Header Section -->
<header>
    <h1>Welcome to Phones 4 Sale!</h1>
</header>

<!-- Main Content Section -->
<main>
    <p>Discover the latest in smartphone technology, incredible savings, and outstanding customer support.</p>
    <div class="btn-container">
        <a href="signup.php" class="btn">Sign up</a>
        <a href="user_accounts.php" class="btn">Accounts</a>
        <a href="phones4sale_test1.php" class="btn">Products</a>
    </div>

    <!-- Featured Products Section -->
    <section class="featured-products">
        <div class="product-card">
            <img src="https://boutique.heathrow.com/dw/image/v2/BDNX_PRD/on/demandware.static/-/Sites-retailer_in-motion-master-catalog/default/dwbdbc8231/images/hi-res/in-motion/03285305%20(2).jpg" alt="Iphone 14 Pro">
            <h3>Iphone 14 Pro</h3>
            <p>The iPhone 14 Pro and Pro Max feature a Super Retina XDR OLED display with a typical maximum brightness of 1,000 nits. However, it can go all the way up to 1,600 nits while watching HDR videos, and 2,000 nits outdoors. The display has a refresh rate of 120 Hz and uses LTPO technology.</p>
            <a href="phones4sale_test1.php" class="btn">View Details</a>
        </div>

        <div class="product-card">
            <img src="https://static-www.o2.co.uk/sites/default/files/samsung-z-flip4-grey-sku-header-190722.png" alt="Samsung Galaxy Z Flip 4">
            <h3>Samsung Galaxy Z Flip 4</h3>
            <p>The Galaxy Z Flip 4 has two screens: its foldable inner 6.7-inch display with a 120 Hz variable refresh rate and its 1.9-inch cover display. The device has 8 GB of RAM, and either 128 GB, 256 GB or 512 GB of UFS 3.1 flash storage, with no support for expanding the device's storage capacity via micro-SD cards</p>
            <a href="phones4sale_test1.php" class="btn">View Details</a>
			<a href='customer_basket.php' class='basket-button'><button>Basket</button></a>
        </div>
		

        <!-- Add more product cards as needed -->
    </section>
</main>

<!-- Footer Section -->
<footer>
    <p>&copy; 2023 Phones 4 Sale. All rights reserved.</p>
</footer>

</body>
</html>

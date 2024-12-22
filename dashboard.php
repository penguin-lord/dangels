<?php
session_start();
include 'db.php';
// Redirect to login page if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch user details (replace with your DB logic if necessary)
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "User";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #007BFF;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .product {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .product img {
            max-width: 100%;
            border-radius: 8px;
        }
        .product h3 {
            font-size: 20px;
            margin: 15px 0;
        }
        .product p {
            color: #555;
        }
        .product .price {
            font-size: 18px;
            color: #007BFF;
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .logout {
            text-align: right;
            margin-top: 20px;
        }
        .logout a {
            color: #007BFF;
            text-decoration: none;
        }
        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
    </header>

    <div class="container">
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>

        <h1>Our Products</h1>
        <div class="products">
            <?php
            // Example product list
            $products = [
                ["name" => "Product 1", "price" => "10.00", "image" => "https://via.placeholder.com/150"],
                ["name" => "Product 2", "price" => "20.00", "image" => "https://via.placeholder.com/150"],
                ["name" => "Product 3", "price" => "30.00", "image" => "https://via.placeholder.com/150"],
                ["name" => "Product 4", "price" => "40.00", "image" => "https://via.placeholder.com/150"],
            ];

            foreach ($products as $product) {
                echo "<div class='product'>";
                echo "<img src='" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['name']) . "'>";
                echo "<h3>" . htmlspecialchars($product['name']) . "</h3>";
                echo "<p class='price'>$" . htmlspecialchars($product['price']) . "</p>";
                echo "<a href='#' class='btn'>Add to Cart</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>

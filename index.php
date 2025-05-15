<?php
// Require user to be logged in
include 'auth.php';
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fast Food POS</title>
    <link rel="stylesheet" type="text/css" href="css.php">

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f9f9f9;
        }
        h1, h2 {
            color: #333;
        }
        .logout {
            float: right;
            margin-top: -50px;
        }
        .product {
            border: 1px solid #ccc;
            background: white;
            display: inline-block;
            width: 220px;
            margin: 15px;
            padding: 10px;
            text-align: center;
            vertical-align: top;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: relative;
            height: 300px; /* Ensure enough height for the content */
        }
        .product img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 300px;
            padding: 6px;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-top: 10px;
            display: block;
            margin-left: auto;  /* Center horizontally */
            margin-right: auto; /* Center horizontally */
        }
        button {
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #28a745;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        h2 {
            margin-top: 20px;
        }
        form {
            margin-top: 20px;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;  /* Align the products in the center */
        }
    </style>
</head>
<body>

<div class="header-bar">
    <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <a class="logout" href="logout.php">Logout</a>
</div>

<h2>Place a Customer Order</h2>

<form method="post" action="submit_order.php">
    <label for="customer_name">Customer Name:</label>
    <input type="text" name="customer_name" id="customer_name" required>

    <h3>Select Products:</h3>

    <div class="product-container">
    <?php
    $result = $conn->query("SELECT * FROM products ORDER BY name ASC");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            
            // Show image if exists
            if (!empty($row['image'])) {
                echo '<img src="images/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '">';
            } else {
                echo '<img src="images/default.jpg" alt="No Image">';
            }

            echo '<label>' . htmlspecialchars($row['name']) . '<br>(Rs. ' . number_format($row['price'], 2) . ')</label><br>';
            echo '<input type="number" name="qty[' . $row['id'] . ']" min="0" value="0">';
            echo '</div>';
        }
    } else {
        echo "<p>No products available.</p>";
    }

    $conn->close();
    ?>
    </div>

    <button type="submit">Submit Order</button>
</form>

</body>
</html>




<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'pos_db'; // Ensure this matches your database name

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Total sales of the current month
$currentMonth = date('Y-m');
$salesQuery = "
    SELECT SUM(oi.quantity * p.price) AS total_sales
    FROM order_items oi
    JOIN products p ON oi.product_id = p.id
    JOIN orders o ON oi.order_id = o.id
    WHERE DATE_FORMAT(o.order_date, '%Y-%m') = '$currentMonth'
";
$salesResult = $conn->query($salesQuery);
$salesRow = $salesResult->fetch_assoc();
$totalSales = $salesRow['total_sales'] ?? 0;

// Most sold product
$mostSoldQuery = "
    SELECT p.name, SUM(oi.quantity) AS total_quantity
    FROM order_items oi
    JOIN products p ON oi.product_id = p.id
    GROUP BY oi.product_id
    ORDER BY total_quantity DESC
    LIMIT 1
";
$mostSoldResult = $conn->query($mostSoldQuery);
$mostSoldRow = $mostSoldResult->fetch_assoc();
$mostSoldName = $mostSoldRow['name'] ?? 'N/A';
$mostSoldQty = $mostSoldRow['total_quantity'] ?? 0;

// Total orders
$totalOrdersQuery = "SELECT COUNT(*) as total_orders FROM orders";
$totalOrdersResult = $conn->query($totalOrdersQuery);
$totalOrders = $totalOrdersResult->fetch_assoc()['total_orders'];

// Total quantity sold
$totalQtyQuery = "SELECT SUM(quantity) AS total_qty FROM order_items";
$totalQtyResult = $conn->query($totalQtyQuery);
$totalQty = $totalQtyResult->fetch_assoc()['total_qty'];

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sales Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }

        .dashboard {
            width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        td strong {
            color: #333;
        }
    </style>
</head>

<body>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .beautiful-button {
            background-color: #3498db;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .beautiful-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <h1>Welcome to the Dashboard</h1>

    
    
</body>
</html>

    <div class="dashboard">
        <h1>Sales Dashboard</h1>
        <table>
            <tr>
                <th>Metric</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Total Sales (This Month)</td>
                <td><strong>Rs. <?= number_format($totalSales, 2) ?></strong></td>
            </tr>
            <tr>
                <td>Most Sold Product</td>
                <td><strong><?= $mostSoldName ?> (<?= $mostSoldQty ?> sold)</strong></td>
            </tr>
            <tr>
                <td>Total Orders</td>
                <td><strong><?= $totalOrders ?></strong></td>
            </tr>
            <tr>
                <td>Total Quantity Sold</td>
                <td><strong><?= $totalQty ?></strong></td>
            </tr>
        </table>
    </div>
<a href="login.php" class="beautiful-button">Back to Login</a>

</body>
</html>

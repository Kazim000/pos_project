<?php
session_start();
include 'db.php';

// Restrict access to logged-in users only
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

// ✅ Handle "Mark as Done" action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['done_order_id'])) {
    $order_id = (int)$_POST['done_order_id'];

    // Ensure this order belongs to the logged-in chef
    $check_stmt = $conn->prepare("SELECT id FROM orders WHERE id = ? AND assigned_to = ?");
    $check_stmt->bind_param("is", $order_id, $username);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $update_stmt = $conn->prepare("UPDATE orders SET status = 'done' WHERE id = ?");
        $update_stmt->bind_param("i", $order_id);
        $update_stmt->execute();
        $update_stmt->close();
    }

    $check_stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chef Orders</title>
<link rel="stylesheet" href="style.css">

    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        .order-box { border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; }
        .pending { background-color: #fff4e5; }
        .done { background-color: #e6ffe6; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background-color: #f0f0f0; }
        h2 { margin-top: 40px; }
        form button { padding: 6px 12px; margin-top: 10px; }
    </style>
</head>
<body>

<h1>Orders Assigned to You (<?= htmlspecialchars($username) ?>)</h1>
<!DOCTYPE html>
<html>
<head>
    
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
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .beautiful-button:hover {
            background-color: #2980b9;
        }

        .button-container {
            text-align: right;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Right-aligned Button -->
    <div class="button-container">
        <a href="login.php" class="beautiful-button">Back to Login</a>
    </div>

  

</body>
</html>


</body>
</html>






<?php
function showOrders($conn, $username, $status_label) {
    $stmt = $conn->prepare("
        SELECT o.id AS order_id, o.customer_name, o.created_at, o.status
        FROM orders o
        WHERE o.assigned_to = ? AND o.status = ?
        ORDER BY o.created_at DESC
    ");
    $stmt->bind_param("ss", $username, $status_label);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<p>No $status_label orders found.</p>";
    }

    while ($order = $result->fetch_assoc()) {
        $css_class = $status_label === 'pending' ? 'pending' : 'done';
        echo "<div class='order-box $css_class'>";
        echo "<h3>Order ID: {$order['order_id']} | Customer: " . htmlspecialchars($order['customer_name']) . "</h3>";
        echo "<p>Status: {$order['status']} | Placed At: {$order['created_at']}</p>";

        $item_stmt = $conn->prepare("
            SELECT p.name, oi.quantity
            FROM order_items oi
            JOIN products p ON oi.product_id = p.id
            WHERE oi.order_id = ?
        ");
        $item_stmt->bind_param("i", $order['order_id']);
        $item_stmt->execute();
        $items_result = $item_stmt->get_result();

        echo "<table><tr><th>Product</th><th>Quantity</th></tr>";
        while ($item = $items_result->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($item['name']) . "</td><td>{$item['quantity']}</td></tr>";
        }
        echo "</table>";

        // ✅ Mark as done form
        if ($status_label === 'pending') {
            echo "<form method='post'>";
            echo "<input type='hidden' name='done_order_id' value='{$order['order_id']}'>";
            echo "<button type='submit'>Mark as Done</button>";
            echo "</form>";
        }

        echo "</div>";
        $item_stmt->close();
    }

    $stmt->close();
}

echo "<h2>Pending Orders</h2>";
showOrders($conn, $username, 'pending');

echo "<h2>Completed Orders</h2>";
showOrders($conn, $username, 'done');

$conn->close();
?>

</body>
</html>

<?php
include 'auth.php';
include 'db.php';

$order_id = (int)($_GET['order_id'] ?? 0);
if ($order_id <= 0) {
    echo "Invalid order ID.";
    exit;
}

// Get order
$order = $conn->query("SELECT * FROM orders WHERE id = $order_id")->fetch_assoc();
if (!$order) {
    echo "Order not found.";
    exit;
}

// Get order items
$sql = "SELECT p.name, p.price, oi.quantity
        FROM order_items oi
        JOIN products p ON oi.product_id = p.id
        WHERE oi.order_id = $order_id";
$result = $conn->query($sql);

$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Receipt</title>
    <style>
        body { font-family: Arial; padding: 30px; }
        h1 { color: #333; }
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border: 1px solid #ccc; text-align: left; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <h1>Order Receipt</h1>
    <p><strong>Order ID:</strong> <?= $order_id ?></p>
    <p><strong>Customer Name:</strong> <?= htmlspecialchars($order['customer_name']) ?></p>
    <p><strong>Created By:</strong> <?= htmlspecialchars($order['created_by']) ?></p>
    <table>
        <tr><th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>
        <?php while ($row = $result->fetch_assoc()): 
            $subtotal = $row['price'] * $row['quantity'];
            $total += $subtotal;
        ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['quantity'] ?></td>
            <td>Rs. <?= number_format($row['price'], 2) ?></td>
            <td>rS. <?= number_format($subtotal, 2) ?></td>
        </tr>
        <?php endwhile; ?>
        <tr class="total">
            <td colspan="3">Total</td>
            <td>$<?= number_format($total, 2) ?></td>
        </tr>
    </table>
    <p><a href="index.php">← Place Another Order</a></p>
</body>
</html>
<?php $conn->close(); ?>

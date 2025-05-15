<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = isset($_POST['customer_name']) ? trim($_POST['customer_name']) : '';
    $quantities = isset($_POST['qty']) ? $_POST['qty'] : [];

    // Validation
    if ($customer_name === '') {
        echo "<p style='color:red;'>Please enter a customer name.</p>";
        echo "<a href='index.php'>Back</a>";
        exit;
    }

    $has_quantity = false;
    foreach ($quantities as $qty) {
        if ((int)$qty > 0) {
            $has_quantity = true;
            break;
        }
    }
    if (!$has_quantity) {
        echo "<p style='color:red;'>Please enter quantity for at least one product.</p>";
        echo "<a href='index.php'>Back</a>";
        exit;
    }

    // Create order
    $created_by = $_SESSION['username'];
    $status = 'pending';
    $assigned_to = 'chef'; // All orders go to chef

    $stmt = $conn->prepare("INSERT INTO orders (customer_name, created_by, assigned_to, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $customer_name, $created_by, $assigned_to, $status);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // Save items
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
    foreach ($quantities as $product_id => $qty) {
        $qty = (int)$qty;
        if ($qty > 0) {
            $stmt->bind_param("iii", $order_id, $product_id, $qty);
            $stmt->execute();
        }
    }
    $stmt->close();

    // Fetch order items for receipt
    $item_stmt = $conn->prepare("
        SELECT p.name, p.price, oi.quantity
        FROM order_items oi
        JOIN products p ON oi.product_id = p.id
        WHERE oi.order_id = ?
    ");
    $item_stmt->bind_param("i", $order_id);
    $item_stmt->execute();
    $items = $item_stmt->get_result();

    // Receipt output
    echo '<!DOCTYPE html><html><head><title>Receipt</title>';
    echo '<link rel="stylesheet" href="style.css">';
    echo '</head><body><div class="container">';
    echo "<h1>Receipt</h1>";
    echo "<p><strong>Order ID:</strong> $order_id</p>";
    echo "<p><strong>Customer:</strong> " . htmlspecialchars($customer_name) . "</p>";
    echo "<p><strong>Time:</strong> " . date("Y-m-d H:i:s") . "</p>";

    echo "<table><tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th></tr>";
    $grand_total = 0;
    while ($row = $items->fetch_assoc()) {
        $name = htmlspecialchars($row['name']);
        $qty = (int)$row['quantity'];
        $price = (float)$row['price'];
        $total = $qty * $price;
        $grand_total += $total;

        echo "<tr><td>$name</td><td>$qty</td><td>Rs. $price</td><td>Rs. $total</td></tr>";

    }
    echo "<tr><td colspan='3'><strong>Grand Total</strong></td><td><strong>Rs. $grand_total</strong></td></tr>";
    echo "</table>";

    echo "<br><button onclick='window.print()'>🖨️ Print Receipt</button>";
    echo "<br><br><a href='index.php'>Place Another Order</a>";
    echo "</div></body></html>";
} else {
    echo "Invalid request.";
}

$conn->close();
?>

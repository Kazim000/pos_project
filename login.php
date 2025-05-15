<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = SHA2(?, 256)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['username'] = $user['username'];

        // ✅ Redirect based on role (username)
        if ($username === 'chef') {
            header("Location: chef_orders.php");
        } else {
            header("Location: index.php"); // Default to order screen
        }
        exit;
    } else {
        echo "<p style='color:red;'>Invalid login. Try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - POS</title>
<link rel="stylesheet" href="style.css">

    <style>
        body { font-family: Arial; padding: 40px; }
        form { max-width: 300px; margin: auto; }
        input { display: block; margin-bottom: 10px; padding: 8px; width: 100%; }
    </style>
</head>
<body>

<h2>Login</h2>

<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
<div style="text-align: center; margin-top: 20px;">
    <a href="dashboard.php" class="btn">View Dashboard</a>
</div>


</body>
</html>

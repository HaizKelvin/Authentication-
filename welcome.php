<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | COMPUTING Auth System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Welcome</h1>
    <div class="card">
        <p class="note" style="font-size: 1.1rem; margin-bottom: 20px;">
            Hello, <strong style="color: #667eea;"><?php echo htmlspecialchars($_SESSION['full_name']); ?></strong>!
        </p>
        <p class="note" style="margin-bottom: 20px;">
            You are successfully logged into the COMPUTING Auth System.
        </p>
        <div style="display: flex; gap: 10px;">
            <a href="logout.php" style="flex: 1;"><button class="login" style="margin: 0;">Sign Out</button></a>
            <a href="users.php" style="flex: 1;"><button class="login" style="margin: 0; background: #48bb78;">View Users</button></a>
        </div>
    </div>
</div>
</body>
</html>

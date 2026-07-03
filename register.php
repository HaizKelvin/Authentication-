<?php
session_start();
require_once 'db_connect.php';
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';

    if (!$full_name || !$username || !$email || !$password || !$confirm) {
        $error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } else {
        $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ? OR email = ?');
        $stmt->execute([$username, $email]);
        if ($stmt->fetch()) {
            $error = 'Username or email already exists.';
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = $pdo->prepare('INSERT INTO users (full_name, username, email, password_hash) VALUES (?, ?, ?, ?)');
            if ($insert->execute([$full_name, $username, $email, $password_hash])) {
                $message = '✓ Registration successful! You can now log in.';
                $full_name = $username = $email = '';
            } else {
                $error = 'Registration failed. Please try again.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | COMPUTING Auth System</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const isPassword = field.type === 'password';
            field.type = isPassword ? 'text' : 'password';
        }
    </script>
</head>
<body>
<div class="container">
    <h1>Create Account</h1>
    <div class="welcome-banner">
        <p>Join us and create your account</p>
    </div>
    <?php if ($message): ?>
        <div class="message success"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="message error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form method="post" action="register.php">
        <div class="card">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" placeholder="your full name" value="<?php echo htmlspecialchars($full_name ?? ''); ?>" required autofocus>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="choose a username" value="<?php echo htmlspecialchars($username ?? ''); ?>" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="your email address" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>

            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" placeholder="minimum 6 characters" required>
                <button type="button" class="toggle-password" onclick="togglePassword('password')">
                    <svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </button>
            </div>

            <label for="confirm_password">Confirm Password</label>
            <div class="password-wrapper">
                <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm password" required>
                <button type="button" class="toggle-password" onclick="togglePassword('confirm_password')">
                    <svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </button>
            </div>

            <button type="submit" class="register">Create Account</button>
        </div>
    </form>
    <div class="link-row">
        Already have an account? <a href="login.php">🔐 Sign In</a> · <a href="reset_password.php">🔑 Forgot Password?</a>
    </div>
</div>
</body>
</html>

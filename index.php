<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPUTING Auth System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .container {
            max-width: 600px;
        }
        
        .welcome-section {
            text-align: center;
        }
        
        .welcome-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }
        
        .welcome-text {
            color: #2d3748;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .nav-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 30px;
        }
        
        .nav-buttons a {
            text-decoration: none;
        }
        
        .nav-btn {
            padding: 16px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .nav-btn-primary {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            color: white;
        }
        
        .nav-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.4);
        }
        
        .nav-btn-secondary {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
        }
        
        .nav-btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(72, 187, 120, 0.4);
        }
        
        .nav-btn-info {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            color: white;
        }
        
        .nav-btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(237, 137, 54, 0.4);
        }
        
        .status-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .status-link a {
            color: #4299e1;
            text-decoration: none;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }
        
        .status-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Welcome to COMPUTING</h1>
        <div class="welcome-section">
            <div class="welcome-icon">🔐</div>
            <p class="welcome-text">
                Professional Authentication System with secure user management, password encryption, and real-time data tracking.
            </p>
            
            <div class="nav-buttons">
                <a href="login.php"><button class="nav-btn nav-btn-primary">Sign In</button></a>
                <a href="register.php"><button class="nav-btn nav-btn-secondary">Register</button></a>
                <a href="users.php"><button class="nav-btn nav-btn-info">View Users</button></a>
                <a href="db_status.php"><button class="nav-btn nav-btn-info">DB Status</button></a>
            </div>
            
            <div class="status-link">
                <p style="color: #718096; font-size: 12px; margin-top: 20px;">
                    System Status: <strong style="color: #48bb78;">✓ Operational</strong>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

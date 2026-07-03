<?php
require_once 'db_connect.php';

$users = [];
$total_users = 0;
$error = '';

try {
    // Get all users
    $stmt = $pdo->query("SELECT id, full_name, username, email, created_at FROM users ORDER BY created_at DESC");
    $users = $stmt->fetchAll();
    $total_users = count($users);
} catch (Exception $e) {
    $error = 'Error fetching users: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Dashboard | COMPUTING Auth</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .container {
            max-width: 1000px;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.2) 0%, rgba(72, 187, 120, 0.2) 100%);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: #4299e1;
        }
        
        .stat-label {
            font-size: 13px;
            color: #718096;
            text-transform: uppercase;
            margin-top: 5px;
            letter-spacing: 0.5px;
        }
        
        .users-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .users-table thead {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
        }
        
        .users-table th {
            padding: 16px;
            text-align: left;
            color: white;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .users-table td {
            padding: 16px;
            border-bottom: 1px solid #e2e8f0;
            color: #2d3748;
            font-size: 14px;
        }
        
        .users-table tbody tr {
            transition: background 0.2s ease;
        }
        
        .users-table tbody tr:hover {
            background: rgba(66, 153, 225, 0.05);
        }
        
        .users-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .user-id {
            font-weight: 600;
            color: #4299e1;
        }
        
        .user-name {
            font-weight: 600;
            color: #2d3748;
        }
        
        .user-email {
            color: #718096;
            word-break: break-all;
        }
        
        .user-date {
            color: #a0aec0;
            font-size: 12px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 12px;
            margin-top: 20px;
        }
        
        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }
        
        .empty-state-text {
            color: #718096;
            font-size: 16px;
        }
        
        .table-wrapper {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.4);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(72, 187, 120, 0.4);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="dashboard-header">
        <h1>Users Dashboard</h1>
        <p class="note">View all registered users in the system</p>
    </div>
    
    <?php if ($error): ?>
        <div class="message error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <div class="stats">
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_users; ?></div>
            <div class="stat-label">Total Users</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo $total_users > 0 ? '✓' : '○'; ?></div>
            <div class="stat-label">Active System</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">SQLite</div>
            <div class="stat-label">Database Type</div>
        </div>
    </div>
    
    <?php if ($total_users > 0): ?>
        <div class="table-wrapper">
            <table class="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Registered Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="user-id">#<?php echo htmlspecialchars($user['id']); ?></td>
                            <td class="user-name"><?php echo htmlspecialchars($user['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td class="user-email"><?php echo htmlspecialchars($user['email']); ?></td>
                            <td class="user-date">
                                <?php 
                                    $date = new DateTime($user['created_at']);
                                    echo $date->format('M d, Y g:i A');
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <div class="empty-state-icon">📭</div>
            <div class="empty-state-text">No users registered yet. <a href="register.php">Register now</a></div>
        </div>
    <?php endif; ?>
    
    <div class="action-buttons">
        <a href="login.php" class="btn btn-primary">← Back to Login</a>
        <a href="register.php" class="btn btn-secondary">+ Add New User</a>
    </div>
</div>
</body>
</html>

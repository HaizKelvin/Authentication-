<?php
require_once 'db_connect.php';

$db_status = [];
$db_path = __DIR__ . '/auth_system.db';

// Check database file
$db_status['file_exists'] = file_exists($db_path);
$db_status['file_size'] = $db_status['file_exists'] ? filesize($db_path) : 0;
$db_status['file_readable'] = $db_status['file_exists'] && is_readable($db_path);
$db_status['file_writable'] = $db_status['file_exists'] && is_writable($db_path);

// Check connection
try {
    $db_status['connection'] = true;
    
    // Check users table
    $stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='users'");
    $db_status['users_table'] = $stmt->fetch() ? true : false;
    
    // Get user count
    if ($db_status['users_table']) {
        $stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
        $result = $stmt->fetch();
        $db_status['user_count'] = $result['count'] ?? 0;
        
        // Get table info
        $stmt = $pdo->query("PRAGMA table_info(users)");
        $db_status['columns'] = $stmt->fetchAll();
    }
} catch (Exception $e) {
    $db_status['connection'] = false;
    $db_status['error'] = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Status | COMPUTING Auth</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .status-info {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 10px;
            margin: 10px 0;
        }
        .status-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .status-row:last-child {
            border-bottom: none;
        }
        .status-label {
            font-weight: 600;
            color: #2d3748;
        }
        .status-value {
            color: #4a5568;
        }
        .success {
            color: #22863a;
        }
        .failure {
            color: #cb2431;
        }
        .columns-list {
            background: #f6f8fa;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .back-link {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Database Status</h1>
    
    <div class="card">
        <div class="status-info">
            <div class="status-row">
                <span class="status-label">Database File:</span>
                <span class="status-value <?php echo $db_status['file_exists'] ? 'success' : 'failure'; ?>">
                    <?php echo $db_status['file_exists'] ? '✓ Exists' : '✗ Missing'; ?>
                </span>
            </div>
            
            <div class="status-row">
                <span class="status-label">File Size:</span>
                <span class="status-value">
                    <?php echo $db_status['file_size'] > 0 ? number_format($db_status['file_size']) . ' bytes' : '0 bytes'; ?>
                </span>
            </div>
            
            <div class="status-row">
                <span class="status-label">File Readable:</span>
                <span class="status-value <?php echo $db_status['file_readable'] ? 'success' : 'failure'; ?>">
                    <?php echo $db_status['file_readable'] ? '✓ Yes' : '✗ No'; ?>
                </span>
            </div>
            
            <div class="status-row">
                <span class="status-label">File Writable:</span>
                <span class="status-value <?php echo $db_status['file_writable'] ? 'success' : 'failure'; ?>">
                    <?php echo $db_status['file_writable'] ? '✓ Yes' : '✗ No'; ?>
                </span>
            </div>
            
            <div class="status-row">
                <span class="status-label">Connection:</span>
                <span class="status-value <?php echo $db_status['connection'] ? 'success' : 'failure'; ?>">
                    <?php echo $db_status['connection'] ? '✓ Connected' : '✗ Failed'; ?>
                </span>
            </div>
            
            <?php if ($db_status['connection']): ?>
                <div class="status-row">
                    <span class="status-label">Users Table:</span>
                    <span class="status-value <?php echo $db_status['users_table'] ? 'success' : 'failure'; ?>">
                        <?php echo $db_status['users_table'] ? '✓ Exists' : '✗ Missing'; ?>
                    </span>
                </div>
                
                <div class="status-row">
                    <span class="status-label">Total Users:</span>
                    <span class="status-value">
                        <?php echo isset($db_status['user_count']) ? $db_status['user_count'] : '0'; ?>
                    </span>
                </div>
                
                <?php if (!empty($db_status['columns'])): ?>
                    <div class="columns-list">
                        <strong>Table Columns:</strong>
                        <ul style="margin: 10px 0 0 20px;">
                            <?php foreach ($db_status['columns'] as $col): ?>
                                <li><?php echo $col['name'] . ' (' . $col['type'] . ')'; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
            <?php if (isset($db_status['error'])): ?>
                <div class="status-row failure">
                    <strong>Error:</strong>
                    <?php echo htmlspecialchars($db_status['error']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="link-row back-link">
        <a href="login.php">← Back to Login</a>
    </div>
</div>
</body>
</html>

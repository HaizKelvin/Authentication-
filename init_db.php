<?php
$db_path = __DIR__ . '/auth_system.db';

try {
    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Enable foreign keys
    $pdo->exec("PRAGMA foreign_keys = ON");
    
    // Create users table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            full_name TEXT NOT NULL,
            username TEXT NOT NULL UNIQUE,
            email TEXT NOT NULL UNIQUE,
            password_hash TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");
    
    // Verify table was created
    $stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='users'");
    $table = $stmt->fetch();
    
    if ($table) {
        // Get table info
        $stmt = $pdo->query("PRAGMA table_info(users)");
        $columns = $stmt->fetchAll();
        
        echo "✓ Database initialized successfully!\n";
        echo "✓ Database file: " . $db_path . "\n";
        echo "✓ Users table created with " . count($columns) . " columns\n";
        echo "\nTable structure:\n";
        foreach ($columns as $col) {
            echo "  - " . $col['name'] . " (" . $col['type'] . ")\n";
        }
    } else {
        die('Failed to create users table');
    }
    
} catch (PDOException $e) {
    die('Database initialization failed: ' . htmlspecialchars($e->getMessage()));
}
?>

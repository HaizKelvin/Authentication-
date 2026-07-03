# COMPUTING Authentication System - Setup Guide

## Prerequisites
- PHP 7.4 or higher
- MySQL Server running
- Local server (Apache/PHP built-in server)

## Database Setup

### Step 1: Initialize Database
Run the database initialization script:
```bash
php init_db.php
```

Expected output: `Database and users table created successfully.`

### Step 2: Database Credentials (if needed)
Edit `db_connect.php` if your MySQL setup is different:
```php
$host = 'localhost';
$db   = 'COMPUTING';
$user = 'root';
$pass = ''; // Add password if needed
```

## Running the Application

### Option A: PHP Built-in Server (Recommended for testing)
```bash
php -S localhost:8000
```
Then open: http://localhost:8000

### Option B: Apache
Copy files to your Apache www directory and access via your configured domain.

## Features
1. **Register** - Create a new account with email and password
2. **Login** - Sign in with username/password
3. **Welcome** - View protected page after login
4. **Reset Password** - Change forgotten password via email
5. **Logout** - End session

## Testing Credentials
After running `init_db.php`, create a test account using the Register page.

## Troubleshooting
- **Database Connection Error**: Ensure MySQL is running and credentials in `db_connect.php` are correct
- **Session Errors**: Check that PHP sessions are enabled
- **File Not Found**: Ensure all files are in the same directory

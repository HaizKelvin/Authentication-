# Commands to Run Your Authentication System

## Step 1: Install PHP (Choose Your OS)

### Windows
1. Download PHP from: https://www.php.net/downloads
2. Extract to `C:\php` or similar
3. Add to PATH (System Environment Variables)
4. Verify: Open Command Prompt and run:
```cmd
php --version
```

### macOS (with Homebrew)
```bash
brew install php
php --version
```

### Linux (Ubuntu/Debian)
```bash
sudo apt update
sudo apt install php
php --version
```

### Linux (Fedora/CentOS)
```bash
sudo yum install php
php --version
```

---

## Step 2: Start Your Application

Navigate to the project directory:
```bash
cd /home/kelvin/Assignments/COMPUTING_auth_system
```

Start the PHP development server:
```bash
php -S localhost:8000
```

You should see:
```
Development Server (http://localhost:8000) started
```

---

## Step 3: Access the Application

Open your browser and go to:
- **http://localhost:8000**

Or directly to:
- **http://localhost:8000/login.php** - Login page
- **http://localhost:8000/register.php** - Register page
- **http://localhost:8000/reset_password.php** - Reset password

---

## Step 4: Test the Features

### Register a New Account
1. Click "Register"
2. Fill in: Full Name, Username, Email, Password
3. Click "Register"

### Login
1. Use the credentials you just created
2. Click "Login"
3. You'll see the Welcome page

### Logout
1. Click "Logout" button
2. You'll be redirected to login page

### Reset Password
1. From login page, click "Reset Password"
2. Enter your registered email
3. Enter new password and confirm
4. Click "Reset Password"

---

## Troubleshooting

### "php: command not found"
- PHP is not installed or not in PATH
- Install PHP using the commands above
- On Windows, restart your terminal after installing

### "Access denied" error
- Already fixed! We're now using SQLite instead of MySQL
- SQLite database file creates automatically at: `auth_system.db`

### Port 8000 already in use
Try a different port:
```bash
php -S localhost:8001
php -S localhost:3000
php -S localhost:5000
```

### Database issues
Delete the database file and restart:
```bash
rm auth_system.db  # On Linux/Mac
del auth_system.db # On Windows Command Prompt
```

---

## Files Overview

| File | Purpose |
|------|---------|
| `register.php` | User registration page |
| `login.php` | User login page |
| `welcome.php` | Protected page (requires login) |
| `reset_password.php` | Password reset page |
| `logout.php` | Logout handler |
| `db_connect.php` | SQLite database connection |
| `style.css` | Styling |
| `auth_system.db` | SQLite database (auto-created) |

---

## Stop the Server

Press `Ctrl+C` in the terminal to stop the PHP server.

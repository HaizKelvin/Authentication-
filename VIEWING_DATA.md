# How to View Your Database Records

Your authentication system now has multiple ways to view registered user data:

## 1. Users Dashboard (Recommended)
**URL:** `http://localhost:8000/users.php`

Features:
- View all registered users in a beautiful table format
- See user ID, Full Name, Username, Email, Registration Date
- Real-time user count statistics
- Shows total registered users

## 2. Database Status Page
**URL:** `http://localhost:8000/db_status.php`

Features:
- Database file location and size
- Connection status
- Table structure information
- File permissions (readable/writable)
- Total user count

## 3. Home Page
**URL:** `http://localhost:8000/` or `http://localhost:8000/index.php`

Features:
- Navigation hub for the entire system
- Quick links to:
  - Sign In page
  - Register page
  - Users Dashboard
  - Database Status

## How the Data is Recorded

### When a user registers:
1. Full name, username, email are stored
2. Password is hashed using PHP's PASSWORD_DEFAULT algorithm
3. Automatic timestamp recorded (created_at)
4. Data stored in SQLite database: `auth_system.db`

### When a user logs in:
1. Username looked up in database
2. Password verified against stored hash
3. Session created with user ID and full name
4. User redirected to welcome page

## Quick Access Path

1. **Start:** `http://localhost:8000/`
2. **Register:** Click "Register" button → fill form → submit
3. **View Data:** Click "View Users" button or go to `/users.php`
4. **Sign In:** Click "Sign In" button → use credentials
5. **Check Status:** Click "DB Status" button or go to `/db_status.php`

## Database File Location

- **File:** `/home/kelvin/Assignments/COMPUTING_auth_system/auth_system.db`
- **Type:** SQLite 3
- **Size:** Automatically grows as users register
- **Format:** Binary file (not human-readable as text)

## To Reset the Database

If you want to start fresh:

```bash
# Remove the database file
rm auth_system.db

# Restart PHP server - it will create a new empty database
php -S localhost:8000
```

## Features

✓ User registration with validation
✓ Secure password hashing
✓ User login with session management
✓ Password reset functionality
✓ Real-time user dashboard
✓ Database status monitoring
✓ Automatic timestamp tracking
✓ SQLite database (no server needed)

Enjoy your authentication system!

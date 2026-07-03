# COMPUTING Authentication System

A professional PHP-based user authentication system with SQLite database, secure password hashing, and modern UI design.

## ✨ Features

- 🔐 **Secure Authentication** - Password hashing with PHP PASSWORD_DEFAULT
- 📝 **User Registration** - Email validation, password confirmation
- 🔄 **Password Reset** - Recover account by email
- 👁️ **Password Visibility Toggle** - Eye icon to show/hide passwords
- 📊 **User Dashboard** - View all registered users in real-time
- 📱 **Responsive Design** - Works on desktop, tablet, mobile
- 🎨 **Modern UI** - Glassmorphism with Zetech campus background
- 💾 **SQLite Database** - Zero-config, file-based, no server needed

## 📁 Files Included

- `db_connect.php` — SQLite database connection and initialization
- `register.php` — Registration page with validation
- `login.php` — Login page with authentication
- `reset_password.php` — Password recovery
- `welcome.php` — Authenticated user dashboard
- `users.php` — View all registered users with statistics
- `db_status.php` — Database health and status monitoring
- `style.css` — Modern styling with animations
- `index.php` — Home/landing page with navigation
- `auth_system.db` — SQLite database (auto-created)

## 🚀 Quick Start

### Local Development (Recommended for Testing)

1. **Start PHP Server**
   ```bash
   cd /home/kelvin/Assignments/COMPUTING_auth_system
   php -S localhost:8000
   ```

2. **Access the Application**
   ```
   http://localhost:8000
   ```

3. **Register & Login**
   - Click "Register" to create an account
   - Click "Sign In" to login with your credentials
   - Click "View Users" to see all registered users

### Database Initialization

The database auto-creates on first run. To manually initialize:

```bash
php init_db.php
```

To check database status:

```bash
php db_status.php
# Or visit: http://localhost:8000/db_status.php
```

## 📚 System Usage

| Page | URL | Purpose |
|------|-----|---------|
| Home | `/` | Navigation hub |
| Register | `/register.php` | Create new account |
| Login | `/login.php` | Sign in to account |
| Welcome | `/welcome.php` | User dashboard (after login) |
| Users | `/users.php` | View all registered users |
| Reset | `/reset_password.php` | Recover forgotten password |
| DB Status | `/db_status.php` | Database information |

## 💾 Database Structure

**Table:** `users`

| Column | Type | Description |
|--------|------|-------------|
| id | INTEGER PRIMARY KEY | Auto-incrementing ID |
| full_name | TEXT | User's full name |
| username | TEXT UNIQUE | Login username |
| email | TEXT UNIQUE | Email address |
| password_hash | TEXT | Encrypted password |
| created_at | DATETIME | Registration timestamp |
| updated_at | DATETIME | Last update timestamp |

## 🌐 Deployment

**GitHub Pages:** NOT suitable (no PHP/database support)

### Recommended Hosting Platforms:

- **Railway.app** (EASIEST - Recommended)
- **Heroku**
- **Render.com**
- **Self-hosted with traditional web host**

[See DEPLOYMENT.md for full instructions](DEPLOYMENT.md)

## 🔧 Requirements

- PHP 7.4+ (tested on PHP 8.4.22)
- SQLite 3
- Modern web browser (Chrome, Firefox, Safari, Edge)

## 📖 Documentation

- [VIEWING_DATA.md](VIEWING_DATA.md) - How to access recorded data
- [DEPLOYMENT.md](DEPLOYMENT.md) - How to deploy to production
- [SETUP.md](SETUP.md) - Initial setup instructions
- [RUN_COMMANDS.md](RUN_COMMANDS.md) - Useful terminal commands

## 🎨 Design Features

- **Background:** Zetech campus image with dark overlay
- **Styling:** Glassmorphism (blur + transparency)
- **Colors:** Blue (#4299e1), Green (#48bb78), Orange (#ed8936)
- **Animations:** Smooth transitions and slide-up effects
- **Icons:** Eye icon for password visibility, emoji icons for links

## 🛡️ Security Features

- ✅ Prepared statements (SQL injection prevention)
- ✅ Password hashing with PASSWORD_DEFAULT
- ✅ Email validation (FILTER_VALIDATE_EMAIL)
- ✅ Duplicate username/email checking
- ✅ Session-based authentication
- ✅ Password length requirements (minimum 6 characters)
- ✅ PRAGMA foreign_keys enabled

## 🐛 Troubleshooting

**Database not found:**
```bash
php init_db.php
```

**Permission denied on auth_system.db:**
```bash
chmod 644 auth_system.db
chmod 755 .
```

**CSS not loading:**
- Ensure `style.css` is in the same directory
- Check browser console for 404 errors
- Clear browser cache (Ctrl+Shift+Delete)

**PHP command not found:**
```bash
which php
# If not found, install: sudo apt install php-cli
```

## 📝 License

This is an educational project for the COMPUTING system.

## 👨‍💻 Support

For issues or questions, check:
1. DEPLOYMENT.md (for hosting questions)
2. VIEWING_DATA.md (for database access)
3. SETUP.md (for setup issues)
4. RUN_COMMANDS.md (for terminal commands)

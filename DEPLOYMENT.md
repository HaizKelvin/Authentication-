# Deployment Guide - COMPUTING Auth System

## ⚠️ Important: GitHub Pages & PHP/Database Limitation

**GitHub Pages does NOT support:**
- PHP server-side execution
- SQLite or any database servers
- Server-side sessions
- Backend processing

**Your current system uses:**
- PHP backend ✓
- SQLite database ✓
- Server-side sessions ✓

## Deployment Options

### Option 1: Deploy to Heroku (RECOMMENDED FOR FULL FUNCTIONALITY) ✅

Heroku supports PHP + SQLite and is free (with limitations).

#### Steps:

1. **Install Heroku CLI**
   ```bash
   # On Linux
   curl https://cli-assets.heroku.com/install.sh | sh
   
   # Or using apt
   sudo apt install heroku
   ```

2. **Create Procfile** (tells Heroku how to run your app)
   ```bash
   echo 'web: php -S 0.0.0.0:${PORT:-8000}' > Procfile
   ```

3. **Initialize Git (if not already done)**
   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   ```

4. **Deploy to Heroku**
   ```bash
   heroku login
   heroku create your-app-name
   git push heroku main
   heroku open
   ```

5. **Verify Database**
   ```bash
   heroku run "sqlite3 auth_system.db '.schema'"
   ```

---

### Option 2: Deploy to Railway.app (RECOMMENDED - EASIEST) ✅

Railway is beginner-friendly and supports PHP + SQLite.

#### Steps:

1. **Sign up at:** https://railway.app

2. **Connect GitHub Repository**
   - Push code to GitHub first:
   ```bash
   git init
   git add .
   git commit -m "Auth system"
   git branch -M main
   git remote add origin https://github.com/your-username/COMPUTING_auth_system.git
   git push -u origin main
   ```

3. **Create Railway Project**
   - Go to Railway.app
   - Click "New Project"
   - Select "Deploy from GitHub"
   - Select your repository
   - Railway auto-detects PHP and deploys!

4. **View Live Site**
   - Railway provides a public URL automatically

---

### Option 3: Deploy to Render.com ✅

Render supports PHP and is easy to set up.

#### Steps:

1. **Sign up at:** https://render.com

2. **Create New Web Service**
   - Select "Web Service"
   - Connect GitHub repo
   - Set Runtime: PHP
   - Render handles the rest

---

### Option 4: Deploy Locally (EASIEST FOR NOW) 📱

Keep it running on your local machine or internal network.

#### Steps:

```bash
# Start server
cd /home/kelvin/Assignments/COMPUTING_auth_system
php -S localhost:8000

# Access at: http://localhost:8000
```

#### To access from other devices on your network:
```bash
# Find your local IP
hostname -I

# Start server on network interface
php -S 0.0.0.0:8000

# Access from other devices at: http://[YOUR-IP]:8000
```

---

### Option 5: Convert to Static Site with Firebase/Supabase (Advanced)

This converts your PHP backend to a cloud backend.

**Limitations:** More complex, requires JavaScript expertise

**Benefits:** Can be deployed to GitHub Pages

#### Architecture:
- Frontend: HTML + CSS + JavaScript → GitHub Pages
- Backend: Firebase/Supabase REST API
- Database: Cloud-hosted (Firebase Realtime DB or Supabase PostgreSQL)

*This requires significant refactoring of the codebase.*

---

## Database Backup & Migration

### Backup your database:
```bash
# Copy the SQLite file
cp auth_system.db auth_system_backup.db

# Or export to SQL
sqlite3 auth_system.db ".dump" > auth_system_backup.sql
```

### Restore from backup:
```bash
# From file
cp auth_system_backup.db auth_system.db

# From SQL dump
sqlite3 auth_system.db < auth_system_backup.sql
```

---

## Comparison Table

| Option | Cost | Setup Time | Database | PHP Support | Recommendation |
|--------|------|-----------|----------|-------------|-----------------|
| GitHub Pages | Free | 5 min | ❌ No | ❌ No | NOT suitable |
| Heroku | Free (limited) | 10 min | ✅ Yes | ✅ Yes | Good option |
| Railway | Free (limited) | 5 min | ✅ Yes | ✅ Yes | **BEST** |
| Render | Free (limited) | 10 min | ✅ Yes | ✅ Yes | Good option |
| Local/Network | Free | 2 min | ✅ Yes | ✅ Yes | Best for dev |
| Firebase/Supabase | Free (limited) | 30 min | ✅ Yes (cloud) | ❌ No (needs JS) | Advanced |

---

## Quick Start: Railway (Recommended)

1. **Push to GitHub:**
   ```bash
   git init
   git add .
   git commit -m "Auth system"
   git remote add origin https://github.com/YOUR-USERNAME/COMPUTING_auth_system.git
   git push -u origin main
   ```

2. **Go to:** https://railway.app
3. **Click:** New Project → Deploy from GitHub
4. **Select:** Your COMPUTING_auth_system repository
5. **Done!** Railway auto-deploys and provides a public URL

Your live site will be available at a URL like:
```
https://computing-auth-system-production.up.railway.app
```

Database works automatically! ✅

---

## Environment Variables

For cloud deployment, you may need to set environment variables:

**Heroku:**
```bash
heroku config:set APP_ENV=production
```

**Railway:**
- Set in Railway Dashboard under "Variables"

---

## Testing After Deployment

1. **Sign Up:** Create a test account
2. **Sign In:** Login with test credentials  
3. **View Users:** Go to `/users.php`
4. **Check DB:** Go to `/db_status.php`
5. **Reset Password:** Test password reset functionality

---

## Troubleshooting

### Database file not found
```bash
# Recreate database
php init_db.php
```

### Permission denied errors
```bash
# Fix permissions
chmod 644 auth_system.db
chmod 755 .
```

### PHP not found on server
- Use Railway or Heroku (both auto-detect PHP)
- They handle PHP setup automatically

### Database not persisting
- Railway and Heroku may reset filesystem
- Solution: Use Supabase PostgreSQL or Firebase Realtime DB for persistent storage

---

## Summary

✅ **For Full Functionality (PHP + Database):**
- Use **Railway.app** (simplest)
- Or Heroku, Render, or other PHP hosts

❌ **GitHub Pages is NOT suitable** because it:
- Only hosts static files (HTML, CSS, JS)
- Cannot run PHP
- Cannot access databases

**Recommendation:** Use Railway.app for easy deployment with full database support! 🚀

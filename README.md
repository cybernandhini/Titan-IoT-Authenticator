# Titan IoT Authenticator (v0.1)

**Private Authentication System for IoT-focused SMEs**  
Developed by Cyber Nandhini

---

## Overview
Titan IoT Authenticator is a lightweight, modular, and secure authentication system built using PHP and MySQL, designed specifically for small and medium-sized enterprises operating in IoT-driven environments. This system supports user and employee access levels, secure credential handling using Argon2, session management, and an extensible structure ready for OTP, audit logging, and IoT integration.

---

## Features
- Argon2ID-based password hashing
- Role-based login and redirection (User / Employee)
- Secure session handling and logout
- IoT context dashboard placeholders
- PDO-based database interaction
- Configurable using `.env` (local credentials)

---

## File Structure
```
├── index.php                    # Redirect to login
├── login.php                    # Login form
├── login_process.php            # Processes login request
├── logout.php                   # Terminates session
├── dashboard_user.php           # IoT user dashboard
├── dashboard_employee.php       # SME employee dashboard
├── config/
│   └── db.php                   # PDO DB connection using .env
├── logs/
│   └── access.log               # (optional) login activity log
├── user.sql                     # Users table SQL schema
├── .env                         # Environment credentials (not committed)
└── README.md                    # Project documentation
```

---

## Database Setup
1. Create a new MySQL database (e.g., `titan_iot`).
2. Import `user.sql` to generate the `users` table:
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'employee') DEFAULT 'user'
);
```

3. Add sample users or register manually.

---

## Environment Configuration
Create a `.env` file in the root directory:
```
DB_HOST=localhost
DB_NAME=titan_iot
DB_USER=root
DB_PASS=yourpassword
```
Ensure `vlucas/phpdotenv` is installed via Composer if used.

---

## Running the Application
Run the built-in PHP server in the root folder:
```bash
php -S localhost:8000
```
Then visit:
```
http://localhost:8000
```

---

## Roles
| Role       | Description                             |
|------------|-----------------------------------------|
| `user`     | Basic IoT dashboard access              |
| `employee` | SME admin dashboard, broader access     |

---

## Future Additions (Planned v0.2+)
- OTP Integration via Twilio or Email
- Session timeout / audit log tracking
- IoT energy flow visualizations (Solar/Grid/H2)
- Role permission matrix
- Docker deployment

---

## License
This is a private repository developed by Cyber Nandhini for SME authentication systems. Not open-source.

---

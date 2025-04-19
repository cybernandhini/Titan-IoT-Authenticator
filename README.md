TITAN IOT AUTHENTICATOR (V0.1)

Private Authentication System for IoT-focused SMEs  - Developed by    Cyber Nandhini

 OVERVIEW :

Titan IoT Authenticator    is a lightweight, secure, and modular authentication system tailored for Small and Medium-sized Enterprises (SMEs) operating within IoT environments. Built with PHP, MySQL (PDO), and Argon2ID for secure password hashing, this TRL 4-level prototype supports multiple roles (User, Employee), is easily extensible, and is structured for scalable deployment and IoT integration.

 FEATURES :

- Argon2ID-based    password hashing (OWASP-compliant)
- Role-based    login: `user`, `employee` (SME)
- Modular code structure for feature scaling (OTP, MFA, etc.)
- Environment configuration via `.env` file
- Secure session handling and logout
- Prepared for dashboard and activity logging
- Compatible with Docker, LAMP, GitHub Codespaces

 FILE STRUCTURE :

```
🔹 index.php                    # Redirect to login
🔹 login.php                    # Login form
🔹 login_process.php           # Processes login request securely
🔹 logout.php                  # Terminates session
🔹 dashboard_user.php          # IoT dashboard for user role
🔹 dashboard_employee.php      # Admin dashboard for SME employee
🔹 config/
├── db.php                  # PDO DB connection via .env
🔹 logs/
├── access.log              # Optional login activity tracking
🔹 user.sql                    # SQL schema for `users` table
🔹 .env                        # Local DB credentials (not versioned)
🔹 README.md                   # Project documentation
```

DATABSE SETUP :

1. Create a new MySQL database: `titan_iot`
2. Execute the following SQL to create the user table:
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'employee') DEFAULT 'user'
);
```
3. Manually insert test users, or build a `register.php` page for onboarding.

ENVIRONMENT CONFIGURATION :

Create a `.env` file in the root directory:
```
DB_HOST=localhost
DB_NAME=titan_iot
DB_USER=root
DB_PASS=yourpassword
```

> Requires [`vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv):
```bash
composer require vlucas/phpdotenv
```

RUNNING THE APPLICATION :

1. Navigate to project root.
2. Start PHP server:
```bash
php -S localhost:8000
```
3. Visit in browser:
```
http://localhost:8000
```

ROLES & ACCESS :

| Role       | Access Level                              |
|            |                                          -|
| `user`     | Standard IoT dashboard                    |
| `employee` | Administrative dashboard with wider access|

How Argon2ID Hashing Works

- Passwords are    never    stored or transmitted in plaintext.
- During registration, the password is hashed using:
```php
$passwordHash = password_hash($plainPassword, PASSWORD_ARGON2ID);
```
- During login, the stored hash is validated using:
```php
password_verify($submittedPassword, $passwordHashFromDB);
```
- This ensures that even if the database is compromised, original passwords are unrecoverable.

Roadmap (v0.2+)

- OTP Verification (Twilio / Email)
- Audit Logs & Role Matrix
- IoT Flow Dashboards (Solar/Grid/Hydrogen)
- Docker Image for quick deployment
- Admin-level User Management Interface

LICENSE :

This is a    private repository    maintained by    Cyber Nandhini    for pilot SME implementations and cybersecurity innovation. Not for commercial reuse or redistribution.

CONTACT :

- Developed by:    Cyber Nandhini     
- Lead Developer: Nandhini Thiruneelakandan
- mailto: cybernandhini@gmail.com

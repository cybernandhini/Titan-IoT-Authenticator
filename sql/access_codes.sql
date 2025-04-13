CREATE TABLE access_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    code VARCHAR(64) UNIQUE,
    role ENUM('user', 'employee') NOT NULL,
    used BOOLEAN DEFAULT 0,
    expires_at DATETIME
);

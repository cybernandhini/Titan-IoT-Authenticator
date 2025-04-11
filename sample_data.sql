
-- Insert sample access code (valid for 24 hours)
INSERT INTO access_codes (code, role, used, expires_at)
VALUES ('abc123xyz', 'user', 0, DATE_ADD(NOW(), INTERVAL 1 DAY));

-- Insert a sample admin user (password: admin123)
INSERT INTO users (email, password, phone, role)
VALUES (
    'admin@iotdemo.com',
    '$argon2id$v=19$m=65536,t=2,p=1$YWJjZGVmZw$5YfOTGMoKHH6WZNy1zKm5Y+OAiC3rXhdDYz8e2pzvA8', 
    '+1111111111',
    'admin'
);

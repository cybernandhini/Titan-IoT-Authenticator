<?php
require_once 'config/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $role = in_array($_POST['role'], ['user', 'employee']) ? $_POST['role'] : 'user';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } elseif (strlen($password) < 6) {
        $message = "Password must be at least 6 characters.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (email, password, role) VALUES (:email, :password, :role)");
            $stmt->execute([
                ':email' => $email,
                ':password' => $hashedPassword,
                ':role' => $role
            ]);
            $message = "Registration successful. You may now log in.";
        } catch (PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Titan IoT Authenticator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Register New User</h2>
    <?php if (!empty($message)): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="form-group">
            <label>Password (min 6 characters):</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <div class="form-group">
            <label>Role:</label>
            <select name="role" class="form-control">
                <option value="user">User</option>
                <option value="employee">Employee</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="login.php" class="btn btn-link">Back to Login</a>
    </form>
</div>
</body>
</html>

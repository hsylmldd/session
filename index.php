<?php
session_start();

// Data pengguna hardcoded
$users = [
    ['username' => 'admin', 'password' => 'admin123', 'role' => 'admin'],
    ['username' => 'user', 'password' => 'user123', 'role' => 'user'],
    ['username' => 'superadmin', 'password' => 'superadmin123', 'role' => 'superadmin']
];

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $isValid = false;

    // Periksa username, password, dan role
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password && $user['role'] === $role) {
            $_SESSION['user'] = $username;
            $_SESSION['role'] = $role;
            $isValid = true;
            break;
        }
    }

    if ($isValid) {
        // Redirect ke halaman sesuai role
        if ($role === 'admin') {
            header("Location: admin.php");
        } elseif ($role === 'user') {
            header("Location: user.php");
        } elseif ($role === 'superadmin') {
            header("Location: superadmin.php");
        }
        exit();
    } else {
        $error = 'Username, password, atau role salah.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="role">Role:</label><br>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="superadmin">Super Admin</option>
        </select><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>

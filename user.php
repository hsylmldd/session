<?php
session_start();

// Cek apakah pengguna sudah login dan role-nya user
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d1ecf1;
            color: #0c5460;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #0c5460;
        }
        .container {
            background: #bee5eb;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #0c5460;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #08414d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, User!</h1>
        <p>Access your account, manage your settings, and explore the content.</p>
        <!-- Tombol Logout -->
        <a href="?logout=true" class="btn">Logout</a>
    </div>
</body>
</html>

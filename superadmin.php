<?php
session_start();

// Cek apakah pengguna sudah login dan role-nya superadmin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'superadmin') {
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
    <title>Super Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d4edda;
            color: #155724;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #155724;
        }
        .container {
            background: #c3e6cb;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #155724;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #0f4018;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Super Admin!</h1>
        <p>Access all management tools and oversee platform operations.</p>
        <!-- Tombol Logout -->
        <a href="?logout=true" class="btn">Logout</a>
    </div>
</body>
</html>

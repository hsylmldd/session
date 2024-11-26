<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Simpan data ke dalam sesi
    $_SESSION['user'] = $user;
    $_SESSION['role'] = $role;

    // Redirect sesuai role
    if ($role === "admin") {
        header("Location: admin.php");
    } elseif ($role === "user") {
        header("Location: user.php");
    } elseif ($role === "superadmin") {
        header("Location: superadmin.php");
    } else {
        echo "Role tidak valid.";
    }
    exit();
}
?>

<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db.php';
?>

<?php include '../includes/header.php'; ?>
<h2 class="text-2xl font-bold mb-6">Student Dashboard</h2>
<p>Welcome to your dashboard!</p>

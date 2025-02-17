<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db.php';

$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $company_name = htmlspecialchars($_POST['company_name']);
    $location = htmlspecialchars($_POST['location']);

    $stmt = $pdo->prepare("INSERT INTO internships (title, description, company_name, location, posted_by) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $description, $company_name, $location, $_SESSION['admin_id']]);

    $successMessage = "Internship posted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Internships - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../src/js/ActiveNav.js"></script>
</head>

<body class="bg-gray-900 text-white">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <?php include '../includes/adminNav.php'; ?>

        <?php include '../includes/adminContent.php' ?>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h2 class="text-3xl font-bold mb-6">Manage Internships</h2>

            <!-- Success Message -->
            <?php if (!empty($successMessage)): ?>
                <div class="bg-green-500 text-white px-4 py-3 rounded mb-4 relative">
                    <span><?= $successMessage ?></span>
                    <button onclick="this.parentElement.style.display='none'" class="absolute right-4 top-2 text-lg">✖</button>
                </div>
            <?php endif; ?>

            <!-- Internship Form -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg max-w-2xl">
                <form method="POST" action="">
                    <div class="mb-4">
                        <label for="title" class="block text-gray-300 font-semibold">Title</label>
                        <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-300 font-semibold">Description</label>
                        <textarea name="description" id="description" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-500" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="company_name" class="block text-gray-300 font-semibold">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-gray-300 font-semibold">Location</label>
                        <input type="text" name="location" id="location" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-500">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Post Internship</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
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
    <title>Manage Internships - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../src/js/ActiveNav.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-700 text-white">
    <div class="flex h-screen">
        <!-- Sidebar (preserved from includes) -->
        <?php include '../includes/adminNav.php'; ?>
        <?php include '../includes/adminContent.php' ?>

        <!-- Main Content -->
        <div class="flex-1 p-8 overflow-y-auto">
            <div class="max-w-4xl mx-auto">
                <!-- Header Section -->
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-white mb-2">Manage Internships</h2>
                    <p class="text-gray-300">Create and manage internship opportunities for students</p>
                </div>

                <!-- Success Message -->
                <?php if (!empty($successMessage)): ?>
                    <div class="bg-green-600 border-l-4 border-green-400 p-4 mb-6 rounded">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-white mr-3"></i>
                            <span class="text-white"><?= $successMessage ?></span>
                            <button onclick="this.parentElement.parentElement.style.display='none'"
                                class="ml-auto text-white hover:text-gray-200">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Internship Form -->
                <div class="bg-gray-600 rounded-lg shadow-lg p-8">
                    <form method="POST" action="" class="space-y-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-200 mb-2">
                                Internship Title
                            </label>
                            <input type="text"
                                name="title"
                                id="title"
                                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-500 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                placeholder="e.g., Software Engineering Intern"
                                required>
                        </div>

                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-200 mb-2">
                                Company Name
                            </label>
                            <input type="text"
                                name="company_name"
                                id="company_name"
                                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-500 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                placeholder="e.g., Tech Solutions Inc."
                                required>
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-200 mb-2">
                                Location
                            </label>
                            <input type="text"
                                name="location"
                                id="location"
                                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-500 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                placeholder="e.g., New York, NY (Remote Available)">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-200 mb-2">
                                Description
                            </label>
                            <textarea name="description"
                                id="description"
                                rows="6"
                                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-500 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                placeholder="Describe the internship role, requirements, and responsibilities..."
                                required></textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 flex items-center justify-center">
                                <i class="fas fa-plus-circle mr-2"></i>
                                Post Internship
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add smooth transition for success message dismissal
        document.querySelectorAll('[onclick]').forEach(button => {
            button.addEventListener('click', (e) => {
                const alert = e.target.closest('.bg-green-600');
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s ease';
                setTimeout(() => alert.style.display = 'none', 500);
            });
        });
    </script>
</body>

</html>
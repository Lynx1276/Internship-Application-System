<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Application System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 flex flex-col min-h-screen text-white">
    <header class="bg-gray-800 shadow-md p-5">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="../assests//images/3f824c29-a70f-44dc-b438-c87acb5f52de.jpg" alt="IA Logo" class="h-14 w-14 rounded-full object-cover">
                <h1 class="text-2xl font-bold">Internship Application</h1>
            </div>
            <nav class="flex items-center space-x-6">
                <?php if (isset($_SESSION['email'])): ?>
                    <!-- Student Navigation -->
                    <a href="../pages/dashboard.php" class="hover:text-orange-400">Dashboard</a>
                    <a href="../pages/apply.php" class="hover:text-orange-400">Apply</a>
                    <div class="flex items-center space-x-2">
                        <img src="../assests/icons/user.png" alt="Avatar" class="rounded-full w-10 h-10">
                        <span><?= htmlspecialchars($_SESSION['email']) ?></span>
                    </div>
                    <a href="../pages/logout.php" class="hover:text-orange-400">Logout</a>
                <?php elseif (isset($_SESSION['username'])): ?>
                    <!-- Admin Navigation -->
                    <a href="../admin/dashboard.php" class="hover:text-orange-400">Dashboard</a>
                    <a href="../admin/manage_internships.php" class="hover:text-orange-400">Manage Internships</a>
                    <a href="../admin/view_applications.php" class="hover:text-orange-400">View Applications</a>
                    <div class="flex items-center space-x-2">
                        <img src="../assests/icons/user.png" alt="Avatar" class="rounded-full w-10 h-10">
                        <span><?= htmlspecialchars($_SESSION['username']) ?></span>
                    </div>
                    <a href="../pages/logout.php" class="hover:text-orange-400">Logout</a>
                <?php else: ?>
                    <!-- Guest Navigation -->
                    <a href="/index.php" class="hover:text-orange-400">Home</a>
                    <a href="/apply.php" class="hover:text-orange-400">Apply</a>
                    <a href="../auth/login.php" class="hover:text-orange-400">Login</a>
                    <a href="../auth/register.php" class="hover:text-orange-400">Register</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

</body>

</html>
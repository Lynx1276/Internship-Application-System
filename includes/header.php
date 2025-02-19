<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Application System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Add Font Awesome for better icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../src/css/nav.css">
</head>

<body class="bg-gray-900 flex flex-col min-h-screen text-white">
    <header class="bg-gray-800 shadow-lg border-b border-gray-700">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Logo and Brand -->
                <div class="flex items-center space-x-4 mb-4 md:mb-0">
                    <div class="relative">
                        <img src="../assests/images/3f824c29-a70f-44dc-b438-c87acb5f52de.jpg" alt="IA Logo" class="h-12 w-12 rounded-full object-cover border-2 border-orange-400 shadow-lg">
                        <div class="absolute inset-0 rounded-full shadow-inner"></div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-orange-400 to-red-500">Internship Application</h1>
                        <p class="text-xs text-gray-400 hidden md:block">Launch your career journey today</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="flex flex-wrap items-center justify-center md:justify-end space-x-3 md:space-x-6">
                    <?php if (isset($_SESSION['email'])): ?>
                        <!-- Student Navigation -->
                        <a href="../pages/dashboard.php" class="nav-link px-3 py-2 hover:text-orange-400 transition-colors flex items-center">
                            <i class="fas fa-tachometer-alt mr-2"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="../pages/apply.php" class="nav-link px-3 py-2 hover:text-orange-400 transition-colors flex items-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            <span>Apply</span>
                        </a>

                        <!-- User Profile Dropdown -->
                        <div class="dropdown relative ml-2">
                            <button class="flex items-center space-x-2 focus:outline-none border border-transparent px-3 py-2 rounded-full hover:bg-gray-700 transition-colors">
                                <div class="relative">
                                    <img src="../assests/icons/user.png" alt="Avatar" class="rounded-full w-8 h-8 object-cover border border-gray-600">
                                    <div class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full border border-gray-800"></div>
                                </div>
                                <span class="text-sm font-medium"><?= htmlspecialchars($_SESSION['email']) ?></span>
                                <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                            </button>

                            <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-md shadow-lg z-50">
                                <div class="py-1">
                                    <a href="../pages/profile.php" class="block px-4 py-2 text-sm hover:bg-gray-700">
                                        <i class="fas fa-user mr-2"></i> Profile
                                    </a>
                                    <a href="../pages/applications.php" class="block px-4 py-2 text-sm hover:bg-gray-700">
                                        <i class="fas fa-clipboard-list mr-2"></i> My Applications
                                    </a>
                                    <a href="../pages/settings.php" class="block px-4 py-2 text-sm hover:bg-gray-700">
                                        <i class="fas fa-cog mr-2"></i> Settings
                                    </a>
                                    <div class="border-t border-gray-700 my-1"></div>
                                    <a href="../pages/logout.php" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php else: ?>
                        <!-- Guest Navigation -->
                        <a href="/index.php" class="nav-link px-3 py-2 hover:text-orange-400 transition-colors flex items-center">
                            <span>Home</span>
                        </a>
                        <a href="/apply.php" class="nav-link px-3 py-2 hover:text-orange-400 transition-colors flex items-center">
                            <span>Apply</span>
                        </a>
                        <a href="/contact.php" class="nav-link px-3 py-2 hover:text-orange-400 transition-colors flex items-center">
                            <span>Contact</span>
                        </a>
                        <a href="../auth/login.php" class="nav-link px-3 py-2 hover:text-orange-400 transition-colors flex items-center">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            <span>Login</span>
                        </a>
                        <a href="../auth/register.php" class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 rounded-md shadow-md transition-colors flex items-center">
                            <i class="fas fa-user-plus mr-2"></i>
                            <span>Register</span>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation Menu (Hamburger menu for smaller screens) -->
    <div class="md:hidden">
        <div id="mobile-menu" class="hidden bg-gray-800 px-4 py-3 border-t border-gray-700">
            <nav class="space-y-3">
                <?php if (isset($_SESSION['email'])): ?>
                    <!-- Student Mobile Navigation -->
                    <a href="../pages/dashboard.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <a href="../pages/apply.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-paper-plane mr-2"></i> Apply
                    </a>
                    <a href="../pages/profile.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <a href="../pages/logout.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md text-red-400">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                <?php elseif (isset($_SESSION['username'])): ?>
                    <!-- Admin Mobile Navigation -->
                    <a href="../admin/dashboard.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <a href="../admin/manage_internships.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-briefcase mr-2"></i> Manage Internships
                    </a>
                    <a href="../admin/view_applications.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-clipboard-list mr-2"></i> Applications
                    </a>
                    <a href="../pages/logout.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md text-red-400">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                <?php else: ?>
                    <!-- Guest Mobile Navigation -->
                    <a href="/index.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                    <a href="/apply.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-paper-plane mr-2"></i> Apply
                    </a>
                    <a href="../auth/login.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                    <a href="../auth/register.php" class="block py-2 px-4 bg-gradient-to-r from-orange-500 to-red-500 rounded-md mt-2">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </div>

    <!-- Hamburger Menu Button (only visible on mobile) -->
    <div class="md:hidden fixed top-4 right-4 z-50">
        <button id="hamburger-button" class="flex items-center p-2 bg-gray-800 rounded-md shadow-md border border-gray-700 focus:outline-none">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <script>
        // Toggle mobile menu
        document.getElementById('hamburger-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
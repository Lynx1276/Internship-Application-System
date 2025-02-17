<?php
include '../config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user is a student
    $stmt = $pdo->prepare("SELECT * FROM students WHERE email = ?");
    $stmt->execute([$email]);
    $student = $stmt->fetch();

    if ($student && password_verify($password, $student['password'])) {
        $_SESSION['email'] = $student['id'];
        header("Location: ../pages/dashboard.php");
        exit();
    }

    // Check if the user is an admin
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['username'] =$admin['username'];
        header("Location: ../admin/dashboard.php");
        exit();
    }

    $error_message = "Invalid email or password.";
}
?>

<?php include '../includes/header.php'; ?>

<div class="min-h-screen bg-gray-900 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo or System Name -->
        <div class="text-center">
            <h2 class="text-4xl font-extrabold text-white mb-2">InternshipHub</h2>
            <p class="text-gray-400">Sign in to your account</p>
        </div>

        <?php if (isset($error_message)): ?>
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="mt-8 space-y-6 bg-gray-800 p-8 rounded-xl shadow-2xl">
            <div class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email/Username</label>
                    <div class="mt-1">
                        <input type="text" name="email" id="email" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-700 rounded-lg
                                      bg-gray-700 text-gray-200 placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                      transition duration-150 ease-in-out">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <div class="mt-1">
                        <input type="password" name="password" id="password" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-700 rounded-lg
                                      bg-gray-700 text-gray-200 placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                      transition duration-150 ease-in-out">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" id="remember_me" name="remember_me"
                        class="h-4 w-4 bg-gray-700 border-gray-600 rounded text-blue-500 focus:ring-blue-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-300">Remember me</label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-blue-400 hover:text-blue-300 transition duration-150 ease-in-out">
                        Forgot password?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent 
                               text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                               transition duration-150 ease-in-out">
                    Sign in
                </button>
            </div>

            <div class="text-center mt-4">
                <p class="text-sm text-gray-400">
                    Don't have an account?
                    <a href="register.php" class="font-medium text-blue-400 hover:text-blue-300 transition duration-150 ease-in-out">
                        Register here
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
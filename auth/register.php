<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];

    try {
        // Insert student into the database
        $stmt = $pdo->prepare("INSERT INTO students (name, email, password, phone) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $password, $phone]);

        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate entry error
            $error_message = "Email already registered. Please use a different email.";
        } else {
            $error_message = "An error occurred. Please try again.";
        }
    }
}
?>

<?php include '../includes/header.php'; ?>

<div class="min-h-screen bg-gray-900 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo or System Name -->
        <div class="text-center">
            <h2 class="text-4xl font-extrabold text-white mb-2">InternshipHub</h2>
            <p class="text-gray-400">Create your account</p>
        </div>

        <?php if (isset($error_message)): ?>
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="mt-8 space-y-6 bg-gray-800 p-8 rounded-xl shadow-2xl">
            <div class="space-y-5">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300">Full Name</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-700 rounded-lg
                                      bg-gray-700 text-gray-200 placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                      transition duration-150 ease-in-out">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email" required
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
                                      transition duration-150 ease-in-out"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>
                    <p class="mt-2 text-sm text-gray-400">Password must be at least 8 characters long with numbers, uppercase and lowercase letters.</p>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-300">Phone Number</label>
                    <div class="mt-1">
                        <input type="tel" name="phone" id="phone" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-700 rounded-lg
                                      bg-gray-700 text-gray-200 placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                      transition duration-150 ease-in-out">
                    </div>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent 
                               text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                               transition duration-150 ease-in-out">
                    Create Account
                </button>
            </div>

            <div class="text-center mt-4">
                <p class="text-sm text-gray-400">
                    Already have an account?
                    <a href="login.php" class="font-medium text-blue-400 hover:text-blue-300 transition duration-150 ease-in-out">
                        Sign in here
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
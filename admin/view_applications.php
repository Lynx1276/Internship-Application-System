<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db.php';

// Fetch all applications
$stmt = $pdo->query("
    SELECT applications.*, 
           students.name AS student_name, 
           students.email AS student_email, 
           students.resume_path AS student_resume, 
           internships.title AS internship_title
    FROM applications
    JOIN students ON applications.student_id = students.id
    JOIN internships ON applications.internship_id = internships.id
");
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Approve or Reject Application
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $appId = $_POST['application_id'];
    $status = ($_POST['action'] === 'approve') ? 'Approved' : 'Rejected';

    $updateStmt = $pdo->prepare("UPDATE applications SET status = ? WHERE id = ?");
    $updateStmt->execute([$status, $appId]);

    header("Location: view_application.php"); // Refresh page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">
    <div class="flex h-screen">
        <?php include '../includes/adminNav.php'; ?>

        <?php include '../includes/adminContent.php' ?>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h2 class="text-3xl font-bold mb-6">View Applications</h2>

            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-700 text-white">
                            <th class="p-3 text-left">Student</th>
                            <th class="p-3 text-left">Email</th>
                            <th class="p-3 text-left">Internship</th>
                            <th class="p-3 text-left">CV</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($applications as $app): ?>
                            <tr class="border-b border-gray-600">
                                <td class="p-3"><?= htmlspecialchars($app['student_name']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($app['student_email']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($app['internship_title']) ?></td>

                                <!-- CV Preview -->
                                <td class="p-3">
                                    <?php if (!empty($app['student_cv'])): ?>
                                        <a href="../uploads/<?= htmlspecialchars($app['student_cv']) ?>" target="_blank" class="text-blue-400 hover:underline">View CV</a>
                                    <?php else: ?>
                                        <span class="text-gray-400">No CV</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Status -->
                                <td class="p-3 <?= $app['status'] === 'Approved' ? 'text-green-400' : ($app['status'] === 'Rejected' ? 'text-red-400' : 'text-yellow-400') ?>">
                                    <?= htmlspecialchars($app['status']) ?>
                                </td>

                                <!-- Approve/Reject Buttons -->
                                <td class="p-3">
                                    <form method="POST" action="" class="flex space-x-2">
                                        <input type="hidden" name="application_id" value="<?= $app['id'] ?>">

                                        <button type="submit" name="action" value="approve" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                            Approve
                                        </button>

                                        <button type="submit" name="action" value="reject" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            Reject
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
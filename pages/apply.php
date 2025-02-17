<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_SESSION['student_id'];
    $internship_id = $_POST['internship_id'];

    $stmt = $pdo->prepare("INSERT INTO applications (student_id, internship_id) VALUES (?, ?)");
    $stmt->execute([$student_id, $internship_id]);

    echo "Application submitted successfully!";
}

// Fetch available internships
$internships = $pdo->query("SELECT * FROM internships")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include '../includes/header.php'; ?>
<h2 class="text-2xl font-bold mb-6">Apply for Internship</h2>
<form method="POST" action="" class="bg-white p-6 rounded-lg shadow-md">
    <div class="mb-4">
        <label for="internship_id" class="block text-gray-700">Select Internship</label>
        <select name="internship_id" id="internship_id" class="w-full px-4 py-2 border rounded-lg" required>
            <?php foreach ($internships as $internship): ?>
                <option value="<?= $internship['id'] ?>"><?= $internship['title'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Apply</button>
</form>

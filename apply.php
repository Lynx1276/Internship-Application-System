<?php
// Include database connection
include './config/db.php';
?>

<?php include 'includes/header.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>

<main class="container mx-auto px-4 py-8 flex-1">
    <h2 class="text-2xl font-bold mb-6">Available Internships</h2>

    <!-- Internship Listings Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php
        // Fetch all internships from the database
        $stmt = $pdo->query("SELECT * FROM internships");
        while ($internship = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo
            '
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2 text-orange-400">' . htmlspecialchars($internship['title']) . '</h3>
                    <p class="text-gray-300 mb-4">' . htmlspecialchars($internship['description']) . '</p>
                    <div class="text-gray-400">
                        <p><strong>Company:</strong> ' . htmlspecialchars($internship['company_name']) . '</p>
                        <p><strong>Location:</strong> ' . htmlspecialchars($internship['location']) . '</p>
                    </div>
                    <div class="mt-4">
                        <a href="pages/apply.php?id=' . $internship['id'] . '" 
                           class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition-colors">
                            Apply Now
                        </a>
                    </div>
                </div>';
        }
        ?>
    </div>
</main>
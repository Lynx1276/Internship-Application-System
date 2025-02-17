<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Fetch some sample analytics data (modify according to your database structure)
$totalApplications = $pdo->query("SELECT COUNT(*) FROM applications")->fetchColumn();
$pendingApplications = $pdo->query("SELECT COUNT(*) FROM applications WHERE status = 'pending'")->fetchColumn();
$approvedApplications = $pdo->query("SELECT COUNT(*) FROM applications WHERE status = 'approved'")->fetchColumn();
$totalInternships = $pdo->query("SELECT COUNT(*) FROM internships")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - InternshipHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include Chart.js for analytics -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <!-- Include heroicons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/heroicons/1.0.4/solid.min.js"></script>
    
</head>

<body class="bg-gray-900 text-white">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <?php include "../includes/adminNav.php"; ?>

        <!-- Main Content -->
       <?php include '../includes/adminContent.php' ?>

            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Total Applications</p>
                                <h3 class="text-2xl font-bold"><?php echo $totalApplications; ?></h3>
                            </div>
                            <div class="p-3 bg-blue-500 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-green-500 text-sm mt-2">+12% from last month</p>
                    </div>

                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Pending Applications</p>
                                <h3 class="text-2xl font-bold"><?php echo $pendingApplications; ?></h3>
                            </div>
                            <div class="p-3 bg-yellow-500 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-yellow-500 text-sm mt-2">Requires attention</p>
                    </div>

                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Approved Applications</p>
                                <h3 class="text-2xl font-bold"><?php echo $approvedApplications; ?></h3>
                            </div>
                            <div class="p-3 bg-green-500 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-green-500 text-sm mt-2">+8% from last month</p>
                    </div>

                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Total Internships</p>
                                <h3 class="text-2xl font-bold"><?php echo $totalInternships; ?></h3>
                            </div>
                            <div class="p-3 bg-purple-500 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-purple-500 text-sm mt-2">Active positions</p>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Applications Chart -->
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <h4 class="text-lg font-semibold mb-4">Application Trends</h4>
                        <canvas id="applicationsChart" class="w-full h-64 "></canvas>
                    </div>

                    <!-- Status Distribution Chart -->
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <h4 class="text-lg font-semibold mb-4">Application Status Distribution</h4>
                        <canvas id="statusChart" class="w-full h-64 "></canvas>
                    </div>
                </div>

                <!-- Recent Applications Table -->
                <div class="mt-6 bg-gray-800 rounded-lg shadow-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold mb-4">Recent Applications</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Position</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-700">
                                    <?php
                                    // Fetch recent applications (modify query according to your database structure)
                                    $stmt = $pdo->query("SELECT a.*, s.name as student_name, i.title as internship_title 
                                                       FROM applications a 
                                                       JOIN students s ON a.student_id = s.id 
                                                       JOIN internships i ON a.internship_id = i.id 
                                                       ORDER BY a.applied_at DESC LIMIT 5");
                                    while ($row = $stmt->fetch()): ?>
                                        <tr class="hover:bg-gray-700">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=<?php echo urlencode($row['student_name']); ?>" alt="">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-white"><?php echo htmlspecialchars($row['student_name']); ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-white"><?php echo htmlspecialchars($row['internship_title']); ?></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <?php
                                                $statusClasses = [
                                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                                    'approved' => 'bg-green-100 text-green-800',
                                                    'rejected' => 'bg-red-100 text-red-800'
                                                ];
                                                $statusClass = $statusClasses[$row['status']] ?? 'bg-gray-100 text-gray-800';
                                                ?>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $statusClass; ?>">
                                                    <?php echo ucfirst(htmlspecialchars($row['status'])); ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                                <?php echo date('M d, Y', strtotime($row['applied_at'])); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="text-blue-400 hover:text-blue-300 mr-3">View</a>
                                                <a href="#" class="text-green-400 hover:text-green-300 mr-3">Approve</a>
                                                <a href="#" class="text-red-400 hover:text-red-300">Reject</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Initialization -->
    <script>
        // Applications Trend Chart
        const applicationsCtx = document.getElementById('applicationsChart').getContext('2d');
        new Chart(applicationsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Applications',
                    data: [65, 78, 90, 85, 99, 112],
                    borderColor: '#3B82F6',
                    tension: 0.3,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#9CA3AF'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#9CA3AF'
                        }
                    }
                }
            }
        });
        document.getElementById("applicationsChart").style.height = "450px";
        document.getElementById("applicationsChart").parentElement.style.height = "450px";

        // Status Distribution Chart
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Approved', 'Rejected'],
                datasets: [{
                    data: [<?php echo $pendingApplications; ?>, <?php echo $approvedApplications; ?>,
                        <?php echo $totalApplications - ($pendingApplications + $approvedApplications); ?>
                    ],
                    backgroundColor: ['#EAB308', '#22C55E', '#EF4444']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#9CA3AF'
                        }
                    }
                }
            }
        });
        document.getElementById("statusChart").style.height = "450px";
        document.getElementById("statusChart").parentElement.style.height = "450px";
    </script>
</body>

</html>
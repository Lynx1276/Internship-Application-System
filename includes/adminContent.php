<script src="https://cdn.tailwindcss.com"></script>
<!-- Include Chart.js for analytics -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<!-- Include heroicons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/heroicons/1.0.4/solid.min.js"></script>

<!-- Main Content -->
<div class="flex-1 overflow-x-hidden overflow-y-auto">
    <!-- Top Navigation -->
    <div class="bg-gray-800 shadow-md">
        <div class="px-6 py-4 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Dashboard Overview</h2>
            <div class="flex items-center space-x-4">
                <button class="p-2 rounded-lg hover:bg-gray-700 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </button>
                <div class="flex items-center">
                    <img src="https://ui-avatars.com/api/?name=Admin+User" alt="Admin" class="w-8 h-8 rounded-full">
                    <span class="ml-2"><?= htmlspecialchars($_SESSION['username']) ?></span>
                </div>
            </div>
        </div>
    </div>
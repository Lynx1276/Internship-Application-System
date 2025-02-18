<?php
// Include database connection
include './config/db.php';
?>

<?php include 'includes/header.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#FF6B35',
                    secondary: '#2E3A59',
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
            }
        }
    }
</script>

<!-- Hero Banner -->
<section class="bg-gradient-to-r from-secondary to-gray-800 py-12">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Browse Internships by Category</h1>
            <p class="text-gray-300 text-lg mb-8">Explore opportunities in your field of interest</p>
        </div>
    </div>
</section>

<main class="container mx-auto px-4 py-12">
    <!-- Industry Categories -->
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Popular Industries</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php
            // These would typically come from your database
            $industries = [
                ['name' => 'Technology', 'icon' => 'computer', 'count' => rand(10, 50)],
                ['name' => 'Finance', 'icon' => 'cash', 'count' => rand(10, 50)],
                ['name' => 'Healthcare', 'icon' => 'medical', 'count' => rand(10, 50)],
                ['name' => 'Marketing', 'icon' => 'chart', 'count' => rand(10, 50)],
                ['name' => 'Education', 'icon' => 'book', 'count' => rand(10, 50)],
                ['name' => 'Engineering', 'icon' => 'tools', 'count' => rand(10, 50)],
                ['name' => 'Design', 'icon' => 'design', 'count' => rand(10, 50)],
                ['name' => 'Hospitality', 'icon' => 'hotel', 'count' => rand(10, 50)]
            ];

            foreach ($industries as $industry) {
                echo '
        <a href="apply.php?industry=' . urlencode($industry['name']) . '" class="group">
          <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
              <div class="w-12 h-12 bg-primary/10 flex items-center justify-center rounded-full group-hover:bg-primary/20 transition-colors">
                <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <span class="text-gray-500 text-sm">' . $industry['count'] . ' internships</span>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition-colors">' . $industry['name'] . '</h3>
          </div>
        </a>';
            }
            ?>
        </div>
    </section>

    <!-- Role Categories -->
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Popular Roles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // These would typically come from your database
            $roles = [
                ['name' => 'Software Developer', 'description' => 'Build and maintain software applications and systems', 'count' => rand(5, 30)],
                ['name' => 'Data Analyst', 'description' => 'Analyze data to help companies make better business decisions', 'count' => rand(5, 30)],
                ['name' => 'Digital Marketing', 'description' => 'Develop and implement digital marketing strategies', 'count' => rand(5, 30)],
                ['name' => 'UX/UI Designer', 'description' => 'Design user-friendly interfaces for websites and applications', 'count' => rand(5, 30)],
                ['name' => 'Financial Analyst', 'description' => 'Evaluate financial data and make recommendations', 'count' => rand(5, 30)],
                ['name' => 'Project Management', 'description' => 'Coordinate and oversee company projects', 'count' => rand(5, 30)],
            ];

            foreach ($roles as $role) {
                echo '
        <a href="apply.php?role=' . urlencode($role['name']) . '" class="group">
          <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow h-full flex flex-col">
            <div class="flex-1">
              <div class="flex justify-between items-start mb-3">
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition-colors">' . $role['name'] . '</h3>
                <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-2.5 py-0.5 rounded">' . $role['count'] . ' openings</span>
              </div>
              <p class="text-gray-600 mb-4">' . $role['description'] . '</p>
            </div>
            <div class="text-primary group-hover:text-orange-600 flex items-center text-sm font-medium transition-colors">
              View opportunities
              <svg class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </div>
          </div>
        </a>';
            }
            ?>
        </div>
    </section>

    <!-- Location-based Categories -->
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Browse by Location</h2>
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-3">
                <?php
                // These would typically come from your database
                $locations = [
                    'New York',
                    'San Francisco',
                    'Chicago',
                    'Boston',
                    'Seattle',
                    'Austin',
                    'Los Angeles',
                    'Washington DC',
                    'Miami',
                    'Denver',
                    'Atlanta',
                    'Dallas',
                    'Toronto',
                    'London',
                    'Remote'
                ];

                foreach ($locations as $location) {
                    echo '
          <a href="apply.php?location=' . urlencode($location) . '" class="py-2 px-4 hover:bg-gray-50 rounded text-gray-700 hover:text-primary flex items-center justify-between group">
            <span>' . $location . '</span>
            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Additional Categories -->
    <section>
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Browse by Other Criteria</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Duration</h3>
                    <div class="space-y-2">
                        <a href="apply.php?duration=summer" class="block py-2 px-4 hover:bg-gray-50 rounded text-gray-700 hover:text-primary">Summer Internships</a>
                        <a href="apply.php?duration=semester" class="block py-2 px-4 hover:bg-gray-50 rounded text-gray-700 hover:text-primary">Semester Internships</a>
                        <a href="apply.php?duration=year" class="block py-2 px-4 hover:bg-gray-50 rounded text-gray-700 hover:text-primary">Year-long Programs</a>
                        <a href="apply.php?duration=flexible" class="block py-2 px-4 hover:bg-gray-50 rounded text-gray-700 hover:text-primary">Flexible Duration</a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Compensation</h3>
                    <div class="space-y-2">
                        <a href="apply.php?compensation=paid" class="block py-2 px-4 hover:bg-gray-50 rounded text-gray-700 hover:text-primary">Paid Internships</a>
                        <a href="apply.php?compensation=stipend" class="block py-2 px-4 hover:bg-gray-50 rounded text-gray-700 hover:text-primary">Stipend-based</a>
                        <a href="apply.php?compensation=unpaid" class="block py-2 px-4 hover:bg-gray-50 rounded text-gray-700 hover:text-primary">Unpaid Opportunities</a>
                        <a href="apply.php?compensation=credit" class="block py-2 px-4 hover:bg-gray-50 rounded text-gray-700 hover:text-primary">For Academic Credit</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- CTA Banner -->
<section class="bg-primary text-white py-12">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center justify-between">
            <div class="mb-6 md:mb-0 text-center md:text-left">
                <h2 class="text-2xl font-bold mb-2">Not sure where to start?</h2>
                <p class="text-white/80">Let us help match you with internships based on your profile</p>
            </div>
            <div>
                <a href="profile.php" class="inline-block bg-white text-primary hover:bg-gray-100 transition-colors px-6 py-3 rounded-lg text-lg font-semibold shadow-lg">Complete Your Profile</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
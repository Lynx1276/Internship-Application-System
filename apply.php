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
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Find Your Perfect Internship</h1>
            <p class="text-gray-300 text-lg mb-8">Browse through our curated collection of top-tier internship opportunities</p>

            <!-- Search and Filter Form -->
            <form class="bg-white p-4 rounded-lg shadow-lg flex flex-col md:flex-row gap-4 mb-4">
                <div class="flex-1">
                    <input type="text" placeholder="Search by keyword, company, or role" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary text-gray-800">
                </div>
                <div class="md:w-48">
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary text-gray-800">
                        <option value="">All Locations</option>
                        <option value="remote">Remote</option>
                        <option value="onsite">On-site</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>
                <button type="submit" class="bg-primary hover:bg-orange-600 text-white px-6 py-2 rounded-md transition-colors">
                    Search
                </button>
            </form>
        </div>
    </div>
</section>

<main class="container mx-auto px-4 py-12">
    <!-- Statistics Row -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-white rounded-lg p-6 text-center shadow-md border border-gray-100">
            <span class="text-primary text-3xl font-bold block"><?php echo rand(50, 200); ?></span>
            <span class="text-gray-600">Active Internships</span>
        </div>
        <div class="bg-white rounded-lg p-6 text-center shadow-md border border-gray-100">
            <span class="text-primary text-3xl font-bold block"><?php echo rand(20, 50); ?></span>
            <span class="text-gray-600">Partner Companies</span>
        </div>
        <div class="bg-white rounded-lg p-6 text-center shadow-md border border-gray-100">
            <span class="text-primary text-3xl font-bold block"><?php echo rand(1000, 5000); ?></span>
            <span class="text-gray-600">Students Placed</span>
        </div>
        <div class="bg-white rounded-lg p-6 text-center shadow-md border border-gray-100">
            <span class="text-primary text-3xl font-bold block"><?php echo rand(10, 30); ?></span>
            <span class="text-gray-600">Industries Covered</span>
        </div>
    </div>

    <!-- Featured Internships Carousel -->
    <section class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Featured Opportunities</h2>
            <a href="#" class="text-primary hover:underline">View All</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            // Fetch featured internships (you can modify query as needed)
            $featured = $pdo->query("SELECT * FROM internships ORDER BY id DESC LIMIT 3");
            while ($internship = $featured->fetch(PDO::FETCH_ASSOC)) {
                echo '
          <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow">
              <div class="bg-gray-100 p-4">
                  <div class="flex justify-between items-start">
                      <div class="bg-white p-2 rounded-lg shadow border border-gray-200 w-16 h-16 flex items-center justify-center">
                          <span class="text-2xl font-bold text-primary">' . substr(htmlspecialchars($internship['company_name']), 0, 2) . '</span>
                      </div>
                      <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Featured</span>
                  </div>
              </div>
              <div class="p-6">
                  <h3 class="text-xl font-semibold mb-2 text-gray-800">' . htmlspecialchars($internship['title']) . '</h3>
                  <p class="text-gray-600 mb-4 line-clamp-3">' . htmlspecialchars($internship['description']) . '</p>
                  <div class="flex items-center mb-3">
                      <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-gray-600">' . htmlspecialchars($internship['company_name']) . '</span>
                  </div>
                  <div class="flex items-center mb-4">
                      <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-gray-600">' . htmlspecialchars($internship['location']) . '</span>
                  </div>
                  <a href="pages/apply.php?id=' . $internship['id'] . '" 
                     class="block w-full text-center bg-primary text-white px-4 py-2 rounded hover:bg-orange-600 transition-colors">
                      Apply Now
                  </a>
              </div>
          </div>';
            }
            ?>
        </div>
    </section>

    <!-- Main Internship Listings -->
    <section>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">All Available Internships</h2>
            <div class="flex items-center">
                <label for="sort" class="mr-2 text-gray-600">Sort by:</label>
                <select id="sort" class="border border-gray-300 rounded px-2 py-1 text-gray-800">
                    <option value="newest">Newest First</option>
                    <option value="popular">Most Popular</option>
                    <option value="deadline">Application Deadline</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Fetch all internships from the database
            $stmt = $pdo->query("SELECT * FROM internships");
            while ($internship = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '
          <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow">
              <div class="p-6">
                  <h3 class="text-xl font-semibold mb-2 text-gray-800">' . htmlspecialchars($internship['title']) . '</h3>
                  <p class="text-gray-600 mb-4 line-clamp-3">' . htmlspecialchars($internship['description']) . '</p>
                  <div class="flex items-center mb-3">
                      <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-gray-600">' . htmlspecialchars($internship['company_name']) . '</span>
                  </div>
                  <div class="flex items-center mb-4">
                      <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-gray-600">' . htmlspecialchars($internship['location']) . '</span>
                  </div>
                  <a href="pages/apply.php?id=' . $internship['id'] . '" 
                     class="block w-full text-center bg-primary text-white px-4 py-2 rounded hover:bg-orange-600 transition-colors">
                      Apply Now
                  </a>
              </div>
          </div>';
            }
            ?>
        </div>
    </section>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center">
        <nav class="inline-flex rounded-md shadow">
            <a href="#" class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-l-md hover:bg-gray-50">Previous</a>
            <a href="#" class="px-4 py-2 border-t border-b border-r border-gray-300 bg-primary text-white">1</a>
            <a href="#" class="px-4 py-2 border-t border-b border-r border-gray-300 bg-white text-gray-700 hover:bg-gray-50">2</a>
            <a href="#" class="px-4 py-2 border-t border-b border-r border-gray-300 bg-white text-gray-700 hover:bg-gray-50">3</a>
            <span class="px-4 py-2 border-t border-b border-gray-300 bg-white text-gray-700">...</span>
            <a href="#" class="px-4 py-2 border-t border-b border-r border-gray-300 bg-white text-gray-700 hover:bg-gray-50">8</a>
            <a href="#" class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-r-md hover:bg-gray-50">Next</a>
        </nav>
    </div>
</main>

<!-- Newsletter Subscription -->
<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Stay Updated with New Opportunities</h2>
            <p class="text-gray-600 mb-6">Subscribe to our newsletter and never miss out on exciting internship openings</p>
            <form class="flex flex-col sm:flex-row gap-2">
                <input type="email" placeholder="Your email address" class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary text-gray-800">
                <button type="submit" class="bg-primary hover:bg-orange-600 text-white px-6 py-2 rounded-md transition-colors">Subscribe</button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
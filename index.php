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

<!-- Hero Section -->
<section class="bg-gradient-to-r from-secondary to-gray-800 text-white py-20">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 text-left mb-10 md:mb-0">
            <h1 class="text-4xl md:text-5xl font-bold leading-tight">Your Gateway to Professional Internships</h1>
            <p class="text-lg text-gray-300 mt-6 md:max-w-md">Connect with industry-leading companies and kickstart your career with meaningful internship experiences.</p>
            <div class="mt-8 space-x-4">
                <a href="apply.php" class="inline-block bg-primary hover:bg-orange-600 transition-colors px-8 py-3 rounded-lg text-lg font-semibold shadow-lg">Apply Now</a>
                <a href="browser.php" class="inline-block bg-transparent border-2 border-white hover:bg-white hover:text-secondary transition-colors px-6 py-3 rounded-lg text-lg font-semibold">Browse Opportunities</a>
            </div>
        </div>
        <div class="md:w-1/2 flex justify-center">
            <div class="relative">
                <div class="absolute -inset-1 bg-primary rounded-full opacity-25 blur-xl"></div>
                <img src="./assests/images/3f824c29-a70f-44dc-b438-c87acb5f52de.jpg" alt="Internship Banner" class="relative w-56 h-56 rounded-full object-cover border-4 border-white shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Why Choose Our Internship Platform?</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Top Companies</h3>
                <p class="text-gray-600">Partner with Fortune 500 companies and innovative startups across diverse industries.</p>
            </div>
            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Skills Development</h3>
                <p class="text-gray-600">Gain practical experience and develop industry-relevant skills that employers value.</p>
            </div>
            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Mentorship</h3>
                <p class="text-gray-600">Connect with industry professionals who provide guidance throughout your internship journey.</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-secondary text-white">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-6 text-center">
            <div>
                <h3 class="text-4xl font-bold mb-2">500+</h3>
                <p class="text-gray-300">Partner Companies</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold mb-2">10,000+</h3>
                <p class="text-gray-300">Successful Placements</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold mb-2">50+</h3>
                <p class="text-gray-300">Industries Covered</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold mb-2">95%</h3>
                <p class="text-gray-300">Satisfaction Rate</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Success Stories</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gray-200 rounded-full mr-4"></div>
                    <div>
                        <h4 class="font-semibold">Emma Thompson</h4>
                        <p class="text-gray-500 text-sm">Marketing Intern at Google</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">"This platform helped me land my dream internship. The application process was straightforward, and I received personalized support throughout my journey."</p>
            </div>
            <!-- Testimonial 2 -->
            <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gray-200 rounded-full mr-4"></div>
                    <div>
                        <h4 class="font-semibold">James Wilson</h4>
                        <p class="text-gray-500 text-sm">Software Engineer Intern at Microsoft</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">"The connections I made through this platform were invaluable. The internship experience exceeded my expectations and led to a full-time job offer."</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-primary text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">Ready to Start Your Professional Journey?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Join thousands of students who have transformed their careers through our internship opportunities.</p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="apply.php" class="bg-white text-primary hover:bg-gray-100 transition-colors px-8 py-3 rounded-lg text-lg font-semibold shadow-lg">Apply Now</a>
            <a href="contact.php" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary transition-colors px-8 py-3 rounded-lg text-lg font-semibold">Contact Us</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
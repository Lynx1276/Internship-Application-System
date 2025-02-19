<?php
include_once './includes/header.php';
?>

<main class="flex-grow py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-orange-400 to-red-500">Contact Us</h1>
            <p class="text-gray-400 max-w-2xl mx-auto">Have questions about internships? Want to partner with us? We're here to help! Fill out the form below or use our contact information to reach out.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-gray-800 p-8 rounded-lg shadow-xl">
                <h2 class="text-2xl font-semibold mb-6">Send us a Message</h2>
                <form action="process_contact.php" method="POST" class="space-y-6">
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-300">Full Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:border-orange-500 focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50 text-white placeholder-gray-400"
                            placeholder="John Doe">
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:border-orange-500 focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50 text-white placeholder-gray-400"
                            placeholder="john@example.com">
                    </div>

                    <div class="space-y-2">
                        <label for="subject" class="block text-sm font-medium text-gray-300">Subject</label>
                        <select id="subject" name="subject" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:border-orange-500 focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50 text-white">
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="internship">Internship Question</option>
                            <option value="partnership">Business Partnership</option>
                            <option value="support">Technical Support</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="message" class="block text-sm font-medium text-gray-300">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:border-orange-500 focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50 text-white placeholder-gray-400"
                            placeholder="Your message here..."></textarea>
                    </div>

                    <button type="submit"
                        class="w-full px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-medium rounded-md shadow-md transition-colors">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-8">
                <!-- Office Information -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl">
                    <h2 class="text-2xl font-semibold mb-6">Our Office</h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-orange-500 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-300">Location</h3>
                                <p class="text-gray-400">123 Business Avenue<br>Silicon Valley, CA 94025</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center">
                                <i class="fas fa-phone text-orange-500 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-300">Phone</h3>
                                <p class="text-gray-400">+1 (555) 123-4567</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope text-orange-500 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-300">Email</h3>
                                <p class="text-gray-400">support@internshipapp.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl">
                    <h2 class="text-2xl font-semibold mb-6">Business Hours</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Monday - Friday</span>
                            <span class="text-gray-300">9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Saturday</span>
                            <span class="text-gray-300">10:00 AM - 4:00 PM</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Sunday</span>
                            <span class="text-gray-300">Closed</span>
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl">
                    <h2 class="text-2xl font-semibold mb-6">Connect With Us</h2>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-colors">
                            <i class="fab fa-linkedin text-xl text-orange-500"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-colors">
                            <i class="fab fa-twitter text-xl text-orange-500"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-colors">
                            <i class="fab fa-facebook text-xl text-orange-500"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-colors">
                            <i class="fab fa-instagram text-xl text-orange-500"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Frequently Asked Questions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                <div class="bg-gray-800 p-6 rounded-lg shadow-xl">
                    <h3 class="text-xl font-semibold mb-3">How do I apply for an internship?</h3>
                    <p class="text-gray-400">Register an account, browse available internships, and click the "Apply" button on any listing that interests you. Follow the application steps and submit your resume.</p>
                </div>

                <div class="bg-gray-800 p-6 rounded-lg shadow-xl">
                    <h3 class="text-xl font-semibold mb-3">What are the requirements?</h3>
                    <p class="text-gray-400">Requirements vary by position. Generally, you should be a current student or recent graduate. Check individual listings for specific requirements.</p>
                </div>

                <div class="bg-gray-800 p-6 rounded-lg shadow-xl">
                    <h3 class="text-xl font-semibold mb-3">How long does the process take?</h3>
                    <p class="text-gray-400">The application review process typically takes 1-2 weeks. You'll receive email updates about your application status throughout the process.</p>
                </div>

                <div class="bg-gray-800 p-6 rounded-lg shadow-xl">
                    <h3 class="text-xl font-semibold mb-3">Are internships paid?</h3>
                    <p class="text-gray-400">This varies by company. Each listing will specify whether the internship is paid or unpaid, along with any other compensation details.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include_once './includes/footer.php';
?>
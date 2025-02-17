document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("nav a"); // Select all nav links
    const currentUrl = window.location.pathname; // Get current page path

    links.forEach((link) => {
        if (link.getAttribute("href") === currentUrl) {
            link.classList.add("bg-gray-700", "text-white"); // Active state like Dashboard
        } else {
            link.classList.remove("bg-gray-700", "text-white");
            link.classList.add("text-gray-300", "hover:bg-gray-700", "hover:text-white");
        }
    });
});
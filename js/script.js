// This is the script.js file for the home page

// Get the navigation bar element
var navbar = document.querySelector(".nav");

// Get the navigation bar links
var links = navbar.querySelectorAll("a");

// Add a click event listener to each link
links.forEach(function (link) {
  link.addEventListener("click", function (event) {
    // Prevent the default action of the link
    event.preventDefault();

    // Remove the active class from all links
    links.forEach(function (link) {
      link.classList.remove("active");
    });

    // Add the active class to the clicked link
    link.classList.add("active");
  });
});

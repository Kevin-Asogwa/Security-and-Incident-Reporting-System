// This is the login.js file for the login page

// Get the password input element
var password = document.getElementById("password");

// Get the toggle button element
var toggle = document.getElementById("toggle");

// Add a click event listener to the toggle button
toggle.addEventListener("click", function () {
  // Check the type of the password input
  if (password.type === "password") {
    // Change the type to text
    password.type = "text";
    // Change the icon to eye-slash
    toggle.innerHTML = "<i class='fas fa-eye-slash'></i>";
  } else {
    // Change the type to password
    password.type = "password";
    // Change the icon to eye
    toggle.innerHTML = "<i class='fas fa-eye'></i>";
  }
});

// dashboard.js

document.addEventListener("DOMContentLoaded", function () {
  // Get all dashboard sections
  const sections = document.querySelectorAll(".dashboard-section");

  // Show the default section (Profile Overview)
  showSection("profile-overview");

  // Add click event listeners to sidebar links
  document.querySelectorAll(".sidebar-nav a").forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault();

      // Hide all sections
      sections.forEach(function (section) {
        section.style.display = "none";
      });

      // Show the clicked section
      const sectionId = this.getAttribute("href").substring(1);
      showSection(sectionId);
    });
  });

  // Function to show a specific section
  function showSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
      section.style.display = "block";
    }
  }
});

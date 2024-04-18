<style>
/* Style the dropdown container */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Style the dropdown content */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  z-index: 1;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  border-radius: 5px;
}

/* Style the dropdown links */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Add a hover effect for the dropdown links */
.dropdown-content a:hover {
  background-color: #f1f1f1;
}

/* Show the dropdown content when hovering over the dropdown container */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Style the active link inside the dropdown */
.dropdown-content a.active {
  background-color: #007bff;
  color: white;
}
</style>
<!-- This is the header.php file -->
<!-- Header section with logo and navigation bar -->
<header class="header">
  <div class="container">
    <!-- Logo with link to the home page -->
    <a href="#" class="logo">
      <img src="img/logo.jpg" alt="UNN Logo" />
      <span>UNN Security and Incident Reporting System</span>
    </a>
    <!-- Navigation bar with links to other pages -->
    <nav class="nav">
      <ul>
        <!-- Define a PHP variable for each page -->
        <?php
        // Get the current file name
        $current_page = basename($_SERVER['PHP_SELF']);
        // Set the variables to empty strings
        $home = "";
        $about = "";
        $contact = "";
        $login = "";
        // Check which page is active and set the corresponding variable to "active"
        if ($current_page == "index.php") {
          $home = "active";
        } elseif ($current_page == "about.php") {
          $about = "active";
        } elseif ($current_page == "contact.php") {
          $contact = "active";
        } elseif ($current_page == "login.php") {
          $login = "active";
        }
        ?>
        <!-- Use the PHP variables to add the active class to the appropriate link -->
        <li><a href="index.php" class="<?php echo $home; ?>">Home</a></li>
        <li><a href="about.php" class="<?php echo $about; ?>">About</a></li>
        <li><a href="contact.php" class="<?php echo $contact; ?>">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="<?php echo $login; ?>">Login</a>
          <div class="dropdown-content">
            <a href="login.php">Student Login</a>
            <a href="security_officer/login_security_officer.php">Security Officer Login</a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
  </header>

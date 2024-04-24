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
        } elseif ($current_page == "login.php" || "officer_login.php") {
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
            <a href="officer_login.php">Security Officer Login</a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
  </header>

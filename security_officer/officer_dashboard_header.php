<?php
include "officer_dashboard.data.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Security Officer Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="..fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="..fontawesome/css/brands.css">
    <link rel="stylesheet" href="..fontawesome/css/solid.css">
</head>
<body>
    <div class="container">
        <!-- Header section -->
        <div class="header">
            <div class="logo">
                <img src="../img/logo.jpg" alt="UNN Logo">
            </div>
            <div class="title">
                <h1>Security and Incident Reporting System</h1>
            </div>
            <div class="profile">
                <img src="<?php echo $default_profile_pic; ?>" alt="Profile Picture" class="circle">
                <span class="fullname"><?php echo $fullname; ?></span>
                <span class="officer_id"><?php echo $officer_id; ?></span>
                <span class="notification"><i class="fas fa-bell"></i></span>
            </div>

        </div>
        <!-- Sidebar section -->
        <div class="sidebar">
            <ul>
            <?php
        // Get the current file name
        $current_page = basename($_SERVER['PHP_SELF']);
        // Set the variables to empty strings
        $dash = "";
        $profile = "";
        $manage_reports = "";
        $provide_feedback = "";
        
        // Check which page is active and set the corresponding variable to "active"
        if ($current_page == "officer_dashboard.php") {
            $dash = "active";
          } elseif($current_page == "profile.php") {
          $profile = "active";
        } elseif ($current_page == "report_incident.php") {
          $manage_reports = "active";
        } elseif ($current_page == "incident_status.php") {
          $provide_feedback = "active";
        } 
        ?>
               <li><a href="officer_dashboard.php" class="<?php echo $dash; ?>">Dashboard</a></li>
               <li class="dropdown">
                    <a href="#" class="<?php echo $profile; ?>" id="profile" name="profile">Profile</a>
                    <div class="dropdown-menu" id="sub-profile">
                        <a href="profile_overview.php">Profile Overview</a>
                        <a href="account_settings.php">Account Settings</a>
                        <a href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li><a href="reported.php" class="<?php echo $report_incident; ?>"name="report_incident">Manage Reports</a></li>
                <li><a href="reported feedback.php" class="<?php echo $incident_status; ?>">Provide Feedback</a></li>
                <li><a href="../officer_logout.php">Logout</a></li>
            </ul>
        </div>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const profile = document.getElementById("profile");
            const dropdownMenu = document.getElementById("sub-profile");

            profile.addEventListener("click", function(event) {
                event.preventDefault();
                toggleDropdownMenu(dropdownMenu);
            });

            function toggleDropdownMenu(menu) {
                menu.style.display = (menu.style.display === "block") ? "none" : "block";
            }
        });
    </script>
    </body>
</html>
        
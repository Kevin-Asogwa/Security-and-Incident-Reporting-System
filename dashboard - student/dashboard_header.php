<?php
include_once "dashboard.data.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="..fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="..fontawesome/css/brands.css">
    <link rel="stylesheet" href="..fontawesome/css/solid.css">
<style>
 /* Style for dropdown menu */
    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-menu a {
        color: #000;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-menu a:hover {
        background-color: #f1f1f1;
    }
    </style>
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
                <span class="registration_number"><?php echo $registration_number; ?></span>
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
        $profile = "";
        $report_incident = "";
        $incident_status = "";
        
        // Check which page is active and set the corresponding variable to "active"
        if ($current_page == "profile.php") {
          $profile = "active";
        } elseif ($current_page == "report_incident.php") {
          $report_incident = "active";
        } elseif ($current_page == "incident_status.php") {
          $incident_status = "active";
        } 
        ?>
               <li>
                    <a href="#" class="<?php echo $profile; ?>" id="profile" name="profile">Profile</a>
                    <div class="dropdown-menu" id="sub-profile">
                        <a href="profile_overview.php">Profile Overview</a>
                        <a href="account_settings.php">Account Settings</a>
                        <a href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li><a href="report_incident.php" class="<?php echo $report_incident; ?>"name="report_incident">Report Incident</a></li>
                <li><a href="incident_status.php" class="<?php echo $incident_status; ?>">Incident Status</a></li>
                <li><a href="../logout.php">Logout</a></li>
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
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Security Officer Dashboard</title>
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="../css/dashboard.css">
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
                <span class="id"><?php echo $id; ?></span>
                <span class="notification"><i class="fas fa-bell"></i></span>
            </div>
           
        <!-- Sidebar similar to dashboard.php but with officer-specific links -->
        <div class="sidebar">
            <ul>
            <?php
        // Get the current file name
        $current_page = basename($_SERVER['PHP_SELF']);
        // Set the variables to empty strings
        $profile = "";
        $manage_reports = "";
        $provide_feedback = "";
        
        // Check which page is active and set the corresponding variable to "active"
        if ($current_page == "officer_profile.php") {
          $profile = "active";
        } elseif ($current_page == "officer_manage_reports.php") {
          $manage_reports = "active";
        } elseif ($current_page == "officer_provide_feedback.php") {
          $provide_feedback = "active";
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
                <li><a href="report_management.php">Manage Reports</a></li>
                <li><a href="officer_feedback.php">Provide Feedback</a></li>
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
    </div>
    <div class="main">
    <h1>Security Officer Dashboard</h1>
        <!-- Dashboard Overview -->
        <div class="dashboard-overview">
                        <!-- Boxes section -->
            <div class="boxes">
                <div class="box">
                    <div class="icon"><a href="reported.php"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="info">
                        <h3>Total Reports: </h3> </a> 
                        
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><a href="feedback.php"><i class="fas fa-comment-dots"></i></div>
                    <div class="info">
                        <h3>Resolved Reports:</h3></a>
                        <!-- <p><?php echo $incidents_feedback; ?></p> -->
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><a href="pending.php"><i class="fas fa-clock"></i></div>
                    <div class="info">
                        <h3>Pending Reports:</h3> </a>
                        <!-- <p><?php echo $pending_reports; ?></p> -->
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>  

    <!-- Footer section -->
 <div class="footer">
            <p>© 2024 University of Nigeria, Nsukka. All rights reserved.</p>
        </div>

</body>
</html>


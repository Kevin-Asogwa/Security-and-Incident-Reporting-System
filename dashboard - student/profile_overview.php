<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Overview</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <!-- Include the header.php file -->
    <?php include 'dashboard_header.php'; ?>

    <!-- Main section with profile overview -->
    <main class="main">
        <div class="container">
            <!-- Display user's profile information -->
            <!-- You can use PHP to fetch the user's profile information from the database -->
            <h2>Profile Overview</h2>
            <!-- Display the user's profile picture -->
            <img src="<?php echo $profile_picture_url; ?>" alt="Profile Picture">
            <p>Full Name: <?php echo $fullname; ?></p>
            <p>Registration Number: <?php echo $registration_number; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Phone Number: <?php echo $phone_number; ?></p>
            <!-- Display other profile information -->
            <!-- Add a link to navigate to the Account Settings page -->
            <a href="account_settings.php">Edit Account Settings</a>
        </div>
    </main>
    <!-- Include the footer.php file -->
    <?php include 'dashboard_header.php'; ?>
</body>
</html>

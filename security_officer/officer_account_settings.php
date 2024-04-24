<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="css/account_settings.css">
</head>
<body>
    <!-- Include the header.php file -->
    <?php include 'officer_dashboard_header.php'; ?>

    <!-- Main section with account settings form -->
    <main class="main">
        <div class="container">
            <!-- Display the account settings form -->
            <h2>Account Settings</h2>
            <form action="update_profile.php" method="post" enctype="multipart/form-data">
                <!-- Input fields for updating profile information -->
                <!-- Exclude fullname and password -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
                </div>
                <!-- Add other input fields for updating profile information -->
                <!-- Include a file input for uploading a new profile picture -->
                <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture">
                </div>
                <!-- Add other input fields and a submit button -->
                <div class="form-group">
                    <input type="submit" name="submit" value="Update Profile" class="submit">
                </div>
            </form>
        </div>
    </main>
    <!-- Include the footer.php file -->
    <?php include 'officer_dashboard_footer.php'; ?>
</body>
</html>

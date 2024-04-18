<!-- This is the login.php file for the login page -->
<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="../css/login.css">
    <!-- Link to the external JavaScript file -->
    <script src="../js/login.js"></script>
</head>
<body>
    <!-- Include the header.php file -->
    <?php include '../components/header.php'; ?>

    <!-- Main section with login form and link to register -->
    <main class="main">
        <div class="container">
            <!-- Login form with inputs for username and password -->
            <form action="includes/login.inc.php" method="post" class="login-form">
                <h2>Security Officer Login</h2>
                <p>Please enter your security ID and password to log in</p>
                <div class="form-group">
                    <label for="security_id"><i class="fas fa-user"></i> Security ID</label>
                    <input type="text" name="security_id" id="security_id" class="form-control" placeholder="Input your Security ID">
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" name="password1" id="password1" class="form-control" placeholder="Input your password">
                    <!-- Add a toggle button for password visibility -->
                    <button type="button" id="toggle" class="toggle"><i class="fas fa-eye"></i></button>
                </div>
                <div class="forgot-password">
					<a href="forgot-password.php">Forgot Password?</a>
				</div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Login" class="submit">
                </div>
            </form>
        </div>
    </main>
    <?php include '../components/footer.php'; ?>

    
</body>
</html>

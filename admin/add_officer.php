<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Security Officer</title>
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="register.css">
</head>
<body>
<main class="main">
    <div class="container">
        <h2>Register Security Officer</h2>
        <form action="officer.register.inc.php" method="post">
            <div>
                <label>Identification Number</label>
                <input type="number" name="officer_id" required>
            </div>
            <div>
                <label>Full Name</label>
                <input type="text" name="fullname" required>
            </div>
            <div>
                <label>Date of Birth</label>
                <input type="date" name="date_of_birth" required>
            </div>
            <div>
                <label>Gender</label>
                <select name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Phone Number</label>
                <input type="tel" name="phone_number" required>
            </div>
            <div>
                <label>Office Location</label>
                <input type="text" name="office_location" required>
            </div>
            <div>
                <label>Department</label>
                <select name="department" required>
                    <option value="patrol">Patrol Department</option>
                    <option value="investigations">Investigations Department</option>
                    <option value="traffic">Traffic Department</option>
                    <option value="other">Other</option>
                    <!-- Add more department options as needed -->
                </select>
            </div>
            <div>
                    <label for="password">Password</label>
                    <input type="password" name="password1" id="password1" placeholder="Enter a new Password" required>
                </div>
            <div>
                <input type="submit" name="submit" value="submit" class="submit">
            </div>
        </form>
    </div>
</main>
</body>
</html>

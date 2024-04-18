<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="css/register.css">
    <!-- Link to the external JavaScript files -->
    <script src="js/campus.js"></script>
    <script src="js/dept.js"></script>
    <!-- Separate the location and accommodation logic into two files -->
    <script src="js/location.js"></script>
</head>
<body>
    <!-- Include the header.php file -->
    <?php include 'components/header.php'; ?>

    <!-- Main section with registration form -->
    <main class="main">
        <div class="container">
            <!-- Registration form -->
            <form action="includes/register.inc.php" method="post" class="register-form">
                <h2>Register</h2>
                <p>Please fill in the registration details</p>
                <!-- Include other input fields based on your requirements -->
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter your full name" required>
                </div>
                                <!-- Registration number -->
                                <div class="form-group">
                    <label for="reg_number">Registration Number</label>
                    <input type="text" name="registration_number" id="reg_number" required>         
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <!-- Phone number -->
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone_number" id="phone" required>
                </div>

                <!-- Date of birth -->
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <!-- Change the type to text and add a pattern attribute to validate the date format -->
                    <input type="date" name="date_of_birth" id="dob" required>
                    
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" placeholder="Select Gender" required>
                        <option>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>


                <!-- Campus selection -->
                <div class="form-group">
                    <label for="campus">Campus</label>
                    <select name="campus" id="campus" onchange="handleCampusChange()" required>
                        <option>Select Campus</option>
                        <option value="unn">University of Nigeria, Nsukka, UNN</option>
                        <option value="unec">University of Nigeria Enugu campus, UNEC</option>
                        <option value="unth">University of Nigeria Teaching Hospital - Ituku-Ozalla</option>
                        <option value="unac">University of Nigeria Aba campus, UNAC Aba</option>
                        <!-- Add other campus options -->
                    </select>
                </div>
                <!-- Dynamic Faculty Options -->
<div class="form-group">
    <label for="faculty">Faculty</label>
    <select name="faculty" id="faculty" onchange="handleFacultyChange()" required>
    <option value="Select Faculty">Select Faculty</option>
        <!-- Faculty options will be dynamically updated using JavaScript -->
    </select>
</div>
                <!-- Dynamic Department Options -->
                <div class="form-group">
    <label for="department">Department</label>
    <select name="department" id="department" onchange="handleDepartmentChange()" required>
    <option value="Select Department">Select Department</option>
        <!-- Department options will be dynamically updated using JavaScript -->
    </select>
</div>


                <!-- Location selection -->
                <!-- Wrap the location input fields in a div with id "location" -->
                <div id="location" class="form-group">
                <label for="location">Accomodation</label>
<select name="accomodation" id="locat" onchange="handleLocationChange()" required>
    <option>Select Accomodation</option>
    <option value="Hostel">Hostel</option>
    <option value="Off Campus">Off Campus</option>
</select>

<div id="accommodationOptions">
    <!-- Accommodation options will be dynamically updated here -->
</div>
<div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password1" id="password1" placeholder="Enter a new Password" required>
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password2" id="password2" placeholder="Confirm Password" required>
                </div>




               

                <!-- Other input fields and submit button -->

                <div class="form-group">
                    <input type="submit" name="submit" value="submit" class="submit">
                </div>
            </form>
        </div>
    </main>
    <?php include 'components/footer.php'; ?>
    <script src="js/location.js"></script>
   
</body>
</html>



<?php

if (isset($_POST['submit'])) {
   include_once 'dbh.inc.php';

   // Collect data from the form
   $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $registration_number = mysqli_real_escape_string($conn, $_POST['registration_number']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
   $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $campus = mysqli_real_escape_string($conn, $_POST['campus']);
   $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
   $department = mysqli_real_escape_string($conn, $_POST['department']);
   $accomodation = mysqli_real_escape_string($conn, $_POST['accomodation']) ?? NULL;
   $hostel = mysqli_real_escape_string($conn, $_POST['hostel']) ?? NULL;
   $room_number = mysqli_real_escape_string($conn, $_POST['room_number']) ?? NULL;
   $lodge_location = mysqli_real_escape_string($conn, $_POST['lodge_location']) ?? NULL;
   $lodge_name = mysqli_real_escape_string($conn, $_POST['lodge_name']) ?? NULL;
   $nearest_landmark = mysqli_real_escape_string($conn, $_POST['nearest_landmark']) ?? NULL;
   $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
   $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    

   //Error handlers
   //check for empty fields
   if ( empty($fullname) || empty($registration_number) || empty($email) || empty($phone_number) || empty($fullname)
       || empty($date_of_birth) || empty($gender) || empty($campus) || empty($faculty) || empty($department)
       || empty($accomodation) || empty($password1) || empty($password2) ) {
        header("Location: ../register.php?register=empty");
        exit();
   } else {
            //check if the email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../register.php?register=invalidemail");
                exit();
            } else {
                $sql = "SELECT * FROM students WHERE registration_number = 'registration_number'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                header("Location: ../register.php?register=usertaken");
                exit();
                } else {
                    //Hashing the password
                    $hashedPWD1 = password_hash($password1, PASSWORD_DEFAULT);
                    $hashedPWD2 = password_hash($password2, PASSWORD_DEFAULT);

                    //Insert the user into the database
                    $sql = "INSERT INTO students (fullname, registration_number, email, phone_number, date_of_birth, gender, campus, faculty, 
                            department, accomodation, hostel, room_number, lodge_location, lodge_name, nearest_landmark, password1, password2) 
                            VALUES ('$fullname', '$registration_number', '$email', '$phone_number', '$date_of_birth', '$gender',
                            '$campus', '$faculty', '$department', '$accomodation', '$hostel', '$room_number', '$lodge_location', '$lodge_name', 
                            '$nearest_landmark', '$hashedPWD1', '$hashedPWD2')";
                    mysqli_query($conn, $sql);
                    header("Location: ../register.php?register=success");
                    exit();
                }
            
        }
   } 
} else {
    header("Location: ../register.php");
    exit(); }
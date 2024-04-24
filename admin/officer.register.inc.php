<?php

if (isset($_POST['submit'])) {
   include_once 'dbh.inc.php';

   // Collect data from the form
   $officer_id = mysqli_real_escape_string($conn, $_POST['officer_id']);
   $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
   $office_location = mysqli_real_escape_string($conn, $_POST['office_location']) ?? NULL;
   $department = mysqli_real_escape_string($conn, $_POST['department']);
   $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
   

   //Error handlers
   //check for empty fields
   if ( empty($officer_id) ||empty($fullname) || empty($date_of_birth) || empty($gender) || empty($email) || empty($phone_number) 
        || empty($office_location) || empty($department) ||  empty($password1)  ) {
        header("Location: add_officer.php?register=empty");
        exit();
   } else {
            //check if the email is valofficer_id
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: add_officer.php?register=invalyyidemail");
                exit();
            } else {
                $sql = "SELECT * FROM security_officers WHERE officer_id = 'officer_id'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                header("Location: add_officer.php?register=usertaken");
                exit();
                } else {
                    //Hashing the password
                    $hashedPWD1 = password_hash($password1, PASSWORD_DEFAULT);
                    
                    //Insert the user into the database
                    $sql = "INSERT INTO security_officers (officer_id, fullname, date_of_birth, gender, email, phone_number,  
                             office_location, department, password1) 
                            VALUES ('$officer_id', '$fullname', '$date_of_birth', '$gender', '$email', '$phone_number', 
                             '$office_location', '$department', '$hashedPWD1')";
                    mysqli_query($conn, $sql);
                    header("Location: add_officer.php?register=success");
                    echo "Security officer registered successfully.";
                }
            
        }
   } 
} else {
    header("Location: add_officer.php");
    exit(); }
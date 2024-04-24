<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'SECURITY';

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Define variables and initialize with empty values
$officer_id = $fullname = $date_of_birth = $gender = $email = $phone_number = $office_location = $office_location = $department = $password1 = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Assign post variables
    $officer_id = trim($_POST["officer_id"]);
    $fullname = trim($_POST["fullname"]);
    $date_of_birth = trim($_POST["date_of_birth"]);
    $gender = trim($_POST["gender"]);
    $email = trim($_POST["email"]);
    $phone_number = trim($_POST["phone_number"]);
    $office_location = trim($_POST["office_location"]);
    $department = trim($_POST["department"]);
    $password1 = trim($_POST["password1"]);

    // Prepare an insert statement
    $sql = "INSERT INTO security_officers (officer_id, fullname, date_of_birth, gender, email, phone_number, office_location, department, password1) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssssssss", $param_officer_id, $param_fullname, $param_date_of_birth, $param_gender, $param_email, $param_phone_number, $param_office_location, $param_department, $param_password1);
        
        // Set parameters
        $param_officer_id = $officer_id;
        $param_fullname = $fullname;
        $param_date_of_birth = $date_of_birth;
        $param_gender = $gender;
        $param_email = $email;
        $param_phone_number = $phone_number;
        $param_office_location = $office_location;
        $param_department = $department;
        $param_password1 = $password1;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "Security officer registered successfully.";
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $conn->close();
}
?>
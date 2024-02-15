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
    // Check if all form fields are filled
    // if(empty($_POST['name']) || empty($_POST['age']) || empty($_POST['address']) || empty($_POST['earning'])) {
    //     die("Please fill in all details.");
    // }

    // Collect data from the form
    $fullname = $_POST['fullname'];
    $registration_number = $_POST['registration_number'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $campus = $_POST['campus'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $accomodation = $_POST['accomodation'];
    $hostel = $_POST['hostel'];
    $room_number = $_POST['room_number'];
    $lodge_location = $_POST['lodge_location'];
    $lodge_name = $_POST['lodge_name'];
    $nearest_landmark = $_POST['nearest_landmark'];
   
    // Insert data into the database
    $sql = "INSERT INTO students (fullname, registration_number, email, phone_number, date_of_birth, gender,
    campus, faculty, department, accomodation, hostel, room_number, lodge_location, lodge_name, nearest_landmark) 
    VALUES ('$fullname', '$registration_number', '$email', '$phone_number', '$date_of_birth', '$gender',
    '$campus', '$faculty', '$department', '$accomodation', '$hostel', '$room_number', '$lodge_location', '$lodge_name', '$nearest_landmark')";

    if ($conn->query($sql) === TRUE) {
        echo "Records inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
    ?>

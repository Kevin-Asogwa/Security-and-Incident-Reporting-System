 <?php

 session_start();

 

 if (isset($_POST['submit'])) {
    
    include 'dbh.inc.php';

    $registration_number = mysqli_real_escape_string($conn, $_POST['registration_number']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);

    //Error handlers
    //check if inputs are empty
    if (empty($registration_number) || empty($password1)) {
        header("Location: ../login.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM students WHERE registration_number = '$registration_number'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../login.php?login=error00");
             exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($password1, $row[ 'password1']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../login.php?login=password");
                    exit();   
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here 
                   
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['registration_number'] = $row['registration_number'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone_number'] = $row['phone_number'];
                    $_SESSION['phone_number'] = $row['phone_number'];
                    $_SESSION['date_of_birth'] = $row['date_of_birth'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['campus'] = $row['campus'];
                    $_SESSION['faculty'] = $row['faculty'];
                    $_SESSION['department'] = $row['department'];
                    $_SESSION['accomodation'] = $row['accomodation'];
                    $_SESSION['hostel'] = $row['hostel'];
                    $_SESSION['room_number'] = $row['room_number'];
                    $_SESSION['lodge_location'] = $row['lodge_location'];
                    $_SESSION['lodge_name'] = $row['lodge_name'];
                    $_SESSION['nearest_landmark'] = $row['nearest_landmark'];
                    // $_SESSION['password1'] = $row['password1'];
                    // $_SESSION['password2'] = $row['password2'];
                    header("Location: ../student_dashboard/dashboard.php");
                    exit();
                    
                    

                }
            }
        }
    }
 } else {
    header("Location: ../login.php?login=error");
    exit();
 }
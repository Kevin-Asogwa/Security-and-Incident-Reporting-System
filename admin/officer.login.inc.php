 <?php

 session_start();

 

 if (isset($_POST['submit'])) {
    
    include 'dbh.inc.php';

    $officer_id = mysqli_real_escape_string($conn, $_POST['officer_id']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);

    //Error handlers
    //check if inputs are empty
    if (empty($officer_id) || empty($password1)) {
        header("Location: ../officer_login.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM security_officers WHERE officer_id = '$officer_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../officer_login.php?login=error00");
             exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($password1, $row[ 'password1']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../officer_login.php?login=password");
                    exit();   
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here 
                                       
                    $_SESSION['officer_id'] = $row['officer_id'];
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['date_of_birth'] = $row['date_of_birth'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone_number'] = $row['phone_number'];
                    $_SESSION['office_location'] = $row['office_location'];
                    $_SESSION['department'] = $row['department'];
                    $_SESSION['password1'] = $row['password1'];
                  
                    header("Location: ../security_officer/officer_dashboard.php");
                    exit();
                    
                    

                }
            }
        }
    }
 } else {
    header("Location: ../officer_login.php?login=error");
    exit();
 }
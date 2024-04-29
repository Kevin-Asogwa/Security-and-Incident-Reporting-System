<?php
// Include database connection file
require_once "../includes/dbh.inc.php";

// Start the session
if(!isset($_SESSION)) {
    session_start();
}
    
    // Define variables and initialize with empty values
    $Date_and_time_of_incident = $location_of_incident = $type_of_incident = $description_of_incident = $witnesses = $evidence = "";
    $contact_information = $fullname = $registration_number = $status = "";
    
    // Check if the report is not anonymous
    if(!isset($_POST["anonymous_reporting"]) || $_POST["anonymous_reporting"] != "on") {
        // Retrieve user's fullname and registration_number from the students table
        // Assuming you have stored the registration number in the session
        if(isset($_SESSION["registration_number"])) {
            $registration_number = $_SESSION["registration_number"];
    
            $sql_fetch_user_info = "SELECT fullname, registration_number FROM students WHERE registration_number = ?";
            if($stmt_fetch_user_info = $conn->prepare($sql_fetch_user_info)){
                // Bind variable to the prepared statement as parameter
                $stmt_fetch_user_info->bind_param("s", $registration_number);
    
                // Attempt to execute the prepared statement
                if($stmt_fetch_user_info->execute()){
                    // Store result
                    $stmt_fetch_user_info->store_result();
    
                    // Check if user exists
                    if($stmt_fetch_user_info->num_rows() == 1){
                        // Bind result variables
                        $stmt_fetch_user_info->bind_result($fullname, $registration_number);
    
                        // Fetch values
                        $stmt_fetch_user_info->fetch();
                    }
                }
    
                // Close statement
                $stmt_fetch_user_info->close();
            }
        }
    }
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate and assign input values
        $Date_and_time_of_incident = trim($_POST["Date_and_time_of_incident"]);
        $location_of_incident = trim($_POST["location_of_incident"]);
        $type_of_incident = trim($_POST["type_of_incident"]);
        $description_of_incident = trim($_POST["description_of_incident"]);
        $witnesses = trim($_POST["witnesses"]);
        $contact_information = trim($_POST["contact_information"]);
    
        // Handle file upload
        if(isset($_FILES["evidence"]) && $_FILES["evidence"]["error"] == 0){
            // Directory for file upload
            $target_dir = "../img_upload/";
            // File name
            $target_file = $target_dir . basename($_FILES["evidence"]["name"]);
            // File extension
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif","pdf","mp4","avi","mov");
    
            // Check if file type is valid
            if(in_array($imageFileType,$extensions_arr)){
                // Move uploaded file to directory
                if(move_uploaded_file($_FILES["evidence"]["tmp_name"], $target_file)){
                    // File uploaded successfully
                    $evidence = $target_file;
                } else {
                    // Failed to upload file
                    echo "Failed to upload file.";
                }
            } else {
                // Invalid file type
                echo "Only JPG, JPEG, PNG, GIF, PDF, MP4, AVI, and MOV files are allowed.";
            }
        }
    
        // Prepare an insert statement
        $sql = "INSERT INTO incident (date_and_time_of_incident, location_of_incident, type_of_incident, description_of_incident, witnesses, evidence, contact_information, fullname, registration_number, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')"; // Set default status as "pending"

    
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssss", $param_Date_and_time_of_incident, $param_location_of_incident, $param_type_of_incident, $param_description_of_incident, $param_witnesses, $param_evidence, $param_contact_information, $param_fullname, $param_registration_number);
    
            // Set parameters
            $param_Date_and_time_of_incident = $Date_and_time_of_incident;
            $param_location_of_incident = $location_of_incident;
            $param_type_of_incident = $type_of_incident;
            $param_description_of_incident = $description_of_incident;
            $param_witnesses = $witnesses;
            $param_evidence = $evidence;
            $param_contact_information = $contact_information;
            $param_fullname = $fullname;
            $param_registration_number = $registration_number;
    
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Incident reported successfully.";
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
    
            // Close statement
            $stmt->close();
        }
    }
    
    include 'dashboard_header.php';
    ?>
        
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Report Incident</title>
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="dashboard.css">
    <style>
    .main {
        width: 50%;
        height: 80%;
        flex-direction: column;
        background-color: var(--white);
        color: var(--black);
        margin-left: 30%;
        margin-top: -32%;
        margin-bottom: 10%;
        padding-left: 5px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 5px;
    }

    form div {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="text"],
    input[type="datetime-local"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="file"] {
        width: calc(100% - 20px); /* Adjust for file input button */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Styling for the checkbox */
    input[type="checkbox"] {
        margin-right: 10px;
        vertical-align: middle;
    }

    /* Styling for the submit button */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

</style>
</head>
<body>

    <div class="main" >
        <h2>Report an Incident</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div>
                <input type="checkbox" name="anonymous_reporting" id="anonymous_reporting">
                <label for="anonymous_reporting">Report Anonymously</label>
            </div>

            <div>
                <label>Date and Time of Incident</label>
                <input type="datetime-local" name="Date_and_time_of_incident" required>
            </div>
            <div>
                <label>location of the Incident</label>
                <input type="text" name="location_of_incident" required>
            </div>
            <div>
                <label>Type of Incident</label>
                <select name="type_of_incident" required>
                    <option value="theft">Theft</option>
                    <option value="assault">Assault</option>
                    <option value="health_issues">Health issues</option>
                    <option value="fire">Fire</option>
                    <option value="others">Others</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div>
                <label>Description of the Incident</label>
                <textarea name="description_of_incident" required></textarea>
            </div>
            <div>
                <label>Witnesses (if any)</label>
                <input type="text" name="witnesses">
            </div>
            <div>
                <label>Evidence (if any)</label>
                <input type="file" name="evidence">
            </div>
            <div>
                <label>Contact Information</label>
                <input type="text" name="contact_information">
            </div>
            
            <div>
                <input type="submit" value="Submit Report">
            </div>
        </form>
    </div>
 
</body>
</html>

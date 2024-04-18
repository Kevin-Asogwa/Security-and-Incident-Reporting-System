<?php
// Include database connection file
require_once "../includes/dbh.inc.php";

// Define variables and initialize with empty values
$Date_and_time_of_incident = $location_of_incident = $type_of_incident = $description_of_incident = $witnesses = $evidence = "";
$contact_information = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate and assign input values
    $Date_and_time_of_incident = trim($_POST["Date_and_time_of_incident"]);
    $location_of_incident = trim($_POST["location_of_incident"]);
    $type_of_incident = trim($_POST["type_of_incident"]);
    $description_of_incident = trim($_POST["description_of_incident"]);
    $witnesses = trim($_POST["witnesses"]);
    $evidence = $_FILES["evidence"]; // Handle file upload
    $contact_information = trim($_POST["contact_information"]);
   

    // Prepare an insert statement
    $sql = "INSERT INTO incident (date_and_time_of_incident, location_of_incident, type_of_incident, description_of_incident, witnesses, evidence, contact_information) VALUES (?, ?, ?, ?, ?, ?, ?);";
    
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssssss", $param_Date_and_time_of_incident, $param_location_of_incident, $param_type_of_incident, $param_description_of_incident, $param_witnesses, $param_evidence, $param_contact_information);
        
        // Set parameters
        $param_Date_and_time_of_incident = $Date_and_time_of_incident;
        $param_location_of_incident = $location_of_incident;
        $param_type_of_incident = $type_of_incident;
        $param_description_of_incident = $description_of_incident;
        $param_witnesses = $witnesses;
        $param_evidence = $evidence['name']; // Save file name
        $param_contact_information = $contact_information;
       
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "Incident reported successfully.";
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $conn->close();
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
    
</head>
<body>

    <div class="main" class="tips">
        <h2>Report an Incident</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
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
    <?php include 'dashboard_footer.php'; ?>
</body>
</html>

<?php
// Include the database connection file
require_once "../admin/dbh.inc.php";
// Start the session
if(!isset($_SESSION)) {
    session_start();
}

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["officer_id"])) {
    header("location: ../login.php");
    exit;
}

// Get the user id from the session
$id = $_SESSION["officer_id"];

// Get the user details from the database
$sql = "SELECT * FROM security_officers WHERE officer_id = ? ;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Retrieve all incidents from the incident table
$sql_incidents = "SELECT * FROM incident ORDER BY timestamp DESC;";
$result_incidents = $conn->query($sql_incidents);

// Close the database connection
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reported Incidents</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* Body styles */
.wrapper {
    margin-top: -33%;
    margin-bottom: 10%;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    margin-top: 5%;
}

table {
    width: 80%;
    border-collapse: collapse;
    margin-left: 17%;
    
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}



</style>
</head>
<body>

<?php include 'officer_dashboard_header.php'; ?>

<div class="wrapper">
    <h2>All Reported Incidents</h2>
    <table>
        <thead>
            <tr>
                <th>Date and Time of the incident</th>
                <th>Submission Timestamp</th>
                <th>Location</th>
                <th>Type</th>
                <th>Description</th>
                <th>Witnesses</th>
                <th>Evidence</th>
                <th>Contact Information</th>
                <th>Fullname</th>
                <th>Registration Number</th>
                <th>Actions</th> <!-- Add Feedback Column -->
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_incidents->num_rows > 0) {
                // Output data of each row
                while($row = $result_incidents->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["date_and_time_of_incident"]."</td>";
                    echo "<td>".$row["timestamp"]."</td>";
                    echo "<td>".$row["location_of_incident"]."</td>";
                    echo "<td>".$row["type_of_incident"]."</td>";
                    echo "<td>".$row["description_of_incident"]."</td>";
                    echo "<td>".$row["witnesses"]."</td>";
                     // Display link to the evidence file if it's not empty  
                     if (!empty($row["evidence"])) {
                        echo "<td><a href=\"" . $row['evidence'] . "\">Show Evidence</a></td>";
                    } else {
                        echo "<td>" . $row["evidence"] . "</td>";
                    }
                    echo "<td>".$row["contact_information"]."</td>";
                    echo "<td>".$row["fullname"]."</td>";
                    echo "<td>".$row["registration_number"]."</td>";                    
                    // Check if status is pending
                    echo "<td><a class='Pending' href='change_status.php?incident_id=" . $row['incident_id'] . "'>" . $row["status"] . "</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No incidents reported.</td></tr>";
            }
            ?>      
        </tbody>
    </table>
</div>

<?php include 'officer_dashboard_footer.php'; ?>

</body>
</html>

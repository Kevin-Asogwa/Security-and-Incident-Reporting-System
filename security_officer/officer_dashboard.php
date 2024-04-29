<?php
if(!isset($_SESSION)) {
    session_start();
}
$_SESSION['user_type'] = "officer";

// Include the database connection file
require_once "../admin/dbh.inc.php";

// Count the number of incidents with status "Finished"
$sql_count_finished = "SELECT COUNT(*) AS finished_count FROM incident WHERE status = 'Finished'";
$result_count_finished = $conn->query($sql_count_finished);
$row_count_finished = $result_count_finished->fetch_assoc();
$finished_count = $row_count_finished['finished_count'];

// Retrieve the incidents with status "Finished"
$sql_finished_incidents = "SELECT * FROM incident WHERE status = 'Finished'";
$result_finished_incidents = $conn->query($sql_finished_incidents);

// Count the number of resolved reports ( "Resolved" means "Finished")
$resolved_reports = $finished_count; // Assigning the value of finished_count to resolved_reports

// Count the number of incidents with status "Attending"
$sql_count_attending = "SELECT COUNT(*) AS attending_count FROM incident WHERE status = 'Attending'";
$result_count_attending = $conn->query($sql_count_attending);

// Check if the query was successful
if ($result_count_attending) {
    $row_count_attending = $result_count_attending->fetch_assoc();
    $attending_count = $row_count_attending['attending_count'];
} else {
    // Handle the case where the query fails
    echo "Error: Failed to fetch attending count.";
}

// Retrieve the incidents with status "Pending"
$sql_pending_incidents = "SELECT * FROM incident WHERE status = 'Pending'";
$result_pending_incidents = $conn->query($sql_pending_incidents);

// Count the number of incidents with status "Pending"
$sql_count_pending = "SELECT COUNT(*) AS pending_count FROM incident WHERE status = 'Pending'";
$result_count_pending = $conn->query($sql_count_pending);

// Check if the query was successful
if ($result_count_pending) {
    $row_count_pending = $result_count_pending->fetch_assoc();
    $pending_count = $row_count_pending['pending_count'];
} else {
    // Handle the case where the query fails
    echo "Error: Failed to fetch attending count.";
}

// Retrieve the incidents with status "Attending"
$sql_pending_incidents = "SELECT * FROM incident WHERE status = 'Pending'";
$result_pending_incidents = $conn->query($sql_pending_incidents);


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
    <title>Officer Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* Body styles */


h2 {
    text-align: center;
    margin-bottom: 2px;
    margin-top: 3%;
}

table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed; /* Fix the table layout */
    
    
}

table th, table td {
    border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            white-space: nowrap; /* Prevent line breaks in table cells */
            overflow: hidden; /* Hide overflow content */
            text-overflow: ellipsis; /* Show ellipsis for overflow text */
}
.incident-table {
            max-height: 500px; /* Set maximum height for the table */
            overflow-y: auto; /* Enable vertical scroll */
        }

        .wrapper {
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }
.box {
    text-align: center;
}

</style>
</head>

<body>

<?php include 'officer_dashboard_header.php'; ?>
<!-- Main section -->
<div class="main">
            <!-- Boxes section -->
            <div class="boxes">
               
                <div class="box">
                    <div class="icon"><a href="attending.php"><i class="fas fa-spinner"></i></div>
                    <div class="info">
                        <h3>Active Reports: <br>
                        <?php echo $attending_count; ?> </h3> </a>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><a href="pending.php"><i class="fas fa-calendar-times"></i></div>
                    <div class="info">
                        <h3>Pending Reports: <br>
                            <?php echo $pending_count; ?> </h3> </a>                       
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><a href="resolved.php"><i class="fas fa-check-circle"></i></div>
                    <div class="info">
                        <h3>Resolved Reports: <br>
                        <?php echo $resolved_reports; ?></h3></a>
                        
                    </div>
                </div>
            </div>
                                                             
    <h2>All Reported Incidents</h2>
    <a href="reported.php"><h3>Total Reports: <?php echo $incident_reported; ?> (Click hereto view the full reports) </h3> </a> 
    <div class="incident-table">
    <div class="wrapper">
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
                <th>Actions</th> 
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
    </div>
    </div> 
    <?php include 'officer_dashboard_footer.php'; ?>
    
    <!-- Script to toggle the sub-profile-overview menu -->
    <script>
        var profileOverview = document.getElementById("profile-overview");
        var subProfileOverview = document.getElementById("sub-profile-overview");
        profileOverview.addEventListener("click", function() {
            subProfileOverview.classList.toggle("show");
        });
    </script>
</body>
</html>
    





       

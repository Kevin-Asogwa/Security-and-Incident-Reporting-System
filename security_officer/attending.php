<?php
// Include the database connection file
require_once "../admin/dbh.inc.php";

// Count the number of incidents with status "Attending"
$sql_count_attending = "SELECT COUNT(*) AS attending_count FROM incident WHERE status = 'Attending'";
$result_count_attending = $conn->query($sql_count_attending);
$row_count_attending = $result_count_attending->fetch_assoc();
$attending_count = $row_count_attending['attending_count'];

// Retrieve the incidents with status "Attending"
$sql_attending_incidents = "SELECT * FROM incident WHERE status = 'Attending'";
$result_attending_incidents = $conn->query($sql_attending_incidents);


?>



<div class="box">
    <div class="icon"><a href="attending.php"><i class="fas fa-exclamation-triangle"></i></a></div>
    <div class="info">
        <h3>Attending Reports: <?php echo $attending_count; ?> </h3>
    </div>
</div>


<!-- Display table of incidents with status "Finished" -->
<div class="incident-table">
    <h2>Finished Incidents</h2>
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
                <th>Status</th> <!-- Add Feedback Column -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the finished incidents and display them in table rows
            while ($row = $result_attending_incidents->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["date_and_time_of_incident"] . "</td>";
                echo "<td>" . $row["timestamp"] . "</td>";
                echo "<td>" . $row["location_of_incident"] . "</td>";
                echo "<td>" . $row["type_of_incident"] . "</td>";
                echo "<td>" . $row["description_of_incident"] . "</td>";
                echo "<td>" . $row["witnesses"] . "</td>";
                // Display link to the evidence file if it's not empty  
                if (!empty($row["evidence"])) {
                    echo "<td><a href=\"" . $row['evidence'] . "\">Show Evidence</a></td>";
                } else {
                    echo "<td>" . $row["evidence"] . "</td>";
                }
                echo "<td>" . $row["contact_information"] . "</td>";
                echo "<td>" . $row["fullname"] . "</td>";
                echo "<td>" . $row["registration_number"] . "</td>";
                echo "<td><a href='feedback.php?incident_id=" . $row["incident_id"] . "'>Add Feedback</a></td>";
                echo "<td><a class='Pending' href='change_status.php?incident_id=" . $row['incident_id'] . "'>" . $row["status"] . "</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>


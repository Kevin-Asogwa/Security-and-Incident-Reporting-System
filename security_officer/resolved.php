
<?php
// Include the database connection file
require_once "../admin/dbh.inc.php";

// Count the number of incidents with status "Finished"
$sql_count_finished = "SELECT COUNT(*) AS finished_count FROM incident WHERE status = 'Finished' ORDER BY timestamp DESC;";
$result_count_finished = $conn->query($sql_count_finished);
$row_count_finished = $result_count_finished->fetch_assoc();
$finished_count = $row_count_finished['finished_count'];

// Retrieve the incidents with status "Finished"
$sql_finished_incidents = "SELECT * FROM incident WHERE status = 'Finished'";
$result_finished_incidents = $conn->query($sql_finished_incidents);

// Count the number of resolved reports (assuming "Resolved" means "Finished")
$resolved_reports = $finished_count; // Assigning the value of finished_count to resolved_reports
?>
<!-- Replace the "Resolved Reports" section with incident count and table -->
<div class="box">
    <div class="icon"><a href="finished_reports.php"><i class="fas fa-check-circle"></i></div>
    <div class="info">
        <h3>Finished Reports: <?php echo $finished_count; ?></h3></a>
        <!-- Add a link to view incidents with status "Finished" -->
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
            while ($row = $result_finished_incidents->fetch_assoc()) {
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

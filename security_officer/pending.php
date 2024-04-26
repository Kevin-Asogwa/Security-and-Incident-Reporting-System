<?php
// Include the database connection file
require_once "../admin/dbh.inc.php";

// Initialize the variable to avoid undefined variable warning
$pending_count = 0;

// Count the number of incidents with status "Pending"
$sql_count_pending = "SELECT COUNT(*) AS pending_count FROM incident WHERE status = 'Pending'";
$result_count_pending = $conn->query($sql_count_pending);

// Check if the query was successful
if ($result_count_pending) {
    $row_count_pending = $result_count_pending->fetch_assoc();
    $pending_count = $row_count_pending['pending_count'];
} else {
    // Handle the case where the query fails
    echo "Error: Failed to fetch pending count.";
}

// Retrieve the incidents with status "Pending"
$sql_pending_incidents = "SELECT * FROM incident WHERE status = 'Pending'";
$result_pending_incidents = $conn->query($sql_pending_incidents);
?>


<div class="box">
    <div class="icon"><a href="pending_reports.php"><i class="fas fa-clock"></i></a></div>
    <div class="info">
        <h3>Pending Reports: <?php echo $pending_count; ?> </h3>
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
            while ($row = $result_pending_incidents->fetch_assoc()) {
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

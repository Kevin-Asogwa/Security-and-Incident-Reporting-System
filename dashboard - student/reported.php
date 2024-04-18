<?php
// Include database connection file
require_once "../includes/dbh.inc.php";

// Fetch all incident reports from the database
$sql = "SELECT * FROM incident ORDER BY date_and_time_of_incident DESC;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Reported Incidents</title>
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Reported Incidents</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Date and Time</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Witnesses</th>
                        <th>Evidence</th>
                        <th>Contact Information</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo isset($row['date_and_time_of_incident']) ? htmlspecialchars($row['date_and_time_of_incident']) : ''; ?></td>
                            <td><?php echo isset($row['location_of_incident']) ? htmlspecialchars($row['location_of_incident']) : ''; ?></td>
                            <td><?php echo isset($row['type_of_incident']) ? htmlspecialchars($row['type_of_incident']) : ''; ?></td>
                            <td><?php echo isset($row['description_of_incident']) ? htmlspecialchars($row['description_of_incident']) : ''; ?></td>
                            <td><?php echo isset($row['witnesses']) ? htmlspecialchars($row['witnesses']) : ''; ?></td>
                            <td><?php echo isset($row['witnesses']) ? htmlspecialchars($row['evidence']) : ''; ?></td>
                            <td><?php echo isset($row['contact_information']) ? htmlspecialchars($row['contact_information']) : ''; ?></td>
                            <td><?php echo isset($row['status']) ? htmlspecialchars($row['status']) : ''; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No incidents have been reported yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Include the database connection file
require_once "../includes/dbh.inc.php";

// Start the session
if(!isset($_SESSION)) {
    session_start();
}

// Check if the user is logged in as a student, if not then redirect to the login page
if (!isset($_SESSION["registration_number"])) {
    header("location: ../login.php");
    exit;
}

// Get the student id from the session
$registration_number = $_SESSION["registration_number"];

// Retrieve all incidents reported by the current student from the incident table
$sql_incidents = "SELECT * FROM incident WHERE registration_number = ?";
$stmt_incidents = $conn->prepare($sql_incidents);
$stmt_incidents->bind_param("i", $registration_number);
$stmt_incidents->execute();
$result_incidents = $stmt_incidents->get_result();

// Close the database connection
$stmt_incidents->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Incident Status</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/feedback.css">
    <style>
        .wrapper { margin-left: 30%;
        margin-top: -30%;
        margin-bottom: 10%;
        align-items: center;
        }
    </style>
</head>
<body>

<?php include 'dashboard_header.php'; ?>

<div class="wrapper">
    <h2>Your Report Status</h2>
    <table>
        <thead>
            <tr>
                <th>Date and Time of the Incident</th>
                <th>Submission Timestamp</th>
                <th>Location</th>
                <th>Type</th>
                <th>Description</th>
                <th>Actions</th>
                <th>Incident Status</th> <!-- Added Incident Status Column -->
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_incidents->num_rows > 0) {
                // Output data of each row
                while ($row = $result_incidents->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["date_and_time_of_incident"] . "</td>";
                    echo "<td>" . $row["timestamp"] . "</td>";
                    echo "<td>" . $row["location_of_incident"] . "</td>";
                    echo "<td>" . $row["type_of_incident"] . "</td>";
                    echo "<td>" . $row["description_of_incident"] . "</td>";
                    echo "<td><a href=\"feedback.php?incident_id=" . $row['incident_id'] . "\">View Feedback</a></td>";
                    // Display incident status
                    echo "<td>" . $row["status"] . "</td>"; // Assuming status is a column in your incident table
                    echo "</tr>";
                } 
            } else {
                echo "<tr><td colspan='10'>No incidents reported yet.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'dashboard_footer.php'; ?>

</body>
</html>

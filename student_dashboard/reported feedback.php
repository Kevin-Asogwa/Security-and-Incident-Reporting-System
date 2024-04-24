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
    <title>Reported Incidents and Feedback</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* Body styles */
        .wrapper {
            width: 50%;
        height: 80%;
        flex-direction: column;
        background-color: var(--white);
        color: var(--black);
        margin-left: 25%;
        margin-top: -38%;
        margin-bottom: 10%;
        padding-left: 5px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 10%;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-left: 18%;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php include 'dashboard_header.php'; ?>

<div class="wrapper">
    <h2>Your Reported Incidents and Feedback</h2>
    <table>
        <thead>
            <tr>
                <th>Date and Time of the Incident</th>
                <th>Submission Timestamp</th>
                <th>Location</th>
                <th>Type</th>
                <th>Description</th>
                <th>Witnesses</th>
                <th>Evidence</th>
                <th>Contact Information</th>
                <th>Actions</th> <!-- View Feedback Column -->
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
                    echo "<td>" . $row["witnesses"] . "</td>";
                    echo "<td>" . $row["evidence"] . "</td>";
                    echo "<td>" . $row["contact_information"] . "</td>";
                    echo "<td><a href=\"feedback.php?incident_id=" . $row['incident_id'] . "\">View Feedback</a></td>";
                    echo "</tr>";
                } 
            } else {
                echo "<tr><td colspan='9'>No incidents reported yet.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'dashboard_footer.php'; ?>

</body>
</html>

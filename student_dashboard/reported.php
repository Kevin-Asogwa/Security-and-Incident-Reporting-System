<?php
// Include database connection file
require_once "../includes/dbh.inc.php";

// Check if the user is logged in
session_start();
if (!isset($_SESSION["registration_number"])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Fetch the currently logged-in user's registration number
$registration_number = $_SESSION["registration_number"];

// Fetch incidents reported by the currently logged-in user
$sql = "SELECT * FROM incident WHERE registration_number = ? ORDER BY date_and_time_of_incident DESC;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $registration_number);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        .wrapper {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
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

    <div class="wrapper">
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
    <?php include 'dashboard_footer.php'; ?>
</body>
</html>

<?php
// Include the database connection file
require_once "../admin/dbh.inc.php";

// Fetch the details of security officers from the database
$sql_security_officers = "SELECT * FROM security_officers";
$result_security_officers = $conn->query($sql_security_officers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Emergency Security Contacts</title>
    <!-- Add CSS styles here if needed -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- Header and navigation code -->
    <?php include 'dashboard_header.php'; ?>

    <!-- Main content section -->
    <div class="main">
        <h2>Emergency Security Contacts</h2>
        <div class="security-officers">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Department</th>
                        <th>Office Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display the details of each security officer in table rows
                    while ($row = $result_security_officers->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['fullname'] . "</td>";
                        echo "<td>" . $row['phone_number'] . "</td>";
                        echo "<td>" . $row['department'] . "</td>";
                        echo "<td>" . $row['office_location'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer code -->
    <?php include 'dashboard_footer.php'; ?>
</body>
</html>

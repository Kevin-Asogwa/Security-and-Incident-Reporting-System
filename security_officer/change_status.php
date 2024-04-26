<?php
// Include database connection
require_once "../admin/dbh.inc.php";
// Start the session
if(!isset($_SESSION)) {
    session_start();
}

// Check if the user is logged in and if the user type is set in the session
if (isset($_SESSION['user_type'])) {
    // Retrieve the user type from the session
    $user_type = $_SESSION['user_type'];

    
} else {
    // Handle the case where user type is not set in the session
    echo "User type is not set.";
}

// Check if the incident ID is provided in the URL
if (isset($_GET['incident_id'])) {
    $incident_id = $_GET['incident_id'];

    // Fetch incident details from the database
    $sql = "SELECT * FROM incident WHERE incident_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $incident_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $incident = $result->fetch_assoc();

    // Check if incident details are found
    if (!$incident) {
        echo "Error: Incident not found";
        exit();
    }
} else {
    // Redirect or display an error message if incident ID is not provided
    echo "Error: Incident ID not provided";
    exit();
}

// Fetch all feedback messages related to the incident from the database
$sql_feedback = "SELECT * FROM messages WHERE incident_id = ? ORDER BY timestamp ASC";
$stmt_feedback = $conn->prepare($sql_feedback);
$stmt_feedback->bind_param("i", $incident_id);
$stmt_feedback->execute();
$result_feedback = $stmt_feedback->get_result();

// Check if the incident_id is provided in the URL parameter
if (!isset($_GET['incident_id'])) {
    // Redirect to the original page if incident_id is not provided
    header("Location: officer_reported.php");
    exit();
}

// Get the incident_id from the URL parameter
$incident_id = $_GET['incident_id'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $new_status = $_POST['new_status']; // Assuming new_status is the name of the select input

    // Update the status of the incident in the database
    $sql = "UPDATE incident SET status = ? WHERE incident_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_status, $incident_id);
    $stmt->execute();

    // Redirect back to the original page after updating the status
    header("Location: reported.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Incident Status</title>
    <link rel="stylesheet" href="../css/feedback.css">
    <style>
        /* CSS for the form */
form {
    max-width: 400px; /* Set maximum width for the form */
    margin: 0 auto; /* Center the form horizontally */
    padding: 20px; /* Add some padding */
    border: 1px solid #ccc; /* Add a border */
    border-radius: 5px; /* Add border radius */
    background-color: #f9f9f9; /* Set background color */
}

label {
    font-weight: bold; /* Make label text bold */
}
h2 {
    text-align: center;
}
select, button {
    width: 100%; /* Set the width of select and button to 100% */
    padding: 10px; /* Add padding */
    margin-top: 10px; /* Add top margin */
    border: 1px solid #ccc; /* Add a border */
    border-radius: 5px; /* Add border radius */
    box-sizing: border-box; /* Include padding and border in element's total width/height */
}

button {
    background-color: #4caf50; /* Set button background color */
    color: white; /* Set button text color */
    cursor: pointer; /* Change cursor to pointer on hover */
}

button:hover {
    background-color: #45a049; /* Darken button background color on hover */
}
</style>
</head>
<body>
<?php include 'officer_dashboard_header.php'; ?>
<div class="wrapper">
 <div class="content">
 <h2>Change Incident Status</h2>
        <strong><p>Current Status: 
        <?php 
        // Echo the current status as a link to change_status.php
        echo "<a class='Pending' href='change_status.php?incident_id=" . $incident_id . "'>" . $incident["status"] . "</a>"; 
        ?>
        </p> </strong>
    <form method="post">
        <label for="new_status">Select New Status:</label>
        <select name="new_status" id="new_status">
            <option value="Pending">Pending</option>
            <option value="Attending">Attending</option>
            <option value="Finished">Finished</option>
        </select>
        <br><br>
        <button type="submit">Submit</button>
    </form>
<ul>
        <li><strong>Full Name:</strong> <?php echo $incident['fullname']; ?></li>
        <li><strong>Registration Number:</strong> <?php echo $incident['registration_number']; ?></li>
        <li><strong>Date and Time of the Incident:</strong> <?php echo $incident['date_and_time_of_incident']; ?></li>
        <li><strong>Submission Timestamp:</strong> <?php echo $incident['timestamp']; ?></li>
        <li><strong>Location:</strong> <?php echo $incident['location_of_incident']; ?></li>
        <li><strong>Type:</strong> <?php echo $incident['type_of_incident']; ?></li>
        <li><strong>Description:</strong> <?php echo $incident['description_of_incident']; ?></li>
        <li><strong>Witnesses:</strong> <?php echo $incident['witnesses']; ?></li>
        <li><strong>Contact Information:</strong> <?php echo $incident['contact_information']; ?></li>
        <li><strong>Evidence:</strong> 
            <?php if (!empty($incident['evidence'])): ?>
                <a href="<?php echo $incident['evidence']; ?>" >View Evidence</a>
            <?php else: ?>
                <!-- Display message if no evidence is available -->
                <?php echo $incident['evidence']; ?></li>
            <?php endif; ?>
        </li>        
    </ul>
    
</div>
</div>
</body>
</html>

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="../css/feedback.css">
    <style>
        .wrapper {
            margin-top: -500px;
            align-items: center;
            padding: auto;
            margin-left: 500px;
        }
        h2, h3 {
            text-align: center;
        }
    </style>
</head>
<body>
<!-- Main section -->
<?php include 'officer_dashboard_header.php'; ?>
<div class="wrapper">
 <div class="content">
    <h2>Provide Feedback</h2>
    <h3>Incident Details:</h3>
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

    <!-- Display feedback messages -->
    <div class="feedback-messages">
    <?php while ($row_feedback = $result_feedback->fetch_assoc()): ?>
        <div class="message">
            <div class="content"><?php echo $row_feedback['message_content']; ?></div>
            
            <!-- Display image if available -->
            <?php if (!empty($row_feedback['file_url'])): ?>
                <img src="<?php echo $row_feedback['file_url']; ?>" alt="Uploaded Image">
            <?php endif; ?>

            <!-- Check if the user is an officer -->
            <?php if ($user_type === 'officer'): ?>
                <!-- Display timestamp as "Sent at" for feedback sent by officer -->
                <?php if ($row_feedback['sender_type'] === 'officer'): ?>
                    <div class="timestamp">Sent at <?php echo $row_feedback['timestamp']; ?></div>
                <?php else: ?>
                    <!-- Display timestamp as "Received at" for feedback received by officer -->
                    <div class="timestamp">Received at <?php echo $row_feedback['timestamp']; ?></div>
                <?php endif; ?>
            <?php else: ?>
                <!-- Check if the feedback is sent by the student -->
                <?php if ($row_feedback['sender_type'] === 'student'): ?>
                    <!-- Display timestamp as "Sent at" for feedback sent by student -->
                    <div class="timestamp">Sent at <?php echo $row_feedback['timestamp']; ?></div>
                <?php else: ?>
                    <!-- Display timestamp as "Received at" for feedback received by student -->
                    <div class="timestamp">Received at <?php echo $row_feedback['timestamp']; ?></div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
    </div>

    <form id="feedbackForm" action="submit_feedback.php" method="POST" enctype="multipart/form-data">
    <!-- Hidden input for incident ID -->
    <input type="hidden" name="incident_id" value="<?php echo $incident_id; ?>">
    <div>
        <label for="feedback">Feedback:</label><br>
        <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea>
    </div>
    <div>
        <!-- Input for file upload -->
        <label for="file_upload">Upload File:</label><br>
        <input type="file" id="file_upload" name="file" accept="image/*,video/*">
    </div>
    <div>
        <input type="submit" value="Submit Feedback" id="submitBtn">
    </div>
    <div>
    <strong><p>Status: 
        <?php 
        // Echo the current status as a link to change_status.php
        echo "<a class='Pending' href='change_status.php?incident_id=" . $incident_id . "'>" . $incident["status"] . "</a>"; 
        ?>
    </p> </strong>
</div>

</form>

<script>
    document.getElementById('feedbackForm').addEventListener('submit', function(event) {
        // Get the feedback message and file upload input
        var feedback = document.getElementById('feedback').value;
        var fileUpload = document.getElementById('file_upload').files[0];
        
        // Check if either feedback or file upload is provided
        if (!feedback.trim() && !fileUpload) {
            alert('Please provide either feedback or upload a file.');
            event.preventDefault(); // Prevent form submission
        }
    });
</script>


  </div>
</div>

</body>
</html>

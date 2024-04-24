<?php
// Include database connection file
require_once "../admin/dbh.inc.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $incident_id = $_POST["incident_id"];
    $feedback = $_POST["feedback"];

    // Validate form data (you can add more validation as needed)

    // Sanitize the form data to prevent SQL injection
    $incident_id = mysqli_real_escape_string($conn, $incident_id);
    $feedback = mysqli_real_escape_string($conn, $feedback);

    // Get the officer's ID from the session
    session_start();
    $officer_id = $_SESSION["officer_id"];
    $file_dir = "../img_upload/";
    $file_path = $file_dir . basename($_FILES["file"]["name"]);
    $file_upload_ok = move_uploaded_file($_FILES["file"]["tmp_name"], $file_path);

    // Check if the file upload was successful
    if ($file_upload_ok) {
        // Get the file URL
        $file_url = "../img_upload/" . basename($_FILES["file"]["name"]);
    } else {
        // Handle file upload failure
        $file_url = null; // Set file URL to null if upload failed
    }

    // Get the feedback message
    $feedback = $_POST["feedback"];

    // Insert the feedback message and file URL into the database
   
    $sql = "INSERT INTO messages (officer_id, incident_id, message_content, file_url, timestamp, sender_type)
            VALUES (?, ?, ?, ?, NOW(), 'officer')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $officer_id, $incident_id, $feedback, $file_url);
    $stmt->execute();

    // Check if the message was successfully inserted
    if ($stmt->affected_rows > 0) {
        // Feedback message inserted successfully
        header("Location: feedback.php?incident_id=1");
    } else {
        // Failed to insert feedback message
        echo "Failed to submit feedback.";
    }

    // Close the prepared statement
    $stmt->close();
}
?>



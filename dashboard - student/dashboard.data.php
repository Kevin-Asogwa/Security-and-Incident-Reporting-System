<?php
// Include the database connsection file
require_once "../includes/dbh.inc.php";
// Start the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["registration_number"]) ){
    header("location: ../login.php");
    exit;
}
// Get the user id from the session
$registration_number = $_SESSION["registration_number"];

// Get the user details from the database
$sql = "SELECT * FROM students WHERE registration_number = ?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $registration_number);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();





// Close the database connection
$conn->close();
// Default profile picture URL
$default_profile_pic = "../img/bg.jpg";

// Check if $user is not null or empty before accessing its elements
if (!empty($user)) {
    // Get the full name
    $fullname = isset($user["fullname"]) ? $user["fullname"] : "Unknown";
} else {
    // Handle case where user details are not found
    // You can redirect the user, display an error message, etc.
    $fullname = "Unknown";
}
?>
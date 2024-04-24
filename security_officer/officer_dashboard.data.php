<?php
// Include the database connsection file
require_once "../admin/dbh.inc.php";
// Start the session
if(!isset($_SESSION)) {
    session_start();
}
$_SESSION['user_type'] = "officer";
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["officer_id"]) ){
    header("location: ../officer_login.php");
    exit;
}


// Get the user id from the session

$officer_id = $_SESSION["officer_id"];

// Get the user details from the database
$sql = "SELECT * FROM security_officers WHERE officer_id = ?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $officer_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Get the number of incidents reported by the user from the database
$sql = "SELECT COUNT(*) AS count FROM incident";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$incident_reported = $result->fetch_assoc()["count"];



            



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
// Close the database connection

?>

<?php
// Start the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["registration_number"]) ){
    header("location: ../login.php");
    exit;
}

// Include the database connsection file
require_once "../includes/dbh.inc.php";

// Get the user id from the session
$registration_number = $_SESSION["registration_number"];

// Get the user details from the database
$sql = "SELECT * FROM students WHERE registration_number = ?;";
//create a prepared statement
$stmt = mysqli_stmt_init();
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $registration_number);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Get the user profile picture from the database or use a default one
$profile_pic = $user["profile_pic"] ? $user["profile_pic"] : "../img/bg.jpg";

// Get the number of incidents reported by the user from the database
$sql = "SELECT COUNT(*) AS count FROM incidents WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$incidents_reported = $result->fetch_assoc()["count"];

// Get the number of incidents feedback received by the user from the database
$sql = "SELECT COUNT(*) AS count FROM incidents WHERE user_id = ? AND feedback IS NOT NULL";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$incidents_feedback = $result->fetch_assoc()["count"];

// Get the number of pending reports by the user from the database
$sql = "SELECT COUNT(*) AS count FROM incidents WHERE user_id = ? AND status = 'Pending'";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$pending_reports = $result->fetch_assoc()["count"];

// Close the database connection
$mysqli->close();
?>

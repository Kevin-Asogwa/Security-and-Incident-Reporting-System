<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'SECURITY';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

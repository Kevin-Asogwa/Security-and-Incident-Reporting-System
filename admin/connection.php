<?php

$conn = "";

try {
	$host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'SECURITY';

	$conn = new PDO(
		"mysql:host=$host; dbname=SECURITY",
		$user, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>

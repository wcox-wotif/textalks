<?php
/// Local Host
function dbConnect($type) {
	if ($type == 'admin') {
		$user = 'TEX';
		$pwd = 'R8rLdyDB9566J7hX';
	} else {
		exit('Unregognisable connection type');
	}
	// Connection code goes here
	$host='localhost';
	$database='TEX';
	$dsn="mysql:host=$host;dbname=$database";
	try {
		$conn = new PDO($dsn,$user,$pwd);
		return $conn;
	} 
	catch (PDOException $e) {
		echo 'Cannot connect to database';
		exit;
	}
}



 // Live Website
// function dbConnect($type) {
// 	if ($type == 'admin') {
// 		$user = 'qwebdevc_tex';
// 		$pwd = 'lL9FWL424pTH';
// 	} else {
// 		exit('Unregognisable connection type');
// 	}
// 	// Connection code goes here
// 	$host='localhost';
// 	$database='qwebdevc_textalks';
// 	$dsn="mysql:host=$host;dbname=$database";
// 	try {
// 		$conn = new PDO($dsn,$user,$pwd);
// 		return $conn;
// 	} 
// 	catch (PDOException $e) {
// 		echo 'Cannot connect to database';
// 		exit;
// 	}
// }


?>
<?php
	
	header('Content-Type: application/json; charset=utf-8');
	include_once("/website/database/students.php");
	Database::connect('school_db', 'root', '');
	$student = new Student($_GET['id']);
	$student->delete();
	echo json_encode(['status'=>1]);
?>

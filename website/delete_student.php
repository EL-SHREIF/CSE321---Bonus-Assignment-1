<?php
	include_once("database/students.php");
	Database::connect('school_db', 'root', '');
	$student = new Student($_GET['id']);
	$student->delete($_GET['id']);
	header('Location: /website/student_page.php');
?>

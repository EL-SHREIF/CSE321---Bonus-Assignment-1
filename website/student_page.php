<?php
 include "templates/header_student_page.php";
  ?>



<?php
	
	include_once("database/students.php");
	Database::connect('school_db', 'root', '');
?>

<?php include "templates/footer_student_page.php"; ?>

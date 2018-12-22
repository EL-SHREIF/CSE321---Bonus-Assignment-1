<?php
 include "templates/header_grades_page.php"; ?>



<?php
	include_once("database/grades.php");
	Database::connect('school_db', 'root', '');
?>

<?php include "templates/footer_grades_page.php"; ?>
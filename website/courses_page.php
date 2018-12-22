<?php
 include "templates/header_courses_page.php"; ?>



<?php
	include_once("database/courses.php");
	Database::connect('school_db', 'root', '');
?>

<?php include "templates/footer_courses_page.php"; ?>
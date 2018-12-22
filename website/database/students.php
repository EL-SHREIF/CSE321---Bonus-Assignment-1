<?php
	include_once('database.php');
	class Student extends Database{
		function __construct($id) {
            $sql="SELECT * FROM students WHERE id = $id;";
            $statement = Database::$db->prepare($sql);
            $statement->execute();
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
        public static function all($keyword){
            $sql = "SELECT * FROM students WHERE name like ('%$keyword%');";
            $statement = Database::$db->prepare($sql);
            $statement->execute();
            $students = [];
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $students[] = new Student($row['id']);
            }
            return $students;        
        }
        public static function add($key){
            $sql = "INSERT INTO students(name) values('$key');";
            $statement = Database::$db->prepare($sql);
            $statement->execute();
        }
        public function delete($id) {
                $sql = "DELETE FROM students WHERE id = $id;";
                $statement = Database::$db->prepare($sql);
                $statement->execute();
    }
}    
?>
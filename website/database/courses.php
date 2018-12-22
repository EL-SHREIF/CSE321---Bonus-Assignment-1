<?php
	include_once('database.php');
    class course extends Database
    {
        function __construct($id)
        {
            $sql="SELECT * FROM courses  WHERE id=$id;";
            $statement = Database::$db->prepare($sql);
            $statement->execute();
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            $this->id=$data["id"];
            $this->name=$data["name"];
            $this->max_degree=$data["max_degree"];
            $this->study_year=$data["study_year"];
        }
        public static function all($keyword){
            $sql = "SELECT * FROM courses WHERE name like ('%$keyword%');";
            $statement = Database::$db->prepare($sql);
            $statement->execute();
            $courses=[];
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $courses[] = new course($row['id']);
            }
            return $courses;   
        }
        public static function add($key,$max,$year){
            $max = (int)$max;
            $year = (int)$year;
            $sql = "INSERT INTO courses(name,max_degree,study_year) values('$key',$max,$year);";
            $statement = Database::$db->prepare($sql);
            $statement->execute();
        }
    }

?>
<?php
	include_once('database.php');
    class grade extends Database
    {
        function __construct($id)
        {
            $sql="SELECT * FROM grades  WHERE id=$id;";
            $statement = Database::$db->prepare($sql);
            $statement->execute();
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            $this->id=$data["id"];
            $this->student_id=$data["student_id"];
            $this->course_id=$data["course_id"];
            $this->degree=$data["degree"];
            $this->examine_at=$data["examine_at"];            
        }
        function all()
        {
            $sql="SELECT * FROM grades;";
            $statement = Database::$db->prepare($sql);
            $statement->execute();
            $grades=[];
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $grades[] = new grade($row['id']);
            }
            return $grades;   
        }
        public static function add($id_s,$id_c,$deg){
            $id_s = (int)$id_s;
            $deg = (int)$deg;
            $id_c = (int)$id_c;
            $sql = "INSERT INTO grades(student_id,course_id,degree,examine_at) values($id_s,$id_c,$deg,'2018-11-05');";
            $statement = Database::$db->prepare($sql);
            $statement->execute();
        }
    }

?>
<?php 
    class StudentReponsitory {
        function getAll(){
            global $conn;
            $sql = "SELECT * FROM student";
            $result = $conn->query($sql);
            $students = [];
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc()){
                    $student = new Student($row["id"], $row["name"],$row["birthday"],$row["gender"]);
                    $students[] = $student;
                }
            }
            return $students;
        }
    }
?>
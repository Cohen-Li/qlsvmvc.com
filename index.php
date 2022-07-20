<?php 
    // load model
    require "config.php";
    require "connectDB.php";
    require "functions.php";
    class Student {
        public $id;
        public $name;
        public $birthday;
        public $gender;
    
        function __construct($id, $name, $birthday, $gender) {
            $this->id = $id;
            $this->name = $name;
            $this->birthday = $birthday;
            $this->gender = $gender;
        }
    }
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
    
    // router
    $c = $_GET["c"] ?? "student";
    $a = $_GET["a"] ?? "list";
    $controllerName = ucfirst($c). "Controller";    // StudentController
    require "contronller/" . $controllerName . ".php";
    $contronller = new $controllerName(); // new StudentController()
    $contronller->$a(); //contronller->list -> add
?>
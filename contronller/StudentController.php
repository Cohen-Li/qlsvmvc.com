<?php 
    class StudentController{
        function list(){
            $studentReponsitory = new StudentReponsitory();
            $students = $studentReponsitory->getAll();
            require "view/student/list.php";
        }
        function add(){
            require "view/student/add.php";
        }
    }
?>
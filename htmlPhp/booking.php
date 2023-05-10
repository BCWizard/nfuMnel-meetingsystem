<?php
session_start();
$conn=require_once "config.php";
 
$courseId=$_POST["courseId"];
$courseContent=$_POST["courseContent"];
$courseDateStart=$_POST["courseDateStart"];
$courseTimeStart=$_POST["courseTimeStart"];
$courseDateEnd=$_POST["courseDateEnd"];
$courseTimeEnd=$_POST["courseTimeEnd"];
$openCourse = isset($_POST["openCourse"]);

echo "courseId: $courseId <br> 
        courseContent: $courseContent <br>
        courseDateStart: $courseDateStart <br>
        courseTimeStart: $courseTimeStart <br>
        courseDateEnd: $courseDateEnd <br>
        courseTimeEnd: $courseTimeEnd <br>
        openCourse: $openCourse";
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

echo $courseId . $courseContent . $courseDateStart . $courseTimeStart . $courseDateEnd . $courseTimeEnd . $openCourse;
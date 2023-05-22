<?php
session_start();
//未建立session -> 跳至loginpage.php
if(isset($_SESSION["userAccount"]) == 0){
    header("location: ../user/loginpage.php");
    exit;
}
$conn=require_once "../includePHP/config.php";

$courseName=$_POST["courseName"];
$courseContent=$_POST["courseContent"];
$courseDateStart=$_POST["courseDateStart"];
$courseTimeStart=$_POST["courseTimeStart"];
$courseDateEnd=$_POST["courseDateEnd"];
$courseTimeEnd=$_POST["courseTimeEnd"];
$courseMember=$_POST["member"];
$openCourse = isset($_POST["openCourse"]);
                                                        //courseInfo
$sql = "INSERT INTO courseInfo (courseName, courseDateStart, courseDateEnd, courseTimeStart, courseTimeEnd,
        courseContent, openCourse)
        VALUES ('{$courseName}', '{$courseDateStart}', '{$courseDateEnd}', '{$courseTimeStart}', '{$courseTimeEnd}',
        '{$courseContent}', '{$openCourse}')";

if(mysqli_query($conn,$sql)){                           //檢查INSERT INTO courseInfo
                                                        //SearchCourseID
    $sqlSearchCourseID = "SELECT * FROM courseInfo 
        WHERE courseName ='{$courseName}' AND courseDateStart='{$courseDateStart}' AND courseDateEnd='{$courseDateEnd}' AND 
                courseTimeStart='{$courseTimeStart}' AND courseTimeEnd='{$courseTimeEnd}' AND courseContent='{$courseContent}' AND 
                openCourse='{$openCourse}'";
    $result=mysqli_query($conn,$sqlSearchCourseID);     //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);
    $courseId = $data["courseId"];
}
else{                                                   //INSERT INTO courseInfo有誤
    mysqli_close($link);
    function_alert("Insert into courseInfo ERROR!"); 
}

                                                        //courseMaster
$sqlCourseHost = "INSERT INTO courseHost (courseId,courseHostAcc)
        VALUES ('{$courseId}','{$_SESSION["userAccount"]}')";
        
if(mysqli_query($conn,$sqlCourseHost)){               //檢查INSERT INTO courseMaster
                                                                //關閉 config.php->$link連線
    mysqli_close($link);
    function_alert("成功創建!");
}
else{                                                   //INSERT INTO courseMaster有誤
    mysqli_close($link);
    function_alert("Insert into courseHost ERROR!"); 
}
                                                        //跳窗訊息 header:bookingPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='../user/bookingPage.php';
    </script>"; 
    return false;
}
/*
echo "courseName: $courseName <br> 
        courseContent: $courseContent <br>
        courseDateStart: $courseDateStart <br>
        courseTimeStart: $courseTimeStart <br>
        courseDateEnd: $courseDateEnd <br>
        courseTimeEnd: $courseTimeEnd <br>
        openCourse: $openCourse<br>";

foreach ($courseMember as $value) {
    echo $value . "<br>";
}
*/
<?php
session_start();
//未建立session -> 跳至loginpage.php
if(isset($_SESSION["userAccount"]) == 0){
    header("location: ../user/loginpage.php");
    exit;
}
$conn=require_once "../includePHP/config.php";

$userAccount=$_SESSION["userAccount"];
$courseName=$_POST["courseName"];
$courseContent=$_POST["courseContent"];
$courseDateStart=$_POST["courseDateStart"];
$courseTimeStart=$_POST["courseTimeStart"];
$courseDateEnd=$_POST["courseDateEnd"];
$courseTimeEnd=$_POST["courseTimeEnd"];
$courseMember=$_POST["member"];
$openCourse = isset($_POST["openCourse"]);
$courseId;
$countCourseNumber;
                                                        //取得courseID
$sqlSearchCourseID ="SELECT * FROM userInfo WHERE userAccount ='{$userAccount}'";
        $result=mysqli_query($conn,$sqlSearchCourseID);     //connection,query(查詢字串);回傳result
        $data = mysqli_fetch_assoc($result);
        $countCourseNumber=$data["userCourseNumber"];
        $courseId = $userAccount.$data["userCourseNumber"];

                                                        //Insert into courseInfo
$sql = "INSERT INTO courseInfo (courseId, courseName, courseDateStart, courseDateEnd, courseTimeStart, courseTimeEnd,
        courseContent, openCourse)
        VALUES ('{$courseId}', '{$courseName}', '{$courseDateStart}', '{$courseDateEnd}', '{$courseTimeStart}', '{$courseTimeEnd}',
        '{$courseContent}', '{$openCourse}')";

if(mysqli_query($conn,$sql)){                           //檢查INSERT INTO courseInfo
    $countCourseNumber++;
    $sqlInsertCourseId = "UPDATE userInfo SET userCourseNumber = $countCourseNumber where userAccount = $userAccount";
    if(mysqli_query($conn,$sqlInsertCourseId)){         //檢查UPDATE userInfo 將 userCourseNumber+1 存入 userInfo
        
    }else{
        mysqli_close($link);
        //function_alert("Insert into userInfo ERROR!"); 
        function_alert($countCourseNumber); 
    }
}
else{                                                   //INSERT INTO courseInfo有誤
    mysqli_close($link);
    function_alert("Insert into courseInfo ERROR!"); 
}

foreach ($courseMember as $value) {
                                                        //courseMember
    $sqlCourseMember = "INSERT INTO courseMember (courseId,courseMember)
    VALUES ('{$courseId}','{$value}')";

    if(mysqli_query($conn,$sqlCourseMember)){               //檢查INSERT INTO courseMember
    }
    else{                                                   //INSERT INTO courseMember有誤
        mysqli_close($link);
        function_alert("Insert into courseMember ERROR!"); 
    }
}
$sqlCourseMemberHost = "INSERT INTO courseMember (courseId,courseMember)
    VALUES ('{$courseId}','{$userAccount}')";

    if(mysqli_query($conn,$sqlCourseMemberHost)){               //檢查INSERT INTO courseMember(Host)
    }
    else{                                                   //INSERT INTO courseMember(Host)有誤
        mysqli_close($link);
        function_alert("Insert into courseMember(Host) ERROR!"); 
    }
                                                        //courseMaster
$sqlCourseHost = "INSERT INTO courseHost (courseId,courseHostAcc)
        VALUES ('{$courseId}','{$_SESSION["userAccount"]}')";
        
if(mysqli_query($conn,$sqlCourseHost)){                 //檢查INSERT INTO courseMaster
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
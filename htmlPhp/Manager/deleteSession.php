<?php
session_start();

$conn=require_once "../includePHP/config.php";

//未建立session -> 跳至loginpage.php
if(isset($_SESSION["userAccount"]) == 0){
    header("location: ../user/loginpage.php");
    exit;
}
    $courseId = $_GET['courseId'];
//檢查權限
    $sql_searchHost = "SELECT * FROM courseHost WHERE courseId = '{$courseId}'";
    $result_searchHost=mysqli_query($conn,$sql_searchHost);                                   //connection,query(查詢字串);回傳result
    $data_searchHost = mysqli_fetch_assoc($result_searchHost);
                                                                                            //權限符合
    if($data_searchHost && ($_SESSION["userAccount"] === 'root' || $data_searchHost["courseHostAcc"] === $_SESSION["userAccount"])){
        $sql_dalete_courseHost = "DELETE FROM courseHost WHERE courseId = '{$courseId}'";
        if(!mysqli_query($conn,$sql_dalete_courseHost)){
            echo "delete courseHost ERROR!<br>";
        }
        $sql_dalete_courseMember = "DELETE FROM courseMember WHERE courseId = '{$courseId}'";
        if(!mysqli_query($conn,$sql_dalete_courseMember)){
            echo "delete courseMember ERROR!<br>";
        }
        $sql_dalete_courseInfo = "DELETE FROM courseInfo WHERE courseId = '{$courseId}'";
        if(!mysqli_query($conn,$sql_dalete_courseInfo)){
            echo "delete courseInfo ERROR!<br>";
        }
        function_alert("已刪除 $courseId !");
    }
    else
        function_alert("刪除權限不符合!");

                                            //跳窗訊息 header:addUserPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='../user/loginpage.php';
    </script>"; 
    return false;
}
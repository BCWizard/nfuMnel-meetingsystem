<?php
session_start();
//未建立session -> 跳至loginpage.php
if(isset($_SESSION["userAccount"]) == 0){
    header("location: ../loginpage.php");
    exit;
}
//檢查權限
$conn=require_once "../config.php";
    $sql = "SELECT * FROM userLoginInfo WHERE userAccount = '{$_SESSION["userAccount"]}'";          //帳號相同者
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1 && 0==$data["userPermission"]){                          //權限符合
  
}else{                                                                                  //權限不符合
    function_permissionAlert("權限不符合!");
} 
$account=$_POST["account"];
                                            //刪除userInfo
$sql = "DELETE FROM userInfo WHERE userAccount = '{$account}'";

if(mysqli_query($conn,$sql)){               //刪除userLoginInfo
    $sql = "DELETE FROM userLoginInfo WHERE userAccount = '{$account}'";
    if(mysqli_query($conn,$sql)){
        function_alert("成功刪除!");
    }
    else{                                       //刪除userInfo錯誤!
        function_alert("刪除userInfo錯誤!"); 
    }
}
else{                                           //刪除userLoginInfo錯誤!
    function_alert("刪除userLoginInfo錯誤!"); 
}
function function_permissionAlert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='../loginpage.php';
    </script>"; 
    return false;
}
                                            //跳窗訊息 header:addUserPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='deleteUserPage.php';
    </script>"; 
    return false;
}
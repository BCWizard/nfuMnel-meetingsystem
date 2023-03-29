<?php
$conn=require_once "../config.php";
 
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
                                            //跳窗訊息 header:addUserPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='deleteUserPage.php';
    </script>"; 
    return false;
}
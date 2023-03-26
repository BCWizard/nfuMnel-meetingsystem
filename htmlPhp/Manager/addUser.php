<?php
//session_start();
$conn=require_once "../config.php";
 
$account=$_POST["account"];
$password=$_POST["password"];
$premission=$_POST["premission"];
//hash 19.1
$password_hash=password_hash($_POST['password'],PASSWORD_DEFAULT);
$sql = "INSERT INTO userlogininfo (userAccount, userPassword, userPermission) VALUES ('{$account}', '{$password_hash}', '{$premission}')";
if(mysqli_query($conn,$sql)){               //檢查錯誤
    function_alert("成功註冊!");
}
else{                                       //有誤
    function_alert("Something wrong"); 
}

    //關閉 config.php->$link連線
    mysqli_close($link);
                                            //跳窗訊息 header:addUserPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='addUserPage.php';
    </script>"; 
    return false;
}
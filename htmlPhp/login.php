<?php
session_start();
$conn=require_once "config.php";
 
$account=$_POST["account"];
$password=$_POST["password"];
//增加hash可以提高安全性
$password_hash=password_hash($password,PASSWORD_DEFAULT);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM userinformation WHERE userAccount ='".$account."'";                       //帳號相同者
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1 && $password==$data["userPassword"]){                            //密碼相同
        $_SESSION["loggedin"] = true;
        $_SESSION["userId"] = $data["userId"];
        $_SESSION["userName"] = $data["userName"];
        header("location:user.php");
    }else{                                                                                          //帳號或密碼錯誤
            function_alert("帳號或密碼錯誤"); 
    }
}
else{                                                                                               //$_SERVER["REQUEST_METHOD"] != "POST"
    function_alert("Something wrong"); 
}

    //關閉 config.php->$link連線
    mysqli_close($link);

function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='loginpage.php';
    </script>"; 
    return false;
}
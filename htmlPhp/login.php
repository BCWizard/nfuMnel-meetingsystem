<?php
session_start();
$conn=require_once "config.php";
 
$account=$_POST["account"];
$password=$_POST["password"];
//hash 19.1
$password_hash=password_hash($password,PASSWORD_DEFAULT);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM userLoginInfo WHERE userAccount ='".$account."'";                         //帳號相同者
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);
    //if(mysqli_num_rows($result)==1 && $password==$data["userPassword"]){                          //密碼相同
    if(mysqli_num_rows($result)==1 && (password_verify($password,$data["userPassword"]))){          //密碼相同
                                                                                //儲存userAccount
        $_SESSION["userAccount"] = $data["userAccount"];
                                                                                //根據權限導引頁面
        switch($data["userPermission"]){
            case 0:                                                             //admin
                header("location:./Manager/managerUserPage.php");
                break;
            case 1:                                                             //teacher
                header("location:user.php");
                break;
            case 2:                                                             //student
                header("location:user.php");
                break;
        }
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
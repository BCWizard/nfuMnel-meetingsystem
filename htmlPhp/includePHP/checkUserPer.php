<?php
session_start();
    
    $conn=require_once "../includePHP/config.php";
    
//未建立session -> 跳至loginpage.php
if(isset($_SESSION["userAccount"]) == 0){
    header("location: ../user/loginpage.php");
    exit;
}

                                                                                                    //檢查權限
    $sql = "SELECT * FROM userLoginInfo WHERE userAccount = '{$_SESSION["userAccount"]}'";          //帳號相同者
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1 && (1==$data["userPermission"] || 2==$data["userPermission"])){      //權限符合

}else{                                                                                              //權限不符合
  function_permissionAlert("權限不符合!");
}

function function_permissionAlert($message) { 
  // Display the alert box  
  echo "<script>alert('$message');
   window.location.href='../user/loginpage.php';
  </script>"; 
  return false;
}
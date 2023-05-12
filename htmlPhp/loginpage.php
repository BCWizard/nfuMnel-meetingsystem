<?php
session_start();
$conn=require_once "config.php";
                                                                              //已建立cookie
if(isset($_COOKIE["cookieUserAccount"])){
  $password=$_COOKIE["cookieUserPassword"];
  $sql = "SELECT * FROM userLoginInfo WHERE userAccount ='{$_COOKIE["cookieUserAccount"]}'";      //帳號相同者
  $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
  $data = mysqli_fetch_assoc($result);
  //if(mysqli_num_rows($result)==1 && $password==$data["userPassword"]){                          //密碼相同
  if(mysqli_num_rows($result)==1 && (password_verify($password,$data["userPassword"]))){          //密碼相同
                                                                              //儲存userAccount
      $_SESSION["userAccount"] = $data["userAccount"];
                                                                              //setCookie
      if($setRememberLoginInfo == 1){
          setcookie("cookieUserAccount",$account,time()+60*60*24*7);
          setcookie("cookieUserPassword",$password,time()+60*60*24*7);
      }
                                                                              //根據權限導引頁面
      switch($data["userPermission"]){
          case 0:                                                             //admin
              header("location:./Manager/managerUserPage.php");
              break;
          case 1:                                                             //teacher
              header("location:userPage.php");
              break;
          case 2:                                                             //student
              header("location:userPage.php");
              break;
      }
  }else{                                                                      //密碼已修改
      setcookie("cookieUserAccount","",time());
      setcookie("cookieUserPassword","",time());
      function_alert("密碼已修改!"); 
  }
}
                                                                              //已建立session -> 跳至user.php
if(isset($_SESSION["userAccount"])){
    //檢查權限
    $sql = "SELECT * FROM userLoginInfo WHERE userAccount = '{$_SESSION["userAccount"]}'";          //帳號相同者
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);

    switch($data["userPermission"]){
      case 0:                                                             //admin
          header("location:./Manager/managerUserPage.php");
          break;
      case 1:                                                             //teacher
          header("location:userPage.php");
          break;
      case 2:                                                             //student
          header("location:userPage.php");
          break;
      default:                                                            //尚未定義權限
          function_alert("Who are you???");
          break;
  }
}

function function_alert($message) { 
  // Display the alert box  
  echo "<script>alert('$message');
  window.location.href='loginpage.php';
  </script>"; 
  return false;
  }
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會議系統登入頁面</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="webCSS/loginPageStyle.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>

    <div class="container">
      <div class="row">
        <img src="webImage/meeting-title.jpg" alt = "具智慧化行為分析的會議系統title" height=250>
        <!-- https://pixabay.com/ -->
      </div>
    </div>

    <div class="container">                                                               <!--max 1170px-->
        <div class="row">
          <div class="col-md-4">                                                          <!--992~1200px -> 使用4欄位-->    
          </div>
          <div class="col-md-4">
            <form method="post" action="login.php" id="loginForm">
                <div class="mb-3">
                  <label for="Account" class="form-label">帳號</label>
                  <input type="account" class="form-control" name = "account" id="account" placeholder="帳號 / Account">
                </div>
                <div class="mb-3">
                  <label for="Password" class="form-label">密碼</label>
                  <input type="password" class="form-control" name = "password" id="password" placeholder="密碼 / Password">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" name = "setRememberLoginInfo" class="form-check-input" id="check">
                  <label class="form-check-label" for="check">保持登入</label>
                </div>
                <div id="loginbtn">
                  <button type="submit" class="btn btn-primary">登入 / Login</button>
                </div>
            </form>
          </div>
          <div class="col-md-4"> 
          </div>
        </div>
    </div>
    
    <?php include("./includePHP/tail.php"); ?>
    
</body>
</html>
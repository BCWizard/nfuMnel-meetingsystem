<?php
session_start();
 
//已建立session -> 跳至user.php
if(isset($_SESSION["userAccount"])){
    //檢查權限
    $conn=require_once "config.php";
    $sql = "SELECT * FROM userLoginInfo WHERE userAccount = '{$_SESSION["userAccount"]}'";          //帳號相同者
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);

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
      default:                                                            //尚未定義權限
          function_alert("Who are you???");
          break;
  }

    function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
    window.location.href='loginpage.php';
    </script>"; 
    return false;
    }
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
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <div class="container">                                                               <!--max 1170px-->
        <div class="row">
          <div class="col-md-4">                                                          <!--992~1200px -> 使用4欄位-->    
          </div>
          <div class="col-md-4">
            <form method="post" action="login.php">
                <div class="mb-3">
                  <label for="Account" class="form-label">帳號</label>
                  <input type="account" class="form-control" name = "account" id="account" placeholder="帳號 / Account">
                </div>
                <div class="mb-3">
                  <label for="Password" class="form-label">密碼</label>
                  <input type="password" class="form-control" name = "password" id="password" placeholder="密碼 / Password">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="check">
                  <label class="form-check-label" for="check">記住帳密</label>
                </div>
                <button type="submit" class="btn btn-primary">登入 / Login</button>
            </form>
          </div>
          <div class="col-md-4">      
          </div>
        </div>
      </div>
</body>
</html>
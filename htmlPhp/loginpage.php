<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: user.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>具智慧化行為分析的會議系統首頁</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <div class="container">
        <div class="row">
          <div class="col-4">     
          </div>
          <div class="col-4">
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
          <!-- <div class="col-4">      
          </div> -->
        </div>
      </div>
</body>
</html>
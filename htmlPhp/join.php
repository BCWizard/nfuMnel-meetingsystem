<?php
session_start();
if(isset($_SESSION["loggedin"]) == 0){
    header("location: loginpage.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>加入會議</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <div class="container">
        <div class="row">
          <div class="col-2">
            <nav class="navbar justify-content-center navbar-light bg-light">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="./user.php">回使用者主頁</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="./booking.php">預定會議</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="./join.php">加入會議</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./logout.php">登出</a>
                  </li>
              </ul>
            </nav>
          </div>
          <div class="col-8">
            <h1>加入會議</h1>
            <input type="text" name="加入會議"
                           placeholder="請輸入會議代碼/連結">
            <button class="btn btn-sm btn-primary btn-block btn-login input-height font16"
                    type="button" name="加入會議" onclick="location.href=''">
                點我加入!
            </button>
          </div>
          <!-- <div class="col-2">
            <nav>
                <h1>會議</h1>
                <a href="./booking.html">預定會議</a><br>
                <a href="./join.html">加入會議</a>
            </nav>   
          </div> -->
        </div>
      </div>
</body>
</html>
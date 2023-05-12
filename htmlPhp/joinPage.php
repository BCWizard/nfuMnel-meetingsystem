<?php
session_start();
//未建立session -> 跳至loginpage.php
if(isset($_SESSION["userAccount"]) == 0){
    header("location: loginpage.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
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
          <div class="col-md-2">
              <?php include ("./includePHP/userNav.php"); ?>
          </div>
          <div class="col-md-8">
            <h1>加入會議</h1>
            <input type="text" name="加入會議"
                           placeholder="請輸入會議代碼/連結">
            <button class="btn btn-sm btn-primary btn-block btn-login input-height font16"
                    type="button" name="加入會議" onclick="location.href=''">
                點我加入!
            </button>
          </div>
          <div class="col-md-2">
            <?php include ("./includePHP/userImage.php"); ?>
          </div>
        </div>
      </div>
</body>
</html>
<?php
  include "../includePHP/checkAdminPer.php";
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>刪除使用者</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../webCSS/userPageStyle.css">
</head>
<body>
    <script src="../js/bootstrap.min.js"></script>

    <div class="container" id="mainContainer">
      <div class="container">
        <?php include("../includePHP/mainNav.php");?>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <?php include ("../includePHP/userImage.php"); ?>
            <?php include ("../includePHP/adminNav.php"); ?>
          </div>

          <div class="col-md-10">
            <h1>刪除使用者</h1>
            <form method="post" action="deleteUser.php">
                <div class="mb-3">
                  <label for="Account" class="form-label">帳號</label>
                  <input type="account" class="form-control" name = "account" id="account" placeholder="帳號 / Account">
                </div>
                <button type="submit" class="btn btn-danger">刪除</button>
            </form>
          </div>
        </div>
      </div>
      <?php include("../includePHP/tail.php"); ?>
    </div>
</body>
</html>
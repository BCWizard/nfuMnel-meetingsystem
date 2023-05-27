<?php
  include "../includePHP/checkUserPer.php";
?>
<!DOCTYPE html>                                                                           <!--HTML 5 文件格式宣告-->
<html lang="zh-Hant-TW">                                                                  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>歷史會議</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../webCSS/userPageStyle.css">
</head>
<body>
    <script src="../js/bootstrap.min.js"></script>
    <div class ="container" id="mainContainer">
      <div class="container">
        <?php include("../includePHP/mainNav.php");?>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <?php include ("../includePHP/userImage.php"); ?>
            <?php include ("../includePHP/userNav.php"); ?>
          </div>
          <div class="col-md-10">
            <h1>  
              <p id="listHeader">歷史會議</p>
            </h1>
            <table class="table table-success table-striped align-middle">
              <thead>
                <tr>
                  <th scope="col">會議名稱</th>
                  <th scope="col">開始日期</th>
                  <th scope="col">開始時間</th>
                  <th scope="col">結束日期</th>
                  <th scope="col">結束時間</th>
                  <th scope="col">主辦人</th>
                  <th scope="col">播放記錄檔</th>
                </tr>
              </thead>
              <tbody>
                <?php include("../includePHP/userHisMeet.php");?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php include("../includePHP/tail.php"); ?>
    </div>
</body>
</html>
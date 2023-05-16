<?php
session_start();
//未建立session -> 跳至loginpage.php
if(isset($_SESSION["userAccount"]) == 0){
    header("location: loginpage.php");
    exit;
}
?>
<!DOCTYPE html>                                                                           <!--HTML 5 文件格式宣告-->
<html lang="zh-Hant-TW">                                                                  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>使用者主頁</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="webCSS/userPageStyle.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <div class ="container" id="mainContainer">
      <div class="container">
        <?php include("./includePHP/mainNav.php");?>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <?php include ("./includePHP/userImage.php"); ?>
            <?php include ("./includePHP/userNav.php"); ?>
          </div>
          <div class="col-md-10">
            <h1>  
              <p id="listHeader">過往會議</p>
            </h1>
            <table class="table table-success table-striped align-middle">
              <thead>
                <tr>
                  <th scope="col">會議名稱</th>
                  <th scope="col">開始日期</th>
                  <th scope="col">主辦單位</th>
                  <th scope="col">主辦人</th>
                  <th scope="col">播放記錄檔</th>
                </tr>
              </thead>
              <tbody>
                <tr data-bs-toggle="collapse" data-bs-target="#r1">
                  <td>中文(一)</td>
                  <td>2022/12/12</td>
                  <td>通識教育中心</td>
                  <td>莊怡文</td>
                  <td><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                </tr>
                <tr class="collapse accordion-collapse" id="r1" data-bs-parent=".table">
                  <td colspan="5"> 
                    Item 1 detail .. This is the first item's accordion body.                   
                  </td>
                </tr>
                <tr data-bs-toggle="collapse" data-bs-target="#r2">
                  <td>英文(一)</td>
                  <td>2022/12/13</td>
                  <td>語言教學中心</td>
                  <td>張敏慧</td>                 
                  <td><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                </tr>
                <tr class="collapse accordion-collapse" id="r2" data-bs-parent=".table">
                  <td colspan="5">
                      Item 2 detail .. This is the first item's accordion body.
                  </td>
                </tr>
                <tr>
                  <td>通識1</td>
                  <td>2022/12/14</td>
                  <td>通識教育中心</td>
                  <td>方俊源</td>
                  <td><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                </tr>
                <tr>
                  <td>安全程式設計</td>
                  <td>2022/12/15</td>
                  <td>多媒體網路實驗室</td>
                  <td>林易泉</td>
                  <td><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                </tr>
                <tr>
                  <td>3D列印切片應用</td>
                  <td>2022/12/16</td>
                  <td>中部創新自造教育基地</td>
                  <td>DreamMaker</td>
                  <td><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                </tr>
              </tbody>
            </table>
            <h1>  
              <p id="listHeader">已排定會議</p>
            </h1>
            <table class="table table-primary table-striped accordion align-middle">
              <thead>
                <tr>
                  <th scope="col">會議名稱</th>
                  <th scope="col">開始日期</th>
                  <th scope="col">主辦單位</th>
                  <th scope="col">主辦人</th>
                  <th scope="col">參加會議</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>中文(一)</td>
                  <td>2022/12/26</td>
                  <td>通識教育中心</td>
                  <td>莊怡文</td>
                  <td><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                </tr>
                <tr>
                  <td>英文(一)</td>
                  <td>2022/12/27</td>
                  <td>語言教學中心</td>
                  <td>張敏慧</td>
                  <td><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                </tr>
                <tr>
                    <td>通識1</td>
                    <td>2022/12/28</td>
                    <td>通識教育中心</td>
                    <td>方俊源</td>
                    <td><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                  </tr>
                  <tr>
                    <td>安全程式設計</td>
                    <td>2022/12/29</td>
                    <td>多媒體網路實驗室</td>
                    <td>林易泉</td>
                    <td><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                  </tr>
                  <tr>
                    <td>3D列印切片應用</td>
                    <td>2022/12/30</td>
                    <td>中部創新自造教育基地</td>
                    <td>DreamMaker</td>
                    <td><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php include("./includePHP/tail.php"); ?>
    </div>
</body>
</html>
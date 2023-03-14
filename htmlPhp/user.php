<?php
session_start();
if(isset($_SESSION["loggedin"]) == 0){
    header("location: loginpage.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
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
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <div class="container">
        <div class="row">
          <div class="col-md-2">
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
          <div class="col-md-8">
            <h1>歷史會議列表</h1>
            <table class="table table-success table-striped">
              <thead>
                <tr>
                  <th scope="col">會議名稱</th>
                  <th scope="col">日期</th>
                  <th scope="col">主辦單位</th>
                  <th scope="col">主辦人</th>
                  <th scope="col">播放記錄檔</th>
                </tr>
              </thead>
              <tbody>
                <tr data-bs-toggle="collapse" data-bs-target="#r1" class="table-primary">
                  <td>中文(一)</td>
                  <td>2022/12/12</td>
                  <td>通識教育中心</td>
                  <td>莊怡文</td>
                  <td align="center"><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                </tr>
                <tr class="collapse accordion-collapse" id="r1" data-bs-parent=".table">
                  <td colspan="5"> Item 1 detail .. This is the first item's accordion body. It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the .accordion-body, though the transition does limit overflow. </td>
                </tr>
                <tr class="table-secondary">
                  <td>英文(一)</td>
                  <td>2022/12/13</td>
                  <td>語言教學中心</td>
                  <td>張敏慧</td>                 
                  <td align="center"><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                </tr>
                <tr class="table-success">
                    <td>通識1</td>
                    <td>2022/12/14</td>
                    <td>通識教育中心</td>
                    <td>方俊源</td>
                    <td align="center"><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                  </tr>
                  <tr class="table-danger">
                    <td>安全程式設計</td>
                    <td>2022/12/15</td>
                    <td>多媒體網路實驗室</td>
                    <td>林易泉</td>
                    <td align="center"><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                  </tr>
                  <tr class="table-warning">
                    <td>3D列印切片應用</td>
                    <td>2022/12/16</td>
                    <td>中部創新自造教育基地</td>
                    <td>DreamMaker</td>
                    <td align="center"><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
                  </tr>
              </tbody>
            </table>
            <h1>已排定會議列表</h1>
            <table class="table table-success table-striped accordion">
              <thead>
                <tr>
                  <th scope="col">會議名稱</th>
                  <th scope="col">日期</th>
                  <th scope="col">主辦單位</th>
                  <th scope="col">主辦人</th>
                  <th scope="col">參加會議</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-primary">
                  <td>中文(一)</td>
                  <td>2022/12/26</td>
                  <td>通識教育中心</td>
                  <td>莊怡文</td>
                  <td align="center"><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                </tr>
                <tr class="table-secondary">
                  <td>英文(一)</td>
                  <td>2022/12/27</td>
                  <td>語言教學中心</td>
                  <td>張敏慧</td>
                  <td align="center"><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                </tr>
                <tr class="table-success">
                    <td>通識1</td>
                    <td>2022/12/28</td>
                    <td>通識教育中心</td>
                    <td>方俊源</td>
                    <td align="center"><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                  </tr>
                  <tr class="table-danger">
                    <td>安全程式設計</td>
                    <td>2022/12/29</td>
                    <td>多媒體網路實驗室</td>
                    <td>林易泉</td>
                    <td align="center"><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                  </tr>
                  <tr class="table-warning">
                    <td>3D列印切片應用</td>
                    <td>2022/12/30</td>
                    <td>中部創新自造教育基地</td>
                    <td>DreamMaker</td>
                    <td align="center"><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
                  </tr>
              </tbody>
            </table>
          </div>
          <div class="col-2">
          </div>
        </div>
      </div>
</body>
</html>
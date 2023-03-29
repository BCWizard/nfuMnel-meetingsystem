<?php
session_start();
//未建立session -> 跳至loginpage.php
if(isset($_SESSION["userAccount"]) == 0){
  header("location: ../loginpage.php");
  exit;
}
//檢查權限
$conn=require_once "../config.php";
    $sql = "SELECT * FROM userLoginInfo WHERE userAccount = '{$_SESSION["userAccount"]}'";          //帳號相同者
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1 && 0==$data["userPermission"]){                          //權限符合

}else{                                                                                  //權限不符合
  function_alert("權限不符合!");
}

function function_alert($message) { 
  // Display the alert box  
  echo "<script>alert('$message');
   window.location.href='../loginpage.php';
  </script>"; 
  return false;
}
?>
<!DOCTYPE html>                                                                           <!--HTML 5 文件格式宣告-->
<html lang="zh-Hant-TW">                                                                  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理員頁面</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
    <script src="../js/bootstrap.min.js"></script>
    <div class="container">
        <div class="row">
          <div class="col-md-2">
            <nav class="navbar justify-content-center navbar-light bg-light">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="./managerUserPage.php">管理員頁面</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./addUserPage.php">新增使用者</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./deleteUserPage.php">刪除使用者</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../logout.php">登出</a>
                  </li>
              </ul>
            </nav>
          </div>

          <div class="col-md-8">
          </div>

          <div class="col-2">
            <img src="
            <?php
              //$conn=require_once "../config.php";
              $sql = "SELECT * FROM userInfo WHERE userAccount ='{$_SESSION["userAccount"]}'";
              $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
              $data = mysqli_fetch_assoc($result);
                                                //userInfo資料表裡是否有使用者圖片
              if(!is_null($data["userImage"])){
                $userImagePath = "./userImage/{$_SESSION['userAccount']}.jpg";
                echo $userImagePath;
              }else{                            //沒有則使用預設圖片
                $userImagePath = "./userImage/default.jpg";
                echo $userImagePath;
              }
            ?>
            " class="img-fluid" alt="使用者圖片">
            <?php
              echo "Hi, {$_SESSION['userAccount']}";
            ?>
          </div>
        </div>
      </div>
</body>
</html>
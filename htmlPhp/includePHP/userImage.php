<img src="
  <?php
    $conn=require_once "config.php";
    $sql = "SELECT * FROM userInfo WHERE userAccount ='{$_SESSION["userAccount"]}'";
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);
                                      //userInfo資料表裡是否有使用者圖片
    if(!is_null($data["userImage"])){
      $userImagePath = "./Manager/userImage/{$_SESSION['userAccount']}.jpg";
      echo $userImagePath;
    }else{                            //沒有則使用預設圖片
      $userImagePath = "./Manager/userImage/default.jpg";
      echo $userImagePath;
    }
  ?>
  " class="img-fluid" alt="使用者圖片">
  <?php
    echo "<p align=\"center\">Hi, {$_SESSION['userAccount']}</p>";
  ?>
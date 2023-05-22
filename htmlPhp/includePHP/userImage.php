<img src="
  <?php
    $sql = "SELECT * FROM userInfo WHERE userAccount ='{$_SESSION["userAccount"]}'";
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);
                                      //userInfo資料表裡是否有使用者圖片
    if($data["userImage"]==1){
      $userImagePath = "../userImage/{$_SESSION['userAccount']}.jpg";
      echo $userImagePath;
    }else{                            //沒有則使用預設圖片
      $userImagePath = "../userImage/default.jpg";
      echo $userImagePath;
    }
  ?>
  " class="img-fluid" alt="使用者圖片" style="display:block; margin:auto;">
  <?php
    echo "<p align=\"center\">Hi, {$_SESSION['userAccount']}</p>";
  ?>
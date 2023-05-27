<?php
  include "../includePHP/checkUserPer.php";
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>發起會議</title>
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
            <?php include ("../includePHP/userNav.php"); ?>
          </div>

          <div class="col-md-10">
            <h1>
              <p id="listHeader">發起會議</p>
            </h1>
            <form method="post" action="../user/booking.php" id="bookingForm">
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">會議名稱:</span>
                <input name="courseName" type="text" class="form-control" aria-label="Sizing example input" 
                        aria-describedby="inputGroup-sizing-default" placeholder="請輸入會議名稱" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">會議描述:</span>
                <textarea name="courseContent" class="form-control" aria-label="With textarea"
                          aria-describedby="inputGroup-sizing-default"placeholder="請輸入會議描述"></textarea>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">開始日期:</span>
                <input name="courseDateStart" type="date" class="form-control" aria-label="Sizing example input" 
                        aria-describedby="inputGroup-sizing-default" placeholder="請輸入會議日期" required>
                <span class="input-group-text">開始時間:</span>
                <input name="courseTimeStart" type="time" class="form-control" aria-label="Sizing example input" 
                        aria-describedby="inputGroup-sizing-default" placeholder="請輸入會議時間" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">結束日期:</span>
                <input name="courseDateEnd" type="date" class="form-control" aria-label="Sizing example input" 
                        aria-describedby="inputGroup-sizing-default" placeholder="請輸入會議日期" required>
                <span class="input-group-text">結束時間:</span>
                <input name="courseTimeEnd" type="time" class="form-control" aria-label="Sizing example input" 
                        aria-describedby="inputGroup-sizing-default" placeholder="請輸入會議時間" required>
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">上傳會議檔案:</label>
                <input type="file" class="form-control" id="inputGroupFile01">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">載入參與名單:<br>(按住Ctrl多選)</span>
                <select name="member[]" class="form-select" size="10" multiple aria-label="multiple select example">
                  <optgroup label="資工系">
                    <optgroup label="資工三甲">
                      <option value="3AG1">資工三甲第一組</option>
                      <option value="3AG2">資工三甲第二組</option>
                    </optgroup>
                    <optgroup label="資工三乙">
                      <option value="3BG1">資工三乙第一組</option>
                      <option value="3BG2">資工三乙第二組</option>
                    </optgroup>
                  </optgroup>
                </select>
              </div>

              <div class="input-group mb-3 justify-content-center">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="check">
                  <label class="form-check-label" for="check">開放給全體使用者加入會議</label>
                </div>              
              </div>

              <div class="input-group mb-3 justify-content-center">
                <div id="createBtn" class="mb-3">
                  <button class="btn btn-sm btn-primary btn-block btn-login input-height font16"
                    type="submit">
                    點我創建!
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php include("../includePHP/tail.php"); ?>
    </div>
</body>
</html>
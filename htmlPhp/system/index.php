<!DOCTYPE html>                                                                           <!--HTML 5 文件格式宣告-->
<html lang="zh-Hant-TW">                                                                  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>智會-SmartMeet</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
    <script src="../js/bootstrap.min.js"></script>
    <?php include("../includePHP/mainNav.php");?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-4">
                        <img src="../webImage/SmartMeet.png" class="rounded float-mid w-100" alt="SmartMeet.png">                
                    </div>
                    <div class="col text-center">
                        <h1>具智慧化行為分析的會議系統</h1>
                        <h2>智會-SmartMeet</h2>
                        <h6>利用 T. Soukupova 及 J. Cech 於 2016 所發表的 "Real-Time Eye Blink Detection using Facial Landmarks" 閉眼偵測技術，產生學習報告，協助您分析學習專注度。</h6>
                        <p>
                            點擊下方的「開始使用」即代表您同意我們的
                            <a href="./eula.php">
                                使用者條約
                            </a>
                        </p>
                        <a class="btn btn-outline-primary" role="botton"
                                href="../user/loginPage.php">開始使用</a>                    
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center">功能介紹</h2>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="card h-100">
                    <h5 class="card-header text-center">
                        發起會議
                    </h5>
                    <img src="../webImage/indexBookingFunc.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">發起會議</h5>
                        <p class="card-text text-left">
                            發起者可利用「發起會議」頁面進行以下設定：
                            <lo>
                                <li>會議名稱</li>
                                <li>會議資訊</li>
                                <li>會議開始及結束時間</li>
                                <li>會議檔案</li>
                                <li>會議參與人員。</li>
                            </lo>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <h5 class="card-header text-center">
                        信件通知
                    </h5>
                    <img src="../webImage/indexMailFunc.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">信件通知</h5>
                        <p class="card-text">在發起者設定好會議設定後，系統使用寄送電子信件功能通知與會人員。</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                <h5 class="card-header text-center">
                    會議室
                </h5>
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">會議室</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                <h5 class="card-header text-center">
                    會議回放
                </h5>
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">會議回放</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
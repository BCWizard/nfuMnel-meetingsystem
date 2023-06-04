<?php
session_start();
//未建立session -> 跳至loginpage.php
if(isset($_SESSION["userAccount"]) == 0){
    header("location: ../user/loginpage.php");
    exit;
}
$conn=require_once "../includePHP/config.php";

$userAccount=$_SESSION["userAccount"];
$courseName=$_POST["courseName"];
$courseContent=$_POST["courseContent"];
$courseDateStart=$_POST["courseDateStart"];
$courseTimeStart=$_POST["courseTimeStart"];
$courseDateEnd=$_POST["courseDateEnd"];
$courseTimeEnd=$_POST["courseTimeEnd"];
$courseMember=$_POST["member"];
$openCourse = isset($_POST["openCourse"]);
$courseId;
$countCourseNumber;
                                                        //mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions


                                                        //取得courseID
$sqlSearchCourseID ="SELECT * FROM userInfo WHERE userAccount ='{$userAccount}'";
        $result=mysqli_query($conn,$sqlSearchCourseID);     //connection,query(查詢字串);回傳result
        $data = mysqli_fetch_assoc($result);
        $countCourseNumber=$data["userCourseNumber"];
        $courseId = $userAccount.$data["userCourseNumber"];
                                                                                                                    //檢查檔案
if(function_saveFile($courseId)){
    $sql = "INSERT INTO courseInfo (courseId, courseName, courseDateStart, courseDateEnd, courseTimeStart, courseTimeEnd,
        courseContent, openCourse, fileExist)
        VALUES ('{$courseId}', '{$courseName}', '{$courseDateStart}', '{$courseDateEnd}', '{$courseTimeStart}', '{$courseTimeEnd}',
        '{$courseContent}', '{$openCourse}', 1)";
    $mail->addAttachment("../sessionFile/{$courseId}.pdf");         // Add attachments
}else{                                      //無檔案
    $sql = "INSERT INTO courseInfo (courseId, courseName, courseDateStart, courseDateEnd, courseTimeStart, courseTimeEnd,
        courseContent, openCourse, fileExist)
        VALUES ('{$courseId}', '{$courseName}', '{$courseDateStart}', '{$courseDateEnd}', '{$courseTimeStart}', '{$courseTimeEnd}',
        '{$courseContent}', '{$openCourse}', 0)";
}

// 建立新資料夾路徑
$folderPath = "../files/{$courseId}/time/";

// 建立新資料夾
if (!file_exists($folderPath)) {
    mkdir($folderPath, 0777, true);
}
// 儲存起始日期和時間到 time.txt
$data = "{$courseDateStart} {$courseTimeStart}";
$filePath = "{$folderPath}time.txt";
file_put_contents($filePath, $data);

if(mysqli_query($conn,$sql)){                           //檢查INSERT INTO courseInfo
    $countCourseNumber++;
    $sqlInsertCourseId = "UPDATE userInfo SET userCourseNumber = $countCourseNumber where userAccount = $userAccount";
    if(mysqli_query($conn,$sqlInsertCourseId)){         //檢查UPDATE userInfo 將 userCourseNumber+1 存入 userInfo
        
    }else{
        mysqli_close($link);
        function_alert("Update userInfo userCourseNumber ERROR!");
    }
}
else{                                                   //INSERT INTO courseInfo有誤
    mysqli_close($link);
    function_alert("Insert into courseInfo ERROR!"); 
}

foreach ($courseMember as $value) {   
    $sqlMail = "SELECT *
                    FROM userInfo
                    WHERE userInfo.userClass = '$value'";
    $mailResult=mysqli_query($conn,$sqlMail);
    while ($mailData = mysqli_fetch_assoc($mailResult)){
                                                                    //courseMember
        $sqlCourseMember = "INSERT INTO courseMember (courseId,courseMember)
                                VALUES ('{$courseId}','{$mailData['userAccount']}')";
        if(mysqli_query($conn,$sqlCourseMember)){               //檢查INSERT INTO courseMember
        }
        else{                                                   //INSERT INTO courseMember有誤
            mysqli_close($link);
            function_alert("Insert into courseMember ERROR!"); 
        }

        $mail->addBCC("{$mailData['userEmail']}");
/*
        ini_set('SMTP','msa.hinet.net');
        ini_set('smtp_port',25);
        $to ="{$mailData['userEmail']}";                                            //收件者
        $subject = "邀請您參與 $userAccount 所舉辦的 $courseName !";                //信件標題
                                                                                    //信件內容
        $msg = "邀請您參與 {$userAccount} 所舉辦的 {$courseName} !\n舉辦時間為： {$courseDateStart} {$courseTimeStart} 到 {$courseDateEnd} {$courseTimeEnd}\n詳細資訊： {$courseContent}";
        $headers = "From:not-replyMNELMeetingsystem@nfu.edu.tw";                    //寄件者
        
        if(!mail("$to", "$subject", "$msg", "$headers"))
            echo "寄送信件失敗";
*/
    }
}
/*
$sqlCourseMemberHost = "INSERT INTO courseMember (courseId,courseMember)
                            VALUES ('{$courseId}','{$userAccount}')";

    if(mysqli_query($conn,$sqlCourseMemberHost)){               //檢查INSERT INTO courseMember(Host)
    }
    else{                                                   //INSERT INTO courseMember(Host)有誤
        mysqli_close($link);
        function_alert("Insert into courseMember(Host) ERROR!"); 
    }
*/
                                                        //courseMaster
$sqlCourseHost = "INSERT INTO courseHost (courseId,courseHostAcc)
        VALUES ('{$courseId}','{$_SESSION["userAccount"]}')";
        
if(mysqli_query($conn,$sqlCourseHost)){                 //檢查INSERT INTO courseMaster
                                                                //關閉 config.php->$link連線
    mysqli_close($link);
    function_alert("成功創建!");
}
else{                                                   //INSERT INTO courseMaster有誤
    mysqli_close($link);
    function_alert("Insert into courseHost ERROR!"); 
}

function function_saveFile($fileName){
    if(!isset($_FILES['sessionFile']['tmp_name'])){       //沒有輸入檔案
        return false;
    }
    elseif(empty($fileName)){                     //沒有帳號提供檔名
        die("產生圖片->需要會議代碼");
        return false;
    }
                                                        //尚未建立sessionFile資料夾
    if(!is_dir("../sessionFile")){
        mkdir("sessionFile");                             //建立sessionFile資料夾
        
        //if(!mkdir('userImage', 0777))die("無法建立userImage資料夾!");
    }  
    
                                                        //將sessionFile以$fileName的檔名存入sessionFile資料夾
    if(move_uploaded_file($_FILES['sessionFile']['tmp_name'], "../sessionFile/{$fileName}.pdf")){
        return true;
    }
    return false;
}

                                                        //跳窗訊息 header:bookingPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
        window.location.href='../user/bookingPage.php';
    </script>"; 
    return false;
}

try {
    //Server settings
    $mail->CharSet = 'UTF-8';

    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                           // Specify main and backup SMTP servers
    
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'mnelsmartmeet@gmail.com';          // SMTP username
    $mail->Password = '';                 // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mnelsmartmeet@gmail.com');
    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    //$mail->addAddress('');                                // Name is optional

    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');


    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "邀請您參與 {$userAccount} 所舉辦的 {$courseName} !";                //信件標題
    $mail->Body    = "邀請您參與 {$userAccount} 所舉辦的 {$courseName} !<br>
                        舉辦時間為： {$courseDateStart} {$courseTimeStart} 到 {$courseDateEnd} {$courseTimeEnd}<br>
                        詳細資訊： {$courseContent}";
    $mail->AltBody = "邀請您參與 {$userAccount} 所舉辦的 {$courseName} !\n舉辦時間為： {$courseDateStart} {$courseTimeStart} 到 {$courseDateEnd} {$courseTimeEnd}\n詳細資訊： {$courseContent}";
    // $mail->Subject = 'testMailFunction';
    // $mail->Body    = 'This is a mail for test mail function <b>HTML.ver</b>';
    // $mail->AltBody = 'This is a mail for test mail function <b>non-HTML.ver</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

/*
echo "courseName: $courseName <br> 
        courseContent: $courseContent <br>
        courseDateStart: $courseDateStart <br>
        courseTimeStart: $courseTimeStart <br>
        courseDateEnd: $courseDateEnd <br>
        courseTimeEnd: $courseTimeEnd <br>
        openCourse: $openCourse<br>";

foreach ($courseMember as $value) {
    echo $value . "<br>";
}
*/
<?php
$conn=require_once "../config.php";
 
$account=$_POST["account"];
$password=$_POST["password"];
$premission=$_POST["premission"];
$name=$_POST["userName"];
$mail=$_POST["userEmail"];
$userClass=$_POST["userClass"];
$userImagePath;
//hash 19.1
$password_hash=password_hash($_POST['password'],PASSWORD_DEFAULT);


$sql = "INSERT INTO userlogininfo (userAccount, userPassword, userPermission) VALUES ('{$account}', '{$password_hash}', '{$premission}')";
if(mysqli_query($conn,$sql)){               //檢查錯誤
    
}
else{                                       //有誤
    function_alert("帳號密碼錯誤!"); 
}
                                            //有使用者圖片
if(function_saveUserImage($account)){
    $userImagePath="userImage/{$account}.jpg";
    $sql = "INSERT INTO userinfo (userAccount, userName, userEmail, userClass, userImage) 
                        VALUES ('{$account}', '{$name}', '{$mail}', '{$userClass}', '{$userImagePath}')";
}else{                                      //無使用者圖片
    $sql = "INSERT INTO userinfo (userAccount, userName, userEmail, userClass, userImage) 
                        VALUES ('{$account}', '{$name}', '{$mail}', '{$userClass}', null)";
}
                                            //檢查錯誤
if(mysqli_query($conn,$sql)){
    //關閉 config.php->$link連線
    mysqli_close($link);
    function_alert("成功註冊!");
}else{
    function_alert("基本資料錯誤!");
    //關閉 config.php->$link連線
    mysqli_close($link);
}

                                                        //儲存userImage函式
function function_saveUserImage($userImageName){
    if(!isset($_FILES['userImage']['tmp_name'])){       //沒有輸入圖片
        echo "mkdir";
        return false;
    }
    elseif(empty($userImageName)){                     //沒有帳號提供檔名
        die("產生圖片->需要帳號");
        return false;
    }
                                                        //尚未建立userImage資料夾
    if(!is_dir("userImage")){
        mkdir("userImage");                             //建立userImage資料夾
        
        //if(!mkdir('userImage', 0777))die("無法建立userImage資料夾!");
    }  
    
                                                        //將userImage以$userImageName的檔名存入userImage資料夾
    if(move_uploaded_file($_FILES['userImage']['tmp_name'], "userImage/{$userImageName}.jpg")){
        return true;
    }
    return false;
}
                                            //跳窗訊息 header:addUserPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='addUserPage.php';
    </script>"; 
    return false;
}
<?php
session_start();
$conn=require_once "../includePHP/config.php";
 
$joinCode=$_POST["joinCode"];
$fallJoinURL="../user/joinPage.php";                                                                //預設失效網址

if($_SERVER["REQUEST_METHOD"] == "POST" && $joinCode!=""){
    function_header("$joinCode","$fallJoinURL"); 
}
else{                                                                                               //$_SERVER["REQUEST_METHOD"] != "POST"
    if($joinCode=="")
        function_alert("您輸入了空代碼!"); 
    else
        function_alert("Something wrong"); 
}

    //關閉 config.php->$link連線
    mysqli_close($link);

function function_header($joinCode,$fallJoinURL) { 
        // Display the alert box  
        $joinURL="localhost:3000/room/$joinCode";
        echo 
        "<script>
            // 轉址函式
            function redirect(url) {
                window.location.href = url;
            }
            // 嘗試主要轉址
            function tryMainRedirect() {
                redirect('$joinURL');
            }
            // 備用轉址
            function fallbackRedirect() {
                alert('在嘗試5秒後無法連線至會議室,請確認代碼!您使用的代碼是:$joinCode');
                redirect('$fallJoinURL');                
            }
            // 設置轉址超時時間（以毫秒為單位）
            const redirectTimeout = 5000; // 5秒
            // 設置嘗試主要轉址的計時器
            const timerId = setTimeout(fallbackRedirect, redirectTimeout);
            // 嘗試主要轉址
            tryMainRedirect();
        </script>"; 
        return false;
    }
                                                                                        //回到joinPage.php
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='../user/joinPage.php';
    </script>"; 
    return false;
}
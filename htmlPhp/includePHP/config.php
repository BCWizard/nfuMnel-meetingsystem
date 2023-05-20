<?php
define('DB_SERVER', 'localhost');           //define('常數名稱','常數值'); refence:P6-2
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');                  //default NULL
define('DB_NAME', 'meetingsystem');

//connect to MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);       //i => improvement PDO => PHP Data Objects

// Check connection
if($link === false){
    die("ERROR: 無法連線至資料庫. " . mysqli_connect_error());
}
else{
    // set utf8
    mysqli_query($link, 'SET NAMES utf8');
    return $link;
}
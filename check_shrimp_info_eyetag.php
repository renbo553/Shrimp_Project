<?php 
    $db_host = '127.0.0.1';     //資料庫主機
    $db_user = 'root';          //資料庫使用者
    $db_password = '';          //資料庫使用者密碼
    $db_name = 'shrimp';        //資料庫名稱
    //資料庫連接
    $link = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    if (!$link) {
        die("連接失敗" . mysqli_connect_error()); //輸出資料庫連接錯誤
    }

    $eye = $_GET['eye'];

    $sql = "SELECT 眼標 FROM shrimp_info WHERE 眼標 = '$eye'" ;
    // sql query string
    $stmt = mysqli_query($link, $sql);
    if(mysqli_num_rows($stmt) == 0) echo 0 ;
    else echo 1 ;
?>
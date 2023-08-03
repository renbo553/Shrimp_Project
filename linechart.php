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

/* 連接 database 是採用 utf8 編碼 */
mysqli_set_charset($link, "utf8");

/* 設定網頁呈現資料是用 utf-8 編碼，避免中文字變亂碼 */
header("Content-Type:text/html; charset=utf-8");

$start_date = filter_input(INPUT_POST, 'start_date');
$end_date = filter_input(INPUT_POST, 'end_date');
$tankid = filter_input(INPUT_POST, 'tankid') ;

/* 設定時區為台北 */
date_default_timezone_set("Asia/Taipei");
$cnt = date("Y-m-d-H-i-s");

/* 定義 SQL 字串的變數 */
/* 因為 crop 表格的第一個欄位是主鍵，而且它是「自動編號」 */
/* 所以，可以直接設定它是 null */
$insertStr = "SELECT * FROM feed WHERE Tank = \"$tankid\" AND Date >= \"$start_date\" AND Date <= \"$end_date\" ";
// echo json_encode($insertStr) ;
$result = mysqli_query($link, $insertStr);
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
echo json_encode($rows);
?>
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

require_once "Classes/PHPExcel.php" ;

$path = "x.xlsx" ;
$reader = PHPExcel_IOFactory::createReaderForFile($path) ;
$excel_obj = $reader->load($path) ;

$worksheet = $excel_obj->getActiveSheet() ;

function day($y , $m , $d) {
    $month = "" ;
    if($m < 10) $month = "-0" . $m ;
    else $month = "-" . $m ;
    $date = "" ;
    if($d < 10) $date = "-0" . $d ;
    else $date = "-" . $d ;
    return $y . $month . $date ;
}

function stage($stage) {
    if(strlen($stage) == 3) $stage[1] = '-' ;
    return $stage ;
}

function tt($date) {
    if(is_numeric($date)) {
        $jd = gregoriantojd(1 , 1 , 1970) ;
        $gregorian = jdtogregorian($jd+intval($date)-25569) ;
        $mydate = explode('/' , $gregorian) ;
        $myDatestr = str_pad($mydate[2] , 4 , '0' , STR_PAD_LEFT)
                ."-".str_pad($mydate[0] , 2 , '0' , STR_PAD_LEFT)
                ."-".str_pad($mydate[1] , 2 , '0' , STR_PAD_LEFT)
                .(false?" 00:00:00":'');
        return $myDatestr ;
    }
    return $date ;
}

// 343
for ($row = 6 ; $row < 343 ; $row ++ ) {
    $date = $worksheet->getCell('A'.$row)->getValue() ;

    $cleanDate = tt($date) ;

    $tank = $worksheet->getCell('B'.$row)->getValue() ;
    $male_shrimp = $worksheet->getCell('C'.$row)->getValue() ;
    $female_shrimp = $worksheet->getCell('D'.$row)->getValue() ;
    $dead_male_shrimp = $worksheet->getCell('E'.$row)->getValue() ;
    $dead_female_shrimp = $worksheet->getCell('F'.$row)->getValue() ;
    $peel_male_shrimp = $worksheet->getCell('G'.$row)->getValue() ;
    $peel_female_shrimp = $worksheet->getCell('H'.$row)->getValue() ;
    $avg_male_shrimp = $worksheet->getCell('I'.$row)->getValue() ;
    $avg_female_shrimp = $worksheet->getCell('J'.$row)->getValue() ;
    $total_weight = $worksheet->getCell('K'.$row)->getValue() ;
    
    $food0900 = $worksheet->getCell('L'.$row)->getValue() ;
    $weight0900 = $worksheet->getCell('M'.$row)->getValue() ;
    $remain0900 = $worksheet->getCell('N'.$row)->getValue() ;
    $eating0900 = $worksheet->getCell('O'.$row)->getValue() ;
    
    $food1100 = $worksheet->getCell('P'.$row)->getValue() ;
    $weight1100 = $worksheet->getCell('Q'.$row)->getValue() ;
    $remain1100 = $worksheet->getCell('R'.$row)->getValue() ;
    $eating1100 = $worksheet->getCell('S'.$row)->getValue() ;

    $food1400 = $worksheet->getCell('T'.$row)->getValue() ;
    $weight1400 = $worksheet->getCell('U'.$row)->getValue() ;
    $remain1400 = $worksheet->getCell('V'.$row)->getValue() ;
    $eating1400 = $worksheet->getCell('W'.$row)->getValue() ;

    $food1600 = $worksheet->getCell('X'.$row)->getValue() ;
    $weight1600 = $worksheet->getCell('Y'.$row)->getValue() ;
    $remain1600 = $worksheet->getCell('Z'.$row)->getValue() ;
    $eating1600 = $worksheet->getCell('AA'.$row)->getValue() ;
    
    $food1900 = $worksheet->getCell('AB'.$row)->getValue() ;
    $weight1900 = $worksheet->getCell('AC'.$row)->getValue() ;
    $remain1900 = $worksheet->getCell('AD'.$row)->getValue() ;
    $eating1900 = $worksheet->getCell('AE'.$row)->getValue() ;
    
    $food2300 = $worksheet->getCell('AF'.$row)->getValue() ;
    $weight2300 = $worksheet->getCell('AG'.$row)->getValue() ;
    $remain2300 = $worksheet->getCell('AH'.$row)->getValue() ;
    $eating2300 = $worksheet->getCell('AI'.$row)->getValue() ;
    
    $food0300 = $worksheet->getCell('AJ'.$row)->getValue() ;
    $weight0300 = $worksheet->getCell('AK'.$row)->getValue() ;
    $remain0300 = $worksheet->getCell('AL'.$row)->getValue() ;
    $eating0300 = $worksheet->getCell('AM'.$row)->getValue() ;

    $feeding_reatio = $worksheet->getCell('AN'.$row)->getValue() ;
    $observation = $worksheet->getCell('AO'.$row)->getValue() ;

    $feeding_reatio = $feeding_reatio * 100 ;

    
    $tankid = substr($tank , 0 , 2) ;
    $shrimp = substr($tank , -10 , -1) ;

    $insertStr = "INSERT INTO feed VALUES (null, 
                                            '" . $cleanDate . "',
                                            '" . $tankid . "', 
                                            '" . $shrimp . "', 
                                            '" . $male_shrimp . "', 
                                            '" . $female_shrimp . "', 
                                            '" . $dead_male_shrimp . "', 
                                            '" . $dead_female_shrimp . "', 
                                            '" . $peel_male_shrimp . "', 
                                            '" . $peel_female_shrimp . "', 
                                            '" . $avg_male_shrimp . "', 
                                            '" . $avg_female_shrimp . "', 
                                            '" . $total_weight . "', 
                                            '" . $food0900 . "', 
                                            '" . $weight0900 . "', 
                                            '" . $remain0900 . "', 
                                            '" . $eating0900 . "', 
                                            '" . $food1100 . "', 
                                            '" . $weight1100 . "', 
                                            '" . $remain1100 . "', 
                                            '" . $eating1100 . "', 
                                            '" . $food1400 . "', 
                                            '" . $weight1400 . "', 
                                            '" . $remain1400 . "', 
                                            '" . $eating1400 . "', 
                                            '" . $food1600 . "', 
                                            '" . $weight1600 . "', 
                                            '" . $remain1600 . "', 
                                            '" . $eating1600 . "', 
                                            '" . $food1900 . "', 
                                            '" . $weight1900 . "', 
                                            '" . $remain1900 . "', 
                                            '" . $eating1900 . "', 
                                            '" . $food2300 . "', 
                                            '" . $weight2300 . "', 
                                            '" . $remain2300 . "', 
                                            '" . $eating2300 . "', 
                                            '" . $food0300 . "', 
                                            '" . $weight0300 . "', 
                                            '" . $remain0300 . "', 
                                            '" . $eating0300 . "', 
                                            '" . $feeding_reatio . "', 
                                            '" . $observation . "', 
                                            '" . "" ."');" ;
    
    echo $insertStr ;
    $result = mysqli_query($link, $insertStr);
    if ($result) {
        echo "新增資料庫成功\n";
    } else {
        echo "新增資料庫失敗\n";
    }
}



// /* 連接 database 是採用 utf8 編碼 */
// mysqli_set_charset($link, "utf8");

// /* 設定網頁呈現資料是用 utf-8 編碼，避免中文字變亂碼 */
// header("Content-Type:text/html; charset=utf-8");
// /* 指定要上傳的資料夾 */
// $target_dir = "images/";

// $eyetag = filter_input(INPUT_POST, 'eye');
// $date = filter_input(INPUT_POST, 'date');
// $ovarystate = filter_input(INPUT_POST, 'ovarystate');
// $cleanDate = str_replace("/", "", $date);

// $fileType = $_FILES['fileField']['type']; //檔案類型
// $fileSize = $_FILES['fileField']['size']; //檔案大小（byte為單位）
// $fileName = $_FILES['fileField']['name']; //檔案名稱
// $fileTempName = $_FILES['fileField']['tmp_name']; //檔案暫存名稱

// /* 取得上傳檔案的副檔名 */
// $fileExtTmp = pathinfo($fileName, PATHINFO_EXTENSION);

// /* 將副檔名轉換成小寫，以便後續判別檔案格式用 */
// $fileExt = strtolower($fileExtTmp);

// /* 設定時區為台北 */
// date_default_timezone_set("Asia/Taipei");
// $cnt = date("Y-m-d-H-i-s");

// /* 將自訂檔名組合成完整的檔案存放路徑 */
// $target_file = $target_dir . $cnt . "." . $fileExt;
// // echo $target_file . "<br>";

// /* 宣告一變數，用來設定是否上傳成功 1ok 0不ok 2沒有圖*/
// $uploadOk = 1;
// if ($fileSize > 0) 
// {
//     /* $fileSize：上傳檔案的大小(bytes) */
//     if ($fileSize > 3000000) {
//         echo "抱歉，你上傳的檔案太大！\n";
//         $uploadOk = 0;
//     }

//     /* $fileExt 變數記錄上傳檔案的副檔名 */
//     if ($fileExt != "jpg" && $fileExt != "jpeg" && $fileExt != "png" && $fileExt != "gif" && $fileExt != "HEIC") {
//         echo "抱歉，僅允許上傳 jpg, jpeg, png 和 gif 格式的檔案！\n";
//         $uploadOk = 0;
//     }
// }
// else
// {
//     $uploadOk = 2;
//     $target_file = "";
// }


// /* 檢查 $uploadOK 是否為 0(若是為 0，代表上述的規則不符合，發生錯誤) */
// if ($uploadOk == 0) {
//     echo "抱歉，你的檔案無法上傳！\n";
//     /* 假如所有上述規則符合，開始進行上傳作業 */
// } 
// else {
//     /* 底下的 iconv()函式，用來將檔名的編碼由 utf8 轉換為 big5 */
//     /* 因為此方式才能讓 move_uploaded_file() 正常運作 */
//     /* 而其中參數 utf-8、big5 都是編碼的一種，也可以改成其它編碼 */
//     /* 後面的//TRANSLIT、//IGNORE 用來指出，如果找不到對應的編碼，可以替換成相似的編碼或略過 */
//     if ($uploadOk == 1)
//     {
//         if (move_uploaded_file($fileTempName, iconv("UTF-8", "big5//TRANSLIT//IGNORE", $target_file))) {
//             echo "檔案 " . preg_replace('/^.+[\\\\\\/]/', '', $fileName) . " 已經上傳成功！\n";
//         } 
//         else {
//             echo "抱歉，檔案上傳中發生錯誤！\n";
//         }
//     }
//     /* 定義 SQL 字串的變數 */
//     /* 因為 crop 表格的第一個欄位是主鍵，而且它是「自動編號」 */
//     /* 所以，可以直接設定它是 null */
//     $insertStr = "INSERT INTO ovary VALUES (null, '" . $eyetag . "', '" . $cleanDate . "', '" . $ovarystate . "', '" . $target_file . "');";
//     $result = mysqli_query($link, $insertStr);
//     if ($result) {
//         echo "新增資料庫成功\n";
//     } else {
//         echo "新增資料庫失敗\n";
//     }
// }

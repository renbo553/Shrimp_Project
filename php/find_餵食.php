<?php
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["userid"])||$_SESSION["authority"]>1)
      header("location:home");
};
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>About</title>
    <!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
    
    <style>
        tbody tr:hover{
                background-color: papayawhip;
            }
    </style>
</head>

<body>
    <!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

    <section>
    <?php
    // 定義資料庫資訊
    $DB_NAME = "shrimp"; // 資料庫名稱
    $DB_USER = "root"; // 資料庫管理帳號
    $DB_PASS = ""; // 資料庫管理密碼
    $DB_HOST = "localhost"; // 資料庫位址

    // 連接 MySQL 資料庫伺服器
    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
    if (empty($con)) {
        die("資料庫連接失敗！");
        exit;
    }

    // 選取資料庫
    if (!mysqli_select_db($con, $DB_NAME)) {
        die("選取資料庫失敗！");
    } else {
        echo "連接 " . $DB_NAME . " 資料庫成功！<br>";
    }

    // 設定連線編碼
    mysqli_query($con, "SET NAMES 'UTF-8'");

    // 取得資料
    $sql = "SELECT * FROM feed order by id desc";
    $result = mysqli_query($con, $sql,MYSQLI_STORE_RESULT);

    // 獲得資料筆數
    if ($result) {
        $num = mysqli_num_rows($result);
        echo "資料表有 " . $num . " 筆資料<br>";
    }

    // --- 顯示資料 --- //
    echo "<table style='text-align:center;' align='center' width='70%'  border='1px solid gray' text-align='center'>";
    echo "<thead>
        <th>Index</th>
        <th>日期</th>
        <th>Tank</th>
        <th>蝦</th>
        <th>紙本資料</th>
        </thead><tbody>";
    // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        if(strlen($row["image"]) > 0)
        {
            printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>", $row["id"], $row["Date"], $row["Tank"], $row["shrimp"], $row["image"]);
            echo '<td><a href="view_餵食?
            id=' . $row['id'] .
            '&Date='.$row["Date"].
            '&Tank='. $row["Tank"].
            '&shrimp='. $row["shrimp"].
            '&No_Shrimp_Male='. $row["No_Shrimp_Male"].
            '&No_Shrimp_Female='. $row["No_Shrimp_Female"].
            '&No_Dead_Male='. $row["No_Dead_Male"].
            '&No_Dead_Female='. $row["No_Dead_Female"].
            '&No_Moults_Male='. $row["No_Moults_Male"] .
            '&No_Moults_Female='. $row["No_Moults_Female"].
            '&Avg_Weight_Male='. $row["Avg_Weight_Male"].
            '&Avg_Weight_Female='. $row["Avg_Weight_Female"].
            '&Total_Weight='. $row["Total_Weight"].
            '&9_species='.$row['9_species'].
            '&9_weight='.$row['9_weight'].
            '&9_remain='.$row['9_remain'].
            '&9_eating='.$row['9_eating'].
            
            '&11_species='.$row['11_species'].
            '&11_weight='.$row['11_weight'].
            '&11_remain='.$row['11_remain'].
            '&11_eating='.$row['11_eating'].
    
            '&14_species='.$row['14_species'].
            '&14_weight='.$row['14_weight'].
            '&14_remain='.$row['14_remain'].
            '&14_eating='.$row['14_eating'].
    
            '&16_species='.$row['16_species'].
            '&16_weight='.$row['16_weight'].
            '&16_remain='.$row['16_remain'].
            '&16_eating='.$row['16_eating'].
            
            '&19_species='.$row['19_species'].
            '&19_weight='.$row['19_weight'].
            '&19_remain='.$row['19_remain'].
            '&19_eating='.$row['19_eating'].
    
            '&23_species='.$row['23_species'].
            '&23_weight='.$row['23_weight'].
            '&23_remain='.$row['23_remain'].
            '&23_eating='.$row['23_eating'].
    
            '&3_species='.$row['3_species'].
            '&3_weight='.$row['3_weight'].
            '&3_remain='.$row['3_remain'].
            '&3_eating='.$row['3_eating'].
            '&Feeding_Ratio='.$row["Feeding_Ratio"].
            '&Observation='.$row["Observation"].
            '">詳細</a></td>
            <td><a href="modify_餵食?
            id=' . $row['id'] .
            '&Date='.$row["Date"].
            '&Tank='. $row["Tank"].
            '&shrimp='. $row["shrimp"].
            '&No_Shrimp_Male='. $row["No_Shrimp_Male"].
            '&No_Shrimp_Female='. $row["No_Shrimp_Female"].
            '&No_Dead_Male='. $row["No_Dead_Male"].
            '&No_Dead_Female='. $row["No_Dead_Female"].
            '&No_Moults_Male='. $row["No_Moults_Male"] .
            '&No_Moults_Female='. $row["No_Moults_Female"].
            '&Avg_Weight_Male='. $row["Avg_Weight_Male"].
            '&Avg_Weight_Female='. $row["Avg_Weight_Female"].
            '&Total_Weight='. $row["Total_Weight"].
            '&9_species='.$row['9_species'].
            '&9_weight='.$row['9_weight'].
            '&9_remain='.$row['9_remain'].
            '&9_eating='.$row['9_eating'].
            
            '&11_species='.$row['11_species'].
            '&11_weight='.$row['11_weight'].
            '&11_remain='.$row['11_remain'].
            '&11_eating='.$row['11_eating'].
    
            '&14_species='.$row['14_species'].
            '&14_weight='.$row['14_weight'].
            '&14_remain='.$row['14_remain'].
            '&14_eating='.$row['14_eating'].
    
            '&16_species='.$row['16_species'].
            '&16_weight='.$row['16_weight'].
            '&16_remain='.$row['16_remain'].
            '&16_eating='.$row['16_eating'].
            
            '&19_species='.$row['19_species'].
            '&19_weight='.$row['19_weight'].
            '&19_remain='.$row['19_remain'].
            '&19_eating='.$row['19_eating'].
    
            '&23_species='.$row['23_species'].
            '&23_weight='.$row['23_weight'].
            '&23_remain='.$row['23_remain'].
            '&23_eating='.$row['23_eating'].
    
            '&3_species='.$row['3_species'].
            '&3_weight='.$row['3_weight'].
            '&3_remain='.$row['3_remain'].
            '&3_eating='.$row['3_eating'].
            '&Feeding_Ratio='.$row["Feeding_Ratio"].
            '&Observation='.$row["Observation"].
            '&image=' . $row["image"].
            '">修改</a></td>
            <td><a href="delete?id=' . $row['id'] . '&type=feed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
    
        }
        else
        {
        printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td>  </td>", $row["id"], $row["Date"], $row["Tank"], $row["shrimp"], $row["image"]);
        echo '<td><a href="view_餵食?
        id=' . $row['id'] .
        '&Date='.$row["Date"].
        '&Tank='. $row["Tank"].
        '&shrimp='. $row["shrimp"].
        '&No_Shrimp_Male='. $row["No_Shrimp_Male"].
        '&No_Shrimp_Female='. $row["No_Shrimp_Female"].
        '&No_Dead_Male='. $row["No_Dead_Male"].
        '&No_Dead_Female='. $row["No_Dead_Female"].
        '&No_Moults_Male='. $row["No_Moults_Male"] .
        '&No_Moults_Female='. $row["No_Moults_Female"].
        '&Avg_Weight_Male='. $row["Avg_Weight_Male"].
        '&Avg_Weight_Female='. $row["Avg_Weight_Female"].
        '&Total_Weight='. $row["Total_Weight"].
        '&9_species='.$row['9_species'].
        '&9_weight='.$row['9_weight'].
        '&9_remain='.$row['9_remain'].
        '&9_eating='.$row['9_eating'].
        
        '&11_species='.$row['11_species'].
        '&11_weight='.$row['11_weight'].
        '&11_remain='.$row['11_remain'].
        '&11_eating='.$row['11_eating'].

        '&14_species='.$row['14_species'].
        '&14_weight='.$row['14_weight'].
        '&14_remain='.$row['14_remain'].
        '&14_eating='.$row['14_eating'].

        '&16_species='.$row['16_species'].
        '&16_weight='.$row['16_weight'].
        '&16_remain='.$row['16_remain'].
        '&16_eating='.$row['16_eating'].
        
        '&19_species='.$row['19_species'].
        '&19_weight='.$row['19_weight'].
        '&19_remain='.$row['19_remain'].
        '&19_eating='.$row['19_eating'].

        '&23_species='.$row['23_species'].
        '&23_weight='.$row['23_weight'].
        '&23_remain='.$row['23_remain'].
        '&23_eating='.$row['23_eating'].

        '&3_species='.$row['3_species'].
        '&3_weight='.$row['3_weight'].
        '&3_remain='.$row['3_remain'].
        '&3_eating='.$row['3_eating'].
        '&Feeding_Ratio='.$row["Feeding_Ratio"].
        '&Observation='.$row["Observation"].
        '">詳細</a></td>
        <td><a href="modify_餵食?
        id=' . $row['id'] .
        '&Date='.$row["Date"].
        '&Tank='. $row["Tank"].
        '&shrimp='. $row["shrimp"].
        '&No_Shrimp_Male='. $row["No_Shrimp_Male"].
        '&No_Shrimp_Female='. $row["No_Shrimp_Female"].
        '&No_Dead_Male='. $row["No_Dead_Male"].
        '&No_Dead_Female='. $row["No_Dead_Female"].
        '&No_Moults_Male='. $row["No_Moults_Male"] .
        '&No_Moults_Female='. $row["No_Moults_Female"].
        '&Avg_Weight_Male='. $row["Avg_Weight_Male"].
        '&Avg_Weight_Female='. $row["Avg_Weight_Female"].
        '&Total_Weight='. $row["Total_Weight"].
        '&9_species='.$row['9_species'].
        '&9_weight='.$row['9_weight'].
        '&9_remain='.$row['9_remain'].
        '&9_eating='.$row['9_eating'].
        
        '&11_species='.$row['11_species'].
        '&11_weight='.$row['11_weight'].
        '&11_remain='.$row['11_remain'].
        '&11_eating='.$row['11_eating'].

        '&14_species='.$row['14_species'].
        '&14_weight='.$row['14_weight'].
        '&14_remain='.$row['14_remain'].
        '&14_eating='.$row['14_eating'].

        '&16_species='.$row['16_species'].
        '&16_weight='.$row['16_weight'].
        '&16_remain='.$row['16_remain'].
        '&16_eating='.$row['16_eating'].
        
        '&19_species='.$row['19_species'].
        '&19_weight='.$row['19_weight'].
        '&19_remain='.$row['19_remain'].
        '&19_eating='.$row['19_eating'].

        '&23_species='.$row['23_species'].
        '&23_weight='.$row['23_weight'].
        '&23_remain='.$row['23_remain'].
        '&23_eating='.$row['23_eating'].

        '&3_species='.$row['3_species'].
        '&3_weight='.$row['3_weight'].
        '&3_remain='.$row['3_remain'].
        '&3_eating='.$row['3_eating'].
        '&Feeding_Ratio='.$row["Feeding_Ratio"].
        '&Observation='.$row["Observation"].
        '&image=' . $row["image"].
        '">修改</a></td>
        <td><a href="delete?id=' . $row['id'] . '&type=feed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';

        }
    }
    echo "</tbody></table>";
    echo "<br>";
    // echo "<br>顯示資料（MYSQLI_ASSOC，欄位名稱）：<br>";

    // 釋放記憶體
    mysqli_free_result($result);

    // 關閉連線
    mysqli_close($con);
    ?>
    </section>

    <!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
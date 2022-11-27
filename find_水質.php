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
    $sql = "SELECT * FROM waterquality order by id desc";
    $result = mysqli_query($con, $sql, MYSQLI_STORE_RESULT);

    // 獲得資料筆數
    if ($result) {
        $num = mysqli_num_rows($result);
        echo "資料表有 " . $num . " 筆資料<br>";
    }

    // --- 顯示資料 --- //
    echo "<table style='text-align:center;'align='center'width='70%' border='1px solid gray'text-align='center'>";
    echo "<thead>
        <th>Index</th>
        <th>日期</th>
        <th>TankID</th>
        <th>紙本資料</th>
        </thead><tbody>";
    // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        if(strlen($row["image"]) > 0)
        {
            printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>", $row["id"], $row["Date"], $row["TankID"], $row["image"]);
            echo '<td><a href="view_水質?id='.$row['id'].'&date='.$row["Date"].'&location='.$row["TankID"].'&nh4='.$row["NH4_N"].'&no2='.$row["NO2"].'&no3='.$row["NO3"].'&Salinity_1='.$row["Salinity_1"].'&Salinity_2='.$row["Salinity_2"].'&Salinity_3='.$row["Salinity_3"].'&pH_1='.$row["pH_1"].'&pH_2='.$row["pH_2"].'&pH_3='.$row["pH_3"].'&O2_1='.$row["O2_1"].'&O2_2='.$row["O2_2"].'&O2_3='.$row["O2_3"].'&ORP_1='.$row["ORP_1"].'&ORP_2='.$row["ORP_2"].'&ORP_3='.$row["ORP_3"].'&Temp_1='.$row["WTemp_1"].'&Temp_2='.$row["WTemp_2"].'&Temp_3='.$row["WTemp_3"].'&Alkalinity='.$row["Alkalinity"].'&TCBS='.$row["TCBS"].'&綠菌='.$row["TCBS綠菌"].'&Marine='.$row["Marine"].'&螢光菌TCBS='.$row["螢光菌TCBS"].'&螢光菌Marine='.$row["螢光菌Marine"].'&Note='.$row["Note"]. '&image='.$row["image"] .'">詳細</a></td><td><a href="modify_水質?id='.$row['id'].'&date='.$row["Date"].'&location='.$row["TankID"].'&nh4='.$row["NH4_N"].'&no2='.$row["NO2"].'&no3='.$row["NO3"].'&Salinity_1='.$row["Salinity_1"].'&Salinity_2='.$row["Salinity_2"].'&Salinity_3='.$row["Salinity_3"].'&pH_1='.$row["pH_1"].'&pH_2='.$row["pH_2"].'&pH_3='.$row["pH_3"].'&O2_1='.$row["O2_1"].'&O2_2='.$row["O2_2"].'&O2_3='.$row["O2_3"].'&ORP_1='.$row["ORP_1"].'&ORP_2='.$row["ORP_2"].'&ORP_3='.$row["ORP_3"].'&Temp_1='.$row["WTemp_1"].'&Temp_2='.$row["WTemp_2"].'&Temp_3='.$row["WTemp_3"].'&Alkalinity='.$row["Alkalinity"].'&TCBS='.$row["TCBS"].'&綠菌='.$row["TCBS綠菌"].'&Marine='.$row["Marine"].'&螢光菌TCBS='.$row["螢光菌TCBS"].'&螢光菌Marine='.$row["螢光菌Marine"].'&Note='. $row["Note"] . '&image='. $row["image"] .'">修改</a></td><td><a href="delete?id='. $row['id'] . '&type=water" onclick="return confirm(\'確定要刪除ID : '.$row['id'].'嗎?\');">刪除</a></td>';
    
        }
        else{
            printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td></td>", $row["id"], $row["Date"], $row["TankID"], $row["image"]);
            echo '<td><a href="view_水質?id='.$row['id'].'&date='.$row["Date"].'&location='.$row["TankID"].'&nh4='.$row["NH4_N"].'&no2='.$row["NO2"].'&no3='.$row["NO3"].'&Salinity_1='.$row["Salinity_1"].'&Salinity_2='.$row["Salinity_2"].'&Salinity_3='.$row["Salinity_3"].'&pH_1='.$row["pH_1"].'&pH_2='.$row["pH_2"].'&pH_3='.$row["pH_3"].'&O2_1='.$row["O2_1"].'&O2_2='.$row["O2_2"].'&O2_3='.$row["O2_3"].'&ORP_1='.$row["ORP_1"].'&ORP_2='.$row["ORP_2"].'&ORP_3='.$row["ORP_3"].'&Temp_1='.$row["WTemp_1"].'&Temp_2='.$row["WTemp_2"].'&Temp_3='.$row["WTemp_3"].'&Alkalinity='.$row["Alkalinity"].'&TCBS='.$row["TCBS"].'&綠菌='.$row["TCBS綠菌"].'&Marine='.$row["Marine"].'&螢光菌TCBS='.$row["螢光菌TCBS"].'&螢光菌Marine='.$row["螢光菌Marine"].'&Note='.$row["Note"]. '&image='. $row["image"] .'">詳細</a></td><td><a href="modify_水質?id='.$row['id'].'&date='.$row["Date"].'&location='.$row["TankID"].'&nh4='.$row["NH4_N"].'&no2='.$row["NO2"].'&no3='.$row["NO3"].'&Salinity_1='.$row["Salinity_1"].'&Salinity_2='.$row["Salinity_2"].'&Salinity_3='.$row["Salinity_3"].'&pH_1='.$row["pH_1"].'&pH_2='.$row["pH_2"].'&pH_3='.$row["pH_3"].'&O2_1='.$row["O2_1"].'&O2_2='.$row["O2_2"].'&O2_3='.$row["O2_3"].'&ORP_1='.$row["ORP_1"].'&ORP_2='.$row["ORP_2"].'&ORP_3='.$row["ORP_3"].'&Temp_1='.$row["WTemp_1"].'&Temp_2='.$row["WTemp_2"].'&Temp_3='.$row["WTemp_3"].'&Alkalinity='.$row["Alkalinity"].'&TCBS='.$row["TCBS"].'&綠菌='.$row["TCBS綠菌"].'&Marine='.$row["Marine"].'&螢光菌TCBS='.$row["螢光菌TCBS"].'&螢光菌Marine='.$row["螢光菌Marine"].'&Note='.$row["Note"]. '&image='. $row["image"] .'">修改</a></td><td><a href="delete?id='. $row['id'] . '&type=water" onclick="return confirm(\'確定要刪除ID : '.$row['id'].'嗎?\');">刪除</a></td>';
    
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

    <!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
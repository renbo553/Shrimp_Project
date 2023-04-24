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
	<title>詳細資料 - 母種蝦資料</title>
	<!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<style>
        @media (min-width: 1024px) {
            div.big_form {
                border: solid 1px black;
                animation: change 0s;
            }

            div.small_form {
                display: none;
            }

            @keyframes change {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }
        }

        @media (max-width: 1023px) {
            div.big_form {
                display: none;
            }

            div.small_form {
                border: solid 1px black;
                animation: change 0s;
            }

            @keyframes change {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }
        }
    </style>

	<div>
        <div class="big_form">
			<section>
                <form id="big_form" method="post" enctype="multipart/form-data">
                    <?php require_once "big_view_shrimp_info.html" ?>
                </form>
			</section>
        </div>
        <div class="small_form">
            <section>
                <form id="small_form" method="post" enctype="multipart/form-data">
                    <?php require_once "small_view_shrimp_info.html" ?>
                </form>
            </section>
        </div>
    </div>

    <?php
        require_once "config.php";
        require_once "utility.php";
        define("CACHE_QUERY", "search_ovary_query");
        if(isset($_POST['submit_button']) && $_POST['submit_button'] == 'submit') {
            $UI_type = isset($_POST["UI_type"]) ? $_POST["UI_type"] : null;
            if(is_null($UI_type)) echo "<script> Alert('請選擇要查詢的類別'); </script>";
            else{
                $eye = trim($_POST["hidden_eye"]) ;
                $tankid = trim($_POST["hidden_tankid"]) ;
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
                $and_or = isset($_POST["and_or"]) ? $_POST["and_or"] : "and" ;
                if($UI_type == "卵巢成熟") search_ovary_process($mysqli , $eye , $start_date , $end_date , $and_or) ;
                if($UI_type == "生產") search_breed_process($mysqli , $eye , $start_date , $end_date , $and_or) ;
                if($UI_type == "餵食") search_feed_process($mysqli , $tankid , $start_date , $end_date , $and_or) ;
                if($UI_type == "水質") search_waterquality_process($mysqli , $tankid , $start_date , $end_date , $and_or) ;
            }
        }

        function search_ovary_process($mysqli , $eye , $start_date , $end_date , $and_or) : void{
            if(empty($start_date)){
                $start_date = "true";
            }
            else{
                $start_date = str_replace('-', '', $start_date);
                $start_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) >= {$start_date}";
            }
            if(empty($end_date)){
                $end_date = ($and_or == "and" || ($start_date != "true" && $start_date != "false")) ? "true" : "false" ;
            }
            else{
                $end_date = str_replace('-', '', $end_date);
                $end_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) <= {$end_date}";
            }
            $eye = "眼標 = " . "'{$eye}'" ;

            /* search data from database */
            //$sql = "SELECT * FROM ovary WHERE {$eyetag} AND {$date} AND {$stage} ORDER BY {$sort_key} {$sort_order}";
            if($and_or == "and") $sql = "SELECT * FROM ovary WHERE BINARY {$eye} AND {$start_date} AND {$end_date}" ;
            else $sql = "SELECT * FROM ovary WHERE BINARY {$eye} OR {$start_date} AND {$end_date}" ;
            $result = $mysqli->query($sql);
    
            /* show search result */
            show_ovary_result($result);
    
            /* store query into session */
            utility_session_insert(CACHE_QUERY, $sql);
    
            $mysqli->close();
        }

        function search_waterquality_process($mysqli , $tankid , $start_date , $end_date , $and_or) : void{
            if(empty($start_date)){
                $start_date = "true";
            }
            else{
                $start_date = str_replace('-', '', $start_date);
                $start_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) >= {$start_date}";
            }
            if(empty($end_date)){
                $end_date = ($and_or == "and" || ($start_date != "true" && $start_date != "false")) ? "true" : "false" ;
            }
            else{
                $end_date = str_replace('-', '', $end_date);
                $end_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) <= {$end_date}";
            }
            $tankid = "TankID = " . "'{$tankid}'";
            
            /* search data from database */
            if($and_or == "and") $sql = "SELECT * FROM waterquality WHERE {$start_date} AND {$end_date} AND {$tankid}";
            else $sql = "SELECT * FROM waterquality WHERE {$start_date} AND {$end_date} OR {$tankid}";
            $result = $mysqli->query($sql);

            /* show result */
            show_waterquality_result($result);

            /* store query into session */
            utility_session_insert(CACHE_QUERY, $sql);
            
            //$mysqli->close();
        }

        function search_feed_process($mysqli , $tankid , $start_date , $end_date , $and_or) : void{
            if(empty($start_date)){
                $start_date = "true";
            }
            else{
                $start_date = str_replace('-', '', $start_date);
                $start_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) >= {$start_date}";
            }
            if(empty($end_date)){
                $end_date = ($and_or == "and" || ($start_date != "true" && $start_date != "false")) ? "true" : "false" ;
            }
            else{
                $end_date = str_replace('-', '', $end_date);
                $end_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) <= {$end_date}";
            }
            $tankid = "Tank = " . "'{$tankid}'";

            /* search data from database */
            //$sql = "SELECT * FROM feed WHERE {$date} AND {$tank} AND {$shrimp} ORDER BY {$sort_key} {$sort_order}";
            if($and_or == "and") $sql = "SELECT * FROM feed WHERE {$start_date} AND {$end_date} AND {$tankid} ";
            else $sql = "SELECT * FROM feed WHERE {$start_date} AND {$end_date} OR {$tankid} ";
            $result = $mysqli->query($sql);

            /* show result */
            show_feed_result($result);

            /* store query into session */
            utility_session_insert(CACHE_QUERY, $sql);
            
            $mysqli->close();
        }

        function search_breed_process($mysqli , $eye , $start_date , $end_date , $and_or) : void{
            $eye = "眼標 = " . "'{$eye}'" ;

            /* search data from database */
            if($and_or == "and") $sql = "SELECT * FROM breed WHERE {$eye}";
            else $sql = "SELECT * FROM breed WHERE {$eye}";
            $result = $mysqli->query($sql);
    
            /* show search result */
            show_breed_result($result);
    
            /* store query into session */
            utility_session_insert(CACHE_QUERY, $sql);
            
            $mysqli->close();
        }

        //--------------------------------------------------------------------------------------------------

        function show_ovary_result($result) : void{
            echo "<div style = \"width : 1% ; display : inline-block\"> </div>" ;
            echo "資料表有 " . $result->num_rows . " 筆資料<br>";
    
            // --- 顯示資料 --- //
            echo "<table style='text-align:center;' align='center' width='90%'  border='1px solid gray' text-align='center'>";
            echo "<thead>
                <th>Index</th>
                <th>眼標</th>
                <th>日期</th>
                <th>卵巢階段</th>
                <th>紙本資料</th>
                </thead><tbody>";
            // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";
    
            while($row = $result->fetch_assoc()){
                if(strlen($row["image"]) > 0){
                    printf("<tr><td  style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>", $row["id"], $row["眼標"], $row["Date"], $row["Stage"], $row["image"]);
                    echo '<td><a href="modify_卵巢?&id='.$row['id']. 
                    '&eye='.$row["眼標"]. 
                    '&date='.$row["Date"]. 
                    '&ovarystate='.$row["Stage"]. 
                    '&image='.$row["image"].
                    '">修改</a></td>
                    <td><a href="delete?
                    &id='.$row['id']. '&type=ovary" onclick="return confirm(\'確定要刪除ID : ' . $row['id'] . ' 嗎?\');">刪除</a></td>';
                }
                else{
                    printf("<tr><td  style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td></td>", $row["id"], $row["眼標"], $row["Date"], $row["Stage"]);
                    echo '<td><a href="modify_卵巢?&id='.$row['id']. 
                    '&eye='.$row["眼標"]. 
                    '&date='.$row["Date"]. 
                    '&ovarystate='.$row["Stage"]. 
                    '&image='.$row["image"].
                    '">修改</a></td>
                    <td><a href="delete?id=' . $row['id'] . '&type=ovary" onclick="return confirm(\'確定要刪除ID : ' . $row['id'] . ' 嗎?\');">刪除</a></td>';
                }
            }
    
            echo "</tbody></table>";
            echo "<br>";
        }

        function show_waterquality_result($result) : void{
            echo "<div style = \"width : 1% ; display : inline-block\"> </div>" ;
            echo "資料表有 " . $result->num_rows . " 筆資料<br>";

            // --- 顯示資料 --- //
            echo "<table style='text-align:center;'align='center'width='90%' border='1px solid gray'text-align='center'>";
            echo "<thead>
                <th>Index</th>
                <th>日期</th>
                <th>TankID</th>
                <th>紙本資料</th>
                </thead><tbody>";
            // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

            while($row = $result->fetch_assoc()){
                if(strlen($row["image"]) > 0){
                    printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>", $row["id"], $row["Date"], $row["TankID"], $row["image"]);
                    echo '<td><a href="view_水質?id='.$row['id'].
                    '&Date='.$row["Date"].
                    '&Tank='.$row["TankID"].
                    '&nh4='.$row["NH4_N"].
                    '&no2='.$row["NO2"].
                    '&no3='.$row["NO3"].
                    '&Salinity_1='.$row["Salinity_1"].
                    '&Salinity_2='.$row["Salinity_2"].
                    '&Salinity_3='.$row["Salinity_3"].
                    '&pH_1='.$row["pH_1"].
                    '&pH_2='.$row["pH_2"].
                    '&pH_3='.$row["pH_3"].
                    '&O2_1='.$row["O2_1"].
                    '&O2_2='.$row["O2_2"].
                    '&O2_3='.$row["O2_3"].
                    '&ORP_1='.$row["ORP_1"].
                    '&ORP_2='.$row["ORP_2"].
                    '&ORP_3='.$row["ORP_3"].
                    '&Temp_1='.$row["WTemp_1"].
                    '&Temp_2='.$row["WTemp_2"].
                    '&Temp_3='.$row["WTemp_3"].
                    '&Alkalinity='.$row["Alkalinity"].
                    '&TCBS='.$row["TCBS"].
                    '&TCBS綠菌='.$row["TCBS綠菌"].
                    '&Marine='.$row["Marine"].
                    '&螢光菌TCBS='.$row["螢光菌TCBS"].
                    '&螢光菌Marine='.$row["螢光菌Marine"].
                    '&Note='.$row["Note"]. 
                    '&image='.$row["image"] .
                    '">詳細</a></td>
                    <td><a href="modify_水質?id='.$row['id'].
                    '&Date='.$row["Date"].
                    '&Tank='.$row["TankID"].
                    '&nh4='.$row["NH4_N"].
                    '&no2='.$row["NO2"].
                    '&no3='.$row["NO3"].
                    '&Salinity_1='.$row["Salinity_1"].
                    '&Salinity_2='.$row["Salinity_2"].
                    '&Salinity_3='.$row["Salinity_3"].
                    '&pH_1='.$row["pH_1"].
                    '&pH_2='.$row["pH_2"].
                    '&pH_3='.$row["pH_3"].
                    '&O2_1='.$row["O2_1"].
                    '&O2_2='.$row["O2_2"].
                    '&O2_3='.$row["O2_3"].
                    '&ORP_1='.$row["ORP_1"].
                    '&ORP_2='.$row["ORP_2"].
                    '&ORP_3='.$row["ORP_3"].
                    '&Temp_1='.$row["WTemp_1"].
                    '&Temp_2='.$row["WTemp_2"].
                    '&Temp_3='.$row["WTemp_3"].
                    '&Alkalinity='.$row["Alkalinity"].
                    '&TCBS='.$row["TCBS"].
                    '&TCBS綠菌='.$row["TCBS綠菌"].
                    '&Marine='.$row["Marine"].
                    '&螢光菌TCBS='.$row["螢光菌TCBS"].
                    '&螢光菌Marine='.$row["螢光菌Marine"].
                    '&Note='.$row["Note"]. 
                    '&image='.$row["image"] .
                    '">修改</a></td>
                    <td><a href="delete?
                    id='. $row['id'] . '&type=water" onclick="return confirm(\'確定要刪除ID : '.$row['id'].'嗎?\');">刪除</a></td>';
                }
                else{
                    printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td></td>", $row["id"], $row["Date"], $row["TankID"], $row["image"]);
                    echo '<td><a href="view_水質?id='.$row['id'].
                    '&Date='.$row["Date"].
                    '&Tank='.$row["TankID"].
                    '&nh4='.$row["NH4_N"].
                    '&no2='.$row["NO2"].
                    '&no3='.$row["NO3"].
                    '&Salinity_1='.$row["Salinity_1"].
                    '&Salinity_2='.$row["Salinity_2"].
                    '&Salinity_3='.$row["Salinity_3"].
                    '&pH_1='.$row["pH_1"].
                    '&pH_2='.$row["pH_2"].
                    '&pH_3='.$row["pH_3"].
                    '&O2_1='.$row["O2_1"].
                    '&O2_2='.$row["O2_2"].
                    '&O2_3='.$row["O2_3"].
                    '&ORP_1='.$row["ORP_1"].
                    '&ORP_2='.$row["ORP_2"].
                    '&ORP_3='.$row["ORP_3"].
                    '&Temp_1='.$row["WTemp_1"].
                    '&Temp_2='.$row["WTemp_2"].
                    '&Temp_3='.$row["WTemp_3"].
                    '&Alkalinity='.$row["Alkalinity"].
                    '&TCBS='.$row["TCBS"].
                    '&TCBS綠菌='.$row["TCBS綠菌"].
                    '&Marine='.$row["Marine"].
                    '&螢光菌TCBS='.$row["螢光菌TCBS"].
                    '&螢光菌Marine='.$row["螢光菌Marine"].
                    '&Note='.$row["Note"]. 
                    '">詳細</a></td>
                    <td><a href="modify_水質?id='.$row['id'].
                    '&Date='.$row["Date"].
                    '&Tank='.$row["TankID"].
                    '&nh4='.$row["NH4_N"].
                    '&no2='.$row["NO2"].
                    '&no3='.$row["NO3"].
                    '&Salinity_1='.$row["Salinity_1"].
                    '&Salinity_2='.$row["Salinity_2"].
                    '&Salinity_3='.$row["Salinity_3"].
                    '&pH_1='.$row["pH_1"].
                    '&pH_2='.$row["pH_2"].
                    '&pH_3='.$row["pH_3"].
                    '&O2_1='.$row["O2_1"].
                    '&O2_2='.$row["O2_2"].
                    '&O2_3='.$row["O2_3"].
                    '&ORP_1='.$row["ORP_1"].
                    '&ORP_2='.$row["ORP_2"].
                    '&ORP_3='.$row["ORP_3"].
                    '&Temp_1='.$row["WTemp_1"].
                    '&Temp_2='.$row["WTemp_2"].
                    '&Temp_3='.$row["WTemp_3"].
                    '&Alkalinity='.$row["Alkalinity"].
                    '&TCBS='.$row["TCBS"].
                    '&TCBS綠菌='.$row["TCBS綠菌"].
                    '&Marine='.$row["Marine"].
                    '&螢光菌TCBS='.$row["螢光菌TCBS"].
                    '&螢光菌Marine='.$row["螢光菌Marine"].
                    '&Note='.$row["Note"]. 
                    '&image='. $row["image"] .
                    '">修改</a></td>
                    <td><a href="delete?id='. $row['id'] . '&type=water" onclick="return confirm(\'確定要刪除ID : '.$row['id'].'嗎?\');">刪除</a></td>';
                }
            }
            echo "</tbody></table>";
            echo "<br>";
            // echo "<br>顯示資料（MYSQLI_ASSOC，欄位名稱）：<br>";
        }

        function show_feed_result($result) : void{
            echo "<div style = \"width : 1% ; display : inline-block\"> </div>" ;
            echo "資料表有 " . $result->num_rows . " 筆資料<br>";

            // --- 顯示資料 --- //
            echo "<table style='text-align:center;' align='center' width='90%'  border='1px solid gray' text-align='center'>";

            echo "<thead>
                <th>Index</th>
                <th>日期</th>
                <th>Tank</th>
                <th>紙本資料</th>
                </thead><tbody>";
            // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";


            while ($row = $result->fetch_assoc())
            {
                if(strlen($row["image"]) > 0)
                {
                    printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>", $row["id"], $row["Date"], $row["Tank"], $row["image"]);
                    echo '<td><a href="view_餵食?id=' . $row['id'] .
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
                    '&time='. $row["time"].
                    '&work='. $row["work"].
                    '&else_work='. $row["else_work"].
                    '&food_weight='. $row["food_weight"].
                    '&food_remain='. $row["food_remain"].
                    '&eating='. $row["eating"].
                    '&Feeding_Ratio='.$row["Feeding_Ratio"].
                    '&Observation='.$row["Observation"].
                    '&image=' . $row["image"].
                    '">詳細</a></td>
                    <td><a href="modify_餵食?id=' . $row['id'] .
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
                    '&time='. $row["time"].
                    '&work='. $row["work"].
                    '&else_work='. $row["else_work"].
                    '&food_weight='. $row["food_weight"].
                    '&food_remain='. $row["food_remain"].
                    '&eating='. $row["eating"].
                    '&Feeding_Ratio='.$row["Feeding_Ratio"].
                    '&Observation='.$row["Observation"].
                    '&image=' . $row["image"].
                    '">修改</a></td>
                    <td><a href="delete?id=' . $row['id'] . '&type=feed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
                }
                else
                {
                    printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> </td>", $row["id"], $row["Date"], $row["Tank"], $row["image"]);
                    echo '<td><a href="view_餵食?id=' . $row['id'] .
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
                    '&time='. $row["time"].
                    '&work='. $row["work"].
                    '&else_work='. $row["else_work"].
                    '&food_weight='. $row["food_weight"].
                    '&food_remain='. $row["food_remain"].
                    '&eating='. $row["eating"].
                    '&Feeding_Ratio='.$row["Feeding_Ratio"].
                    '&Observation='.$row["Observation"].
                    '">詳細</a></td>
                    <td><a href="modify_餵食?id=' . $row['id'] .
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
                    '&time='. $row["time"].
                    '&work='. $row["work"].
                    '&else_work='. $row["else_work"].
                    '&food_weight='. $row["food_weight"].
                    '&food_remain='. $row["food_remain"].
                    '&eating='. $row["eating"].
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

        }

        function show_breed_result($result) : void{
            echo "<div style = \"width : 1% ; display : inline-block\"> </div>" ;
            echo "資料表有 " . $result->num_rows . " 筆資料<br>";
    
            // --- 顯示資料 --- //
            echo "<table style='text-align:center;' align='center' width='90%'  border='1px solid gray' text-align='center'>";
            echo "<thead>
                <th>Index</th>
                <th>家族</th>
                <th>眼標</th>
                <th>紙本資料</th>
                </thead><tbody>";
            // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";
    
            while ($row = $result->fetch_assoc())
            {
                if(strlen($row["image"]) > 0)
                {
                    printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>",$row["id"], $row["家族"], $row["眼標"], $row["image"]);
                    echo '<td><a href="view_生產?
                        &id=' . $row['id'] . 
                        '&family=' .$row["家族"] .  
                        '&male_family=' .$row["公蝦家族"] . 
                        '&eye=' . $row["眼標"] . 
                        '&cutday=' . $row["剪眼日期"] . 
                        '&cutweight=' . $row["剪眼體重"] . 
                        '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                        '&spawningweight=' . $row["生產體重"] . 
                        '&ovarystate=' . $row["卵巢進展階段"] . 
                        '&breed_type=' . $row["交配方式"] .
                        '&image=' . $row["image"]  .
                        '">詳細</a></td>
                        <td><a href="modify_生產?
                        &id=' . $row['id'] . 
                        '&family=' .$row["家族"] .  
                        '&male_family=' .$row["公蝦家族"] . 
                        '&eye=' . $row["眼標"] . 
                        '&cutday=' . $row["剪眼日期"] . 
                        '&cutweight=' . $row["剪眼體重"] . 
                        '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                        '&spawningweight=' . $row["生產體重"] . 
                        '&ovarystate=' . $row["卵巢進展階段"] . 
                        '&breed_type=' . $row["交配方式"] .
                        '&image=' . $row["image"]  .
                        '">修改</a></td>
                      <td><a href="delete?id=' . $row['id'] . '&type=breed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
                }
                else{
                    printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> </td>",$row["id"], $row["家族"], $row["眼標"] , $row["image"]);
                    echo '<td><a href="view_生產?
                        &id=' . $row['id'] . 
                        '&family=' .$row["家族"] .  
                        '&male_family=' .$row["公蝦家族"] . 
                        '&eye=' . $row["眼標"] . 
                        '&cutday=' . $row["剪眼日期"] . 
                        '&cutweight=' . $row["剪眼體重"] . 
                        '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                        '&spawningweight=' . $row["生產體重"] . 
                        '&ovarystate=' . $row["卵巢進展階段"] . 
                        '&breed_type=' . $row["交配方式"] .
                        '&image=' . $row["image"]  .
                        '">詳細</a></td>
                        <td><a href="modify_生產?
                        &id=' . $row['id'] . 
                        '&family=' .$row["家族"] .  
                        '&male_family=' .$row["公蝦家族"] . 
                        '&eye=' . $row["眼標"] . 
                        '&cutday=' . $row["剪眼日期"] . 
                        '&cutweight=' . $row["剪眼體重"] . 
                        '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                        '&spawningweight=' . $row["生產體重"] . 
                        '&ovarystate=' . $row["卵巢進展階段"] . 
                        '&breed_type=' . $row["交配方式"] .
                        '&image=' . $row["image"]  .
                        '">修改</a></td>
                      <td><a href="delete?id=' . $row['id'] . '&type=breed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';    
                }   
    
            }
            echo "</tbody></table>";
            echo "<br>";
            echo "<div style = \"width : 1% ; display : inline-block\"> </div>" ;
            // echo "<br>顯示資料（MYSQLI_ASSOC，欄位名稱）：<br>";
        }
    ?>

    <script> document.write('<script type="text/javascript" src="shrimp_info_check.js"></'+'script>'); </script>

	<script>
		window.onload = function() {
			//頁面載入後將資料放到form上面
			var urlParams = new URLSearchParams(window.location.search);
			modify_put_into_form(urlParams , "big_form" , 0);
			modify_put_into_form(urlParams , "small_form" , 0);
        }

        function back() {
            window.location.href='find_母種蝦資料';
        }
    </script>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
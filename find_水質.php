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
    <title>查詢 - 水質</title>
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

    <!--Search form-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
        <?php require_once "utility.php"; ?>

        <!-- 2/18 修改之UI -->
        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 排序項目 </div>
                <div class="input-group">
                    <?php 
                        $sort_option_array = array();
                        $sort_option_array["index"] = "id";
                        $sort_option_array["日期"] = "Date";
                        $sort_option_array["TankID"] = "TankID";
                        utility_selectbox("sort_select", "排序項目", $sort_option_array);
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 排序方式 </div>
                <div class="input-group">
                    <?php 
                        $order_option_array = array();
                        $order_option_array["升序"] = "ASC";
                        $order_option_array["降序"] = "DESC";
                        utility_selectbox("order_select", "排序方式", $order_option_array);
                    ?>
                </div>
            </div>
            <div style = "width: 1%"> </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 日期 </div>
                <div class="input-group">
                    <?php 
                        utility_date("date", "日期");
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> TankID </div>
                <div class="input-group">
                    <?php
                        $tank_option_array = array();
                        $tank_option_array["M1"] = "M1";
                        $tank_option_array["M2"] = "M2";
                        $tank_option_array["M3"] = "M3";
                        $tank_option_array["M4"] = "M4";
                        utility_selectbox("tank_select", "TankID", $tank_option_array);
                    ?>
                </div>
            </div>
            <div style = "width: 1%"> </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 40px">
            <div style = "width: 1%"> </div>
            <div style = "width: auto"> 
                <?php
                    utility_button("submit", "查詢");
                ?>
            </div>
            <div style = "width: 1%"> </div>
            <div style = "width: auto">
                <?php
                    utility_button_onclick("export_waterquality.php", "匯出");
                ?>
            </div>
        </div>
    </form>
    <!--//Search form-->

    <!--Data table-->
    <?php

    define("CACHE_QUERY", "search_waterquality_query");

    require_once "config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        search_waterquality_process($mysqli);
    }
    else{
        list_all_waterquality_process($mysqli);
    }
    


    /*** function definition ***/
    /* list_all_waterquality_process:
     * 		list all water quality data
     * param:
     * 		mysqli: database object
     */

    function list_all_waterquality_process($mysqli) : void{
        /* select all data from database */
        $sql = "SELECT * FROM waterquality order by id desc";
        $result = $mysqli->query($sql);

        /* show result */
        show_waterquality_result($result);

        /* store query into session */
        utility_session_insert(CACHE_QUERY, $sql);
        
        $mysqli->close();
    }


    /* search_waterquality_process:
     * 		list searched water quality data
     * param:
     * 		mysqli: database object
     */

    function search_waterquality_process($mysqli) : void{
        /* fetch post input data */
        $date = $_POST["date"];
        $tank = isset($_POST["tank_select"]) ? $_POST["tank_select"] : null;
        $sort_key = isset($_POST["sort_select"]) ? $_POST["sort_select"] : null;
        $sort_order = isset($_POST["order_select"]) ? $_POST["order_select"] : null;

        /* concatenate sql where clause or set default value if not specified */
        if(empty($date)){
            $date = "true";
        }
        else{
            $date = "Date = " . "'{$date}'";
        }
        if(is_null($tank)){
            $tank = "true";
        }
        else{
            $tank = "TankID = " . "'{$tank}'";
        }
        if(is_null($sort_key)){
            $sort_key = "id";
        }
        if(is_null($sort_order)){
            $sort_order = "DESC";
        }
        
        /* search data from database */
        $sql = "SELECT * FROM waterquality WHERE {$date} AND {$tank} ORDER BY {$sort_key} {$sort_order}";
        $result = $mysqli->query($sql);

        /* show result */
        show_waterquality_result($result);

        /* store query into session */
        utility_session_insert(CACHE_QUERY, $sql);
        
        $mysqli->close();
    }


    /* show_waterquality_result:
     *      list sql select query result
     * param:
     *      result: sql select query result
     */

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
    }
    
    ?>
    <!--//Data table-->


    <!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
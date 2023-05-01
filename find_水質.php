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

    <style>
        /* span:target */
        #M1:target,
        #M2:target{
        border: solid 1px red;
        }
        /*頁籤變換*/
        #M1:target ~ #tab > ul li a[href$="#M1"],
        #M2:target ~ #tab > ul li a[href$="#M2"]{
            border: solid 1px black;
        }

        /*頁籤內容顯示*/
        #M1:target ~ #tab > div.tab-content-1,
        #M2:target ~ #tab > div.tab-content-2{
            border: solid 1px black;
        }

        #tab{
        position: relative;
        left: 50%;
        transform: translate(-50%, 0%);
        width: auto;
        background: gray;
        border: solid 1px #333;
        }
        /* 頁籤ul */
        #tab>ul{
        overflow: hidden;
        margin: 0;
        padding: 10px 20px 0 20px;
        }
        #tab>ul>li{
        list-style-type: none;
        }
        #tab>ul>li>a{
        border: #333;
        text-decoration: none;
        font-size: 13px;
        color: white;
        float: left;
        padding: 10px;
        margin-left: 5px;
        }

        /*頁籤div內容*/
        #tab>div {
        border: #333;
        clear:both;
        padding:0 15px;
        height:0;
        overflow:hidden;
        visibility:hidden;
        -webkit-transition:all .4s ease-in-out;
        -moz-transition:all .4s ease-in-out;
        -ms-transition:all .4s ease-in-out;
        -o-transition:all .4s ease-in-out;
        transition:all .4s ease-in-out;
        }

        /* span:target */
        #M1:target,
        #M2:target{
        border: solid 1px red;
        }

        /*第一筆的底色*/
        span:target ~ #tab > ul li:first-child a {
            background: gray;
            color: #fff;
        }
        span:target ~ #tab > div:first-of-type {
        visibility:hidden;
        height:0;
        padding:0 15px;
        }

        /*頁籤變換&第一筆*/
        span ~ #tab > ul li:first-child a,
        #M1:target ~ #tab > ul li a[href$="#M1"],
        #M2:target ~ #tab > ul li a[href$="#M2"]{
            background: white ;
            color: #333 ;
        }
        
        /*頁籤內容顯示&第一筆*/
        span ~ #tab > div:first-of-type,
        #M1:target ~ #tab > div.tab-content-1,
        #M2:target ~ #tab > div.tab-content-2{
        border: solid 1px black;
        visibility:visible;
        height:auto;
        width: auto;
        background: #fff;
        }
    </style>
    <!-- table style -->

        <!-- table -->
        <div>
        <span id="M1"></span>
        <span id="M2"></span>
        <div id="tab">
        <!– 頁籤按鈕 –>
        <ul>
        <li><a href="#M1">查詢單天資料</a></li>
        <li><a href="#M2">繪製資料圖表</a></li>
        </ul>
        <!– 頁籤的內容區塊 –>
        <div class="tab-content-1"><p>
            <section>
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
                            <div> 起始日期 </div>
                            <div class="input-group">
                                <?php 
                                    utility_date("start_date", "起始日期");
                                ?>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div> 結束日期 </div>
                            <div class="input-group">
                                <?php 
                                    utility_date("end_date", "結束日期");
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 65px">
                        <div style = "width: 1%"> </div>
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
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 10px"> </div>

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

                    <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
                </form>
                <!--//Search form-->
            </section>

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
                //utility_session_insert("chart_option", null);
                
                //$mysqli->close();
            }


            /* search_waterquality_process:
            * 		list searched water quality data
            * param:
            * 		mysqli: database object
            */

            function search_waterquality_process($mysqli) : void{
                /* fetch post input data */
                //$date = $_POST["date"];
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
                $tank = isset($_POST["tank_select"]) ? $_POST["tank_select"] : null;
                $sort_key = isset($_POST["sort_select"]) ? $_POST["sort_select"] : null;
                $sort_order = isset($_POST["order_select"]) ? $_POST["order_select"] : null;
                //$chart_option = isset($_POST["chart_select"]) ? $_POST["chart_select"] : null;

                /* concatenate sql where clause or set default value if not specified */
                /*
                if(empty($date)){
                    $date = "true";
                }
                else{
                    $date = "Date = " . "'{$date}'";
                }*/
                if(empty($start_date)){
                    $start_date = "true";
                }
                else{
                    $start_date = str_replace('-', '', $start_date);
                    $start_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) >= {$start_date}";
                }
                if(empty($end_date)){
                    $end_date = "true";
                }
                else{
                    $end_date = str_replace('-', '', $end_date);
                    $end_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) <= {$end_date}";
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
                //$sql = "SELECT * FROM waterquality WHERE {$date} AND {$tank} ORDER BY {$sort_key} {$sort_order}";
                $sql = "SELECT * FROM waterquality WHERE {$start_date} AND {$end_date} AND {$tank} ORDER BY {$sort_key} {$sort_order}";
                $result = $mysqli->query($sql);

                /* show result */
                show_waterquality_result($result);

                /* store query into session */
                utility_session_insert(CACHE_QUERY, $sql);
                //utility_session_insert("chart_option", $chart_option);
                
                //$mysqli->close();
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

            ?>
            <!--//Data table-->

            
        </p></div>

        <div class="tab-content-2"><p>
            <section>
                <!--Search form-->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
                    <?php require_once "utility.php"; ?>

                    <!-- 2/18 修改之UI -->
                    <!-- 4/10 radio button -->
                    <div class="form-inline" style = "width: 100% ; height: 65px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div> 起始日期 </div>
                            <div class="input-group">
                                <?php 
                                    utility_date("start_date", "起始日期");
                                ?>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div> 結束日期 </div>
                            <div class="input-group">
                                <?php 
                                    utility_date("end_date", "結束日期");
                                ?>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>
                    <div class="form-inline" style = "width: 100% ; height: 65px">
                        <div style = "width: 1%"> </div>
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
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: auto">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 95%">
                            <div> 繪製項目 </div>
                            <div class="input-group">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="NH4_N" type="checkbox" class="custom-control-input" value="NH4_N">
                                    <label for="NH4_N" class="custom-control-label">&emsp;&emsp;NH4_N</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="NO2" type="checkbox" class="custom-control-input" value="NO2">
                                    <label for="NO2" class="custom-control-label">&emsp;&emsp;NO2</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="NO3" type="checkbox" class="custom-control-input" value="NO3">
                                    <label for="NO3" class="custom-control-label">&emsp;&emsp;NO3</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="Salinity_1" type="checkbox" class="custom-control-input" value="Salinity_1">
                                    <label for="Salinity_1" class="custom-control-label">&emsp;&emsp;Salinity_1</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="Salinity_2" type="checkbox" class="custom-control-input" value="Salinity_2">
                                    <label for="Salinity_2" class="custom-control-label">&emsp;&emsp;Salinity_2</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="Salinity_3" type="checkbox" class="custom-control-input" value="Salinity_3">
                                    <label for="Salinity_3" class="custom-control-label">&emsp;&emsp;Salinity_3</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="pH_1" type="checkbox" class="custom-control-input" value="pH_1">
                                    <label for="pH_1" class="custom-control-label">&emsp;&emsp;pH_1</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="pH_2" type="checkbox" class="custom-control-input" value="pH_2">
                                    <label for="pH_2" class="custom-control-label">&emsp;&emsp;pH_2</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="pH_3" type="checkbox" class="custom-control-input" value="pH_3">
                                    <label for="pH_3" class="custom-control-label">&emsp;&emsp;pH_3</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="O2_1" type="checkbox" class="custom-control-input" value="O2_1">
                                    <label for="O2_1" class="custom-control-label">&emsp;&emsp;O2_1</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="O2_2" type="checkbox" class="custom-control-input" value="O2_2">
                                    <label for="O2_2" class="custom-control-label">&emsp;&emsp;O2_2</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="O2_3" type="checkbox" class="custom-control-input" value="O2_3">
                                    <label for="O2_3" class="custom-control-label">&emsp;&emsp;O2_3</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="ORP_1" type="checkbox" class="custom-control-input" value="ORP_1">
                                    <label for="ORP_1" class="custom-control-label">&emsp;&emsp;ORP_1</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="ORP_2" type="checkbox" class="custom-control-input" value="ORP_2">
                                    <label for="ORP_2" class="custom-control-label">&emsp;&emsp;ORP_2</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="ORP_3" type="checkbox" class="custom-control-input" value="ORP_3">
                                    <label for="ORP_3" class="custom-control-label">&emsp;&emsp;ORP_3</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="WTemp_1" type="checkbox" class="custom-control-input" value="WTemp_1">
                                    <label for="WTemp_1" class="custom-control-label">&emsp;&emsp;WTemp_1</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="WTemp_2" type="checkbox" class="custom-control-input" value="WTemp_2">
                                    <label for="WTemp_2" class="custom-control-label">&emsp;&emsp;WTemp_2</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="WTemp_3" type="checkbox" class="custom-control-input" value="WTemp_3">
                                    <label for="WTemp_3" class="custom-control-label">&emsp;&emsp;WTemp_3</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="Alkalinity" type="checkbox" class="custom-control-input" value="Alkalinity">
                                    <label for="Alkalinity" class="custom-control-label">&emsp;&emsp;Alkalinity</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="TCBS" type="checkbox" class="custom-control-input" value="TCBS">
                                    <label for="TCBS" class="custom-control-label">&emsp;&emsp;TCBS</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="TCBS綠菌" type="checkbox" class="custom-control-input" value="TCBS綠菌">
                                    <label for="TCBS綠菌" class="custom-control-label">&emsp;&emsp;TCBS綠菌</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="Marine" type="checkbox" class="custom-control-input" value="Marine">
                                    <label for="Marine" class="custom-control-label">&emsp;&emsp;Marine</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="螢光菌TCBS" type="checkbox" class="custom-control-input" value="螢光菌TCBS">
                                    <label for="螢光菌TCBS" class="custom-control-label">&emsp;&emsp;螢光菌TCBS</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input name="chart_select[]" id="螢光菌Marine" type="checkbox" class="custom-control-input" value="螢光菌Marine">
                                    <label for="螢光菌Marine" class="custom-control-label">&emsp;&emsp;螢光菌Marine</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
                    <div class="form-inline" style = "width: 100% ; height: 40px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <?php
                                utility_button("submit", "繪製");
                            ?>
                        </div>
                        <!--
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <?php
                                utility_button_onclick("chart.php", "繪製");
                            ?>
                        </div>
                        -->
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
                </form>
                <!--//Search form-->
            </section>
            <?php
            
            require_once "utility.php";
            
            define("DRAW_QUERY", "draw_waterquality_query");

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                draw_waterquality_process();
            }
            
            function draw_waterquality_process() : void{
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
                $tank = isset($_POST["tank_select"]) ? $_POST["tank_select"] : null;

                // $chart_option = isset($_POST["chart_select"]) ? $_POST["chart_select"] : null;
                $chart_option = array() ;
                foreach($_POST["chart_select"] as $selected) {
                    array_push($chart_option , $selected) ;
                }
                print_r($chart_option);
                
                if(empty($start_date)){
                    $start_date = "true";
                }
                else{
                    $start_date = str_replace('-', '', $start_date);
                    $start_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) >= {$start_date}";
                }
                if(empty($end_date)){
                    $end_date = "true";
                }
                else{
                    $end_date = str_replace('-', '', $end_date);
                    $end_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) <= {$end_date}";
                }
                if(is_null($tank)){
                    utility_window_msg_back("No tank option!!!");
                    return;
                }
                else{
                    $tank = "TankID = " . "'{$tank}'";
                }

                if(count($chart_option) == 0){
                    utility_window_msg_back("No chart option!!!");
                    return;
                }
                $sql = "SELECT * FROM waterquality WHERE {$start_date} AND {$end_date} AND {$tank}";
                utility_session_insert(DRAW_QUERY, $sql);
                utility_session_insert("chart_option", $chart_option);
                
                echo "<script type='text/javascript'>";
		        echo "window.location.href='chart'";
	            echo "</script>";
            }
            ?>
        </p></div>
    </div>

    <!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
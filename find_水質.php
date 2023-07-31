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
</head>

<body>
    <!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

    <!-- table -->
    <div class="tab-content-1"><p>
        <section>
            <!--Search form-->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" id = "find_form">
                <?php require_once "utility.php"; ?>

                <!-- 2/18 修改之UI -->
	            <hr style="border-width: 1px; border-color: black;">
                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 48%">
                        <div> 排序項目1 </div>
                        <div class="input-group">
                            <?php 
                                $sort_option_array = array();
                                $sort_option_array["index"] = "id";
                                $sort_option_array["日期"] = "Date";
                                $sort_option_array["TankID"] = "TankID";
                                utility_selectbox("sort_select1", "排序項目1", $sort_option_array);
                            ?>
                        </div>
                    </div>
                    <div style = "width: 2%"> </div>
                    <div style = "width: 48%">
                        <div> 排序方式1 </div>
                        <div class="input-group">
                            <?php 
                                $order_option_array = array();
                                $order_option_array["升序"] = "ASC";
                                $order_option_array["降序"] = "DESC";
                                utility_selectbox("order_select1", "排序方式1", $order_option_array);
                            ?>
                        </div>
                    </div>
                    <div style = "width: 1%"> </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 48%">
                        <div> 排序項目2 </div>
                        <div class="input-group">
                            <?php 
                                $sort_option_array = array();
                                $sort_option_array["index"] = "id";
                                $sort_option_array["日期"] = "Date";
                                $sort_option_array["TankID"] = "TankID";
                                utility_selectbox("sort_select2", "排序項目2", $sort_option_array);
                            ?>
                        </div>
                    </div>
                    <div style = "width: 2%"> </div>
                    <div style = "width: 48%">
                        <div> 排序方式2 </div>
                        <div class="input-group">
                            <?php 
                                $order_option_array = array();
                                $order_option_array["升序"] = "ASC";
                                $order_option_array["降序"] = "DESC";
                                utility_selectbox("order_select2", "排序方式2", $order_option_array);
                            ?>
                        </div>
                    </div>
                    <div style = "width: 1%"> </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 48%">
                        <div> 排序項目3 </div>
                        <div class="input-group">
                            <?php 
                                $sort_option_array = array();
                                $sort_option_array["index"] = "id";
                                $sort_option_array["日期"] = "Date";
                                $sort_option_array["TankID"] = "TankID";
                                utility_selectbox("sort_select3", "排序項目3", $sort_option_array);
                            ?>
                        </div>
                    </div>
                    <div style = "width: 2%"> </div>
                    <div style = "width: 48%">
                        <div> 排序方式3 </div>
                        <div class="input-group">
                            <?php 
                                $order_option_array = array();
                                $order_option_array["升序"] = "ASC";
                                $order_option_array["降序"] = "DESC";
                                utility_selectbox("order_select3", "排序方式3", $order_option_array);
                            ?>
                        </div>
                    </div>
                    <div style = "width: 1%"> </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <button type="button" class="btn btn-primary" onclick="continue_tankid(this)">繼續填寫查詢項目</button>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 5px">
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
                <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
            </form>
            <!--//Search form-->
        </section>

        <script> document.write('<script type="text/javascript" src="water_check.js"></'+'script>'); </script>
        <script>
            function continue_tankid(button) {// append 接下來的元素
                var myForm = $("#find_form")[0];
                const formInlineElement = button.parentNode;
                formInlineElement.insertAdjacentHTML(
                    'afterend',
                    append_tankid()
                );
                formInlineElement.remove();
            }

            function continue_time(button) {// append 接下來的元素
                var myForm = $("#find_form")[0];
                const formInlineElement = button.parentNode;
                formInlineElement.insertAdjacentHTML(
                    'afterend',
                    append_time()
                );
                formInlineElement.remove();
            }

            function continue_ovary(button) {// append 接下來的元素
                var myForm = $("#find_form")[0];
                const formInlineElement = button.parentNode;
                formInlineElement.insertAdjacentHTML(
                    'afterend',
                    append_ovary()
                );
                formInlineElement.remove();
            }

            function continue_time(button) {// append 接下來的元素
                var myForm = $("#find_form")[0];
                const formInlineElement = button.parentNode;
                formInlineElement.insertAdjacentHTML(
                    'afterend',
                    append_time()
                );
                formInlineElement.remove();
            }
        </script>

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
            $start_date = isset($_POST["start_date"]) ? $_POST["start_date"] : "" ;
            $end_date = isset($_POST["end_date"]) ? $_POST["end_date"] : "" ;
            $tank = isset($_POST["tank_select"]) ? $_POST["tank_select"] : null;
            $sort_key1 = isset($_POST["sort_select1"]) ? $_POST["sort_select1"] : null;
            $sort_order1 = isset($_POST["order_select1"]) ? $_POST["order_select1"] : null;
            $sort_key2 = isset($_POST["sort_select2"]) ? $_POST["sort_select2"] : null;
            $sort_order2 = isset($_POST["order_select2"]) ? $_POST["order_select2"] : null;
            $sort_key3 = isset($_POST["sort_select3"]) ? $_POST["sort_select3"] : null;
            $sort_order3 = isset($_POST["order_select3"]) ? $_POST["order_select3"] : null;
            
            $and_or_1 = isset($_POST["and_or_1"]) ? $_POST["and_or_1"] : "and" ;

            /* concatenate sql where clause or set default value if not specified */
            if(empty($start_date)){
                $start_date = ($and_or_1 == "and") ? "true" : "false" ;
            }
            else{
                $start_date = str_replace('-', '', $start_date);
                $start_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) >= {$start_date}";
            }
            if(empty($end_date)){
                $end_date = ($and_or_1 == "and" || ($start_date != "true" && $start_date != "false")) ? "true" : "false" ;
            }
            else{
                $end_date = str_replace('-', '', $end_date);
                $end_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) <= {$end_date}";
            }
            if(is_null($tank)){
                $tank = ($and_or_1 == "and") ? "true" : "false" ;
            }
            else{
                $tank = "TankID = " . "'{$tank}'";
            }
            if(is_null($sort_key1)){
                $sort_key1 = "id";
            }
            if(is_null($sort_order1)){
                $sort_order1 = "DESC";
            }
            if(is_null($sort_key2)){
                $sort_key2 = "id";
            }
            if(is_null($sort_order2)){
                $sort_order2 = "DESC";
            }
            if(is_null($sort_key3)){
                $sort_key3 = "id";
            }
            if(is_null($sort_order3)){
                $sort_order3 = "DESC";
            }

            $and_or_1 = strtoupper($and_or_1) ;
            
            /* search data from database */
            //$sql = "SELECT * FROM waterquality WHERE {$date} AND {$tank} ORDER BY {$sort_key} {$sort_order}";
            $sql = "SELECT * FROM waterquality WHERE {$tank} {$and_or_1} {$start_date} AND {$end_date} ORDER BY {$sort_key1} {$sort_order1}, {$sort_key2} {$sort_order2}, {$sort_key3} {$sort_order3}" ;
            // echo $sql ;
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
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
    <title>查詢 - 餵食</title>
    <!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
    <!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

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
                        $sort_option_array["Tank"] = "Tank";
                        $sort_option_array["蝦缸類別"] = "shrimp";
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
                        $sort_option_array["Tank"] = "Tank";
                        $sort_option_array["蝦缸類別"] = "shrimp";
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
                        $sort_option_array["Tank"] = "Tank";
                        $sort_option_array["蝦缸類別"] = "shrimp";
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
            <div style = "width: 48%">
                <div> 排序項目2 </div>
                <div class="input-group">
                    <?php 
                        $sort_option_array = array();
                        $sort_option_array["index"] = "id";
                        $sort_option_array["日期"] = "Date";
                        $sort_option_array["Tank"] = "Tank";
                        $sort_option_array["蝦缸類別"] = "shrimp";
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
                        $sort_option_array["Tank"] = "Tank";
                        $sort_option_array["蝦缸類別"] = "shrimp";
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
            <div style = "width: 48%">
                <div> TankID </div>
                <div class="input-group">
                    <select id="tank_select" name="tank_select" class="custom-select">
                        <option value="none" selected disabled hidden></option>
                        <option value="M1">M1</option>
                        <option value="M2">M2</option>
                        <option value="M3">M3</option>
                        <option value="M4">M4</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style="width: 100%; height: 65px">
            <div style="width: 1%"></div>
            <div style="width: 48%">
                <div>查詢方式("及" or "或")</div>
                <div class="input-group">
                    <select class='form-control' name="and_or_1" id="and_or_1">
                        <option value="and">及</option>
                        <option value="or">或</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 蝦缸類別 </div>
                <div class="input-group">
                    <select id="shrimp_select" name="shrimp_select" class="custom-select">
                        <option value="none" selected disabled hidden></option>
                        <option value="公蝦缸">公蝦缸</option>
                        <option value="母蝦缸">母蝦缸</option>
                        <option value="交配缸">交配缸</option>
                        <option value="休養缸">休養缸</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style="width: 100%; height: 65px">
            <div style="width: 1%"></div>
            <div style="width: 48%">
                <div>查詢方式("及" or "或")</div>
                <div class="input-group">
                    <select class='form-control' name="and_or_2" id="and_or_2">
                        <option value="and">及</option>
                        <option value="or">或</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 起始日期 </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='start_date' id='start_date'>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 結束日期 </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='end_date' id='end_date'>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 25px">
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
                    utility_button_onclick("export_feed.php", "匯出");
                ?>
            </div>
        </div>
        <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
    </form>
    <!--//Search form-->

    <script> document.write('<script type="text/javascript" src="feed_check.js"></'+'script>'); </script>
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

        function continue_shrimp(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_shrimp()
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
    <section>
        <?php
        define("CACHE_QUERY", "search_feed_query"); 
        
        require_once "config.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            search_feed_process($mysqli);
        }
        else{
            list_all_feed_process($mysqli);
        }


        /*** function definition ***/
        /* list_all_feed_process:
         * 		list all feed data
         * param:
         * 		mysqli: database object
         */

        function list_all_feed_process($mysqli) : void{
            /* select all data from database */
            $sql = "SELECT * FROM feed order by id desc";
            $result = $mysqli->query($sql);

            /* show result */
            show_feed_result($result);

            /* store query into session */
            utility_session_insert(CACHE_QUERY, $sql);
            
            $mysqli->close();
        }


        /* search_feed_process:
         * 		list searched feed data
         * param:
         * 		mysqli: database object
         */

        function search_feed_process($mysqli) : void{
            /* fetch post input data */
            //$date = $_POST["date"];
            $start_date = isset($_POST["start_date"]) ? $_POST["start_date"] : "" ;
            $end_date = isset($_POST["end_date"]) ? $_POST["end_date"] : "" ;
            $tank = isset($_POST["tank_select"]) ? $_POST["tank_select"] : null;
            $shrimp = isset($_POST["shrimp_select"]) ? $_POST["shrimp_select"] : null;
            $sort_key1 = isset($_POST["sort_select1"]) ? $_POST["sort_select1"] : null;
            $sort_order1 = isset($_POST["order_select1"]) ? $_POST["order_select1"] : null;
            $sort_key2 = isset($_POST["sort_select2"]) ? $_POST["sort_select2"] : null;
            $sort_order2 = isset($_POST["order_select2"]) ? $_POST["order_select2"] : null;
            $sort_key3 = isset($_POST["sort_select3"]) ? $_POST["sort_select3"] : null;
            $sort_order3 = isset($_POST["order_select3"]) ? $_POST["order_select3"] : null;

            $and_or_1 = isset($_POST["and_or_1"]) ? $_POST["and_or_1"] : "and" ;
            $and_or_2 = isset($_POST["and_or_2"]) ? $_POST["and_or_2"] : "and" ;

            /* concatenate sql where clause or set default value if not specified */
            if(is_null($tank)){
                $tank = ($and_or_1 == "and") ? "true" : "false" ;
            }
            else{
                $tank = "Tank = " . "'{$tank}'";
            }
            if(is_null($shrimp)){
                $shrimp = ($and_or_1 == "and" || $and_or_2 == "and") ? "true" : "false" ;
            }
            else{
                $shrimp = "shrimp = " . "'{$shrimp}'";
            }
            if(empty($start_date)){
                $start_date = ($and_or_2 == "and") ? "true" : "false" ;
            }
            else{
                $start_date = str_replace('-', '', $start_date);
                $start_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) >= {$start_date}";
            }
            if(empty($end_date)){
                $end_date = ($and_or_2 == "and" || ($start_date != "true" && $start_date != "false")) ? "true" : "false" ;
            }
            else{
                $end_date = str_replace('-', '', $end_date);
                $end_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) <= {$end_date}";
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
            $and_or_2 = strtoupper($and_or_2) ;

            /* search data from database */
            //$sql = "SELECT * FROM feed WHERE {$date} AND {$tank} AND {$shrimp} ORDER BY {$sort_key} {$sort_order}";
            $sql = "SELECT * FROM feed WHERE {$tank} {$and_or_1} {$shrimp} {$and_or_2} {$start_date} AND {$end_date} ORDER BY {$sort_key1} {$sort_order1}, {$sort_key2} {$sort_order2}, {$sort_key3} {$sort_order3}";
            // echo $sql ;
            $result = $mysqli->query($sql);

            /* show result */
            show_feed_result($result);

            /* store query into session */
            utility_session_insert(CACHE_QUERY, $sql);
            
            $mysqli->close();
        }


        

        /* show_feed_result:
         *      list sql select query result
         * param:
         *      result: sql select query result
         */

        function show_feed_result($result) : void{
            echo "<div style = \"width : 1% ; display : inline-block\"> </div>" ;
            echo "資料表有 " . $result->num_rows . " 筆資料<br>";

            // --- 顯示資料 --- //
            echo "<table style='text-align:center;' align='center' width='90%'  border='1px solid gray' text-align='center'>";

            echo "<thead>
                <th>Index</th>
                <th>日期</th>
                <th>Tank</th>
                <th>Feeding Ratio</th>
                <th>紙本資料</th>
                </thead><tbody>";
            // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";


            while ($row = $result->fetch_assoc())
            {
                if(strlen($row["image"]) > 0) printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>", $row["id"], $row["Date"], $row["Tank"], $row["Feeding_Ratio"], $row["image"]);
                else printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> </td>", $row["id"], $row["Date"], $row["Tank"], $row["Feeding_Ratio"], $row["image"]);
                if($row["Date"] < "2023-07-01") {
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
                    '&9_species='. $row["9_species"].
                    '&9_weight='. $row["9_weight"].
                    '&9_remain='. $row["9_remain"].
                    '&9_eating='. $row["9_eating"].
                    '&11_species='. $row["11_species"].
                    '&11_weight='. $row["11_weight"].
                    '&11_remain='. $row["11_remain"].
                    '&11_eating='. $row["11_eating"].
                    '&14_species='. $row["14_species"].
                    '&14_weight='. $row["14_weight"].
                    '&14_remain='. $row["14_remain"].
                    '&14_eating='. $row["14_eating"].
                    '&16_species='. $row["16_species"].
                    '&16_weight='. $row["16_weight"].
                    '&16_remain='. $row["16_remain"].
                    '&16_eating='. $row["16_eating"].
                    '&19_species='. $row["19_species"].
                    '&19_weight='. $row["19_weight"].
                    '&19_remain='. $row["19_remain"].
                    '&19_eating='. $row["19_eating"].
                    '&23_species='. $row["23_species"].
                    '&23_weight='. $row["23_weight"].
                    '&23_remain='. $row["23_remain"].
                    '&23_eating='. $row["23_eating"].
                    '&3_species='. $row["3_species"].
                    '&3_weight='. $row["3_weight"].
                    '&3_remain='. $row["3_remain"].
                    '&3_eating='. $row["3_eating"].
                    '&Feeding_Ratio='.$row["Feeding_Ratio"].
                    '&Observation='.$row["Observation"].
                    '&image=' . $row["image"].
                    '">詳細</a></td>
                    <td></td>
                    <td><a href="delete?id=' . $row['id'] . '&type=feed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
                }
                else {
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
                    '&9_species='. $row["9_species"].
                    '&9_weight='. $row["9_weight"].
                    '&9_remain='. $row["9_remain"].
                    '&9_eating='. $row["9_eating"].
                    '&11_species='. $row["11_species"].
                    '&11_weight='. $row["11_weight"].
                    '&11_remain='. $row["11_remain"].
                    '&11_eating='. $row["11_eating"].
                    '&14_species='. $row["14_species"].
                    '&14_weight='. $row["14_weight"].
                    '&14_remain='. $row["14_remain"].
                    '&14_eating='. $row["14_eating"].
                    '&16_species='. $row["16_species"].
                    '&16_weight='. $row["16_weight"].
                    '&16_remain='. $row["16_remain"].
                    '&16_eating='. $row["16_eating"].
                    '&19_species='. $row["19_species"].
                    '&19_weight='. $row["19_weight"].
                    '&19_remain='. $row["19_remain"].
                    '&19_eating='. $row["19_eating"].
                    '&23_species='. $row["23_species"].
                    '&23_weight='. $row["23_weight"].
                    '&23_remain='. $row["23_remain"].
                    '&23_eating='. $row["23_eating"].
                    '&3_species='. $row["3_species"].
                    '&3_weight='. $row["3_weight"].
                    '&3_remain='. $row["3_remain"].
                    '&3_eating='. $row["3_eating"].
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
                    '&9_species='. $row["9_species"].
                    '&9_weight='. $row["9_weight"].
                    '&9_remain='. $row["9_remain"].
                    '&9_eating='. $row["9_eating"].
                    '&11_species='. $row["11_species"].
                    '&11_weight='. $row["11_weight"].
                    '&11_remain='. $row["11_remain"].
                    '&11_eating='. $row["11_eating"].
                    '&14_species='. $row["14_species"].
                    '&14_weight='. $row["14_weight"].
                    '&14_remain='. $row["14_remain"].
                    '&14_eating='. $row["14_eating"].
                    '&16_species='. $row["16_species"].
                    '&16_weight='. $row["16_weight"].
                    '&16_remain='. $row["16_remain"].
                    '&16_eating='. $row["16_eating"].
                    '&19_species='. $row["19_species"].
                    '&19_weight='. $row["19_weight"].
                    '&19_remain='. $row["19_remain"].
                    '&19_eating='. $row["19_eating"].
                    '&23_species='. $row["23_species"].
                    '&23_weight='. $row["23_weight"].
                    '&23_remain='. $row["23_remain"].
                    '&23_eating='. $row["23_eating"].
                    '&3_species='. $row["3_species"].
                    '&3_weight='. $row["3_weight"].
                    '&3_remain='. $row["3_remain"].
                    '&3_eating='. $row["3_eating"].
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

        ?>
    </section>
    <!--//Data table-->

    <!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
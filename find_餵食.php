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
                <div> 排序項目 </div>
                <div class="input-group">
                    <?php 
                        $sort_option_array = array();
                        $sort_option_array["index"] = "id";
                        $sort_option_array["日期"] = "Date";
                        $sort_option_array["Tank"] = "Tank";
                        $sort_option_array["蝦缸類別"] = "shrimp";
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
                    // 放匯出功能做好時的匯出鍵
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
            $sort_key = isset($_POST["sort_select"]) ? $_POST["sort_select"] : null;
            $sort_order = isset($_POST["order_select"]) ? $_POST["order_select"] : null;

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
            if(is_null($sort_key)){
                $sort_key = "id";
            }
            if(is_null($sort_order)){
                $sort_order = "DESC";
            }

            $and_or_1 = strtoupper($and_or_1) ;
            $and_or_2 = strtoupper($and_or_2) ;

            /* search data from database */
            //$sql = "SELECT * FROM feed WHERE {$date} AND {$tank} AND {$shrimp} ORDER BY {$sort_key} {$sort_order}";
            $sql = "SELECT * FROM feed WHERE {$tank} {$and_or_1} {$shrimp} {$and_or_2} {$start_date} AND {$end_date} ORDER BY {$sort_key} {$sort_order}";
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
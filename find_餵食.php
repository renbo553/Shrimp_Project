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
        <div class="table">
            <?php 
                require_once "utility.php";
                $sort_option_array = array();
                $sort_option_array["index"] = "id";
                $sort_option_array["日期"] = "Date";
                $sort_option_array["Tank"] = "Tank";
                $sort_option_array["蝦"] = "shrimp";
                utility_input_selectbox("sort_select", "排序項目", $sort_option_array);
                $order_option_array = array();
                $order_option_array["升序"] = "ASC";
                $order_option_array["降序"] = "DESC";
                utility_input_selectbox("order_select", "排序方式", $order_option_array);
                utility_input_date("date", "日期");
                $tank_option_array = array();
                $tank_option_array["M1"] = "M1";
                $tank_option_array["M2"] = "M2";
                $tank_option_array["M3"] = "M3";
                $tank_option_array["M4"] = "M4";
                utility_input_selectbox("tank_select", "Tank", $tank_option_array);
                $shrimp_option_array = array();
                $shrimp_option_array["公蝦缸"] = "公蝦缸";
                $shrimp_option_array["母蝦缸"] = "母蝦缸";
                $shrimp_option_array["交配缸"] = "交配缸";
                $shrimp_option_array["休養缸"] = "休養缸";
                $shrimp_option_array["公蝦+母蝦缸"] = "公蝦+母蝦缸";
                utility_input_selectbox("shrimp_select", "蝦", $shrimp_option_array);
                utility_button("submit", "查詢");
                utility_button_onclick("export_feed.php", "匯出");
            ?>
        </div>
    </form>
    <!--//Search form-->

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
            $date = $_POST["date"];
            $tank = isset($_POST["tank_select"]) ? $_POST["tank_select"] : null;
            $shrimp = isset($_POST["shrimp_select"]) ? $_POST["shrimp_select"] : null;
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
                $tank = "Tank = " . "'{$tank}'";
            }
            if(is_null($shrimp)){
                $shrimp = "true";
            }
            else{
                $shrimp = "shrimp = " . "'{$shrimp}'";
            }
            if(is_null($sort_key)){
                $sort_key = "id";
            }
            if(is_null($sort_order)){
                $sort_order = "DESC";
            }

            /* search data from database */
            $sql = "SELECT * FROM feed WHERE {$date} AND {$tank} AND {$shrimp} ORDER BY {$sort_key} {$sort_order}";
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
            echo "資料表有 " . $result->num_rows . " 筆資料<br>";

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


            while ($row = $result->fetch_assoc())
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
<?php
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["userid"]) || $_SESSION["authority"] > 1)
        header("location:home");
};
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>查詢 - 卵巢成熟</title>
    <!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
    
    <style>
        tbody tr:hover {
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
                        $sort_option_array["眼標"] = "眼標";
                        $sort_option_array["日期"] = "Date";
                        $sort_option_array["階段"] = "Stage";
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
                <div> 眼標 </div>
                <div class="input-group">
                    <?php 
                        utility_textbox("eyetag_text", "眼標");
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 起始日期 </div>
                <div class="input-group">
                    <?php
                        utility_date("start_date", "起始日期");
                    ?>
                </div>
            </div>
            <div style = "width: 1%"> </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 卵巢階段 </div>
                <div class="input-group">
                    <?php 
                        $stage_option_array = array();
                        $stage_option_array["0"] = "0";
                        $stage_option_array["0-1"] = "0-Ⅰ";
                        $stage_option_array["1"] = "Ⅰ";
                        $stage_option_array["1-2"] = "Ⅰ-Ⅱ";
                        $stage_option_array["2"] = "Ⅱ";
                        $stage_option_array["2-3"] = "Ⅱ-Ⅲ";
                        $stage_option_array["3"] = "Ⅲ";
                        $stage_option_array["脫殼"] = "脫殼";
                        $stage_option_array["受精"] = "受精";
                        $stage_option_array["生產"] = "生產";
                        $stage_option_array["死亡"] = "死亡";
                        $stage_option_array["淘汰"] = "淘汰";
                        utility_selectbox("stage_select", "階段", $stage_option_array);        
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
                    utility_button_onclick("export_ovary.php", "匯出");
                ?>
            </div>
        </div>
    </form>
    <!--//Search form-->


    <!--Data table-->
    <?php
    
    define("CACHE_QUERY", "search_ovary_query");

    require_once "config.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        search_ovary_process($mysqli);
    }
    else{
        list_all_ovary_process($mysqli);
    }

    /*** function definition ***/
    /* find_all_ovary_process:
     * 		list all ovary data
     * param:
     * 		mysqli: database object
     */

    function list_all_ovary_process($mysqli) : void{
        /* select all data from database */
        $sql = "SELECT * FROM ovary ORDER BY id desc";
        $result = $mysqli->query($sql);

        /* show result */
        show_ovary_result($result);

        /* store query into session */
        utility_session_insert(CACHE_QUERY, $sql);

        $mysqli->close();
    }


    /* search_ovary_process:
     * 		list searched ovary data
     * param:
     * 		mysqli: database object
     */

    function search_ovary_process($mysqli) : void{
        /* fetch post input data */
        $eyetag = trim($_POST["eyetag_text"]);
        //$date = $_POST["date"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $stage = isset($_POST["stage_select"]) ? $_POST["stage_select"] : null;
        $sort_key = isset($_POST["sort_select"]) ? $_POST["sort_select"] : null;
        $sort_order = isset($_POST["order_select"]) ? $_POST["order_select"] : null;
        
        /* concatenate sql where clause or set default value if not specified */
        if(empty($eyetag)){
            $eyetag = "true";
        }
        else{
            $eyetag = "眼標 = " . "'{$eyetag}'";
        }
        /*if(empty($date)){
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
        
        if(is_null($stage)){
            $stage = "true";
        }
        else{
            $stage = "Stage = " . "'{$stage}'";
        }
        if(is_null($sort_key)){
            $sort_key = "id";
        }
        if(is_null($sort_order)){
            $sort_order = "DESC";
        }

        /* search data from database */
        //$sql = "SELECT * FROM ovary WHERE {$eyetag} AND {$date} AND {$stage} ORDER BY {$sort_key} {$sort_order}";
        $sql = "SELECT * FROM ovary WHERE {$eyetag} AND {$start_date} AND {$end_date} AND {$stage} ORDER BY {$sort_key} {$sort_order}";
        $result = $mysqli->query($sql);

        /* show search result */
        show_ovary_result($result);

        /* store query into session */
        utility_session_insert(CACHE_QUERY, $sql);

        $mysqli->close();
    }


    /* show_ovary_result:
     *      list sql select query result
     * param:
     *      result: sql select query result
     */

    function show_ovary_result($result) : void{
        echo "<div style = \"width : 1% ; display : inline-block\"> </div>" ;
        echo "資料表有 " . $result->num_rows . " 筆資料<br>";

        // --- 顯示資料 --- //
        echo "<table style='text-align:center;' align='center' width='90%'  border='1px solid gray' text-align='center'>";
        echo "<thead>
            <th>Index</th>
            <th>眼標</th>
            <th>日期</th>
            <th>階段</th>
            <th>紙本資料</th>
            </thead><tbody>";
        // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

        while($row = $result->fetch_assoc()){
            if(strlen($row["image"]) > 0){
                printf("<tr><td  style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>", $row["id"], $row["眼標"], $row["Date"], $row["Stage"], $row["image"]);
                echo '<td><a href="modify_卵巢?id=' . $row['id'] . ' &eye=' . $row["眼標"] . ' &date=' . $row["Date"] . ' &ovarystate=' . $row["Stage"] . ' &image=' . $row["image"] .'">修改</a></td>
                <td><a href="delete?id=' . $row['id'] . '&type=ovary" onclick="return confirm(\'確定要刪除ID : ' . $row['id'] . ' 嗎?\');">刪除</a></td>';
            }
            else{
                printf("<tr><td  style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td></td>", $row["id"], $row["眼標"], $row["Date"], $row["Stage"]);
                echo '<td><a href="modify_卵巢?id=' . $row['id'] . ' &eye=' . $row["眼標"] . ' &date=' . $row["Date"] . ' &ovarystate=' . $row["Stage"] . ' &image=' . $row["image"] .'">修改</a></td>
                <td><a href="delete?id=' . $row['id'] . '&type=ovary" onclick="return confirm(\'確定要刪除ID : ' . $row['id'] . ' 嗎?\');">刪除</a></td>';
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

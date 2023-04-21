<?php
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["userid"])||$_SESSION["authority"]>1)
      header("shrimp_info:home");
};
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>查詢 - 母種蝦資料</title>
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

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 排序項目 </div>
                <div class="input-group">
                    <?php
                        $sort_option_array = array();
                        $sort_option_array["index"] = "id";
                        $sort_option_array["家族"] = "家族";
                        $sort_option_array["眼標"] = "眼標";
                        $sort_option_array["體重"] = "體重";
                        $sort_option_array["剪眼日期"] = "剪眼日期";
                        $sort_option_array["出生日期"] = "出生日期";
                        $sort_option_array["進蝦日期"] = "進蝦日期";
                        $sort_option_array["tankid"] = "tankid";
                        $sort_option_array["生存狀態"] = "生存狀態";
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
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 查詢方式("及" or "或") </div>
                <div class="input-group">
                    <?php 
                        $and_option_array = array();
                        $and_option_array["及"] = "and";
                        $and_option_array["或"] = "or";
                        utility_selectbox("and_or", "查詢方式", $and_option_array);
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 生存狀態 </div>
                <div class="input-group">
                    <?php
                        $live_option_array = array();
                        $live_option_array["存活"] = "存活";
                        $live_option_array["死亡"] = "死亡";
                        utility_selectbox("live_or_die", "live_or_die", $live_option_array);
                    ?>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 眼標 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("eye", "眼標");    
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> tankid </div>
                <div class="input-group">
                    <?php
                        $tank_option_array = array();
                        $tank_option_array["M1"] = "M1";
                        $tank_option_array["M2"] = "M2";
                        $tank_option_array["M3"] = "M3";
                        $tank_option_array["M4"] = "M4";
                        utility_selectbox("tank_select", "tankid", $tank_option_array);
                    ?>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 家族 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("family", "家族");    
                    ?>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
			<div style = "width: 48%">
                <div> 體重最小值 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("weight_min", "體重最小值");
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 體重最大值 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("weight_max", "體重最大值");
                    ?>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 剪眼日期(起始) </div>
                <div class="input-group">
                    <?php
                        utility_date("cutday_begin", "剪眼日期(起始)");    
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 剪眼日期(結束) </div>
                <div class="input-group">
                    <?php
                        utility_date("cutday_end", "剪眼日期(結束)");
                    ?>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 出生日期(起始) </div>
                <div class="input-group">
                    <?php
                        utility_date("birthday_begin", "出生日期(起始)");    
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 出生日期(結束) </div>
                <div class="input-group">
                    <?php
                        utility_date("birthday_end", "出生日期(結束)");
                    ?>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 進蝦日期(起始) </div>
                <div class="input-group">
                    <?php
                        utility_date("enterday_begin", "進蝦日期(起始)");    
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 進蝦日期(結束) </div>
                <div class="input-group">
                    <?php
                        utility_date("enterday_end", "進蝦日期(結束)");    
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
                    // 未作
                    utility_button_onclick("export_shrimp_info.php", "匯出");
                ?>
            </div>
        </div>
    </form>
    <!--//Search form-->


    <!--Data table-->
    <?php 
    
    define("CACHE_QUERY", "search_shrimp_info_query"); 

    require_once "config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        search_shrimp_info_process($mysqli);
    }
    else{
        list_all_shrimp_info_process($mysqli);
    }


    /*** function definition ***/
    /* list_all_shrimp_info_process:
     * 		list all shrimp_info data
     * param:
     * 		mysqli: database object
     */

    function list_all_shrimp_info_process($mysqli) : void{
        /* select all data from database */
        $sql = "SELECT * FROM shrimp_info ORDER BY id desc";
        $result = $mysqli->query($sql);

        /* show search result */
        show_shrimp_info_result($result);
        
        $mysqli->close();
    }


    /* search_shrimp_info_process:
     * 		list searched shrimp_info data
     * param:
     * 		mysqli: database object
     */

    function search_shrimp_info_process($mysqli) : void{
        /* fetch post input data */
        $eyetag = trim($_POST["eye"]);
        $family = trim($_POST["family"]);
        $birthday_begin = $_POST["birthday_begin"];
        $birthday_end = $_POST["birthday_end"];
        $cutday_begin = $_POST["cutday_begin"];
        $cutday_end = $_POST["cutday_end"];
        $enterday_begin = $_POST["enterday_begin"];
        $enterday_end = $_POST["enterday_end"];
        $weight_min = $_POST["weight_min"];
        $weight_max = $_POST["weight_max"];
        $live_or_die = isset($_POST["live_or_die"]) ? $_POST["live_or_die"] : null;
        $tankid = isset($_POST["tankid"]) ? $_POST["tankid"] : null;
        $sort_key = isset($_POST["sort_select"]) ? $_POST["sort_select"] : null;
        $sort_order = isset($_POST["order_select"]) ? $_POST["order_select"] : null;
        $and_or = isset($_POST["and_or"]) ? $_POST["and_or"] : "and";
        
        /* concatenate sql where clause or set default value if not specified */
        if(empty($eyetag)){
            $eyetag = ($and_or == "and") ? "true" : "false" ;
        }
        else{
            $eyetag = "眼標 = " . "'{$eyetag}'";
        }
        if(empty($family)){
            $family = ($and_or == "and") ? "true" : "false" ;
        }
        else{
            $family = "家族 = " . "'{$family}'";
        }
        if(is_null($live_or_die)){
            $live_or_die = ($and_or == "and") ? "true" : "false" ;
        }
        else{
            $live_or_die = "生存狀態 = " . "'{$live_or_die}'";
        }
        if(is_null($tankid)){
            $tankid = ($and_or == "and") ? "true" : "false" ;
        }
        else{
            $tankid = "tankid = " . "'{$tankid}'";
        }

        //日期-------------------------------------------------------------------------------------
        if(empty($birthday_begin)){
            $birthday_begin = ($and_or == "and") ? "true" : "false" ;
        }
        else{
            $birthday_begin = str_replace('-', '', $birthday_begin);
            $birthday_begin = "CAST(REPLACE(出生日期, '-', '') AS UNSIGNED) >= {$birthday_begin}";
        }
        if(empty($birthday_end)){
            $birthday_end = ($and_or == "and" || ($birthday_begin != "true" && $birthday_begin != "false")) ? "true" : "false" ;
        }
        else{
            $birthday_end = str_replace('-', '', $birthday_end);
            $birthday_end = "CAST(REPLACE(出生日期, '-', '') AS UNSIGNED) <= {$birthday_end}";
        }
        if(empty($cutday_begin)){
            $cutday_begin = ($and_or == "and") ? "true" : "false" ;
        }
        else{
            $cutday_begin = str_replace('-', '', $cutday_begin);
            $cutday_begin = "CAST(REPLACE(剪眼日期, '-', '') AS UNSIGNED) >= {$cutday_begin}";
        }
        if(empty($cutday_end)){
            $cutday_end = ($and_or == "and" || ($cutday_begin != "true" && $cutday_begin != "false")) ? "true" : "false" ;
        }
        else{
            $cutday_end = str_replace('-', '', $cutday_end);
            $cutday_end = "CAST(REPLACE(剪眼日期, '-', '') AS UNSIGNED) <= {$cutday_end}";
        }
        if(empty($enterday_begin)){
            $enterday_begin = ($and_or == "and") ? "true" : "false" ;
        }
        else{
            $enterday_begin = str_replace('-', '', $enterday_begin);
            $enterday_begin = "CAST(REPLACE(進蝦日期, '-', '') AS UNSIGNED) >= {$enterday_begin}";
        }
        if(empty($enterday_end)){
            $enterday_end = ($and_or == "and" || ($enterday_begin != "true" && $enterday_begin != "false")) ? "true" : "false" ;
        }
        else{
            $enterday_end = str_replace('-', '', $enterday_end);
            $enterday_end = "CAST(REPLACE(進蝦日期, '-', '') AS UNSIGNED) <= {$enterday_end}";
        }
        // 體重----------------------------------------------------------------------------
        if(empty($weight_min)){
            $weight_min = ($and_or == "and") ? "true" : "false" ;
        }
        else{
            $weight_min = "剪眼體重 >= " . "'{$weight_min}'" ;
        }
        if(empty($weight_max)){
            $weight_max = ($and_or == "and" || ($weight_min != "true" && $weight_min != "false")) ? "true" : "false" ;
        }
        else{
            $weight_max = "剪眼體重 <= " . "'{$weight_max}'" ;
        }
    

        if(is_null($sort_key)){
            $sort_key = "id";
        }
        if(is_null($sort_order)){
            $sort_order = "DESC";
        }


        /* search data from database */
        if($and_or == "and") $sql = "SELECT * FROM shrimp_info WHERE 
            BINARY {$eyetag} AND 
            BINARY {$family} AND 
            {$weight_min} AND {$weight_max} AND
            {$birthday_begin} AND {$birthday_end} AND
            {$cutday_begin} AND {$cutday_end} AND
            {$enterday_begin} AND {$enterday_end} AND
            {$tankid} AND 
            {$live_or_die} 
            ORDER BY {$sort_key} {$sort_order}";
        else $sql = "SELECT * FROM shrimp_info WHERE 
            BINARY {$eyetag} OR 
            BINARY {$family} OR 
            {$weight_min} AND {$weight_max} OR
            {$birthday_begin} AND {$birthday_end} OR
            {$cutday_begin} AND {$cutday_end} OR
            {$enterday_begin} AND {$enterday_end} OR
            {$tankid} OR 
            {$live_or_die} 
            ORDER BY {$sort_key} {$sort_order}";
        $result = $mysqli->query($sql);

        /* show search result */
        show_shrimp_info_result($result);
        
        $mysqli->close();
    }


    /* show_shrimp_info_result:
     *      list sql select query result
     * param:
     *      result: sql select query result
     */

    function show_shrimp_info_result($result) : void{
        echo "資料表有 " . $result->num_rows . " 筆資料<br>";

        // --- 顯示資料 --- //
        echo "<table style='text-align:center;' align='center' width='90%'  border='1px solid gray' text-align='center'>";
        echo "<thead>
            <th>Index</th>
            <th>眼標</th>
            <th>紙本資料</th>
            </thead><tbody>";
        // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

        while ($row = $result->fetch_assoc()){
            if(strlen($row["image"]) > 0)
            {
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>",$row["id"], $row["眼標"], $row["image"]);
                echo '<td><a href="view_母種蝦資料?id=' . $row['id'] .
                    '&eye='.$row["眼標"].
                    '&family='.$row["家族"].
                    '&birthday='.$row["出生日期"].
                    '&cutday='.$row["剪眼日期"].
                    '&enterday='.$row["進蝦日期"]. 
                    '&tankid='.$row["tankid"] .
                    '&weight='.$row["體重"] .
                    '&live_or_die='.$row["生存狀態"] .
                    '">詳細</a></td>
                    <td><a href="modify_母種蝦資料?id=' . $row['id'] . 
                    '&eye='.$row["眼標"].
                    '&family='.$row["家族"].
                    '&birthday='.$row["出生日期"].
                    '&cutday='.$row["剪眼日期"].
                    '&enterday='.$row["進蝦日期"]. 
                    '&tankid='.$row["tankid"] .
                    '&weight='.$row["體重"] .
                    '&live_or_die='.$row["生存狀態"] .
                    '&image='.$row["image"].
                    '">修改</a></td>
                    <td><a href="delete?id=' . $row['id'] . '&type=shrimp_info" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
            }
            else
            {
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> </td>",$row["id"], $row["眼標"]);
                echo '<td><a href="view_母種蝦資料?id=' . $row['id'] . 
                    '&eye='.$row["眼標"].
                    '&family='.$row["家族"].
                    '&birthday='.$row["出生日期"].
                    '&cutday='.$row["剪眼日期"].
                    '&enterday='.$row["進蝦日期"]. 
                    '&tankid='.$row["tankid"] .
                    '&weight='.$row["體重"] .
                    '&live_or_die='.$row["生存狀態"] .
                    '">詳細</a></td>
                    <td><a href="modify_母種蝦資料?id=' . $row['id'] .
                    '&eye='.$row["眼標"].
                    '&family='.$row["家族"].
                    '&birthday='.$row["出生日期"].
                    '&cutday='.$row["剪眼日期"].
                    '&enterday='.$row["進蝦日期"]. 
                    '&tankid='.$row["tankid"] .
                    '&weight='.$row["體重"] .
                    '&live_or_die='.$row["生存狀態"] .
                    '&image='. $row["image"] .
                    '">修改</a></td>
                    <td><a href="delete?id=' . $row['id'] . '&type=shrimp_info" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
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
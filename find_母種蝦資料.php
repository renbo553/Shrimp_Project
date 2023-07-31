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
</head>



<body>
    <!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

    <!--Search form-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
        <?php require_once "utility.php"; ?>

	    <hr style="border-width: 1px; border-color: black;">
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

        <!-- <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <button type="button" class="btn btn-primary" onclick="continue_eye(this)">繼續填寫查詢項目</button>
        </div> -->

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 眼標 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='eye' id='eye'>
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
                <div> 家族 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='family' id='family'>
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
                <div> TankID </div>
                <div class="input-group">
                    <select id="tankid" name="tankid" class="custom-select">
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
                    <select class='form-control' name="and_or_3" id="and_or_3">
                        <option value="and">及</option>
                        <option value="or">或</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 生存狀態 </div>
                <div class="input-group">
                    <select id="live_or_die" name="live_or_die" class="custom-select">
                        <option value="none" selected disabled hidden></option>
                        <option value="存活">存活</option>
                        <option value="死亡">死亡</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style="width: 100%; height: 65px">
            <div style="width: 1%"></div>
            <div style="width: 48%">
                <div>查詢方式("及" or "或")</div>
                <div class="input-group">
                    <select class='form-control' name="and_or_4" id="and_or_4">
                        <option value="and">及</option>
                        <option value="or">或</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 體重最小值 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='weight_min' id='weight_min'>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 體重最大值 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='weight_max' id='weight_max'>
                </div>
            </div>
        </div>

        <div class="form-inline" style="width: 100%; height: 65px">
            <div style="width: 1%"></div>
            <div style="width: 48%">
                <div>查詢方式("及" or "或")</div>
                <div class="input-group">
                    <select class='form-control' name="and_or_5" id="and_or_5">
                        <option value="and">及</option>
                        <option value="or">或</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 剪眼日期(起始) </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='cutday_begin' id='cutday_begin'>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 剪眼日期(結束) </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='cutday_end' id='cutday_end'>
                </div>
            </div>
        </div>

        <div class="form-inline" style="width: 100%; height: 65px">
            <div style="width: 1%"></div>
            <div style="width: 48%">
                <div>查詢方式("及" or "或")</div>
                <div class="input-group">
                    <select class='form-control' name="and_or_6" id="and_or_6">
                        <option value="and">及</option>
                        <option value="or">或</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 出生日期(起始) </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='birthday_begin' id='birthday_begin'>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 出生日期(結束) </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='birthday_end' id='birthday_end'>
                </div>
            </div>
        </div>

        <div class="form-inline" style="width: 100%; height: 65px">
            <div style="width: 1%"></div>
            <div style="width: 48%">
                <div>查詢方式("及" or "或")</div>
                <div class="input-group">
                    <select class='form-control' name="and_or_7" id="and_or_7">
                        <option value="and">及</option>
                        <option value="or">或</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 進蝦日期(起始) </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='enterday_begin' id='enterday_begin'>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 進蝦日期(結束) </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='enterday_end' id='enterday_begin'>
                </div>
            </div>
        </div>

        <div class="form-inline" style="width: 100%; height: 65px">
            <div style="width: 1%"></div>
            <div style="width: 48%">
                <div>查詢方式("及" or "或")</div>
                <div class="input-group">
                    <select class='form-control' name="and_or_8" id="and_or_8">
                        <option value="and">及</option>
                        <option value="or">或</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 剪眼體重最小值 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='cut_weight_min' id='cut_weight_min'>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 剪眼體重最大值 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='cut_weight_max' id='cut_weight_max'>
                </div>
            </div>
        </div>
        
        <div class="form-inline" style = "width: 100% ; height: 5px"> </div>

        <div class="form-inline" style = "width: 100% ; height: 40px">
            <div style = "width: 1%"> </div>
            <div style = "width: auto"> 
                <?php
                    utility_button("submit", "查詢");
                ?>
            </div>
        </div>
        <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
    </form>
    <!--//Search form-->

    <script> document.write('<script type="text/javascript" src="shrimp_info_check.js"></'+'script>'); </script>
    <script>
        function continue_eye(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_eye()
            );
            formInlineElement.remove();
        }

        function continue_family(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_family()
            );
            formInlineElement.remove();
        }

        function continue_tankid(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_tankid()
            );
            formInlineElement.remove();
        }

        function continue_live_or_die(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_live_or_die()
            );
            formInlineElement.remove();
        }

        function continue_weight(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_weight()
            );
            formInlineElement.remove();
        }

        function continue_cutday(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_cutday()
            );
            formInlineElement.remove();
        }

        function continue_birthday(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_birthday()
            );
            formInlineElement.remove();
        }

        function continue_enterday(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_enterday()
            );
            formInlineElement.remove();
        }

        function continue_cutweight(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_cutweight()
            );
            formInlineElement.remove();
        }
    </script>


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
        $eyetag = isset($_POST["eye"]) ? trim($_POST["eye"]) : "" ;
        $family = isset($_POST["family"]) ? trim($_POST["family"]) : "" ;
        $tankid = isset($_POST["tankid"]) ? $_POST["tankid"] : null;
        $live_or_die = isset($_POST["live_or_die"]) ? $_POST["live_or_die"] : null;
        $weight_min = isset($_POST["weight_min"]) ? $_POST["weight_min"] : "" ;
        $weight_max = isset($_POST["weight_max"]) ? $_POST["weight_max"] : "" ;
        $cut_weight_min = isset($_POST["cut_weight_min"]) ? $_POST["cut_weight_min"] : "" ;
        $cut_weight_max = isset($_POST["cut_weight_max"]) ? $_POST["cut_weight_max"] : "" ;
        $weight_min = isset($_POST["weight_min"]) ? $_POST["weight_min"] : "" ;
        $weight_max = isset($_POST["weight_max"]) ? $_POST["weight_max"] : "" ;
        $cutday_begin = isset($_POST["cutday_begin"]) ? $_POST["cutday_begin"] : "" ;
        $cutday_end = isset($_POST["cutday_end"]) ? $_POST["cutday_end"] : "" ;
        $birthday_begin = isset($_POST["birthday_begin"]) ? $_POST["birthday_begin"] : "" ;
        $birthday_end = isset($_POST["birthday_end"]) ? $_POST["birthday_end"] : "" ;
        $enterday_begin = isset($_POST["enterday_begin"]) ? $_POST["enterday_begin"] : "" ;
        $enterday_end = isset($_POST["enterday_end"]) ? $_POST["enterday_end"] : "" ;
        $sort_key = isset($_POST["sort_select"]) ? $_POST["sort_select"] : null;
        $sort_order = isset($_POST["order_select"]) ? $_POST["order_select"] : null;

        $and_or_1 = isset($_POST["and_or_1"]) ? $_POST["and_or_1"] : "and" ;
        $and_or_2 = isset($_POST["and_or_2"]) ? $_POST["and_or_2"] : "and" ;
        $and_or_3 = isset($_POST["and_or_3"]) ? $_POST["and_or_3"] : "and" ;
        $and_or_4 = isset($_POST["and_or_4"]) ? $_POST["and_or_4"] : "and" ;
        $and_or_5 = isset($_POST["and_or_5"]) ? $_POST["and_or_5"] : "and" ;
        $and_or_6 = isset($_POST["and_or_6"]) ? $_POST["and_or_6"] : "and" ;
        $and_or_7 = isset($_POST["and_or_7"]) ? $_POST["and_or_7"] : "and" ;
        $and_or_8 = isset($_POST["and_or_8"]) ? $_POST["and_or_8"] : "and" ;

        /* concatenate sql where clause or set default value if not specified */
        if(empty($eyetag)){
            $eyetag = ($and_or_1 == "and") ? "true" : "false" ;
        }
        else{
            $eyetag = "眼標 = " . "'{$eyetag}'";
        }
        if(empty($family)){
            $family = ($and_or_1 == "and" || $and_or_2 == "and") ? "true" : "false" ;
        }
        else{
            $family = "家族 = " . "'{$family}'";
        }
        if(is_null($tankid)){
            $tankid = ($and_or_2 == "and" || $and_or_3 == "and") ? "true" : "false" ;
        }
        else{
            $tankid = "tankid = " . "'{$tankid}'";
        }
        if(is_null($live_or_die)){
            $live_or_die = ($and_or_3 == "and" || $and_or_4 == "and") ? "true" : "false" ;
        }
        else{
            $live_or_die = "生存狀態 = " . "'{$live_or_die}'";
        }
        // 體重----------------------------------------------------------------------------
        if(empty($weight_min)){
            $weight_min = ($and_or_4 == "and" || $and_or_5 == "and") ? "true" : "false" ;
        }
        else{
            $weight_min = "體重 >= " . "'{$weight_min}'" ;
        }
        if(empty($weight_max)){
            $weight_max = (($and_or_4 == "and" || $and_or_5 == "and") || ($weight_min != "true" && $weight_min != "false")) ? "true" : "false" ;
        }
        else{
            $weight_max = "體重 <= " . "'{$weight_max}'" ;
        }

        if(empty($cut_weight_min)){
            $cut_weight_min = ($and_or_8 == "and") ? "true" : "false" ;
        }
        else{
            $cut_weight_min = "剪眼體重 >= " . "'{$cut_weight_min}'" ;
        }
        if(empty($cut_weight_max)){
            $cut_weight_max = (($and_or_8 == "and") || ($cut_weight_min != "true" && $cut_weight_min != "false")) ? "true" : "false" ;
        }
        else{
            $cut_weight_max = "剪眼體重 <= " . "'{$cut_weight_max}'" ;
        }
        //日期-------------------------------------------------------------------------------------
        if(empty($cutday_begin)){
            $cutday_begin = ($and_or_5 == "and" || $and_or_6 == "and") ? "true" : "false" ;
        }
        else{
            $cutday_begin = str_replace('-', '', $cutday_begin);
            $cutday_begin = "CAST(REPLACE(剪眼日期, '-', '') AS UNSIGNED) >= {$cutday_begin}";
        }
        if(empty($cutday_end)){
            $cutday_end = (($and_or_5 == "and" || $and_or_6 == "and") || ($cutday_begin != "true" && $cutday_begin != "false")) ? "true" : "false" ;
        }
        else{
            $cutday_end = str_replace('-', '', $cutday_end);
            $cutday_end = "CAST(REPLACE(剪眼日期, '-', '') AS UNSIGNED) <= {$cutday_end}";
        }
        if(empty($birthday_begin)){
            $birthday_begin = ($and_or_6 == "and" || $and_or_7 == "and") ? "true" : "false" ;
        }
        else{
            $birthday_begin = str_replace('-', '', $birthday_begin);
            $birthday_begin = "CAST(REPLACE(出生日期, '-', '') AS UNSIGNED) >= {$birthday_begin}";
        }
        if(empty($birthday_end)){
            $birthday_end = (($and_or_6 == "and" || $and_or_7 == "and") || ($birthday_begin != "true" && $birthday_begin != "false")) ? "true" : "false" ;
        }
        else{
            $birthday_end = str_replace('-', '', $birthday_end);
            $birthday_end = "CAST(REPLACE(出生日期, '-', '') AS UNSIGNED) <= {$birthday_end}";
        }
        if(empty($enterday_begin)){
            $enterday_begin = ($and_or_7 == "and" || $and_or_8 == "and") ? "true" : "false" ;
        }
        else{
            $enterday_begin = str_replace('-', '', $enterday_begin);
            $enterday_begin = "CAST(REPLACE(進蝦日期, '-', '') AS UNSIGNED) >= {$enterday_begin}";
        }
        if(empty($enterday_end)){
            $enterday_end = (($and_or_7 == "and" || $and_or_8 == "and") || ($enterday_begin != "true" && $enterday_begin != "false")) ? "true" : "false" ;
        }
        else{
            $enterday_end = str_replace('-', '', $enterday_end);
            $enterday_end = "CAST(REPLACE(進蝦日期, '-', '') AS UNSIGNED) <= {$enterday_end}";
        }
    

        if(is_null($sort_key)){
            $sort_key = "id";
        }
        if(is_null($sort_order)){
            $sort_order = "DESC";
        }


        /* search data from database */
        $sql = "SELECT * FROM shrimp_info WHERE 
            BINARY {$eyetag} {$and_or_1}
            BINARY {$family} {$and_or_2}
            {$tankid} {$and_or_3}
            {$live_or_die} {$and_or_4}
            {$weight_min} AND {$weight_max} {$and_or_5}
            {$cutday_begin} AND {$cutday_end} {$and_or_6}
            {$birthday_begin} AND {$birthday_end} {$and_or_7}
            {$enterday_begin} AND {$enterday_end} {$and_or_8}
            {$cut_weight_min} AND {$cut_weight_max}
            ORDER BY {$sort_key} {$sort_order}";
        // echo $sql ;
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
                    '&cutweight='.$row["剪眼體重"].
                    '&enterday='.$row["進蝦日期"]. 
                    '&tankid='.$row["tankid"] .
                    '&weight='.$row["體重"] .
                    '&live_or_die='.$row["生存狀態"] .
                    '">詳細</a></td>
                    <td><a href="modify_母種蝦資料?id=' . $row['id'] . 
                    '&eye='.$row["眼標"].
                    '&family='.$row["家族"].
                    '&birthday='.$row["出生日期"].
                    '&cutweight='.$row["剪眼體重"].
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
                    '&cutweight='.$row["剪眼體重"].
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
                    '&cutweight='.$row["剪眼體重"].
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
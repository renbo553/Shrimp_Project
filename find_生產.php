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
    <title>查詢 - 生產</title>
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
                        $sort_option_array["眼標"] = "眼標";
                        $sort_option_array["進入產卵室待產日期"] = "進產卵室待產日期";
                        $sort_option_array["生產體重"] = "生產體重";
                        $sort_option_array["卵巢進展階段"] = "卵巢進展階段";
                        $sort_option_array["公蝦家族"] = "公蝦家族" ;
                        $sort_option_array["交配方式"] = "交配方式" ;
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
                <div> 眼標 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='eyetag_text' id='eyetag_text'>
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
                <div> 公蝦家族 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='male_family_text' id='male_family_text'>
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
                <div> 交配方式 </div>
                <div class="input-group">
                    <select id="breed_type_select" name="breed_type_select" class="custom-select">
                        <option value="none" selected disabled hidden></option>
                        <option value=""></option>
                        <option value="自然交配">自然交配</option>
                        <option value="人工授精">人工授精</option>
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
                <div> 卵巢進展階段 </div>
                <div class="input-group">
                    <select id="stage_select" name="stage_select" class="custom-select">
                        <option value="none" selected disabled hidden></option>
                        <option value=""></option>
                        <option value="0">0</option>
                        <option value="0-1">0-1</option>
                        <option value="1">1</option>
                        <option value="1-2">1-2</option>
                        <option value="2">2</option>
                        <option value="2-3">2-3</option>
                        <option value="3">3</option>
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
                <div> 生產體重最小值 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='breed_weight_min' id='breed_weight_min'>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 生產體重最大值 </div>
                <div class="input-group">
                    <input type='text' class='form-control' name='breed_weight_max' id='breed_weight_max'>
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
                <div> 進入產卵室待產日期(起始) </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='ablation_date_begin' id='ablation_date_begin'>
                </div>
            </div>
            <div style = "width: 2%"> </div>
            <div style = "width: 48%">
                <div> 進入產卵室待產日期(結束) </div>
                <div class="input-group">
                    <input type='date' class='form-control' name='ablation_date_end' id='ablation_date_end'>
                </div>
            </div>
        </div>

        <!-- <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <button type="button" class="btn btn-primary" onclick="continue_eye(this)">繼續填寫查詢項目</button>
        </div> -->

        <div class="form-inline" style = "width: 100% ; height: 25px"> </div>

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
                    utility_button_onclick("export_breed.php", "匯出");
                ?>
            </div>
        </div>
        <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
    </form>
    <!--//Search form-->

    
    <script> document.write('<script type="text/javascript" src="breed_check.js"></'+'script>'); </script>
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

        function continue_male_family(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_male_family()
            );
            formInlineElement.remove();
        }

        function continue_mating(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_mating()
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

        function continue_breedweight(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_breedweight()
            );
            formInlineElement.remove();
        }

        function continue_ablation_date(button) {// append 接下來的元素
            var myForm = $("#find_form")[0];
            const formInlineElement = button.parentNode;
            formInlineElement.insertAdjacentHTML(
                'afterend',
                append_ablation_date()
            );
            formInlineElement.remove();
        }
    </script>


    <!--Data table-->
    <?php 

    define("CACHE_QUERY", "search_breed_query");    
    
    require_once "config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        search_breed_process($mysqli);
    }
    else{
        list_all_breed_process($mysqli);
    }

    
    /*** function definition ***/
    /* list_all_breed_process:
     * 		list breed data
     * param:
     * 		mysqli: database object
     */

    function list_all_breed_process($mysqli) : void{
        /* select all data from database */
        $sql = "SELECT * FROM breed ORDER BY id desc";
        $result = $mysqli->query($sql);

        /* show result */
        show_breed_result($result);

        /* store query into session */
        utility_session_insert(CACHE_QUERY, $sql);
        
        $mysqli->close();
    }


    /* search_breed_process:
     * 		list searched breed data
     * param:
     * 		mysqli: database object
     */

    function search_breed_process($mysqli) : void{
        /* fetch post input data */
        $eyetag = isset($_POST["eyetag_text"]) ? trim($_POST["eyetag_text"]) : "" ;
        $male_family = isset($_POST["male_family_text"]) ? trim($_POST["male_family_text"]) : "" ;
        $breed_type = isset($_POST["breed_type_select"]) ? $_POST["breed_type_select"] : null;
        $stage = isset($_POST["stage_select"]) ? $_POST["stage_select"] : null;
        $breed_weight_min = isset($_POST["breed_weight_min"]) ? trim($_POST["breed_weight_min"]) : "" ;
        $breed_weight_max = isset($_POST["breed_weight_max"]) ? trim($_POST["breed_weight_max"]) : "" ;
        $ablation_date_begin = isset($_POST["ablation_date_begin"]) ? $_POST["ablation_date_begin"] : "" ;
        $ablation_date_end = isset($_POST["ablation_date_end"]) ? $_POST["ablation_date_end"] : "" ;
        $sort_key = isset($_POST["sort_select"]) ? $_POST["sort_select"] : null;
        $sort_order = isset($_POST["order_select"]) ? $_POST["order_select"] : null;

        $and_or_1 = isset($_POST["and_or_1"]) ? $_POST["and_or_1"] : "and" ;
        $and_or_2 = isset($_POST["and_or_2"]) ? $_POST["and_or_2"] : "and" ;
        $and_or_3 = isset($_POST["and_or_3"]) ? $_POST["and_or_3"] : "and" ;
        $and_or_4 = isset($_POST["and_or_4"]) ? $_POST["and_or_4"] : "and" ;
        $and_or_5 = isset($_POST["and_or_5"]) ? $_POST["and_or_5"] : "and" ;

        /* concatenate sql where clause or set default value if not specified */
        if(empty($eyetag)){
            $eyetag = ($and_or_1 == "and") ? "true" : "false" ;
        }
        else{
            $eyetag = "眼標 = " . "'{$eyetag}'";
        }
        if(empty($male_family)){
            $male_family = ($and_or_1 == "and" || $and_or_2 == "and") ? "true" : "false" ;
        }
        else{
            $male_family = "公蝦家族 = " . "'{$male_family}'";
        }
        if(is_null($breed_type)){
            $breed_type = ($and_or_2 == "and" || $and_or_3 == "and") ? "true" : "false" ;
        }
        else{
            $breed_type = "交配方式 = " . "'{$breed_type}'";
        }
        if(is_null($stage)){
            $stage = ($and_or_3 == "and" || $and_or_4 == "and") ? "true" : "false" ;
        }
        else{
            $stage = "卵巢進展階段 = " . "'{$stage}'";
        }
        //重量----------------------------------------------------------------------------
        // 4/21 最小值為0會錯
        if(empty($breed_weight_min)){
            $breed_weight_min = ($and_or_4 == "and" || $and_or_5 == "and")  ? "true" : "false" ;
        }
        else{
            $breed_weight_min = "生產體重 >= " . "'{$breed_weight_min}'" ;
        }
        if(empty($breed_weight_max)){
            $breed_weight_max = (($and_or_4 == "and" || $and_or_5 == "and") || ($breed_weight_min != "true" && $breed_weight_min != "false")) ? "true" : "false" ;
        }
        else{
            $breed_weight_max = "生產體重 <= " . "'{$breed_weight_max}'" ;
        }
        // 日期-------------------------------------------------------
        if(empty($ablation_date_begin)){
            $ablation_date_begin = ($and_or_5 == "and") ? "true" : "false" ;
        }
        else{
            $ablation_date_begin = str_replace('-', '', $ablation_date_begin);
            $ablation_date_begin = "CAST(REPLACE(進產卵室待產日期, '-', '') AS UNSIGNED) >= {$ablation_date_begin}";
        }
        if(empty($ablation_date_end)){
            $ablation_date_end = ($and_or_5 == "and" || ($ablation_date_begin != "true" && $ablation_date_begin != "false")) ? "true" : "false" ;
        }
        else{
            $ablation_date_end = str_replace('-', '', $ablation_date_end);
            $ablation_date_end = "CAST(REPLACE(進產卵室待產日期, '-', '') AS UNSIGNED) <= {$ablation_date_end}";
        }

        
        if(is_null($sort_key)){
            $sort_key = "id";
        }
        if(is_null($sort_order)){
            $sort_order = "DESC";
        }

        /* search data from database */
        $sql = "SELECT * FROM breed WHERE 
            BINARY {$eyetag} {$and_or_1}
            BINARY {$male_family} {$and_or_2}
            {$breed_type} {$and_or_3}
            {$stage} {$and_or_4}
            {$breed_weight_min} AND {$breed_weight_max} {$and_or_5}
            {$ablation_date_begin} AND {$ablation_date_end} 
            ORDER BY {$sort_key} {$sort_order}";
        // echo $sql ;
        $result = $mysqli->query($sql);

        /* show search result */
        show_breed_result($result);

        /* store query into session */
        utility_session_insert(CACHE_QUERY, $sql);
        
        $mysqli->close();
    }


    /* show_breed_result:
     *      list sql select query result
     * param:
     *      result: sql select query result
     */

    // 2/18 未加加上去的兩個項目 !! ------------------------------------------
    function show_breed_result($result) : void{
        echo "<div style = \"width : 1% ; display : inline-block\"> </div>" ;
        echo "資料表有 " . $result->num_rows . " 筆資料<br>";

        // --- 顯示資料 --- //
        echo "<table style='text-align:center;' align='center' width='90%'  border='1px solid gray' text-align='center'>";
        echo "<thead>
            <th>Index</th>
            <th>眼標</th>
            <th>公蝦家族</th>
            <th>生產體重</th>
            <th>待產日期</th>
            <th>卵巢階段</th>
            <th>交配方式</th>
            <th>紙本資料</th>
            </thead><tbody>";
        // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

        while ($row = $result->fetch_assoc())
        {
            if(strlen($row["image"]) > 0)
            {
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>",$row["id"], $row["眼標"], $row["公蝦家族"] , $row["生產體重"], $row["進產卵室待產日期"] ,$row["卵巢進展階段"] , $row["交配方式"] , $row["image"]);
                echo 
                    // '<td><a href="view_生產?
                    // &id=' . $row['id'] .
                    // '&male_family=' .$row["公蝦家族"] . 
                    // '&eye=' . $row["眼標"] .
                    // '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                    // '&spawningweight=' . $row["生產體重"] . 
                    // '&ovarystate=' . $row["卵巢進展階段"] . 
                    // '&breed_type=' . $row["交配方式"] .
                    // '&image=' . $row["image"]  .
                    // '">詳細</a></td>
                    '<td><a href="modify_生產?
                    &id=' . $row['id'] .  
                    '&male_family=' .$row["公蝦家族"] . 
                    '&eye=' . $row["眼標"] .  
                    '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                    '&spawningweight=' . $row["生產體重"] . 
                    '&ovarystate=' . $row["卵巢進展階段"] . 
                    '&breed_type=' . $row["交配方式"] .
                    '&image=' . $row["image"]  .
                    '">修改</a></td>
                  <td><a href="delete?id=' . $row['id'] . '&type=breed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
            }
            else{
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> </td>",$row["id"], $row["眼標"], $row["公蝦家族"] , $row["生產體重"], $row["進產卵室待產日期"] ,$row["卵巢進展階段"] , $row["交配方式"] , $row["image"]);
                echo 
                    // '<td><a href="view_生產?
                    // &id=' . $row['id'] . 
                    // '&male_family=' .$row["公蝦家族"] . 
                    // '&eye=' . $row["眼標"] . 
                    // '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                    // '&spawningweight=' . $row["生產體重"] . 
                    // '&ovarystate=' . $row["卵巢進展階段"] . 
                    // '&breed_type=' . $row["交配方式"] .
                    // '&image=' . $row["image"]  .
                    // '">詳細</a></td>
                    '<td><a href="modify_生產?
                    &id=' . $row['id'] . 
                    '&male_family=' .$row["公蝦家族"] . 
                    '&eye=' . $row["眼標"] . 
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
    <!--//Data table-->


    <!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
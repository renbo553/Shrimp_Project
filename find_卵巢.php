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
                        $sort_option_array["眼標"] = "眼標";
                        $sort_option_array["日期"] = "Date";
                        $sort_option_array["卵巢階段"] = "Stage";
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
                        $sort_option_array["眼標"] = "眼標";
                        $sort_option_array["日期"] = "Date";
                        $sort_option_array["卵巢階段"] = "Stage";
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
                        $sort_option_array["眼標"] = "眼標";
                        $sort_option_array["日期"] = "Date";
                        $sort_option_array["卵巢階段"] = "Stage";
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
                <div> 卵巢階段 </div>
                <div class="input-group">
                    <select id="stage_select" name="stage_select" class="custom-select">
                        <option value="none" selected disabled hidden></option>
                        <option value="0">0</option>
                        <option value="0-1">0-1</option>
                        <option value="1">1</option>
                        <option value="1-2">1-2</option>
                        <option value="2">2</option>
                        <option value="2-3">2-3</option>
                        <option value="3">3</option>
                        <option value="脫殼">脫殼</option>
                        <option value="受精">受精</option>
                        <option value="生產">生產</option>
                        <option value="死亡">死亡</option>
                        <option value="淘汰">淘汰</option>
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

        <!-- <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <button type="button" class="btn btn-primary" onclick="continue_eye(this)">繼續填寫查詢項目</button>
        </div> -->

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
                    utility_button_onclick("export_ovary.php", "匯出");
                ?>
            </div>
        </div>
        <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
    </form>
    <!--//Search form-->

    <script> document.write('<script type="text/javascript" src="ovary_check.js"></'+'script>'); </script>
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
        $eyetag = isset($_POST["eyetag_text"]) ? trim($_POST["eyetag_text"]) : "" ;
        $start_date = isset($_POST["start_date"]) ? $_POST["start_date"] : "" ;
        $end_date = isset($_POST["end_date"]) ? $_POST["end_date"] : "" ;
        $stage = isset($_POST["stage_select"]) ? $_POST["stage_select"] : null;
        $sort_key1 = isset($_POST["sort_select1"]) ? $_POST["sort_select1"] : null;
        $sort_order1 = isset($_POST["order_select1"]) ? $_POST["order_select1"] : null;
        $sort_key2 = isset($_POST["sort_select2"]) ? $_POST["sort_select2"] : null;
        $sort_order2 = isset($_POST["order_select2"]) ? $_POST["order_select2"] : null;
        $sort_key3 = isset($_POST["sort_select3"]) ? $_POST["sort_select3"] : null;
        $sort_order3 = isset($_POST["order_select3"]) ? $_POST["order_select3"] : null;
        $and_or_2 = isset($_POST["and_or_2"]) ? $_POST["and_or_2"] : "and" ;
        $and_or_3 = isset($_POST["and_or_3"]) ? $_POST["and_or_3"] : "and" ;

        /* concatenate sql where clause or set default value if not specified */

        if(empty($eyetag)){
            $eyetag = ($and_or_2 == "and") ? "true" : "false" ;
        }
        else{
            $eyetag = "眼標 = " . "'{$eyetag}'";
        }
        if(empty($start_date)){
            $start_date = ($and_or_3 == "and") ? "true" : "false" ;
        }
        else{
            $start_date = str_replace('-', '', $start_date);
            $start_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) >= {$start_date}";
        }
        if(empty($end_date)){
            $end_date = ($and_or_3 == "and" || ($start_date != "true" && $start_date != "false")) ? "true" : "false" ;
        }
        else{
            $end_date = str_replace('-', '', $end_date);
            $end_date = "CAST(REPLACE(Date, '-', '') AS UNSIGNED) <= {$end_date}";
        }
        
        if(is_null($stage)){
            $stage = ($and_or_2 == "and" || $and_or_3 = "and") ? "true" : "false" ;
        }
        else{
            $stage = "Stage = " . "'{$stage}'";
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

        $and_or_2 = strtoupper($and_or_2) ;
        $and_or_3 = strtoupper($and_or_3) ;

        /* search data from database */
        //$sql = "SELECT * FROM ovary WHERE {$eyetag} AND {$date} AND {$stage} ORDER BY {$sort_key} {$sort_order}";
        $sql = "SELECT * FROM ovary WHERE BINARY {$eyetag} {$and_or_2} {$stage} {$and_or_3} {$start_date} AND {$end_date} ORDER BY {$sort_key1} {$sort_order1}, {$sort_key2} {$sort_order2}, {$sort_key3} {$sort_order3}";
        // echo $sql ;
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
            <th>卵巢階段</th>
            <th>紙本資料</th>
            </thead><tbody>";
        // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

        while($row = $result->fetch_assoc()){
            if(strlen($row["image"]) > 0){
                printf("<tr><td  style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>", $row["id"], $row["眼標"], $row["Date"], $row["Stage"], $row["image"]);
                echo '<td><a href="modify_卵巢?&id='.$row['id']. 
                '&eye='.$row["眼標"]. 
                '&date='.$row["Date"]. 
                '&ovarystate='.$row["Stage"]. 
                '&image='.$row["image"].
                '">修改</a></td>
                <td><a href="delete?
                &id='.$row['id']. '&type=ovary" onclick="return confirm(\'確定要刪除ID : ' . $row['id'] . ' 嗎?\');">刪除</a></td>';
            }
            else{
                printf("<tr><td  style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td></td>", $row["id"], $row["眼標"], $row["Date"], $row["Stage"]);
                echo '<td><a href="modify_卵巢?&id='.$row['id']. 
                '&eye='.$row["眼標"]. 
                '&date='.$row["Date"]. 
                '&ovarystate='.$row["Stage"]. 
                '&image='.$row["image"].
                '">修改</a></td>
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
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

        <!-- 2/18 修改之UI -->
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
                        $sort_option_array["剪眼日期"] = "剪眼日期";
                        $sort_option_array["剪眼體重"] = "剪眼體重";
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
                <div> 家族 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("family_text", "家族");    
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 公蝦家族 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("male_family_text", "公蝦家族");
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
                        utility_textbox("eyetag_text", "眼標");   
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 剪眼體重 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("ablation_weight", "剪眼體重"); 
                    ?>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 生產體重 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("breed_weight", "生產體重");
                    ?>
                </div>
            </div>
            <div style = "width: 1%"> </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 剪眼日期 </div>
                <div class="input-group">
                    <?php
                        utility_date("ablation_date", "剪眼日期");
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 進入產卵室待產日期 </div>
                <div class="input-group">
                    <?php
                        utility_date("expectant_date", "進入產卵室待產日期");
                    ?>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 交配方式 </div>
                <div class="input-group">
                    <?php
                        $breed_type_option_array = array() ;
                        $breed_type_option_array["自然交配"] = "自然交配" ;
                        $breed_type_option_array["人工交配"] = "人工交配" ;
                        utility_selectbox("breed_type_select", "交配方式", $breed_type_option_array) ;
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 卵巢進展階段 </div>
                <div class="input-group">
                    <?php
                        $stage_option_array = array();
                        $stage_option_array["0"] = "0";
                        $stage_option_array["0-1"] = "0-1";
                        $stage_option_array["1"] = "1";
                        $stage_option_array["1-2"] = "1-2";
                        $stage_option_array["2"] = "2";
                        $stage_option_array["2-3"] = "2-3";
                        $stage_option_array["3"] = "3";
                        utility_selectbox("stage_select", "卵巢進展階段", $stage_option_array);        
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
                    utility_button_onclick("export_breed.php", "匯出");
                ?>
            </div>
        </div>
        <!-- 2/18 修改之UI -->
    
    </form>
    <!--//Search form-->

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
        $family = trim($_POST["family_text"]);
    
        // 2/18 新增項目----------------------------------------------
        $male_family = trim($_POST["male_family_text"]);
        $breed_type = isset($_POST["breed_type_select"]) ? $_POST["breed_type_select"] : null;
        //------------------------------------------------------------

        $eyetag = trim($_POST["eyetag_text"]);
        $ablation_date = $_POST["ablation_date"];
        $ablation_weight = trim($_POST["ablation_weight"]);
        $expectant_date = $_POST["expectant_date"];
        $breed_weight = trim($_POST["breed_weight"]);
        $stage = isset($_POST["stage_select"]) ? $_POST["stage_select"] : null;
        $sort_key = isset($_POST["sort_select"]) ? $_POST["sort_select"] : null;
        $sort_order = isset($_POST["order_select"]) ? $_POST["order_select"] : null;

        /* concatenate sql where clause or set default value if not specified */
        if(empty($family)){
            $family = "true";
        }
        else{
            $family = "家族 = " . "'{$family}'";
        }
        
        // 2/18 新增項目-------------------------------------
        if(empty($male_family)){
            $male_family = "true";
        }
        else{
            $male_family = "公蝦家族 = " . "'{$male_family}'";
        }
        //----------------------------------------------------

        if(empty($eyetag)){
            $eyetag = "true";
        }
        else{
            $eyetag = "眼標 = " . "'{$eyetag}'";
        }
        if(empty($ablation_date)){
            $ablation_date = "true";
        }
        else{
            $ablation_date = "剪眼日期 = " . "'{$ablation_date}'";
        }
        if(empty($ablation_weight)){
            $ablation_weight = "true";
        }
        else{
            $ablation_weight = "剪眼體重 = " . "'{$ablation_weight}'";
        }
        if(empty($expectant_date)){
            $expectant_date = "true";
        }
        else{
            $expectant_date = "進產卵室待產日期 = " . "'{$expectant_date}'";
        }
        if(empty($breed_weight)){
            $breed_weight = "true";
        }
        else{
            $breed_weight = "生產體重 = " . "'{$breed_weight}'";
        }
        if(is_null($stage)){
            $stage = "true";
        }
        else{
            $stage = "卵巢進展階段 = " . "'{$stage}'";
        }
        if(is_null($sort_key)){
            $sort_key = "id";
        }
        if(is_null($sort_order)){
            $sort_order = "DESC";
        }

        /* search data from database */
        $sql = "SELECT * FROM breed WHERE {$family} AND {$eyetag} AND {$ablation_date} AND {$ablation_weight} AND {$expectant_date} AND {$breed_weight} AND {$stage} ORDER BY {$sort_key} {$sort_order}";
        $result = $mysqli->query($sql);

        /* show search result */
        show_breed_result($result);

        // 2/18 新增項目----------
        if(is_null($breed_type)){
            $breed_type = "true";
        }
        else{
            $breed_type = "交配方式 = " . "'{$breed_type}'";
        }
        //-------------------------

        if(is_null($sort_key)){
            $sort_key = "id";
        }
        if(is_null($sort_order)){
            $sort_order = "DESC";
        }

        /* search data from database */
        $sql = "SELECT * FROM breed WHERE {$family} AND {$male_family} AND {$eyetag} AND {$ablation_date} AND {$ablation_weight} AND {$expectant_date} AND {$breed_weight} AND {$breed_type} AND {$stage} ORDER BY {$sort_key} {$sort_order}";
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
            <th>家族</th>
            <th>眼標</th>
            <th>紙本資料</th>
            </thead><tbody>";
        // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

        while ($row = $result->fetch_assoc())
        {
            if(strlen($row["image"]) > 0)
            {
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>",$row["id"], $row["家族"], $row["眼標"], $row["image"]);
                echo '<td><a href="view_生產?
                    &id=' . $row['id'] . 
                    '&family=' .$row["家族"] .  
                    '&male_family=' .$row["公蝦家族"] . 
                    '&eye=' . $row["眼標"] . 
                    '&cutday=' . $row["剪眼日期"] . 
                    '&cutweight=' . $row["剪眼體重"] . 
                    '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                    '&spawningweight=' . $row["生產體重"] . 
                    '&ovarystate=' . $row["卵巢進展階段"] . 
                    '&breed_type=' . $row["交配方式"] .
                    '&image=' . $row["image"]  .
                    '">詳細</a></td>
                    <td><a href="modify_生產?
                    &id=' . $row['id'] . 
                    '&family=' .$row["家族"] .  
                    '&male_family=' .$row["公蝦家族"] . 
                    '&eye=' . $row["眼標"] . 
                    '&cutday=' . $row["剪眼日期"] . 
                    '&cutweight=' . $row["剪眼體重"] . 
                    '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                    '&spawningweight=' . $row["生產體重"] . 
                    '&ovarystate=' . $row["卵巢進展階段"] . 
                    '&breed_type=' . $row["交配方式"] .
                    '&image=' . $row["image"]  .
                    '">修改</a></td>
                  <td><a href="delete?id=' . $row['id'] . '&type=breed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
            }
            else{
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> </td>",$row["id"], $row["家族"], $row["眼標"] , $row["image"]);
                echo '<td><a href="view_生產?
                    &id=' . $row['id'] . 
                    '&family=' .$row["家族"] .  
                    '&male_family=' .$row["公蝦家族"] . 
                    '&eye=' . $row["眼標"] . 
                    '&cutday=' . $row["剪眼日期"] . 
                    '&cutweight=' . $row["剪眼體重"] . 
                    '&spawningroomdate=' . $row["進產卵室待產日期"] . 
                    '&spawningweight=' . $row["生產體重"] . 
                    '&ovarystate=' . $row["卵巢進展階段"] . 
                    '&breed_type=' . $row["交配方式"] .
                    '&image=' . $row["image"]  .
                    '">詳細</a></td>
                    <td><a href="modify_生產?
                    &id=' . $row['id'] . 
                    '&family=' .$row["家族"] .  
                    '&male_family=' .$row["公蝦家族"] . 
                    '&eye=' . $row["眼標"] . 
                    '&cutday=' . $row["剪眼日期"] . 
                    '&cutweight=' . $row["剪眼體重"] . 
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
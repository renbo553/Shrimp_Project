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
                <div> 家族 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("family", "家族");    
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 體重 </div>
                <div class="input-group">
                    <?php
                        utility_textbox("weight", "體重");
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
                <div> 剪眼日期 </div>
                <div class="input-group">
                    <?php
                        utility_date("cutday", "剪眼日期");    
                    ?>
                </div>
            </div>
            <div style = "width: 2%"> </div>
			<div style = "width: 48%">
                <div> 出生日期 </div>
                <div class="input-group">
                    <?php
                        utility_date("birthday", "出生日期");
                    ?>
                </div>
            </div>
        </div>

        <div class="form-inline" style = "width: 100% ; height: 65px">
            <div style = "width: 1%"> </div>
            <div style = "width: 48%">
                <div> 進蝦日期 </div>
                <div class="input-group">
                    <?php
                        utility_date("enterday", "進蝦日期");    
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
        $birthday = $_POST["birthday"];
        $cutday = $_POST["cutday"];
        $enterday = $_POST["enterday"];
        $weight = $_POST["weight"];
        $live_or_die = isset($_POST["live_or_die"]) ? $_POST["live_or_die"] : null;
        $tankid = isset($_POST["tankid"]) ? $_POST["tankid"] : null;
        $sort_key = isset($_POST["sort_select"]) ? $_POST["sort_select"] : null;
        $sort_order = isset($_POST["order_select"]) ? $_POST["order_select"] : null;
        
        /* concatenate sql where clause or set default value if not specified */
        if(empty($eyetag)){
            $eyetag = "true";
        }
        else{
            $eyetag = "眼標 = " . "'{$eyetag}'";
        }
        if(empty($family)){
            $family = "true";
        }
        else{
            $family = "家族 = " . "'{$family}'";
        }
        if(empty($birthday)){
            $birthday = "true";
        }
        else{
            $birthday = "出生日期 = " . "'{$birthday}'";
        }
        if(empty($cutday)){
            $cutday = "true";
        }
        else{
            $cutday = "剪眼日期 = " . "'{$cutday}'";
        }
        if(empty($enterday)){
            $enterday = "true";
        }
        else{
            $enterday = "進蝦日期 = " . "'{$enterday}'";
        }
        if(is_null($live_or_die)){
            $live_or_die = "true";
        }
        else{
            $live_or_die = "生存狀態 = " . "'{$live_or_die}'";
        }
        if(is_null($tankid)){
            $tankid = "true";
        }
        else{
            $tankid = "tankid = " . "'{$tankid}'";
        }
        if(empty($weight)){
            $weight = "true";
        }
        else{
            $weight = "體重 = " . "'{$weight}'";
        }
        if(is_null($sort_key)){
            $sort_key = "id";
        }
        if(is_null($sort_order)){
            $sort_order = "DESC";
        }


        /* search data from database */
        $sql = "SELECT * FROM shrimp_info WHERE {$eyetag} AND {$family} AND {$birthday} AND {$cutday} AND {$enterday} AND {$tankid} AND {$live_or_die} AND {$weight} ORDER BY {$sort_key} {$sort_order}";
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
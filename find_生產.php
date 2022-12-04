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
        <div class="table">
            <?php 
                require_once "utility.php";
                $sort_option_array = array();
                $sort_option_array["index"] = "id";
                $sort_option_array["家族"] = "家族";
                $sort_option_array["眼標"] = "眼標";
                $sort_option_array["剪眼日期"] = "剪眼日期";
                $sort_option_array["剪眼體重"] = "剪眼體重";
                $sort_option_array["進入產卵室待產日期"] = "進產卵室待產日期";
                $sort_option_array["生產體重"] = "生產體重";
                $sort_option_array["卵巢進展階段"] = "卵巢進展階段";
                utility_input_selectbox("sort_select", "排序項目", $sort_option_array);
                $order_option_array = array();
                $order_option_array["升序"] = "ASC";
                $order_option_array["降序"] = "DESC";
                utility_input_selectbox("order_select", "排序方式", $order_option_array);
                utility_input_textbox("family_text", "家族");
                utility_input_textbox("eyetag_text", "眼標");
                utility_input_date("ablation_date", "剪眼日期");
                utility_input_textbox("ablation_weight", "剪眼體重");
                utility_input_date("expectant_date", "進入產卵室待產日期");
                utility_input_textbox("breed_weight", "生產體重");
                $stage_option_array = array();
                $stage_option_array["0"] = "0";
                $stage_option_array["0-1"] = "0-1";
                $stage_option_array["1"] = "1";
                $stage_option_array["1-2"] = "1-2";
                $stage_option_array["2"] = "2";
                $stage_option_array["2-3"] = "2-3";
                $stage_option_array["3"] = "3";
                utility_input_selectbox("stage_select", "卵巢進展階段", $stage_option_array);
                utility_button("submit", "查詢");
            ?>
        </div>
    </form>
    <!--//Search form-->

    <!--Data table-->
    <?php 
    
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
        
        $mysqli->close();
    }


    /* show_breed_result:
     *      list sql select query result
     * param:
     *      result: sql select query result
     */

    function show_breed_result($result) : void{
        echo "資料表有 " . $result->num_rows . " 筆資料<br>";

        // --- 顯示資料 --- //
        echo "<table style='text-align:center;' align='center' width='70%'  border='1px solid gray' text-align='center'>";
        echo "<thead>
            <th>Index</th>
            <th>家族</th>
            <th>眼標</th>
            <th>剪眼日期</th>
            <th>剪眼體重</th>
            <th>進入產卵室待產日期</th>
            <th>生產體重</th>
            <th>卵巢進展階段</th>
            <th>紙本資料</th>
            </thead><tbody>";
        // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

        while ($row = $result->fetch_assoc())
        {
            if(strlen($row["image"]) > 0)
            {
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td>  <a href=%s target='_blank'>查看</a>  </td>",$row["id"], $row["家族"], $row["眼標"], $row["剪眼日期"], $row["剪眼體重"], $row["進產卵室待產日期"], $row["生產體重"], $row["卵巢進展階段"], $row["image"]);
                echo '<td><a href="modify_生產?id=' . $row['id'] . ' &family=' .$row["家族"] . '&eye=' . $row["眼標"] . '&cutday=' . $row["剪眼日期"] . '&cutweight=' . $row["剪眼體重"] . '&spawningroomdate=' . $row["進產卵室待產日期"] . '&spawningweight=' . $row["生產體重"] . '&ovarystate=' . $row["卵巢進展階段"] . ' &image=' . $row["image"]  .'">
                    修改</a></td>
                  <td><a href="delete?id=' . $row['id'] . '&type=breed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
            }
            else{
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td>  </td>",$row["id"], $row["家族"], $row["眼標"], $row["剪眼日期"], $row["剪眼體重"], $row["進產卵室待產日期"], $row["生產體重"], $row["卵巢進展階段"], $row["image"]);
                echo '<td><a href="modify_生產?id=' . $row['id'] . ' &family=' .$row["家族"] . '&eye=' . $row["眼標"] . '&cutday=' . $row["剪眼日期"] . '&cutweight=' . $row["剪眼體重"] . '&spawningroomdate=' . $row["進產卵室待產日期"] . '&spawningweight=' . $row["生產體重"] . '&ovarystate=' . $row["卵巢進展階段"] . ' &image=' . $row["image"]  .'">
                    修改</a></td>
                <td><a href="delete?id=' . $row['id'] . '&type=breed" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
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
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
    <title>查詢 - 位置</title>
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
                $sort_option_array["眼標"] = "眼標";
                $sort_option_array["家族"] = "家族";
                $sort_option_array["出生日"] = "出生日";
                $sort_option_array["剪眼日"] = "剪眼日";
                $sort_option_array["日期"] = "Date";
                $sort_option_array["位置(Tank)"] = "Tank";
                utility_input_selectbox("sort_select", "排序項目", $sort_option_array);
                $order_option_array = array();
                $order_option_array["升序"] = "ASC";
                $order_option_array["降序"] = "DESC";
                utility_input_selectbox("order_select", "排序方式", $order_option_array);
                utility_input_textbox("eyetag_text", "眼標");
                utility_input_textbox("family_text", "家族");
                utility_input_date("birth_date", "出生日");
                utility_input_date("ablation_date", "剪眼日");
                utility_input_date("date", "日期");
                $tank_option_array = array();
                $tank_option_array["M1"] = "M1";
                $tank_option_array["M2"] = "M2";
                $tank_option_array["M3"] = "M3";
                $tank_option_array["M4"] = "M4";
                utility_input_selectbox("tank_select", "位置(Tank)", $tank_option_array);
                utility_button("submit", "查詢");
            ?>
        </div>
    </form>
    <!--//Search form-->


    <!--Data table-->
    <?php 
    
    require_once "config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        search_location_process($mysqli);
    }
    else{
        list_all_location_process($mysqli);
    }


    /*** function definition ***/
    /* list_all_location_process:
     * 		list all location data
     * param:
     * 		mysqli: database object
     */

    function list_all_location_process($mysqli) : void{
        /* select all data from database */
        $sql = "SELECT * FROM location ORDER BY id desc";
        $result = $mysqli->query($sql);

        /* show search result */
        show_location_result($result);
        
        $mysqli->close();
    }


    /* search_location_process:
     * 		list searched location data
     * param:
     * 		mysqli: database object
     */

    function search_location_process($mysqli) : void{
        /* fetch post input data */
        $eyetag = trim($_POST["eyetag_text"]);
        $family = trim($_POST["family_text"]);
        $birth_date = $_POST["birth_date"];
        $ablation_date = $_POST["ablation_date"];
        $date = $_POST["date"];
        $tank = isset($_POST["tank_select"]) ? $_POST["tank_select"] : null;
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
        if(empty($birth_date)){
            $birth_date = "true";
        }
        else{
            $birth_date = "出生日 = " . "'{$birth_date}'";
        }
        if(empty($ablation_date)){
            $ablation_date = "true";
        }
        else{
            $ablation_date = "剪眼日 = " . "'{$ablation_date}'";
        }
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
        if(is_null($sort_key)){
            $sort_key = "id";
        }
        if(is_null($sort_order)){
            $sort_order = "DESC";
        }


        /* search data from database */
        $sql = "SELECT * FROM location WHERE {$eyetag} AND {$family} AND {$birth_date} AND {$ablation_date} AND {$date} AND {$tank} ORDER BY {$sort_key} {$sort_order}";
        $result = $mysqli->query($sql);

        /* show search result */
        show_location_result($result);
        
        $mysqli->close();
    }


    /* show_location_result:
     *      list sql select query result
     * param:
     *      result: sql select query result
     */

    function show_location_result($result) : void{
        echo "資料表有 " . $result->num_rows . " 筆資料<br>";

        // --- 顯示資料 --- //
        echo "<table style='text-align:center;' align='center' width='80%'  border='1px solid gray' text-align='center'>";
        echo "<thead>
            <th>Index</th>
            <th>眼標</th>
            <th>家族</th>
            <th>出生日</th>
            <th>剪眼日</th>
            <th>日期</th>
            <th>位置(Tank)</th>
            <th>紙本資料</th>
            </thead><tbody>";
        // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

        while ($row = $result->fetch_assoc()){
            if(strlen($row["image"]) > 0)
            {
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>",$row["id"], $row["眼標"], $row["家族"], $row["出生日"], $row["剪眼日"], $row["Date"], $row["Tank"], $row["image"]);
                echo '<td><a href="modify_位置?id=' . $row['id'] . ' &eye='.$row["眼標"].' &family='.$row["家族"].' &birthday='.$row["出生日"].' &cutday='.$row["剪眼日"].' &date='.$row["Date"].' &location='.$row["Tank"] .' &image='.$row["image"].'">修改</a></td>
                      <td><a href="delete?id=' . $row['id'] . '&type=location" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
            }
            else
            {
                printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td></td>",$row["id"], $row["眼標"], $row["家族"], $row["出生日"], $row["剪眼日"], $row["Date"], $row["Tank"]);
                echo '<td><a href="modify_位置?id=' . $row['id'] . ' &eye='.$row["眼標"].' &family='.$row["家族"].' &birthday='.$row["出生日"].' &cutday='.$row["剪眼日"].' &date='.$row["Date"].' &location='.$row["Tank"] .' &image='.$row["image"].'">修改</a></td>
                      <td><a href="delete?id=' . $row['id'] . '&type=location" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
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
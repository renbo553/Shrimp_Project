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
    <title>水質 - 繪製折線圖</title>
    <!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
    <!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

    <!-- table -->
    <div class="tab-content-2"><p>
        <section>
            <!--Search form-->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
                <?php require_once "utility.php"; ?>

                <!-- 2/18 修改之UI -->
                <!-- 4/10 radio button -->
                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 48%">
                        <div> 起始日期 </div>
                        <div class="input-group">
                            <?php 
                                utility_date("start_date", "起始日期");
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
                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 48%">
                        <div> TankID </div>
                        <div class="input-group">
                            <?php 
                                $tank_option_array = array();
                                $tank_option_array["M1"] = "M1";
                                $tank_option_array["M2"] = "M2";
                                $tank_option_array["M3"] = "M3";
                                $tank_option_array["M4"] = "M4";
                                utility_selectbox("tank_select", "TankID", $tank_option_array);
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: auto">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 95%">
                        <div> 繪製項目 </div>
                        <div class="input-group">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="NH4_N" type="checkbox" class="custom-control-input" value="NH4_N">
                                <label for="NH4_N" class="custom-control-label">&emsp;&emsp;NH4_N</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="NO2" type="checkbox" class="custom-control-input" value="NO2">
                                <label for="NO2" class="custom-control-label">&emsp;&emsp;NO2</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="NO3" type="checkbox" class="custom-control-input" value="NO3">
                                <label for="NO3" class="custom-control-label">&emsp;&emsp;NO3</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="Salinity_1" type="checkbox" class="custom-control-input" value="Salinity_1">
                                <label for="Salinity_1" class="custom-control-label">&emsp;&emsp;Salinity_1</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="Salinity_2" type="checkbox" class="custom-control-input" value="Salinity_2">
                                <label for="Salinity_2" class="custom-control-label">&emsp;&emsp;Salinity_2</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="Salinity_3" type="checkbox" class="custom-control-input" value="Salinity_3">
                                <label for="Salinity_3" class="custom-control-label">&emsp;&emsp;Salinity_3</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="pH_1" type="checkbox" class="custom-control-input" value="pH_1">
                                <label for="pH_1" class="custom-control-label">&emsp;&emsp;pH_1</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="pH_2" type="checkbox" class="custom-control-input" value="pH_2">
                                <label for="pH_2" class="custom-control-label">&emsp;&emsp;pH_2</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="pH_3" type="checkbox" class="custom-control-input" value="pH_3">
                                <label for="pH_3" class="custom-control-label">&emsp;&emsp;pH_3</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="O2_1" type="checkbox" class="custom-control-input" value="O2_1">
                                <label for="O2_1" class="custom-control-label">&emsp;&emsp;O2_1</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="O2_2" type="checkbox" class="custom-control-input" value="O2_2">
                                <label for="O2_2" class="custom-control-label">&emsp;&emsp;O2_2</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="O2_3" type="checkbox" class="custom-control-input" value="O2_3">
                                <label for="O2_3" class="custom-control-label">&emsp;&emsp;O2_3</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="ORP_1" type="checkbox" class="custom-control-input" value="ORP_1">
                                <label for="ORP_1" class="custom-control-label">&emsp;&emsp;ORP_1</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="ORP_2" type="checkbox" class="custom-control-input" value="ORP_2">
                                <label for="ORP_2" class="custom-control-label">&emsp;&emsp;ORP_2</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="ORP_3" type="checkbox" class="custom-control-input" value="ORP_3">
                                <label for="ORP_3" class="custom-control-label">&emsp;&emsp;ORP_3</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="WTemp_1" type="checkbox" class="custom-control-input" value="WTemp_1">
                                <label for="WTemp_1" class="custom-control-label">&emsp;&emsp;WTemp_1</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="WTemp_2" type="checkbox" class="custom-control-input" value="WTemp_2">
                                <label for="WTemp_2" class="custom-control-label">&emsp;&emsp;WTemp_2</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="WTemp_3" type="checkbox" class="custom-control-input" value="WTemp_3">
                                <label for="WTemp_3" class="custom-control-label">&emsp;&emsp;WTemp_3</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="Alkalinity" type="checkbox" class="custom-control-input" value="Alkalinity">
                                <label for="Alkalinity" class="custom-control-label">&emsp;&emsp;Alkalinity</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="TCBS" type="checkbox" class="custom-control-input" value="TCBS">
                                <label for="TCBS" class="custom-control-label">&emsp;&emsp;TCBS</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="TCBS綠菌" type="checkbox" class="custom-control-input" value="TCBS綠菌">
                                <label for="TCBS綠菌" class="custom-control-label">&emsp;&emsp;TCBS綠菌</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="Marine" type="checkbox" class="custom-control-input" value="Marine">
                                <label for="Marine" class="custom-control-label">&emsp;&emsp;Marine</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="螢光菌TCBS" type="checkbox" class="custom-control-input" value="螢光菌TCBS">
                                <label for="螢光菌TCBS" class="custom-control-label">&emsp;&emsp;螢光菌TCBS</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="chart_select[]" id="螢光菌Marine" type="checkbox" class="custom-control-input" value="螢光菌Marine">
                                <label for="螢光菌Marine" class="custom-control-label">&emsp;&emsp;螢光菌Marine</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
                <div class="form-inline" style = "width: 100% ; height: 40px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: auto">
                        <?php
                            utility_button("submit", "繪製");
                        ?>
                    </div>
                    <!--
                    <div style = "width: 1%"> </div>
                    <div style = "width: auto">
                        <?php
                            utility_button_onclick("chart.php", "繪製");
                        ?>
                    </div>
                    -->
                </div>

                <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
            </form>
            <!--//Search form-->
        </section>
        <?php
        
        require_once "utility.php";
        
        define("DRAW_QUERY", "draw_waterquality_query");

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            draw_waterquality_process();
        }
        
        function draw_waterquality_process() : void{
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $tank = isset($_POST["tank_select"]) ? $_POST["tank_select"] : null;

            // $chart_option = isset($_POST["chart_select"]) ? $_POST["chart_select"] : null;
            $chart_option = array() ;
            if(isset($_POST["chart_select"])) {
                foreach($_POST["chart_select"] as $selected) {
                    array_push($chart_option , $selected) ;
                }
            }
            
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
            if(is_null($tank)){
                echo "<script> Alert('請選擇tankid'); </script>";
                echo "<script> window.location.href='draw_water.php'; </script>";
                return;
            }
            else{
                $tank = "TankID = " . "'{$tank}'";
            }

            if(count($chart_option) == 0){
                echo "<script> Alert('請選擇繪製項目(至少一個)'); </script>";
                echo "<script> window.location.href='draw_water.php'; </script>";
                return;
            }
            $sql = "SELECT * FROM waterquality WHERE {$start_date} AND {$end_date} AND {$tank}";
            utility_session_insert(DRAW_QUERY, $sql);
            utility_session_insert("chart_option", $chart_option);
            
            echo "<script type='text/javascript'>";
            echo "window.location.href='chart'";
            echo "</script>";
        }
        ?>
        </p></div>
    </div>

    <!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
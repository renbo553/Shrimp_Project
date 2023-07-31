<?php

require_once "jpgraph/jpgraph.php";
require_once "jpgraph/jpgraph_line.php";
require_once "jpgraph/jpgraph_date.php";

require_once "config.php";
require_once "utility.php";

define("DRAW_QUERY", "draw_waterquality_query");
define("CHART_WIDTH", 800);
define("CHART_HEIGHT", 500);


waterqualit_diagram_process($mysqli);


function waterqualit_diagram_process($mysqli) : void{
    if(!utility_session_check(DRAW_QUERY)){
        utility_window_msg_back("No search result!!!");
        return;
    }
    $sql = $_SESSION[DRAW_QUERY];
    if(!utility_session_check("chart_option")){
        utility_window_msg_back("No chart option!!!");
        return;
    }
    $data_option = $_SESSION["chart_option"];

    $result = $mysqli->query($sql);

    $data_array = array($data_option);
    // 此為使用select_box的code
    // create_waterquality_chart($result, $data_array);
    // 此為使用多選radio button的code
    create_waterquality_chart($result, $data_option);
}


function create_waterquality_chart($result, $data_array) : void{    
    // create a graph and setup margin
    $graph = new Graph(CHART_WIDTH, CHART_HEIGHT);
    $graph->SetMargin(65, 60, 40, 80);
    $graph->SetMarginColor('white');

    // graph title
    $graph->title->Set('Water Quality');
    $graph->title->SetFont(FF_ARIAL, FS_BOLD, 12);

    // x-axis title
    $graph->SetScale("datlin");
    //$graph->xaxis->title->Set('Date');
    $graph->xaxis->title->SetMargin(5);
    $graph->xaxis->title->SetFont(FF_ARIAL, FS_NORMAL, 11);
    // setup the scales for x-axis
    $graph->xaxis->scale->SetDateFormat('Y/m/d');
    $graph->xaxis->SetTextLabelInterval(2);
    $graph->xaxis->SetLabelAngle(90);
    $graph->xgrid->Show();
    // y-axis title
    $y_title = "";
    $unit_array = [
        "NH4_N" => "(mg/l)",
        "NO2" => "(mg/l)",
        "NO3" => "(mg/l)",
        "Salinity_1" => "(‰)",
        "Salinity_2" => "(‰)",
        "Salinity_3" => "(‰)",
        "pH_1" => "(pH值)",
        "pH_2" => "(pH值)",
        "pH_3" => "(pH值)",
        "O2_1" => "(mg/l)",
        "O2_2" => "(mg/l)",
        "O2_3" => "(mg/l)",
        "ORP_1" => "(mV)",
        "ORP_2" => "(mV)",
        "ORP_3" => "(mV)",
        "WTemp_1" => "(℃)",
        "WTemp_2" => "(℃)",
        "WTemp_3" => "(℃)",
        "Alkalinity" => "(ppm)",
        "TCBS" => "(CFU/ml)",
        "TCBS綠菌" => "(CFU/ml)",
        "Marine" => "(CFU/ml)",
        "螢光菌TCBS" => "(CFU/ml)",
        "螢光菌Marine" => "(CFU/ml)",
    ];
    foreach($data_array as $data)
        $y_title .= ' ' . $data . $unit_array[$data];
    $graph->yaxis->title->Set($y_title);
    $graph->yaxis->title->SetMargin(20);
    $graph->yaxis->title->SetFont(FF_ARIAL, FS_NORMAL, 11);

    // add lines
    foreach($data_array as $data){
        $x_data = array();
        $y_data = array();
        
        foreach($result as $row){
            $x_data[] = strtotime($row['Date']);
            $y_data[] = floatval($row[$data]);
        }

        // set default value
        $min_date = min($x_data);
        $max_date = max($x_data);
        $it = new DateTime(date("Y-m-d", $min_date));
        while(strtotime($it->format("Y-m-d")) <= $max_date){
            if(!in_array(strtotime($it->format("Y-m-d")), $x_data)){
                $x_data[] = strtotime($it->format("Y-m-d"));
                $y_data[] = floatval('0.0');
            }
            $it->modify('+1 day');
        }
        array_multisort($x_data, $y_data);

        $lplot = new LinePlot($y_data, $x_data);
        
        //$lplot->mark->SetType(MARK_FILLEDCIRCLE);
        $graph->Add($lplot);
        
        //$lplot->value->show();
        $lplot->SetLegend($data);
        $lplot->value->SetFormat('%1.2f');
    }
    $graph->legend->SetPos(0.7, 0.075,'center','bottom');
    $graph->legend->SetFrameWeight(1);
    $graph->Stroke();
}

?>
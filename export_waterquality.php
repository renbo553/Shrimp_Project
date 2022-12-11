<?php

/* export_waterquality.php:
 *      This php file exports searched waterquality data to excel file
 * note:
 *      This php file redirects php output stream to an excel file.
 *      You should not modify this file with any html markup or try to perform standard output !!!
 *      Any additional data sent by php (eg. echo, printf) will pollute php output stream and corrupt the excel file.
 *      Other php files that do not meet the above requirements should not include or require this file either.
 */

define("WORKSHEET_NAME", "種蝦催熟室水質紀錄");
define("CACHE_QUERY", "search_waterquality_query");
define("FILENAME_PREFIX", "waterquality");

require_once "config.php";
require_once "utility.php";
require_once "export.php";

require_once "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\xlsx;


export_waterquality_process($mysqli);


/* function definition */
/* export_waterquality_process:
 *      export waterquality data to excel file
 * param:
 *      mysqli: database object
 */

function export_waterquality_process($mysqli) : void{
    /* fetch previous search sql query from session */
    if(!utility_session_check(CACHE_QUERY)){
        utility_window_msg("no search result", null);
        return;
    }
    $sql = $_SESSION[CACHE_QUERY];

    /* fetch previous search result */
    $result = $mysqli->query($sql);

    /* create a spreadsheet */
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle(WORKSHEET_NAME);

    $column_name = array();
    $column_name["日期"] = "Date";
    $column_name["Tank ID"] = "TankID";
    $column_name["NH4-N(mg/l)"] = "NH4_N";
    $column_name["NO2(mg/l)"] = "NO2";
    $column_name["NO3(mg/l)"] = "NO3";
    $column_name["Salinity_1"] = "Salinity_1";
    $column_name["Salinity_2"] = "Salinity_2";
    $column_name["Salinity_3"] = "Salinity_3";
    $column_name["pH_1"] = "pH_1";
    $column_name["pH_2"] = "pH_2";
    $column_name["pH_3"] = "pH_3";
    $column_name["O2(mg/l)_1"] = "O2_1";
    $column_name["O2(mg/l)_2"] = "O2_2";
    $column_name["O2(mg/l)_3"] = "O2_3";
    $column_name["ORP(mV)_1"] = "ORP_1";
    $column_name["ORP(mV)_2"] = "ORP_2";
    $column_name["ORP(mV)_3"] = "ORP_3";
    $column_name["WTemp_1"] = "WTemp_1";
    $column_name["WTemp_2"] = "WTemp_2";
    $column_name["WTemp_3"] = "WTemp_3";
    $column_name["Alkalinity(ppm)"] = "Alkalinity";
    $column_name["TCBS(CFU/ml)"] = "TCBS";
    $column_name["TCBS 綠菌(CFU/ml)"] = "TCBS綠菌";
    $column_name["Marine(CFU/ml)"] = "Marine";
    $column_name["螢光菌TCBS(CFU/ml)"] = "螢光菌TCBS";
    $column_name["螢光菌Marine(CFU/ml)"] = "螢光菌Marine";
    $column_name["Note"] = "Note";
    
    fill_vertical_spreadsheet($sheet, $column_name, $result);


    /* redirect output to a client's web browser (Xlsx) */
    $filename = FILENAME_PREFIX . '-spreadsheet-' . time() . '.xlsx';
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");

    /* close connection */
    $mysqli->close();
}

?>
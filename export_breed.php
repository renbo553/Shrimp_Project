<?php

/* export_breed.php:
 *      This php file exports searched breed data to excel file
 * note:
 *      This php file redirects php output stream to an excel file.
 *      You should not modify this file with any html markup or try to perform standard output !!!
 *      Any additional data sent by php (eg. echo, printf) will pollute php output stream and corrupt the excel file.
 *      Other php files that do not meet the above requirements should not include or require this file either.
 */

define("WORKSHEET_NAME", "種蝦生產紀錄");
define("CACHE_QUERY", "search_breed_query");
define("FILENAME_PREFIX", "breed");

require_once "config.php";
require_once "utility.php";
require_once "export.php";

require_once "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\xlsx;


export_breed_process($mysqli);


/* function definition */
/* export_breed_process:
 *      export breed data to excel file
 * param:
 *      mysqli: database object
 */

function export_breed_process($mysqli) : void{
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
    $column_name["家族"] = "家族";
    $column_name["眼標"] = "眼標";
    $column_name["剪眼日期"] = "剪眼日期";
    $column_name["剪眼體重"] = "剪眼體重";
    $column_name["進產卵室待產日期"] = "進產卵室待產日期";
    $column_name["生產體重"] = "生產體重";
    $column_name["卵巢進展階段(Stage)"] = "卵巢進展階段";
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
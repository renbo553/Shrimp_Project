<?php

/* export_feed.php:
 *      This php file exports searched feed data to excel file
 * note:
 *      This php file redirects php output stream to an excel file.
 *      You should not modify this file with any html markup or try to perform standard output !!!
 *      Any additional data sent by php (eg. echo, printf) will pollute php output stream and corrupt the excel file.
 *      Other php files that do not meet the above requirements should not include or require this file either.
 */
define("WORKSHEET_NAME", "種蝦餌料餵食紀錄");
define("CACHE_QUERY", "search_feed_query");
define("FILENAME_PREFIX", "feed");

require_once "config.php";
require_once "utility.php";
require_once "export.php";

require_once "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\xlsx;


export_feed_process($mysqli);


/* function definition */
/* export_feed_process:
 *      export feed data to excel file
 * param:
 *      mysqli: database object
 */

function export_feed_process($mysqli) : void{
    /* fetch previous search sql query from session */
    if(!utility_session_check(CACHE_QUERY)){
        utility_window_msg("no search result", null);
        return;
    }
    $sql = $_SESSION[CACHE_QUERY];

    $export_handler = new Export_Handler($mysqli);
    $filename = FILENAME_PREFIX . '-spreadsheet-' . time() . '.xlsx';
    $export_handler->export_feed($filename, $sql);
}

?>
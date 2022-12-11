<?php
/* export.php:
 *      A user-defined spreadsheet library.
 * note:
 *      This php file providing export relatived functions should not contain any
 *      html markup and try to perform standard output !!!
 *      Any additional data sent by php (eg. echo, printf) will pollute php output
 *      stream and corrupt the excel file.
 */

define('BORDER_COLOR', '00C0C0C0');
define('BACKGROUND_COLOR', '00CCFFFF');
define('COLUMN_NAME_COLOR', BACKGROUND_COLOR);
define('COLUMN_WIDTH', '10');

require_once "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;


/* fill_vertical_spreadsheet:
 *      fill a spreadsheet with sql query result vertically
 * param:
 *      sheet: the current active worksheet
 *      column_name: an array whose keys are spreadsheet column names and values are database column names
 *      result: sql query result
 */

function fill_vertical_spreadsheet($sheet, $column_name, $result) : void{
    /* create column index array and two name arrays */
    $column_index_array = array();
    $spreadsheet_column_name_array = array();
    $database_column_name_array = array();
    create_column_index_array($column_index_array, count($column_name));
    foreach($column_name as $key => $value){
        array_push($spreadsheet_column_name_array, $key);
        array_push($database_column_name_array, $value);
    }
    
    $row_index = 1;

    /* set spreadsheet size and alignment */
    // set column size
    foreach($column_index_array as $col_index)
        $sheet->getColumnDimension($col_index)->setWidth(COLUMN_WIDTH);
    // set horizontal alignment
    $sheet->getStyle(reset($column_index_array) . ':' . end($column_index_array))->getAlignment()->setHorizontal('center');
    // set border range, type and color
    $sheet->getStyle(reset($column_index_array) . '1' . ':' . end($column_index_array) . ($result->num_rows + 1))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color(BORDER_COLOR));

    /* write first row (column names) */
    for($col = 0; $col < count($column_name); ++$col)
        $sheet->setCellValue($column_index_array[$col] . $row_index, $spreadsheet_column_name_array[$col]);
    $sheet->getStyle(reset($column_index_array) . $row_index . ':' . end($column_index_array) . $row_index)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(COLUMN_NAME_COLOR);

    /* write each row of result */
    foreach($result as $row){
        ++$row_index;
        for($col = 0; $col < count($column_name); ++$col)
            $sheet->setCellValue($column_index_array[$col] . $row_index, $row[$database_column_name_array[$col]]);
        if(floor(($row_index - 2) / 5) % 2 == 1)
            $sheet->getStyle(reset($column_index_array) . $row_index . ':' . end($column_index_array) . $row_index)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(BACKGROUND_COLOR);
    }
}


/* create_column_index_array:
 *      create a array = { "A", "B", "C", ... , "AA", "AB", "AC", ... };
 * param:
 *      column_index_array: return array
 *      size: array size
 */

function create_column_index_array(&$column_index_array, $size) : void{
    $index = 'A';
    for($i = 0; $i < $size; ++$i)
        array_push($column_index_array, $index++);
}


?>
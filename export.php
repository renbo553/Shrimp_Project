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
define('UNIT_WIDTH', 1);

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


class Export_Handler
{
    private const OVARY_SHEET_NAME = "種蝦卵巢成熟紀錄";
    private const BREED_SHEET_NAME = "種蝦生產紀錄";
    private const FEED_SHEET_NAME = "種蝦餌料餵食紀錄";
    private const WATERQUALITY_SHEET_NAME = "種蝦催熟室水質紀錄";

    private const BREED_COLUMN_ARRAY = array(
        array("家族", "家族", 10),
        array("眼標", "眼標", 10),
        array("剪眼日期", "剪眼日期", 10),
        array("剪眼體重", "剪眼體重", 10),
        array("進產卵室待產日期", "進產卵室待產日期", 20),
        array("生產體重", "生產體重", 10),
        array("卵巢進展階段(Stage)", "卵巢進展階段", 20),
        array("公蝦家族", "公蝦家族", 10),
        array("交配方式", "交配方式", 10)
    );
    private const FEED_COLUMN_ARRAY_1 = array(
        array("Date", 1),
        array("Tank", 1),
        array("Shrimp", 1),
        array("NO.Shrimp", 2),
        array("NO.Dead", 2),
        array("NO.Moults", 2),
        array("Average Weight(g)", 2),
        array("Total Weight(g)", 1),
        array("09:00 Feeding", 4),
        array("11:00 Feeding", 4),
        array("14:00 Feeding", 4),
        array("16:00 Feeding", 4),
        array("19:00 Feeding", 4),
        array("23:00 Feeding", 4),
        array("03:00 Feeding(Auto)", 4),
        array("Feeding ratio(%)", 1),
        array("Observation", 1),
    );
    private const FEED_COLUMN_ARRAY_2 = array(
        array("", "Date", 10),
        array("", "Tank", 10),
        array("", "shrimp", 10),
        array("Male", "No_Shrimp_Male", 10),
        array("Female", "No_Shrimp_Female", 10),
        array("Male", "No_Dead_Male", 10),
        array("Female", "No_Dead_Female", 10),
        array("Male", "No_Moults_Male", 10),
        array("Female", "No_Moults_Female", 10),
        array("Male", "Avg_Weight_Male", 10),
        array("Female", "Avg_Weight_Female", 10),
        array("", "Total_Weight", 15),
        array("Species", "9_species", 10),
        array("Weight(g)", "9_weight", 10),
        array("Remain(g)", "9_remain", 10),
        array("Eating(g)", "9_eating", 10),
        array("Species", "11_species", 10),
        array("Weight(g)", "11_weight", 10),
        array("Remain(g)", "11_remain", 10),
        array("Eating(g)", "11_eating", 10),
        array("Species", "14_species", 10),
        array("Weight(g)", "14_weight", 10),
        array("Remain(g)", "14_remain", 10),
        array("Eating(g)", "14_eating", 10),
        array("Species", "16_species", 10),
        array("Weight(g)", "16_weight", 10),
        array("Remain(g)", "16_remain", 10),
        array("Eating(g)", "16_eating", 10),
        array("Species", "19_species", 10),
        array("Weight(g)", "19_weight", 10),
        array("Remain(g)", "19_remain", 10),
        array("Eating(g)", "19_eating", 10),
        array("Species", "23_species", 10),
        array("Weight(g)", "23_weight", 10),
        array("Remain(g)", "23_remain", 10),
        array("Eating(g)", "23_eating", 10),
        array("Species", "3_species", 10),
        array("Weight(g)", "3_weight", 10),
        array("Remain(g)", "3_remain", 10),
        array("Eating(g)", "3_eating", 10),
        array("", "Feeding_Ratio", 15),
        array("", "Observation", 30),
    );
    private const WATERQUALITY_COLUMN_ARRAY = array(
        array("日期", "Date", 10),
        array("Tank ID", "TankID", 10),
        array("NH4-N(mg/l)", "NH4_N", 15),
        array("NO2(mg/l)", "NO2", 10),
        array("NO3(mg/l)", "NO3", 10),
        array("Salinity_1", "Salinity_1", 10),
        array("Salinity_2", "Salinity_2", 10),
        array("Salinity_3", "Salinity_3", 10),
        array("pH_1", "pH_1", 10),
        array("pH_2", "pH_2", 10),
        array("pH_3", "pH_3", 10),
        array("O2(mg/l)_1", "O2_1", 10),
        array("O2(mg/l)_2", "O2_2", 10),
        array("O2(mg/l)_3", "O2_3", 10),
        array("ORP(mV)_1", "ORP_1", 10),
        array("ORP(mV)_2", "ORP_2", 10),
        array("ORP(mV)_3", "ORP_3", 10),
        array("WTemp_1", "WTemp_1", 10),
        array("WTemp_2", "WTemp_2", 10),
        array("WTemp_3", "WTemp_3", 10),
        array("Alkalinity(ppm)", "Alkalinity", 15),
        array("TCBS(CFU/ml)", "TCBS", 15),
        array("TCBS 綠菌(CFU/ml)", "TCBS綠菌", 20),
        array("Marine(CFU/ml)", "Marine", 15),
        array("螢光菌TCBS(CFU/ml)", "螢光菌TCBS", 20),
        array("螢光菌Marine(CFU/ml)", "螢光菌Marine", 20),
        array("Note", "Note", 30),
    );

    private $mysqli;
    private $spreadsheet;
    private $sheet;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }

    public function export_ovary($filename, $sql_query) : void{
        /* fetch export data */
        $result = $this->mysqli->query($sql_query);

        $this->create_spreadsheet(self::OVARY_SHEET_NAME);

        $min_date;
        $max_date;
        $eyetag_to_row_index = array();
        $date_to_column_index = array();
        $row_index = 1;
        foreach($result as $row){
            // update min and max date
            $d = new Date_Tuple($row["Date"]);
            if(!isset($min_date))
                $min_date = $d;
            if(!isset($max_date))
                $max_date = $d;
            $min_date = $min_date->greater_than($d) ? $d : $min_date;
            $max_date = $max_date->less_than($d) ? $d : $max_date;
            // append row index array
            if(!isset($eyetag_to_row_index[$row["眼標"]]))
                $eyetag_to_row_index[$row["眼標"]] = ++$row_index;
        }
        $column_size = 1;
        for($d = new Date_Tuple($min_date->get_date()); ; $d->advance()){
            ++$column_size;
            if($d->equal_to($max_date))
                break;
        }
        for($col = 1, $d = new Date_Tuple($min_date->get_date()); $col < $column_size; ++$col, $d->advance()){
            $date_to_column_index[$d->get_date()] = $col;
        }

        /* write spreadsheet */
        // set column size
        for($col = 1; $col < 10; ++$col)
            $this->sheet->getColumnDimensionByColumn($col)->setWidth(UNIT_WIDTH * 10);
        // set horizontal alignment
        //$this->sheet->getStyleByColumn('A1:' . stringFromColumn)->getAlignment()->setHorizontal('center');
        // set border range, type and color
        //$this->sheet->getStyle(reset($column_index_array) . '1' . ':' . end($column_index_array) . ($row_index))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color(BORDER_COLOR));

        // write first row
        $this->sheet->setCellValueByColumnAndRow(1 , 1, "眼標");
        for($col = 1, $d = new Date_Tuple($min_date->get_date()); $col < $column_size; ++$col, $d->advance())
            $this->sheet->setCellValueByColumnAndRow($col + 1 , 1, $d->get_date());
        //$this->sheet->getStyle(reset($column_index_array) . '1' . ':' . end($column_index_array) . '1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(COLUMN_NAME_COLOR);

        // write first column
        foreach($eyetag_to_row_index as $eyetag => $row){
            $this->sheet->setCellValueByColumnAndRow(1 , $row, $eyetag);
        }

        //
        foreach($result as $row){
            $d = new Date_tuple($row["Date"]);
            $this->sheet->setCellValueByColumnAndRow($date_to_column_index[$d->get_date()] + 1 , $eyetag_to_row_index[$row["眼標"]], $row["Stage"]);
        }


        $this->output_redirection($filename);
    }

    public function export_breed($filename, $sql_query) : void
    {
        /* fetch export data */
        $result = $this->mysqli->query($sql_query);

        $this->create_spreadsheet(self::BREED_SHEET_NAME);

        /* write spreadsheet */
        $column_index_array = $this::create_column_index_array(count(self::BREED_COLUMN_ARRAY));
        // set column size
        for($col = 0; $col < count($column_index_array); ++$col)
            $this->sheet->getColumnDimension($column_index_array[$col])->setWidth(UNIT_WIDTH * self::BREED_COLUMN_ARRAY[$col][2]);
        // set horizontal alignment
        $this->sheet->getStyle(reset($column_index_array) . ':' . end($column_index_array))->getAlignment()->setHorizontal('center');
        // set border range, type and color
        $this->sheet->getStyle(reset($column_index_array) . '1' . ':' . end($column_index_array) . ($result->num_rows + 1))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color(BORDER_COLOR));

        // write first row
        for($col = 0; $col < count($column_index_array); ++$col)
            $this->sheet->setCellValue($column_index_array[$col] . '1', self::BREED_COLUMN_ARRAY[$col][0]);
        $this->sheet->getStyle(reset($column_index_array) . '1' . ':' . end($column_index_array) . '1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(COLUMN_NAME_COLOR);

        // write result
        $row = 1;
        foreach($result as $result_row){
            ++$row;
            for($col = 0; $col < count($column_index_array); ++$col){
                $this->sheet->setCellValue($column_index_array[$col] . $row, $result_row[self::BREED_COLUMN_ARRAY[$col][1]]);
            }
        }

        $this->output_redirection($filename);
    }

    public function export_feed($filename, $sql_query) : void{
        /* fetch export data */
        $result = $this->mysqli->query($sql_query);

        $this->create_spreadsheet(self::FEED_SHEET_NAME);

        /* write spreadsheet */
        $column_index_array = $this::create_column_index_array(count(self::FEED_COLUMN_ARRAY_2));
        // set column size
        for($col = 0; $col < count($column_index_array); ++$col)
            $this->sheet->getColumnDimension($column_index_array[$col])->setWidth(UNIT_WIDTH * self::FEED_COLUMN_ARRAY_2[$col][2]);
        // set horizontal alignment
        $this->sheet->getStyle(reset($column_index_array) . ':' . end($column_index_array))->getAlignment()->setHorizontal('center');
        // set border range, type and color
        $this->sheet->getStyle(reset($column_index_array) . '1' . ':' . end($column_index_array) . ($result->num_rows + 2))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color(BORDER_COLOR));

        // write first row
        $col_index = 0;
        for($col = 0; $col < count(self::FEED_COLUMN_ARRAY_1); ++$col){
            $this->sheet->setCellValue($column_index_array[$col_index] . '1', self::FEED_COLUMN_ARRAY_1[$col][0]);
            if(self::FEED_COLUMN_ARRAY_1[$col][1] > 1){
                $this->sheet->mergeCells($column_index_array[$col_index] . '1' . ':' . $column_index_array[$col_index + self::FEED_COLUMN_ARRAY_1[$col][1] - 1] . '1');
            }
            $col_index += self::FEED_COLUMN_ARRAY_1[$col][1];
        }
        $this->sheet->getStyle(reset($column_index_array) . '1' . ':' . end($column_index_array) . '1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(COLUMN_NAME_COLOR);
        // write second row
        for($col = 0; $col < count(self::FEED_COLUMN_ARRAY_2); ++$col){
            if(self::FEED_COLUMN_ARRAY_2[$col][0] != "")
                $this->sheet->setCellValue($column_index_array[$col] . '2', self::FEED_COLUMN_ARRAY_2[$col][0]);
        }
        $this->sheet->getStyle(reset($column_index_array) . '2' . ':' . end($column_index_array) . '2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(COLUMN_NAME_COLOR);

        // write result
        $row = 2;
        foreach($result as $result_row){
            ++$row;
            for($col = 0; $col < count($column_index_array); ++$col){
                $this->sheet->setCellValue($column_index_array[$col] . $row, $result_row[self::FEED_COLUMN_ARRAY_2[$col][1]]);
            }
        }

        $this->output_redirection($filename);
    }

    public function export_waterquality($filename, $sql_query) : void
    {
        /* fetch export data */
        $result = $this->mysqli->query($sql_query);

        $this->create_spreadsheet(self::WATERQUALITY_SHEET_NAME);

        /* write spreadsheet */
        $column_index_array = $this::create_column_index_array(count(self::WATERQUALITY_COLUMN_ARRAY));
        // set column size
        for($col = 0; $col < count($column_index_array); ++$col)
            $this->sheet->getColumnDimension($column_index_array[$col])->setWidth(UNIT_WIDTH * self::WATERQUALITY_COLUMN_ARRAY[$col][2]);
        // set horizontal alignment
        $this->sheet->getStyle(reset($column_index_array) . ':' . end($column_index_array))->getAlignment()->setHorizontal('center');
        // set border range, type and color
        $this->sheet->getStyle(reset($column_index_array) . '1' . ':' . end($column_index_array) . ($result->num_rows + 1))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color(BORDER_COLOR));

        // write first row
        for($col = 0; $col < count($column_index_array); ++$col)
            $this->sheet->setCellValue($column_index_array[$col] . '1', self::WATERQUALITY_COLUMN_ARRAY[$col][0]);
        $this->sheet->getStyle(reset($column_index_array) . '1' . ':' . end($column_index_array) . '1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(COLUMN_NAME_COLOR);

        // write result
        $row = 1;
        foreach($result as $result_row){
            ++$row;
            for($col = 0; $col < count($column_index_array); ++$col){
                $this->sheet->setCellValue($column_index_array[$col] . $row, $result_row[self::WATERQUALITY_COLUMN_ARRAY[$col][1]]);
            }
        }

        $this->output_redirection($filename);
    }

    private function create_spreadsheet($sheet_name) : void
    {
        $this->spreadsheet = new Spreadsheet();
        $this->sheet = $this->spreadsheet->getActiveSheet();
        $this->sheet->setTitle($sheet_name);
    }

    private function output_redirection($filename) : void
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        $writer = new Xlsx($this->spreadsheet);
        $writer->save("php://output");
    }

    private static function create_column_index_array($size) : array
    {
        $column_index_array = array();
        $index = 'A';
        for($i = 0; $i < $size; ++$i)
            array_push($column_index_array, $index++);
        return $column_index_array;
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

class Date_Tuple{
    private $year_array;
    private $year;
    private $month;
    private $day;
    
    public function __construct($date){
        $this->set_date($date);
    }
    
    public function set_date($date) : void{
        $this->year = intval(strtok($date, "-"));
        $this->month = intval(strtok("-"));
        $this->day = intval(strtok("-"));
        $this->year_array = self::create_year_array($this->year);
    }
    
    public function get_date() : string{
        return "{$this->year}-{$this->month}-{$this->day}";
    }
    
    public function advance() : void{
        if(++$this->day > $this->year_array[$this->month]){
            $this->day = 1;
            if(++$this->month > 12){
                $this->month = 1;
                $this->year_array = self::create_year_array(++$this->year);
            }
        }
    }
    
    public function less_than($d) : bool{
        return self::compare($this, $d) == -1;
    }
    
    public function equal_to($d) : bool{
        return self::compare($this, $d) == 0;
    }
    
    public function greater_than($d) : bool{
        return self::compare($this, $d) == 1;
    }
    
    public static function is_leap_year($year) : bool{
        return (($year % 4 == 0) && ($year % 100 != 0 || $year % 400 == 0));
    }
    
    public static function create_year_array($year) : array{
        return array(
            1 => 31,
            2 => (self::is_leap_year($year) ? 29 : 28),
            3 => 31,
            4 => 30,
            5 => 31,
            6 => 30,
            7 => 31,
            8 => 31,
            9 => 30,
            10 => 31,
            11 => 30,
            12 => 31,
        );
    }
    
    public static function compare($date1, $date2) : int{
        if($date1->year != $date2->year)
            return ($date1->year < $date2->year ? -1 : 1);
        if($date1->month != $date2->month)
            return ($date1->month < $date2->month ? -1 : 1);
        if($date1->day != $date2->day)
            return ($date1->day < $date2->day ? -1 : 1);
        return 0;
    }
};


?>
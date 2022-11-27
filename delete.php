<?php
/* delete.php
 *      delete a data from database
 */

require_once "config.php";
require_once "utility.php";

delete_data_process($mysqli);


/*** function definition ***/
/* delete_data_process:
 *      delete a data
 * param:
 *      mysqli: database object
 */

function delete_account_process($mysqli) : void{
    if(!isset($_SESSION)) {
        session_start();
        if (!isset($_SESSION["userid"]) || $_SESSION["authority"] > 1){
            // permission not enough
            header("location:home");
        }       
    }

    /* Delete account */
    $id = $_GET['id'];
    $sql = null;
    switch($_GET['type']){
        case 'ovary':
            $sql = "DELETE FROM ovary WHERE id ={$id}";
            break;
        case 'breed':
            $sql = "DELETE FROM breed WHERE id ={$id}";
            break;
        case 'location':
            $sql = "DELETE FROM location WHERE id ={$id}";
            break;
        case 'water':
            $sql = "DELETE FROM waterquality WHERE id ={$id}";
            break;
        case 'feed':
            $sql = "DELETE FROM feed WHERE id ={$id}";
            break;
        default:
            $sql = "";
            break;
    }
    // sql query string
    $stmt = null;
    if(!($stmt = $mysqli->prepare($sql))){
        $msg = "刪除失敗  :  Prepare failed.";
		utility_window_msg($msg, null);
		return;
    }
    if (!$stmt->execute()) {
        $msg = "刪除失敗  :  Execute failed.";
		utility_window_msg($msg, null);
		return;
    } 
    // close connection
    $stmt->close();

    /* show message window */
    $msg = "刪除成功";
    utility_window_msg_back($msg);
}

?>
<?php
/* delete_account.php
 *      delete an account from database
 */

require_once "config.php";
require_once "utility.php";

delete_account_process($mysqli);


/*** function definition ***/
/* delete_account_process:
 *      delete an account
 * param:
 *      mysqli: database object
 */

function delete_account_process($mysqli) : void{
    if(!isset($_SESSION)) {
        session_start();
        if (!isset($_SESSION["userid"]) || $_SESSION["authority"] != 0){
            // not adminstrator
            header("location:home");
        }       
    }

    /* Delete account */
    $sql = "DELETE FROM users WHERE id ={$_GET['id']}";
    // sql query string
    $stmt = null;
    if(!($stmt = $mysqli->prepare($sql))){
        $msg = "刪除帳號失敗  :  Prepare failed.";
		utility_window_msg($msg, null);
		return;
    }
    if (!$stmt->execute()) {
        $msg = "刪除帳號失敗  :  Execute failed.";
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
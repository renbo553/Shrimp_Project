<?php 
/* utility.php
 *      A general utility library.
 */

/*** function definition ***/
/* utility_window_msg:
 * 		show window message
 * param:
 * 		msg: output message
 * 		url: destination url (may be null)
 */

function utility_window_msg($msg, $url) : void{
	echo "<script type='text/javascript'>";
	echo "window.alert('{$msg}');";
	if(!is_null($url)){
		// url is not empty
		echo "window.location.href='{$url}'";
	}
	echo "</script>";
}


/* utility_window_msg_back:
 * 		show window message and back to previous page
 * param:
 * 		msg: output message
 */

function utility_window_msg_back($msg) : void{
	echo "<script type='text/javascript'>";
	echo "window.alert('{$msg}');";
	echo "history.back()";
	echo "</script>";
}

?>
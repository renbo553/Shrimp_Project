<?php
/* logout.php
 *      destroy the session and back to home page with a message window.
 */

require_once "utility.php";


/* destroy session */
session_start();
session_unset();
session_destroy();

/* show message window */
$msg = "登出成功";
$url = "home";
utility_window_msg($msg, $url);
exit();// may not be necessary

?>
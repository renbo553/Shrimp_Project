<?php
/*
 * Destroy the session.
 * Back to home page with a message window.
 */
session_start();
session_unset();
session_destroy();

$url = "home";
echo "<script type='text/javascript'>";
echo "window.alert('登出成功');";
echo "window.location.href='$url'";
echo "</script>"; 
exit();// may not be necessary

?>
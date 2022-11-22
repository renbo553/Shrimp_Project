<?php
  if(!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["userid"])||$_SESSION["authority"]!=0)
        header("location:home");
  };
  require_once("config.php");
  $id = $_GET['id'];
  $sql = "DELETE FROM users WHERE id =" .$_GET['id'];
  $stmt = $mysqli->prepare($sql);
  if (!$stmt) {
      die($mysqli->error);
  }
  if ($stmt->execute()) {
      echo "Delete successfully";
      $stmt->close();
      $mysqli->close();
    } else {
      echo "Error deleting record: " . $mysqli->error;
    }
    
  echo "<script type='text/javascript'>";
  echo "window.alert('刪除成功');";
  echo "history.back()";
  echo "</script>"; 
?>
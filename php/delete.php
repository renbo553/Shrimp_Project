<?php
  if(!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["userid"])||$_SESSION["authority"]>1)
      header("location:home");
  };
  require_once("config.php");
  $id = $_GET['id'];
  switch($_GET['type'])
  {
      case 'ovary':
        $sql = "DELETE FROM ovary WHERE id =" .$_GET['id'];
        break;
      case 'breed':
        $sql = "DELETE FROM breed WHERE id =" .$_GET['id'];
        break;
      case 'location':
        $sql = "DELETE FROM location WHERE id =" .$_GET['id'];
        break;
      case 'water':
        $sql = "DELETE FROM waterquality WHERE id =" .$_GET['id'];
        break;
      case 'feed':
        $sql = "DELETE FROM feed WHERE id =" .$_GET['id'];
        break;
  }
  
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
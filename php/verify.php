<?php
if(!isset($_SESSION)) {
	session_start();
	if (!isset($_SESSION["userid"])||$_SESSION["authority"]!=0)
        header("location:home");
};
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>About</title>
	<!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<section>
        <?php
		    require_once("config.php");
            $sql = "SELECT * FROM users order by id asc";
            $result = mysqli_query($mysqli,$sql);
            echo "<br>";
            echo "<table style='text-align:center;' align='center' width='80%'  border='1px solid gray' text-align='center'>";
            echo "<thead>
                <th>Index</th>
                <th>User Name</th>
                <th>Authority</th>
                <th>Created at</th>
                <th></th> 
                </thead><tbody>";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
				switch($row["authority"])
				{
					case 0:
						$authority="root";
						break;
					case 1:
						$authority="高階";
						break;
					case 2:
						$authority="低階";
						break;
					case 10:
						$authority="未驗證";
						break;
					default:
						$authority="未定義";
				}
                printf("<tr><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td>",$row["id"], $row["username"], $authority, $row["created_at"]);
                echo '<a href="mdf_authority?id=' . $row['id'] . '&username='.$row["username"].' &authority='.$row["authority"].'">變更權限</a>
                      <a href="delete_account?id=' . $row['id'] . '" onclick="return confirm(\'確定要刪除帳號:  ' . $row['username'] . '    嗎?\');">刪除</a>';
            }
            echo "</tbody></table>";
			echo "<br>";
            mysqli_free_result($result);
            mysqli_close($mysqli);

        ?>
	</section>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
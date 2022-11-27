<?php
if (!isset($_SESSION)) {
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
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			$id = $_GET['id'];
			switch($_GET['authority'])
			{
				case 10:
					$auth="未驗證";
					break;
				case 2:
					$auth="低階";
					break;
				case 1:
					$auth="高階";
					break;
				case 0:
					$auth="root";
					break;
				default:
					$auth="未定義";
			}
		}
		$input_err = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id = trim($_POST["id"]);
			$param1 = trim($_POST["authority"]);
			$sql = "UPDATE  users SET authority='{$param1}' WHERE id = $id";
			$result = mysqli_query($mysqli,$sql);
			if (mysqli_affected_rows($mysqli)>0) {
				echo "<script type='text/javascript'>";
				echo "window.alert('資料已更新');";
				echo "window.location.href='verify'";
				echo "</script>"; 
			}
			elseif(mysqli_affected_rows($mysqli)==0) {
				echo "<script type='text/javascript'>";
				echo "window.alert('無資料更新');";
				echo "window.location.href='verify'";
				echo "</script>"; 
			}
			else {
				echo "執行失敗，錯誤訊息: " . mysqli_error($mysqli);
			}
			mysqli_close($mysqli);
		}
		?>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<br>
			<?php
				echo
					'<div class="form-group row">
						<label for="text1" class="col-6 col-form-label">Index</label>
						<div class="col-6">
							<div class="input-group">
								<input id="text" name="id"  value='.$_GET['id'].' class="form-control" readonly>
							</div>
						</div>
					</div>
                    <div class="form-group row">
						<label for="text1" class="col-6 col-form-label">User Name</label>
						<div class="col-6">
							<div class="input-group">
								<input id="text1" name="username"  value='.$_GET['username'].' class="form-control" readonly>
							</div>
						</div>
					</div>
				<div class="form-group row">
					<label for="select1" class="col-6 col-form-label">權限</label> 
					<div class="col-6">
					<select id="select1" name="authority" class="custom-select">
						<option value='.$auth.'>'.$auth.'</option>
						<option value=10>未驗證</option>
						<option value=2>低階</option>
                        <option value=1>高階</option>
					</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="offset-6 col-6">
					<input name="submit" type="submit" class="btn btn-primary" value="提交">
					</div>
				</div>';
			?>
		</form>
	</section>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
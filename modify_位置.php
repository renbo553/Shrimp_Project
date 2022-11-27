<?php
if (!isset($_SESSION)) {
	session_start();
	if (!isset($_SESSION["userid"]) || $_SESSION["authority"] > 1)
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
		}
		$input_err = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id = trim($_POST["id"]);
			$param1 = trim($_POST["eye"]);
			$param2 = trim($_POST["family"]);
			$param3 = trim($_POST["birthday"]);
			$param4 = trim($_POST["cutday"]);
			$param5 = trim($_POST["date"]);
			$param6 = trim($_POST["location"]);
			$sql = "UPDATE  location SET 眼標='{$param1}', 家族='{$param2}', 出生日='{$param3}', 剪眼日='{$param4}' , Date='{$param5}' , Tank='{$param6}' WHERE id = $id";
			$result = mysqli_query($mysqli, $sql);
			if (mysqli_affected_rows($mysqli) > 0) {
				echo "<script type='text/javascript'>";
				echo "window.alert('資料已更新');";
				echo "window.location.href='find_位置'";
				echo "</script>";
			} elseif (mysqli_affected_rows($mysqli) == 0) {
				echo "<script type='text/javascript'>";
				echo "window.alert('無資料更新');";
				echo "window.location.href='find_位置'";
				echo "</script>";
			} else {
				echo "執行失敗，錯誤訊息: " . mysqli_error($mysqli);
			}
			mysqli_close($mysqli);
		}
		?>
		<form id="myFile" method="post" enctype="multipart/form-data">
			<?php
			echo
			'<table class="table">
					<tr>
						<td>上傳紙本圖片</td>
						<td>
							<input accept="image/*" type="file" name="fileField" id="uploadimage">
						</td>
					</tr>
					<tr>
						<td>
							圖片預覽
						</td>
						<td>
							<img style="width: 600px;"  id="show_image" src="' . $_GET['image'] . '">
						</td>
					</tr>
					<tr>
						<td>
							Index
						</td>
						<td>
							<div class="input-group">
								<input id="text" name="id"  value="' . $_GET['id'] . '" class="form-control" readonly>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							眼標
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fa fa-eye"></i>
									</div>
								</div>
								<input id="text1" name="eye"  value="' . $_GET["eye"] . '" type="text" class="form-control">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							家族
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fa fa-home"></i>
									</div>
								</div>
								<input id="text2" name="family" value="' . $_GET["family"] . '" type="text" class="form-control">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							出生日
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fa fa-calendar-o"></i>
									</div>
								</div>
								<input id="text3" name="birthday" type="date" value=' . $_GET["birthday"] . '>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							剪眼日
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fa fa-calendar-o"></i>
									</div>
								</div>
								<input id="text4" name="cutday" type="date" value=' . $_GET["cutday"] . ' >
							</div>
						</td>
					</tr>
					<tr>
						<td>
							日期
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fa fa-calendar-o"></i>
									</div>
								</div>
								<input id="text5" name="date" type="date"  value=' . $_GET["date"] . ' >
							</div>
						</td>
					</tr>
					<tr>
						<td>
							位置(Tank)
						</td>
						<td>
							<select id="select1" name="location" class="custom-select">
								<option value="' . $_GET['location'] . '" selected disabled hidden>' . $_GET['location'] . '</option>
								<option value=""></option>
								<option value="M1">M1</option>
								<option value="M2">M2</option>
								<option value="M3">M3</option>
								<option value="M4">M4</option>
							</select>
						</td>
					</tr>
				</table>';
			?>
		</form>
		<button type="button" class="btn btn-primary" onclick="upload()">修改</button>
		<div id="backmsg"></div>
		<br>
	</section>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
    
		<script>
			function upload() {
				// 此處是 javascript 寫法
				// var myForm = document.getElementById('myFile');
				// 底下是 jQuery 的寫法
				var myForm = $("#myFile")[0];
				var formData = new FormData(myForm);

				$.ajax({
					url: 'Update_位置.php',
					type: 'POST',
					data: formData,
					cache: false,
					//下面兩者一定要false
					processData: false,
					contentType: false,

					success: function(backData) {
						window.alert(backData);
						if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
							window.location.href = 'find_位置';
							$("#backmsg").html(backData);
						}

					},
					error: function() {
						window.alert("上傳失敗...");
						$('#backmsg').html("上傳失敗...");
					},
				});
			}

			var imageProc = function(input) {
				if (input.files && input.files[0]) {
					// 建立一個 FileReader 物件
					var reader = new FileReader();
					// 當檔案讀取完後，所要進行的動作
					reader.onload = function(e) {
						// 顯示圖片
						$('#show_image').attr("src", e.target.result).css("height", "200px").css("width", "200px");
						// // 將 DataURL 放到表單中
						// $("input[name='imagestring']").val(e.target.result);
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
			$(document).ready(function() {
				// 綁定事件
				$("#uploadimage").change(function() {
					imageProc(this);
				});

			});
		</script>
</body>

</html>
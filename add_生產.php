<?php
if (!isset($_SESSION)) {
	session_start();
	if (!isset($_SESSION["userid"]) || $_SESSION["authority"] == 10)
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
		require_once "config.php";
		$input_err = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// if (!strlen(trim($_POST["family"]))) {
			// 	$input_err = "Please enter '家族'.";
			// 	echo $input_err;
			// }
			// if (!strlen(trim($_POST["eye"]))) {
			// 	$input_err = "Please enter '眼標'.";
			// 	echo $input_err;
			// }
			// if (!strlen(trim($_POST["cutday"]))){
			// 	$input_err = "Please follow the format of '剪眼日期'.</br>";
			// 	echo $input_err;
			// }
			// if(!strlen(trim($_POST["cutweight"]))){
			// 	$input_err = "Please enter '剪眼體重'.</br>";
			// 	if(floatval (trim($_POST["cutweight"])<=0)){
			// 		$input_err = "'剪眼體重' out of range.</br>";
			// 	}
			// 	echo $input_err;
			// }
			// if(strlen(trim($_POST["spawningroomdate"]))!=6){
			// 	$input_err = "Please follow the format of '進產卵室待產日期'.</br>";
			// 	echo $input_err;
			// }
			// if(!strlen(trim($_POST["spawningweight"]))){
			// 	$input_err = "Please enter '生產體重'.</br>";
			// 	if(floatval (trim($_POST["spawningweight"])<=0)){
			// 		$input_err = "'生產體重' out of range.</br>";
			// 	}
			// 	echo $input_err;
			// }
			// if(!strlen(trim($_POST["ovarystate"]))){
			// 	$input_err = "Please enter '卵巢進展階段(Stage)'.</br>";
			// 	echo $input_err;
			// }
			if (!strlen($input_err)) {
				$param1 = trim($_POST["family"]);
				$param2 = trim($_POST["eye"]);
				$param3 = trim($_POST["cutday"]);
				$param4 = trim($_POST["cutweight"]);
				$param5 = trim($_POST["spawningroomdate"]);
				$param6 = trim($_POST["spawningweight"]);
				$param7 = trim($_POST["ovarystate"]);
				$sql = "INSERT INTO breed (家族, 眼標, 剪眼日期, 剪眼體重, 進產卵室待產日期, 生產體重, 卵巢進展階段) VALUES (?, ?, ?, ?, ?, ?, ?)";
				if ($stmt = $mysqli->prepare($sql)) {
					// Bind variables to the prepared statement as parameters
					$stmt->bind_param("sssssss", $param1, $param2, $param3, $param4, $param5, $param6, $param7);

					if ($stmt->execute()) {
						// Redirect to login page
						echo "Upload successful!";
						$stmt->close();
						$mysqli->close();
						$url = "find_生產";
						echo "<script type='text/javascript'>";
						echo "window.alert('新增成功');";
						echo "window.location.href='$url'";
						echo "</script>";
					} else {
						echo "Something went wrong. Please try again later.";
					}
				}
			}
		}
		?>
		<form id="myFile" method="post" enctype="multipart/form-data">
			<table class="table">
					<th>上傳紙本圖片</th>
					<td>
						<input accept="image/*" type="file"  name="fileField" id="uploadimage">
					</td>
					<tr></tr>
					<th>圖片預覽</th>
					<td>
						<img id="show_image" src="">
					</td>
					<tr></tr>
					<th>眼標</th>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-eye"></i>
								</div>
							</div>
							<input id="text1" name="eye" placeholder="ex.W999" type="text" class="form-control">
						</div>
					</td>
					<tr></tr>
					<th>家族</th>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-home"></i>
								</div>
							</div>
							<input id="text2" name="family" placeholder="ex.F1310" type="text" class="form-control">
						</div>
					</td>
					<tr></tr>
					<th>剪眼日期</th>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar-o"></i>
								</div>
							</div>
							<input id="text3" name="cutday" type="date">
						</div>
					</td>
					<tr></tr>
					<th>剪眼體重</th>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-balance-scale"></i>
								</div>
							</div>
							<input id="text4" name="cutweight" placeholder="ex.61.2" type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(g)</div>
							</div>
						</div>
					</td>
					<tr></tr>
					<th>進產卵室待產日期</th>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar-o"></i>
								</div>
							</div>
							<input id="text5" name="spawningroomdate" type="date">
						</div>
					</td>
					<tr></tr>
					<th>生產體重</th>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-balance-scale"></i>
								</div>
							</div>
							<input id="text6" name="spawningweight" placeholder="ex.81" type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(g)</div>
							</div>
						</div>
					</td>
					<tr></tr>
					<th>卵巢進展階段(Stage)</th>
					<td>
						<select id="select1" name="ovarystate" class="custom-select">
							<option value="none" selected disabled hidden></option>
							<option value=""></option>
							<option value="0">0</option>
							<option value="0-1">0-1</option>
							<option value="1">1</option>
							<option value="1-2">1-2</option>
							<option value="2">2</option>
							<option value="2-3">2-3</option>
							<option value="3">3</option>
						</select>
					</td>
			</table>
		</form>

		<button type="button" class="btn btn-primary" onclick="upload()">上傳</button>
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
					url: 'Upload_生產.php',
					type: 'POST',
					data: formData,
					cache: false,
					//下面兩者一定要false
					processData: false,
					contentType: false,

					success: function(backData) {
						console.log();
						window.alert(backData);
						if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
							window.location.href = 'add_生產';
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
						$('#show_image').attr("src", e.target.result).css("height", "500px").css("width", "500px");
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
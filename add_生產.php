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
			<div class="form-inline" style = "width: 100%">
				<div style = "height: 10px"> </div>
			</div>

			<div class="form-inline" style = "width: 100%">
				<div style = "width: 1%"> </div>
				<div style = "width: 48%">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-eye"></i>
							</div>
						</div>
						<input id="text1" name="eye" type="text" class="form-control" placeholder="眼標">
					</div>
				</div>
				<div style = "width: 2%"> </div>
				<div style = "width: 48%">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-home"></i>
							</div>
						</div>
						<input id="text2" name="family" type="text" class="form-control"  placeholder="家族">
					</div>
				</div>
				<div style = "width: 1%"> </div>
			</div>

			<div class="form-inline" style = "width: 100%">
				<div style = "width: 1%"> </div>
				<div style = "width: 48%">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-balance-scale"></i>
							</div>
						</div>
						<input id="text4" name="cutweight" type="text" class="form-control" placeholder="剪眼體重">
						<div class="input-group-append">
							<div class="input-group-text">(g)</div>
						</div>
					</div>
				</div>
				<div style = "width: 2%"> </div>
				<div style = "width: 48%">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-balance-scale"></i>
							</div>
						</div>
						<input id="text6" name="spawningweight" type="text" class="form-control" placeholder="生產體重">
						<div class="input-group-append">
							<div class="input-group-text">(g)</div>
						</div>
					</div>
				</div>
				<div style = "width: 1%"> </div>
			</div>

			<div class="form-inline" style = "width: 100%">
				<div style = "width: 1%"> </div>
				<div class="input-group" style = "width: 98%">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fa fa-home"></i>
						</div>
					</div>
					<input id="text7" name="family" type="text" class="form-control" placeholder="公蝦家族">
				</div>
				<div style = "width: 1%"> </div>
			</div>

			<div class="form-inline" style = "width: 100%">
				<div style = "width: 1%"> </div>
				<div style = "width: 48%">
					<div> 剪眼日期 </div>
					<div class="input-group">
						<!-- <div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-calendar-o"></i>
							</div>
						</div> -->
						<input id="text3" name="cutday" type="date">
					</div>
				</div>
				<div style = "width: 2%"> </div>
				<div style = "width: 48%">
					<div> 進產卵室待產日期 </div>
					<div class="input-group">
						<!-- <div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fa fa-calendar-o"></i>
							</div>
						</div> -->
						<input id="text5" name="spawningroomdate" type="date">
					</div>
				</div>
				<div style = "width: 1%"> </div>
			</div>

			<div class="form-inline" style = "width: 100%">
				<div style = "width: 1%"> </div>
				<div style = "width: 48%">
					<div> 卵巢進展階段(Stage) </div>
					<div class="input-group">
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
					</div>
				</div>
				<div style = "width: 2%"> </div>
				<div style = "width: 48%">
					<div> 交配方式 </div>
					<div class="input-group">
						<select id="select2" name="mating" class="custom-select">
							<option value="none" selected disabled hidden></option>
							<option value=""></option>
							<option value="自然交配">自然交配</option>
							<option value="人工授精">人工授精</option>
						</select>
					</div>
				</div>
				<div style = "width: 1%"> </div>
			</div>

			<div class="form-inline" style = "width: 100%">
				<div style = "width: 1%"> </div>
				<div style = "width: auto">
					<div> 上傳紙本圖片 </div>
				</div>
				<div style = "width: 5px"> </div>
				<div style = "width: 30%"> 
					<input accept="image/*" type="file" name="fileField" id="uploadimage">
				</div>
			</div>
			<div class="form-inline" style = "width: 100%">
				<div style = "width: 1%"> </div>
				<div style = "width: auto"> 
					<div> 圖片預覽 </div>
				</div>
				<div style = "width: 5px"> </div>
				<div style = "width: auto">
					<img id="show_image" src="">
				</div>
			</div>


			<div class="form-inline" style = "width: 100%">
				<div style = "width: 1%"> </div>
				<div style = "width: auto">
					<button type="button" class="btn btn-primary" onclick="upload()">上傳</button>
				</div>
			</div>
			<div id="backmsg"></div>

			<div style = "height: 3px"> </div>
		</form>
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
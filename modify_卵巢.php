<?php
if (!isset($_SESSION)) {
	session_start();
	if (!isset($_SESSION["userid"])||$_SESSION["authority"]>1)
      header("location:home");
};
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>修改 - 卵巢成熟</title>
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
		// if ($_SERVER["REQUEST_METHOD"] == "GET") {
		// 	$id = $_GET['id'];

		// }
		$input_err = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty(trim($_POST["eye"]))) {
				$input_err = "Please enter '眼標'.";
				echo $input_err;
			}
			if (empty(trim($_POST["date"]))) {
				$input_err = "Please enter '日期'.";
				echo $input_err;
			}
			if (!strlen(trim($_POST["ovarystate"]))) {
				$input_err = "Please enter '卵巢狀態'.";
				echo $input_err;
			}
			if (empty($input_err)) {
				$id = trim($_POST["id"]);
				$param1 = trim($_POST["eye"]);
				$param2 = trim($_POST["date"]);
				$param3 = trim($_POST["ovarystate"]);
				$sql = "UPDATE  ovary SET 眼標='{$param1}', Date='{$param2}', Stage='{$param3}' WHERE id = $id";
				$result = mysqli_query($mysqli,$sql);
				if (mysqli_affected_rows($mysqli)>0) {
					echo "<script type='text/javascript'>";
					echo "window.alert('資料已更新');";
					echo "window.location.href='find_卵巢'";
					echo "</script>"; 
				}
				elseif(mysqli_affected_rows($mysqli)==0) {
					echo "<script type='text/javascript'>";
					echo "window.alert('無資料更新');";
					echo "window.location.href='find_卵巢'";
					echo "</script>"; 
				}
				else {
					echo "執行失敗，錯誤訊息: " . mysqli_error($mysqli);
				}
				mysqli_close($mysqli);
			}
		}
		?>

		<form id="myFile" method="post" enctype="multipart/form-data">
			<?php
			echo 
			'<table class="table">
				<tr>
					<td>上傳紙本圖片</td>
					<td>
						<input accept="image/*" type="file"  name="fileField" id="uploadimage">
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
							<input id="text" name="id"  value="'.$_GET['id'].'" class="form-control" readonly>
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
							<input id="text1" name="eye" value="' . $_GET["eye"] . '" type="text" class="form-control">
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
							<input id="text2" name="date" value='.$_GET['date'].' type="date">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						卵巢狀態
					</td>
					<td>
						<select id="select1" name="ovarystate" class="custom-select">
							<option value="'.$_GET['ovarystate'].'" selected disabled hidden>'.$_GET['ovarystate'].'</option>
							<option value=""></option>
							<option value="0">0</option>
							<option value="0-Ⅰ">0-1</option>
							<option value="Ⅰ">1</option>
							<option value="Ⅰ-Ⅱ">1-2</option>
							<option value="Ⅱ">2</option>
							<option value="Ⅱ-Ⅲ">2-3</option>
							<option value="Ⅲ">3</option>
							<option value="脫殼">脫殼</option>
							<option value="受精">受精</option>
							<option value="生產">生產</option>
							<option value="死亡">死亡</option>
							<option value="淘汰">淘汰</option>
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
					url: 'Update_卵巢.php',
					type: 'POST',
					data: formData,
					cache: false,
					//下面兩者一定要false
					processData: false,
					contentType: false,

					success: function(backData) {
						console.log();
						Swal.fire({
							title: backData,
							confirmButtonText: "確認",
						}).then((result) => {
							if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
								window.location.href = 'find_卵巢';
								$("#backmsg").html(backData);
							}
						});
					},
					error: function() {
						Swal.fire({
							title: backData,
							confirmButtonText: "確認",
						}).then((result) => {
							$('#backmsg').html("上傳失敗...");
						});
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
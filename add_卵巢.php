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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<section>
		<form id="myFile" method="post" enctype="multipart/form-data">
			<table class="table">
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
						<img id="show_image" src="">
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
							<input id="text1" name="eye" placeholder="ex.W999" type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						日期
					</td>
					<td>
						<div class="input-group" id="autoclick">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar-o"></i>
								</div>
							</div>
							<input  id="text2" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						卵巢狀態
					</td>
					<td>
						<select id="select1" name="ovarystate" class="custom-select">
							<option value="none" selected disabled hidden></option>
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
					url: 'Upload_卵巢.php',
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
							window.location.href = 'find_卵巢';
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

			$('#autoclick').click(function() {
				$('input[type=date]').click();
			})
		</script>
</body>

</html>
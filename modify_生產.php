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
	<title>修改 - 生產</title>
	<!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<section>
		<form id="myFile" method="post" enctype="multipart/form-data">
		<?php
			echo
			'
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
							<input id="text1" name="eye" value="' . $_GET["eye"] . '" placeholder="ex.W999" type="text" class="form-control">
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
							<input id="text2" name="family" value="' . $_GET["family"] . '" placeholder="ex.F1310" type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						剪眼日期
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar-o"></i>
								</div>
							</div>
							<input id="text3" name="cutday" value='.$_GET['cutday'].' type="date">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						剪眼體重
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-balance-scale"></i>
								</div>
							</div>
							<input id="text4" name="cutweight"  value="' . $_GET["cutweight"] . '" placeholder="ex.61.2" type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(g)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						進產卵室待產日期
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar-o"></i>
								</div>
							</div>
							<input id="text5" name="spawningroomdate"  value='.$_GET['spawningroomdate'].' type="date">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						生產體重
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-balance-scale"></i>
								</div>
							</div>
							<input id="text6" name="spawningweight"   value="' . $_GET["spawningweight"] . '" placeholder="ex.81" type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(g)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						卵巢進展階段(Stage)
					</td>
					<td>
						<select id="select1" name="ovarystate" class="custom-select">
							<option value="'.$_GET['ovarystate'].'" selected disabled hidden>'.$_GET['ovarystate'].'</option>
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
				</tr>
			</table>
			';
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
					url: 'Update_生產.php',
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
								window.location.href = 'find_生產';
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
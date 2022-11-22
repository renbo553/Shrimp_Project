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
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- // Meta Tags -->
	<!--booststrap-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
	<!--//booststrap end-->
	<!-- font-awesome icons -->
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<!--stylesheets-->
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
	<!--//stylesheets-->
	<link href="http://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
</head>

<body>
	<header>
		<div class="banner1">
			<div class="header-bar">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light">
						<h1><a class="navbar-brand">ICDSA</a></h1>
						&nbsp;&nbsp;&nbsp;
						<div class="hedder-up">
							<img src="./img/EmbeddedImage.png" height="40">
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

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

	<!-- Footer -->
	<footer>
		<footer>
			<section class="w3ls_address_mail_footer_grids">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 w3ls_footer_grid_left">
							<h5 class="sub-head">Address</h5>
							<p>臺南市安南區媽祖宮里
								<span>安明路３段５００號</span>
							</p>
						</div>
						<div class="col-sm-6 w3ls_footer_grid_left">
							<h5 class="sub-head">Contact Us</h5>
							<p>電話 ： +886-6-2757575#58209
								<span>傳真 ： +886-6-2766490</span>
							</p>
						</div>
					</div>

				</div>
			</section>
		</footer>
		<section class="copyright-wthree">
			<div class="container">
				<p>Copyright &copy;
					<script>
						document.write(new Date().getFullYear())
					</script>
					國立成功大學前瞻蝦類養殖國際研發中心.
				</p>
				<div class="w3l-social">
					<ul>
						<li>
							<a href="#" class="fab fa-facebook-f"></a>
						</li>
						<li>
							<a href="#" class="fab fa-twitter"></a>
						</li>
						<li>
							<a href="#" class="fab fa-google-plus-g"></a>
						</li>
						<li>
							<a href="#" class="fab fa-instagram"></a>
						<li>
						<li>
							<a href="#" class="fab fa-linkedin-in"></a>
						<li>
					</ul>
				</div>
			</div>
		</section>
		<!-- //Footer -->


		<!--js working-->
		<script src="js/jquery.min.js"></script>
		<!--//js working-->
		<!-- requried-jsfiles-for owl -->
		<!-- smooth scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<!-- here stars scrolling icon -->
		<script type="text/javascript">
			$(document).ready(function() {

				$().UItoTop({
					easingType: 'easeOutQuart'
				});

			});
		</script>
		<!-- //here ends scrolling icon -->
		<!-- //smooth scrolling -->
		<!-- scrolling script -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event) {
					event.preventDefault();
					$('html,body').animate({
						scrollTop: $(this.hash).offset().top
					}, 1000);
				});
			});
		</script>
		<!-- //scrolling script -->

		<!--bootstrap working-->
		<script src="js/bootstrap.min.js"></script>
		<!-- //bootstrap working-->
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
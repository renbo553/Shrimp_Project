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

	<!--/banner-->
	<!-- banner -->
	<header>
		<div class="banner1">
			<div class="header-bar">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light">
						<h1><a class="navbar-brand" href="home">ICDSA</a></h1>
						&nbsp;&nbsp;&nbsp;
						<div class="hedder-up">
							<img src="./img/EmbeddedImage.png" height="40">
						</div>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a href="home" class="nav-link">首頁</a>
								</li>
								<?php
								echo
								"<li class=\"nav-item\">
										<a href=\"realtime\" class=\"nav-link\">實時監測</a>
									</li>
									<li class=\"nav-item\">
										<a href=\"predict\" class=\"nav-link\">資料預測</a>
									</li>";
								echo
								"<li class=\"nav-item dropdown\">
											<a class=\"nav-link dropdown-toggle active\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
												data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
												資料新增
											</a>
											<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
												<a class=\"dropdown-item\" href=\"add_卵巢\">卵巢成熟</a>
												<div class=\"dropdown-divider\"></div>
												<a class=\"dropdown-item\" href=\"add_生產\">生產</a>
												<div class=\"dropdown-divider\"></div>
												<a class=\"dropdown-item\" href=\"add_餵食\">餵食</a>
												<div class=\"dropdown-divider\"></div>
												<a class=\"dropdown-item\" href=\"add_水質\">水質</a>
												<div class=\"dropdown-divider\"></div>
												<a class=\"dropdown-item\" href=\"add_位置\">位置</a>
											</div>	
										</li>";
								if ($_SESSION["authority"] <= 1)
									echo
									"<li class=\"nav-item dropdown\">
													<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
														data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
														資料查詢
													</a>
													<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
														<a class=\"dropdown-item\" href=\"find_卵巢\">卵巢成熟</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_生產\">生產</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_餵食\">餵食</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_水質\">水質</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_位置\">位置</a>
													</div>	
											</li>";
								if ($_SESSION["authority"] == 0)
									echo
									"<li class=\"nav-item\">
												<a href=\"verify\" class=\"nav-link\">驗證</a>
											</li>";
								echo
								"<li class=\"nav-item\">
											<a href=\"logout\" class=\"nav-link\">登出</a>
										</li>";

								?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- //Navigation -->
		</div>
	</header>

	<section>
		<?php
		require_once "config.php";
		$input_err = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// if(!strlen(trim($_POST["eye"]))){
			// 	$input_err = "Please enter '眼標'.</br>";
			// 	echo $input_err;
			// }
			// if(!strlen(trim($_POST["family"]))){
			// 	$input_err = "Please enter '家族'.</br>";
			// 	echo $input_err;
			// }
			// if(strlen(trim($_POST["birthday"]))!=6){
			// 	$input_err = "Please follow the format of '出生日'.</br>";
			// 	echo $input_err;
			// }
			// if(strlen(trim($_POST["cutday"]))!=6){
			// 	$input_err = "Please follow the format of '剪眼日'.</br>";
			// 	echo $input_err;
			// }
			// if(strlen(trim($_POST["date"]))!=6){
			// 	$input_err = "Please follow the format of '日期'.</br>";
			// 	echo $input_err;
			// }
			// if(!strlen(trim($_POST["location"]))){
			// 	$input_err = "Please enter '位置(Tank)'.</br>";
			// 	echo $input_err;
			// }
			if (!strlen($input_err)) {
				// $param1 = trim($_POST["eye"]);
				// $param2 = trim($_POST["family"]);
				// $param3 = trim($_POST["birthday"]);
				// $param4 = trim($_POST["cutday"]);
				// $param5 = trim($_POST["date"]);
				// $param6 = trim($_POST["location"]);
				$sql = "INSERT INTO location (眼標, 家族, 出生日, 剪眼日, Date, Tank) VALUES (?, ?, ?, ?, ?, ?)";
				if ($stmt = $mysqli->prepare($sql)) {
					$stmt->bind_param("ssssss", $param1, $param2, $param3, $param4, $param5, $param6);
					if ($stmt->execute()) {
						echo "Upload successful!";
						$stmt->close();
						$mysqli->close();
						$url = "find_位置";
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
							<input id="text1" name="eye" placeholder="ex.W12" type="text" class="form-control">
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
							<input id="text2" name="family" placeholder="ex.F1310" type="text" class="form-control">
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
							<input id="text3" name="birthday" type="date">
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
							<input id="text4" name="cutday" type="date">
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
							<input id="text5" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						位置(Tank)
					</td>
					<td>
						<select id="select1" name="location" class="custom-select">
							<option value="none" selected disabled hidden></option>
							<option value=""></option>
							<option value="M1">M1</option>
							<option value="M2">M2</option>
							<option value="M3">M3</option>
							<option value="M4">M4</option>
						</select>
					</td>
				</tr>
			</table>
		</form>

		<button type="button" class="btn btn-primary" onclick="upload()">上傳</button>
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
					url: 'Upload_位置.php',
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
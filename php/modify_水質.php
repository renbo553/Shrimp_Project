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
			<!-- //Navigation -->
		</div>
	</header>

	<section>

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
						日期
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar-o"></i>
								</div>
							</div>
							<input id="text1" name="date" type="date" value='.$_GET['date'].'>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						位置(Tank)
					</td>
					<td>
						<select id="select1" name="location" class="custom-select">
							<option value="'.$_GET['location'].'" selected disabled hidden>'.$_GET['location'].'</option>
							<option value=""></option>
							<option value="M1">M1</option>
							<option value="M2">M2</option>
							<option value="M3">M3</option>
							<option value="M4">M4</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						NH<sub>4</sub>-H
					</td>
					<td>
						<div class="input-group">
							<input id="text2" name="nh4" value="' . $_GET["nh4"] . '"type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(mg/l)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						NO<sub>2</sub>
					</td>
					<td>
						<div class="input-group">
							<input id="text3" name="no2" value="' . $_GET["no2"] . '" type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(mg/l)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						NO<sub>3</sub>
					</td>
					<td>
						<div class="input-group">
							<input id="text4" name="no3" value="' . $_GET["no3"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(mg/l)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Salinity_1
					</td>
					<td>
						<div class="col-6">
							<input id="text5" name="Salinity_1" value="' . $_GET["Salinity_1"] . '"  type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Salinity_2
					</td>
					<td>
						<div class="col-6">
							<input id="text6" name="Salinity_2" value="' . $_GET["Salinity_2"] . '"  type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Salinity_3
					</td>
					<td>
						<div class="col-6">
							<input id="text7" name="Salinity_3" value="' . $_GET["Salinity_3"] . '"  type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						pH_1
					</td>
					<td>
						<div class="col-6">
							<input id="text8" name="pH_1" value="' . $_GET["pH_1"] . '"  type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						pH_2
					</td>
					<td>
						<div class="col-6">
							<input id="text9" name="pH_2" value="' . $_GET["pH_2"] . '"  type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						pH_3
					</td>
					<td>
						<div class="col-6">
							<input id="text10" name="pH_3" value="' . $_GET["pH_3"] . '"  type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						O<sub>2</sub>_1
					</td>
					<td>
						<div class="input-group">
							<input id="text11" name="O2_1" value="' . $_GET["O2_1"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(mg/l)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						O<sub>2</sub>_2

					</td>
					<td>
						<div class="input-group">
							<input id="text12" name="O2_2" value="' . $_GET["O2_2"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(mg/l)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						O<sub>2</sub>_3

					</td>
					<td>
						<div class="input-group">
							<input id="text13" name="O2_3" value="' . $_GET["O2_3"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(mg/l)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						ORP_1
					</td>
					<td>
						<div class="input-group">
							<input id="text14" name="ORP_1" value="' . $_GET["ORP_1"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(mV)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						ORP_2
					</td>
					<td>
						<div class="input-group">
							<input id="text15" name="ORP_2" value="' . $_GET["ORP_2"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(mV)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						ORP_3
					</td>
					<td>
						<div class="input-group">
							<input id="text16" name="ORP_3" value="' . $_GET["ORP_3"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(mV)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						W Temp_1
					</td>
					<td>
						<div class="col-6">
							<input id="text17" name="Temp_1" value="' . $_GET["Temp_1"] . '"  type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						W Temp_2
					</td>
					<td>
						<div class="col-6">
							<input id="text18" name="Temp_2" value="' . $_GET["Temp_2"] . '"  type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						W Temp_3
					</td>
					<td>
						<div class="col-6">
							<input id="text19" name="Temp_3" value="' . $_GET["Temp_3"] . '"  type="text" class="form-control">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Alkalinity
					</td>
					<td>
						<div class="input-group">
							<input id="text20" name="Alkalinity" value="' . $_GET["Alkalinity"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(ppm)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						TCBS
					</td>
					<td>
						<div class="input-group">
							<input id="text21" name="TCBS" value="' . $_GET["TCBS"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(CFU/ml)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						TCBS 綠菌
					</td>
					<td>
						<div class="input-group">
							<input id="text22" name="綠菌" value="' . $_GET["綠菌"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(CFU/ml)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Marine
					</td>
					<td>
						<div class="input-group">
							<input id="text23" name="Marine" value="' . $_GET["Marine"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(CFU/ml)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						螢光菌TCBS
					</td>
					<td>
						<div class="input-group">
							<input id="text24" name="螢光菌TCBS" value="' . $_GET["螢光菌TCBS"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(CFU/ml)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						螢光菌Marine
					</td>
					<td>
						<div class="input-group">
							<input id="text25" name="螢光菌Marine" value="' . $_GET["螢光菌Marine"] . '"  type="text" class="form-control">
							<div class="input-group-append">
								<div class="input-group-text">(CFU/ml)</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						備註
					</td>
					<td>
						<div class="col-6">
							<textarea id="textarea1" name="Note"  cols="40" rows="5" class="form-control">' . $_GET["Note"] .'</textarea>
						</div>
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
					url: 'Update_水質.php',
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
							window.location.href = 'find_水質';
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
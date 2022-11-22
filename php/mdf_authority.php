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
</body>

</html>
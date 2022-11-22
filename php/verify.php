<?php
if(!isset($_SESSION)) {
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
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
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
	<link href="http://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i"
		rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
</head>

<body>
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
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a href="home" class="nav-link">首頁</a>
								</li>
								<?php
									if(isset($_SESSION["userid"]))
									{
										if($_SESSION["authority"]!=-1)
										{
											echo
												"<li class=\"nav-item\">
													<a href=\"realtime\" class=\"nav-link\">實時監測</a>
												</li>
												<li class=\"nav-item\">
													<a href=\"predict\" class=\"nav-link\">資料預測</a>
												</li>";
											if($_SESSION["authority"]==0 || $_SESSION["authority"]==1)
											{
												echo
													"<li class=\"nav-item dropdown\">
														<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
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
											}
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
                                            if($_SESSION["authority"]==0)
                                                echo
                                                    "<li class=\"nav-item active\">
                                                        <a href=\"verify\" class=\"nav-link\">驗證</a>
                                                    </li>";
										}
										echo
											"<li class=\"nav-item\">
												<a href=\"logout\" class=\"nav-link\">登出</a>
											</li>";
												
									}
									else
									{
										echo
											"<li class=\"nav-item\">
												<a href=\"login\" class=\"nav-link\">登入/註冊</a>
											</li>";
									}
								?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

	<section>
        <?php
		    require_once("config.php");
            $sql = "SELECT * FROM users order by id asc";
            $result = mysqli_query($mysqli,$sql);
            echo "<br>";
            echo "<table style='text-align:center;' align='center' width='80%'  border='1px solid gray' text-align='center'>";
            echo "<thead>
                <th>Index</th>
                <th>User Name</th>
                <th>Authority</th>
                <th>Created at</th>
                <th></th> 
                </thead><tbody>";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
				switch($row["authority"])
				{
					case 0:
						$authority="root";
						break;
					case 1:
						$authority="高階";
						break;
					case 2:
						$authority="低階";
						break;
					case 10:
						$authority="未驗證";
						break;
					default:
						$authority="未定義";
				}
                printf("<tr><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td>",$row["id"], $row["username"], $authority, $row["created_at"]);
                echo '<a href="mdf_authority?id=' . $row['id'] . '&username='.$row["username"].' &authority='.$row["authority"].'">變更權限</a>
                      <a href="delete_account?id=' . $row['id'] . '" onclick="return confirm(\'確定要刪除帳號:  ' . $row['username'] . '    嗎?\');">刪除</a>';
            }
            echo "</tbody></table>";
			echo "<br>";
            mysqli_free_result($result);
            mysqli_close($mysqli);

        ?>
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
					國立成功大學前瞻蝦類養殖國際研發中心.</p>
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
		$(document).ready(function () {
			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- //smooth scrolling -->
	<!-- scrolling script -->
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
			});
		});
	</script>
	<!-- //scrolling script -->

	<!--bootstrap working-->
	<script src="js/bootstrap.min.js"></script>
	<!-- //bootstrap working-->
</body>

</html>
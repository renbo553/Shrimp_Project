<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
		
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        $stmt->close();
    }
	if(!empty($username_err))
	{
		echo "<script type='text/javascript'>";
		echo "window.alert('".$username_err."');";
		echo "</script>"; 
	}
    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
	if(!empty($password_err))
	{
		echo "<script type='text/javascript'>";
		echo "window.alert('".$password_err."');";
		echo "</script>"; 
	}

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
	if(!empty($confirm_password_err))
	{
		echo "<script type='text/javascript'>";
		echo "window.alert('".$confirm_password_err."');";
		echo "</script>"; 
	}

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                //header("location: login");
                $url = "login";
                echo "<script type='text/javascript'>";
                echo "window.alert('註冊成功 請重新輸入帳號密碼登入');";
                echo "window.location.href='$url'";
                echo "</script>"; 
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
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
<style>
	/* Fonts Form Google Font ::- https://fonts.google.com/  -:: */
	@import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

	/* End Fonts */
	/* Start Global rules */
	* {
		padding: 0;
		margin: 0;
		box-sizing: border-box;
	}

	/* End Global rules */

	/* Start body rules */
	body {
		/* background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
		background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%); */
		background-attachment: fixed;
		background-repeat: no-repeat;

		font-family: 'Vibur', cursive;
		/*   the main font */
		font-family: 'Abel', sans-serif;
		opacity: .95;
		/* background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%); */
	}

	/* End body rules */

	/* Start form  attributes */
	form {
		width: 375px;
		min-height: 500px;
		height: auto;
		border-radius: 5px;
		margin: 2% auto;
		box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
		padding: 2%;
		background-image: linear-gradient(-225deg, #a0bcc0 50%, #b1a5ae 50%);
	}

	/* form Container */
	form .con {
		display: -webkit-flex;
		display: flex;

		-webkit-justify-content: space-around;
		justify-content: space-around;

		-webkit-flex-wrap: wrap;
		flex-wrap: wrap;

		margin: 0 auto;
	}
	/* Login title form form */
	header h2 {
		font-size: 250%;
		font-family: 'Playfair Display', serif;
		color: #3e403f;
	}

	/*  A welcome message or an explanation of the login form */
	header p {
		letter-spacing: 0.05em;
	}

	.input-item {
		background: #fff;
		color: #333;
		padding: 14.5px 0px 15px 9px;
		border-radius: 5px 0px 0px 5px;
	}



	/* Show/hide password Font Icon */
	#eye {
		background: #fff;
		color: #333;

		margin: 5.9px 0 0 0;
		margin-left: -20px;
		padding: 15px 9px 19px 0px;
		border-radius: 0px 5px 5px 0px;

		float: right;
		position: relative;
		right: 1%;
		top: -.2%;
		z-index: 5;

		cursor: pointer;
	}

	/* inputs form  */
	input[class="form-input"] {
		width: 240px;
		height: 50px;

		margin-top: 2%;
		padding: 15px;

		font-size: 16px;
		font-family: 'Abel', sans-serif;
		color: #5E6472;

		outline: none;
		border: none;

		border-radius: 0px 5px 5px 0px;
		transition: 0.2s linear;

	}

	input[id="txt-input"] {
		width: 250px;
	}

	/* focus  */
	input:focus {
		transform: translateX(-2px);
		border-radius: 5px;
	}

	/* buttons  */
	button {
		
	}

	/* Submits */
	.submits {
		width: 70%;
		display: inline-block;
		text-align: center;
		margin: 0 auto
	}
	.other{
		margin: 0 auto;
		text-align: center;
	}
	/*       Forgot Password button FAF3DD  */
	.frgt-pass {
		background: transparent;
	}

	/*     Sign Up button  */
	.btn {
		display: inline-block;
		color: #252537;

		width: 130px;
		height: 50px;

		padding: 0 20px;
		background: #fff;
		border-radius: 5px;

		outline: none;
		border: none;

		cursor: pointer;
		text-align: center;
		transition: all 0.2s linear;

		margin: 7% auto;
		letter-spacing: 0.05em;
	}


	/* buttons hover */
	button:hover {
		transform: translatey(3px);
		box-shadow: none;
	}

	/* buttons hover Animation */
	button:hover {
		animation: ani9 0.4s ease-in-out infinite alternate;
	}

	@keyframes ani9 {
		0% {
			transform: translateY(3px);
		}

		100% {
			transform: translateY(5px);
		}
	}
</style>
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
						<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a href="home" class="nav-link">首頁</a>
								</li>
								<li class="nav-item active">
									<a href="login" class="nav-link">登入/註冊</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

    <div class="overlay">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="con">
                <header class="head-form">
                    <h1>Sign Up</h1>
                    <!--     A welcome message or an explanation of the login form -->
                    <p>Please fill this form to create an account</p>
					<br>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                            <i class="fa fa-user-circle"></i>
                    </span>
                    <input type="text" name="username" class="form-input" placeholder="@UserName" value="<?php echo $username; ?>">
                    <br>
                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input  name="password" class="form-input" type="password" placeholder="Password" id="pwd" value="<?php echo $password; ?>">
                    <br>
                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input type="password" name="confirm_password" class="form-input" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
                    <br>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-default" value="Reset">
                    </div>
                </div>
				<p>已經擁有帳號了嗎 ? 按此進行<?php echo '<a href=login>登入</a>' ?></p>
            </div>
        </form>
    </div>

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
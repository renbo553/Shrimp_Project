<?php
/* login.php
 *      write the session after verifing username and password
 */

require_once "config.php";
require_once "utility.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// form data is submitted
    login_process($mysqli);
}


/*** function definition ***/
/* login_process:
 * 		verify username and password and log in
 * param:
 * 		mysqli: database object
 */

function login_process($mysqli) : void{
    $username = null;
    $password = null;
	
    /* Check input username and password */
	if(!login_get_string($username, $_POST["username"])){
		// empty username
		$msg = "登入失敗  :  Please enter username.";
		utility_window_msg($msg, null);
		return;
	}
	if(!login_get_string($password, $_POST["password"])){
		// empty password
		$msg = "登入失敗  :  Please enter password.";
		utility_window_msg($msg, null);
		return;
	}
	
	/* Get username and password from database */
	$sql = "SELECT id, username, password, authority FROM users WHERE username = ?";
	// sql query string
	$stmt = null;
	if(!($stmt = $mysqli->prepare($sql))){
		$msg = "登入失敗  :  Prepare failed.";
		utility_window_msg($msg, null);
		return;
	}
	// bind parameters to the prepared statement
	if(!($stmt->bind_param("s", $username))){
		$stmt->close();
		$msg = "登入失敗  :  Binding parameters failed.";
		utility_window_msg($msg, null);
		return;
	}
	// execute the prepared statement
	if(!$stmt->execute()){
		$stmt->close();
		$msg = "登入失敗  :  Execute failed.";
		utility_window_msg($msg, null);
		return;
	}
	// store result
	if(!$stmt->store_result()){
		$stmt->close();
		$msg = "登入失敗  :  Storing result failed.";
		utility_window_msg($msg, null);
		return;
	}
	// check # rows of result
	if($stmt->num_rows != 1){
		// username doesn't exist
		$stmt->close();
		$msg = "登入失敗  :  The username is not found.";
		$url = "login";
		utility_window_msg($msg, $url);
		return;
	}                
	// bind result variables
	if(!($stmt->bind_result($id, $username, $hashed_password, $authority))){
		$stmt->close();
		$msg = "登入失敗  :  Binding result failed.";
		utility_window_msg($msg, null);
		return;
	}
	// fetch values
	if(!$stmt->fetch()){
		$stmt->close();
		$msg = "登入失敗  :  Fetch result failed.";
		utility_window_msg($msg, null);
		return;
	}
	// close connection
	$stmt->close();
	
	/* Verify password */
	if(!password_verify($password, $hashed_password)){
		// password is not correct
		$msg = "登入失敗  :  The password is not correct.";
		$url = "login";
		utility_window_msg($msg, $url);
		return;
	}

	/* Correct password */
	// create a new session
	if(!isset($_SESSION)) {
		 session_start();
	}
	// store data in session variables
	$_SESSION["loggedin"] = true;
	$_SESSION["id"] = $id;
	$_SESSION["username"] = $username;                            
	$_SESSION["userid"] = $id;
	$_SESSION["authority"] = $authority;
	// Redirect user to schedule page
	//header("location: home");

    /* Show message window */
	$msg = "登入成功";
	$url = "home";
	login_window_msg($msg, $url);
}


/* login_get_string:
 * 		check and assign input string
 * param:
 * 		str: assigned string (be modefied)
 * 		input: input string
 * return:
 * 		true, if input string is not empty
 * 		false, otherwise
 */

function login_get_string(&$str, $input) : bool{
	if(empty(trim($input))){
		// input is empty
		return false;
	}
	$str = trim($input);
	return true;
}

?>



<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Log in</title>
	<!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
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
	.sign-up {
		background: #6acaf0;
	}

	.log-in {
		display: inline-block;
		color: #252537;

		width: 280px;
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
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<div class="overlay">
		<!-- LOGN IN FORM by Omar Dsoky -->
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<!--   con = Container  for items in the form-->
			<div class="con">
				<!--     Start  header Content  -->
				<header class="head-form">
					<h1>Log In</h1>
					<!--     A welcome message or an explanation of the login form -->
					<p>login here using your username and password</p>
					<br>
				</header>
				<!--     End  header Content  -->

				<div class="field-set">

					<!--   user name -->
					<span class="input-item">
						<i class="fa fa-user-circle"></i>
					</span>
					<!--   user name Input-->
					<input  name="username" class="form-input" id="txt-input" type="text" placeholder="@UserName"  value="<?php echo $username; ?>">

					<br>

					<!--   Password -->

					<span class="input-item">
						<i class="fa fa-key"></i>
					</span>
					<!--   Password Input-->
					<input  name="password" class="form-input" type="password" placeholder="Password" id="txt-input" value="<?php echo $password; ?>">

					<!--      Show/hide password  -->
					<!--<span>
						<i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
					</span>-->
					<br>
					<!--        buttons -->
					<!--      button LogIn -->
					<button class="log-in"> Log In </button>
				</div>
				
				<!--   other buttons -->
				<p>沒有帳號嗎 ? 按此進行<?php echo '<a href=register>註冊</a>' ?></p>

				<!--   End Conrainer  -->
			</div>

			<!-- End Form -->
		</form>
	</div>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
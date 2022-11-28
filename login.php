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

$username = null;
$password = null;
$login_failer = false;

/*** function definition ***/
/* login_process:
 * 		verify username and password and log in
 * param:
 * 		mysqli: database object
 */

function login_process($mysqli) : void{
	
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
	utility_window_msg($msg, $url);
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
	<?php require_once "login_box.html"?>
    <!--//Head-->
</head>


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
				<p>忘記密碼/修改密碼?<?php echo '<a href=modify_password>請按此</a>'?></p>

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
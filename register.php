<?php
/* register.php
 *      insert a new account into database and redirect to login page
 */

require_once "config.php";
require_once "utility.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // form data is submitted
    register_process($mysqli);
}


/*** function definition ***/
/* register_process:
 *      check input username and password and add a new accout
 *      if input username has not existed.
 * param:
 *      mysqli: database object
 */

function register_process($mysqli) :void{
    $username = null;
    $password = null;
    $confirm_password = null;

    /* Check input username, password and confirm password */
    if(!register_get_string($username, $_POST["username"])){
        // empty username
        $msg = "註冊失敗  :  Please enter username.";
        utility_window_msg($msg, null);
        return;
    }
    if(!register_get_string($password, $_POST["password"])){
        // empty password
        $msg = "註冊失敗  :  Please enter password.";
        utility_window_msg($msg, null);
        return;
    }
    elseif(strlen($password) < 6){
        // password is too short
        $msg = "註冊失敗  :  Password must have at least 6 characters.";
        utility_window_msg($msg, null);
        return;
    }
    if(!register_get_string($confirm_password, $_POST["confirm_password"])){
        // confirm password is empty
        $msg = "註冊失敗  :  Please enter confirm password.";
        utility_window_msg($msg, null);
        return;
    }

    /* Check whether input username has already existed */
    $sql = "SELECT id FROM users WHERE username = ?";
    // sql query string
    $stmt = null;
    if(!($stmt = $mysqli->prepare($sql))){
        $msg = "註冊失敗  :  Prepare failed.";
        utility_window_msg($msg, null);
        return;
    }
	// bind parameters to the prepared statement
    if(!($stmt->bind_param("s", $username))){
		$stmt->close();
		$msg = "註冊失敗  :  Binding parameters failed.";
		utility_window_msg($msg, null);
		return;
	}
    // execute the prepared statement
	if(!$stmt->execute()){
		$stmt->close();
		$msg = "註冊失敗  :  Execute failed.";
		utility_window_msg($msg, null);
		return;
	}
	// store result
	if(!$stmt->store_result()){
		$stmt->close();
		$msg = "註冊失敗  :  Storing result failed.";
		utility_window_msg($msg, null);
		return;
	}
	// check # rows of result
	if($stmt->num_rows != 0){
		// username doesn't exist
		$stmt->close();
		$msg = "註冊失敗  :  The username is already used.";
		utility_window_msg($msg, null);
		return;
	}
    // close connection
    $stmt->close();

    /* Check password and confirm password */
    if($password != $confirm_password){
        $msg = "註冊失敗  :  Two passwords doesn't match.";
		utility_window_msg($msg, null);
		return;
    }

    /* Insert a new account into database */
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    // sql query string
    $stmt = null;
    if(!($stmt = $mysqli->prepare($sql))){
        $msg = "註冊失敗  :  Prepare failed.";
        utility_window_msg($msg, null);
        return;
    }
	// bind parameters to the prepared statement
    if(!($stmt->bind_param("ss", $username, $password))){
		$stmt->close();
		$msg = "註冊失敗  :  Binding parameters failed.";
		utility_window_msg($msg, null);
		return;
	}
    // execute the prepared statement
	if(!$stmt->execute()){
		$stmt->close();
		$msg = "註冊失敗  :  Execute failed.";
		utility_window_msg($msg, null);
		return;
	}
    // close connection
    $stmt->close();

    /* Show message window */
    $msg = "註冊成功 請再次輸入帳號密碼登入";
    $url = "login";
    utility_window_msg($msg, $url);
}


/* register_get_string:
 * 		check and assign input string
 * param:
 * 		str: assigned string (be modefied)
 * 		input: input string
 * return:
 * 		true, if input string is not empty
 * 		false, otherwise
 */

function register_get_string(&$str, $input) : bool{
	if(empty(trim($input))){
		// input is empty
		return false;
	}
	$str = trim($input);
	return true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
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
    <!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

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
                    <input type="text" name="username" class="form-input" placeholder="@UserName">
                    <br>
                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input  name="password" class="form-input" type="password" placeholder="Password" id="pwd">
                    <br>
                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input type="password" name="confirm_password" class="form-input" placeholder="Confirm Password">
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

	<!--Footer-->
    <?php require_once "footer.html" ?>
	<!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>



</html>
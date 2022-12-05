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
	$email = trim($_POST["email"]);

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
	if($email == '') {
		// confirm email is empty
		$msg = "註冊失敗  :  Please enter your email.";
		$url = "modify_password";
		utility_window_msg($msg, $url);
		return ;
	}
	if(!filter_var ( $email , FILTER_VALIDATE_EMAIL )){
		// confirm email is not valid
		$msg = "註冊失敗  :  請填寫正確的郵箱！";
		$url = "modify_password";
		utility_window_msg($msg, $url);
		return ;
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
    
    /*send mail to check identification*/
    setcookie("username" , $username) ;
    setcookie("password" , $password) ;
    setcookie("email" , $email) ;
	require_once "sendmail.php" ;
    makemail($email , $username , 0) ;
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
    <title>Sign up</title>
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
					<span class="input-item">
						<i class="fa fa-envelope"></i>
					</span>
					<input name="email" class="form-input" id="txt-input" type="text" placeholder="enter email">
					<br>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-default" value="Reset">
                    </div>
                </div>
				<p>已經擁有帳號了嗎 ? 按此進行<?php echo '<a href=login>登入</a>' ?></p>
				<p>忘記密碼/修改密碼 ? <?php echo '<a href=modify_password>請按此</a>'?></p>
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
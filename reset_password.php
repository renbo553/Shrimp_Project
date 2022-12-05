<?php
    require_once "config.php";//連接數據庫
    require_once "utility.php";

    $email = get_email() ;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // form data is submitted
        reset_password($mysqli);
    }
    else {
        setcookie("email", $email) ;
    }
    
    function reset_password($mysqli) {
        //reset password
        $new_password = trim($_POST["password"]) ;
        $new_confirm_password = trim($_POST["confirm_password"]) ;
        if($new_password == '') {
            // password is null
            $msg = "修改失敗  :  Password must not be empty";
            utility_window_msg($msg, null);
            return;
        }
        if( strlen($new_password) < 6 ) {
            // password is too short
            $msg = "修改失敗  :  Password must have at least 6 characters.";
            utility_window_msg($msg, null);
            return;
        }
        if(strcmp($new_confirm_password , $new_password) != 0) {
            // password is not correct
            $msg = "The two password is not same!";
            utility_window_msg($msg,null);
            return;
        }

        $email = $_COOKIE['email'] ;
        // sql query string
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '$new_password' WHERE email = '$email'" ;
        setcookie('email' , "" , time()) ;
        mysqli_query($mysqli,$sql) ;
        utility_window_msg("修改密碼完成" , "login") ;
    }

    function get_email() {
        $var_array = $_SERVER['REQUEST_URI'];
        /*split the email and register_or_modify*/
        $question_mark = -1 ;
        for($i = 0 ; $i < strlen($var_array) ; $i ++ ) {
            if($var_array[$i] == '?') $question_mark = $i ;
        }
        /*format: ...php?email=...*/
        $email = substr($var_array , $question_mark + 7 , strlen($var_array) - $question_mark - 7) ;
        return $email ;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>reset password</title>
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
                    <h1>reset password</h1>
                    <!--     A welcome message or an explanation of the login form -->
                    <p>Please fill this form to reset the password</p>
					<br>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                    <i class="fa fa-key"></i>
                    </span>
                    <input  name="password" class="form-input" type="password" placeholder="Password" id="pwd">
                    <br>
                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <input name="confirm_password" class="form-input" type="password" placeholder="Confirm Password">
                    <button class="send"> reset </button>
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
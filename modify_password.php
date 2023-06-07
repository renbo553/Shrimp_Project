<?php
    require_once "utility.php" ;
    require_once "config.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // form data is submitted
        check_email($mysqli);
    }

    function check_email($mysqli) : void {
        $link = require_once "config.php" ;
        $enter_email = trim($_POST["email"]) ;
        $username = trim($_POST["username"]) ;
        if($username == '') {
            // confirm username is empty
            $msg = "請填寫您的帳號！";
		    utility_window_msg($msg, null);
            return ;
        }
        if($enter_email == '' || !filter_var ( $enter_email , FILTER_VALIDATE_EMAIL )){
            // confirm email is empty or email is not valid
            $msg = "請填寫正確的郵箱！";
		    utility_window_msg($msg, null);
            return ;
        }
        else{
            /* Check whether input username has already existed */
            $sql = "SELECT id , email FROM users WHERE username = ?";
            // sql query string
            $stmt = null ;

            if(!($stmt = $mysqli->prepare($sql))){
                $msg = "Prepare failed.";
                utility_window_msg($msg, null);
                return;
            }
            // bind parameters to the prepared statement
            if(!($stmt->bind_param("s", $username))){
                $stmt->close();
                $msg = "Binding parameters failed.";
                utility_window_msg($msg, null);
                return;
            }
            // execute the prepared statement
            if(!$stmt->execute()){
                $stmt->close();
                $msg = "Execute failed.";
                utility_window_msg($msg, null);
                return;
            }
            // store result
            if(!$stmt->store_result()){
                $stmt->close();
                $msg = "Storing result failed.";
                utility_window_msg($msg, null);
                return;
            }
            // check # rows of result
            if($stmt->num_rows == 0){
                // username doesn't exist
                $stmt->close();
                $msg = "The username does not exist";
                utility_window_msg($msg, null);
                return;
            }
            // close connection
            if(!($stmt->bind_result($id , $email))){
                $stmt->close();
                $msg = "Binding result failed.";
                utility_window_msg($msg, null);
                return;
            }
            // fetch values
            if(!$stmt->fetch()){
                $stmt->close();
                $msg = "Fetch result failed.";
                utility_window_msg($msg, null);
                return;
            }
            // close connection
            $stmt->close();

            if(strcmp($enter_email, $email) != 0){
                // email is not correct
                $msg = "The email is not as same as the email you register!";
                utility_window_msg($msg,null);
                return;
            }
            
            /*send mail to check identification*/
            require_once "sendmail.php" ;
            makemail($email , $username , "" , 1) ;
        }
    }
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Modify Password</title>
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
					<h1>Modify account</h1>
					<!--     A welcome message or an explanation of the login form -->
					<p>輸入您註冊的電子郵箱，以修改密碼</p>
					<br>
				</header>
				<!--     End  header Content  -->

				<div class="field-set">
                    <span class="input-item">
						<i class="fa fa-user-circle"></i>
					</span>
					<input  name="username" class="form-input" id="txt-input" type="text" placeholder="@UserName">
					<br>
					<span class="input-item">
						<i class="fa fa-envelope"></i>
					</span>
					<input name="email" class="form-input" id="txt-input" type="text" placeholder="enter email">
					<br>
                    <button class="send"> Send to verify email </button>
				</div>
				
				<!--   other buttons -->
                <p>已有一個帳號 ? 按此進行<?php echo '<a href=login>登入</a>'?></p>
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
    
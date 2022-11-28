<?php 
    require_once "utility.php" ;
    require_once "config.php";
    $email = '' ;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // form data is submitted
        check_email($email);
    }

    function check_email($email) : void {
        $email = trim($_POST["email"]) ;
        if($email == '' || !filter_var ( $email , FILTER_VALIDATE_EMAIL )){
            $msg = "請填寫正確的郵箱！";
		    $url = "modify_password";
		    utility_window_msg($msg, $url);
        }
        else{
            require_once "sendmail.php" ;
            //$.post("sendmail.php" , {mail:email} , function(msg){
                /*
                if(msg=="noreg"){
                $("#chkmsg").html("該郵箱尚未註冊！");
                $("#sub_btn").removeAttr("disabled").val('提交').css("cursor","pointer");
                }
                else{
                $(".demo").html("<h3>"+msg+"</h3>");
                }
                */
            //}) ;
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
						<i class="fa fa-envelope"></i>
					</span>
					<input name="email" class="form-input" id="txt-input" type="text" placeholder="enter email"  value="<?php echo $email; ?>">
					<br>
                    <button class="send"> Send to verify email </button>
				</div>
				
				<!--   other buttons -->
                <p>已有一個帳號 ? <?php echo '<a href=login>登入</a>'?></p>
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
    
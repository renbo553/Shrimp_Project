<?php
    require_once "config.php";//連接數據庫
    require_once "utility.php";
    
    //use cookie to store the information
    $username = $_COOKIE["username"] ;
    $password = $_COOKIE["password"] ;
    $email = $_COOKIE["email"] ;

    setcookie("username" , "" , time()) ;
    setcookie("password" , "" , time()) ;
    setcookie("email" , "" , time()) ;

    /* Insert a new account into database */
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password , email) VALUES (?, ? , ?)";
    // sql query string
    $stmt = null;
    if(!($stmt = $mysqli->prepare($sql))){
        $msg = "註冊失敗  :  Prepare failed.";
        utility_window_msg($msg, null);
        return;
    }
    // bind parameters to the prepared statement
    if(!($stmt->bind_param("sss", $username, $password , $email))){
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>regiser success</title>
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style=" min-height: 200;">
            <div class="con">
                <header class="head-form">
                    <h1>註冊成功!</h1>
                    <!--     A welcome message or an explanation of the login form -->
                </header>
                <input type="button" value="點擊登入" button class="log-in" onclick="location.href='login'"></button>
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
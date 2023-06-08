<?php
    require_once "config.php";//連接數據庫
    require_once "utility.php";
    
    //use cookie to store the information
    // $username = $_COOKIE["username"] ;
    // $password = $_COOKIE["password"] ;
    // $email = $_COOKIE["email"] ;
    $uri = $_SERVER['REQUEST_URI'];
    // 使用 parse_url 解析網址
    $parsedUrl = parse_url($uri);
    $query = $parsedUrl['query'];
    // 將 query 字串解析成陣列
    parse_str($query, $queryParams);

    // 取得特定的參數值
    $username = $queryParams['username'];
    $password = $queryParams['password']; 
    $email = $queryParams['email'];

    // setcookie("username" , "" , time()) ;
    // setcookie("password" , "" , time()) ;
    // setcookie("email" , "" , time()) ;

    /* Insert a new account into database */

    // $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password , email) VALUES ('" .$username. "' , '" .$password. "' , '" .$email. "')";
    $db_host = '127.0.0.1';     //資料庫主機
    $db_user = 'root';          //資料庫使用者
    $db_password = '';          //資料庫使用者密碼
    $db_name = 'shrimp';        //資料庫名稱
    //資料庫連接
    $link = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    if (!$link) {
        die("連接失敗" . mysqli_connect_error()); //輸出資料庫連接錯誤
    }
    /* 連接 database 是採用 utf8 編碼 */
    mysqli_set_charset($link, "utf8");
    $result = mysqli_query($link , $sql) ;
    // echo $sql ;
    if(!$result) utility_window_msg("註冊失敗" , null) ;

    // $sql = "INSERT INTO users (username, password , email) VALUES (? , ? , ?)";
    // sql query string
    // $stmt = null;
    // if(!($stmt = $mysqli->prepare($sql))){
    //     $msg = "註冊失敗  :  Prepare failed.";
    //     utility_window_msg($msg, null);
    //     return;
    // }
    // // bind parameters to the prepared statement
    // if(!($stmt->bind_param("sss", $username, $password , $email))){
    //     $stmt->close();
    //     $msg = "註冊失敗  :  Binding parameters failed.";
    //     utility_window_msg($msg, null);
    //     return;
    // }
    // // execute the prepared statement
    // if(!$stmt->execute()){
    //     $stmt->close();
    //     $msg = "註冊失敗  :  Execute failed.";
    //     utility_window_msg($msg, null);
    //     return;
    // }
    // // close connection
    // $stmt->close();
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
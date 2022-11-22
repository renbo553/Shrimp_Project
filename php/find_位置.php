<?php
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["userid"])||$_SESSION["authority"]>1)
      header("location:home");
};
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>About</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
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
    <link href="http://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
    <style>
        tbody tr:hover{
                background-color: papayawhip;
            }
    </style>
</head>

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
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="home" class="nav-link">首頁</a>
                                </li>
                                <?php
                                    echo
									"<li class=\"nav-item\">
										<a href=\"realtime\" class=\"nav-link\">實時監測</a>
									</li>
									<li class=\"nav-item\">
										<a href=\"predict\" class=\"nav-link\">資料預測</a>
									</li>";
									echo
										"<li class=\"nav-item dropdown\">
											<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
												data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
												資料新增
											</a>
											<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
												<a class=\"dropdown-item\" href=\"add_卵巢\">卵巢成熟</a>
												<div class=\"dropdown-divider\"></div>
												<a class=\"dropdown-item\" href=\"add_生產\">生產</a>
												<div class=\"dropdown-divider\"></div>
												<a class=\"dropdown-item\" href=\"add_餵食\">餵食</a>
												<div class=\"dropdown-divider\"></div>
												<a class=\"dropdown-item\" href=\"add_水質\">水質</a>
												<div class=\"dropdown-divider\"></div>
												<a class=\"dropdown-item\" href=\"add_位置\">位置</a>
											</div>	
										</li>";
									if($_SESSION["authority"]<=1)
										echo
											"<li class=\"nav-item dropdown\">
													<a class=\"nav-link dropdown-toggle active\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
														data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
														資料查詢
													</a>
													<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
														<a class=\"dropdown-item\" href=\"find_卵巢\">卵巢成熟</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_生產\">生產</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_餵食\">餵食</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_水質\">水質</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_位置\">位置</a>
													</div>	
											</li>";
									if($_SESSION["authority"]==0)
										echo
											"<li class=\"nav-item\">
												<a href=\"verify\" class=\"nav-link\">驗證</a>
											</li>";
									echo
										"<li class=\"nav-item\">
											<a href=\"logout\" class=\"nav-link\">登出</a>
										</li>";
                                ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- //Navigation -->
        </div>
    </header>

    <?php

    // 定義資料庫資訊
    $DB_NAME = "shrimp"; // 資料庫名稱
    $DB_USER = "root"; // 資料庫管理帳號
    $DB_PASS = ""; // 資料庫管理密碼
    $DB_HOST = "localhost"; // 資料庫位址

    // 連接 MySQL 資料庫伺服器
    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
    if (empty($con)) {
        die("資料庫連接失敗！");
        exit;
    }

    // 選取資料庫
    if (!mysqli_select_db($con, $DB_NAME)) {
        die("選取資料庫失敗！");
    } else {
        echo "連接 " . $DB_NAME . " 資料庫成功！<br>";
    }

    // 設定連線編碼
    mysqli_query($con, "SET NAMES 'UTF-8'");

    // 取得資料
    $sql = "SELECT * FROM location order by id desc";
    $result = mysqli_query($con, $sql, MYSQLI_STORE_RESULT);

    // 獲得資料筆數
    if ($result) {
        $num = mysqli_num_rows($result);
        echo "資料表有 " . $num . " 筆資料<br>";
    }

    // --- 顯示資料 --- //
    echo "<table style='text-align:center;' align='center' width='80%'  border='1px solid gray' text-align='center'>";
    echo "<thead>
        <th>Index</th>
        <th>眼標</th>
        <th>家族</th>
        <th>出生日</th>
        <th>剪眼日</th>
        <th>日期</th>
        <th>位置(Tank)</th>
        <th>紙本資料</th>
        </thead><tbody>";
    // echo "<br>顯示資料（MYSQLI_NUM，欄位數）：<br>";

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        if(strlen($row["image"]) > 0)
        {
            printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> <a href=%s target='_blank'>查看</a> </td>",$row["id"], $row["眼標"], $row["家族"], $row["出生日"], $row["剪眼日"], $row["Date"], $row["Tank"], $row["image"]);
            echo '<td><a href="modify_位置?id=' . $row['id'] . ' &eye='.$row["眼標"].' &family='.$row["家族"].' &birthday='.$row["出生日"].' &cutday='.$row["剪眼日"].' &date='.$row["Date"].' &location='.$row["Tank"] .' &image='.$row["image"].'">修改</a></td>
                  <td><a href="delete?id=' . $row['id'] . '&type=location" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
        }
        else
        {
            printf("<tr><td style='height:50px;'> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td> %s </td><td></td>",$row["id"], $row["眼標"], $row["家族"], $row["出生日"], $row["剪眼日"], $row["Date"], $row["Tank"]);
            echo '<td><a href="modify_位置?id=' . $row['id'] . ' &eye='.$row["眼標"].' &family='.$row["家族"].' &birthday='.$row["出生日"].' &cutday='.$row["剪眼日"].' &date='.$row["Date"].' &location='.$row["Tank"] .' &image='.$row["image"].'">修改</a></td>
                  <td><a href="delete?id=' . $row['id'] . '&type=location" onclick="return confirm(\'確定要刪除ID : '.$row['id'].' 嗎?\');">刪除</a></td>';
        }
    }
    echo "</tbody></table>";
    echo "<br>";
    // echo "<br>顯示資料（MYSQLI_ASSOC，欄位名稱）：<br>";

    // 釋放記憶體
    mysqli_free_result($result);

    // 關閉連線
    mysqli_close($con);

    ?>

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
            $(document).ready(function() {

                $().UItoTop({
                    easingType: 'easeOutQuart'
                });

            });
        </script>
        <!-- //here ends scrolling icon -->
        <!-- //smooth scrolling -->
        <!-- scrolling script -->
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 1000);
                });
            });
        </script>
        <!-- //scrolling script -->

        <!--bootstrap working-->
        <script src="js/bootstrap.min.js"></script>
        <!-- //bootstrap working-->
</body>

</html>
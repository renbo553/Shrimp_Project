<?php
if (!isset($_SESSION)) {
  session_start();
  if (!isset($_SESSION["userid"]) || $_SESSION["authority"] == 10)
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link href="http://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
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
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
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
											<a class=\"nav-link dropdown-toggle active\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
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
                if ($_SESSION["authority"] <= 1)
                  echo
                  "<li class=\"nav-item dropdown\">
													<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
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
                if ($_SESSION["authority"] == 0)
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
        </div>
    </header>

    <section>

        


        <form id="myFile" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td class="col-2">上傳紙本圖片</td>
                    <td>
                        <input accept="image/*" type="file" name="fileField" id="uploadimage">
                    </td>
                </tr>
                <tr>
                    <td>
                        圖片預覽
                    </td>
                    <td>
                        <img id="show_image" src="">
                    </td>
                </tr>
                <tr>
                    <td>
                        日期
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                            </div>
                            <input id="date" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        TankID
                    </td>
                    <td>
                        
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio" id="radio_0" type="radio" class="custom-control-input" value="M1"
                                    checked="checked">
                                <label for="radio_0" class="custom-control-label">&emsp;&emsp;M1</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio" id="radio_1" type="radio" class="custom-control-input" value="M2">
                                <label for="radio_1" class="custom-control-label">&emsp;&emsp;M2</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio" id="radio_2" type="radio" class="custom-control-input" value="M3">
                                <label for="radio_2" class="custom-control-label">&emsp;&emsp;M3</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio" id="radio_3" type="radio" class="custom-control-input" value="M4">
                                <label for="radio_3" class="custom-control-label">&emsp;&emsp;M4</label>
                            </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        草蝦
                    </td>
                    <td>
                        
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_0" type="radio" class="custom-control-input" value="公蝦缸"
                                    checked="checked">
                                <label for="radio1_0" class="custom-control-label">&emsp;&emsp;公蝦缸</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_1" type="radio" class="custom-control-input"
                                    value="母蝦缸">
                                <label for="radio1_1" class="custom-control-label">&emsp;&emsp;母蝦缸</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_2" type="radio" class="custom-control-input"
                                    value="交配缸">
                                <label for="radio1_2" class="custom-control-label">&emsp;&emsp;交配缸</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_3" type="radio" class="custom-control-input"
                                    value="休養缸">
                                <label for="radio1_3" class="custom-control-label">&emsp;&emsp;休養缸</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_4" type="radio" class="custom-control-input"
                                    value="公蝦+母蝦缸">
                                <label for="radio1_4" class="custom-control-label">&emsp;&emsp;公蝦+母蝦缸</label>
                            </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        公蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="male_shrimp" name="male_shrimp" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        母蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="female_shrimp" name="female_shrimp" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        死亡公蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="dead_male_shrimp" name="dead_male_shrimp" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        死亡母蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="dead_female_shrimp" name="dead_female_shrimp" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        脫皮公蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="peeling_male_shrimp" name="peeling_male_shrimp" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        脫皮母蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="peeling_female_shrimp" name="peeling_female_shrimp" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        公蝦均重
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="avg_male_shrimp" name="avg_male_shrimp" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        母蝦均重
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="avg_female_shrimp" name="avg_female_shrimp" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        總重
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="total_weight" name="total_weight" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <li>時間 09:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                        
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_0" type="checkbox"
                                    class="custom-control-input" value="Polychaete">
                                <label for="checkbox0900_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_1" type="checkbox"
                                    class="custom-control-input" value="Crab(去殼)">
                                <label for="checkbox0900_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_2" type="checkbox"
                                    class="custom-control-input" value="Squid">
                                <label for="checkbox0900_2" class="custom-control-label">&emsp;&emsp;Squid</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_3" type="checkbox"
                                    class="custom-control-input" value="Mussel">
                                <label for="checkbox0900_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_4" type="checkbox"
                                    class="custom-control-input" value="Epsilon">
                                <label for="checkbox0900_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_5" type="checkbox"
                                    class="custom-control-input" value="日本飼料">
                                <label for="checkbox0900_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_6" type="checkbox"
                                    class="custom-control-input" value="Krill">
                                <label for="checkbox0900_6" class="custom-control-label">&emsp;&emsp;Krill</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_7" type="checkbox"
                                    class="custom-control-input" value="Clam(母)">
                                <label for="checkbox0900_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_8" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹卵)">
                                <label for="checkbox0900_8"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_9" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹白)">
                                <label for="checkbox0900_9"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_10" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹黃)">
                                <label for="checkbox0900_10"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_11" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽)">
                                <label for="checkbox0900_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_12" type="checkbox"
                                    class="custom-control-input" value="other" onchange="setClick09();">
                                <label for="checkbox0900_12" class="custom-control-label">&emsp;&emsp;其他&emsp;</label>
                                <input disabled="disabled" for="checkbox0900_12" type="text" name="checkbox0900_other" id="checkbox_other09">
                            </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="weight0900" name="weight0900" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="remain0900" name="remain0900" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="eating0900" name="eating0900" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr> -->
                <tr>
                    <td>
                        <li>時間 1100</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                        
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_0" type="checkbox"
                                    class="custom-control-input" value="Polychaete">
                                <label for="checkbox1100_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_1" type="checkbox"
                                    class="custom-control-input" value="Crab(去殼)">
                                <label for="checkbox1100_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_2" type="checkbox"
                                    class="custom-control-input" value="Squid">
                                <label for="checkbox1100_2" class="custom-control-label">&emsp;&emsp;Squid</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_3" type="checkbox"
                                    class="custom-control-input" value="Mussel">
                                <label for="checkbox1100_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_4" type="checkbox"
                                    class="custom-control-input" value="Epsilon">
                                <label for="checkbox1100_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_5" type="checkbox"
                                    class="custom-control-input" value="日本飼料">
                                <label for="checkbox1100_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_6" type="checkbox"
                                    class="custom-control-input" value="Krill">
                                <label for="checkbox1100_6" class="custom-control-label">&emsp;&emsp;Krill</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_7" type="checkbox"
                                    class="custom-control-input" value="Clam(母)">
                                <label for="checkbox1100_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_8" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹卵)">
                                <label for="checkbox1100_8"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_9" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹白)">
                                <label for="checkbox1100_9"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_10" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹黃)">
                                <label for="checkbox1100_10"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_11" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹黃)">
                                <label for="checkbox1100_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1100" id="checkbox1100_12" type="checkbox"
                                    class="custom-control-input" value="other" onchange="setClick11();">
                                <label for="checkbox1100_12" class="custom-control-label">&emsp;&emsp;其他&emsp;</label>
                                <input disabled="disabled" for="checkbox1100_12" type="text" name="checkbox1100_other" id="checkbox_other11">
                            </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="weight1100" name="weight1100" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="remain1100" name="remain1100" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="eating1100" name="eating1100" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr> -->
                <tr>
                    <td>
                        <li>時間 14:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                        
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_0" type="checkbox"
                                    class="custom-control-input" value="Polychaete">
                                <label for="checkbox1400_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_1" type="checkbox"
                                    class="custom-control-input" value="Crab(去殼)">
                                <label for="checkbox1400_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_2" type="checkbox"
                                    class="custom-control-input" value="Squid">
                                <label for="checkbox1400_2" class="custom-control-label">&emsp;&emsp;Squid</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_3" type="checkbox"
                                    class="custom-control-input" value="Mussel">
                                <label for="checkbox1400_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_4" type="checkbox"
                                    class="custom-control-input" value="Epsilon">
                                <label for="checkbox1400_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_5" type="checkbox"
                                    class="custom-control-input" value="日本飼料">
                                <label for="checkbox1400_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_6" type="checkbox"
                                    class="custom-control-input" value="Krill">
                                <label for="checkbox1400_6" class="custom-control-label">&emsp;&emsp;Krill</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_7" type="checkbox"
                                    class="custom-control-input" value="Clam(母)">
                                <label for="checkbox1400_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_8" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹卵)">
                                <label for="checkbox1400_8"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_9" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹白)">
                                <label for="checkbox1400_9"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_10" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹黃)">
                                <label for="checkbox1400_10"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_11" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹黃)">
                                <label for="checkbox1400_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1400" id="checkbox1400_12" type="checkbox"
                                    class="custom-control-input" value="other" onchange="setClick14();">
                                <label for="checkbox1400_12" class="custom-control-label">&emsp;&emsp;其他&emsp;</label>
                                <input disabled="disabled" for="checkbox1400_12" type="text" name="checkbox1400_other" id="checkbox_other14">
                            </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="weight1400" name="weight1400" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="remain1400" name="remain1400" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="eating1400" name="eating1400" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr> -->
                <tr>
                    <td>
                        <li>時間 16:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                        
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_0" type="checkbox"
                                    class="custom-control-input" value="Polychaete">
                                <label for="checkbox1600_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_1" type="checkbox"
                                    class="custom-control-input" value="Crab(去殼)">
                                <label for="checkbox1600_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_2" type="checkbox"
                                    class="custom-control-input" value="Squid">
                                <label for="checkbox1600_2" class="custom-control-label">&emsp;&emsp;Squid</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_3" type="checkbox"
                                    class="custom-control-input" value="Mussel">
                                <label for="checkbox1600_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_4" type="checkbox"
                                    class="custom-control-input" value="Epsilon">
                                <label for="checkbox1600_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_5" type="checkbox"
                                    class="custom-control-input" value="日本飼料">
                                <label for="checkbox1600_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_6" type="checkbox"
                                    class="custom-control-input" value="Krill">
                                <label for="checkbox1600_6" class="custom-control-label">&emsp;&emsp;Krill</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_7" type="checkbox"
                                    class="custom-control-input" value="Clam(母)">
                                <label for="checkbox1600_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_8" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹卵)">
                                <label for="checkbox1600_8"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_9" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹白)">
                                <label for="checkbox1600_9"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_10" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹黃)">
                                <label for="checkbox1600_10"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_11" type="checkbox"
                                    class="custom-control-input" value="Ezmate(海膽+蟹黃)">
                                <label for="checkbox1600_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food1600" id="checkbox1600_12" type="checkbox"
                                    class="custom-control-input" value="other" onchange="setClick16();">
                                <label for="checkbox1600_12" class="custom-control-label">&emsp;&emsp;其他&emsp;</label>
                                <input disabled="disabled" for="checkbox1600_12" type="text" name="checkbox1600_other" id="checkbox_other16">
                            </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="weight1600" name="weight1600" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="remain1600" name="remain1600" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="eating1600" name="eating1600" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr> -->
                <tr>
                    <td>
                        <li>時間 19:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                    
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_0" type="checkbox" class="custom-control-input"
                            value="Polychaete">
                        <label for="checkbox1900_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_1" type="checkbox" class="custom-control-input"
                            value="Crab(去殼)">
                        <label for="checkbox1900_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_2" type="checkbox" class="custom-control-input"
                            value="Squid">
                        <label for="checkbox1900_2" class="custom-control-label">&emsp;&emsp;Squid</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_3" type="checkbox" class="custom-control-input"
                            value="Mussel">
                        <label for="checkbox1900_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_4" type="checkbox" class="custom-control-input"
                            value="Epsilon">
                        <label for="checkbox1900_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_5" type="checkbox" class="custom-control-input"
                            value="日本飼料">
                        <label for="checkbox1900_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_6" type="checkbox" class="custom-control-input"
                            value="Krill">
                        <label for="checkbox1900_6" class="custom-control-label">&emsp;&emsp;Krill</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_7" type="checkbox" class="custom-control-input"
                            value="Clam(母)">
                        <label for="checkbox1900_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_8" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹卵)">
                        <label for="checkbox1900_8" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_9" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹白)">
                        <label for="checkbox1900_9" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_10" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹黃)">
                        <label for="checkbox1900_10" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_11" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹黃)">
                        <label for="checkbox1900_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food1900" id="checkbox1900_12" type="checkbox"
                            class="custom-control-input" value="other" onchange="setClick19();">
                        <label for="checkbox1900_12" class="custom-control-label">&emsp;&emsp;其他&emsp;</label>
                        <input disabled="disabled" for="checkbox1900_12" type="text" name="checkbox1900_other" id="checkbox_other19">
                    </div>
                </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="weight1900" name="weight1900" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="remain1900" name="remain1900" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="eating1900" name="eating1900" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr> -->
                <tr>
                    <td>
                        <li>時間 23:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                
                <tr>
                    <td>
                    工作/餵食項目
                    </td>
                    <td>
                    
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_0" type="checkbox" class="custom-control-input"
                            value="Polychaete">
                        <label for="checkbox2300_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_1" type="checkbox" class="custom-control-input"
                            value="Crab(去殼)">
                        <label for="checkbox2300_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_2" type="checkbox" class="custom-control-input"
                            value="Squid">
                        <label for="checkbox2300_2" class="custom-control-label">&emsp;&emsp;Squid</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_3" type="checkbox" class="custom-control-input"
                            value="Mussel">
                        <label for="checkbox2300_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_4" type="checkbox" class="custom-control-input"
                            value="Epsilon">
                        <label for="checkbox2300_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_5" type="checkbox" class="custom-control-input"
                            value="日本飼料">
                        <label for="checkbox2300_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_6" type="checkbox" class="custom-control-input"
                            value="Krill">
                        <label for="checkbox2300_6" class="custom-control-label">&emsp;&emsp;Krill</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_7" type="checkbox" class="custom-control-input"
                            value="Clam(母)">
                        <label for="checkbox2300_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_8" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹卵)">
                        <label for="checkbox2300_8" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_9" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹白)">
                        <label for="checkbox2300_9" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_10" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹黃)">
                        <label for="checkbox2300_10" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food2300" id="checkbox2300_11" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹黃)">
                        <label for="checkbox2300_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food2300" id="checkbox2300_12" type="checkbox"
                                    class="custom-control-input" value="other" onchange="setClick23();">
                                <label for="checkbox2300_12" class="custom-control-label">&emsp;&emsp;其他&emsp;</label>
                                <input disabled="disabled" for="checkbox2300_12" type="text" name="checkbox2300_other" id="checkbox_other23">
                            </div>
                </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    餵食量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="weight2300" name="weight2300" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    殘餌量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="remain2300" name="remain2300" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="eating2300" name="eating2300" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr> -->
                <tr>
                    <td>
                        時間 03:00
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                    
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_0" type="checkbox" class="custom-control-input"
                            value="Polychaete">
                        <label for="checkbox0300_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_1" type="checkbox" class="custom-control-input"
                            value="Crab(去殼)">
                        <label for="checkbox0300_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_2" type="checkbox" class="custom-control-input"
                            value="Squid">
                        <label for="checkbox0300_2" class="custom-control-label">&emsp;&emsp;Squid</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_3" type="checkbox" class="custom-control-input"
                            value="Mussel">
                        <label for="checkbox0300_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_4" type="checkbox" class="custom-control-input"
                            value="Epsilon">
                        <label for="checkbox0300_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_5" type="checkbox" class="custom-control-input"
                            value="日本飼料">
                        <label for="checkbox0300_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_6" type="checkbox" class="custom-control-input"
                            value="Krill">
                        <label for="checkbox0300_6" class="custom-control-label">&emsp;&emsp;Krill</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_7" type="checkbox" class="custom-control-input"
                            value="Clam(母)">
                        <label for="checkbox0300_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_8" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹卵)">
                        <label for="checkbox0300_8" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_9" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹白)">
                        <label for="checkbox0300_9" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_10" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹黃)">
                        <label for="checkbox0300_10" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="food0300" id="checkbox0300_11" type="checkbox" class="custom-control-input"
                            value="Ezmate(海膽+蟹黃)">
                        <label for="checkbox0300_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0300" id="checkbox0300_12" type="checkbox"
                                    class="custom-control-input" value="other" onchange="setClick03();">
                                <label for="checkbox0300_12" class="custom-control-label">&emsp;&emsp;其他&emsp;</label>
                                <input disabled="disabled" for="checkbox0300_12" type="text" name="checkbox0300_other" id="checkbox_other03">
                    </div>
                </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="weight0300" name="weight0300" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="remain0300" name="remain0300" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="eating0300" name="eating0300" type="text" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr> -->
                <tr>
                    <td>
                        Feeding Ratio
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="FeedingRatio" name="FeedingRatio" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">%</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        備註
                    </td>
                    <td>
                        
                            <textarea id="Observation" name="Observation" cols="40" rows="5"
                                class="form-control"></textarea>
                        
                    </td>
                </tr>

            </table>
        </form>
        <button type="button" class="btn btn-primary" onclick="upload()">上傳</button>
		<div id="backmsg"></div>
		<br>
    </section>

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

        <script>
            function setClick09()
            {
                if(document.getElementById("checkbox_other09").disabled==false)
                {
                    document.getElementById("checkbox_other09").disabled=true;
                }
                else{
                    document.getElementById("checkbox_other09").disabled=false;
                }
            }
            function setClick11()
            {
                if(document.getElementById("checkbox_other11").disabled==false)
                {
                    document.getElementById("checkbox_other11").disabled=true;
                }
                else{
                    document.getElementById("checkbox_other11").disabled=false;
                }
            }
            function setClick14()
            {
                if(document.getElementById("checkbox_other14").disabled==false)
                {
                    document.getElementById("checkbox_other14").disabled=true;
                }
                else{
                    document.getElementById("checkbox_other14").disabled=false;
                }
            }
            function setClick16()
            {
                if(document.getElementById("checkbox_other16").disabled==false)
                {
                    document.getElementById("checkbox_other16").disabled=true;
                }
                else{
                    document.getElementById("checkbox_other16").disabled=false;
                }
            }
            function setClick19()
            {
                if(document.getElementById("checkbox_other19").disabled==false)
                {
                    document.getElementById("checkbox_other19").disabled=true;
                }
                else{
                    document.getElementById("checkbox_other19").disabled=false;
                }
            }
            function setClick23()
            {
                if(document.getElementById("checkbox_other23").disabled==false)
                {
                    document.getElementById("checkbox_other23").disabled=true;
                }
                else{
                    document.getElementById("checkbox_other23").disabled=false;
                }
            }
            function setClick03()
            {
                if(document.getElementById("checkbox_other03").disabled==false)
                {
                    document.getElementById("checkbox_other03").disabled=true;
                }
                else{
                    document.getElementById("checkbox_other03").disabled=false;
                }
            }
			function upload() {
				// 此處是 javascript 寫法
				// var myForm = document.getElementById('myFile');
				// 底下是 jQuery 的寫法
				var myForm = $("#myFile")[0];
				var formData = new FormData(myForm);

				$.ajax({
					url: 'Upload_餵食.php',
					type: 'POST',
					data: formData,
					cache: false,
					//下面兩者一定要false
					processData: false,
					contentType: false,

					success: function(backData) {
						console.log();
						window.alert(backData);
						if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
							window.location.href = 'find_餵食';
							$("#backmsg").html(backData);
						}

					},
					error: function() {
						window.alert("上傳失敗...");
						$('#backmsg').html("上傳失敗...");
					},
				});
			}

			var imageProc = function(input) {
				if (input.files && input.files[0]) {
					// 建立一個 FileReader 物件
					var reader = new FileReader();
					// 當檔案讀取完後，所要進行的動作
					reader.onload = function(e) {
						// 顯示圖片
						$('#show_image').attr("src", e.target.result).css("height", "500px").css("width", "500px");
						// // 將 DataURL 放到表單中
						// $("input[name='imagestring']").val(e.target.result);
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
			$(document).ready(function() {
				// 綁定事件
				$("#uploadimage").change(function() {
					imageProc(this);
				});

			});

		</script>
</body>

</html>
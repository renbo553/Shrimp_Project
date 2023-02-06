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
	<!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<style>
        /* span:target */
        #M1:target,
        #M2:target,
        #M3:target,
        #M4:target{
        border: solid 1px red;
        }
        /*頁籤變換*/
        #M1:target ~ #tab > ul li a[href$="#M1"],
        #M2:target ~ #tab > ul li a[href$="#M2"],
        #M3:target ~ #tab > ul li a[href$="#M3"],
        #M4:target ~ #tab > ul li a[href$="#M4"] {
            border: solid 1px black;
        }

        /*頁籤內容顯示*/
        #M1:target ~ #tab > div.tab-content-1,
        #M2:target ~ #tab > div.tab-content-2,
        #M3:target ~ #tab > div.tab-content-3,
        #M4:target ~ #tab > div.tab-content-4 {
            border: solid 1px black;
        }

        #tab{
        position: relative;
        left: 50%;
        transform: translate(-50%, 0%);

        width: auto;
        background: gray;
        border: solid 1px #333;
        }
        /* 頁籤ul */
        #tab>ul{
        overflow: hidden;
        margin: 0;
        padding: 10px 20px 0 20px;
        }
        #tab>ul>li{
        list-style-type: none;
        }
        #tab>ul>li>a{
        border: #333;
        text-decoration: none;
        font-size: 13px;
        color: white;
        float: left;
        padding: 10px;
        margin-left: 5px;
        }

        /*頁籤div內容*/
        #tab>div {
        border: #333;
        clear:both;
        padding:0 15px;
        height:0;
        overflow:hidden;
        visibility:hidden;
        -webkit-transition:all .4s ease-in-out;
        -moz-transition:all .4s ease-in-out;
        -ms-transition:all .4s ease-in-out;
        -o-transition:all .4s ease-in-out;
        transition:all .4s ease-in-out;
        }

        /* span:target */
        #M1:target,
        #M2:target,
        #M3:target,
        #M4:target{
        border: solid 1px red;
        }

        /*第一筆的底色*/
        span:target ~ #tab > ul li:first-child a {
            background: gray;
            color: #fff;
        }
        span:target ~ #tab > div:first-of-type {
        visibility:hidden;
        height:0;
        padding:0 15px;
        }

        /*頁籤變換&第一筆*/
        span ~ #tab > ul li:first-child a,
        #M1:target ~ #tab > ul li a[href$="#M1"],
        #M2:target ~ #tab > ul li a[href$="#M2"],
        #M3:target ~ #tab > ul li a[href$="#M3"],
        #M4:target ~ #tab > ul li a[href$="#M4"] {
            background: white ;
            color: #333 ;
        }
        
        /*頁籤內容顯示&第一筆*/
        span ~ #tab > div:first-of-type,
        #M1:target ~ #tab > div.tab-content-1,
        #M2:target ~ #tab > div.tab-content-2,
        #M3:target ~ #tab > div.tab-content-3,
        #M4:target ~ #tab > div.tab-content-4 {
        border: solid 1px black;
        visibility:visible;
        height:auto;
        width: auto;
        background: #fff;
        }
    </style>
    <!-- table style -->

	<!-- table -->
    <div>
        <span id="M1"></span>
        <span id="M2"></span>
        <span id="M3"></span>
        <span id="M4"></span>
        <div id="tab">
        <!– 頁籤按鈕 –>
        <ul>
        <li><a href="#M1">M1</a></li>
        <li><a href="#M2">M2</a></li>
        <li><a href="#M3">M3</a></li>
        <li><a href="#M4">M4</a></li>
        </ul>
        <!– 頁籤的內容區塊 –>
        <div class="tab-content-1"><p>
			<section>
				<?php
				require_once "config.php";
				$input_err = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (!strlen(trim($_POST["date"]))) {
						$input_err = "Please follow the format of '日期'.</br>";
						echo $input_err;
					}
					if (!strlen(trim($_POST["location"]))) {
						$input_err = "Please enter '位置(Tank)'.</br>";
						echo $input_err;
					}
					if (!strlen($input_err)) {
						$param1 = trim($_POST["date"]);
						$param2 = trim($_POST["location"]);
						$sql = "INSERT INTO waterquality (Date, TankID, NH4_N, NO2, NO3, Salinity_1, Salinity_2, Salinity_3, pH_1, pH_2, pH_3, O2_1, O2_2, O2_3, ORP_1, ORP_2, ORP_3, WTemp_1, WTemp_2, WTemp_3, Alkalinity, TCBS, TCBS綠菌, Marine, 螢光菌TCBS, 螢光菌Marine, Note) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

						if ($stmt = $mysqli->prepare($sql)) {
							$stmt->bind_param("sssssssssssssssssssssssssss", $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $param11, $param12, $param13, $param14, $param15, $param16, $param17, $param18, $param19, $param20, $param21, $param22, $param23, $param24, $param25, $param26, $param27);
							if ($stmt->execute()) {
								echo "Upload successful!";
								$stmt->close();
								$mysqli->close();
								$url = "find_水質";
								echo "<script type='text/javascript'>";
								echo "window.alert('新增成功');";
								echo "window.location.href='$url'";
								echo "</script>";
							} else {
								echo "Something went wrong. Please try again later.";
							}
						}
					}
				}
				?>
				
				<form id="myFile" method="post" enctype="multipart/form-data">
					<div class="form-inline" style = "width: 100%">
                        <div style = "height: 5px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 60px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div> 日期 </div>
                            <div class="input-group">
                                <div style="border-width:1px ; border-right-style:solid" class = "type_name">  </div>
                                <input width = "50px" id="date" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text2" name="nh4" type="text" class="form-control" placeholder = "NH4-H">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text3" name="no2" type="text" class="form-control" placeholder = "NO2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text4" name="no3" type="text" class="form-control" placeholder = "NO3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text5" name="Salinity_1" type="text" class="form-control" placeholder = "Salinity_1">    
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text6" name="Salinity_2" type="text" class="form-control" placeholder = "Salinity_2">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text7" name="Salinity_3" type="text" class="form-control" placeholder = "Salinity_3">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text8" name="pH_1" type="text" class="form-control" placeholder = "pH_1">        
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text9" name="pH_2" type="text" class="form-control" placeholder = "pH_2">        
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text10" name="pH_3" type="text" class="form-control" placeholder = "pH_3">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text11" name="O2_1" type="text" class="form-control" placeholder = "O2_1">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text12" name="O2_2" type="text" class="form-control" placeholder = "O2_2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text13" name="O2_3" type="text" class="form-control" placeholder = "O2_3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text14" name="ORP_1" type="text" class="form-control" placeholder = "ORP_1">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text15" name="ORP_2" type="text" class="form-control" placeholder = "ORP_2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text16" name="ORP_3" type="text" class="form-control" placeholder = "ORP_3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text17" name="Temp_1" type="text" class="form-control" placeholder = "W Temp_1">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text18" name="Temp_2" type="text" class="form-control" placeholder = "W Temp_2">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text19" name="Temp_3" type="text" class="form-control" placeholder = "W Temp_3">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text20" name="Alkalinity" type="text" class="form-control" placeholder = "Alkalinity">
                                <div class="input-group-append">
                                    <div class="input-group-text">(ppm)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text21" name="TCBS" type="text" class="form-control" placeholder = "TCBS">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text22" name="綠菌" type="text" class="form-control" placeholder = "TCBS綠菌">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text23" name="Marine" type="text" class="form-control" placeholder = "Marine">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text24" name="螢光菌TCBS" type="text" class="form-control" placeholder = "螢光菌TCBS">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text25" name="螢光菌Marine" type="text" class="form-control" placeholder = "螢光菌Marine">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <textarea id="textarea1" name="Note" cols="40" rows="5" class="form-control" placeholder = "備註" style = "height: 40px"></textarea>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto"> 
                            <div> 圖片預覽 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: auto">
                            <img id="show_image" src="">
                        </div>
                    </div>

					<div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 1px"> </div>
                    </div>

					<div id="backmsg"></div>
					<br>
				</form>
			</section>
        </p></div>
        <div class="tab-content-2"><p>
			<section>
				<?php
				require_once "config.php";
				$input_err = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (!strlen(trim($_POST["date"]))) {
						$input_err = "Please follow the format of '日期'.</br>";
						echo $input_err;
					}
					if (!strlen(trim($_POST["location"]))) {
						$input_err = "Please enter '位置(Tank)'.</br>";
						echo $input_err;
					}
					if (!strlen($input_err)) {
						$param1 = trim($_POST["date"]);
						$param2 = trim($_POST["location"]);
						$sql = "INSERT INTO waterquality (Date, TankID, NH4_N, NO2, NO3, Salinity_1, Salinity_2, Salinity_3, pH_1, pH_2, pH_3, O2_1, O2_2, O2_3, ORP_1, ORP_2, ORP_3, WTemp_1, WTemp_2, WTemp_3, Alkalinity, TCBS, TCBS綠菌, Marine, 螢光菌TCBS, 螢光菌Marine, Note) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

						if ($stmt = $mysqli->prepare($sql)) {
							$stmt->bind_param("sssssssssssssssssssssssssss", $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $param11, $param12, $param13, $param14, $param15, $param16, $param17, $param18, $param19, $param20, $param21, $param22, $param23, $param24, $param25, $param26, $param27);
							if ($stmt->execute()) {
								echo "Upload successful!";
								$stmt->close();
								$mysqli->close();
								$url = "find_水質";
								echo "<script type='text/javascript'>";
								echo "window.alert('新增成功');";
								echo "window.location.href='$url'";
								echo "</script>";
							} else {
								echo "Something went wrong. Please try again later.";
							}
						}
					}
				}
				?>
				
				<form id="myFile" method="post" enctype="multipart/form-data">
					<div class="form-inline" style = "width: 100%">
                        <div style = "height: 5px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 60px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div> 日期 </div>
                            <div class="input-group">
                                <div style="border-width:1px ; border-right-style:solid" class = "type_name">  </div>
                                <input width = "50px" id="date" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text2" name="nh4" type="text" class="form-control" placeholder = "NH4-H">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text3" name="no2" type="text" class="form-control" placeholder = "NO2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text4" name="no3" type="text" class="form-control" placeholder = "NO3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text5" name="Salinity_1" type="text" class="form-control" placeholder = "Salinity_1">    
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text6" name="Salinity_2" type="text" class="form-control" placeholder = "Salinity_2">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text7" name="Salinity_3" type="text" class="form-control" placeholder = "Salinity_3">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text8" name="pH_1" type="text" class="form-control" placeholder = "pH_1">        
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text9" name="pH_2" type="text" class="form-control" placeholder = "pH_2">        
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text10" name="pH_3" type="text" class="form-control" placeholder = "pH_3">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text11" name="O2_1" type="text" class="form-control" placeholder = "O2_1">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text12" name="O2_2" type="text" class="form-control" placeholder = "O2_2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text13" name="O2_3" type="text" class="form-control" placeholder = "O2_3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text14" name="ORP_1" type="text" class="form-control" placeholder = "ORP_1">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text15" name="ORP_2" type="text" class="form-control" placeholder = "ORP_2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text16" name="ORP_3" type="text" class="form-control" placeholder = "ORP_3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text17" name="Temp_1" type="text" class="form-control" placeholder = "W Temp_1">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text18" name="Temp_2" type="text" class="form-control" placeholder = "W Temp_2">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text19" name="Temp_3" type="text" class="form-control" placeholder = "W Temp_3">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text20" name="Alkalinity" type="text" class="form-control" placeholder = "Alkalinity">
                                <div class="input-group-append">
                                    <div class="input-group-text">(ppm)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text21" name="TCBS" type="text" class="form-control" placeholder = "TCBS">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text22" name="綠菌" type="text" class="form-control" placeholder = "TCBS綠菌">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text23" name="Marine" type="text" class="form-control" placeholder = "Marine">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text24" name="螢光菌TCBS" type="text" class="form-control" placeholder = "螢光菌TCBS">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text25" name="螢光菌Marine" type="text" class="form-control" placeholder = "螢光菌Marine">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <textarea id="textarea1" name="Note" cols="40" rows="5" class="form-control" placeholder = "備註" style = "height: 40px"></textarea>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto"> 
                            <div> 圖片預覽 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: auto">
                            <img id="show_image" src="">
                        </div>
                    </div>

					<div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 1px"> </div>
                    </div>

					<div id="backmsg"></div>
					<br>
				</form>
			</section>
        </p></div>
        <div class="tab-content-3"><p>
			<section>
				<?php
				require_once "config.php";
				$input_err = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (!strlen(trim($_POST["date"]))) {
						$input_err = "Please follow the format of '日期'.</br>";
						echo $input_err;
					}
					if (!strlen(trim($_POST["location"]))) {
						$input_err = "Please enter '位置(Tank)'.</br>";
						echo $input_err;
					}
					if (!strlen($input_err)) {
						$param1 = trim($_POST["date"]);
						$param2 = trim($_POST["location"]);
						$sql = "INSERT INTO waterquality (Date, TankID, NH4_N, NO2, NO3, Salinity_1, Salinity_2, Salinity_3, pH_1, pH_2, pH_3, O2_1, O2_2, O2_3, ORP_1, ORP_2, ORP_3, WTemp_1, WTemp_2, WTemp_3, Alkalinity, TCBS, TCBS綠菌, Marine, 螢光菌TCBS, 螢光菌Marine, Note) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

						if ($stmt = $mysqli->prepare($sql)) {
							$stmt->bind_param("sssssssssssssssssssssssssss", $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $param11, $param12, $param13, $param14, $param15, $param16, $param17, $param18, $param19, $param20, $param21, $param22, $param23, $param24, $param25, $param26, $param27);
							if ($stmt->execute()) {
								echo "Upload successful!";
								$stmt->close();
								$mysqli->close();
								$url = "find_水質";
								echo "<script type='text/javascript'>";
								echo "window.alert('新增成功');";
								echo "window.location.href='$url'";
								echo "</script>";
							} else {
								echo "Something went wrong. Please try again later.";
							}
						}
					}
				}
				?>
				
				<form id="myFile" method="post" enctype="multipart/form-data">
					<div class="form-inline" style = "width: 100%">
                        <div style = "height: 5px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 60px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div> 日期 </div>
                            <div class="input-group">
                                <div style="border-width:1px ; border-right-style:solid" class = "type_name">  </div>
                                <input width = "50px" id="date" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text2" name="nh4" type="text" class="form-control" placeholder = "NH4-H">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text3" name="no2" type="text" class="form-control" placeholder = "NO2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text4" name="no3" type="text" class="form-control" placeholder = "NO3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text5" name="Salinity_1" type="text" class="form-control" placeholder = "Salinity_1">    
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text6" name="Salinity_2" type="text" class="form-control" placeholder = "Salinity_2">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text7" name="Salinity_3" type="text" class="form-control" placeholder = "Salinity_3">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text8" name="pH_1" type="text" class="form-control" placeholder = "pH_1">        
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text9" name="pH_2" type="text" class="form-control" placeholder = "pH_2">        
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text10" name="pH_3" type="text" class="form-control" placeholder = "pH_3">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text11" name="O2_1" type="text" class="form-control" placeholder = "O2_1">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text12" name="O2_2" type="text" class="form-control" placeholder = "O2_2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text13" name="O2_3" type="text" class="form-control" placeholder = "O2_3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text14" name="ORP_1" type="text" class="form-control" placeholder = "ORP_1">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text15" name="ORP_2" type="text" class="form-control" placeholder = "ORP_2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text16" name="ORP_3" type="text" class="form-control" placeholder = "ORP_3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text17" name="Temp_1" type="text" class="form-control" placeholder = "W Temp_1">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text18" name="Temp_2" type="text" class="form-control" placeholder = "W Temp_2">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text19" name="Temp_3" type="text" class="form-control" placeholder = "W Temp_3">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text20" name="Alkalinity" type="text" class="form-control" placeholder = "Alkalinity">
                                <div class="input-group-append">
                                    <div class="input-group-text">(ppm)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text21" name="TCBS" type="text" class="form-control" placeholder = "TCBS">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text22" name="綠菌" type="text" class="form-control" placeholder = "TCBS綠菌">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text23" name="Marine" type="text" class="form-control" placeholder = "Marine">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text24" name="螢光菌TCBS" type="text" class="form-control" placeholder = "螢光菌TCBS">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text25" name="螢光菌Marine" type="text" class="form-control" placeholder = "螢光菌Marine">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <textarea id="textarea1" name="Note" cols="40" rows="5" class="form-control" placeholder = "備註" style = "height: 40px"></textarea>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto"> 
                            <div> 圖片預覽 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: auto">
                            <img id="show_image" src="">
                        </div>
                    </div>

					<div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 1px"> </div>
                    </div>

					<div id="backmsg"></div>
					<br>
				</form>
			</section>
        </p></div>
        <div class="tab-content-4"><p>
			<section>
				<?php
				require_once "config.php";
				$input_err = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (!strlen(trim($_POST["date"]))) {
						$input_err = "Please follow the format of '日期'.</br>";
						echo $input_err;
					}
					if (!strlen(trim($_POST["location"]))) {
						$input_err = "Please enter '位置(Tank)'.</br>";
						echo $input_err;
					}
					if (!strlen($input_err)) {
						$param1 = trim($_POST["date"]);
						$param2 = trim($_POST["location"]);
						$sql = "INSERT INTO waterquality (Date, TankID, NH4_N, NO2, NO3, Salinity_1, Salinity_2, Salinity_3, pH_1, pH_2, pH_3, O2_1, O2_2, O2_3, ORP_1, ORP_2, ORP_3, WTemp_1, WTemp_2, WTemp_3, Alkalinity, TCBS, TCBS綠菌, Marine, 螢光菌TCBS, 螢光菌Marine, Note) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

						if ($stmt = $mysqli->prepare($sql)) {
							$stmt->bind_param("sssssssssssssssssssssssssss", $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $param11, $param12, $param13, $param14, $param15, $param16, $param17, $param18, $param19, $param20, $param21, $param22, $param23, $param24, $param25, $param26, $param27);
							if ($stmt->execute()) {
								echo "Upload successful!";
								$stmt->close();
								$mysqli->close();
								$url = "find_水質";
								echo "<script type='text/javascript'>";
								echo "window.alert('新增成功');";
								echo "window.location.href='$url'";
								echo "</script>";
							} else {
								echo "Something went wrong. Please try again later.";
							}
						}
					}
				}
				?>
				
				<form id="myFile" method="post" enctype="multipart/form-data">
					<div class="form-inline" style = "width: 100%">
                        <div style = "height: 5px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 60px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div> 日期 </div>
                            <div class="input-group">
                                <div style="border-width:1px ; border-right-style:solid" class = "type_name">  </div>
                                <input width = "50px" id="date" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text2" name="nh4" type="text" class="form-control" placeholder = "NH4-H">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text3" name="no2" type="text" class="form-control" placeholder = "NO2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text4" name="no3" type="text" class="form-control" placeholder = "NO3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text5" name="Salinity_1" type="text" class="form-control" placeholder = "Salinity_1">    
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text6" name="Salinity_2" type="text" class="form-control" placeholder = "Salinity_2">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text7" name="Salinity_3" type="text" class="form-control" placeholder = "Salinity_3">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text8" name="pH_1" type="text" class="form-control" placeholder = "pH_1">        
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text9" name="pH_2" type="text" class="form-control" placeholder = "pH_2">        
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text10" name="pH_3" type="text" class="form-control" placeholder = "pH_3">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text11" name="O2_1" type="text" class="form-control" placeholder = "O2_1">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text12" name="O2_2" type="text" class="form-control" placeholder = "O2_2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text13" name="O2_3" type="text" class="form-control" placeholder = "O2_3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mg/l)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text14" name="ORP_1" type="text" class="form-control" placeholder = "ORP_1">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text15" name="ORP_2" type="text" class="form-control" placeholder = "ORP_2">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text16" name="ORP_3" type="text" class="form-control" placeholder = "ORP_3">
                                <div class="input-group-append">
                                    <div class="input-group-text">(mV)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text17" name="Temp_1" type="text" class="form-control" placeholder = "W Temp_1">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text18" name="Temp_2" type="text" class="form-control" placeholder = "W Temp_2">
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text19" name="Temp_3" type="text" class="form-control" placeholder = "W Temp_3">
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text20" name="Alkalinity" type="text" class="form-control" placeholder = "Alkalinity">
                                <div class="input-group-append">
                                    <div class="input-group-text">(ppm)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text21" name="TCBS" type="text" class="form-control" placeholder = "TCBS">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text22" name="綠菌" type="text" class="form-control" placeholder = "TCBS綠菌">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text23" name="Marine" type="text" class="form-control" placeholder = "Marine">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 45px">
                        <div style = "width: 1%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text24" name="螢光菌TCBS" type="text" class="form-control" placeholder = "螢光菌TCBS">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 2%"> </div>
                        <div style = "width: 48%">
                            <div class="input-group">
                                <input id="text25" name="螢光菌Marine" type="text" class="form-control" placeholder = "螢光菌Marine">
                                <div class="input-group-append">
                                    <div class="input-group-text">(CFU/ml)</div>
                                </div>
                            </div>
                        </div>
                        <div style = "width: 1%"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <textarea id="textarea1" name="Note" cols="40" rows="5" class="form-control" placeholder = "備註" style = "height: 40px"></textarea>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto"> 
                            <div> 圖片預覽 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: auto">
                            <img id="show_image" src="">
                        </div>
                    </div>

					<div class="form-inline" style = "width: 100%">
                        <div style = "height: 3px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 1px"> </div>
                    </div>

					<div id="backmsg"></div>
					<br>
				</form>
			</section>
        </p></div>

    </div>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->

		<script>
			function upload() {
				// 此處是 javascript 寫法
				// var myForm = document.getElementById('myFile');
				// 底下是 jQuery 的寫法
				var myForm = $("#myFile")[0];
				var formData = new FormData(myForm);

				$.ajax({
					url: 'Upload_水質.php',
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
							window.location.href = 'add_水質';
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

			$('#autoclick').click(function() {
				$('input[type=date]').click();
			})
		</script>
</body>

</html>
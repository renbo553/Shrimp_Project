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
	<title>詳細資料 - 母種蝦資料</title>
	<!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<style>
        @media (min-width: 1024px) {
            div.big_form {
                border: solid 1px black;
                animation: change 0s;
            }

            div.small_form {
                display: none;
            }

            @keyframes change {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }
        }

        @media (max-width: 1023px) {
            div.big_form {
                display: none;
            }

            div.small_form {
                border: solid 1px black;
                animation: change 0s;
            }

            @keyframes change {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }
        }
    </style>

	<div>
        <div class="big_form">
			<section>
				<form id="big_form" method="post" enctype="multipart/form-data">
                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> index </div>
                        <div style = "width: 30%">
                            <input id="id" name="id" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 眼標 </div>
                        <div style = "width: 30%">
                            <input id="eye" name="eye" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 家族 </div>
                        <div style = "width: 30%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                                <input id="family" name="family" type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 體重 </div>
                        <div style = "width: 30%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-balance-scale"></i>
                                    </div>
                                </div>
                                <input id="weight" name="weight" type="text" class="form-control" readonly>
                                <div class="input-group-append">
                                    <div class="input-group-text">(g)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 出生日期 </div>
                        <div style = "width: 30%">
                            <input id="birthday" name="birthday" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 剪眼日期 </div>
                        <div style = "width: 30%">
                            <input id="cutday" name="cutday" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 進蝦日期 </div>
                        <div style = "width: 30%">
                            <input id="enterday" name="enterday" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> tankid </div>
                        <div style = "width: 30%">
                            <select id="location" name="location" class="custom-select" disabled="disabled">
								<option value=""></option>
								<option value="M1">M1</option>
								<option value="M2">M2</option>
								<option value="M3">M3</option>
								<option value="M4">M4</option>
							</select>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 生存狀態 </div>
                        <div style = "width: 30%">
                            <select id="live_or_die" name="live_or_die" class="custom-select" disabled="disabled">
								<option value=""></option>
								<option value="存活">存活</option>
								<option value="死亡">死亡</option>
							</select>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 10px">
						<div style = "height: 2%"> </div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 3%"> </div>
						<button type="button" class="btn btn-primary" onclick="back()">返回查詢</button>
						<div id="backmsg"></div>
					</div>
				</form>
			</section>
        </div>
        <div class="small_form">
            <section>
				<form id="small_form" method="post" enctype="multipart/form-data">
                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> index </div>
                        <div style = "width: 40%">
                            <input id="id" name="id" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 眼標 </div>
                        <div style = "width: 40%">
                            <input id="eye" name="eye" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 家族 </div>
                        <div style = "width: 40%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                                <input id="family" name="family" type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 體重 </div>
                        <div style = "width: 40%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-balance-scale"></i>
                                    </div>
                                </div>
                                <input id="weight" name="weight" type="text" class="form-control" readonly>
                                <div class="input-group-append">
                                    <div class="input-group-text">(g)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 出生日期 </div>
                        <div style = "width: 40%">
                            <input id="birthday" name="birthday" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 剪眼日期 </div>
                        <div style = "width: 40%">
                            <input id="cutday" name="cutday" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 進蝦日期 </div>
                        <div style = "width: 40%">
                            <input id="enterday" name="enterday" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> tankid </div>
                        <div style = "width: 40%">
                            <select id="location" name="location" class="custom-select" disabled="disabled">
								<option value=""></option>
								<option value="M1">M1</option>
								<option value="M2">M2</option>
								<option value="M3">M3</option>
								<option value="M4">M4</option>
							</select>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 生存狀態 </div>
                        <div style = "width: 40%">
                            <select id="live_or_die" name="live_or_die" class="custom-select" disabled="disabled">
								<option value=""></option>
								<option value="存活">存活</option>
								<option value="死亡">死亡</option>
							</select>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 10px">
						<div style = "height: 2%"> </div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 5%"> </div>
						<button type="button" class="btn btn-primary" onclick="back()">返回查詢</button>
						<div id="backmsg"></div>
					</div>
				</form>
            </section>
        </div>
    </div>

    <script> document.write('<script type="text/javascript" src="shrimp_info_check.js"></'+'script>'); </script>

	<script>
		window.onload = function() {
			//頁面載入後將資料放到form上面
			var urlParams = new URLSearchParams(window.location.search);
			modify_put_into_form(urlParams , "big_form" , 0);
			modify_put_into_form(urlParams , "small_form" , 0);
        }

        function back() {
            window.location.href='find_母種蝦資料';
        }
    </script>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
<?php
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["userid"]) || $_SESSION["authority"] > 1)
        header("location:home");
};
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>詳細資料 - 生產</title>
    <!--Head-->
    <?php require_once "head.html" ?>
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
                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> Index </div>
                        <div style = "width: 30%">
                            <input id="id" name="id"class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 眼標 </div>
                        <div style = "width: 30%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                                <input id="eye" name="eye" type="text" class="form-control" disabled="disabled">
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 家族 </div>
                        <div style = "width: 30%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                                <input id="family" name="family" type="text" class="form-control" disabled="disabled">
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 公蝦家族 </div>
                        <div style = "width: 30%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                                <input id="male_family" name="male_family" type="text" class="form-control" disabled="disabled">
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 剪眼體重 </div>
                        <div style = "width: 30%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-balance-scale"></i>
                                    </div>
                                </div>
                                <input id="cutweight" name="cutweight" type="text" class="form-control" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text">(g)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 生產體重 </div>
                        <div style = "width: 30%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-balance-scale"></i>
                                    </div>
                                </div>
                                <input id="spawningweight" name="spawningweight" type="text" class="form-control" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text">(g)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 剪眼日期 </div>
                        <div style = "width: 30%">
                            <input id="cutday" name="cutday" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 進產卵室待產日期 </div>
                        <div style = "width: 30%">
                            <input id="spawningroomdate" name="spawningroomdate" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 卵巢進展階段(Stage) </div>
                        <div style = "width: 30%">
                            <select id="ovarystate" name="ovarystate" class="custom-select" disabled="disabled">
                                <option value=""></option>
                                <option value="0">0</option>
                                <option value="0-1">0-1</option>
                                <option value="1">1</option>
                                <option value="1-2">1-2</option>
                                <option value="2">2</option>
                                <option value="2-3">2-3</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 3%"> </div>
                        <div style = "width: 17%"> 交配方式 </div>
                        <div style = "width: 30%">
                            <div class="input-group">
                                <select id="mating" name="mating" class="custom-select" disabled="disabled">
                                    <option value=""></option>
                                    <option value="自然交配">自然交配</option>
                                    <option value="人工授精">人工授精</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 3%"> </div>
                        <button type="button" onclick="back()" class="btn btn-primary">返回查詢</button>
                        <div id="backmsg"></div>
                    </div>
                </form>
            </section>
        </div>

        <div class="small_form">
            <section>
                <form id="small_form" method="post" enctype="multipart/form-data">
                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> Index </div>
                        <div style = "width: 60%">
                            <input id="id" name="id"class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 眼標 </div>
                        <div style = "width: 60%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                                <input id="eye" name="eye" type="text" class="form-control"disabled="disabled">
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 家族 </div>
                        <div style = "width: 60%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                                <input id="family" name="family" type="text" class="form-control" disabled="disabled">
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 公蝦家族 </div>
                        <div style = "width: 60%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                                <input id="male_family" name="male_family" type="text" class="form-control" disabled="disabled">
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 剪眼體重 </div>
                        <div style = "width: 60%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-balance-scale"></i>
                                    </div>
                                </div>
                                <input id="cutweight" name="cutweight" type="text" class="form-control" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text">(g)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 生產體重 </div>
                        <div style = "width: 60%">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-balance-scale"></i>
                                    </div>
                                </div>
                                <input id="spawningweight" name="spawningweight" type="text" class="form-control" disabled="disabled">
                                <div class="input-group-append">
                                    <div class="input-group-text">(g)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 剪眼日期 </div>
                        <div style = "width: 60%">
                            <input id="cutday" name="cutday" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 進產卵室待產日期 </div>
                        <div style = "width: 60%">
                            <input id="spawningroomdate" name="spawningroomdate" type="date" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 卵巢進展階段(Stage) </div>
                        <div style = "width: 60%">
                            <select id="ovarystate" name="ovarystate" class="custom-select" disabled="disabled">
                                <option value=""></option>
                                <option value="0">0</option>
                                <option value="0-1">0-1</option>
                                <option value="1">1</option>
                                <option value="1-2">1-2</option>
                                <option value="2">2</option>
                                <option value="2-3">2-3</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 75px">
                        <div style = "width: 5%"> </div>
                        <div style = "width: 30%"> 交配方式 </div>
                        <div style = "width: 60%">
                            <div class="input-group">
                                <select id="mating" name="mating" class="custom-select" disabled="disabled">
                                    <option value=""></option>
                                    <option value="自然交配">自然交配</option>
                                    <option value="人工授精">人工授精</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 50px">
                        <div style = "width: 5%"> </div>
                        <button type="button" onclick="back()" class="btn btn-primary">返回查詢</button>
                        <div id="backmsg"></div>
                    </div>
                </form>
            </section>
        </div>
    </div>

    <script>
		document.write('<script type="text/javascript" src="breed_check.js"></'+'script>');

        window.onload = function() {
			//頁面載入後將資料放到form上面
			var urlParams = new URLSearchParams(window.location.search);
			modify_put_into_form(urlParams , "big_form" , 0);
			modify_put_into_form(urlParams , "small_form" , 0);
        }

        function back() {
            window.location.href = 'find_生產';
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
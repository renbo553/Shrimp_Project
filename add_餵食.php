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
                <form id="M1_form" method="post" enctype="multipart/form-data">
                    <input id = "location" name = "location" type = "hidden" value = "M1">

                    <?php require "feed_table.html"?>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage_M1">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 1px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto"> 
                            <div> 圖片預覽 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: auto">
                            <img id="show_image_M1" src="">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload_M1()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 2px">
                        <div style = "height: 1px"> </div>
                    </div>
                
                </form>
                <div id="backmsg"></div>
                <br>
            </section>
        </p></div>

        <div class="tab-content-2"><p>
            <section>
                <form id="M2_form" method="post" enctype="multipart/form-data">
                    <input id = "location" name = "location" type = "hidden" value = "M2">

                    <?php require "feed_table.html"?>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage_M2">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 1px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto"> 
                            <div> 圖片預覽 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: auto">
                            <img id="show_image_M2" src="">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload_M2()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 2px">
                        <div style = "height: 1px"> </div>
                    </div>
                
                </form>
                <div id="backmsg"></div>
                <br>
            </section>
        </p></div>
        <div class="tab-content-3"><p>
            <section>
                <form id="M3_form" method="post" enctype="multipart/form-data">
                    <input id = "location" name = "location" type = "hidden" value = "M3">

                    <?php require "feed_table.html"?>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage_M3">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "height: 1px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto"> 
                            <div> 圖片預覽 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: auto">
                            <img id="show_image_M3" src="">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload_M3()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 2px">
                        <div style = "height: 1px"> </div>
                    </div>
                
                </form>
                <div id="backmsg"></div>
                <br>
            </section>
        </p></div>
        <div class="tab-content-4"><p>
            <section>
                <form id="M4_form" method="post" enctype="multipart/form-data">
                    <input id = "location" name = "location" type = "hidden" value = "M4">

                    <?php require "feed_table.html"?>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto"> 
                            <div> 圖片預覽 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: auto">
                            <img id="show_image_M4" src="">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload_M4()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 2px">
                        <div style = "height: 1px"> </div>
                    </div>
                
                </form>
                <div id="backmsg"></div>
                <br>
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
            document.write('<script type="text/javascript" src="feed_check.js"></'+'script>');
            // M1 javascript------------------------------------------------------------
            function upload_M1() {
				// 此處是 javascript 寫法
				// var myForm = document.getElementById('myFile');
				// 底下是 jQuery 的寫法
				var myForm = $("#M1_form")[0];
				var formData = new FormData(myForm);

				var ret_message = check(formData) ;
                if(ret_message == "") post(formData) ;
                else alert(ret_message) ;
			}

			var imageProc_M1 = function(input) {
				if (input.files && input.files[0]) {
					// 建立一個 FileReader 物件
					var reader = new FileReader();
					// 當檔案讀取完後，所要進行的動作
					reader.onload = function(e) {
						// 顯示圖片
						$('#show_image_M1').attr("src", e.target.result).css("height", "500px").css("width", "500px");
						// // 將 DataURL 放到表單中
						// $("input[name='imagestring']").val(e.target.result);
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
			$(document).ready(function() {
				// 綁定事件
				$("#uploadimage_M1").change(function() {
					imageProc_M1(this);
				});
			});
            //---------------------------------------------------------------------------
            
            // M2 javascript------------------------------------------------------------
            function upload_M2() {
				// 此處是 javascript 寫法
				// var myForm = document.getElementById('myFile');
				// 底下是 jQuery 的寫法
				var myForm = $("##M2_form")[0];
				var formData = new FormData(myForm);

				var ret_message = check(formData) ;
                if(ret_message == "") post(formData) ;
                else alert(ret_message) ;
			}

			var imageProc_M2 = function(input) {
				if (input.files && input.files[0]) {
					// 建立一個 FileReader 物件
					var reader = new FileReader();
					// 當檔案讀取完後，所要進行的動作
					reader.onload = function(e) {
						// 顯示圖片
						$('#show_image_M2').attr("src", e.target.result).css("height", "500px").css("width", "500px");
						// // 將 DataURL 放到表單中
						// $("input[name='imagestring']").val(e.target.result);
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
			$(document).ready(function() {
				// 綁定事件
				$("#uploadimage_M2").change(function() {
					imageProc_M2(this);
				});
			});
            //---------------------------------------------------------------------------
            
            // M3 javascript------------------------------------------------------------
            function upload_M3() {
				// 此處是 javascript 寫法
				// var myForm = document.getElementById('myFile');
				// 底下是 jQuery 的寫法
				var myForm = $("#M3_form")[0];
				var formData = new FormData(myForm);

				var ret_message = check(formData) ;
                if(ret_message == "") post(formData) ;
                else alert(ret_message) ;
			}

			var imageProc_M3 = function(input) {
				if (input.files && input.files[0]) {
					// 建立一個 FileReader 物件
					var reader = new FileReader();
					// 當檔案讀取完後，所要進行的動作
					reader.onload = function(e) {
						// 顯示圖片
						$('#show_image_M3').attr("src", e.target.result).css("height", "500px").css("width", "500px");
						// // 將 DataURL 放到表單中
						// $("input[name='imagestring']").val(e.target.result);
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
			$(document).ready(function() {
				// 綁定事件
				$("#uploadimage_M3").change(function() {
					imageProc_M3(this);
				});
			});
            //---------------------------------------------------------------------------
            
            // M4 javascript------------------------------------------------------------
            function upload_M4() {
				// 此處是 javascript 寫法
				// var myForm = document.getElementById('myFile');
				// 底下是 jQuery 的寫法
				var myForm = $("#M4_form")[0];
				var formData = new FormData(myForm);

				var ret_message = check(formData) ;
                if(ret_message == "") post(formData) ;
                else alert(ret_message) ;
			}

			var imageProc_M4 = function(input) {
				if (input.files && input.files[0]) {
					// 建立一個 FileReader 物件
					var reader = new FileReader();
					// 當檔案讀取完後，所要進行的動作
					reader.onload = function(e) {
						// 顯示圖片
						$('#show_image_M4').attr("src", e.target.result).css("height", "500px").css("width", "500px");
						// // 將 DataURL 放到表單中
						// $("input[name='imagestring']").val(e.target.result);
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
			$(document).ready(function() {
				// 綁定事件
				$("#uploadimage_M4").change(function() {
					imageProc_M4(this);
				});
			});
            //---------------------------------------------------------------------------
            
            
		</script>
</body>

</html>
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
        @media (min-width: 1024px) {
            div.big_form{
                border: solid 1px black;
                animation: change 0s;
            }
            div.small_form{
                display: none;
            }

            @keyframes change {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        }

        @media (max-width: 1023px) {
            div.big_form{
                display: none;
            }
            div.small_form{
                border: solid 1px black;
                animation: change 0s;
            }

            @keyframes change {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        }

        #myswal{
            position: fixed;
            top : 5% ;
            left : 50% ;
        }
    </style>

	<!-- table -->
    <div>
        <!– 頁籤的內容區塊 –>
        <!-- 大螢幕 -->
        <div class="big_form"><p>
			<section>
				<form id="big_form" method="post" enctype="multipart/form-data">
                    <?php require "big_water_table.html"?>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage_big">
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
                            <img id="show_image_big" src="">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="add_before_big()">取得昨天資料</button>
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload_big()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 2px">
                        <div style = "height: 1px"> </div>
                    </div>
				</form>
			</section>
        </p></div>
        <!-- 小螢幕 -->
        <div class="small_form"><p>
			<section>
				<form id="small_form" method="post" enctype="multipart/form-data">
                    <?php require "small_water_table.html"?>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage_small">
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
                            <img id="show_image_small" src="">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="add_before_small()">取得昨天資料</button>
                        <div style = "width: 1%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload_small()">上傳</button>
                        <div id="backmsg"></div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 2px">
                        <div style = "height: 1px"> </div>
                    </div>
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

    <script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.10.2/jquery-1.10.2.min.js"></script>
    <script> document.write('<script type="text/javascript" src="water_check.js"></'+'script>'); </script>
    
    <!-- Swal 所需要的模組 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type=“text/javascript” src="sweetalert2.all.min.js"></script>
	<script>
        // 在頁面加載完成後執行初始化操作
        window.onload = function() {
            // 獲取要應用動畫的div元素
            var big = document.querySelector("div.big_form") ;
            var small = document.querySelector("div.small_form") ;
            // 監聽animationend事件
            big.addEventListener('animationend' , function() {
                // 在動畫結束後執行javascript函數
                change_to_big() ;
            });
            small.addEventListener('animationend' , function() {
                // 在動畫結束後執行javascript函數
                change_to_small() ;
            });
        }
        // 避免視窗大小不同時使用之form不同所導致的bug => 當改變視窗大小時傳輸檔案
        function change_to_big() {
            var big_Form = $("#big_form")[0];
            var small_Form = $("#small_form")[0];
            var big_Data = new FormData(big_Form);
            var small_Data = new FormData(small_Form);

            data_transfer(small_Data , "big_form") ;
            return ;
        }
        function change_to_small() {
            var big_Form = $("#big_form")[0];
            var small_Form = $("#small_form")[0];
            var big_Data = new FormData(big_Form);
            var small_Data = new FormData(small_Form);

            data_transfer(big_Data , "small_form") ;
            return ;
        }

        // big ---------------------------------------------------------------
        function myAlert(msg , formData) {
            // 定義自定義的彈出框樣式和行為
            // 可以是彈出一個模態框或在頁面上顯示一個自定義的消息框
            // 在此處調用您想要使用的JavaScript函數或插件來創建自定義樣式的彈出框

            // 例如，這裡使用 SweetAlert 插件來創建一個自定義的彈出框
            Swal.fire({
                title: msg,
                showCancelButton: true,
                confirmButtonText: '確認上傳',
                cancelButtonText: "再確認一下",
                }).then((result) => {
                    if (result.isConfirmed) {
                        post(formData) ;   
                    }
                })
        }

        function upload_big() {
            // 此處是 javascript 寫法
            // var myForm = document.getElementById('myFile');
            // 底下是 jQuery 的寫法
            var myForm = $("#big_form")[0];
            var formData = new FormData(myForm);

            var ret_message = check(formData) ;
            if(ret_message == "") post(formData) ;
            else if(!ret_message.includes("尚未") && ret_message.includes("注意")){
                myAlert(ret_message , formData) ;
            }
            else alert(ret_message) ;
        }

        //取得昨天資料
        function add_before_big() {
            var myForm = $("#big_form")[0];
            var formData = new FormData(myForm);
            
            //取得昨天資料前需先檢查日期與時間有沒有填入
            var ret_message = add_check(formData) ;
            if(ret_message == "") {
                var data = get_before(formData) ;
                var before_data_array = data[0] ;
                console.log(before_data_array) ;

                put_into_form(before_data_array);
            }
            else {
                alert(ret_message) ;
                return ;
            }
        }

        var imageProc_big = function(input) {
            if (input.files && input.files[0]) {
                // 建立一個 FileReader 物件
                var reader = new FileReader();
                // 當檔案讀取完後，所要進行的動作
                reader.onload = function(e) {
                    // 顯示圖片
                    $('#show_image_big').attr("src", e.target.result).css("height", "500px").css("width", "500px");
                    // // 將 DataURL 放到表單中
                    // $("input[name='imagestring']").val(e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            // 綁定事件
            $("#uploadimage_big").change(function() {
                imageProc_small(this);
                imageProc_big(this);
            });
        });
        //---------------------------------------------------------------------------



        // small ---------------------------------------------------------------
        function upload_small() {
            // 此處是 javascript 寫法
            // var myForm = document.getElementById('myFile');
            // 底下是 jQuery 的寫法
            var myForm = $("#small_form")[0];
            var formData = new FormData(myForm);

            var ret_message = check(formData) ;
            if(ret_message == "") post(formData) ;
            else if(!ret_message.includes("尚未") && ret_message.includes("注意")){
                myAlert(ret_message , formData) ;
            }
            else alert(ret_message) ;
        }

        //取得昨天資料
        function add_before_small() {
            var myForm = $("#small_form")[0];
            var formData = new FormData(myForm);
            
            //取得昨天資料前需先檢查日期與時間有沒有填入
            var ret_message = add_check(formData) ;
            if(ret_message == "") {
                var data = get_before(formData) ;
                var before_data_array = data[0] ;
                console.log(before_data_array) ;

                put_into_form(before_data_array);
            }
            else {
                alert(ret_message) ;
                return ;
            }
        }

        var imageProc_small = function(input) {
            if (input.files && input.files[0]) {
                // 建立一個 FileReader 物件
                var reader = new FileReader();
                // 當檔案讀取完後，所要進行的動作
                reader.onload = function(e) {
                    // 顯示圖片
                    $('#show_image_small').attr("src", e.target.result).css("height", "500px").css("width", "500px");
                    // // 將 DataURL 放到表單中
                    // $("input[name='imagestring']").val(e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            // 綁定事件
            $("#uploadimage_small").change(function() {
                imageProc_big(this);
                imageProc_small(this);
            });
        });
        //---------------------------------------------------------------------------
    </script>
</body>

</html>
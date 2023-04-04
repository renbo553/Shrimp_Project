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
    <title>新增 - 餵食</title>
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
    </style>

    <!-- table -->
    <div>
        <!– 頁籤的內容區塊 –>
        <!-- 大螢幕 -->
        <div class="big_form"><p>
            <section>
                <form id="big_form" method="post" enctype="multipart/form-data">
                    <?php require "big_feed_table.html"?>
                </form>
            </section>
        </p></div>
        <!-- 小螢幕 -->
        <div class="small_form"><p>
            <section>
                <form id="small_form" method="post" enctype="multipart/form-data">
                    <?php require "small_feed_table.html"?>
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
        document.write('<script type="text/javascript" src="feed_check.js"></'+'script>');
        
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

        function all_data_msg(msg , formData) {
            // 為上傳時最後確認的訊息
            Swal.fire({
                html: msg,
                showCancelButton: true,
                confirmButtonText: '確認!!!',
                cancelButtonText: "再確認一下/修改一下",
                }).then((result) => {
                    if (result.isConfirmed) {
                        post(formData) ;   
                    }
                })
        }

        // big ---------------------------------------------------------------
        function upload_big() {
            // 此處是 javascript 寫法
            // var myForm = document.getElementById('myFile');
            // 底下是 jQuery 的寫法
            var myForm = $("#big_form")[0];
            var formData = new FormData(myForm);

            var ret_message = check(formData) ;
            if(ret_message == "") {
                var msg = html_show_all_data(formData) ;
                all_data_msg(msg , formData) ;
            }
            else Alert(ret_message) ;
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

                put_into_form(before_data_array , "big_form");
            }
            else {
                Alert(ret_message) ;
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
            if(ret_message == "") {
                var msg = html_show_all_data(formData) ;
                all_data_msg(msg , formData) ;
            }
            else Alert(ret_message) ;
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

                put_into_form(before_data_array , "small_form");
            }
            else {
                Alert(ret_message) ;
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
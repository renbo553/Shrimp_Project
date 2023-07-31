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
	<title>修改 - 餵食</title>
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
					<?php require_once "big_modify_feed.html" ?>
				</form>
			</section>
        </p></div>
        <!-- 小螢幕 -->
        <div class="small_form"><p>
			<section>
				<form id="small_form" method="post" enctype="multipart/form-data">
					<?php require_once "small_modify_feed.html"?>
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
			window.onload = async function() {
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

				var urlParams = new URLSearchParams(window.location.search);
				await modify_put_into_form(urlParams , "big_form" , 1);
				await modify_put_into_form(urlParams , "small_form" , 1);
			}

			// 避免視窗大小不同時使用之form不同所導致的bug => 當改變視窗大小時傳輸檔案
			function change_to_big() {
				var big_Form = $("#big_form")[0];
				var small_Form = $("#small_form")[0];
				var big_Data = new FormData(big_Form);
				var small_Data = new FormData(small_Form);

				modify_data_transfer(small_Data , "big_form") ;
				return ;
			}
			function change_to_small() {
				var big_Form = $("#big_form")[0];
				var small_Form = $("#small_form")[0];
				var big_Data = new FormData(big_Form);
				var small_Data = new FormData(small_Form);

				modify_data_transfer(big_Data , "small_form") ;
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
							modify_post(formData) ;   
						}
					})
			}

			function myAlert(msg , formData) {
				// 定義自定義的彈出框樣式和行為
				// 可以是彈出一個模態框或在頁面上顯示一個自定義的消息框
				// 在此處調用您想要使用的JavaScript函數或插件來創建自定義樣式的彈出框

				// 例如，這裡使用 SweetAlert 插件來創建一個自定義的彈出框
				Swal.fire({
					title : msg,
					showCancelButton: true,
					confirmButtonText: '仍要上傳',
					cancelButtonText: "再確認一下/修改一下",
					}).then((result) => {
						if (result.isConfirmed) {
							all_data_msg(html_show_all_data(formData) , formData) ;   
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
				if(ret_message == "") all_data_msg("請確認好所有想輸入的資料哦!" , formData) ;
				else Alert(ret_message) ;
			}

			var imageProc_big = function(input) {
				if (input.files && input.files[0]) {
					// 建立一個 FileReader 物件
					var reader = new FileReader();
					// 當檔案讀取完後，所要進行的動作
					reader.onload = function(e) {
						// 顯示圖片
						$('#show_image_big').attr("src", e.target.result).css("height", big_picture_height).css("width", big_picture_width);
						// // 將 DataURL 放到表單中
						// $("input[name='imagestring']").val(e.target.result);
					};
					reader.readAsDataURL(input.files[0]);
				}
				else {
					document.getElementById("show_image_big").src = "";
					document.getElementById("show_image_small").src = "";
					document.getElementById("show_image_big").style.height = "0px";
					document.getElementById("show_image_big").style.width = "0px";
					document.getElementById("show_image_small").style.height = "0px";
					document.getElementById("show_image_small").style.width = "0px";
				}
			}
			$(document).ready(function() {
				//實作按下取消即不選檔案
				$("#uploadimage_big").change(function() {
					fileCancel = false
					var from_image_filelist = this.files ;
					document.getElementById("uploadimage_small").files = from_image_filelist ;
					imageProc_small(this);
					imageProc_big(this);
				});
				document.getElementById("uploadimage_big").addEventListener("click" , (e) => {
					fileCancel = true ;
					// 模擬取消事件
					window.addEventListener(
						'focus',
						() => {
							console.log("fuck")
							setTimeout(() => {
									if(fileCancel) {
										document.getElementById("uploadimage_small").files = null ;
										document.getElementById("uploadimage_big").files = null ;
										document.getElementById("uploadimage_small").value = "" ;
										document.getElementById("uploadimage_big").value = "" ;
										document.getElementById("show_image_big").src = "";
										document.getElementById("show_image_small").src = "";
										document.getElementById("show_image_big").style.height = "0px";
										document.getElementById("show_image_big").style.width = "0px";
										document.getElementById("show_image_small").style.height = "0px";
										document.getElementById("show_image_small").style.width = "0px";
									}
							}, 300)
						},
						{ once: true }
					)
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
				if(ret_message == "") all_data_msg("請確認好所有想輸入的資料哦!" , formData) ;
				else Alert(ret_message) ;
			}

			var imageProc_small = function(input) {
				if (input.files && input.files[0]) {
					// 建立一個 FileReader 物件
					var reader = new FileReader();
					// 當檔案讀取完後，所要進行的動作
					reader.onload = function(e) {
						// 顯示圖片
						$('#show_image_small').attr("src", e.target.result).css("height", small_picture_height).css("width", small_picture_width);
						// // 將 DataURL 放到表單中
						// $("input[name='imagestring']").val(e.target.result);
					};
					reader.readAsDataURL(input.files[0]);
				}
				else {
					document.getElementById("show_image_big").src = "";
					document.getElementById("show_image_small").src = "";
					document.getElementById("show_image_big").style.height = "0px";
					document.getElementById("show_image_big").style.width = "0px";
					document.getElementById("show_image_small").style.height = "0px";
					document.getElementById("show_image_small").style.width = "0px";
				}
			}
			$(document).ready(function() {
				//實作按下取消即不選檔案
				$("#uploadimage_small").change(function() {
					fileCancel = false
					var from_image_filelist = this.files ;
					document.getElementById("uploadimage_big").files = from_image_filelist ;
					imageProc_small(this);
					imageProc_big(this);
				});
				document.getElementById("uploadimage_small").addEventListener("click" , (e) => {
					fileCancel = true ;
					// 模擬取消事件
					window.addEventListener(
						'focus',
						() => {
							console.log("fuck")
							setTimeout(() => {
									if(fileCancel) {
										document.getElementById("uploadimage_small").files = null ;
										document.getElementById("uploadimage_big").files = null ;
										document.getElementById("uploadimage_small").value = "" ;
										document.getElementById("uploadimage_big").value = "" ;
										document.getElementById("show_image_big").src = "";
										document.getElementById("show_image_small").src = "";
										document.getElementById("show_image_big").style.height = "0px";
										document.getElementById("show_image_big").style.width = "0px";
										document.getElementById("show_image_small").style.height = "0px";
										document.getElementById("show_image_small").style.width = "0px";
									}
							}, 300)
						},
						{ once: true }
					)
				});
			});
			//---------------------------------------------------------------------------
		</script>
</body>

</html>
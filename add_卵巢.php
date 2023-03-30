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
	<title>新增 - 卵巢成熟</title>
	<!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<!-- table -->
    <div>
		<!– 頁籤的內容區塊 –>
		<!-- 大螢幕 -->
		<div><p>
			<section>
				<form id="myFile" method="post" enctype="multipart/form-data">
					<?php require "big_ovary_table.html"?>

					<div class="form-inline" style = "width: 100%">
                        <div style = "width: 3%"> </div>
                        <div style = "width: auto">
                            <div> 上傳紙本圖片 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: 30%"> 
                            <input accept="image/*" type="file" name="fileField" id="uploadimage">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100% ; height: 1%">
                        <div style = "height: 1px"> </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 3%"> </div>
                        <div style = "width: auto"> 
                            <div> 圖片預覽 </div>
                        </div>
                        <div style = "width: 5px"> </div>
                        <div style = "width: auto">
                            <img id="show_image" src="">
                        </div>
                    </div>

                    <div class="form-inline" style = "width: 100%">
                        <div style = "width: 3%"> </div>
                        <button type="button" class="btn btn-primary" onclick="upload()">上傳</button>
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
    <script> document.write('<script type="text/javascript" src="ovary_check.js"></'+'script>'); </script>

		<script>
			function all_data_msg(msg , formData) {
				// 為上傳時最後確認的訊息
				Swal.fire({
					html: msg,
					showCancelButton: true,
					confirmButtonText: '確認上傳!!!',
					cancelButtonText: "再確認一下/修改一下",
					}).then((result) => {
						if (result.isConfirmed) {
							post(formData) ;   
						}
					})
        	}

			function upload() {
				// 此處是 javascript 寫法
				// var myForm = document.getElementById('myFile');
				// 底下是 jQuery 的寫法
				var myForm = $("#myFile")[0];
				var formData = new FormData(myForm);

				var ret_message = check(formData) ;
				if(ret_message == "") {
					var msg = html_show_all_data(formData) ;
                	all_data_msg(msg , formData) ;
				}
				else Alert(ret_message) ;
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
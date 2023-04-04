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
	<title>修改 - 卵巢成熟</title>
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

	<div>
		<section>
			<form id="big_form" method="post" enctype="multipart/form-data">
				<?php echo
				' 
					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 3%"> </div>
						<div style = "width: 20%"> 上傳紙本圖片 </div>
						<div style = "width: 20%">
							<input accept="image/*" type="file"  name="fileField" id="uploadimage_big">
						</div>
					</div>

					<div class="form-inline" style = "width: 100%">
						<div style = "width: 3%"> </div>
						<div style = "width: 20%"> 圖片預覽 </div>
						<div style = "width: 5px"> </div>
						<div style = "width: auto">
							<img id="show_image_big" src=' . $_GET['image'] . '>
						</div>
					</div>
					
					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 3%"> </div>
						<div style = "width: 20%"> Index </div>
						<div style = "width: 20%">
							<input id="id" name="id" value='.$_GET['id'].' class="form-control" readonly>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 3%"> </div>
						<div style = "width: 20%"> 日期 </div>
						<div style = "width: 20%">
							<div style = "height: 13px ;"> </div>
							<div class="input-group">
								<div style="border-width:1px ; border-right-style:solid" class = "type_name">  </div>
								<input width = "50px" id="date" name="date" type="date" value='.$_GET['date'].'>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 3%"> </div>
						<div style = "width: 20%"> 眼標 </div>
						<div style = "width: 20%">
							<input id="eye" name="eye" type="text" class="form-control" value=' . $_GET["eye"] . '>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 3%"> </div>
						<div style = "width: 20%"> 卵巢狀態 </div>
						<div style = "width: 20%">
							<select id="ovarystate" name="ovarystate" class="custom-select">
								<option value='.$_GET['ovarystate'].'> '.$_GET['ovarystate'].' </option>
								<option value=""></option>
								<option value="0">0</option>
								<option value="0-Ⅰ">0-Ⅰ</option>
								<option value="Ⅰ">Ⅰ</option>
								<option value="Ⅰ-Ⅱ">Ⅰ-Ⅱ</option>
								<option value="Ⅱ">Ⅱ</option>
								<option value="Ⅱ-Ⅲ">Ⅱ-Ⅲ</option>
								<option value="Ⅲ">Ⅲ</option>
								<option value="脫殼">脫殼</option>
								<option value="受精">受精</option>
								<option value="生產">生產</option>
								<option value="死亡">死亡</option>
								<option value="淘汰">淘汰</option>
							</select>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 3%"> </div>
						<button type="button" class="btn btn-primary" onclick="upload_big()">修改</button>
						<div id="backmsg"></div>
					</div>
				'
				?>
			</form>
		</section>
    </div>

	<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.10.2/jquery-1.10.2.min.js"></script>
    <script> document.write('<script type="text/javascript" src="ovary_check.js"></'+'script>'); </script>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
		
	<script>
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
                imageProc_big(this);
            });
        });
        //---------------------------------------------------------------------------
	</script>
</body>

</html>
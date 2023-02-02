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
					// if(!strlen(trim($_POST["nh4"]))){
					// 	$input_err = "Please enter 'NH4-H'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["nh4"]))<0){
					// 		$input_err = "'NH4-H' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["no2"]))){
					// 	$input_err = "Please enter 'NO2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["no2"]))<0){
					// 		$input_err = "'NO2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["no3"]))){
					// 	$input_err = "Please enter 'NO3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["no3"]))<0){
					// 		$input_err = "'NO3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_1"]))){
					// 	$input_err = "Please enter 'Salinity_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_1"]))<0){
					// 		$input_err = "'Salinity_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_2"]))){
					// 	$input_err = "Please enter 'Salinity_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_2"]))<0){
					// 		$input_err = "'Salinity_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_3"]))){
					// 	$input_err = "Please enter 'Salinity_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_3"]))<0){
					// 		$input_err = "'Salinity_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_1"]))){
					// 	$input_err = "Please enter 'pH_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_1"]))<0){
					// 		$input_err = "'pH_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_2"]))){
					// 	$input_err = "Please enter 'pH_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_2"]))<0){
					// 		$input_err = "'pH_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_3"]))){
					// 	$input_err = "Please enter 'pH_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_3"]))<0){
					// 		$input_err = "'pH_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_1"]))){
					// 	$input_err = "Please enter 'O2_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_1"]))<0){
					// 		$input_err = "'O2_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_2"]))){
					// 	$input_err = "Please enter 'O2_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_2"]))<0){
					// 		$input_err = "'O2_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_3"]))){
					// 	$input_err = "Please enter 'O2_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_3"]))<0){
					// 		$input_err = "'O2_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_1"]))){
					// 	$input_err = "Please enter 'ORP_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_1"]))<0){
					// 		$input_err = "'ORP_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_2"]))){
					// 	$input_err = "Please enter 'ORP_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_2"]))<0){
					// 		$input_err = "'ORP_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_3"]))){
					// 	$input_err = "Please enter 'ORP_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_3"]))<0){
					// 		$input_err = "'ORP_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_1"]))){
					// 	$input_err = "Please enter 'Temp_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_1"]))<0){
					// 		$input_err = "'Temp_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_2"]))){
					// 	$input_err = "Please enter 'Temp_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_2"]))<0){
					// 		$input_err = "'Temp_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_3"]))){
					// 	$input_err = "Please enter 'Temp_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_3"]))<0){
					// 		$input_err = "'Temp_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Alkalinity"]))){
					// 	$input_err = "Please enter 'Alkalinity'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Alkalinity"]))<0){
					// 		$input_err = "'Alkalinity' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["TCBS"]))){
					// 	$input_err = "Please enter 'TCBS'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["TCBS"]))<0){
					// 		$input_err = "'TCBS' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["綠菌"]))){
					// 	$input_err = "Please enter 'TCBS 綠菌'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["綠菌"]))<0){
					// 		$input_err = "'TCBS 綠菌' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Marine"]))){
					// 	$input_err = "Please enter 'Marine'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Marine"]))<0){
					// 		$input_err = "'Marine' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["螢光菌TCBS"]))){
					// 	$input_err = "Please enter '螢光菌TCBS'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["螢光菌TCBS"]))<0){
					// 		$input_err = "'螢光菌TCBS' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["螢光菌Marine"]))){
					// 	$input_err = "Please enter '螢光菌Marine'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["螢光菌Marine"]))<0){
					// 		$input_err = "'螢光菌Marine' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					if (!strlen($input_err)) {
						$param1 = trim($_POST["date"]);
						$param2 = trim($_POST["location"]);
						// $param3 = trim($_POST["nh4"]);
						// $param4 = trim($_POST["no2"]);
						// $param5 = trim($_POST["no3"]);
						// $param6 = trim($_POST["Salinity_1"]);
						// $param7 = trim($_POST["Salinity_2"]);
						// $param8 = trim($_POST["Salinity_3"]);
						// $param9 = trim($_POST["pH_1"]);
						// $param10 = trim($_POST["pH_2"]);
						// $param11 = trim($_POST["pH_3"]);
						// $param12 = trim($_POST["O2_1"]);
						// $param13 = trim($_POST["O2_2"]);
						// $param14 = trim($_POST["O2_3"]);
						// $param15 = trim($_POST["ORP_1"]);
						// $param16 = trim($_POST["ORP_2"]);
						// $param17 = trim($_POST["ORP_3"]);
						// $param18 = trim($_POST["Temp_1"]);
						// $param19 = trim($_POST["Temp_2"]);
						// $param20 = trim($_POST["Temp_3"]);
						// $param21 = trim($_POST["Alkalinity"]);
						// $param22 = trim($_POST["TCBS"]);
						// $param23 = trim($_POST["綠菌"]);
						// $param24 = trim($_POST["Marine"]);
						// $param25 = trim($_POST["螢光菌TCBS"]);
						// $param26 = trim($_POST["螢光菌Marine"]);
						// $param27 = trim($_POST["note"]);
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
					<table class="table">
						<!-- <th>TankID</th>
							<td colspan = "9">
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
							</td> -->
						<tr>
							<th>NH<sub>4</sub>-H</th>
							<td>
								<div class="input-group">
									<input id="text2" name="nh4" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_1</th>
							<td>
								<div>
									<input id="text8" name="pH_1" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_1</th>
							<td>
								<div class="input-group">
									<input id="text14" name="ORP_1" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>Alkalinity</th>
							<td>
								<div class="input-group">
									<input id="text20" name="Alkalinity" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(ppm)</div>
									</div>
								</div>
							</td>

							<th>日期</th>
							<td>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-calendar-o"></i>
										</div>
									</div>
									<input id="text1" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
								</div>
							</td>
						</tr>
						<tr>
							<th>NO<sub>2</sub></th>
							<td>
								<div class="input-group">
									<input id="text3" name="no2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_2</th>
							<td>
								<div>
									<input id="text9" name="pH_2" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_2</th>
							<td>
								<div class="input-group">
									<input id="text15" name="ORP_2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>TCBS</th>
							<td>
								<div class="input-group">
									<input id="text21" name="TCBS" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>

							<th>上傳紙本圖片</th>
							<td>
								<input accept="image/*" type="file" name="fileField" id="uploadimage">
							</td>
						</tr>
						<tr>
							<th>NO<sub>3</sub></th>
							<td>
								<div class="input-group">
									<input id="text4" name="no3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_3</th>
							<td>
								<div>
									<input id="text10" name="pH_3" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_3</th>
							<td>
								<div class="input-group">
									<input id="text16" name="ORP_3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>TCBS 綠菌</th>
							<td>
								<div class="input-group">
									<input id="text22" name="綠菌" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>

							<th>圖片預覽</th>
							<td rowspan = "5" colspan = "3">
								<img id="show_image" src="">
							</td>
						</tr>
						<tr>
							<th>Salinity_1</th>
							<td>
								<div>
									<input id="text5" name="Salinity_1" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_1</th>
							<td>
								<div class="input-group">
									<input id="text11" name="O2_1" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_1</th>
							<td>
								<div>
									<input id="text17" name="Temp_1" type="text" class="form-control">
								</div>
							</td>

							<th>Marine</th>
							<td>
								<div class="input-group">
									<input id="text23" name="Marine" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>Salinity_2</th>
							<td>
								<div>
									<input id="text6" name="Salinity_2" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_2</th>
							<td>
								<div class="input-group">
									<input id="text12" name="O2_2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_2</th>
							<td>
								<div>
									<input id="text18" name="Temp_2" type="text" class="form-control">
								</div>
							</td>

							<th>螢光菌TCBS</th>
							<td>
								<div class="input-group">
									<input id="text24" name="螢光菌TCBS" type="text" class="foNoterm-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>Salinity_3</th>
							<td>
								<div>
									<input id="text7" name="Salinity_3" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_3</th>
							<td>
								<div class="input-group">
									<input id="text13" name="O2_3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_3</th>
							<td>
								<div>
									<input id="text19" name="Temp_3" type="text" class="form-control">
								</div>
							</td>

							<th>螢光菌Marine</th>
							<td>
								<div class="input-group">
									<input id="text25" name="螢光菌Marine" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>備註</th>
							<td colspan = "9">
								<div class="col-6">
									<textarea id="textarea1" name="Note" cols="40" rows="5" class="form-control"></textarea>
								</div>
							</td>
						</tr>
					</table>
				</form>

				 
				<div id="backmsg"></div>
				<br>
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
					// if(!strlen(trim($_POST["nh4"]))){
					// 	$input_err = "Please enter 'NH4-H'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["nh4"]))<0){
					// 		$input_err = "'NH4-H' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["no2"]))){
					// 	$input_err = "Please enter 'NO2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["no2"]))<0){
					// 		$input_err = "'NO2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["no3"]))){
					// 	$input_err = "Please enter 'NO3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["no3"]))<0){
					// 		$input_err = "'NO3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_1"]))){
					// 	$input_err = "Please enter 'Salinity_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_1"]))<0){
					// 		$input_err = "'Salinity_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_2"]))){
					// 	$input_err = "Please enter 'Salinity_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_2"]))<0){
					// 		$input_err = "'Salinity_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_3"]))){
					// 	$input_err = "Please enter 'Salinity_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_3"]))<0){
					// 		$input_err = "'Salinity_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_1"]))){
					// 	$input_err = "Please enter 'pH_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_1"]))<0){
					// 		$input_err = "'pH_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_2"]))){
					// 	$input_err = "Please enter 'pH_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_2"]))<0){
					// 		$input_err = "'pH_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_3"]))){
					// 	$input_err = "Please enter 'pH_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_3"]))<0){
					// 		$input_err = "'pH_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_1"]))){
					// 	$input_err = "Please enter 'O2_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_1"]))<0){
					// 		$input_err = "'O2_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_2"]))){
					// 	$input_err = "Please enter 'O2_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_2"]))<0){
					// 		$input_err = "'O2_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_3"]))){
					// 	$input_err = "Please enter 'O2_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_3"]))<0){
					// 		$input_err = "'O2_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_1"]))){
					// 	$input_err = "Please enter 'ORP_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_1"]))<0){
					// 		$input_err = "'ORP_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_2"]))){
					// 	$input_err = "Please enter 'ORP_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_2"]))<0){
					// 		$input_err = "'ORP_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_3"]))){
					// 	$input_err = "Please enter 'ORP_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_3"]))<0){
					// 		$input_err = "'ORP_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_1"]))){
					// 	$input_err = "Please enter 'Temp_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_1"]))<0){
					// 		$input_err = "'Temp_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_2"]))){
					// 	$input_err = "Please enter 'Temp_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_2"]))<0){
					// 		$input_err = "'Temp_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_3"]))){
					// 	$input_err = "Please enter 'Temp_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_3"]))<0){
					// 		$input_err = "'Temp_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Alkalinity"]))){
					// 	$input_err = "Please enter 'Alkalinity'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Alkalinity"]))<0){
					// 		$input_err = "'Alkalinity' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["TCBS"]))){
					// 	$input_err = "Please enter 'TCBS'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["TCBS"]))<0){
					// 		$input_err = "'TCBS' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["綠菌"]))){
					// 	$input_err = "Please enter 'TCBS 綠菌'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["綠菌"]))<0){
					// 		$input_err = "'TCBS 綠菌' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Marine"]))){
					// 	$input_err = "Please enter 'Marine'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Marine"]))<0){
					// 		$input_err = "'Marine' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["螢光菌TCBS"]))){
					// 	$input_err = "Please enter '螢光菌TCBS'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["螢光菌TCBS"]))<0){
					// 		$input_err = "'螢光菌TCBS' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["螢光菌Marine"]))){
					// 	$input_err = "Please enter '螢光菌Marine'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["螢光菌Marine"]))<0){
					// 		$input_err = "'螢光菌Marine' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					if (!strlen($input_err)) {
						$param1 = trim($_POST["date"]);
						$param2 = trim($_POST["location"]);
						// $param3 = trim($_POST["nh4"]);
						// $param4 = trim($_POST["no2"]);
						// $param5 = trim($_POST["no3"]);
						// $param6 = trim($_POST["Salinity_1"]);
						// $param7 = trim($_POST["Salinity_2"]);
						// $param8 = trim($_POST["Salinity_3"]);
						// $param9 = trim($_POST["pH_1"]);
						// $param10 = trim($_POST["pH_2"]);
						// $param11 = trim($_POST["pH_3"]);
						// $param12 = trim($_POST["O2_1"]);
						// $param13 = trim($_POST["O2_2"]);
						// $param14 = trim($_POST["O2_3"]);
						// $param15 = trim($_POST["ORP_1"]);
						// $param16 = trim($_POST["ORP_2"]);
						// $param17 = trim($_POST["ORP_3"]);
						// $param18 = trim($_POST["Temp_1"]);
						// $param19 = trim($_POST["Temp_2"]);
						// $param20 = trim($_POST["Temp_3"]);
						// $param21 = trim($_POST["Alkalinity"]);
						// $param22 = trim($_POST["TCBS"]);
						// $param23 = trim($_POST["綠菌"]);
						// $param24 = trim($_POST["Marine"]);
						// $param25 = trim($_POST["螢光菌TCBS"]);
						// $param26 = trim($_POST["螢光菌Marine"]);
						// $param27 = trim($_POST["note"]);
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
					<table class="table">
						<!-- <th>TankID</th>
							<td colspan = "9">
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
							</td> -->
						<tr>
							<th>NH<sub>4</sub>-H</th>
							<td>
								<div class="input-group">
									<input id="text2" name="nh4" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_1</th>
							<td>
								<div>
									<input id="text8" name="pH_1" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_1</th>
							<td>
								<div class="input-group">
									<input id="text14" name="ORP_1" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>Alkalinity</th>
							<td>
								<div class="input-group">
									<input id="text20" name="Alkalinity" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(ppm)</div>
									</div>
								</div>
							</td>

							<th>日期</th>
							<td>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-calendar-o"></i>
										</div>
									</div>
									<input id="text1" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
								</div>
							</td>
						</tr>
						<tr>
							<th>NO<sub>2</sub></th>
							<td>
								<div class="input-group">
									<input id="text3" name="no2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_2</th>
							<td>
								<div>
									<input id="text9" name="pH_2" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_2</th>
							<td>
								<div class="input-group">
									<input id="text15" name="ORP_2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>TCBS</th>
							<td>
								<div class="input-group">
									<input id="text21" name="TCBS" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>

							<th>上傳紙本圖片</th>
							<td>
								<input accept="image/*" type="file" name="fileField" id="uploadimage">
							</td>
						</tr>
						<tr>
							<th>NO<sub>3</sub></th>
							<td>
								<div class="input-group">
									<input id="text4" name="no3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_3</th>
							<td>
								<div>
									<input id="text10" name="pH_3" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_3</th>
							<td>
								<div class="input-group">
									<input id="text16" name="ORP_3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>TCBS 綠菌</th>
							<td>
								<div class="input-group">
									<input id="text22" name="綠菌" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>

							<th>圖片預覽</th>
							<td rowspan = "5" colspan = "3">
								<img id="show_image" src="">
							</td>
						</tr>
						<tr>
							<th>Salinity_1</th>
							<td>
								<div>
									<input id="text5" name="Salinity_1" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_1</th>
							<td>
								<div class="input-group">
									<input id="text11" name="O2_1" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_1</th>
							<td>
								<div>
									<input id="text17" name="Temp_1" type="text" class="form-control">
								</div>
							</td>

							<th>Marine</th>
							<td>
								<div class="input-group">
									<input id="text23" name="Marine" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>Salinity_2</th>
							<td>
								<div>
									<input id="text6" name="Salinity_2" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_2</th>
							<td>
								<div class="input-group">
									<input id="text12" name="O2_2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_2</th>
							<td>
								<div>
									<input id="text18" name="Temp_2" type="text" class="form-control">
								</div>
							</td>

							<th>螢光菌TCBS</th>
							<td>
								<div class="input-group">
									<input id="text24" name="螢光菌TCBS" type="text" class="foNoterm-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>Salinity_3</th>
							<td>
								<div>
									<input id="text7" name="Salinity_3" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_3</th>
							<td>
								<div class="input-group">
									<input id="text13" name="O2_3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_3</th>
							<td>
								<div>
									<input id="text19" name="Temp_3" type="text" class="form-control">
								</div>
							</td>

							<th>螢光菌Marine</th>
							<td>
								<div class="input-group">
									<input id="text25" name="螢光菌Marine" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>備註</th>
							<td colspan = "9">
								<div class="col-6">
									<textarea id="textarea1" name="Note" cols="40" rows="5" class="form-control"></textarea>
								</div>
							</td>
						</tr>
					</table>
				</form>

				 
				<div id="backmsg"></div>
				<br>
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
					// if(!strlen(trim($_POST["nh4"]))){
					// 	$input_err = "Please enter 'NH4-H'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["nh4"]))<0){
					// 		$input_err = "'NH4-H' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["no2"]))){
					// 	$input_err = "Please enter 'NO2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["no2"]))<0){
					// 		$input_err = "'NO2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["no3"]))){
					// 	$input_err = "Please enter 'NO3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["no3"]))<0){
					// 		$input_err = "'NO3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_1"]))){
					// 	$input_err = "Please enter 'Salinity_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_1"]))<0){
					// 		$input_err = "'Salinity_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_2"]))){
					// 	$input_err = "Please enter 'Salinity_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_2"]))<0){
					// 		$input_err = "'Salinity_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_3"]))){
					// 	$input_err = "Please enter 'Salinity_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_3"]))<0){
					// 		$input_err = "'Salinity_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_1"]))){
					// 	$input_err = "Please enter 'pH_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_1"]))<0){
					// 		$input_err = "'pH_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_2"]))){
					// 	$input_err = "Please enter 'pH_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_2"]))<0){
					// 		$input_err = "'pH_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_3"]))){
					// 	$input_err = "Please enter 'pH_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_3"]))<0){
					// 		$input_err = "'pH_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_1"]))){
					// 	$input_err = "Please enter 'O2_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_1"]))<0){
					// 		$input_err = "'O2_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_2"]))){
					// 	$input_err = "Please enter 'O2_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_2"]))<0){
					// 		$input_err = "'O2_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_3"]))){
					// 	$input_err = "Please enter 'O2_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_3"]))<0){
					// 		$input_err = "'O2_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_1"]))){
					// 	$input_err = "Please enter 'ORP_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_1"]))<0){
					// 		$input_err = "'ORP_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_2"]))){
					// 	$input_err = "Please enter 'ORP_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_2"]))<0){
					// 		$input_err = "'ORP_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_3"]))){
					// 	$input_err = "Please enter 'ORP_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_3"]))<0){
					// 		$input_err = "'ORP_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_1"]))){
					// 	$input_err = "Please enter 'Temp_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_1"]))<0){
					// 		$input_err = "'Temp_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_2"]))){
					// 	$input_err = "Please enter 'Temp_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_2"]))<0){
					// 		$input_err = "'Temp_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_3"]))){
					// 	$input_err = "Please enter 'Temp_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_3"]))<0){
					// 		$input_err = "'Temp_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Alkalinity"]))){
					// 	$input_err = "Please enter 'Alkalinity'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Alkalinity"]))<0){
					// 		$input_err = "'Alkalinity' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["TCBS"]))){
					// 	$input_err = "Please enter 'TCBS'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["TCBS"]))<0){
					// 		$input_err = "'TCBS' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["綠菌"]))){
					// 	$input_err = "Please enter 'TCBS 綠菌'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["綠菌"]))<0){
					// 		$input_err = "'TCBS 綠菌' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Marine"]))){
					// 	$input_err = "Please enter 'Marine'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Marine"]))<0){
					// 		$input_err = "'Marine' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["螢光菌TCBS"]))){
					// 	$input_err = "Please enter '螢光菌TCBS'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["螢光菌TCBS"]))<0){
					// 		$input_err = "'螢光菌TCBS' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["螢光菌Marine"]))){
					// 	$input_err = "Please enter '螢光菌Marine'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["螢光菌Marine"]))<0){
					// 		$input_err = "'螢光菌Marine' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					if (!strlen($input_err)) {
						$param1 = trim($_POST["date"]);
						$param2 = trim($_POST["location"]);
						// $param3 = trim($_POST["nh4"]);
						// $param4 = trim($_POST["no2"]);
						// $param5 = trim($_POST["no3"]);
						// $param6 = trim($_POST["Salinity_1"]);
						// $param7 = trim($_POST["Salinity_2"]);
						// $param8 = trim($_POST["Salinity_3"]);
						// $param9 = trim($_POST["pH_1"]);
						// $param10 = trim($_POST["pH_2"]);
						// $param11 = trim($_POST["pH_3"]);
						// $param12 = trim($_POST["O2_1"]);
						// $param13 = trim($_POST["O2_2"]);
						// $param14 = trim($_POST["O2_3"]);
						// $param15 = trim($_POST["ORP_1"]);
						// $param16 = trim($_POST["ORP_2"]);
						// $param17 = trim($_POST["ORP_3"]);
						// $param18 = trim($_POST["Temp_1"]);
						// $param19 = trim($_POST["Temp_2"]);
						// $param20 = trim($_POST["Temp_3"]);
						// $param21 = trim($_POST["Alkalinity"]);
						// $param22 = trim($_POST["TCBS"]);
						// $param23 = trim($_POST["綠菌"]);
						// $param24 = trim($_POST["Marine"]);
						// $param25 = trim($_POST["螢光菌TCBS"]);
						// $param26 = trim($_POST["螢光菌Marine"]);
						// $param27 = trim($_POST["note"]);
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
					<table class="table">
						<!-- <th>TankID</th>
							<td colspan = "9">
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
							</td> -->
						<tr>
							<th>NH<sub>4</sub>-H</th>
							<td>
								<div class="input-group">
									<input id="text2" name="nh4" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_1</th>
							<td>
								<div>
									<input id="text8" name="pH_1" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_1</th>
							<td>
								<div class="input-group">
									<input id="text14" name="ORP_1" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>Alkalinity</th>
							<td>
								<div class="input-group">
									<input id="text20" name="Alkalinity" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(ppm)</div>
									</div>
								</div>
							</td>

							<th>日期</th>
							<td>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-calendar-o"></i>
										</div>
									</div>
									<input id="text1" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
								</div>
							</td>
						</tr>
						<tr>
							<th>NO<sub>2</sub></th>
							<td>
								<div class="input-group">
									<input id="text3" name="no2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_2</th>
							<td>
								<div>
									<input id="text9" name="pH_2" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_2</th>
							<td>
								<div class="input-group">
									<input id="text15" name="ORP_2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>TCBS</th>
							<td>
								<div class="input-group">
									<input id="text21" name="TCBS" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>

							<th>上傳紙本圖片</th>
							<td>
								<input accept="image/*" type="file" name="fileField" id="uploadimage">
							</td>
						</tr>
						<tr>
							<th>NO<sub>3</sub></th>
							<td>
								<div class="input-group">
									<input id="text4" name="no3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_3</th>
							<td>
								<div>
									<input id="text10" name="pH_3" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_3</th>
							<td>
								<div class="input-group">
									<input id="text16" name="ORP_3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>TCBS 綠菌</th>
							<td>
								<div class="input-group">
									<input id="text22" name="綠菌" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>

							<th>圖片預覽</th>
							<td rowspan = "5" colspan = "3">
								<img id="show_image" src="">
							</td>
						</tr>
						<tr>
							<th>Salinity_1</th>
							<td>
								<div>
									<input id="text5" name="Salinity_1" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_1</th>
							<td>
								<div class="input-group">
									<input id="text11" name="O2_1" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_1</th>
							<td>
								<div>
									<input id="text17" name="Temp_1" type="text" class="form-control">
								</div>
							</td>

							<th>Marine</th>
							<td>
								<div class="input-group">
									<input id="text23" name="Marine" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>Salinity_2</th>
							<td>
								<div>
									<input id="text6" name="Salinity_2" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_2</th>
							<td>
								<div class="input-group">
									<input id="text12" name="O2_2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_2</th>
							<td>
								<div>
									<input id="text18" name="Temp_2" type="text" class="form-control">
								</div>
							</td>

							<th>螢光菌TCBS</th>
							<td>
								<div class="input-group">
									<input id="text24" name="螢光菌TCBS" type="text" class="foNoterm-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>Salinity_3</th>
							<td>
								<div>
									<input id="text7" name="Salinity_3" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_3</th>
							<td>
								<div class="input-group">
									<input id="text13" name="O2_3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_3</th>
							<td>
								<div>
									<input id="text19" name="Temp_3" type="text" class="form-control">
								</div>
							</td>

							<th>螢光菌Marine</th>
							<td>
								<div class="input-group">
									<input id="text25" name="螢光菌Marine" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>備註</th>
							<td colspan = "9">
								<div class="col-6">
									<textarea id="textarea1" name="Note" cols="40" rows="5" class="form-control"></textarea>
								</div>
							</td>
						</tr>
					</table>
				</form>

				 
				<div id="backmsg"></div>
				<br>
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
					// if(!strlen(trim($_POST["nh4"]))){
					// 	$input_err = "Please enter 'NH4-H'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["nh4"]))<0){
					// 		$input_err = "'NH4-H' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["no2"]))){
					// 	$input_err = "Please enter 'NO2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["no2"]))<0){
					// 		$input_err = "'NO2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["no3"]))){
					// 	$input_err = "Please enter 'NO3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["no3"]))<0){
					// 		$input_err = "'NO3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_1"]))){
					// 	$input_err = "Please enter 'Salinity_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_1"]))<0){
					// 		$input_err = "'Salinity_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_2"]))){
					// 	$input_err = "Please enter 'Salinity_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_2"]))<0){
					// 		$input_err = "'Salinity_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Salinity_3"]))){
					// 	$input_err = "Please enter 'Salinity_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Salinity_3"]))<0){
					// 		$input_err = "'Salinity_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_1"]))){
					// 	$input_err = "Please enter 'pH_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_1"]))<0){
					// 		$input_err = "'pH_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_2"]))){
					// 	$input_err = "Please enter 'pH_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_2"]))<0){
					// 		$input_err = "'pH_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["pH_3"]))){
					// 	$input_err = "Please enter 'pH_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["pH_3"]))<0){
					// 		$input_err = "'pH_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_1"]))){
					// 	$input_err = "Please enter 'O2_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_1"]))<0){
					// 		$input_err = "'O2_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_2"]))){
					// 	$input_err = "Please enter 'O2_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_2"]))<0){
					// 		$input_err = "'O2_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["O2_3"]))){
					// 	$input_err = "Please enter 'O2_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["O2_3"]))<0){
					// 		$input_err = "'O2_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_1"]))){
					// 	$input_err = "Please enter 'ORP_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_1"]))<0){
					// 		$input_err = "'ORP_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_2"]))){
					// 	$input_err = "Please enter 'ORP_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_2"]))<0){
					// 		$input_err = "'ORP_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["ORP_3"]))){
					// 	$input_err = "Please enter 'ORP_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["ORP_3"]))<0){
					// 		$input_err = "'ORP_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_1"]))){
					// 	$input_err = "Please enter 'Temp_1'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_1"]))<0){
					// 		$input_err = "'Temp_1' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_2"]))){
					// 	$input_err = "Please enter 'Temp_2'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_2"]))<0){
					// 		$input_err = "'Temp_2' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Temp_3"]))){
					// 	$input_err = "Please enter 'Temp_3'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Temp_3"]))<0){
					// 		$input_err = "'Temp_3' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Alkalinity"]))){
					// 	$input_err = "Please enter 'Alkalinity'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Alkalinity"]))<0){
					// 		$input_err = "'Alkalinity' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["TCBS"]))){
					// 	$input_err = "Please enter 'TCBS'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["TCBS"]))<0){
					// 		$input_err = "'TCBS' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["綠菌"]))){
					// 	$input_err = "Please enter 'TCBS 綠菌'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["綠菌"]))<0){
					// 		$input_err = "'TCBS 綠菌' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["Marine"]))){
					// 	$input_err = "Please enter 'Marine'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["Marine"]))<0){
					// 		$input_err = "'Marine' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["螢光菌TCBS"]))){
					// 	$input_err = "Please enter '螢光菌TCBS'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["螢光菌TCBS"]))<0){
					// 		$input_err = "'螢光菌TCBS' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					// if(!strlen(trim($_POST["螢光菌Marine"]))){
					// 	$input_err = "Please enter '螢光菌Marine'.</br>";
					// 	echo $input_err;
					// }
					// else{
					// 	if(floatval (trim($_POST["螢光菌Marine"]))<0){
					// 		$input_err = "'螢光菌Marine' out of range.</br>";
					// 		echo $input_err;
					// 	}
					// }
					if (!strlen($input_err)) {
						$param1 = trim($_POST["date"]);
						$param2 = trim($_POST["location"]);
						// $param3 = trim($_POST["nh4"]);
						// $param4 = trim($_POST["no2"]);
						// $param5 = trim($_POST["no3"]);
						// $param6 = trim($_POST["Salinity_1"]);
						// $param7 = trim($_POST["Salinity_2"]);
						// $param8 = trim($_POST["Salinity_3"]);
						// $param9 = trim($_POST["pH_1"]);
						// $param10 = trim($_POST["pH_2"]);
						// $param11 = trim($_POST["pH_3"]);
						// $param12 = trim($_POST["O2_1"]);
						// $param13 = trim($_POST["O2_2"]);
						// $param14 = trim($_POST["O2_3"]);
						// $param15 = trim($_POST["ORP_1"]);
						// $param16 = trim($_POST["ORP_2"]);
						// $param17 = trim($_POST["ORP_3"]);
						// $param18 = trim($_POST["Temp_1"]);
						// $param19 = trim($_POST["Temp_2"]);
						// $param20 = trim($_POST["Temp_3"]);
						// $param21 = trim($_POST["Alkalinity"]);
						// $param22 = trim($_POST["TCBS"]);
						// $param23 = trim($_POST["綠菌"]);
						// $param24 = trim($_POST["Marine"]);
						// $param25 = trim($_POST["螢光菌TCBS"]);
						// $param26 = trim($_POST["螢光菌Marine"]);
						// $param27 = trim($_POST["note"]);
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
					<table class="table">
						<!-- <th>TankID</th>
							<td colspan = "9">
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
							</td> -->
						<tr>
							<th>NH<sub>4</sub>-H</th>
							<td>
								<div class="input-group">
									<input id="text2" name="nh4" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_1</th>
							<td>
								<div>
									<input id="text8" name="pH_1" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_1</th>
							<td>
								<div class="input-group">
									<input id="text14" name="ORP_1" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>Alkalinity</th>
							<td>
								<div class="input-group">
									<input id="text20" name="Alkalinity" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(ppm)</div>
									</div>
								</div>
							</td>

							<th>日期</th>
							<td>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fa fa-calendar-o"></i>
										</div>
									</div>
									<input id="text1" name="date" type="date" value="<?php echo date("Y-m-d"); ?>">
								</div>
							</td>
						</tr>
						<tr>
							<th>NO<sub>2</sub></th>
							<td>
								<div class="input-group">
									<input id="text3" name="no2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_2</th>
							<td>
								<div>
									<input id="text9" name="pH_2" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_2</th>
							<td>
								<div class="input-group">
									<input id="text15" name="ORP_2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>TCBS</th>
							<td>
								<div class="input-group">
									<input id="text21" name="TCBS" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>

							<th>上傳紙本圖片</th>
							<td>
								<input accept="image/*" type="file" name="fileField" id="uploadimage">
							</td>
						</tr>
						<tr>
							<th>NO<sub>3</sub></th>
							<td>
								<div class="input-group">
									<input id="text4" name="no3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>pH_3</th>
							<td>
								<div>
									<input id="text10" name="pH_3" type="text" class="form-control">
								</div>
							</td>

							<th>ORP_3</th>
							<td>
								<div class="input-group">
									<input id="text16" name="ORP_3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mV)</div>
									</div>
								</div>
							</td>

							<th>TCBS 綠菌</th>
							<td>
								<div class="input-group">
									<input id="text22" name="綠菌" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>

							<th>圖片預覽</th>
							<td rowspan = "5" colspan = "3">
								<img id="show_image" src="">
							</td>
						</tr>
						<tr>
							<th>Salinity_1</th>
							<td>
								<div>
									<input id="text5" name="Salinity_1" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_1</th>
							<td>
								<div class="input-group">
									<input id="text11" name="O2_1" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_1</th>
							<td>
								<div>
									<input id="text17" name="Temp_1" type="text" class="form-control">
								</div>
							</td>

							<th>Marine</th>
							<td>
								<div class="input-group">
									<input id="text23" name="Marine" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>Salinity_2</th>
							<td>
								<div>
									<input id="text6" name="Salinity_2" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_2</th>
							<td>
								<div class="input-group">
									<input id="text12" name="O2_2" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_2</th>
							<td>
								<div>
									<input id="text18" name="Temp_2" type="text" class="form-control">
								</div>
							</td>

							<th>螢光菌TCBS</th>
							<td>
								<div class="input-group">
									<input id="text24" name="螢光菌TCBS" type="text" class="foNoterm-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>Salinity_3</th>
							<td>
								<div>
									<input id="text7" name="Salinity_3" type="text" class="form-control">
								</div>
							</td>

							<th>O<sub>2</sub>_3</th>
							<td>
								<div class="input-group">
									<input id="text13" name="O2_3" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(mg/l)</div>
									</div>
								</div>
							</td>

							<th>W Temp_3</th>
							<td>
								<div>
									<input id="text19" name="Temp_3" type="text" class="form-control">
								</div>
							</td>

							<th>螢光菌Marine</th>
							<td>
								<div class="input-group">
									<input id="text25" name="螢光菌Marine" type="text" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text">(CFU/ml)</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>備註</th>
							<td colspan = "9">
								<div class="col-6">
									<textarea id="textarea1" name="Note" cols="40" rows="5" class="form-control"></textarea>
								</div>
							</td>
						</tr>
					</table>
				</form>

				 
				<div id="backmsg"></div>
				<br>
			</section>
        </p></div>
    </div>
	<button type="button" class="btn btn-primary" onclick="upload()">上傳</button>

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
        width: 100%;
        background: #fff;
        }
        @media (min-width: 576px) { 
            .table{
                width: 50%;
            }
        }

        @media (min-width: 768px) { 
            .table{
                width: 60%;
            }
        }

        @media (min-width: 992px) {
            .table{
                width: 75%;
            }
        }

        @media (min-width: 1200px) {
            .table{
                width: 90%;
            }
        }

        @media (min-width: 1400px) {
            .table{
                width: 100%;
            }
        }

    
    </style>
    <!-- table style -->

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
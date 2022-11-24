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
	<title>About</title>
	<title>Services</title>
	<!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<section>
		<form>
			<br>
			
			<?php

				echo
					'<div class="form-group row">
						<label for="text1" class="col-6 col-form-label">Index</label>
						<div class="col-6">
							<div class="input-group">
								<input id="text" name="id"  value="'.$_GET['id'].'" class="form-control" readonly>
							</div>
						</div>
					</div>
				<div class="form-group row">
					<label for="text1" class="col-6 col-form-label">日期</label> 
					<div class="col-6">
					<div class="input-group">
						<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fa fa-calendar-o"></i>
						</div>
						</div> 
						<input id="text1" name="date" value="'.$_GET['date'].'" type="text" class="form-control" readonly>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text" class="col-6 col-form-label">位置</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text" name="location" value="'.$_GET['location'].'" type="text" class="form-control" readonly> 
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text2" class="col-6 col-form-label">NH4-H</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text2" name="nh4" value="'.$_GET['nh4'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(mg/l)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text3" class="col-6 col-form-label">NO2</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text3" name="no2" value="'.$_GET['no2'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(mg/l)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text4" class="col-6 col-form-label">NO3</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text4" name="no3"  value="'.$_GET['no3'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(mg/l)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text5" class="col-6 col-form-label">Salinity_1</label> 
					<div class="col-6">
					<input id="text5" name="Salinity_1" value="'.$_GET['Salinity_1'].'" type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="text6" class="col-6 col-form-label">Salinity_2</label> 
					<div class="col-6">
					<input id="text6" name="Salinity_2" value="'.$_GET['Salinity_2'].'" type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="text7" class="col-6 col-form-label">Salinity_3</label> 
					<div class="col-6">
					<input id="text7" name="Salinity_3" value="'.$_GET['Salinity_3'].'" type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="text8" class="col-6 col-form-label">pH_1</label> 
					<div class="col-6">
					<input id="text8" name="pH_1" value="'.$_GET['pH_1'].'" type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="text9" class="col-6 col-form-label">pH_2</label> 
					<div class="col-6">
					<input id="text9" name="pH_2" value="'.$_GET['pH_2'].'" type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="text10" class="col-6 col-form-label">pH_3</label> 
					<div class="col-6">
					<input id="text10" name="pH_3" value="'.$_GET['pH_3'].'" type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="text11" class="col-6 col-form-label">O2_1</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text11" name="O2_1" value="'.$_GET['O2_1'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(mg/l)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text12" class="col-6 col-form-label">O2_2</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text12" name="O2_2" value="'.$_GET['O2_2'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(mg/l)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text13" class="col-6 col-form-label">O2_3</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text13" name="O2_3" value="'.$_GET['O2_3'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(mg/l)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text14" class="col-6 col-form-label">ORP_1</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text14" name="ORP_1" value="'.$_GET['ORP_1'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(mV)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text15" class="col-6 col-form-label">ORP_2</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text15" name="ORP_2" value="'.$_GET['ORP_2'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(mV)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text16" class="col-6 col-form-label">ORP_3</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text16" name="ORP_3" value="'.$_GET['ORP_3'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(mV)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text17" class="col-6 col-form-label">W Temp_1</label> 
					<div class="col-6">
					<input id="text17" name="Temp_1" value="'.$_GET['Temp_1'].'" type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="text18" class="col-6 col-form-label">W Temp_2</label> 
					<div class="col-6">
					<input id="text18" name="Temp_2" value="'.$_GET['Temp_2'].'" type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="text19" class="col-6 col-form-label">W Temp_3</label> 
					<div class="col-6">
					<input id="text19" name="Temp_3" value="'.$_GET['Temp_3'].'" type="text" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="text20" class="col-6 col-form-label">Alkalinity</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text20" name="Alkalinity" value="'.$_GET['Alkalinity'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(ppm)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text21" class="col-6 col-form-label">TCBS</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text21" name="TCBS" value="'.$_GET['TCBS'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(CFU/ml)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text22" class="col-6 col-form-label">TCBS 綠菌</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text22" name="綠菌" value="'.$_GET['綠菌'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(CFU/ml)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text23" class="col-6 col-form-label">Marine</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text23" name="Marine" value="'.$_GET['Marine'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(CFU/ml)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text24" class="col-6 col-form-label">螢光菌TCBS</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text24" name="螢光菌TCBS" value="'.$_GET['螢光菌TCBS'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(CFU/ml)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="text25" class="col-6 col-form-label">螢光菌Marine</label> 
					<div class="col-6">
					<div class="input-group">
						<input id="text25" name="螢光菌Marine" value="'.$_GET['螢光菌Marine'].'" type="text" class="form-control" readonly> 
						<div class="input-group-append">
						<div class="input-group-text">(CFU/ml)</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="textarea1" class="col-6 col-form-label">備註</label> 
					<div class="col-6">
					<textarea id="textarea1" name="Note"  cols="40" rows="5" class="form-control" readonly>'.$_GET['Note'].'</textarea>
					</div>
				</div> ';
			?>
		</form>
	</section>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
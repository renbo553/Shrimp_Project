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
	<title>詳細資料 - 水質</title>
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
					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> Index </div>
						<div style = "width: 17%">
							<input id="id" name="id" class="form-control" readonly>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> TankID </div>
						<div style = "width: 17%">
							<select id="location" name="location" class="custom-select" disabled="disabled">
								<option value=""></option>
								<option value="M1">M1</option>
								<option value="M2">M2</option>
								<option value="M3">M3</option>
								<option value="M4">M4</option>
							</select>
						</div>

						<div style = "width: 2%"> </div>
						<div style = "width: 5%"> 日期 </div>
						<div style = "width: 17%">
							<input id="date" name="date" type="date" disabled="disabled">
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 75px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> NH4-N </div>
						<input id="nh4" name="nh4" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="nh4" style = "width: 5%;">(mg/l)</label>

						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> NO2 </div>
						<input id="no2" name="no2" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="no2" style = "width: 5%;">(mg/l)</label>

						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> NO3 </div>
						<input id="no3" name="no3" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="no3" style = "width: 5%;">(mg/l)</label>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 75px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> O2_1 </div>
						<input id="O2_1" name="O2_1" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="O2_1" style = "width: 5%;">(mg/l)</label>

						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> O2_2 </div>
						<input id="O2_2" name="O2_2" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="O2_2" style = "width: 5%;">(mg/l)</label>

						<div style = "width: 2%"> </div>
						
						<div style = "width: 5%"> O2_3 </div>
						<input id="O2_3" name="O2_3" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="O2_3" style = "width: 5%;">(mg/l)</label>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 75px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> pH_1 </div>
						<input id="pH_1" name="pH_1" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="pH_1" style = "width: 5%;">(pH值)</label>

						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> pH_2 </div>
						<input id="pH_2" name="pH_2" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="pH_2" style = "width: 5%;">(pH值)</label>
						
						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> pH_3 </div>
						<input id="pH_3" name="pH_3" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="pH_3" style = "width: 5%;">(pH值)</label>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 75px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> ORP_1 </div>
						<input id="ORP_1" name="ORP_1" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="ORP_1" style = "width: 5%;">(mV)</label>
						
						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> ORP_2 </div>
						<input id="ORP_2" name="ORP_2" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="ORP_2" style = "width: 5%;">(mV)</label>

						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> ORP_3 </div>
						<input id="ORP_3" name="ORP_3" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="ORP_3" style = "width: 5%;">(mV)</label>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 75px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> 水溫_1 </div>
						<input id="Temp_1" name="Temp_1" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="Temp_1" style = "width: 5%;">(℃)</label>

						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> 水溫_2 </div>
						<input id="Temp_2" name="Temp_2" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="Temp_2" style = "width: 5%;">(℃)</label>

						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> 水溫_3 </div>
						<input id="Temp_3" name="Temp_3" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="Temp_3" style = "width: 5%;">(℃)</label>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 75px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> 鹽度_1 </div>
						<input id="Salinity_1" name="Salinity_1" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="Salinity_1" style = "width: 5%;">(‰)</label>
						
						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> 鹽度_2 </div>
						<input id="Salinity_2" name="Salinity_2" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="Salinity_2" style = "width: 5%;">(‰)</label>

						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> 鹽度_3 </div>
						<input id="Salinity_3" name="Salinity_3" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="Salinity_3" style = "width: 5%;">(‰)</label>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 75px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> 鹼度 </div>
						<input id="Alkalinity" name="Alkalinity" type="text" class="form-control" style = "width: 12%;" disabled="disabled">
						<label class="input-group-text" for="Alkalinity" style = "width: 5%;">(ppm)</label>

						<div style = "width: 2%"> </div>
						
						<div style = "width: 5%"> Marine </div>
						<input id="Marine" name="Marine" type="text" class="form-control" style = "width: 11%;" disabled="disabled">
						<label class="input-group-text" for="Marine" style = "width: 6%;">(CFU/ml)</label>

						<div style = "width: 2%"> </div>
						<div style = "width: 5%"> TCBS </div>
						<input id="TCBS" name="TCBS" type="text" class="form-control" style = "width: 11%;" disabled="disabled">
						<label class="input-group-text" for="TCBS" style = "width: 6%;">(CFU/ml)</label>
					</div>
						
					<div class="form-inline" style = "width: 100% ; height: 75px">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> TCBS綠菌 </div>
						<input id="TCBS綠菌" name="TCBS綠菌" type="text" class="form-control" style = "width: 11%;" disabled="disabled">
						<label class="input-group-text" for="TCBS綠菌" style = "width: 6%;">(CFU/ml)</label>

						<div style = "width: 2%"> </div>
						
						<div style = "width: 5%"> 螢光菌Marine </div>
						<input id="螢光菌Marine" name="螢光菌Marine" type="text" class="form-control" style = "width: 11%;" disabled="disabled">
						<label class="input-group-text" for="螢光菌Marine" style = "width: 6%;">(CFU/ml)</label>

						<div style = "width: 2%"> </div>

						<div style = "width: 5%"> 螢光菌TCBS </div>
						<input id="螢光菌TCBS" name="螢光菌TCBS" type="text" class="form-control" style = "width: 11%;" disabled="disabled">
						<label class="input-group-text" for="螢光菌TCBS" style = "width: 6%;">(CFU/ml)</label>

					</div>

					<div class="form-inline" style = "width: 100%">
						<div style = "width: 1%"> </div>
						<div style = "width: 5%"> 備註 </div>
						<div style = "width: 40%">
							<textarea id="Note" name="Note" cols="40" rows="5" class="form-control" disabled="disabled"></textarea>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 10px">
						<div style = "height: 2%"> </div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 50px">
						<div style = "width: 1%"> </div>
						<button type="button" class="btn btn-primary" onclick="back()">返回查詢</button>
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
						<div style = "width: 40%">
							<input id="id" name="id" class="form-control" readonly>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> TankID </div>
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

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 日期 </div>
						<div style = "width: 40%">
							<div style = "height: 13px ;"> </div>
							<div class="input-group">
								<div style="border-width:1px ; border-right-style:solid" class = "type_name">  </div>
								<input width = "55px" id="date" name="date" type="date" value="<?php echo date("Y-m-d"); ?>" disabled="disabled">
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> NO2 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="no2" name="no2" type="text" class="form-control" disabled="disabled">
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(mg/l)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> NO3 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="no3" name="no3" type="text" class="form-control" disabled="disabled">
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(mg/l)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> pH_1 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="pH_1" name="pH_1" type="text" class="form-control" disabled="disabled">
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(pH值)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> pH_2 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="pH_2" name="pH_2" type="text" class="form-control" disabled="disabled">
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(pH值)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> pH_3 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="pH_3" name="pH_3" type="text" class="form-control" disabled="disabled">
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(pH值)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> O2_1 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="O2_1" name="O2_1" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(mg/l)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> O2_2 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="O2_2" name="O2_2" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(mg/l)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> O2_3 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="O2_3" name="O2_3" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(mg/l)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> NH4-N </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="nh4" name="nh4" type="text" class="form-control" disabled="disabled">
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(mg/l)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> ORP_1 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="ORP_1" name="ORP_1" type="text" class="form-control" disabled="disabled">
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(mV)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> ORP_2 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="ORP_2" name="ORP_2" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(mV)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> ORP_3 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="ORP_3" name="ORP_3" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(mV)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 水溫_1 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="Temp_1" name="Temp_1" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(℃)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 水溫_2 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="Temp_2" name="Temp_2" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(℃)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 水溫_3 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="Temp_3" name="Temp_3" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(℃)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 鹽度_1 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="Salinity_1" name="Salinity_1" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(‰)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 鹽度_2 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="Salinity_2" name="Salinity_2" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(‰)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 鹽度_3 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="Salinity_3" name="Salinity_3" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(‰)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 鹼度 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="Alkalinity" name="Alkalinity" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(ppm)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> TCBS </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="TCBS" name="TCBS" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(CFU/ml)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> Marine </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="Marine" name="Marine" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(CFU/ml)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> TCBS綠菌 </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="TCBS綠菌" name="TCBS綠菌" type="text" class="form-control" disabled="disabled">  
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(CFU/ml)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 螢光菌TCBS </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="螢光菌TCBS" name="螢光菌TCBS" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(CFU/ml)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 55px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 螢光菌Marine </div>
						<div style = "width: 40%">
							<div class="input-group">
								<input id="螢光菌Marine" name="螢光菌Marine" type="text" class="form-control" disabled="disabled"> 
								<div class="input-group-append" style = "width: 20%;">
									<div class="input-group-text">(CFU/ml)</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-inline" style = "width: 100% ; height: 80px">
						<div style = "width: 5%"> </div>
						<div style = "width: 30%"> 備註 </div>
						<div style = "width: 40%">
							<textarea id="Note" name="Note" cols="30" rows="5" class="form-control" disabled="disabled"></textarea>
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

    <script> document.write('<script type="text/javascript" src="water_check.js"></'+'script>'); </script>

	<script>
		window.onload = function() {
			//頁面載入後將資料放到form上面
			var urlParams = new URLSearchParams(window.location.search);
			modify_put_into_form(urlParams , "big_form" , 0);
			modify_put_into_form(urlParams , "small_form" , 0);
        }

        function back() {
            window.location.href='find_水質';
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
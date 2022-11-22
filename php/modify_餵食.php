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
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- // Meta Tags -->
	<!--booststrap-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
	<!--//booststrap end-->
	<!-- font-awesome icons -->
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<!--stylesheets-->
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
	<!--//stylesheets-->
	<link href="http://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
</head>

<body>
	<header>
		<div class="banner1">
			<div class="header-bar">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light">
						<h1><a class="navbar-brand">ICDSA</a></h1>
						&nbsp;&nbsp;&nbsp;
						<div class="hedder-up">
							<img src="./img/EmbeddedImage.png" height="40">
						</div>
					</nav>
				</div>
			</div>
			<!-- //Navigation -->
		</div>
	</header>

	<section>

		<form id="myFile" method="post" enctype="multipart/form-data">
			<br>
			<?php
				echo
				'<table class="table">
				<tr>
				<td>上傳紙本圖片</td>
				<td>
					<input accept="image/*" type="file" name="fileField" id="uploadimage">
				</td>
			</tr>
			<tr>
				<td>
					圖片預覽
				</td>
				<td>
					<img style="width: 600px;"  id="show_image" src="' . $_GET['image'] . '">
				</td>
			</tr>
			<tr>
				<td>
					Index
				</td>
				<td>
					<div class="input-group">
						<input id="text" name="id"  value="' . $_GET['id'] . '" class="form-control" readonly>
					</div>
				</td>
			</tr>
                <tr>
                    <td>
                        日期
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                            </div>
                            <input id="date" name="date" type="date" value="' . $_GET['Date'] . '">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        TankID
                    </td>
                    <td>
                        
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio" id="radio_0" type="radio" class="custom-control-input" value="M1"
								';
								if ($_GET['Tank'] == "M1")
								{
									echo ' checked';
								};
								echo'
								>
                                <label for="radio_0" class="custom-control-label">&emsp;&emsp;M1</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio" id="radio_1" type="radio" class="custom-control-input" value="M2"
								';
								if ($_GET['Tank'] == "M2")
								{
									echo ' checked';
								};
								echo'
								>
                                <label for="radio_1" class="custom-control-label">&emsp;&emsp;M2</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio" id="radio_2" type="radio" class="custom-control-input" value="M3"
								';
								if ($_GET['Tank'] == "M3")
								{
									echo ' checked';
								};
								echo'
								>
                                <label for="radio_2" class="custom-control-label">&emsp;&emsp;M3</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio" id="radio_3" type="radio" class="custom-control-input" value="M4"
								';
								if ($_GET['Tank'] == "M4")
								{
									echo ' checked';
								};
								echo'
								>
                                <label for="radio_3" class="custom-control-label">&emsp;&emsp;M4</label>
                            </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        草蝦
                    </td>
                    <td>
                        
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_0" type="radio" class="custom-control-input" value="公蝦缸"
                                ';
								if ($_GET['shrimp'] == "公蝦缸")
								{
									echo ' checked';
								};
								echo'
								>
                                <label for="radio1_0" class="custom-control-label">&emsp;&emsp;公蝦缸</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_1" type="radio" class="custom-control-input" value="母蝦缸"
								';
								if ($_GET['shrimp'] == "母蝦缸")
								{
									echo ' checked';
								};
								echo'
								>
                                <label for="radio1_1" class="custom-control-label">&emsp;&emsp;母蝦缸</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_2" type="radio" class="custom-control-input"
                                    value="交配缸"
									';
									if ($_GET['shrimp'] == "交配缸")
									{
										echo ' checked';
									};
									echo'	
									>
                                <label for="radio1_2" class="custom-control-label">&emsp;&emsp;交配缸</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_3" type="radio" class="custom-control-input" value="休養缸"
									';
									if ($_GET['shrimp'] == "休養缸")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="radio1_3" class="custom-control-label">&emsp;&emsp;休養缸</label>
                            </div>
							<div class="custom-control custom-radio custom-control-inline">
                                <input name="radio1" id="radio1_4" type="radio" class="custom-control-input"
                                    value="公蝦+母蝦缸"
									';
									if ($_GET['shrimp'] == "公蝦+母蝦缸")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="radio1_4" class="custom-control-label">&emsp;&emsp;公蝦+母蝦缸</label>
                            </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        公蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="male_shrimp" name="male_shrimp" type="text"  value="' . $_GET['No_Shrimp_Male'] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        母蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="female_shrimp" name="female_shrimp" type="text"   value="' . $_GET['No_Shrimp_Female'] . '"  class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        死亡公蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="dead_male_shrimp" name="dead_male_shrimp" type="text"   value="' . $_GET['No_Dead_Male'] . '"  class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        死亡母蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="dead_female_shrimp" name="dead_female_shrimp" type="text" value="' . $_GET['No_Dead_Female'] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        脫皮公蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="peeling_male_shrimp" name="peeling_male_shrimp" type="text"  value="' . $_GET['No_Moults_Male'] . '"  class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        脫皮母蝦
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="peeling_female_shrimp" name="peeling_female_shrimp" type="text"  value="' . $_GET['No_Moults_Female'] . '"  class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">隻</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        公蝦均重
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="avg_male_shrimp" name="avg_male_shrimp" type="text"  value="' . $_GET['Avg_Weight_Male'] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        母蝦均重
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="avg_female_shrimp" name="avg_female_shrimp" type="text"  value="' . $_GET['Avg_Weight_Female'] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        總重
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="total_weight" name="total_weight" type="text"  value="' . $_GET['Total_Weight'] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <li>時間 09:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                        
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_0" type="checkbox"
                                    class="custom-control-input" value="Polychaete"
									';
									if ($_GET['9_species'] == "Polychaete")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_1" type="checkbox"
                                    class="custom-control-input" value="Crab(去殼)"
									';
									if ($_GET['9_species'] == "Crab(去殼)")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_2" type="checkbox"
                                    class="custom-control-input" value="Squid"
									';
									if ($_GET['9_species'] == "Squid")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_2" class="custom-control-label">&emsp;&emsp;Squid</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_3" type="checkbox"
                                    class="custom-control-input" value="Mussel"
									';
									if ($_GET['9_species'] == "Mussel")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_4" type="checkbox"
                                    class="custom-control-input" value="Epsilon"
									';
									if ($_GET['9_species'] == "Epsilon")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_5" type="checkbox"
                                    class="custom-control-input" value="日本飼料"
									';
									if ($_GET['9_species'] == "日本飼料")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_6" type="checkbox"
                                    class="custom-control-input" value="Krill"
									';
									if ($_GET['9_species'] == "Krill")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_6" class="custom-control-label">&emsp;&emsp;Krill</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_7" type="checkbox"
                                    class="custom-control-input" value="Clam(母)"
									';
									if ($_GET['9_species'] == "Clam(母)")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_8" type="checkbox" class="custom-control-input" value="Ezmate(海膽+蟹卵)"
									';
									if ($_GET['9_species'] == "Ezmate(海膽+蟹卵)")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_8"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_9" type="checkbox" class="custom-control-input" value="Ezmate(海膽+蟹白)"
									';
									if ($_GET['9_species'] == "Ezmate(海膽+蟹白)")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_9"
                                    class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_10" type="checkbox" class="custom-control-input" value="Ezmate(海膽+蟹黃)"
									';
									if ($_GET['9_species'] == "Ezmate(海膽+蟹黃)")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_10" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
									
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="food0900" id="checkbox0900_11" type="checkbox" class="custom-control-input" value="Ezmate(海膽)"
									';
									if ($_GET['9_species'] == "Ezmate(海膽)")
									{
										echo ' checked';
									};
									echo'
									>
                                <label for="checkbox0900_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
                            </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="weight0900" name="weight0900" type="text" value="' . $_GET["9_weight"] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="remain0900" name="remain0900" type="text" value="' . $_GET["9_remain"] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="eating0900" name="eating0900" type="text" value="' . $_GET['9_eating'] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <li>時間 1100</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                        
					<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_0" type="checkbox"
						class="custom-control-input" value="Polychaete"
						';
						if ($_GET['11_species'] == "Polychaete")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_1" type="checkbox"
						class="custom-control-input" value="Crab(去殼)"';
						if ($_GET['11_species'] == "Crab(去殼)")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_2" type="checkbox"
						class="custom-control-input" value="Squid"';
						if ($_GET['11_species'] == "Squid")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_2" class="custom-control-label">&emsp;&emsp;Squid</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_3" type="checkbox"
						class="custom-control-input" value="Mussel"';
						if ($_GET['11_species'] == "Mussel")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_4" type="checkbox"
						class="custom-control-input" value="Epsilon"';
						if ($_GET['11_species'] == "Epsilon")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_5" type="checkbox"
						class="custom-control-input" value="日本飼料"';
						if ($_GET['11_species'] == "日本飼料")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_6" type="checkbox"
						class="custom-control-input" value="Krill"';
						if ($_GET['11_species'] == "Krill")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_6" class="custom-control-label">&emsp;&emsp;Krill</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_7" type="checkbox"
						class="custom-control-input" value="Clam(母)"';
						if ($_GET['11_species'] == "Clam(母)")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_8" type="checkbox"
						class="custom-control-input" value="Ezmate(海膽+蟹卵)"';
						if ($_GET['11_species'] == "Ezmate(海膽+蟹卵)")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_8"
						class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_9" type="checkbox"
						class="custom-control-input" value="Ezmate(海膽+蟹白)"';
						if ($_GET['11_species'] == "Ezmate(海膽+蟹白)")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_9"
						class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_10" type="checkbox"
						class="custom-control-input" value="Ezmate(海膽+蟹黃)"';
						if ($_GET['11_species'] == "Ezmate(海膽+蟹黃)")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_10"
						class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input name="food1100" id="checkbox1100_11" type="checkbox"
						class="custom-control-input" value="Ezmate(海膽)"';
						if ($_GET['11_species'] == "Ezmate(海膽)")
						{
							echo ' checked';
						};
						echo'
						>
					<label for="checkbox1100_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
				</div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="weight1100" name="weight1100" type="text"  value="' . $_GET['11_weight'] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="remain1100" name="remain1100" type="text"  value="' . $_GET['11_remain'] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="eating1100" name="eating1100" type="text" value="' . $_GET['11_eating'] . '"  class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <li>時間 14:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                        
							<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_0" type="checkbox"
								class="custom-control-input" value="Polychaete"
								';
								if ($_GET['14_species'] == "Polychaete")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_1" type="checkbox"
								class="custom-control-input" value="Crab(去殼)"';
								if ($_GET['14_species'] == "Crab(去殼)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_2" type="checkbox"
								class="custom-control-input" value="Squid"';
								if ($_GET['14_species'] == "Squid")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_2" class="custom-control-label">&emsp;&emsp;Squid</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_3" type="checkbox"
								class="custom-control-input" value="Mussel"';
								if ($_GET['14_species'] == "Mussel")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_4" type="checkbox"
								class="custom-control-input" value="Epsilon"';
								if ($_GET['14_species'] == "Epsilon")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_5" type="checkbox"
								class="custom-control-input" value="日本飼料"';
								if ($_GET['14_species'] == "日本飼料")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_6" type="checkbox"
								class="custom-control-input" value="Krill"';
								if ($_GET['14_species'] == "Krill")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_6" class="custom-control-label">&emsp;&emsp;Krill</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_7" type="checkbox"
								class="custom-control-input" value="Clam(母)"';
								if ($_GET['14_species'] == "Clam(母)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_8" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹卵)"';
								if ($_GET['14_species'] == "Ezmate(海膽+蟹卵)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_8"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_9" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹白)"';
								if ($_GET['14_species'] == "Ezmate(海膽+蟹白)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_9"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_10" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹黃)"';
								if ($_GET['14_species'] == "Ezmate(海膽+蟹黃)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_10"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1400" id="checkbox1400_11" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽)"';
								if ($_GET['14_species'] == "Ezmate(海膽)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1400_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
						</div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="weight1400" name="weight1400" type="text"  value="' . $_GET['14_weight'] . '"  class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="remain1400" name="remain1400" type="text"  value="' . $_GET['14_remain'] . '"  class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="eating1400" name="eating1400" type="text"  value="' . $_GET['14_eating'] . '"  class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">(g)</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <li>時間 16:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                        
							<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_0" type="checkbox"
								class="custom-control-input" value="Polychaete"
								';
								if ($_GET['16_species'] == "Polychaete")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_1" type="checkbox"
								class="custom-control-input" value="Crab(去殼)"';
								if ($_GET['16_species'] == "Crab(去殼)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_2" type="checkbox"
								class="custom-control-input" value="Squid"';
								if ($_GET['16_species'] == "Squid")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_2" class="custom-control-label">&emsp;&emsp;Squid</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_3" type="checkbox"
								class="custom-control-input" value="Mussel"';
								if ($_GET['16_species'] == "Mussel")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_4" type="checkbox"
								class="custom-control-input" value="Epsilon"';
								if ($_GET['16_species'] == "Epsilon")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_5" type="checkbox"
								class="custom-control-input" value="日本飼料"';
								if ($_GET['16_species'] == "日本飼料")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_6" type="checkbox"
								class="custom-control-input" value="Krill"';
								if ($_GET['16_species'] == "Krill")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_6" class="custom-control-label">&emsp;&emsp;Krill</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_7" type="checkbox"
								class="custom-control-input" value="Clam(母)"';
								if ($_GET['16_species'] == "Clam(母)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_8" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹卵)"';
								if ($_GET['16_species'] == "Ezmate(海膽+蟹卵)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_8"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_9" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹白)"';
								if ($_GET['16_species'] == "Ezmate(海膽+蟹白)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_9"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_10" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹黃)"';
								if ($_GET['16_species'] == "Ezmate(海膽+蟹黃)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_10"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1600" id="checkbox1600_11" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽)"';
								if ($_GET['16_species'] == "Ezmate(海膽)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1600_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
						</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="weight1600" name="weight1600" type="text"  value="' . $_GET['16_weight'] . '" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="remain1600" name="remain1600" type="text"  value="' . $_GET['16_remain'] . '" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="eating1600" name="eating1600" type="text" value="' . $_GET['16_eating'] . '"  class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <li>時間 19:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                    
                    <div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_0" type="checkbox"
								class="custom-control-input" value="Polychaete"
								';
								if ($_GET['19_species'] == "Polychaete")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_1" type="checkbox"
								class="custom-control-input" value="Crab(去殼)"';
								if ($_GET['19_species'] == "Crab(去殼)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_2" type="checkbox"
								class="custom-control-input" value="Squid"';
								if ($_GET['19_species'] == "Squid")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_2" class="custom-control-label">&emsp;&emsp;Squid</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_3" type="checkbox"
								class="custom-control-input" value="Mussel"';
								if ($_GET['19_species'] == "Mussel")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_4" type="checkbox"
								class="custom-control-input" value="Epsilon"';
								if ($_GET['19_species'] == "Epsilon")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_5" type="checkbox"
								class="custom-control-input" value="日本飼料"';
								if ($_GET['19_species'] == "日本飼料")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_6" type="checkbox"
								class="custom-control-input" value="Krill"';
								if ($_GET['19_species'] == "Krill")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_6" class="custom-control-label">&emsp;&emsp;Krill</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_7" type="checkbox"
								class="custom-control-input" value="Clam(母)"';
								if ($_GET['19_species'] == "Clam(母)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_8" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹卵)"';
								if ($_GET['19_species'] == "Ezmate(海膽+蟹卵)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_8"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_9" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹白)"';
								if ($_GET['19_species'] == "Ezmate(海膽+蟹白)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_9"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_10" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹黃)"';
								if ($_GET['19_species'] == "Ezmate(海膽+蟹黃)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_10"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food1900" id="checkbox1900_11" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽)"';
								if ($_GET['19_species'] == "Ezmate(海膽)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox1900_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
						</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="weight1900" name="weight1900" type="text" value="' . $_GET['19_weight'] . '"  class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="remain1900" name="remain1900" type="text"  value="' . $_GET['19_remain'] . '"class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td
                        食用量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="eating1900" name="eating1900" type="text"  value="' . $_GET['19_eating'] . '" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <li>時間 23:00</li>
                    </td>
                    <td>

                    </td>
                </tr>
                
                <tr>
                    <td>
                    工作/餵食項目
                    </td>
                    <td>
					<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_0" type="checkbox"
								class="custom-control-input" value="Polychaete"
								';
								if ($_GET['23_species'] == "Polychaete")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_1" type="checkbox"
								class="custom-control-input" value="Crab(去殼)"';
								if ($_GET['23_species'] == "Crab(去殼)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_2" type="checkbox"
								class="custom-control-input" value="Squid"';
								if ($_GET['23_species'] == "Squid")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_2" class="custom-control-label">&emsp;&emsp;Squid</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_3" type="checkbox"
								class="custom-control-input" value="Mussel"';
								if ($_GET['23_species'] == "Mussel")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_4" type="checkbox"
								class="custom-control-input" value="Epsilon"';
								if ($_GET['23_species'] == "Epsilon")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_5" type="checkbox"
								class="custom-control-input" value="日本飼料"';
								if ($_GET['23_species'] == "日本飼料")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_6" type="checkbox"
								class="custom-control-input" value="Krill"';
								if ($_GET['23_species'] == "Krill")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_6" class="custom-control-label">&emsp;&emsp;Krill</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_7" type="checkbox"
								class="custom-control-input" value="Clam(母)"';
								if ($_GET['23_species'] == "Clam(母)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_8" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹卵)"';
								if ($_GET['23_species'] == "Ezmate(海膽+蟹卵)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_8"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_9" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹白)"';
								if ($_GET['23_species'] == "Ezmate(海膽+蟹白)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_9"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_10" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹黃)"';
								if ($_GET['23_species'] == "Ezmate(海膽+蟹黃)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_10"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food2300" id="checkbox2300_11" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽)"';
								if ($_GET['23_species'] == "Ezmate(海膽)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox2300_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
						</div>
                    </td>
                </tr>
                <tr>
                    <td>
                    餵食量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="weight2300" name="weight2300" type="text" value="' . $_GET['23_weight'] . '" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    殘餌量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="remain2300" name="remain2300" type="text"value="' . $_GET['23_remain'] . '"  class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="eating2300" name="eating2300" type="text"value="' . $_GET['23_eating'] . '"  class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        時間 03:00
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        工作/餵食項目
                    </td>
                    <td>
                    
                    <div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_0" type="checkbox"
								class="custom-control-input" value="Polychaete"
								';
								if ($_GET['3_species'] == "Polychaete")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_0" class="custom-control-label">&emsp;&emsp;Polychaete</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_1" type="checkbox"
								class="custom-control-input" value="Crab(去殼)"';
								if ($_GET['3_species'] == "Crab(去殼)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_1" class="custom-control-label">&emsp;&emsp;Crab(去殼)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_2" type="checkbox"
								class="custom-control-input" value="Squid"';
								if ($_GET['3_species'] == "Squid")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_2" class="custom-control-label">&emsp;&emsp;Squid</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_3" type="checkbox"
								class="custom-control-input" value="Mussel"';
								if ($_GET['3_species'] == "Mussel")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_3" class="custom-control-label">&emsp;&emsp;Mussel</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_4" type="checkbox"
								class="custom-control-input" value="Epsilon"';
								if ($_GET['3_species'] == "Epsilon")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_4" class="custom-control-label">&emsp;&emsp;Epsilon</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_5" type="checkbox"
								class="custom-control-input" value="日本飼料"';
								if ($_GET['3_species'] == "日本飼料")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_5" class="custom-control-label">&emsp;&emsp;日本飼料</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_6" type="checkbox"
								class="custom-control-input" value="Krill"';
								if ($_GET['3_species'] == "Krill")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_6" class="custom-control-label">&emsp;&emsp;Krill</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_7" type="checkbox"
								class="custom-control-input" value="Clam(母)"';
								if ($_GET['3_species'] == "Clam(母)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_7" class="custom-control-label">&emsp;&emsp;Clam(母)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_8" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹卵)"';
								if ($_GET['3_species'] == "Ezmate(海膽+蟹卵)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_8"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹卵)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_9" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹白)"';
								if ($_GET['3_species'] == "Ezmate(海膽+蟹白)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_9" class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹白)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_10" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽+蟹黃)"';
								if ($_GET['3_species'] == "Ezmate(海膽+蟹黃)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_10"
								class="custom-control-label">&emsp;&emsp;Ezmate(海膽+蟹黃)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline">
							<input name="food0300" id="checkbox0300_11" type="checkbox"
								class="custom-control-input" value="Ezmate(海膽)"';
								if ($_GET['3_species'] == "Ezmate(海膽)")
								{
									echo ' checked';
								};
								echo'
								>
							<label for="checkbox0300_11" class="custom-control-label">&emsp;&emsp;Ezmate(海膽)</label>
						</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        餵食量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="weight0300" name="weight0300" type="text" value="' . $_GET['3_weight'] . '"  class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        殘餌量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="remain0300" name="remain0300" type="text"  value="' . $_GET['3_remain'] . '" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        食用量
                    </td>
                    <td>
                    <div class="input-group">
                        <input id="eating0300" name="eating0300" type="text"  value="' . $_GET['3_eating'] . '" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">(g)</div>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Feeding Ratio
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="FeedingRatio" name="FeedingRatio" type="text"  value="' . $_GET['Feeding_Ratio'] . '" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">%</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
						Observation
                    </td>
                    <td>
                        
                            <textarea id="Observation" name="Observation" cols="40" rows="5"class="form-control">' . $_GET["Observation"] .'</textarea>
                        
                    </td>
                </tr>

            </table>
				'
			?>
		</form>

		<button type="button" class="btn btn-primary" onclick="upload()">修改</button>
		<div id="backmsg"></div>
		<br>
	</section>

	<!-- Footer -->
	<footer>
		<footer>
			<section class="w3ls_address_mail_footer_grids">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 w3ls_footer_grid_left">
							<h5 class="sub-head">Address</h5>
							<p>臺南市安南區媽祖宮里
								<span>安明路３段５００號</span>
							</p>
						</div>
						<div class="col-sm-6 w3ls_footer_grid_left">
							<h5 class="sub-head">Contact Us</h5>
							<p>電話 ： +886-6-2757575#58209
								<span>傳真 ： +886-6-2766490</span>
							</p>
						</div>
					</div>

				</div>
			</section>
		</footer>
		<section class="copyright-wthree">
			<div class="container">
				<p>Copyright &copy;
					<script>
						document.write(new Date().getFullYear())
					</script>
					國立成功大學前瞻蝦類養殖國際研發中心.
				</p>
				<div class="w3l-social">
					<ul>
						<li>
							<a href="#" class="fab fa-facebook-f"></a>
						</li>
						<li>
							<a href="#" class="fab fa-twitter"></a>
						</li>
						<li>
							<a href="#" class="fab fa-google-plus-g"></a>
						</li>
						<li>
							<a href="#" class="fab fa-instagram"></a>
						<li>
						<li>
							<a href="#" class="fab fa-linkedin-in"></a>
						<li>
					</ul>
				</div>
			</div>
		</section>
		<!-- //Footer -->


		<!--js working-->
		<script src="js/jquery.min.js"></script>
		<!--//js working-->
		<!-- requried-jsfiles-for owl -->
		<!-- smooth scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<!-- here stars scrolling icon -->
		<script type="text/javascript">
			$(document).ready(function() {

				$().UItoTop({
					easingType: 'easeOutQuart'
				});

			});
		</script>
		<!-- //here ends scrolling icon -->
		<!-- //smooth scrolling -->
		<!-- scrolling script -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event) {
					event.preventDefault();
					$('html,body').animate({
						scrollTop: $(this.hash).offset().top
					}, 1000);
				});
			});
		</script>
		<!-- //scrolling script -->

		<!--bootstrap working-->
		<script src="js/bootstrap.min.js"></script>
		<!-- //bootstrap working-->
		<script>
			function upload() {
				// 此處是 javascript 寫法
				// var myForm = document.getElementById('myFile');
				// 底下是 jQuery 的寫法
				var myForm = $("#myFile")[0];
				var formData = new FormData(myForm);

				$.ajax({
					url: 'Update_餵食.php',
					type: 'POST',
					data: formData,
					cache: false,
					//下面兩者一定要false
					processData: false,
					contentType: false,

					success: function(backData) {
						window.alert(backData);
						if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
							window.location.href = 'find_餵食';
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
		</script>
</body>

</html>
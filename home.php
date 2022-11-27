<?php
/* home.php
 *      home page of this website
 */

if(!isset($_SESSION)) {
	// session hasn't been created
	session_start();
	if(isset($_SESSION["userid"])) {
		// visit with an existing account
		echo "Welcome {$_SESSION['username']} Authority {$_SESSION['authority']}";
	}
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Services</title>
    <!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
	<!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

	<section class="map-w3ls">
		<div style="text-align:center;">
			<font size="8">Version 2</font>
		</div>
		<div style="text-align:center;">
			<font size="5">更新記錄</font>
		</div>
		<div style="text-align:center;">
			<p>餵食資料表：草蝦缸新增 公蝦+母蝦缸</p><p>餵食資料表：草蝦缸新增 公蝦+母蝦缸</p>
			<p>位置資料表修正完畢</p>
			<p>餵食資料表新增：食用量已去除</p>
			<p>餵食資料表：餵食種類已新增“其他”（功能尚未寫好，僅有畫面可點擊）</p>
		</div>
		<br>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.2620469334875!2d120.14471695051822!3d23.05085258486487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346dd871e2ae1e1d%3A0xb3e2b838e755007a!2z5ZyL56uL5oiQ5Yqf5aSn5a245a6J5Y2X5qCh5Y2A!5e0!3m2!1szh-TW!2stw!4v1645479246668!5m2!1szh-TW!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	
			
	</section>

	<!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>
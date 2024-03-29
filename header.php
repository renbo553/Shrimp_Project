<header>
	<div class="banner1">
		<div class="header-bar">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
					<h1><a class="navbar-brand" href="home">ICDSA</a></h1>
					
					<div class="hedder-up">
						<img src="./img/EmbeddedImage.png" height="40">
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
						<ul class="navbar-nav">
							<a href="home" class="nav-item nav-link active">首頁</a>
							<?php
								if(isset($_SESSION["userid"]))
								{
									if($_SESSION["authority"]!=10)
									{
										echo
											"<li class=\"nav-item\">
												<a href=\"realtime\" class=\"nav-link\">實時監測</a>
											</li>
											<li class=\"nav-item\">
												<a href=\"predict\" class=\"nav-link\">資料預測</a>
											</li>";
										echo
											"<li class=\"nav-item dropdown\">
												<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
													data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
													資料新增
												</a>
												<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
													<a class=\"dropdown-item\" href=\"add_卵巢\">卵巢成熟</a>
													<div class=\"dropdown-divider\"></div>
													<a class=\"dropdown-item\" href=\"add_生產\">生產</a>
													<div class=\"dropdown-divider\"></div>
													<a class=\"dropdown-item\" href=\"add_餵食\">餵食</a>
													<div class=\"dropdown-divider\"></div>
													<a class=\"dropdown-item\" href=\"add_水質\">水質</a>
													<div class=\"dropdown-divider\"></div>
													<a class=\"dropdown-item\" href=\"add_母種蝦資料\">母種蝦資料</a>
												</div>	
											</li>";
										if($_SESSION["authority"] <= 1)
										{
											echo
												"<li class=\"nav-item dropdown\">
													<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\"
														data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
														資料查詢
													</a>
													<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
														<a class=\"dropdown-item\" href=\"find_卵巢\">卵巢成熟</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_生產\">生產</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_餵食\">餵食</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_水質\">水質</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"draw_water\">水質分析</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"draw_feed\">餵食分析</a>
														<div class=\"dropdown-divider\"></div>
														<a class=\"dropdown-item\" href=\"find_母種蝦資料\">母種蝦資料</a>
													</div>	
												</li>";
										}
										if($_SESSION["authority"] == 0)
											echo
												"<li class=\"nav-item\">
													<a href=\"verify\" class=\"nav-link\">驗證</a>
												</li>";
									}
									echo
										"<li class=\"nav-item\">
											<a href=\"logout\" class=\"nav-link\">登出</a>
										</li>";
											
								}
								else
								{
									echo
										"<li class=\"nav-item\">
											<a href=\"login\" class=\"nav-link\">登入/註冊</a>
										</li>";
								}
							?>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>

	<!-- <select id="language-selector">
		<option value="zh-TW">中文（繁體）</option>
		<option value="en">English</option>
		<option value="ja">日本語</option>
		<option value="fr">Français</option>
		<option value="th">ไทย</option>
		<option value="ko">한국어</option>
		<option value="de">Deutsch</option>
		<option value="vi">Tiếng Việt</option>
		<option value="all">其他</option>
	</select> -->
	<!-- <div class="form-inline" style = "width: 100% ; height: 30px"> 選擇語言 </div> -->
	<div class="form-inline" style = "width: 100% ; height: 40px" id = "google_translate_element"></div>
</header>
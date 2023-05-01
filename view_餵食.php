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
	<title>詳細資料 - 餵食</title>
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
			<?php require_once "big_view_feed.html" ?>
        </section>
        </div>

        <div class="small_form">
            <section>
				<?php require_once "small_view_feed.html" ?>
            </section>
        </div>
    </div>

	<script>
		document.write('<script type="text/javascript" src="feed_check.js"></'+'script>');

		window.onload = function() {
			//頁面載入後將資料放到form上面
			var urlParams = new URLSearchParams(window.location.search);
			modify_put_into_form(urlParams , "big_form" , 0);
			modify_put_into_form(urlParams , "small_form" , 0);
        }

        function back() {
            window.location.href='find_餵食';
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
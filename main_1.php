<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script src="js/AD.js"></script>
	<style>
		.logo {
            margin-right: auto;
            margin-left: auto;
            margin-top: 0;
            margin-bottom: 0;
            border: 2px solid #0080ff;
            border-radius: 10px;
            text-align: center;
            max-width: 50%;
            display: block;
            position: relative;
        }

		#text {
			font-size: 24px;
			font-style: normal;
			color: 2784d8;
			text-align: center;
		}

		.led-silver {
			background-color: #C7C7C7;
		}

		.led-black {
			background-color: black;
		}

		/*@media screen and (max-width: 576px;){
			.logo {
				width: 100%;
				height: auto;*/
				/*height: 250px;*/
				/*margin-top: 0;
				margin-bottom: 0;
				margin-left: auto;
				margin-right: auto;
				border: 2px solid #ccc;
				text-align: center;
				background-image: url(food/f8.jpg);
				background-position: center center;
				-webkit-background-size: cover;
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;

			}
		}*/
	</style>
	<script>
		$(function() {
			//登入監聽
			$("#login_ok_btn").bind("click", function() {
				// $.ajax({
				// 	type: "POST",
				// 	url: "api/mem_login_api.php",
				// 	data:{account:$("#account").val(),password:$("#password").val()},
				// 	dataType: "json",
				// 	success: showlogin,
				// 	error: function(){
				// 		alert("api/mem_login_api.php 接收錯誤!");
				// 	}
				// 	});
				location.href = "mem_login.php";
			});
			//註冊監聽
			$("#reg_ok_btn").bind("click", function() {

				location.href = "mem_reg.php";
			});
		}); // end $(function()


		function showlogin(data) {
			if (data) {
				alert("登入成功");
				location.href = "main_2.php";
			} else {
				alert("登入失敗");
			}
		}
	</script>
</head>

<body>
	<div data-role="page" id="home">
		<div data-role="header" data-theme="b" data-position="fixed">
			<h1>註冊或登入會員</h1>
		</div>
		<div role="main" class="ui-content">
			<div class="logo">
				<img src="food/f8.jpg" width="100%" id="pimg" alt="">
			</div>
			<div class="led-silver logo">
				<p id="text">GoodToEat</p>
			</div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="b" data-icon="delete" id="reg_ok_btn">註冊</a>
				</div>
				<div class="ui-block-b">
					<a href="" data-role="button" data-theme="b" data-icon="check" id="login_ok_btn" data-uid="999">登入</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
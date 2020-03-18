<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<title>Document</title>
	<style>
		.logo {
			width: 450px;
			/*height: 250px;*/
			margin-top: 0;
			margin-bottom: 0;
			margin-left: auto;
			margin-right: auto;
			border: 2px solid #ccc;
		}

		#text {
			font-size: 24px;
			font-style: normal;
			color: #2784d8;
			text-align: center;
		}

		.led-silver {
			background-color: #C7C7C7;
		}

		.led-black {
			background-color: black;
		}
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
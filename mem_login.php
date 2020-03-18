<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
		$(function() {
			$("#login_ok_btn").bind("click", function() {
				//即時監聽
				$.ajax({
					type: "POST",
					url: "api/mem_login_api.php",
					data: {
						account: $("#account").val(),
						password: $("#password").val()
					},
					// dataType: "json",
					success: showlogin,
					error: function() {
						alert("api/mem_login_api.php 接收錯誤!");
					}
				});
			});

			//取消回到main_1.php
			$("#cancel").bind("click", function() {
				window.location.assign("main_1.php");
			});
		}); // end $(function()

		function showlogin(data) {
			if (data) {

				// <?php
				// session_start();
				// if ($_SESSION["active"] == 0 || $_SESSION["control"] == 0) {
				// 	echo
				// 		'var active_flag = false;';
				// } else {
				// 	echo
				// 		'var active_flag = true;';
				// }
				// ?>
				// alert("登入成功");

				location.href = "main_2.php";
			} else {
				alert("登入失敗");
			}
		}
	</script>
</head>

<body>
	<div data-role="page" id="home">
		<div data-role="header" data-theme="b">
			<h1>會員登入</h1>
		</div>
		<!-- 登入會員 -->
		<div role="main" class="ui-content">
			<div data-role="fieldcontain">
				<label for="account">帳號</label>
				<input type="text" name="account" id="account">
			</div>
			<div id="err_username"></div>

			<div data-role="fieldcontain">
				<label for="password">密碼</label>
				<input type="password" name="password" id="password">
			</div>

			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="" data-role="button" data-theme="b" data-icon="delete" id="cancel">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" data-icon="check" id="login_ok_btn" data-uid="999">登入</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
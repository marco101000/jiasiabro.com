<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width ,initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
		var flag_account = true;
		var flag_password = true;
		var flag_re_password = false;
		$(function() {
			$.ajax({
				type: "POST",
				url: "api/mem_update_one_api.php",
				dataType: "json",
				data: {
					id: <?php echo $_SESSION["id"]; ?>
				},
				success: mem_update_one_api_success,
				error: function() {
					alert("main2tomem_update error");
				}
			});

			if(!flag_re_password){
				re_password_error();
			}

			$("#account").bind("input propertychange", function() {
				if ($(this).val().length > 4) {
					$("#err_account").html("");
					flag_account = true;
				} else {
					$("#err_account").html("帳號少於五個字");
					$("#err_account").css("background-color", "red");
					$("#err_account").css("color", "white");
					flag_account = false;
				}
			});
			$("#password").bind("input propertychange", function() {
				re_password_error();
				if ($(this).val().length > 7) {
					$("#err_password").html("");
					flag_password = true;
				} else {
					$("#err_password").html("密碼少於八個字");
					$("#err_password").css("background-color", "red");
					$("#err_password").css("color", "white");
					flag_password = false;
				}
			});
			$("#re_password").bind("input propertychange", re_password_error);

			$("#update_ok_btn").bind("click", function() {
				if (flag_account && flag_password && flag_re_password) {
					$.ajax({
						type: "POST",
						url: "api/mem_update_api.php",
						data: {
							id: <?php echo $_SESSION["id"]; ?>,
							password: $("#password").val(),
							tel: $("#tel").val(),
							email: $("#email").val(),
							region: $("#region").val(),
							work: $("#work").val(),
							intro: $("#intro").val()
						},
						success: show,
						error: function() {
							alert("api/mem_update_api.php接收錯誤");
						}
					});
				} else {
					alert("欄位有誤請修正");
				}
			});

		});

		function mem_update_one_api_success(data) {
			$("#account").val(data.Account);
			$("#password").val(data.Password);
			$("#tel").val(data.Tel);
			$("#email").val(data.Email);
			$("#region").val(data.Region);
			$("#gender").val(data.Gender);
			$("#birth").val(data.Birth);
			$("#work").val(data.Work);
			$("#intro").val(data.Intro);
			$("#region").selectmenu('refresh', true); //清空select的語法
			$("#work").selectmenu('refresh', true); //清空select的語法
			$("#gender").selectmenu('refresh', true); //清空select的語法


		}

		function re_password_error() {
			if ($("#re_password").val() == $("#password").val()) {
				$("#err_re_password").html("");
				flag_re_password = true;
			} else {
				$("#err_re_password").html("確認密碼不符合");
				$("#err_re_password").css("background-color", "red");
				$("#err_re_password").css("color", "white");
				flag_re_password = false;
			}
		}

		function show(data) {
			location.href = "main_2.php";
		}
	</script>
</head>

<body>
	<div data-role="page" id="home">
		<div data-role="header" data-theme="b">
			<h1>會員資料修改</h1>
		</div>
		<div role="main" class="ui-content">

			<!-- Account -->

			<div data-role="fieldcontain">
				<label for="account">帳號:</label>
				<input type="text" name="account" id="account" disabled="disabled">
			</div>
			<div id="err_account"></div>

			<!-- password -->

			<div data-role="fieldcontain">
				<label for="password">密碼:</label>
				<input type="password" name="password" id="password">
			</div>
			<div id="err_password"></div>

			<!-- re_password -->

			<div data-role="fieldcontain">
				<label for="re_password">確認密碼:</label>
				<input type="password" name="re_password" id="re_password">
			</div>
			<div id="err_re_password"></div>

			<!-- Tel -->

			<div data-role="fieldcontain">
				<label for="tel">電話號碼:</label>
				<input type="Tel" name="tel" id="tel">
			</div>

			<!-- Email -->

			<div data-role="fieldcontain">
				<label for="email">電子信箱:</label>
				<input type="Email" name="email" id="email">
			</div>

			<!-- region -->

			<div data-role="fieldcontain">
				<label for="selectmenu" class="select">地區:</label>
				<select name="region" id="region">
					<option value="基隆市">基隆市</option>
					<option value="台北市">台北市</option>
					<option value="新北市">新北市</option>
					<option value="桃園縣">桃園縣</option>
					<option value="新竹市">新竹市</option>
					<option value="新竹縣">新竹縣</option>
					<option value="苗栗縣">苗栗縣</option>
					<option value="台中市">台中市</option>
					<option value="彰化縣">彰化縣</option>
					<option value="南投縣">南投縣</option>
					<option value="南投縣">南投縣</option>
					<option value="嘉義市">嘉義市</option>
					<option value="嘉義縣">嘉義縣</option>
					<option value="台南市">台南市</option>
					<option value="高雄市">高雄市</option>
					<option value="屏東縣">屏東縣</option>
					<option value="台東縣">台東縣</option>
					<option value="花蓮縣">花蓮縣</option>
					<option value="宜蘭縣">宜蘭縣</option>
					<option value="澎湖縣">澎湖縣</option>
					<option value="金門縣">金門縣</option>
					<option value="連江縣">連江縣</option>

				</select>
			</div>



			<!-- gender -->

			<div data-role="fieldcontain">
				<label for="gender" >性別:</label>
				<input type="text" name="gender" id="gender" disabled="disabled">
			</div>


			<!-- Birth -->

			<div data-role="fieldcontain">
				<label for="birth">出生日期:</label>
				<input type="Date" name="birth" id="birth" disabled="disabled">
			</div>


			<!-- Work -->

			<div data-role="fieldcontain">
				<label for="workmenu" class="select">職業:</label>
				<select name="work" id="work">
					<option value="一般職業">一般職業</option>
					<option value="農牧業">農牧業</option>
					<option value="漁業">漁業</option>
					<option value="農牧業木材">農牧業木材</option>
					<option value="礦業">礦業</option>
					<option value="交通運輸業">交通運輸業</option>
					<option value="餐旅業">餐旅業</option>
					<option value="建築工程業">建築工程業</option>
					<option value="製造業">製造業</option>
					<option value="新聞、廣告業">新聞、廣告業</option>
					<option value="衛生保健業">衛生保健業</option>
					<option value="娛樂業">娛樂業</option>
					<option value="文教機關">文教機關</option>
					<option value="宗教團體">宗教團體</option>
					<option value="公共事業">公共事業</option>
					<option value="一般商業">一般商業</option>
					<option value="服務業">服務業</option>
					<option value="治安人員">治安人員</option>
					<option value="軍人">軍人</option>
					<option value="職業運動人員">職業運動人員</option>
					<option value="學生">學生</option>

				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="intro">自我介紹</label>
				<textarea rows="4" cols="25" name="intro" id="intro" placeholder="簡單描述自我" maxlength="100"></textarea>
			</div>






			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="b" data-icon="delete" id="update_cancle_btn" data-rel="back">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" data-icon="check" id="update_ok_btn">確認修改</a>
				</div>
			</div>

		</div>
		<div data-role="footer" data-theme="b" data-position="fixed">
			<h1>Restaurant</h1>
		</div>
	</div>
</body>

</html>
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
		var flag_username = false;
		var flag_password = false;
		var flag_re_password = false;
		var flag_check = false;
		var flag_regexp = false;
		$(function() {
			//驗證帳號
			$("#account").bind("input propertychange", function() {
				flag_regexp=false;
				var cantstr=['"', '$', '^', '(', ')', '=', '{', '}', ':', ';', ',', '[', ']', '.', '<', '>', '/', '?', '~', '！', '@', '#', '￥', '…', '&', '*', '（', '）', '—', '—', '|', '{', '}', '【', '】', '‘', '；', '：', '”', '“', '\'', '。', '，', '、', '？', '\\', ' '];
				var str=$(this).val();
				var ary=new Array();
				ary=str.split("");//切割字串 加入陣列

				for(i=0; i<ary.length; i++){
					for(j=0; j<cantstr.length; j++){
						while(ary.indexOf(cantstr[j])>-1){
							flag_regexp=true;
							break;
						}
					}
				}

				if(flag_regexp && $(this).val().length < 5){
					$("#err_username").html("帳號不得少於5個字數!!");
					$("#err_username").css("color", "red");
					flag_username = false;

					$("#err_regexp").html("不能有特殊字元");
					$("#err_regexp").css("color", "red");

				}else if(flag_regexp && $(this).val().length > 4){
					$("#err_username").html("");
					flag_username = true;

					$("#err_regexp").html("不能有特殊字元");
					$("#err_regexp").css("color", "red");

				}else if(!flag_regexp && $(this).val().length < 5){
					$("#err_username").html("帳號不得少於5個字數!!");
					$("#err_username").css("color", "red");
					flag_username = false;

					$("#err_regexp").html("");

				}else{
					$("#err_username").html("");
					flag_username = true;

					$("#err_regexp").html("");

				}

			});

			//驗證密碼
			$("#password").bind("input propertychange", function() {
				if ($(this).val().length > 7) {
					//驗證正確
					$("#err_password").html("");
					flag_password = true;
				} else {
					//驗證失敗
					$("#err_password").html("密碼不得少於8個字數!!");
					$("#err_password").css("color", "red");
					flag_password = false;
				}
			});

			//驗證 確認密碼
			$("#re_password").bind("input propertychange", function() {
				if ($(this).val() == $("#password").val()) {
					//驗證正確
					$("#err_re_password").html("密碼一置!!");
					$("#err_re_password").css("color", "green");
					flag_re_password = true;
				} else {
					//驗證失敗
					$("#err_re_password").html("密碼不一置!!");
					$("#err_re_password").css("color", "red");
					flag_re_password = false;
				}
			});

			//監聽reg按鈕
			$("#btn_reg").bind("click", reg);
			$("#check_btn").bind("click", check);
			$("#btn_cancel").bind("click", function() {
				window.location.assign("main_1.php");
			});

		});

		function reg() {
			if (flag_password && flag_username && flag_re_password && flag_check && !flag_regexp) {
				//欄位驗證成功
				$.ajax({
					type: "POST",
					url: "api/mem_reg_api.php",
					data: {
						account: $("#account").val(),
						password: $("#password").val(),
						tel: $("#tel").val(),
						email: $("#email").val(),
						birth: $("#birth").val(),
						gender: $("#gender").val(),
						work: $("#work").val(),
						region: $("#region").val(),
						intro: $("#intro").val()
					},
					success: show,
					error: function() {
						alert("reg_api error");
					}
				});
			} else if(!flag_check) {
				alert("請檢查帳號");
			} else {
				//欄位驗證失敗
				alert("尚有欄位錯誤請修正!!");
			}

		}

		function show(data) {
			if (data) {
				alert("註冊成功");
				location.href = "main_1.php";
			} else {
				alert("註冊失敗");
				$("#account").val("");
				$("#password").val("");
				$("#tel").val("");
				$("#email").val("");
				$("#birth").val("");
				$("#gender").val("");
				$("#work").val("");
				$("#region").val("");
				$("#intro").val("");
				$("#region").selectmenu('refresh', true); //清空select的語法
				$("#work").selectmenu('refresh', true);
				$("#gender").selectmenu('refresh', true);
			}

		}

		function check() {

			$.ajax({
				type: "POST",
				url: "api/mem_recheck_api.php",
				data: {
					account: $("#account").val()
				},
				dataType: "json",
				success: check_success,
				error: function() {
					alert("api/mem_recheck_api.php error");
				}
			});
		}

		function check_success(data) {
			if (data.state == "true") {
				alert("帳號可使用");
				flag_check = true;
			} else {
				alert("帳號已使用");
				flag_check = false;
			}
		}
	</script>
</head>

<body>
	<div data-role="page" id="home">
		<div data-role="header" data-theme="b">
			<h1>會員註冊</h1>
		</div>
		<div role="main" class="ui-content">
			<!-- username -->
			<div data-role="fieldcontain">
				<label for="account">帳號</label>
				<input type="text" name="account" id="account" placeholder="帳號不得少於5個字數!!" maxlength="10">
			</div>
			<div id="err_username"></div>
			<div id="err_regexp"></div>
			<!-- password -->
			<div data-role="fieldcontain">
				<label for="password">密碼</label>
				<input type="password" name="password" id="password" placeholder="XXXXXXXXX" maxlength="15">
			</div>
			<div id="err_password"></div>
			<!-- check password -->
			<div data-role="fieldcontain">
				<label for="re_password">驗證密碼</label>
				<input type="password" name="re_password" id="re_password" maxlength="15">
			</div>
			<div id="err_re_password"></div>

			<!-- Tel -->

			<div data-role="fieldcontain">
				<label for="tel">電話號碼:</label>
				<input type="tel" name="tel" id="tel" maxlength="10">
			</div>

			<!-- Email -->

			<div data-role="fieldcontain">
				<label for="email">電子信箱:</label>
				<input type="email" name="email" id="email">
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
				<label for="gendermenu" class="select">性別:</label>
				<select name="gender" id="gender">
					<option value="男性">男性</option>
					<option value="女性">女性</option>
					<option value="其他">其他</option>
				</select>
			</div>


			<!-- Birth -->

			<div data-role="fieldcontain">
				<label for="birth">出生日期:</label>
				<input type="Date" name="birth" id="birth">
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

			<div class="ui-grid-b">
				<div class="ui-block-a">
					<a href="" data-role="button" data-theme="b" id="btn_cancel">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b" id="btn_reg">註冊帳號</a>
				</div>
				<div class="ui-block-c">
					<button id="check_btn">檢查帳號</button>
				</div>
			</div>
		</div>
		<div data-role="footer" data-theme="b" data-position="fixed">
			<h1>Home</h1>
		</div>
	</div>
</body>

</html>
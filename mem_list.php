<?php
session_start();

if (!isset($_SESSION["account"])) {
	echo
		'<script>
                alert("尚未登入");
                location.href = "mem_login.php";
            </script>';
}
?>

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
		$(function() {
			$.ajax({
				type: "GET",
				url: "api/mem_list_api.php",
				dataType: "json",
				async: false,
				//設定同步問題  設定不同步讓ajax的先跑完 再執行以下動作
				success: show,
				error: function() {
					alert("api/mem_list_api.php接收錯誤!");
				}
			});

			//監聽更新按鈕
			$("table tbody tr td #update_btn").bind("click", function() { //需要指定到那個按鈕的路徑進行監聽 不然會只監聽到第一個按鈕(經驗法則)
				// alert($(this).data("id"));
				// $.mobile.changePage( "#mem_update", { transition: "slideup", changeHash: false });      //mobile.change更改頁面 如過重新整理會到最上面那頁
				u_id = $(this).data("id");
				$.ajax({
					type: "POST",
					url: "api/update_one_api.php",
					data: {
						id: u_id
					},
					dataType: "json",
					success: show_update_view,
					error: function() {
						alert("api/update_one_api.php 接收錯誤");
					}
				});
			});

			//監聽刪除按鈕
			$("table tbody tr td #del_btn").bind("click", function() {
				if (confirm("確認刪除" + $(this).data("id"))) {
					$.ajax({
						type: "POST",
						url: "api/mem_delete_api.php",
						data: {
							id: $(this).data("id")
						},
						success: show_del,
						error: function() {
							alert("api/mem_delete_api.php error");
						}
					});
				}
			});
		});


		function show(data) {
			//console.log(data);
			$("#mem_tbody").empty();
			for (i = 0; i < data.length; i++) {
				subStr=data[i].Intro;
				strHTML = 
				'<tr><td>' + data[i].ID + 
				'</td><td>' + data[i].Account + 
				'</td><td>' + data[i].Tel + 
				'</td><td>' + data[i].Email + 
				'</td><td>' + data[i].Gender + 
				'</td><td>' + data[i].Region + 
				'</td><td>' + data[i].Birth + 
				'</td><td>' + data[i].Work + 
				'</td><td>' + data[i].Created_at +
				'</td><td><p>' + subStr.substring(0,15) +
				'</p></td>';

				$("#mem_tbody").append(strHTML);
			}
		}

		function show_update_view(u_data) {
			console.log(u_data);
			console.log(u_data[0].Account);
			$.mobile.changePage("#mem_update", {
				transition: "slideup",
				changeHash: false
			});

			$("#username").val(u_data[0].Account);
			$("#password").val(u_data[0].Password);
			$("#region").val(u_data[0].Region);
			$("#update_ok_btn").attr("data-uid", u_data[0].ID); ////////暫存資料位址在這兒
		}
	</script>
</head>

<body>
	<div data-role="page" id="home">
		<div data-role="header" data-theme="b">
			<h1>會員列表</h1>
		</div>
		<div role="main" class="ui-content">
			<table data-role="table" class="ui-body-d ui-shadow table-stripe ui-responsive">
				<thead>
					<tr>
						<th>ID</th>
						<th>帳號</th>
						<th>電話</th>
						<th>電子信箱</th>
						<th>性別</th>
						<th>地區</th>
						<th>生日</th>
						<th>職業</th>
						<th>註冊時間</th>
						<th>自我介紹</th>
					</tr>
				</thead>
				<tbody id="mem_tbody">
					<tr>
						<td>001</td>
						<td>aaaaaa</td>
						<td>44444444</td>
						<td>aaaa</td>
						<td>aaaa</td>
						<td>aaaa</td>
						<td>aaaa</td>
						<td>aaaa</td>
						<td>aaaa</td>
						<td>
							<button id="update_btn">更新</button>
						</td>
						<td>
							<button id="delete_btn">刪除</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div data-role="footer" data-theme="b" data-position="fixed">
			<h1>footer</h1>
		</div>
	</div>
</body>

</html>
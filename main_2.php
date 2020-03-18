<?php
session_start();

if (!isset($_SESSION["account"])) {
	echo
		'<script>
			alert("尚未登入");
			location.href = "mem_login.php";
        </script>';
}

if ($_SESSION["active"] == 0 || $_SESSION["control"] == 0) {
	echo
		'<script>
			alert("帳號已停用");
			location.href = "mem_login.php";
        </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width ,initial-scale=1">
	<title>Document</title>
	<script>
		jQuery.noConflict();
	</script>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script>
		$(function() {
			$("#account_id").attr("data-id", <?php echo $_SESSION["id"]; ?>);
			$("#edit_btn").attr("control-id", <?php echo $_SESSION["control"] ?>)

			$("#account_id").bind("click", function() {
				location.href = "mem_update.php";
			});

			$("#logout_btn").bind("click", function() {
				window.location.assign("mem_login.php");
			});

			$("#list_btn").bind("click", function() {
				location.href = "mem_list.php";
			});

			$("#nearby_restaurant_btn").bind("click", function() {
				location.href = "restaurant_list.php";
			});

			if (<?php echo $_SESSION["control"] ?> == 2) {
				$("#edit_btn").show();
			} else {
				$("#edit_btn").hide();
			}

			$("#edit_btn").bind("click", function() {
				location.href = "mem_list_2.php";
			});
		});

		// function hideElem() {
		// 	document.getElementById("edit_btn").style.visibility = "hidden";
		// }

		// function showElem() {
		// 	document.getElementById("edit_btn").style.visibility = "visible";
		// }
	</script>

	<style>
		.timeline-section {
			position: relative;
		}

		.timeline-section::after {
			position: absolute;
			content: "";
			width: 3px;
			background-color: #0024cc;
			top: 0;
			bottom: 0;
			left: 50%;
			/*左邊推50%往右*/
			transform: translateX(-50%);
			/*再往左偏移50%*/
		}

		.timeline-pointer {
			position: relative;
		}

		.timeline-pointer::after {
			position: absolute;
			content: "";
			top: 30%;
			width: 20px;
			height: 20px;
			background-color: #fff;
			left: 50%;
			transform: translateX(-50%);
			z-index: 1;
			border: 5px solid #00ffff;
			border-radius: 50%;
		}

		.timeline-pointer:hover::after {
			/*hover: 滑鼠指向時顯示畫面(動畫)*/
			width: 20px;
			height: 20px;
			background-color: #e80207;
		}

		@media screen and (max-width: 768px) {

			.timeline-section::after,
			.timeline-pointer::after {
				display: none;
			}

			.phone:hover {
				border: 4px solid #07438b;
				/* background-color: rgb(225, 249, 255); */
			}
		}
	</style>
</head>

<body>
	<div data-role="page" id="home">
		<div data-role="header" data-theme="b">
			<h1>歡迎光臨，網站地圖</h1>
		</div>
		<div role="main" class="ui-content">

			<!-- <a href="" data-role="button" data-theme="a" data-icon="search" data-transition="flip">交友社群</a> -->

			<!-- ================================================================================================================================ -->
			<div class="container my-5">
				<!-- 在最外層設定一條線 -->
				<div class="timeline-section">
					<!-- 在這一層設定線上的點 -->
					<div class="row timeline-pointer phone">
						<!-- 在這一層設定分隔與邊框 -->
						<div class="col-md-6 pt-5">
							<h3 class="font-weight-bold">會員資料修改</h3>
							<p>在這裡，您可以修改您的會員資料，以及上傳大頭照</p>
							<a href="#" data-role="button" data-theme="a" data-icon="info" data-transition="flip" id="account_id" data-id="">會員資料修改</a>
						</div>
						<div class="col-md-6">
							<img src="img/member.jfif" class="img-fluid" alt="">
						</div>
					</div>

					<div class="row flex-row-reverse timeline-pointer phone">
						<div class="col-md-6 pt-5">
							<h3 class="font-weight-bold">收藏餐廳</h3>
							<p>挑選最喜歡的餐廳，收藏起來，想吃的時候直接打開來看</p>
							<a href="" data-role="button" data-theme="a" data-icon="grid" data-transition="flip">收藏餐廳</a>
						</div>
						<div class="col-md-6">
							<img src="img/good-res.jfif" class="img-fluid" alt="">
						</div>
					</div>

					<div class="row timeline-pointer phone">
						<div class="col-md-6 pt-5">
							<h3 class="font-weight-bold">附近餐廳</h3>
							<p>不知道要吃甚麼嗎?沒關係，點擊按鈕，輸入想吃的東西，就會幫你找到附近的餐廳，點擊水滴按鈕還會顯示地圖呢!是不是很方便!</p>
							<a href="" data-role="button" data-theme="a" data-icon="star" data-transition="flip" id="nearby_restaurant_btn">附近餐廳</a>
						</div>
						<div class="col-md-6">
							<img src="img/near3.jfif" class="img-fluid" alt="">
						</div>
					</div>

					<div class="row flex-row-reverse timeline-pointer phone">
						<div class="col-md-6 pt-5">
							<h3 class="font-weight-bold">看看有那些人??</h3>
							<p>覺得這個網站很無聊嗎?看看都有誰在使用它吧!</p>
							<a href="" data-role="button" data-theme="a" data-icon="alert" data-transition="" id="list_btn">看看有那些人</a>
						</div>
						<div class="col-md-6">
							<img src="img/list.jfif" class="img-fluid" alt="">
						</div>
					</div>

					<div class="row timeline-pointer phone" id="edit_btn">
						<div class="col-md-6 pt-5">
							<h3 class="font-weight-bold">權限管理</h3>
							<p>點擊進入權限管理的頁面</p>
							<a href="" data-role="button" data-theme="b" data-icon="check" data-transition="" control-id="">權限管理</a>
						</div>
						<div class="col-md-6">
							<img src="img/list2.jfif" class="img-fluid" alt="">
						</div>
					</div>

					<div class="row timeline-pointer phone">
						<div class="col-md-6 pt-5">
							<h3 class="font-weight-bold">登出</h3>
							<p>期待您的再次光臨，再見!</p>
							<a href="api/mem_logout_api.php" data-role="button" data-theme="a" data-icon="back" data-transition="flip" id="logout_btn">登出</a>
						</div>
						<div class="col-md-6">
							<img src="img/logout.jfif" class="img-fluid" alt="">
						</div>
					</div>


				</div>
			</div>
			<!-- ================================================================================================================================ -->
		</div>
		<div data-role="footer" data-theme="b" data-position="fixed">
			<h1>美食地圖</h1>
		</div>
	</div>

	<script src="bootstrap4/js/bootstrap.min.js"></script>
	<script src="bootstrap4/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="bootstrap4/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
</body>

</html>
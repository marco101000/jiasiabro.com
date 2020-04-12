<?php
		session_start();
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();

		header('Location: ../mem_login.php');
		//header('refresh:3;url= ../mem_login.php');
		
		// header("refresh: 1;");
 


		// echo '<script>
 	// 		alert("請先登入!");
 	// 		location.href = "../mem_login.php";
		// 	 </script>';

?>


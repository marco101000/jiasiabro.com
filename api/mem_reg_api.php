<?php 

	//註冊會員
	//input: username......
	//output true or false
	require_once("dbtools.inc.php");
	$Account = $_POST["account"];
	$Password = $_POST["password"];
	$Tel = $_POST["tel"];
	$Email = $_POST["email"];
	$Gender = $_POST["gender"];
	$Birth = $_POST["birth"];
	$Work = $_POST["work"];
	$Region = $_POST["region"];
	$Intro = $_POST["intro"];


	$link = create_connection();

	$sql = "INSERT INTO testdb(Account, Password, Tel, Email, Gender, Birth, Work, Region, Intro) VALUES('$Account', '$Password', '$Tel','$Email','$Gender','$Birth','$Work', '$Region', '$Intro')";

	$state = array();

	if (execute_sql($link, "u742715146_test", $sql)){
		$state = "true";
	} else {
		$state = "false";
		
	}

	echo json_encode(array("state" => $state[0]));
	mysqli_close($link);

 ?>
<?php
	require_once("dbtools.inc.php");
	
	$id=$_POST["id"];
	$password=$_POST["password"];
	$tel=$_POST["tel"];
	$email=$_POST["email"];
	$work=$_POST["work"];
	$region=$_POST["region"];
	$intro=$_POST["intro"];
	
	$link=create_connection();

	$sql="UPDATE testdb SET Password ='$password', Tel ='$tel', Email ='$email', Work ='$work', Region ='$region', Intro='$intro' WHERE ID ='$id'";

	$state=Array();
	if(execute_sql($link, "u742715146_test", $sql)){
		$state[]='true';
	}else{
		$state[]='false';
	}

	echo json_encode(array("state"=>$state[0]));

	mysqli_close($link);
?>
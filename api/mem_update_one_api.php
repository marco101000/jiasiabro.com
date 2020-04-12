<?php
	require_once("dbtools.inc.php");
	
	$id=$_POST["id"];
		
	$link=create_connection();

	$sql="SELECT * FROM testdb WHERE ID ='$id'";

	$result=execute_sql($link, "u742715146_test", $sql);

	$row=mysqli_fetch_assoc($result);
	
	echo json_encode($row);

	mysqli_close($link);
?>
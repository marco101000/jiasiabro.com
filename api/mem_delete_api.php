<?php
//刪除會員資料
//input :id
//ouput: true false
	require_once("dbtools.inc.php");

	$id=$_POST["id"];

	$link=create_connection();

	$sql="DELETE FROM testdb WHERE ID ='$id'";
	$state=array();

	if(execute_sql($link, "u742715146_test", $sql)){
		 $state[] = "true";
        echo json_encode(array("state" => $state[0]));
	}else{
		 $state[] = "false";
        echo json_encode(array("state" => $state[0]));
	}

	mysqli_close($link);
?>
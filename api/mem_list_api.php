<?php
//讀取會員
//input :none.....
//output: all data with json file	
	require_once("dbtools.inc.php");

	$link=create_connection();

	$sql="SELECT * FROM testdb ORDER BY ID DESC";

	$result=execute_sql($link, "u742715146_test", $sql);

	$userdata=Array();

	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_assoc($result)){
			$userdata[]=$row;
		}
		echo json_encode($userdata);
	}else{
		echo "查無資料";
	}

	

	mysqli_close($link);
?>
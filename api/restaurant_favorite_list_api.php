<?php
	require_once("dbtools.inc.php");

	$account=$_POST["account"];

	$link=create_connection();

	$sql="SELECT Tag_Res FROM testdb WHERE Account = '$account'";

	$result=execute_sql($link, "u742715146_test", $sql);

	$row=mysqli_fetch_row($result);

	$favorite_res_array=Array();

	$res_id=explode(",", $row[0]);

	if($row[0] != ""){
		for($i=0; $i<count($res_id)-1; $i++){
			$res_sql="SELECT * FROM restaurant WHERE id = '$res_id[$i]'";
			$res_result=execute_sql($link, "u742715146_test", $res_sql);
			$favorite_res_array[]=mysqli_fetch_assoc($res_result);
		}

		echo json_encode($favorite_res_array);
	}else{
		echo "無收藏餐廳";
	}

	mysqli_close($link);
?>
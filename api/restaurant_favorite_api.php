<?php
	require_once("dbtools.inc.php");

	$Account=$_POST["account"];
	$Name=$_POST["name"];
	$Tel=$_POST["tel"];
	$Address=$_POST["address"];
	$Pic=$_POST["pic"];
	$Lat=$_POST["lat"];
	$Lng=$_POST["lng"];

	$link=create_connection();

	$sql_restaurant="SELECT id FROM restaurant WHERE Name='$Name'";
	$result_restaurant=execute_sql($link, "u742715146_test", $sql_restaurant);

	$restaurant_favorite_id="";

	if(mysqli_num_rows($result_restaurant)<=0){
		$sql_restaurant_insert="INSERT INTO restaurant(Name, Tel, Address, Pic, Lat, Lng) VALUES ('$Name', '$Tel', '$Address', '$Pic', '$Lat', '$Lng')";
		execute_sql($link, "u742715146_test", $sql_restaurant_insert);
		echo "新增成功";
	}

	$sql_restaurant="SELECT id FROM restaurant WHERE Name='$Name'";
	$result_restaurant=execute_sql($link, "u742715146_test", $sql_restaurant);
	$row_restaurant=mysqli_fetch_row($result_restaurant);

	$sql_testdb="SELECT Tag_Res FROM testdb WHERE Account='$Account'";
	$result_testdb=execute_sql($link, "u742715146_test", $sql_testdb);
	$row_testdb=mysqli_fetch_row($result_testdb);

	$row_testdb[0].=$row_restaurant[0];
	$judge_repeat=explode(",", $row_testdb[0]);//切割 ","	
	$no_repeat=array_values(array_unique($judge_repeat));//刪除重複
	// print_r($no_repeat);
	for($i=0; $i<count($no_repeat); $i++){
		$restaurant_favorite_id.=($no_repeat[$i].",");
	}

	$sql_testdb_update="UPDATE testdb SET Tag_Res='$restaurant_favorite_id' WHERE Account='$Account'";
	
	if(execute_sql($link, "u742715146_test", $sql_testdb_update)){
		echo "收藏成功";
	}else{
		echo mysqli_connect_error();
	}

	mysqli_close($link);
?>
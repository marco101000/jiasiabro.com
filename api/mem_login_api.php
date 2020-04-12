<?php 
	//登入api
	//input: 帳號and密碼
	//output: true or false                                
	session_start();          //開啟session
	require_once("dbtools.inc.php");
	$account = $_POST["account"];
	$password = $_POST["password"];

	$link = create_connection();

	$sql = "SELECT * FROM testdb WHERE Account = '$account' AND Password = '$password'";

	$result = execute_sql($link, "u742715146_test", $sql);
	
	$myArray =array();
	//$myArray[]=$rows;
	$myArray[]=true;
	if(mysqli_num_rows($result) == 1){
		//echo true;
		$rows =mysqli_fetch_assoc($result);      //變json輸出

		if ($rows["Active"] == 1 && $rows["Control"] != 0){
			echo json_encode(array("state"=>$myArray));
			$_SESSION["account"] = $rows["Account"] ; 
			$_SESSION["id"]=$rows["ID"];   //使用session變數 
			$_SESSION["control"]=$rows["Control"];
			$_SESSION["active"]=$rows["Active"];
		}
		
	}else{
		echo false;
	}
	
	mysqli_close($link);
?>
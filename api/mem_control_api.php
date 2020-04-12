<?php
    // header('Access-Control-Allow-Origin: *');
    require_once("dbtools.inc.php");
    
    $id = $_POST['id'];
    $control = $_POST['control'];
    $conn = create_connection();

    $sql = "UPDATE testdb SET Control='$control' WHERE ID = '$id'";

    $state=Array();
    if (execute_sql($conn,"u742715146_test",$sql)){
		$state[]='true';
	}else{
		$state[]='false';
	}

	echo json_encode(array("state"=>$state[0]));

    mysqli_close($conn);
?>
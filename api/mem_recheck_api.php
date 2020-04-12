<?php
    

    require_once("dbtools.inc.php");

    $account = $_POST["account"];

    $link = create_connection();

    $sql = "SELECT Account FROM testdb WHERE Account ='$account'";
    $result = execute_sql($link, "u742715146_test", $sql);
    $state = array();
    if(mysqli_num_rows($result) > 0){
        while($row=mysqli_fetch_assoc($result)){
            $state[] = "false";
        };
    }else{
        $state[] = "true";
    }

    echo json_encode(array("state"=>$state[0]));

    mysqli_close($link);
?>
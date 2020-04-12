<?php 
	function create_connection(){
		$servername = "localhost";
		$username = "";
		$password = "";

		$conn = mysqli_connect($servername, $username, $password) or die ("Identified error".mysqli_connect_error());

		mysqli_query($conn, "SET NAMES UTF8");

		return $conn;
	}

	function execute_sql($conn, $dbname, $sql){
		mysqli_select_db($conn, $dbname) or die ("Identified error".mysqli_error($conn));

		$result = mysqli_query($conn, $sql);

		return $result;
	}

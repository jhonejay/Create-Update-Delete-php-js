<?php

	$user = $_REQUEST['username'];
	$pass = $_REQUEST['password'];
	//$type = $_REQUEST["usertype"];	
	
	if ($user == "admin" && $pass == "admin"){
		echo file_get_contents("index.html");
}

	else {
		echo file_get_contents("login.html");
	
	}
?>
<?php 
	session_start();
	
	//清除session
	session_unset();
	header("Location: index.php");
?>
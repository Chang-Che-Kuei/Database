<?php
	//假設的有效會員帳號
	require_once 'Connections/db.php';
	require_once 'Connections/function.php';
	$check = check_has_useremail($_POST['n']);
	//如果帳號存在
	if($check)
	{
		echo "yes";
	}
	else 
	{
		echo 'no';
	}
?>

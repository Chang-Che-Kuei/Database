<?php
	//假設的有效會員帳號
	require_once 'Connections/db.php';
	require_once 'Connections/function.php';
date_default_timezone_set('Asia/Taipei');
$year = $_POST["bd_y"]; 
$month = $_POST["bd_m"]; 
$day = $_POST["bd_d"];
$birthday = $year."-".$month."-".$day;
$due_date=$_POST['regd'];
$due_date=date('Y-m-d',strtotime('+ 1 year'));
$add_result=add_user_data($_POST['un'],$_POST['sex'],$_POST['email'],$_POST['pw'],$birthday,$_POST['regd'],$_POST['ph'],$_POST['ad'],$due_date);
	if($add_result)
	{
		echo "yes";
	}
	else 
	{
		echo 'no';
	}
?>
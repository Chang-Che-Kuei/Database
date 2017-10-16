<?php
	//假設的有效會員帳號
require_once 'Connections/db.php';
  //將查詢語法當成字串，記錄在$sql變數中
  if($_POST['email']=='')
	  $_POST['email']=$_SESSION["login_user"]["email"];
  if($_POST['pwn']=='')
	  $_POST['pwn']=$_SESSION["login_user"]["password"];
  else 
	  $_POST['pwn']=md5($_POST['pwn']);
  if($_POST['un']=='')
	  $_POST['un']=$_SESSION["login_user"]["m_name"];
  if($_POST['ph']=='')
	  $_POST['ph']=$_SESSION["login_user"]["phone"];
  if($_POST['ad']=='')
	  $_POST['ad']=$_SESSION["login_user"]["address"];
  $sql = "UPDATE `member` SET `email`='".$_POST['email']."',`password`='".$_POST['pwn']."' ,`m_name`='".$_POST['un']."',`address`='".$_POST['ad']."',`phone`='".$_POST['ph']."'   WHERE `member_ID`='".$_SESSION['login_user']['member_ID']."'";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);
  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if(mysqli_affected_rows($_SESSION['link']) == 1)
    {
      	echo 'yes';
    }
  }
  else
  {
    echo 'no';
	
  }
?>

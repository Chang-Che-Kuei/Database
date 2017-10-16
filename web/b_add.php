<?php
require_once 'Connections/db.php'; 
session_start();
$sql =  "INSERT INTO `board` (`board_title`,`board_name`,`board_pic`,`board_email`, `board_content`,`board_date`,`pid`) VALUE ('{$_POST['bt']}', '{$_SESSION['login_user']['m_name']}','{$_POST['bp']}','{$_SESSION['login_user']['email']}','{$_POST['cnt']}','{$_POST['b_date']}','{$_POST['pid']}');";
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
	//echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
	  echo $_POST['pid'];
  }
?>
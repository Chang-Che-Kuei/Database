<?php
require_once '../Connections/db.php'; 
$sql = "UPDATE `board` SET `board_re`='".$_POST['board_re']."' ,`board_redate`='".$_POST['board_redate']."' WHERE `board_id`='".$_POST['board_id']."'";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);
  //如果請求成功
  if ($query)
  {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
      	echo '回覆成功!!!';
	  header("Location:admin_board.php" );
  }
  else
  {
    echo '回覆成功!!!';
  }
?>
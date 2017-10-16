<? session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八爪章魚購物城</title>
<meta http-equiv="Content-Language" content="zh-tw" />

<link href="web.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("header.php"); ?>
<div id="main">
  <div id="main1"></div>
  <div id="main2">
      <? include("leftzone.php")?>
  </div>
  <div id="main3">
    <table width="555" border="0" cellspacing="0" cellpadding="0" background="images/back11_2.gif">
      <tr>
        <td width="25" align="left"><img src="images/board13.gif" /></td>
        <td width="520" align="left" valign="middle" background="images/board04.gif">&nbsp; <span class="font_black">親愛的客戶<span class="font_red"> </span>您好，這是您的訂單記錄。</span></td>
        <td width="10" align="right"><img src="images/board05.gif" width="10" height="28" /></td>
      </tr>
    </table>
    <table width="555" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="26" align="center" class="board_add">&nbsp;</td>
        <td width="129" height="30" align="center" class="board_add"><span class="font_black">訂單編號</span></td>
        <td width="200" align="left" class="board_add"><span class="font_black">訂購日期</span><span class="font_red">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
        <td width="100" align="center" class="board_add"><span class="font_black">檢視</span></td>
		<td width="100" align="center" class="board_add"><span class="font_black">刪除</span></td>
      </tr>
	  <?php
		$memID=$_SESSION['login_user']['member_ID'];
		$search="select * from `transaction` where `member_ID` = '$memID' AND `deliverState` IS NOT NULL";
		$result = mysqli_query($_SESSION['link'],$search);
		while($list=mysqli_fetch_array($result)) {
	  ?>
      <tr>
        <td align="center" class="board_add">&nbsp;</td>
        <td height="30" align="center" class="board_add">  <?php echo $list['transaction_ID'] ?>  </td>
        <td align="left" class="board_add">                <?php echo $list['date'] ?> </td>
        <td align="center" class="board_add"><a href="shopcart_myorderView.php?transaction_id=<?php echo $list['transaction_ID'];?>">檢視</a></td>
		<td align="center" class="board_add"><a href="transaction_del.php?transaction_id=<?php echo $list['transaction_ID'];?>">刪除</a></td>
      </tr>
	  <?php
		}
	?>
    </table>

  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理後台-八爪章魚購物台</title>
<link href="../web.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("header.php"); ?>
<div id="main">
  <div id="main1"></div>
  <div id="admin_main2">
    <table width="555" border="0" cellspacing="0" cellpadding="0" background="../images/back11_2.gif">
      <tr>
        <td width="25" align="left"><img src="../images/board11.gif" /></td>
        <td width="104" align="left" valign="middle" background="../images/board04.gif">&nbsp; <span class="font_black">商品分類管理區&nbsp; &nbsp;</span></td>
        <td width="416" align="left" background="../images/board04.gif"></td>
        <td width="10" align="right"><img src="../images/board05.gif" width="10" height="28" /></td>
      </tr>
    </table>
	<?php
	for($i=1;$i<4;++$i)
	{
	?>
    <table width="555" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="25" align="center" class="board_add3">&nbsp;</td>
        <td width="270" height="30" align="left" class="board_add3">&nbsp; 
		<?php
		if($i==1){echo "上衣";}
		else if($i==2){echo "褲子";}
		else {echo "配件";}
		?>
		&nbsp; </td>
        <td width="260" align="center" class="board_add3">[<a href=
		<?php
		$name="admin_shop2.php?shop_id=".$i;
		echo $name;
		?>
		>管理本分類相關商品</a> ] 
		<!--
		[ <a href="admin_shop1Update.php?shop_id=">編輯</a> ]&nbsp; [ <a href="admin_shop1Del.php?delSure=1&amp;shop_id=">刪除</a> ]</td>
		//-->
      </tr>
    </table>
	<?php
	}
	?>
    
  </div>
  <div id="admin_main3">
       <? include("right_zone.php");?>
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
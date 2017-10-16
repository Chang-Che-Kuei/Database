<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理後台-八爪章魚購物台</title>
<link href="../web.css" rel="stylesheet" type="text/css" />
<script src="../ie6png.js" type="text/javascript"></script>
</head>

<body>
<?php include("header.php"); ?>
<div id="main">
  <div id="main1"></div>
  <div id="admin_main2">
    <table width="555" border="0" cellspacing="0" cellpadding="0" background="../images/back11_2.gif">
      <tr>
        <td width="25" align="left"><img src="../images/board11.gif" /></td>
        <td width="404" align="left" valign="middle" background="../images/board04.gif"><span class="font_black">&nbsp; [&nbsp;&nbsp; <span class="font_red"> 
		<?php
		if($_GET[shop_id]==1){echo "上衣";}
		else if($_GET[shop_id]==2){echo "褲子";}
		else {echo "配件";}
		?>
		 </span>] 分類商品管理區&nbsp; &nbsp;</span></td>
        <td width="116" align="right" background="../images/board04.gif"><a href=
		<?php
		$name="admin_shop2Add.php?shop_id=".$_GET[shop_id];
		echo $name;
		?>><img src="../images/icon_shop2Add.gif" width="89" height="19" border="0" /></a></td>
        <td width="10" align="right"><img src="../images/board05.gif" width="10" height="28" /></td>
      </tr>
    </table>
	<?php
	require_once '../Connections/db.php';
	$r1="select * from product where category = $_GET[shop_id] ";
	$result = mysqli_query($_SESSION['link'], $r1);
	while($row=mysqli_fetch_array($result)) {
	?>
    <table width="555" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="35" height="30" align="left" class="board_add3">&nbsp; &nbsp; <img src=<?php echo "../".$row["picture"];?> 
		alt="" name="pic" width="57" id="pic" /> 
        <td width="350" align="left" class="board_add3">
		<?php echo $row["name"];?><br>價格: <?php echo $row["price"];?>
		</td>
		<td width="100" align="center" class="board_add3"> [ <a href=
		<?php
		$name="admin_shop2Del.php?p_id=".$row[product_ID];
		$name=$name."&shop_id=";
		$name= $name.$_GET[shop_id];
		echo $name;
		?>>刪除</a> ]</td>
      </tr>
    </table>
	
	<?php
	}
	?>
    <table width="555" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom">&nbsp;</td>
        <td align="right" valign="bottom">&nbsp;</td>
      </tr>
    </table>
    
	
    <p><script type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<input name="Submit" type="button" onclick="MM_goToURL('parent','admin_shop1.php');return document.MM_returnValue" value="回商品管理區" />
</p>
  </div>
  <div id="admin_main3">
       <? include("right_zone.php");?>
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
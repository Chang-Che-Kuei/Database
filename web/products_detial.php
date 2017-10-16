<? session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八爪章魚購物城</title>
<link href="web.css" rel="stylesheet" type="text/css" />
<script src="ie6png.js" type="text/javascript"></script>
</head>

<body>
<?php include("header.php"); ?>
<div id="main">
  <div id="main1"></div>
  <div id="main2">
      <? include("leftzone.php")?>
  </div>
  <div id="main3">
  <?php
  	require_once 'Connections/db.php';
    $r1="select * from product where product_id = $_GET[product_id]";
	$query = mysqli_query($_SESSION['link'], $r1);
	$row=mysqli_fetch_array($query);
	if($row[category]==1) $now_category="上衣";
	else if($row[category]==2) $now_category="褲子";
	else $now_category="配件";
  ?>
  <table width="555" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="23" valign="middle" class="underline3"><img src="images/icon_cube.gif" width="23" height="21" /></td>
      <td height="25" valign="middle" class="underline3"> &nbsp;<a href="index.php">首頁</a> &gt;  &gt;
	  <a href=
	  <?php
		$name = "products.php?product_id="."0";
		echo $name;?>
	  >全部商品</a> &gt;  &gt;
	  <a href=
	  <?php
	   $name = "products.php?shop_id=".$row["category"];
	   echo $name;?>
	   ><?php echo $now_category;?></a>
	  &gt;  &gt; <?php echo $row["name"];?></td></tr></table>
    
  
  <table width="555" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="300" align="center" valign="top"><img src=<?php echo $row["picture"];?> width="300" /></td>
      <td width="255" align="center" valign="top"><p><span class='font_title3'><?php echo $row["name"];?>&nbsp;</span></p>
        <p>NT：<?php echo $row["price"];?></p>
        <p><a href=
		<?php
	   $name = "shopcart_add.php?product_id=".$row["product_ID"];
	   echo $name;?>
	   ><img src="images/car_add.gif" width="75" height="16" border="0" /></a></p></td>
    </tr>
  </table>
  <table width="555" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left" valign="top"><br />        <?php echo $row["description"];?><br /></td>
    </tr>
  </table>
  </div><?php include("board.php"); ?>
  
</div>
<?phpinclude("footer.php"); ?>
</body>
</html>
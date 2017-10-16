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
  <?php
    require_once 'Connections/db.php';
	if($_GET[shop_id]==0){
		$r1="select * from product ";
		?>
		<img src="images/shop1_6.gif" width="550" height="37" />  
		<?php
	}
    else{
		if($_GET[shop_id]==1) {
			$now_category="上衣";
		?>
		<img src="images/shop1_3.gif" width="550" height="37" />  
		<?php
		}
		else if($_GET[shop_id]==2) {
			$now_category="褲子";
		?>
		<img src="images/shop1_4.gif" width="550" height="37" />  
		<?php
		}
		else {
			$now_category="配件";
		?>
		<img src="images/shop1_5.gif" width="550" height="37" />  
		<?php
		}
		$r1="select * from product where category = $_GET[shop_id] ";
	}
	$result = mysqli_query($_SESSION['link'], $r1);
    ?>
  <div id="main3">
  <table width="555" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="23" valign="middle" class="underline3"><img src="images/icon_cube.gif" width="23" height="21" /></td>
      <td height="25" valign="middle" class="underline3"> &nbsp;<a href="index.php">首頁</a> &gt; &gt; <a href=
	  <?php
		$name = "products.php?product_id="."0";
		echo $name;?>
	  >全部商品</a> 
	  <?php if($_GET[shop_id]){echo "&gt; &gt;"; echo $now_category;}?></td>
    </tr>
  </table>
    <?php
    while($row=mysqli_fetch_array($result)) {
    ?>
  <table style="float:left;" width="134" border="0" cellspacing="0" cellpadding="0" background="images/shop3.gif">
	<tr>
	
	<td width = "134" height="79" align="center" valign="bottom"><a href=
	<?php
	$name = "products_detial.php?product_id=".$row["product_ID"];
	echo $name;?>
	><img src=
	<?php echo $row["picture"];?>
	width="55" height="57" border="0" /></a></td>
    
	</tr>
	
    <tr>
      <td  height="17" align="center" class="font1">
	  <?php echo $row["name"];?>
      <br /><span class="font_red">NT：
	  <?php echo $row["price"];?></span></td>
    </tr>
    <tr>
      <td height="19" align="center"><a href=
	  <?php
	   $name = "shopcart_add.php?product_id=".$row["product_ID"];
	   echo $name;?>
	  ><img src="images/car_add.gif" width="75" height="16" border="0" /></a></td>
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
    <table width="555" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="80" align="center" class="font_red2">  </td>
      </tr>
    </table>
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
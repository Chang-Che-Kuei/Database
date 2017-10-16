
<?php 
	require_once "Connections/db.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八爪章魚購物城</title>
<meta http-equiv="Content-Language" content="zh-tw" />
<link href="web.css" rel="stylesheet" type="text/css" />
<script src="ie6png.js" type="text/javascript"></script>
</head>

<body>
<?php include("header.php"); 
  	require_once 'Connections/db.php';
    //$r1="select * from product ";
	//$query = mysqli_query($_SESSION['link'], $r1);
	//$row=mysqli_fetch_array($query);
  ?>
<div id="main">
  <div id="main1"></div>
  <div id="main2">
      <? include("leftzone.php")?>
  </div>
  <div id="main3">
    <table width="555" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="20"></td>
      </tr>
    </table>
<table width="555" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="154"><img src="images/panner/20100403140213.jpg" width="555" height="154" border="0"></td>
  </tr>
</table>
   
   <img src="images/shop1.gif" width="550" height="37" />   <!最新商品>
	<?php
    require_once 'Connections/db.php';
	$r1="select * from product order by product_ID DESC";
	$result = mysqli_query($_SESSION['link'], $r1);
	$count=4;
    while($row=mysqli_fetch_array($result) ) {
		if($count<=0)break;
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
$count-=1;
}
?>
	
    <img src="images/shop1_2.gif" width="550" height="37" />   <!熱銷商品>
	<?php
    require_once 'Connections/db.php';
	$r1="select * from product order by sale_number DESC,product_ID";
	$result = mysqli_query($_SESSION['link'], $r1);
	$count=4;
    while($row=mysqli_fetch_array($result) ) {
		if($count<=0)break;
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
$count-=1;
}
?>


<img src="images/shop1_3.gif" width="550" height="37" />   <!上衣>
<?php
	$r1="select * from product where category = 1";
	$result = mysqli_query($_SESSION['link'], $r1);
	$count=4;
    while($row=mysqli_fetch_array($result) ) {
		if($count<=0)break;
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
$count-=1;
}
?>
<table width="555" border="0" cellspacing="0" cellpadding="0">
<td height="25" align="right"> &nbsp;<a href= 
		<?php
	   $name = "products.php?shop_id="."1";
	   echo $name;?>
	   >>more</a>
</table>

<img src="images/shop1_4.gif" width="550" height="37" />   <!褲子>
<?php
	$r1="select * from product where category = 2";
	$result = mysqli_query($_SESSION['link'], $r1);
	$count=4;
    while($row=mysqli_fetch_array($result) ) {
		if($count<=0)break;
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
$count-=1;
}
?>
<table width="555" border="0" cellspacing="0" cellpadding="0" >
<td height="25" align="right"> &nbsp;<a href= 
		<?php
	   $name = "products.php?shop_id="."2";
	   echo $name;?>
	   >>more</a>
</table>


<img src="images/shop1_5.gif" width="550" height="37" />   <!配件>
<?php
	$r1="select * from product where category = 3";
	$result = mysqli_query($_SESSION['link'], $r1);
	$count=4;
    while($row=mysqli_fetch_array($result) ) {
		if($count<=0)break;
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
$count-=1;
}
?>
<table width="555" border="0" cellspacing="0" cellpadding="0">
<td height="25" align="right"> &nbsp;<a href= 
		<?php
	   $name = "products.php?shop_id="."3";
	   echo $name;?>
	   >>more</a>
</table>

  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>

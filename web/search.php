<? session_start();?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八爪章魚購物城</title>
<meta http-equiv="Content-Language" content="zh-tw" />
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
  <div align="left">
  搜尋關鍵字：<span class="font_red"> <?php echo $_GET[keyword];?></span>
  <?php
  if($_GET[shop_id]!=0){
	  echo " &nbsp; &nbsp; &nbsp;類別:<span class='font_red'>";
	  if($_GET[shop_id]==1) echo "上衣</span>";
	  else if($_GET[shop_id]==2) echo "褲子</span>";
	  else echo "配件</span>";
  }
  if($_GET[minprice]!=0){
	  echo " &nbsp; &nbsp; &nbsp;最低價格:<span class='font_red'>";
	  echo $_GET[minprice];
	  echo "</span>";
  }
  if($_GET[maxprice]!=0){
	  echo " &nbsp; &nbsp; &nbsp;最高價格:<span class='font_red'>";
	  echo $_GET[maxprice];
	  echo "</span>";
  }
  ?>
  
  <?php
    require_once 'Connections/db.php';
	$r1="select count(*) from product where name='$_GET[keyword]' ";
	if($_GET[shop_id]!=0)
	{
		$r1=$r1."and category = $_GET[shop_id] ";
	}
	if($_GET[minprice]!=0)
	{
		$r1=$r1."and price >= $_GET[minprice] ";
	}
	if($_GET[maxprice]!=0)
	{
		$r1=$r1."and price <= $_GET[maxprice] ";
	}
	$r1=$r1.";";
	$result = mysqli_query($_SESSION['link'], $r1);
    while($row=mysqli_fetch_array($result)) 
	{
  ?>
  <br>
  &nbsp;&nbsp;搜尋結果：相關商品共<span class="font_red"> &nbsp; &nbsp; <?php echo $row[0];}?>
  &nbsp; &nbsp;</span>筆 <br><td align="right"><a href="search_advanced.php">前往進階搜尋</a></td>
  </div>
    <table width="555" border="0" cellspacing="0" cellpadding="0" background="images/back11_2.gif">
      <tr>
        <td width="25" align="left"><img src="images/board12.gif" /></td>
        <td width="93" align="center" valign="middle" background="images/board04.gif">商品圖</td>
        <td width="126" align="left" valign="middle" background="images/board04.gif">商品名稱</td>
        <td width="219" align="left" valign="middle" background="images/board04.gif">商品簡介</td>
        <td width="82" align="center" valign="middle" background="images/board04.gif">單價</td>
        <td width="10" align="right"><img src="images/board05.gif" width="10" height="28" /></td>
      </tr>
    </table>
	<?php
	$r1="select * from product where name='$_GET[keyword]' ";
	if($_GET[shop_id]!=0)
	{
		$r1=$r1."and category = $_GET[shop_id] ";
	}
	if($_GET[minprice]!=0)
	{
		$r1=$r1."and price >= $_GET[minprice] ";
	}
	if($_GET[maxprice]!=0)
	{
		$r1=$r1."and price <= $_GET[maxprice] ";
	}
	$r1=$r1.";";
	$result = mysqli_query($_SESSION['link'], $r1);
    while($row=mysqli_fetch_array($result)) 
	{
   ?>
    <table width="555" border="0" cellspacing="0" cellpadding="5">
      <tr class="font_black">
        <td width="14" align="center" class="board_add3">&nbsp;
		<p><a href=
		<?php
	    $name = "shopcart_add.php?product_id=".$row["product_ID"];
	    echo $name;?>
	    ><img src="images/add.png" width="14"  border="0"/></a></p>
		</td>
        <td width="84" align="center" class="board_add3"><a href=
		<?php
		$name = "products_detial.php?product_id=".$row["product_ID"];
		echo $name;?>
		>
		<img src=<?php echo $row["picture"];?> width="57" border="0" /></a></td>
        <td width="116" align="left" class="board_add3">&nbsp;<a href=
		<?php
		$name = "products_detial.php?product_id=".$row["product_ID"];
		echo $name;?>
		><?php echo $row["name"];?></td>
        <td width="199" align="left" valign="middle" class="board_add3">&nbsp;<?php echo $row["description"];?></td>
        <td width="92" align="center" class="board_add3">&nbsp;<?php echo $row["price"];?></td>
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
	
	
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
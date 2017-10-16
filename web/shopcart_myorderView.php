<? session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <form action="" method="shopcart" name="order" id="order">
    <table width="555" border="0" cellspacing="0" cellpadding="0" background="images/back11_2.gif">
      <tr>
        <td width="25" align="left"><img src="images/board13.gif" /></td>
        <td width="78" align="left" valign="middle" background="images/board04.gif">&nbsp; <span class="font_black">訂 單 細 節&nbsp;-</span></td>
        <td width="442" align="left" valign="middle" background="images/board04.gif"><span class="font_black">親愛的客戶 (<span class="font_red"> </span>) 
          
          您好，這是您的訂單資料：</span></td>
        <td width="10" align="right"><img src="images/board05.gif" width="10" height="28" /></td>
      </tr>
    </table>
	<?php 
		$t_id=$_GET[transaction_id];
		$detail="SELECT * FROM `transaction` WHERE `transaction_ID` = '$t_id' ";
		$result=mysqli_query($_SESSION['link'],$detail);
		$list=mysqli_fetch_array($result) 	
	?>
    <table width="555" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td width="93" align="right" class="board_add"><span class="font_black">收 件 者 姓 名：</span></td>
        <td width="442" align="left" class="board_add"><?php echo $list['recipName']?></td>
      </tr>
      <tr>
        <td align="right" class="board_add"><span class="font_black">聯 絡 電 話：</span></td>
        <td align="left" class="board_add">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" class="board_add"><span class="font_black">收 件 者 地 址：</span></td>
        <td align="left" class="board_add">&nbsp;</td>
      </tr>

      
    </table>

    <table width="555" border="0" cellspacing="0" cellpadding="0" background="images/back11_2.gif">
      <tr>
        <td width="25" align="left"><img src="images/board12.gif" /></td>
        <td width="104" align="left" valign="middle" background="images/board04.gif">&nbsp; <span class="font_black">訂購清單&nbsp; &nbsp;</span></td>
        <td width="416" align="left" valign="bottom" background="images/board04.gif">&nbsp;</td>
        <td width="10" align="right"><img src="images/board05.gif" width="10" height="28" /></td>
        </tr>
    </table>
    <table width="555" border="0" cellspacing="0" cellpadding="5">
      <tr class="font_black">
        <td width="100" align="center" class="board_add3"><span class="font_black">商品圖</span></td>
        <td width="255" align="left" class="board_add3"><span class="font_black">訂購商品名稱</span></td>
        <td width="100" align="center" valign="middle" class="board_add3"><span class="font_black">單價</span></td>
        <td width="100" align="center" class="board_add3"><span class="font_black">訂購數量</span></td>
        </tr>
		<?php 
		$cart= "SELECT * FROM `transaction` NATURAL JOIN `record` NATURAL JOIN `product` where `transaction_ID` = '$t_id'";
		$all= mysqli_query($_SESSION['link'],$cart);
		while($list=mysqli_fetch_array($all)) {	$totalPrice+=$list['t_price'];
		?>
      <tr>
        <td align="center" class="board_add3"><img src="<?php echo $list['picture'] ?>" width="57" /></td>
        <td height="30" align="left" class="board_add3"><span class="font_black"><?php echo $list['name'] ?></span></td>
        <td align="center" valign="middle" class="board_add3"><span class="font_black"><?php echo $list['price'] ?></span></td>
        <td align="center" class="board_add3"><?php echo $list['amount'] ?></td>
        </tr>
		<?php  }  ?>
    </table>
    <table width="555" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td height="20" align="right" class="board_add3"><span class="font_black">小 計：<?php echo  $totalPrice ?></span></td>
      </tr>
      <tr>
        <td height="20" align="right" class="board_add3"><span class="font_black">運 費：60</span></td>
      </tr>
      <tr>
        <td height="20" align="right" class="board_add3"><span class="font_red">總 計：<?php echo $totalPrice+60 ?></span></td>
      </tr>
    </table>
    </form>
    
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
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
    <form name="form1" method="shopcart" action="">
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
        <td width="205" align="left" class="board_add3"><span class="font_black">訂購商品名稱</span></td>
        <td width="100" align="center" valign="middle" class="board_add3"><span class="font_black">單價</span></td>
        <td width="100" align="center" class="board_add3"><span class="font_black">訂購數量</span></td>
		<td width="100" align="center" class="board_add3"><span class="font_black">總額</span></td>
        <td width="50" align="center" class="board_add3"><span class="font_black">取消</span></td>
      </tr>
	  <?php
		require_once 'Connections/db.php';
		@session_start();
		$m_id=$_SESSION['login_user']['member_ID'];
		if($_SESSION['is_login']==FALSE){
			echo"<script>alert('請先登入會員');history.go(-1);</script>";
		}
		//$newRecord ="SELECT `transaction_ID`,`product_ID`,`amount` FROM `record` ";
		//$reco=mysqli_query($_SESSION['link'],$newRecord);
		//echo "{$newRecord} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
		
		$cart= "SELECT * FROM `transaction` NATURAL JOIN `record` NATURAL JOIN `product` where `deliverState` IS NULL";
		$all= mysqli_query($_SESSION['link'],$cart);
		while($list=mysqli_fetch_array($all)) {		$_SESSION['t']=$list['transaction_ID'];$totalPrice+=$list['t_price'];
	  ?>
	  
      <tr>
        <td align="center" class="board_add3">
			<img src=    
				<?php echo $list["picture"];?>   
			width="57" />     </td>
        <td height="30" align="left" class="board_add3"><span class="font_black"> <?php echo $list['name']?>  </span></td>
        <td align="center" valign="middle" class="board_add3"><span class="font_black">  <?php echo $list['price']?>  </span></td>
        <td align="center" class="board_add3"> <?php echo $list['amount']?>    </span></td> 
		<td align="center" class="board_add3"><span class="font_black">  <?php echo $list['t_price']?>   </span></td>
        <td align="center" class="board_add3"><span class="font_black">
			<a href="shopcart_del2.php?transaction_id=<?php echo $list['transaction_ID'];?>&product_id=<?php echo $list['product_ID'];?>">取消</a></span></td>
      </tr>
	  
	     <?php
		}
	  ?> 
	  
    </table>
    <table width="555" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td height="20" align="right" class="board_add3"><span class="font_black">小 計： <?php echo $totalPrice?>  </span></td>
      </tr>
      <tr>
        <td height="20" align="right" class="board_add3"><span class="font_black">運 費：60</span></td>
      </tr>
      <tr>
        <td height="20" align="right" class="board_add3"><span class="font_red">總 計： <?php echo $totalPrice+60 ?> </span></td>
      </tr>
    </table>
    <table width="555" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="70" align="center" valign="middle">
    <input name="button" type="button" id="button" onclick="window.location='index.php'" value="繼續購物">
    <input name="button3" type="button" id="button3" onclick="window.location='shopcart_del.php?transaction_id=<?php echo $_SESSION['t'];?>'" value="清空購物車">
	

	<input name="button4" type="button" id="button4" onclick="window.location='shopcart_checkout.php?transaction_id=<?php echo $_SESSION['t'];?>'" value="前往結帳">
        </td>
      </tr>
    </table>
    </form>
    
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
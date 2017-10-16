<?php
require_once "Connections/db.php";
@session_start();

//$hhh= "INSERT INTO `record` (`transaction_id`,`product_id`,`amount`,`price`) VALUE (0,3,1,1);";

//$hhh= "INSERT INTO `transaction` (`transaction_ID`,`member_ID`,`total`) VALUE (12584,8,1568);";
//$exe=mysqli_query($_SESSION['link'],$hhh);
//if($exe)echo "haha";
//echo "{$hhh} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
$p_id=$_GET['product_id'];
$m_id=$_SESSION['login_user']['member_ID'];

//find the product
$find= "select * from `product` where `product_ID` = '{$p_id}' ";
$result = mysqli_query($_SESSION['link'],$find);
$row=mysqli_fetch_array($result);
$price=$row['price'];
if($_SESSION['is_login']==FALSE){
	echo"<script>alert('請先登入會員');history.go(-1);</script>";
}
ELSE
{
	//find the shopcart(deliverState=null) in the transaction
	$shopcart= "SELECT * FROM `transaction` WHERE `member_ID` = '$m_id' AND `deliverState` IS NULL";
	$findCart = mysqli_query($_SESSION['link'],$shopcart);
	$resultCart = mysqli_fetch_array($findCart);
	if($resultCart){//已有購物車
		//找record中使否已有此商品，有的話amount+1
		$t_id=$resultCart['transaction_ID'];
		$recordCheck= "SELECT * FROM `record` WHERE `transaction_ID` = '$t_id' AND `product_ID` = '$p_id' ";
		$findRecord = mysqli_query($_SESSION['link'],$recordCheck);
		$exist = mysqli_fetch_array($findRecord);
		
		if($exist==TRUE){//已有同樣商品
			$update = "UPDATE `record` SET `amount`= `amount`+1, `t_price`=`amount`*'$price' where `transaction_ID`= '{$t_id}' AND `product_ID` = '{$p_id}' ";
			$recordPlus1 = mysqli_query($_SESSION['link'],$update);
			
		}
		else{
			$addRecord = "INSERT INTO `record` (`transaction_ID`,`product_ID`,`amount`,`t_price`) VALUE ('{$t_id}', '{$p_id}',1,'{$price}');";
			$add=mysqli_query($_SESSION['link'],$addRecord);
		}
		$update ="UPDATE `transaction` SET `total`=`total`+'$price' where `member_ID`= '{$m_id}' AND `deliverState` IS NULL ";
		$updateT=mysqli_query($_SESSION['link'],$update);

	}
	else{//無新的購物車
		//新增購物車
		$newCart= "INSERT INTO `transaction` (`member_ID`,`total`) VALUE ('{$m_id}','{$price}');";
		$findCart=mysqli_query($_SESSION['link'],$newCart);
		//echo "{$findCart} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
		if(findCart==False)echo"<script>alert('無購物車  新增購物車失敗');history.go(-1);</script>"; 
	    
		//新增record
		$findtID="select * from `transaction` where `member_ID` = '{$m_id}' AND `deliverState`  IS NULL";
		$q_tID=mysqli_query($_SESSION['link'],$findtID);
		$result_tID= mysqli_fetch_array($q_tID);
		$t_id=$result_tID['transaction_ID'];
		
		$newRecord="INSERT INTO `record` (`transaction_ID`,`product_ID`,`amount`,`t_price`) VALUE ('{$t_id}', '{$p_id}',1,'{$price}');";
		$findRecord=mysqli_query($_SESSION['link'],$newRecord);
		if(findRecord==false)echo"<script>alert('無購物車  新增record失敗');history.go(-1);return;</script>"; 
	}
}
echo"<script>alert('加入成功 跳轉上一頁');history.go(-1);</script>"; 
?>
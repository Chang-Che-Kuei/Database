<?php
require_once '../Connections/db.php';
$r2="DELETE FROM product WHERE product_ID = $_GET[p_id] ;";
mysqli_query($_SESSION['link'], $r2);
$url="admin_shop2.php?shop_id=".$_GET[shop_id];
header("Location:$url" );
?>

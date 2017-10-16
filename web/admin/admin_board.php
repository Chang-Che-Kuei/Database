<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，因為此檔案放在 admin 裡，要找到 db.php 就要回上一層 ../php 裡面才能找到
require_once '../Connections/db.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理後台</title>
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="Content-Language" content="zh-tw" />
<link href="../web.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include("header.php"); ?>
<div id="main">
  <div id="main1"></div>
  <div id="admin_main2">
     <?php
	  $i=0;
    $sql="select * from board";
	$response = mysqli_query($_SESSION['link'], $sql);
    while($r=mysqli_fetch_array($response)) {
   ?>
   
    <table width="555" border="0" cellspacing="0" cellpadding="0" class="board_add2">
      <tr>
        <td width="115" rowspan="2" align="center" valign="top"><br />
          <div id="board_pic"><img src="../images/face/<?php echo $r[board_pic];?>" width="80" height="80" /></div>
          <div id="board_namefont"><?php   
		$query = mysqli_query($_SESSION['link'], "SELECT 
		  `name` FROM `product` WHERE `product_ID`=$r[pid]");
		 $pname=mysqli_fetch_assoc($query);
		echo "{$r[board_name]}</br>對{$pname[name]}做出評論!!";?>
			</div>    <br />
            <div>使用者email:<font color="blue"><? echo "  $r[board_email]"?></font>
             </div>
          </td>
		  <td width="260" align="left" class="font_black"><font color="red" size="2px"><?php echo  $r[board_title]?></font></td>
        <td width="180" height="20" align="right" class="font_black">留言時間：<?php echo $r[board_date]?></td>
      </tr>
      <tr>
        <td colspan="2" valign="top">
        <form name="admin_badd<?php echo $i;?>" id="admin_badd<?php echo $i;?>" method="post" action="admin_badd.php">
        <table width="430" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="11" valign="top" background="../images/board02.gif"><img src="../images/board01.gif" width="11" height="40" /></td>
            <td width="429" align="left" valign="top" class="board_line1">
             <div class="board_post"> 
              <label>
					<?php echo $r[board_content]?>
              </label>
              <br />
            </div>
                                 <table width="389" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="64" valign="top">管理回覆：<?php echo $r[board_re]?></td>
                  <td width="325" align="left" valign="top" class="board_repost2"></td>
                </tr>
                <tr>
                  <td></td>
                  <td height="20" align="right">回覆時間：<?php echo $r[board_redate]?></td>
                </tr>
              </table>
              <div class="board_repost">
                <table width="389" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="64" valign="top">管理回覆：</td>
                    <td width="325" align="left" valign="top" class="board_repost2"><label>
                      <textarea name="board_re" id="board_re" cols="37" rows="5"></textarea>
                    </label></td>
                  </tr>
                </table>
                <label>
                  <input type="submit" name="button" id="button" value="送出修改" />
                </label>
                
                <input type="hidden" name="board_id" id="board_id" value="<?php echo  $r[board_id]?>" />
				  <input name="board_redate" type="hidden" id="board_redate" value="<? date_default_timezone_set('Asia/Taipei');echo date("Y-m-d H:i:s");?>" /></div>
         </td>
          </tr>
        </table>
        </form>
        </td>
      </tr>
    </table>
    <?};?>
    <table width="555" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom">&nbsp;</td>
        <td align="right" valign="bottom">&nbsp;</td>
      </tr>
    </table>
  </div>
  <div id="admin_main3">
       <? include("right_zone.php");?>
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
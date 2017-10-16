<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，因為此檔案放在 admin 裡，要找到 db.php 就要回上一層 ../php 裡面才能找到
require_once 'Connections/db.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-tw" />
<link href="web.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="main">
  <div id="main3">
  <?php if($_SESSION['is_login']){ echo '
  <div align="center"><a href=';
	$name = "boardAdd.php?product_id=".$_GET[product_id];
	echo $name;
	echo '
	><img src="images/board_post.gif" width="100" height="22" border="0" align="middle" /></a></div>';}
	 else echo '<div align="center">請先登入才能發表留言!!</div>'; ?>
  <?php
    $sql="select * from board where  pid= $_GET[product_id] ";
	$response = mysqli_query($_SESSION['link'], $sql);
    while($r=mysqli_fetch_array($response)) {
   ?>
<table width="555" border="0" cellspacing="0" cellpadding="0" class="board_add2">
      <tr>
        <td width="115" rowspan="2" align="center" valign="top"><br />
        <div id="board_pic"><img src="images/face/<?php echo $r[board_pic]?>" width="80" height="80" /></div>
        <div id="board_namefont"><?php echo $r[board_name]?></div></td>
		  <td width="260" align="left" class="font_black"><font color="red" size="2px"><?php echo $r[board_title]?></font></td>
        <td width="180" height="20" align="right" class="font_black">留言時間： <?php echo $r[board_date]?></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><table width="430" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="11" valign="top" background="images/board02.gif"><img src="images/board01.gif" width="11" height="40" /></td>
            <td width="429" align="left" valign="top" class="board_line1">
            <div class="board_post">
             <?php echo $r[board_content]?>
            </div>
            <div class="board_repost">
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
            </div>
            </td>
          </tr>
        </table></td>
      </tr>
    </table>
   <? }?>
<table width="555" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="bottom">&nbsp;</td>
    <td align="right" valign="bottom">&nbsp;</td>
  </tr>
</table>
  </div>
  <div id="main4"></div>
</div>
</body>
</html>
<? session_start();?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八爪章魚購物城</title>
<meta http-equiv="Content-Language" content="zh-tw" />
<link href="web.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("header.php"); ?>
<div id="main">
  <div id="main1"></div>
  <div id="main2">
      <? include("leftzone.php")?>
  </div>
  <div id="main3">
    <table width="555" border="0" cellspacing="0" cellpadding="0" background="images/back11_2.gif">
      <tr>
      <td width="25" align="left"><img src="images/board14.gif" /></td>
        <td width="520" align="left" valign="middle" background="images/board04.gif">
		&nbsp;商品進階搜尋 &nbsp;- 請輸入商品搜尋關鍵字與商品價位限制!!</td>
      <td width="10" align="right"><img src="images/board05.gif" width="10" height="28" /></td>
      </tr>
    </table>
    <form id="search_advanced" name="search_advanced" method="get" action="search.php?">
    <table width="555" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td class="board_add">關 鍵 字：</td>
        <td class="board_add"><label>
          <input type="text" name="keyword" id="keyword" />
        </label><span class="font_red">* </span></td>
      </tr>
      <tr>
        <td width="72" class="board_add">商 品 分 類：</td>
        <td width="463" class="board_add"><label>
          <select name="shop_id" id="shop_id">
            <option value="0">請選擇商品分類....</option>
            <option value="1">上衣</option>
			<option value="2">褲子</option>
			<option value="3">配件</option>
          </select>
        </label>
      </tr>
      <tr>
        <td class="board_add">價 格：</td>
        <td class="board_add"><label>
          <input name="minprice" type="text" id="minprice" size="10" /></label>
          至
          <label><input name="maxprice" type="text" id="maxprice" size="10" /></label>
          (小至大)</td>
      </tr>
      <tr>
        <td class="board_add">&nbsp;</td>
        <td class="board_add"><label>
          <input type="submit" name="button2" id="button2" value="送出查詢" />
          <input type="reset" name="button3" id="button3" value="重設" />
          <input type="button" name="Submit" value="回首頁" onclick="window.location='index.php'">
        </label></td>
      </tr>
    </table>
    </form>
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
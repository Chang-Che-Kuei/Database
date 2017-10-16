<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
  <div id="main3" align="center">
    <form id="boardadd" name="boardadd" method="post" action="">
      <table width="540" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="25" align="left"><img src="images/board03.gif" /></td>
          <td width="505" align="left" background="images/board04.gif">&nbsp; <span class="font_black">任何與網站相關的問題，都歡迎留言喔~~</span></td>
          <td width="10" align="right"><img src="images/board05.gif" width="10" height="28" /></td>
        </tr>
      </table>
      <table width="540" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="82" height="30" class="board_add">標&nbsp; 題：</td>
          <td width="468" align="left" class="board_add"><label>
            <input type="text" name="board_title" id="board_title" />
            </label><span class="font_red">* </span></td>
        </tr>
        <tr>
          <td height="30" class="board_add">圖&nbsp; 示：</td>
          <td align="left" class="board_add"><table width="480" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center"><div id="board_pic"><img src="images/face/fface1.gif" width="80" height="80" /></div></td>
              <td align="center"><div id="board_pic"><img src="images/face/fface2.gif" width="80" height="80" /></div></td>
              <td align="center"><div id="board_pic"><img src="images/face/fface3.gif" width="80" height="80" /></div></td>
              <td align="center"><div id="board_pic"><img src="images/face/fface4.gif" width="80" height="80" /></div></td>
            </tr>
            <tr>
              <td align="center"><label>
                <input type="radio" name="bp" id="radio" value="fface1.gif" checked="checked">
              </label></td>
              <td align="center"><label>
                <input type="radio" name="bp" id="radio" value="fface2.gif">
              </label></td>
              <td align="center"><label>
                <input type="radio" name="bp" id="radio" value="fface3.gif">
              </label></td>
              <td align="center"><label>
                <input type="radio" name="bp" id="radio" value="fface4.gif">
              </label></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td class="board_add">留&nbsp; 言：</td>
          <td align="left" class="board_add"><label>
            <br />
            <textarea name="board_content" id="board_content" cols="50" rows="10"></textarea>
            </label>
            <span class="font_red">*</span><br /><br />
          </td>
        </tr>
        <tr>
          <td height="40" colspan="2" align="center"><label>
            <input type="submit" name="button" id="button" value="送出留言" />
            <input type="reset" name="button2" id="button2" value="重設" />
            <input name="board_date" type="hidden" id="board_date" value="<?php date_default_timezone_set('Asia/Taipei');echo date("Y-m-d H:i:s");?>" />
          </label></td>
        </tr>
      </table>
      <input type="hidden" name="pid" id="pid" value="<?php echo $_GET['product_id']?>"/>
      <input type="hidden" name="goto" id="goto" value="<?php echo "http://localhost/web/products_detial.php?product_id=".$_GET['product_id']?>"/>
    </form>
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
</body>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function() {
	   var mark = $('input:radio:checked').val();
	$("input:radio").on("click", function() {
        // 这里需要更新
       mark = $(this).val();
    });
  $("#boardadd").submit(function() {
	if(boardadd.board_title.value=='')
	{
		alert("請輸入標題名稱!!");
		return;
	}
	else if(boardadd.board_content.value=='')
	{
		alert("請輸入內容!!");
		return;
	}
    //使用 ajax 送出
    $.ajax({
      type: "POST",
      url: "b_add.php",
      data: {
        bt: $("#board_title").val(), //使用者帳號
        bp: mark,
		cnt: $("#board_content").val(),
		b_date: $("#board_date").val(),
		pid: $("#pid").val()
      },
      dataType: 'html' //設定該網頁回應的會是 html 格式
    }).done(function(data) {

      //成功的時候
      if (data == "yes") {
        alert("留言成功");
		
        window.location.href = $("#goto").val();
        window.event.returnValue = false;
      } else{
        alert("留言失敗");
      }

    }).fail(function(jqXHR, textStatus, errorThrown) {
      //失敗的時候
      alert("有錯誤產生，請看 console log");
      console.log(jqXHR.responseText);
    });
    return false;
  });
});
</script>
</html>
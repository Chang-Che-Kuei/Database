<? session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-tw" />
<link href="web.css" rel="stylesheet" type="text/css" />
<script language=javascript src="address.js"></script><!--引入郵遞區號.js檔案-->
</head>

<body>
<?php include("header.php"); ?>
<div id="main">
  <div id="main1"></div>
  <div id="main2">
      <? include("leftzone.php")?>
  </div>
  <div id="main3" align="center">
    <form id="memberchange" name="memberchange" method="post" action="">
      <table width="540" border="0" cellspacing="0" cellpadding="0" background="images/back11_2.gif">
        <tr>
          <td width="25" align="left"><img src="images/board03.gif" /></td>
          <td width="505" align="left" background="images/board04.gif">&nbsp; <span class="font_black">親愛的會員[</span><?php echo $_SESSION["login_user"]['m_name']?><span class="font_black">]請由下方編輯您的個人資料~~</span></td>
          <td width="10" align="right"><img src="images/board05.gif" width="10" height="28" /></td>
        </tr>
      </table>
      <table width="540" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td width="82" height="30" align="right" class="board_add">姓名：</td>
          <td width="458" align="left" class="board_add"><label>
            <input type="text" name="uname" id="uname" />
          </label></td>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">變更密碼：</td>
          <td align="left" class="board_add"><label>
            <input name="passwordNew" type="password" id="passwordNew" size="15" />
          </label><span class="font_red">如需變更密碼才輸入!</span></td>
        </tr>
        <tr>
       <tr>
          <td height="30" align="right" class="board_add">確認密碼：</td>
          <td align="left" class="board_add"><label>
            <input name="repassword" type="password" id="repassword" size="15" />
			  </label>
        </tr>
          <td height="30" align="right" class="board_add">E-mail：</td>
          <td align="left" class="board_add"><label>
            <input name="uemail" type="text" id="uemail" size="35" />
          </label><br />
<span class="font_black">請勿使用會檔信的yahoo、pchome信箱，以免收不到註冊信及訂閱之會員電子報。</span></td>
        <tr>
          <td height="30" align="right" class="board_add">電話：</td>
          <td align="left" class="board_add"><label>
            <input type="text" name="uphone" id="uphone" />
          </label></td>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">郵遞區號：</td>
          <td align="left" class="board_add">
                          <select onchange="citychange(this.form)" name="Area">
                              <option value="基隆市">基隆市</option>
                              <option value="臺北市" selected="selected">臺北市</option>
                              <option value="臺北縣">臺北縣</option>
                              <option value="桃園縣">桃園縣</option>
                              <option value="新竹市">新竹市</option>
                              <option value="新竹縣">新竹縣</option>
                              <option value="苗栗縣">苗栗縣</option>
                              <option value="臺中市">臺中市</option>
                              <option value="臺中縣">臺中縣</option>
                              <option value="彰化縣">彰化縣</option>
                              <option value="南投縣">南投縣</option>
                              <option value="雲林縣">雲林縣</option>
                              <option value="嘉義縣">嘉義縣</option>
                              <option value="臺南市">臺南市</option>
                              <option value="臺南縣">臺南縣</option>
                              <option value="高雄市">高雄市</option>
                              <option value="高雄縣">高雄縣</option>
                              <option value="屏東縣">屏東縣</option>
                              <option value="臺東縣">臺東縣</option>
                              <option value="花蓮縣">花蓮縣</option>
                              <option value="宜蘭縣">宜蘭縣</option>
                              <option value="澎湖縣">澎湖縣</option>
                              <option value="金門縣">金門縣</option>
                              <option value="連江縣">連江縣</option>
                          </select>
                          <select onchange="areachange(this.form)" name="cityarea">
                                <option value="" selected="selected"></option>
                          </select>
                          <input type="hidden" value="100" name="Mcode" />
                          <input name="cuszip" size="5" maxlength="5" readonly="readOnly" />
          </td>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">完整地址：</td>
          <td align="left" class="board_add"><span class="bs">
            <input name="ucusadr" type="text" id="ucusadr" value="" size="60" />
          </span></td>
        </tr>
        <tr>
          <td height="40" colspan="2" align="center"><label>
            <input type="submit" name="button" id="button" value="更新資料" />
            <input type="button" name="submit" value="回上一頁" onClick=window.history.back();>
            <input type="hidden" name="id" id="id" />
          </label></td>
        </tr>
      </table>
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
  $("#memberchange").submit(function() {
    //使用 ajax 送出
	  var p=memberchange.passwordNew.value;
	if(p.localeCompare(memberchange.repassword.value))
	{
		alert("密碼不一致!!");
		return;
	}
    $.ajax({
      type: "POST",
      url: "change.php",
      data: {
        un: $("#uname").val(), //使用者帳號
        email: $("#uemail").val(),
		  pwn: $("#passwordNew").val(),
		  ph: $("#uphone").val(),
		  ad: $("#ucusadr").val()
      },
      dataType: 'html' //設定該網頁回應的會是 html 格式
    }).done(function(data) {

      //成功的時候
      if (data == "yes") {
        alert("變更成功");
        //註冊新增成功，轉跳到登入頁面。
        window.location.href = "index.php";
        window.event.returnValue = false;
      } else{
        alert("變更失敗");
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
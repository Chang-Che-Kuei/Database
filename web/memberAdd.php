<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八爪章魚購物城</title>
<meta http-equiv="Content-Language" content="zh-tw" />
<link href="web.css" rel="stylesheet" type="text/css" />
<script language=javascript src="address.js"></script><!--引入郵遞區號.js檔案-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php include("header.php"); ?>
<div id="main">
  <div id="main1"></div>
  <div id="main2">
<? include("leftzone.php")?>
  </div>
  <div id="main3" align="center">
    <form id="memberadd" name="memberadd" method="post" action="">
      <table width="540" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="25" align="left"><img src="images/board03.gif" /></td>
          <td width="505" align="left" background="images/board04.gif">&nbsp; <span class="font_black">歡迎您填妥資料，加入成為網站會員~~</span></td>
          <td width="10" align="right"><img src="images/board05.gif" width="10" height="28" /></td>
        </tr>
      </table>
      <table width="540" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td width="82" height="30" align="right" class="board_add">姓名：</td>
          <td width="458" align="left" class="board_add"><label>
            <input type="text" name="user_name" id="user_name" />
          </label><span class="font_red">* </span></td>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">E-mail：</td>
          <td align="left" class="board_add"><label>
            <input name="user_email" type="text" id="user_email" size="35" />
          </label><span class="font_red">* </span><br />
          <span class="font_black">請勿使用會檔信的yahoo、pchome信箱，以免收不到註冊信</span></td>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">密碼：</td>
          <td align="left" class="board_add">
            <label>
              <input name="user_password" type="password" id="user_password" size="15" />
            </label><span class="font_red">* </span>
        </td>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">確認密碼：</td>
          <td align="left" class="board_add"><label>
            <input name="repassword" type="password" id="repassword" size="15" />
			  </label><span class="font_red">* </span>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">性別：</td>
          <td align="left" class="board_add"><label>
            <input name="user_sex" type="radio" id="radio" value="0" checked="checked" />
          男
          <input type="radio" name="user_sex" id="radio" value="1" />
          女&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
          </td>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">生日：</td>
          <td align="left" class="board_add">
          <select name="year" id="year">
             <option>年</option>
            <script language="javascript" type="text/javascript">
                   var watch=new Date();
                   var thisYear=watch.getFullYear();
				   for(y=1900;y<=thisYear;y++){
                       document.write("<option value='"+y+"'>"+y+"</option>")
	                  }
	           </script>
          </select>

          <select name="month" id="month">
            <option>月</option>
            <script language="JavaScript" type="text/JavaScript">
                   for(m=01;m<=12;m++){
                       document.write("<option value='"+m+"'>"+m+"</option>")
	                  }
	           </script>
           </select>

           <select name="day" id="day">
            <option>日</option>
             <script language="JavaScript" type="text/JavaScript">
                   for(d=01;d<=31;d++){
                       document.write("<option value='"+d+"'>"+d+"</option>")
	                  }
	           </script>
          </select>
          </td>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">電話：</td>
          <td align="left" class="board_add"><label>
            <input type="text" name="phone" id="phone" />
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
                          <input id="cuszip" name="cuszip" size="5" maxlength="5" readonly="readOnly" />
          </td>
        </tr>
        <tr>
          <td height="30" align="right" class="board_add">地址：</td>
          <td align="left" class="board_add"><span class="bs">
            <input name="cusadr" type="text" id="cusadr" value="" size="60" />
          </span></td>
        </tr>
        <tr>
          <td height="40" colspan="2" align="center"><label>
            <input type="submit" id="submit" value="送出資料" />
            <input type="reset" name="button2" id="button2" value="重設" />
			<input name="hiddenField" type="hidden" id="regd" value="<?php date_default_timezone_set('Asia/Taipei'); echo date(" Y-m-d ");?>">
          </label></td>
        </tr>
      </table>
    </form>
  </div>
  <div id="main4"></div>
</div>
<?php include("footer.php"); ?>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function() {
    $("#user_email").keyup(function() {
      if ($(this).value != "") {
        //非空
        //$.ajax 是 jQuery 的方法，裡面使用的是物件。
        $.ajax({
          type: "POST", //表單傳送的方式 同 form 的 method 屬性
          url: "check_user_email.php", //目標給哪個檔案 同 form 的 action 屬性
          data: { //為要傳過去的資料，使用物件方式呈現，因為變數key值為英文的關係，所以用物件方式送。ex: {name : "輸入的名字", password : "輸入的密碼"}
            'n': $(this).val() //代表要傳一個 n 變數值為，username 文字方塊裡的值
          },
          dataType: 'html' //設定該網頁回應的會是 html 格式
        }).done(function(data) {
          //成功的時候
          //console.log(data); //透過 console 看回傳的結果
          if (data == "yes") {
            alert("email重複，無法註冊");
            //把註冊按鈕加上 disabled 不能按，在bootstrap裡 disabled 類別可以讓該元素無法操作
            $("#submit").attr('disabled', true);
            if($(".alert").length<=0)
            {
              $("#user_email").after('<div class="alert alert-danger" role="alert"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="sr-only">Error:</span>Enter a valid email address ');
            }
          } else {
            $("#submit").attr('disabled', false);
            $(".alert").remove();
          }
        }).fail(function(jqXHR, textStatus, errorThrown) {
          //失敗的時候
          alert("有錯誤產生，請看 console log");
          console.log(jqXHR.responseText);
        });
      } else {
        //不檢查
      }
    });
	var mark = $('input:radio:checked').val();
	$("input:radio").on("click", function() {
       mark = $(this).val();
    });
  $("#memberadd").submit(function() {
	 var p=memberadd.user_password.value;
	if(p.localeCompare(memberadd.repassword.value))
	{
		alert("密碼不一致!!");
		return;
	}
	else if(memberadd.user_name.value=='')
	{
		alert("請輸入姓名!!");
		return;
	}
	else if(memberadd.user_email.value=='')
	{
		alert("請輸入電子郵件!!");
		return;
	}
	else if(memberadd.user_password.value=='')
	{
		alert("請輸入密碼!!");
		return;
	}
    //使用 ajax 送出
    $.ajax({
      type: "POST",
      url: "add_user.php",
      data: {
        un: $("#user_name").val(), //使用者帳號
        sex: mark,//
        email: $("#user_email").val(), //
        pw: $("#user_password").val(),
        bd_y: $("#year").val(),
        bd_m: $("#month").val(),
        bd_d: $("#day").val(),
        regd: $("#regd").val(),
		  ph: $("#phone").val(),
		  ad: $("#cusadr").val()
      },
      dataType: 'html' //設定該網頁回應的會是 html 格式
    }).done(function(data) {

      //成功的時候
      if (data == "yes") {
        alert("註冊成功!送您200元禮券!");
        //註冊新增成功，轉跳到登入頁面。
        window.location.href = "index.php";
        window.event.returnValue = false;
      } else{
        alert("註冊失敗，請與系統人員聯繫");
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
</body>
</html>

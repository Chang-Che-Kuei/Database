<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，因為此檔案放在 admin 裡，要找到 db.php 就要回上一層 ../php 裡面才能找到
require_once 'Connections/db.php';
?>
   <link href="web.css" rel="stylesheet" type="text/css" />
    <table width="199" border="0" cellspacing="0" cellpadding="0" background="images/memberzone2.gif">
      <?php if(!isset($_SESSION['is_login']) || !($_SESSION['is_login']))
	echo '
      <tr>
        <td><img src="images/memberzone1.gif" width="199" height="40" /></td>
      </tr>
      <tr>
        <td align="center">
        <form id="memberLogin" name="memberLogin" method="post">
        <table width="175" border="0" cellspacing="0" cellpadding="0">
          <div id="test">
            
          </div>
          <tr>
            <td width="36" height="20" valign="middle">帳號</td>
            <td width="78"><label>
              <input name="email" type="text" class="inputstyle1" id="email" placeholder="email" />
            </label></td>
            <td width="61" rowspan="2" valign="middle"><label>
              <input type="submit" name="submit" id="submit" />
            </label></td>
          </tr>
          <tr>
            <td height="20" valign="middle">密碼</td>
            <td><label>
              <input name="password" type="password" class="inputstyle1" id="password" placeholder="password" />
            </label></td>
            </tr>
        </table>
        </form>
       </td>
      </tr>
      <tr>
        <td align="center"><a href="memberAdd.php"><img src="images/memberzonebtn1.gif" width="79" height="19" border="0" /></a></td>
      </tr>
      <tr>
        <td><img src="images/memberzone3.gif" width="199" height="10" /></td>
      </tr>
    </table>';?>
     <?php 
	 if($_SESSION['is_login'])
	 {
		echo '
      <tr>
       <table width="199" border="0" cellspacing="0" cellpadding="0" background="images/memberzone2.gif">
       <tr>
       		<td><img src="images/memberzone1.gif" width="199" height="40" /></td>
       	</tr>
       	<tr>
       		<td height="20" align="center" valign="top">親愛的會員';
		if($_SESSION['is_login'])	echo $_SESSION["login_user"]["m_name"];
		if($_SESSION['is_login']) echo '您好';
		$cn = mysqli_query($_SESSION['link'], "SELECT COUNT(`member_ID`) FROM `coupon` WHERE `member_ID`='{$_SESSION['login_user']['member_ID']}'");
	     $cn= mysqli_fetch_assoc($cn);
		 echo "</br>您尚有{$cn['COUNT(`member_ID`)']}張優惠券</td></tr>";
       	echo '<tr>
       		<td align="center" height="10">
       		<img src="images/memberzone4.gif" width="166" height="2" />
       		</td>
       	</tr>
       	<tr>
       		<td align="center">';
	 };
		if($_SESSION['is_login']&&$_SESSION["login_user"]['is_admin']==1)
			echo '
       		<a href="admin/admin.php"><img src="images/memberzonebtn7.gif" border="0" /></a>
       		<br />';
		if($_SESSION['is_login'])
			echo '
       		<a href="shopcart_myorder.php"><img src="images/memberzonebtn6.gif" border="0" /></a>
       		<br />
       		<a href="memberUpdate.php"><img src="images/memberzonebtn4.gif" width="79" height="19" border=">" /></a>
       		<br />
       		<a href="logout.php"><img src="images/memberzonebtn5.gif" width="86" height="19" border="0" /></a></td>
       	</tr>
       	<tr>
       		<td>
       		<img src="images/memberzone3.gif" width="199" height="10" /></td>
       	</tr>
        </table>
        <td align="center" height="10"><img src="images/memberzone4.gif" width="166" height="2" /></td>
      </tr>';?>
  <br />
   <div align="center"><a href="shopcart_show.php"><img src="images/btn_car1.gif" width="84" height="18" border="0" /></a></div> 
    <br />
    <form id="shopSearch" name="shopSearch" method="get" action="search.php">
    <table width="180" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="61" rowspan="2" align="right"><img src="images/shopsearch01.gif" width="45" height="43" /></td>
        <td width="98"><img src="images/shopsearch02.gif" width="54" height="21" /></td>
        <td width="21">&nbsp;</td>
      </tr>
      <tr>
        <td><label>
          <input name="keyword" type="text" class="inputstyle2" id="keyword" />
        </label><br /><a href="search_advanced.php">進階搜尋</a></td>
        <td valign="top"><label>
          <input type="image" name="imageField2" id="imageField2" src="images/shopsearchbtn.gif" />
        </label></td>
      </tr>
    </table>
    </form>


<!-- Scripts -->
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	  <script>
      //當文件準備好時，
      $(document).on("ready", function() {
				//當表單 sumbit 出去的時候
		$("#memberLogin").submit(function(){
				  //使用 ajax 送出 帳密給 verify_user.php
					$.ajax({
            type : "POST",
            url : "Connections/verify_user.php", //因為此 login.php 是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 verify_user.php
            data : {
              un : $("#email").val(), //使用者帳號
              pw : $("#password").val() //使用者密碼
            },
            dataType : 'html' //設定該網頁回應的會是 html 格式
          }).done(function(data) {
            //成功的時候
            console.log(data);
            if(data == "yes")
            {
              //註冊新增成功，轉跳到登入頁面。
				alert("登入成功!!");
              window.location.href = "index.php";
            }
            else
            {
			  document.getElementById("test").innerHTML='<td height="20" colspan="3" align="center" valign="middle" bgcolor="#FF0000" class="font_white">帳號或密碼錯誤，請重新登入!!</td>';
				  
              alert("登入失敗，請確認帳號密碼");
            }
            
          }).fail(function(jqXHR, textStatus, errorThrown) {
            //失敗的時候
            alert("有錯誤產生，請看 console log");
            console.log(jqXHR.responseText);
          });
	        //回傳 false 為了要阻止 from 繼續送出去。由上方ajax處理即可
          return false;
		});
      });
</script>
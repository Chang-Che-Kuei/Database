<?php 
	@session_start();

/**
 * 檢查資料庫有無該email
 */
function check_has_useremail($email)
{
	//宣告要回傳的結果
  $result = null;

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `member` WHERE `email` = '{$email}';";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) >= 1)
    {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 添加使用者
 */
function add_user_data($un,$sex,$email,$pw,$bd,$regd,$ph,$ad,$due_date)
{
	//宣告要回傳的結果
  $result = null;
	//先把密碼用md5加密
  $pw = md5($pw);
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "INSERT INTO `member` (`email`,`password`,`m_name`,`gender`, `phone`,`birthday`,`address`,`registration_date`) VALUE ('{$email}', '{$pw}','{$un}','{$sex}','{$ph}','{$bd}','{$ad}','{$regd}');";
  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);
  $q=mysqli_query($_SESSION['link'],"SELECT * FROM `member` ORDER BY member_ID DESC LIMIT 1");
  $new=mysqli_fetch_assoc($q);
  $sql2 = "INSERT INTO `coupon` (`member_ID`,`discount`,`due_date`) VALUE ('{$new['member_ID']}','200','{$due_date}');";
  $query2 = mysqli_query($_SESSION['link'],$sql2);
  //如果請求成功
	  
  if ($query&&$query2)
  {
      $result = true;
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }
	
  //回傳結果
  return $result;
}

/**
 * 檢查資料庫有無該使用者名稱
 */
function verify_user($username, $password)
{
  //宣告要回傳的結果
  $result = null;
  //先把密碼用md5加密
  $password = md5($password);
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `member` WHERE `email` = '{$username}' AND `password` = '{$password}'";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query)
  {
    //使用 mysqli_num_rows 回傳 $query 請求的結果數量有幾筆，為一筆代表找到會員且密碼正確。
    if(mysqli_num_rows($query) == 1)
    {
      //取得使用者資料
      $user = mysqli_fetch_assoc($query);
      
      //在session李設定 is_login 並給 true 值，代表已經登入
      $_SESSION['is_login'] = TRUE;
      //紀錄登入者的id，之後若要隨時取得使用者資料時，可以透過 $_SESSION['login_user_id'] 取用
      $_SESSION['login_user'] = $user;
      //回傳的 $result 就給 true 代表驗證成功
      $result = true;
    }
  }
  else
  {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

?>
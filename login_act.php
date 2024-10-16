<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

// var_dump(0000);

//POST値
$lid = $_POST["lid"]; //lid
$lpw = $_POST["lpw"]; //lpw

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
//* PasswordがHash化→条件はlidのみ！！
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND life_flg=0"); 
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();



//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5.該当１レコードがあればSESSIONに値を代入
//入力したPasswordと暗号化されたPasswordを比較！[戻り値：true,false]
$pw = password_verify($lpw, $val["lpw"]); //$lpw = password_hash($lpw, PASSWORD_DEFAULT);   //パスワードハッシュ化
if($pw){ 
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  $_SESSION["user_id"]   = $val['id']; // ユーザーIDをセッションに保存

//Login成功時（select.phpへ）
//   redirect("select.php");
// 管理者と特定メンバーのリダイレクト処理
if ($val['kanri_flg'] == "1") {
  redirect("select_manage.php"); // 管理者用ページ
} elseif ($val['member_flg'] == "1") {
  redirect("select_member.php"); // 特定メンバー用ページ
} else {
  redirect("select.php"); // 一般ユーザー用ページ
}
} else {
// Login失敗時
redirect("login.php");
}

exit(); // スクリプト終了


// パスワードの検証とリダイレクト
if ($val && password_verify($lpw, $val["lpw"])) {
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  $_SESSION["user_id"]   = $val['id'];

  if ($val['kanri_flg'] == "1") {
      redirect("select_manage.php");
  } elseif (isset($val['member_flg']) && $val['member_flg'] == "1") {
      redirect("select_member.php");
  } else {
      redirect("select.php");
  }
} else {
  $_SESSION['error'] = "ログインに失敗しました。IDまたはパスワードが正しくありません。";
  redirect("login.php");
}
exit();

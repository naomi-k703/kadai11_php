<?php
include("header.php"); // 共通ヘッダーの読み込み
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>USERデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/user_registration.css" rel="stylesheet">
  <style>div { padding: 10px; font-size: 16px; }</style>
</head>
<body>

<div class="container jumbotron">
  <h2>ユーザー登録ページ</h2>
  <form method="post" action="user_insert.php">
    <fieldset>
      <legend>ユーザー登録</legend>
      <label>名前：<input type="text" name="name" required></label><br>
      <label>Login ID：<input type="text" name="lid" required></label><br>
      <label>Login PW：<input type="password" name="lpw" required></label><br>
      <label>管理FLG：
        <input type="radio" name="kanri_flg" value="0" checked> 一般　
        <input type="radio" name="kanri_flg" value="1"> 管理者
      </label><br>
      <input type="submit" value="送信">
    </fieldset>
  </form>
</div>

</body>
</html>

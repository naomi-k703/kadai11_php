<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

// DB接続関数：db_conn()

// function db_conn(){
//     try {
//         $db_name =  '-------';            //データベース名
//         $db_host =  '-------';  //DBホスト
//         $db_id =    '-------';                //アカウント名(登録しているドメイン)
//         $db_pw =    '-------';           //さくらサーバのパスワード
    
//         $server_info = 'mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host;
//         $pdo = new PDO($server_info, $db_id, $db_pw);
    
//          return $pdo;
//       } catch (PDOException $e) {
//         exit('DB Connection Error:' . $e->getMessage());
//       }
// }

// //DB接続関数：db_conn()
function db_conn(){
  try {
      $db_name = "gs_db";    //データベース名
      $db_id   = "root";      //アカウント名
      $db_pw   = "";          //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
      $db_host = "localhost"; //DBホスト
      return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
  } catch (PDOException $e) {
      exit('DB Connection Error:'.$e->getMessage());
  }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:".$error[2]);
    }

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
  }

  //DB接続用の関数

//SessionCheck(スケルトン)
function sschk(){
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    exit("Login Error");
 }else{
    session_regenerate_id(true); //SESSION KEYを入れ替えます！
    $_SESSION["chk_ssid"] = session_id();
 }

}

//ログインが切れたら、ログイン画面に飛ばす
//認証ユーザー






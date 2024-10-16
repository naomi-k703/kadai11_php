<?php
session_start(); // セッション開始

//1. POSTデータ取得
$user_id = $_SESSION["user_id"]; // セッションから user_id を取得

$username = isset($_POST["username"]) ? $_POST["username"] : '';
$employee_number = isset($_POST["employee_number"]) ? $_POST["employee_number"] : '';
$department = isset($_POST["department"]) ? $_POST["department"] : '';
$position = isset($_POST["position"]) ? $_POST["position"] : '';
$gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';

// options のチェック
$options = isset($_POST['options']) ? implode(",", $_POST['options']) : '';

// naiyou の取得
$naiyou = isset($_POST['naiyou']) ? $_POST['naiyou'] : '';

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("
    INSERT INTO gs_an_table_TEST(
        user_id, username, employee_number, department, position, gender, email, naiyou, options, indate
    ) 
    VALUES(
        :user_id, :username, :employee_number, :department, :position, :gender, :email, :naiyou, :options, sysdate()
    )
");

$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':employee_number', $employee_number, PDO::PARAM_INT);
$stmt->bindValue(':department', $department, PDO::PARAM_STR);
$stmt->bindValue(':position', $position, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$stmt->bindValue(':options', $options, PDO::PARAM_STR);

// 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError: " . $error[2]);
} else {
    header("Location: select.php");
    exit();
}
?>

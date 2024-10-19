<?php
session_start();
include "funcs.php"; // 関数ファイルを読み込み
sschk(); // セッションチェック

$name = htmlspecialchars($_SESSION["name"]);
$kanri_flg = $_SESSION["kanri_flg"];
?>

<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <span><?= $name ?> さん、こんにちは！</span>

                <!-- ログインユーザーに応じたリンクの表示 -->
                <?php if ($kanri_flg == 1): ?>
                    <a class="navbar-brand" href="user.php">USERデータ登録</a>
                    <a class="navbar-brand" href="select_manage.php">管理者用ページ</a>
                    <a class="navbar-brand" href="select_member.php">特定ページ</a>
                <?php else: ?>
                    <a class="navbar-brand" href="select_member.php">ユーザーページ</a>
                    <a class="navbar-brand" href="strength_analysis.php">自己分析の管理ページ</a>
                <?php endif; ?>

                <!-- 共通リンク -->
                <a class="navbar-brand" href="user.php">USERデータ登録</a>
                <a class="navbar-brand" href="logout.php">ログアウト</a>
            </div>
        </div>
    </nav>
</header>

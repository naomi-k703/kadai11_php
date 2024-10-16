<?php
include("header.php"); // 共通ヘッダーを読み込み

// DB接続
$pdo = db_conn();

// 全データ取得クエリ
$sql = "SELECT id, username, employee_number, position, gender, email, naiyou, options FROM gs_an_table_TEST";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
}

$values = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($values, JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>管理者ページ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container jumbotron">
    <h2>全データ一覧</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ユーザー名</th>
                <th>社員番号</th>
                <th>役職</th>
                <th>性別</th>
                <th>Email</th>
                <th>内容</th>
                <th>オプション</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($values as $v): ?>
                <tr>
                    <td><?= htmlspecialchars($v["id"]) ?></td>
                    <td><?= htmlspecialchars($v["username"]) ?></td>
                    <td><?= htmlspecialchars($v["employee_number"]) ?></td>
                    <td><?= htmlspecialchars($v["position"]) ?></td>
                    <td><?= htmlspecialchars($v["gender"]) ?></td>
                    <td><?= htmlspecialchars($v["email"]) ?></td>
                    <td><?= htmlspecialchars($v["naiyou"]) ?></td>
                    <td><?= htmlspecialchars($v["options"]) ?></td>
                    <td>
                        <a href="detail.php?id=<?= $v['id'] ?>" class="btn btn-warning btn-sm">[更新]</a>
                        <a href="delete.php?id=<?= $v['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？');">[削除]</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    const data = JSON.parse('<?= addslashes($json); ?>');
    console.log(data);
</script>

</body>
</html>

<?php include("memberheader.php"); ?>

<h2>新しい強みの追加</h2>
<form action="add_strength_action.php" method="POST">
    <div class="mb-3">
        <label for="asked" class="form-label">誰に聞きましたか？</label>
        <select id="asked" name="asked" class="form-select">
            <option value="">選択、または入力してください</option>
            <option value="同僚">同僚</option>
            <option value="上司">上司</option>
            <option value="部下">部下</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="strength" class="form-label">内容を記入してください</label>
        <textarea id="strength" name="strength" class="form-control" rows="3" placeholder="例：集中力がある、周りがよく見えている"></textarea>
    </div>

    <div class="mb-3">
        <label for="register_time" class="form-label">何番目に登録しますか？</label>
        <select id="register_time" name="register_time" class="form-select">
            <option value="1">1番目</option>
            <option value="2">2番目</option>
            <option value="3">3番目</option>
            <option value="4">4番目</option>
            <option value="5">5番目</option>
        </select>
    </div>

    <button type="submit" class="btn">登録</button>
</form>

<?php include("footer.php"); ?>

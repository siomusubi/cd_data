<h2 class="h3 text-dark mb-4">CDデータ登録</h2>
<form action="create.php" method="POST">
    <?php if (count($errors)) : ?>
        <ul class="text-danger">
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="form-group">
        <label for="title">アルバム名</label>
        <input type="text" class="form-control" name="title" id="title" value="<?php echo $cd_log['title'] ?>">
    </div>
    <div class="form-group">
        <label for="artist">アーティスト名</label>
        <input type="text" class="form-control" name="artist" id="artist" value="<?php echo $cd_log['artist'] ?>">
    </div>
    <div class="form-group">
        <label for="release_date">発売日</label>
        <input type="date" class="form-control" name="release_date" id="release_date" value="<?php echo $cd_log['release_date'] ?>">
    </div>
    <div class="form-group">
        <label for="score">評価</label>
        <input type="number" class="form-control" name="score" id="score" value="<?php echo $cd_log['score'] ?>">
    </div>
    <div class="form-group">
        <label for="summary">感想</label>
        <textarea type="text" class="form-control" name="summary" id="summary" rows="10"><?php echo $cd_log['summary'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-4">登録</button>
</form>

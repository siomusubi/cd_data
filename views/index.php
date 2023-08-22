<a class="btn btn-primary mb-4" href="new.php">CDを登録する</a>
<main>
    <?php if (count($cd_logs) > 0) : ?>
        <?php foreach ($cd_logs as $cd_log) : ?>
            <section class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="card-title h4 text-dark mb-3">
                        <?php echo escape($cd_log['title']); ?>
                    </h2>
                    <div class="small mb-3">
                        <?php echo escape($cd_log['artist']); ?>&nbsp;/&nbsp;
                        <?php echo escape($cd_log['release_date']); ?>&nbsp;/&nbsp;
                        <?php echo escape($cd_log['score']); ?>点
                    </div>
                    <p>
                        <?php echo nl2br(escape($cd_log['summary']), false); ?>
                    </p>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else : ?>
        <p>データが登録されていません</p>
    <?php endif; ?>
</main>

<?php

require_once __DIR__ . '/lib/mysqli.php';
require_once __DIR__ . '/lib/escape.php';

function listCd_logs($link)
{
    $cd_logs = [];
    $sql = 'SELECT id, title, artist, release_date, score, summary FROM cd_logs';
    $results = mysqli_query($link, $sql);

    while ($cd_log = mysqli_fetch_assoc($results)) {
        $cd_logs[] = $cd_log;
    }

    mysqli_free_result($results);

    return $cd_logs;
}

$link = dbConnect();
$cd_logs = listCd_logs($link);

$title = 'CDデータ一覧';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';

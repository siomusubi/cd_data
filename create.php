<?php

require_once __DIR__ . '/lib/mysqli.php';

function validate($cd_log)
{
    $errors = [];

    if (!strlen($cd_log['title'])) {
        $errors['title'] = 'アルバム名を入力してください';
    } elseif (strlen($cd_log['title']) > 500) {
        $errors['title'] = 'アルバム名は500文字以内で入力してください';
    }

    if (!strlen($cd_log['artist'])) {
        $errors['artist'] = 'アーティスト名を入力してください';
    } elseif (strlen($cd_log['artist']) > 500) {
        $errors['artist'] = 'アーティスト名は500文字以内で入力してください';
    }

    $dates = explode('-', $cd_log['release_date']);
    if (!strlen($cd_log['release_date'])) {
        $errors['release_date'] = '日付を入力してください';
    } elseif (count($dates) !== 3) {
        $errors['release_date'] = '正しい形式で日付を入力してください';
    } elseif (!checkdate($dates[1], $dates[2], $dates[0])) {
        $errors['release_date'] = '正しい日付を入力してください';
    }

    if ($cd_log['score'] < 1 || $cd_log['score'] > 5) {
        $errors['score'] = '評価は1〜5の整数で入力してください';
    }

    if (!strlen($cd_log['summary'])) {
        $errors['summary'] = '感想を入力してください';
    } elseif (strlen($cd_log['summary']) > 10000) {
        $errors['summary'] = '感想は10,000文字以内で入力してください';
    }

    return $errors;
}

function createCd_log($link, $cd_log)
{
    $sql = <<<EOT
INSERT INTO cd_logs (
    title,
    artist,
    release_date,
    score,
    summary
) VALUES (
    "{$cd_log['title']}",
    "{$cd_log['artist']}",
    "{$cd_log['release_date']}",
    "{$cd_log['score']}",
    "{$cd_log['summary']}"
)
EOT;

    $result = mysqli_query($link, $sql);
    if (!$result) {
        error_log('Error: fail to create cd_log');
        error_log('Debugging error: ' . mysqli_error($link));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cd_log = [
        'title' => $_POST['title'],
        'artist' => $_POST['artist'],
        'release_date' => $_POST['release_date'],
        'score' => $_POST['score'],
        'summary' => $_POST['summary']
    ];

    $errors = validate($cd_log);

    if (!count($errors)) {
        $link = dbConnect();
        createCd_log($link, $cd_log);
        mysqli_close($link);
        header("location: index.php");
    }
}

$title = 'CDデータ登録';
$content = __DIR__ . '/views/new.php';
include __DIR__ . '/views/layout.php';

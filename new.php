<?php

$cd_log = [
    'title' => '',
    'artist' => '',
    'release_date' => '',
    'score' => '',
    'summary' => ''
];

$errors = [];

$title = 'CDデータ登録';
$content = __DIR__ . '/views/new.php';
include __DIR__ . '/views/layout.php';

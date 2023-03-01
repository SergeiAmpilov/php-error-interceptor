<?php

if (PHP_MAJOR_VERSION < 8) {
    die('Need PHP version 8+ on server. Your version is ' . PHP_MAJOR_VERSION);
}

require_once dirname(__DIR__) . '/config/init.php';

$app = new \amp\App();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Error interceptor</title>
</head>
<body>
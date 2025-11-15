<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Page\Asset;

$staticRoot = '/www/site1/docs';

Asset::getInstance()->addCss($staticRoot . '/css/main.css');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= $staticRoot ?>/">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $staticRoot ?>/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $staticRoot ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="<?= $staticRoot ?>/assets/favicon/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= $staticRoot ?>/assets/favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $staticRoot ?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= $staticRoot ?>/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= $staticRoot ?>/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $staticRoot ?>/assets/favicon/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?php $APPLICATION->ShowHead(); ?>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
</head>
<body class="body">
<?php $APPLICATION->ShowPanel(); ?>


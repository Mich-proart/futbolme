<?php
if (!array_key_exists('id', $_GET)) {
    header('location: /');
} else {
    include '../src/Application/Helpers/DbHelper.php';
    include '../src/Application/Helpers/UrlHelper.php';
    $db = new \App\Application\Helpers\DbHelper();
    $urlHelper = new \App\Application\Helpers\UrlHelper($db);

    $urlTorneoGolaverage = $urlHelper->getUrlTorneo($_GET['id'], 'golaverage');

    header('location: ' . $urlTorneoGolaverage, true, 301);
}

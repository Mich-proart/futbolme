<?php
define('_FUTBOLME_', 1);

if (isset($_GET['pest'])) {
    $pestana = $_GET['pest'];
} else {
    $pestana = 'nacional';
}

header('location: /ascensos-y-descensos/' . $pestana, true, 301);

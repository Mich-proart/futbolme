<?php
if (array_key_exists('m', $_GET) && array_key_exists('id', $_GET)) {
    header('location: /geolocalidad/' . $_GET['m'] . '/' . $_GET['id'], true, 301);
} else {
    header('location: /');
}
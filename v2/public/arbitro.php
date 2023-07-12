<?php
if (array_key_exists('id', $_GET)) {
        header('location: /resultados-directo/arbitro/' . $_GET['id'], true, 301);
} else {
    header('location: /');
}
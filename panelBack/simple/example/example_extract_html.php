<?php
include_once('../simple_html_dom.php');

echo file_get_html('http://36electricistas.com/directorio/comercial-vicres')->plaintext;
?>
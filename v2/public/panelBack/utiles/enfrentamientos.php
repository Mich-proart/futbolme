<script async src="/js/highcharts.min.js"></script>
<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

$e1=$_POST['e1']??0;
$e2=$_POST['e2']??0;

if ($e1<1 || $e2<1){ die('Valores no válidos');}

if($e2<$e1){ 
    $f=$e2.'-'.$e1.'.json'; 
} else { 
    $f=$e1.'-'.$e2.'.json';
} 


imp($_POST['et1'].' - '.$_POST['et2']);
imp($f);

$enfrentamientos = enfrentamientos($e1, $e2,$_POST['et1'],$_POST['et2']);


//imp($enfrentamientos);
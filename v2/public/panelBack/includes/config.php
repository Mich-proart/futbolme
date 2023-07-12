<?php
session_start();


require_once 'funciones.php';
$mysqli = conectar();
$mysqliBase = conectarBase();
require_once 'consultas.php';
require_once 'consultasClub.php';
require_once 'post.php';

$comunidades=comunidades();
$catTorneos=catTorneos();
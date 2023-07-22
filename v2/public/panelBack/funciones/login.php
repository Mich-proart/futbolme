<?php 
require_once '../includes/config.php';
var_dump($_POST['trigger']);
var_dump($_POST['user']);
var_dump($_POST['password']);

$mysqli = conectar();
$consulta = "SELECT * FROM users WHERE email = 'futbolme@gmail.com' AND password = '$2y$13$7xTpryf3hzuQLLgR2lxmAOFddkZGEfnMsQsZshPSCFu4Atu7YrUiG' LIMIT 1;";    
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
foreach ($resultado as $key => $value) {
    if (password_verify('@Admin12345', $value['password'])) {
        echo "La contraseña es válida.";
    } else {
        echo "La contraseña es inválida.";
    }        
}
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
    if ((password_verify($_POST['password'], $value['password'])) && $_POST['user'] == $value['email']) {
        
        // Iniciamos session con un valor definido
        session_start();
        $_SESSION['user'] = $_POST['user'];
        header('Location: https://futbolme.com/panelBack/');
        die;
    } else {
        echo "La contraseña es inválida.";
    }        
}
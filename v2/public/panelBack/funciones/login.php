<?php 
require_once '../includes/config.php';
//if(isset($_POST['trigger'])){
    //var_dump($_POST['trigger']);
    //var_dump($_POST['user']);
    //var_dump($_POST['password']);
    $response = '';

    $mysqli = conectar();
    $consulta = "SELECT * FROM users;";    
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
    foreach ($resultado as $key => $value) {
        if ((password_verify($_POST['password'], $value['password'])) && $_POST['user'] == $value['email']) {
            // Iniciamos session con un valor definido
            session_start();        
            $_SESSION['user'] = $_POST['user'];       
            $response = 'true';
            die;
        } else {
            $response = 'false';
        }        
    }
    echo json_encode($response);
//}
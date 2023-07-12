<?php 
define('_FUTBOLME_', 1);
require_once '../config.php'; ?>

<?php 


if (!isset($_POST['username']) || empty($_POST['username'])) {
    header('Location:/index.php?n1=config&error=1');
    exit();
}
$username=$_POST['username'];
if (strlen($username)>20) { 
	header('Location:/index.php?n1=config&error=2');
    exit(); 
}

$clean = array();
$sql = array();
 
// Filtra el nombre. Solo caracteres alfabéticos.
if (ctype_alnum($_POST['username'])) {
    $username = $_POST['username'];
} else {
    header('Location:/index.php?n1=config&error=4');
    exit(); 
}
 
// Escapar el nombre


$mysqli = conectar();
$username = mysqli_real_escape_string($mysqli, $username);


actualizarNombre($username,$_SESSION['user_id']);
$_SESSION['username'] = $username;

header('Location:/index.php?n1=config&ok');
exit();
?>
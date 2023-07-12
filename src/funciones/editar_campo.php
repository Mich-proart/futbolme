<?php 
define('_FUTBOLME_', 1);
require_once '../../src/config.php';

$id = $_POST['id'];
$campo = $_POST['campo'];

    if (isset($_POST['modo'])) {
        switch ($campo) {
            case 0: $txtCampo = 'partidoAPI'; break;
            default: break;
        }
        $sql = 'UPDATE partido SET '.$txtCampo.'='.$_POST[$txtCampo].' WHERE id='.$id;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
    } else {
        ?>
	<form method="post" onsubmit="editar_campo_ok(event, $(this).serialize(),<?php echo $_POST['id']; ?>)">
	<input type="hidden" name="campo" value="<?php echo $_POST['campo']; ?>">
	<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
	<?php switch ($campo) {
            case 0: ?>
				<input type="hidden" name="modo" value="1">
				<br />partidoAPI:<input type="text" name="partidoAPI" size="6">
				<?php break;

            default:
                // code...
                break;
        } ?>
	<br /><input type="submit" name="modificar" value="modificar">
	</form>
	<?php
    }
?>



<?php 
define('_FUTBOLME_', 1);
require_once '../../src/config.php';

$id = $_POST['id'];
$partidoAPI = $_POST['partidoAPI'];

    if ($id > 0) {
        $sql = 'UPDATE partido SET partidoAPI='.$partidoAPI.' WHERE id='.$id;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        echo $sql;
    } else {
        ?>
	<form method="post" onsubmit="vincular_campo_ok(event, $(this).serialize(),<?php echo $partidoAPI; ?>)">
	<input type="hidden" name="partidoAPI" value="<?php echo $partidoAPI; ?>">
	ID partido en futbolme <input type="text" name="id" value="<?php echo $_POST['id']; ?>">
	<br /><input type="submit" name="vincular" value="vincular al <?php echo $partidoAPI; ?>">
	</form>
	<?php
    }
?>

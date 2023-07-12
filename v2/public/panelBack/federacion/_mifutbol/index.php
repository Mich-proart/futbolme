<html>
<body>

<form action="_00listar.php" method="post">
Listar Campeonatos...comunidad_id:<input type="text" name="comunidad_id" size="2"><br />
Listado de campeonatos.
<input type="submit" name="enviar">

</form>

<form action="_00selects.php" method="post">
Extraer Campeonatos...comunidad_id:<input type="text" name="comunidad_id" size="2"><br />
Va a la web de la federacion para extraer campeonatos
<input type="submit" name="enviar">

</form>

<form action="_00cargas.php" method="post">
Cargar Campeonatos...comunidad_id:<input type="text" name="comunidad_id" size="2"><br />
Lee el último json y comprueba si hay campeonatos nuevos
<input type="submit" name="enviar">

</form>
</body>
</html>
<html>
<body>
	<table>
		<tr>
			<td>
			<a href="partidosHoy.php" title="">Partidos hoy</a><br />
			generarPartidosDiaFed(); Contados partidos y cabeceras de federación<br />
			cabecerasFed(); condicion= visible mayor que 99<br />
			$ids_apis=torneosApiBetHoy(); los ides de partidos de betsapi gestionados en futbolme<br />
			partidosApiBetHoy; si hay $ids_apis se va a betsapi a extraer los partidos y se guarda un json en json/betsapi 
			</td>
			<td>
			<a href="cargador.php" title="">Cargador</a>
			</td>
			<td></td>
	</tr>
	<tr><td><a href="generarMenu.php" title="">Generar menú</a></td>
		<td><a href="urlTorneos.php" title="">Url torneos</a></td>
		
	</tr>
	</table>

	<table>
		<tr>
			<td valign="top">Partidos dia
				<?php 
				$path = '../../json/index.json';

			    //$json = file_get_contents($path);
			    $ch = curl_init($path);     
			    curl_setopt($ch, CURLOPT_FAILONERROR, true);
			    curl_setopt($ch, CURLOPT_HEADER, 0);    
			    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
			    curl_setopt($ch, CURLOPT_ENCODING, "" );
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
			    curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
			    curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
			    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
			    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
			    $json = curl_exec($ch);
			    print_r(curl_getinfo($ch));
			    if(curl_errno($ch)) {
			        echo curl_error($ch);
			        return 'sin proxy:  - ERROR '.curl_error($ch);
			    } 
			    curl_close($ch);

			    $partidosDia = json_decode($json, true);
			    echo '<pre>';
			    print_r($partidosDia);
			    echo '</pre>';
				?>
			</td>
			<td valign="top">Partidos directos
			<?php 
				$path = '../../json/directos.json';
			    //$json = file_get_contents($path);

			    $ch = curl_init($path);     
			    curl_setopt($ch, CURLOPT_FAILONERROR, true);
			    curl_setopt($ch, CURLOPT_HEADER, 0);    
			    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
			    curl_setopt($ch, CURLOPT_ENCODING, "" );
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
			    curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
			    curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
			    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
			    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
			    $json = curl_exec($ch);
			    print_r(curl_getinfo($ch));
			    if(curl_errno($ch)) {
			        echo curl_error($ch);
			        return 'sin proxy:  - ERROR '.curl_error($ch);
			    } 
			    curl_close($ch);

			    $directos = json_decode($json, true);
			    echo '<pre>';
			    print_r($directos);
			    echo '</pre>';
				?>
					
				</td>
			<td valign="top">Partidos sueltos
				<?php 
				$path = '../../json/partidosSueltos.json';
		        //$json = file_get_contents($path);

		        $ch = curl_init($path);     
			    curl_setopt($ch, CURLOPT_FAILONERROR, true);
			    curl_setopt($ch, CURLOPT_HEADER, 0);    
			    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
			    curl_setopt($ch, CURLOPT_ENCODING, "" );
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
			    curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
			    curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
			    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
			    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
			    $json = curl_exec($ch);
			    print_r(curl_getinfo($ch));
			    if(curl_errno($ch)) {
			        echo curl_error($ch);
			        return 'sin proxy:  - ERROR '.curl_error($ch);
			    } 
			    curl_close($ch);

		        $sueltos = json_decode($json, true);
		        echo '<pre>';
			    print_r($sueltos);
			    echo '</pre>';
				?>

			</td>
		</tr>
	</table>
</body>
</html>

    

     
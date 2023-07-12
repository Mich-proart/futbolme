<?php 


$temporada_id = $_GET['id']??1;

if (!is_numeric($temporada_id)) {
    header('Location:/');
}



$f = '../json/temporada/'.$temporada_id.'/tipo.json';
if (!@file_exists($f)) { 
    die('no disponible');
} 

$json = file_get_contents($f);
$datos = json_decode($json, true);

$clasificacion=$datos['clasificacion'];



?>


<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content="img/logo.png" />
<meta name="ga-site-verification" content="UPgOhn36Odw90H6CQqECMmTG" />
<meta name="description" content="Calcular golaverage - futbolme.com" />
<meta property="og:description" content="calcular, golaverage, futbolme" />

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Dosis:wght@200;300;400;500;523;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/bs4.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/fm.css?v=101">
    <link rel="stylesheet" href="static/css/comunidades.min.css?v=101">
    <link rel="stylesheet" href="static/css/paises.min.css?v=101">
    <link rel="stylesheet" href="static/fontawesome/css/all.css">
    
    
    <script type="text/javascript" src="static/jquery/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="static/popper/popper.js"></script>
    <script async src="static/js/bootstrap.min.js"></script>
    <script async src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script async src="static/js/bootstrap.bundle.min.js"></script>
    <script async src="static/js/comunsite.min.js?v=101"></script>
    <script async src="static/js/notificaciones.js?v=101"></script>
    <script type='text/javascript' src="static/js/highcharts.min.js"></script>
    <script async src="static/js/exporting.js"></script>
    <script async src="static/js/ajax.js?v=101"></script>
    <script src="static/js/global.js?v=101"></script>
    <script async src="static/js/hambuerguer-menu-multilevel-hayleyt.js?v=101"></script>

<script data-ad-client="ca-pub-2316935358389492" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



	<title>Comprobar golaverage particular - Simular clasificación </title>
<meta name="robots" content="noindex,follow">
</head>
<body style="background-color:white">
<div class="col-xs-12" style="float: left">
<div style="float:left">

	

	<div id="laclasi">
	<h4 class="text-center"><a href="https://futbolme.com">futbolme.com</a></h4>
		<table class="table">
			<thead>
	            <tr class="darkgreenbox">
		                <th class="text-center">P</th>
		                <th class="text-center">Equipo</th>
		                <th class="text-center">P<span class="hidden-xs">TO</span>S</th>
		                <th class="text-center">J<span class="hidden-xs">U</span></th>
		                <th class="text-center hide">GA</span></th>
		                <th class="text-center hide">EM</span></th>
		                <th class="text-center hide">PE</span></th>
		                <th class="text-center"><span class="hidden-xs">G</span>F</th>
		                <th class="text-center"><span class="hidden-xs">G</span>C</th>
		                <th class="text-center">D<span class="hidden-xs">I</span>F</th>
		        </tr>
		    </thead>
		    <tbody class="whitebox">
		        <?php 

                foreach ($clasificacion['clasificacionFinal'] as $fila) {
                    $color_fondo = 'white';
                    if (isset($fila['preferente'])) {
                        if (1 == $fila['preferente']) {
                            $color_fondo = 'yellow';
                        }
                    } 
                    $rutaEscudo=rutaEscudo($fila['club_id'], $fila['equipo_id']);
                    ?>
		        <tr data-id="<?php echo $fila['equipo_id']; ?>">
		        	<td class="text-center nopadding" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
	        		<td id="<?php echo $fila['equipo_id']; ?>" data-posicion="<?php echo $fila['posicion']; ?>" class="nopadding">
	        		 <img src="<?php echo $rutaEscudo?>" alt="equipo" style="width:18px; height:20px">
                     <b><?php echo $fila['nombreCorto']; ?></b>
                     <span id="negrita<?php echo $fila['equipo_id']; ?>" class="add-tarjeta boldfont" style="cursor:pointer; font-size: 20px; font-weight: bold; color:red">+</span>       				
	        		</td>
	        		<td class="text-center nopadding" style="background-color:<?php echo $color_fondo; ?>">
	        		<span><b><?php echo $fila['puntos']; ?></b></span>
	        		</td>
	        		<td class="text-center nopadding">
	        		<span><?php echo $fila['jugados']; ?></span>
 	        		</td>
	        		<td class="text-center nopadding hide">
	        		<span><?php echo $fila['ganados']; ?></span>
	        		</td>
	        		<td class="text-center nopadding hide"><span><?php echo $fila['empatados']; ?></span>
	        		</td>
	        		<td class="text-center nopadding hide"><span><?php echo $fila['perdidos']; ?></span>
	        		</td>
	        		<td class="text-center nopadding"><span><?php echo $fila['gFavor']; ?></span>
	        		</td>
	        		<td class="text-center nopadding"><span><?php echo $fila['gContra']; ?></span>
	        		</td>
	        		<td class="text-center nopadding"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
		        </tr>
		        

		         <?php
                } ?>	         
	        		
	        </tbody>
		</table>

		
		
	</div>

</div>
<div style="float:right; padding: 10px" class="col-xs-12">

	<div id="pizarra" style="float:right; max-width: 700px">
		<div class="text-center">
		<h4>Pulsa en el símbolo + de los equipos que quieras comparar en su golaverage particular.</h4>

		<button type="button" class="btn btn-success reiniciar">Reiniciar</button>
		</div>

	    <div id="seleccionados" class="hide"></div>
	    <div id="enfrentamientos"></div>
	    <div id="pizarra-equipos" class="nopadding" style="float:left;width:100%"></div>

	    <div id="simulo" class="text-center" style="display:none">
	    <button type="button" class="btn btn-success" onclick="_simular()">Simular clasificación</button>
		<div><h4>Completa los resultados para ver una simulacíon de la clasificación según tus pronósticos.</h4></div>
		</div>

        
    </tr> 
	</div>


</div>
</div>
<?php



function rutaEscudo($club_id, $equipo_id){
    if ($equipo_id!=718 && $equipo_id!=672){
        $ruta='/static/img/club/escudo'.$club_id.'.png';
    } else {
        $ruta='/static/img/equipos/escudo'.$equipo_id.'.png';
    }
    return $ruta;
}

?>
<script>

    function _llenarL(id,equipo,id2){
        var l=$('#l-'+id2+'-'+id).val();
        console.log(l);
        $(".l"+id).val(l);
        $(".l"+id).css("color","blue");
        $(".l"+id).text(l);
    };

    function _llenarV(id,equipo,id2){
        var v=$('#v-'+id2+'-'+id).val();
        console.log(v);
        $(".v"+id).val(v);
        $(".v"+id).css("color","blue");
        $(".v"+id).text(v);
    };

    function _simular(){

        var datos = [];

        var t = $('#seleccionados').text();
        var seleccionados = t;
        var te=t.substr(1);
        var t = te.split('-');
        $.each(t, function (index, value) {


            $('#e-'+value+' >tbody >tr').each(function (){
                var row = $(this);
                var pdo =  $(this).attr('id');

                row.each(function (){
                    if (pdo>0) {
                        var idl = $(".l-"+pdo,this).attr('data-local');
                        var idv = $(".v-"+pdo,this).attr('data-visitante');
                        var val1= $("#l-"+value+"-"+pdo).val();
                        var val2= $("#v-"+value+"-"+pdo).val();
                        if (isNaN(val1)) val1 = ":";
                        if (isNaN(val2)) val2 = ":";
                        datos.push(pdo+"-"+idl+"-"+idv+"-"+val1+"-"+val2);
                    }
                });


            });


        });

        //console.log(datos);



        $.ajax({
            success: function(){
                var xmlhttp;
                if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                } else{// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        document.getElementById("clasi").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("POST","/_especial/recalcula_1.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("id="+seleccionados+"&t="+<?php echo $temporada_id; ?>+"&d="+datos);
            },
            error: function(){
                console.log('ko');
            }
        });



        $.ajax({
            success: function(){
                var xmlhttp;
                if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                } else{// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        document.getElementById("laclasi").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("POST","/_especial/simular.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("datos="+datos+"&t="+<?php echo $temporada_id; ?>);
            }
        });

    }

    _add_tarjeta = function(){
        var row = $(this).parent().parent().first();
        var id = row.attr('data-id');
        var n = row.children('#'+id).text();
        var posicion = row.children('#'+id).attr('data-posicion');

        var nombre = n.replace("+", "");

        $('#negrita'+id).hide();
        $('#simulo').show();

        var t = $('#seleccionados').text();
        $('#seleccionados').text(t+'-'+id);
        var seleccionados= t+'-'+id;


        $('#pizarra-equipos').append('<div id="bloque-'+id+'" data-valor="'+id+'" style="float:left;min-width:33%;"></div>');
        var tr = $('#bloque-'+id);
        tr.append('<div class="equipo marco boldfont" data-id-equipo="'+id+'" style="background-color:gainsboro; margin:2px">'+nombre+'<span class="remove-tarjeta pull-right" style="cursor:pointer">&times;</span><br /><div id="calendario-'+id+'"></div></div>');
        $('#pizarra-equipos .remove-tarjeta').bind('click', _remove_tarjeta);
        $.ajax({
            success: function(){
                var xmlhttp;
                if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                } else{// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        document.getElementById("calendario-"+id).innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("POST","/_especial/calendario.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("id="+id+"&t="+<?php echo $temporada_id; ?>);
            },
            error: function(){
                console.log('ko');
            }
        });

        $.ajax({
            success: function(){
                var xmlhttp;
                if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                } else{// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        document.getElementById("enfrentamientos").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("POST","/_especial/enfrentamientos.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("id="+seleccionados+"&t="+<?php echo $temporada_id; ?>);
            },
            error: function(){
                console.log('ko');
            }
        });





    }

    _remove_tarjeta = function(){
        tr = $(this).parent().parent();
        id = tr.attr('data-valor');
        var t = $('#seleccionados').text();
        var nueva = t.replace("-"+id, "");
        $('#seleccionados').text(nueva);
        $('#negrita'+id).show();
        $.ajax({
            success: function(){
                var xmlhttp;
                if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                } else{// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                        document.getElementById("enfrentamientos").innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("POST","/_especial/enfrentamientos.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("id="+nueva+"&t="+<?php echo $temporada_id; ?>);
            },
            error: function(){
                console.log('ko');
            }
        });

        tr.remove();


    }

    $('.reiniciar').click(function() {
        location.reload();
    });

    $('.add-tarjeta').on('click', _add_tarjeta);
    $('.remove-tarjeta').on('click', _remove_tarjeta);

</script>
</body>
</html>
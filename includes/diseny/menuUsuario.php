<?php
$pg='/index.php?fm=1';
?>

<ul class="col-xs-12 nav nav-pills h40 text-center">  
  <li class="dropdown h40" style='margin-left: 5px;'>
    <a class="dropdown-toggle btn btn-success boldfont text-center" data-toggle="dropdown" href="#">Mis equipos</a>
      <ul class="dropdown-menu" style='margin-left: 5px;'>
      <?php if ($equiposU > 0) {
          foreach ($_SESSION['equipos'] as $key => $e) {
              $colorFondo = 'white';
              $txtCategoria = $e['categoria'];
              if (!isset($_GET['equipo']) && 0 == $key) {
                  $_SESSION['equipo'] = $key.','.$e['nombre'].','.$e['club_id'];
                  $colorFondo = 'gainsboro';
              }
              if (isset($_GET['equipo'])) {
                  $_SESSION['equipo'] = $_GET['equipo'];
                  $ee = explode(',', $_GET['equipo']);
                  if ($equipo_id == $ee[0]) { $colorFondo = 'gainsboro'; }
              } 
              $rutaEscudo=rutaEscudo($e['club_id'], $key);?>					                
              <li style="background-color: <?php echo $colorFondo; ?>">
                <div class="col-xs-12">
                  <a class="h40" href='/index.php?equipo=<?php echo $key?>,<?php echo $e['nombre']?>,<?php echo $e['club_id']?>'>
                <img class="col-xs-2" style='padding:3px;' src='<?php echo $rutaEscudo?>' width='32' height='40' alt="escudo">
                <span class="col-xs-10 boldfont"><?php echo $e['nombre']; ?></span>
              </a>
                <span class="col-xs-10"><?php echo $txtCategoria; ?></span>        
                <?php foreach ($e['torneos'] as $k => $v) { 
                  if ($k==442){ continue; } //amistosos?>
                  <div class="marco clear"><?php echo $v['nombre']; ?></div>
                <?php } ?>
                </div>        
              </li>
              <?php }
      } ?>
              <li class="h40"><div class="col-xs-12"><div class="marco" style="background-color: yellow"><a href="/index.php?n1=config">Añadir, ordenar o quitar equipos</a></div></div></li>
      </ul>
  </li>
<?php 

if (isset($_GET['n2'])) {$n2 = $_GET['n2'];} else {$n2 = 'TusEquipos';}
$pg0 = $pg.'&n1=PartidosHoy';

/*$fecha = new \DateTime();
$dia = $fecha->format('Y-m-d');
$diaAnterior = \DateTime::createFromFormat('Y-m-d', $dia);
$diaSiguiente = \DateTime::createFromFormat('Y-m-d', $dia);
$diaAnterior = $diaAnterior->modify('-1 day')->format('Y-m-d');
$diaSiguiente = $diaSiguiente->modify('+1 day')->format('Y-m-d');*/

  ?>
  <li class="dropdown h40">
    <a class="dropdown-toggle btn btn-success boldfont text-center" data-toggle="dropdown" href="#">Hoy</a>
    <ul class="dropdown-menu" style='margin-left: -60px'>
      <li class="h40"><a href="<?php echo $pg0; ?>&n2=TusEquipos">Tus equipos <?php echo $tusequipostxt; ?></a></li>
	  <li class="h40"><a href="<?php echo $pg0; ?>&n2=TusTorneos">Tus torneos <?php echo $tustorneostxt; ?></a></li>
	  <li class="h40"><a href="<?php echo $pg0; ?>&n2=Futbolme">Hoy en Futbolme <?php echo $futbolmetxt; ?></a>
    </li>
    <li class="h40">    
      <a href="/index.php?fm=0&fecha=<?php echo $diaAnterior; ?>" class="boldfont">&nbsp;&nbsp;&nbsp;&nbsp;Jugados ayer
      </a>
    </li>
    <li class="h40">
     <a href="/index.php?fm=0&fecha=<?php echo $diaSiguiente; ?>" class="boldfont">
      &nbsp;&nbsp;&nbsp;&nbsp;Para mañana
      </a>    
  </li>
	  <li class="h40 hide"><a href="<?php echo $pg0; ?>&n2=Ultima">Futbolme a la última</a></li>
    </ul>
  </li>
  

  <?php 


  $pg1 = $pg.'&n1=Televisados'; ?>
  <li class="dropdown h40">
    <a class="dropdown-toggle btn btn-danger boldfont text-center" data-toggle="dropdown" href="#">
    <span class="hidden-xs">Televisados</span>
    <span class="visible-xs nopadding" ><img src="/img/mini_tv.png" alt="logo tv" style="height: 15px"></span></a>
    <ul class="dropdown-menu" style='margin-left: -90px'>
      <li class="h40"><a href="<?php echo $pg1; ?>&n2=TVequipos">TV - Tus equipos</a></li>
	  <li class="h40"><a href="<?php echo $pg1; ?>&n2=TVfutbolme">TV - Futbolme</a></li>
    </ul>
  </li>

  <?php $pg2 = $pg.'&n1=Fidelidad'; ?>
  
  
  <li class="dropdown h40 pull-right">
      
     
    <a class="dropdown-toggle btn btn-success boldfont text-center" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
			<?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?></a>
      

    <ul class="dropdown-menu" style='margin-left: -230px'>
      <li class="text-center h40" style="color:white; background-color: #0B4C5F; padding-top:3px">
      
      <h4><?php echo $_SESSION['username']; ?></h4>
      </li>      
        
      <li style="text-align: center">Tu nombre de usuario es <b><?php echo $_SESSION['username']; ?></b>
        <br />
      En cada dispositivo y en cada navegador de dicho dispositivo tendrás un nombre de usuario diferente
      <br />
      Te aconsejamos que grabes tus equipos para recibir las notificaciones en el dispositivo y navegador que uses con más frecuencia.
      <?php
      switch (count($_SESSION['equipos'])) {
        case 0:
          echo "<br />No tienes equipos asociados a este usuario.<br /><a href='/index.php?n1=config'>Pulsa aquí para agregar<br /> equipos a TU FUTBOLME personalizado.</a>";
          break;
        case 1:
          echo "<br />Tienes 1 equipo asociado a este usuario.";
          break;
        
        default:
          echo "<br />Tienes ".count($_SESSION['equipos'])." equipos asociados a este usuario.";
          break;
      }?>
    </li>

    </ul>
  </li>

  

</ul>
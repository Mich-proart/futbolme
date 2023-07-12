<?php $raiz=$raiz??'';?>
<body  style="margin-top: 40px">
<div id="contenedor" style="z-index: 1">
<?php if ($slm===1){ ?>
<div id="Futbolme_CornerVideo"></div>
  <script type="application/javascript">
    var slmadshb = slmadshb || {};
    slmadshb.que = slmadshb.que || [];
    slmadshb.que.push(function() {
      slmadshb.display("Futbolme_CornerVideo");
    });
  </script>
<?php } ?>
<div id="Notificaciones" class="whitebox"></div>
<div id="NotificacionesFinales" class="whitebox"></div>
	<section class="container-fluid section_down cajagrisoscuro">

	<div id="cPrincipal" class="col-xs-12 nopadding clear">	
	<?php 
    require_once 'includes/header.php';

    if (0 == $_SESSION['app']) { require_once $raiz.'includes/left_sidebar.php'; } ?>
    
	<div class="col-xs-12 col-sm-9 col-md-6 nopadding">
		<?php require_once $raiz.'includes/publicidad/central.php'; ?>	
    	
    		<?php 
                             
            if (isset($_SESSION['futbolme']) && (int) $_SESSION['futbolme']===1) {                 
                require_once $raiz.'a_autentico.php';  
                die();
            } 
            ?>

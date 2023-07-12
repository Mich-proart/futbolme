<?php

        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

//echo $html; - Activar para comprobar el contenido enviado.
$datos=array();

  

  foreach($html->find('table.table-hover') as $key =>  $element) {

      if ($key==0){ 
          
          foreach($element->find('tr') as $k => $e){
            $datos['partidos'][$k]['escudo_local'] = trim($e->find('img',0)->src);
            $datos['partidos'][$k]['escudo_visitante'] = trim($e->find('img',1)->src);        
          } 

          foreach($element->find('div.font_widgetL') as $k => $e){        
            $datos['partidos'][$k]['url_local'] = trim($e->find('a',0)->href);
            $datos['partidos'][$k]['local'] = trim($e->find('a',0)->plaintext);
          } 

          foreach($element->find('div.font_widgetV') as $k => $e){        
            $datos['partidos'][$k]['url_visitante'] = trim($e->find('a',0)->href);
            $datos['partidos'][$k]['visitante'] = trim($e->find('a',0)->plaintext);
          } 
      }
           
  }

  /*
  <table class="table table-hover table-light"> <tbody> 

  <tr> 
  <td width="45%" align=left class=td_widget> 
    <div class=wrapper_widget> 
      <div class=escudo_widgetL> <img src="/pnfg/pimg/Clubes/00100_0000065941_escudo_para_federacion.png" align=absmiddle class=escudo_widget> 
      </div> 

      <div class=font_widgetL> &nbsp; 
      <a style="color:#000;" href="NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=36803"> 
      RUBI C.E.F.S. "A" </a> 
      </div> 
    </div>
  </td> 

  <td width=100 align=center style="white-space:nowrap"> 
    <h4><strong> </strong> </h4> 
    <h5> <span class=esconder><i class="fa fa-clock-o" aria-hidden=true></i> 04-10-2020 &nbsp;&nbsp;</span> </span><span class=esconder> 12:30 &nbsp;&nbsp;</span> 
    <a href="#" class=font-red onmouseover="showhint('<span class=title><b>Previ no disponible</b></span>', this)"><i class="fa fa-eye-slash" aria-hidden=true></i></a>
    &nbsp;&nbsp; 
    <a class="font blue-hoki" title="Comparativa d'equips" href="NFG_LstComparativaEquipos?cod_primaria=3000305&competicion=37886337&grupo=37886340&equipo1=36803&equipo2=25738809"><i class="fa fa-bar-chart" aria-hidden=true></i></a>
    </h5> 
  </td> 

  <td width="45%" align=right class=td_widget><div class=wrapper_widget> 
    <div class=font_widgetV> 
      <a style="color:#000;" href="NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=25738809"> 
      POU ESCORIAL " A " 
      </a> 
    </div> 
    <div class=escudo_widgetV> 
    <img src="/pnfg/pimg/Clubes/00100_0000141578_Logo_sin_NIF.png" class=escudo_widget align=absmiddle> 
    </div> 
    </div>
    </td> 
  </tr> 

  */

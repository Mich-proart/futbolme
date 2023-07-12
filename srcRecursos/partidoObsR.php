<?php


if (isset($partido['observaciones'])) {
    $cadena[0] = str_replace('000000', '', $cadena[0]);

    if (!isset($goles) || isset($goles) && 0 == count($goles)) {
        if (isset($cadena[1])) {
            //$cadena[1] = preg_replace('/\D\. /', '$1', $cadena[1]);
            //$cadena[1] = preg_replace('/\D\. /', '$1', $cadena[1]);
            //$cadena[1] = str_replace('p.p.', '(p.p.)', $cadena[1]); ?>
    <div class="col-xs-6 nopadding">    
        <p class="w100 text-right txt11" style="background-color: #DDE89E; padding-right: 15px"><i>
        <?php echo $cadena[1]; ?>
        </i></p></div>
    <?php
        } ?>
     
    
    <?php if (isset($cadena[2])) {
            //$cadena[2] = preg_replace('/\D\. /', '$1', $cadena[2]);
            //$cadena[2] = preg_replace('/\D\. /', '$1', $cadena[2]);
            //$cadena[2] = str_replace('p.p.', '(p.p.)', $cadena[2]); ?>
    <div class="col-xs-6 nopadding">
        <p class="w100 text-left txt11" style="background-color: #DDE89E; padding-left: 15px"><i>
        <?php echo $cadena[2]; ?>
        </i></p></div>
    <?php
        }
    } ?>
    
    
    <?php if (strlen($cadena[0]) > 10) {
        ?>
    <div class="col-xs-12 text-right" style="font-size:13px; background-color:#CEECF5; border-bottom: 1px solid black;">
        <i>
        <?php echo $cadena[0]; ?>
        </i>
    </div>
    <?php
    }
} ?> 


             
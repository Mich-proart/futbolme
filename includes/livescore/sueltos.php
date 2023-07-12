<?php 
$token="7865-b0PXlPMI94xvu3";
$torneos=array();
$enlace = '/resultados-directo/torneo/';

foreach ($sueltos as $key => $value) {
    $torneos[$key]['partidos']=$value; 
}

$temp_id = 0;
$contador = 0;

if (count($torneos)==0){ ?>
<div id="Futbolme_ATF2_300x250" class="text-center"></div>
              <script type="application/javascript">
                var slmadshb = slmadshb || {};
                slmadshb.que = slmadshb.que || [];
                slmadshb.que.push(function() {
                  slmadshb.display("Futbolme_ATF2_300x250");
                });
              </script>

<?php }
foreach ($torneos as $key => $p) { 
    foreach ($p['partidos'] as $k => $partido) { 

        $leagueName=$partido['league']['name'];
        $buscamos="mins play"; 
        $pos = strripos($leagueName, $buscamos);
        if ($pos >0) { continue; }


        $status = $partido['time_status'];
        if ($status!=1){ continue; }
        if ($partido['timer']['tm']==0){ continue; }
        ?>
    
    <div class="col-xs-12 nopadding">   
    <?php if ($temp_id != $key) {



            $fondoCabecera = 'celestebox';
            $colorCabecera = 'white !important';
            $enlace_torneo = $enlace.poner_guion($partido['league']['name']).'/'.(1000000+$partido['league']['id']).'/';
            ?>
            <div class="col-xs-12 <?php echo $fondoCabecera; ?> one-bordergrey-vert h40">
                <div style="float:left; margin-left:10px; margin-top: 3px">
                <a href="<?php echo $enlace_torneo?>" style="color: <?php echo $colorCabecera; ?>;">                
                    <h2 class="tname hidden-xs" style="margin: 0; font-size: 16px"><?php echo $partido['league']['name']?><br>
                    </h2>
                    <span class="tname visible-xs txt11"><?php echo $partido['league']['name']?></span>
                </a>
                </div>
            </div>

        <?php } 
        $temp_id = $key;


        include 'partidoDirecto.php';
        $contador++;

        if($contador==3){ ?>
            <div id="Futbolme_ATF2_300x250" class="text-center"></div>
              <script type="application/javascript">
                var slmadshb = slmadshb || {};
                slmadshb.que = slmadshb.que || [];
                slmadshb.que.push(function() {
                  slmadshb.display("Futbolme_ATF2_300x250");
                });
              </script>
        <?php }?>


    </div>
<?php }
    //if ($contador>10){ break; }

} ?>
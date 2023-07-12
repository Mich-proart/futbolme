<?php 
define('_PANEL_', 1);

include "../../phpqrcode/qrlib.php";
include '../../impresos/_datos.php';
$fichero='jornada.php';
$tipo='P'; //tipo L para horizontal



imp($_POST);
imp($fichero);


$pdf=str_replace('.php', '.pdf', $fichero);
//$fichero='justificado.php';
require '../../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();


    include '../../impresos/'.$fichero;
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf($tipo, 'A4', 'es', true, 'UTF-8');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    

    ob_end_clean();
  
    

    $html2pdf->output(__DIR__ . '/pdf/torneo_'.$_POST['temporada_id'].'.pdf', 'F');
    
        
    $html2pdf->output($pdf);
    
    

} catch (Html2PdfException $e) {

    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

/*require '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
$html2pdf->output();*/

?>


?>

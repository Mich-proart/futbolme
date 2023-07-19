<?php

namespace App\Contacto;

define('_FUTBOLME_', 1);
require_once 'src/config.php';
$pagina = 'contacto';
if (isset($_POST['name'])){
$name = stripslashes($_POST['name']);
$email = stripslashes($_POST['email']);
$mensaje = stripslashes($_POST['mensaje']);
}else{
$name="";$email="";$mensaje="";    
}

if (!empty($_POST['g-recaptcha-response'])) {
    $recaptcha = $_POST['g-recaptcha-response'];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6Lev054UAAAAAL6j96lrCLD082zU_hekpy6-wqPi',
        'response' => $recaptcha
    );
    $options = array(
        'http' => array (
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);
    if ($captcha_success->success && !empty($_POST['mensaje'])) {

// Message
        $message = '
<html>
<head>
  <title>Contacto a través de la web</title>
</head>
<body>
  <p><strong>Nuevo mensaje de contacto de: </strong>'.$name.'</p>
  <p><strong>Email: </strong>'.$email.'</p>
  <p><strong>Mensaje:</strong></p>
  <p>'.$mensaje.'</p>
</body>
</html>
';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf8';

        // Additional headers
        $headers[] = 'From: Futbolme <futbolme@futbolme.com>';
        $headers[] = 'Reply-To: '.$email;

        mail('futbolme@futbolme.com', 'Contacto a través de la web de: '.$name, $message,  implode("\r\n", $headers));
        $ok = true;
    } else {
        // Eres un robot o no se ha enviado el formulario
//    if (!empty($_POST)) {
//        //ERES UN BOT!!!!!
//        echo 'eres un bot!!';
//        exit;
//    }
        if ($captcha_success->success && empty($_POST['mensaje'])) {
            $error['mensaje'] = 'El mensaje no puede estar vacío';
        }
    }
}


require_once 'includes/head.php'; ?>
    <title>Contacto</title>
    <script async defer src='https://www.google.com/recaptcha/api.js?hl=es'></script>
    </head>

<?php require_once 'includes/contenedorSup.php'; ?>
    <div class="col-xs-12 col-md-12 col-lg-12 whitebox" style="padding-top: 20px; padding-bottom:125px;">
        <?php
        if ($ok??false) {
            echo 'Hemos recibido correctamente tu mensaje. te responderemos lo antes posible';
            echo '</div>';
            require_once 'includes/contenedorInf.php';
            exit;
        }
        ?>
        <form class="form" method="post" action="https://futbolme.com/contacto">
            <fieldset>
                <legend>Contacta con nosotros</legend>
                <strong>Recuerda que futbolme no es la web oficial de ningún club de fútbol</strong><br><br>
                <div class="form-group">
                    <?=$error['nombre']??'';?>
                    <label class="control-label col-sm-3 required" for="form_name">Nombre:</label>
                    <div class="col">
                        <input type="text" class="form-control" pattern=".{2,}" required="required" name="name" id="form_name" value="<?=$name;?>">
                    </div>
                </div>
                <div class="form-group">
                    <?=$error['email']??'';?>
                    <label class="control-label col-sm-3 required" for="form_email">Email:</label>
                    <div class="col">
                        <input type="email" class="form-control" required="required" name="email" id="form_email"
                               aria-describedby="emailHelp" value="<?=$email;?>">
                        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu email con nadie más
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <?=$error['mensaje']??'';?>
                    <label class="control-label col-sm-3 required" for="form_mensaje">Mensaje:</label>
                    <div class="col">
                        <textarea class="form-control" rows="5" name="mensaje" placeholder="Escribe aqui tu mensaje" id="form_mensaje"><?=$mensaje;?></textarea>
                    </div>
                </div>
            </fieldset>
            <div class="form-group input-sm">
                <div class="g-recaptcha" data-sitekey="6Lev054UAAAAABDShSaZyAkcz8Kb7MRbuM0lTwl5" data-callback="recaptchaCallback" ></div>
                <input type="submit" id="submitBtn" value="Enviar" class="btn btn-default" style="margin-top: 30px" disabled>
            </div>
        </form>
    </div>
<script>
    function recaptchaCallback() {
        $('#submitBtn').removeAttr('disabled');
    };
</script>
<?php require_once 'includes/contenedorInf.php'; ?>
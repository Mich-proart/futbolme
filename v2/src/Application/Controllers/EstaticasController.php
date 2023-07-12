<?php
namespace App\Application\Controllers;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\FuncionesHelper;
use App\Application\Repositories\GeneralRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EstaticasController
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function avisoLegal(Request $request, Response $response): Response
    {
        $titleTag = 'Aviso Legal';

        return $this->container->get('view')->render($response, 'aviso-legal/index.html.twig',[
            'titleTag' => $titleTag
        ]);
    }

    public function contacto(Request $request, Response $response): Response
    {
        $titleTag = 'Contacto';

        $allPostPutVars = $request->getParsedBody();

        $nombre = '';
        $email = '';
        $mensaje = '';
        $gRecaptchaResponse = '';

        if ($allPostPutVars) {
            $nombre = array_key_exists('tuNombre', $allPostPutVars) ? $allPostPutVars['tuNombre'] : '';
            $email = array_key_exists('tuEmail', $allPostPutVars) ? $allPostPutVars['tuEmail'] : '';
            $mensaje =  array_key_exists('tuMensaje', $allPostPutVars) ? $allPostPutVars['tuMensaje'] : '';
            $gRecaptchaResponse =  array_key_exists('g-recaptcha-response', $allPostPutVars) ? $allPostPutVars['g-recaptcha-response'] : '';
        }

        $ok = false;
        $error = [];

        $formEnviado = trim($nombre) != '';

        if ($gRecaptchaResponse) {

            $recaptcha = $allPostPutVars['g-recaptcha-response'];

            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => '6Lev054UAAAAAL6j96lrCLD082zU_hekpy6-wqPi',
                'response' => $recaptcha
            );
            $options = array(
                'http' => array(
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context = stream_context_create($options);
            $verify = file_get_contents($url, false, $context);
            $captcha_success = json_decode($verify);

            if ($captcha_success->success && !empty($mensaje)) {

                $message = '
<html>
<head>
  <title>Contacto a través de la web</title>
</head>
<body>
  <p><strong>Nuevo mensaje de contacto de: </strong>'.$nombre.'</p>
  <p><strong>Email: </strong>'.$email.'</p>
  <p><strong>Mensaje:</strong></p>
  <p>'.nl2br($mensaje).'</p>
</body>
</html>
';

                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=utf8';

                // Additional headers
                $headers[] = 'From: Futbolme <futbolme@futbolme.com>';
                $headers[] = 'Reply-To: ' . $email;
                //$headers[] = 'Bcc: c+999@cristian.pro';

                mail('info@futbolme.com', 'Contacto a través de la web de: ' . $nombre, $message,  implode("\r\n", $headers));
                $ok = true;
            } else {
                if ($captcha_success->success && empty($_POST['mensaje'])) {
                    $error['mensaje'] = 'El mensaje no puede estar vacío';
                }
            }
        }

        return $this->container->get('view')->render($response, 'contacto/index.html.twig',[
            'titleTag' => $titleTag,
            'formEnviado' => $formEnviado,
            'ok' => $ok,
            'error' => $error,

            'nombre' => $nombre,
            'email' => $email,
            'mensaje' => $mensaje,
        ]);
    }
}
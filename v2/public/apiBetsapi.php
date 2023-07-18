<?php //echo "test confirmada bbbbbb".$_POST['id'];?>

<?php //echo "https://api.b365api.com/v1/event/lineup?token=153716-4djEyj4e6JZVou&event_id=".$_POST['id'];?>

<?php
// URL del endpoint
$url = 'https://api.b365api.com/v1/event/lineup?token=153716-4djEyj4e6JZVou&LNG_ID=3&event_id='.$_POST['id'];

// Inicializar la solicitud cURL
$ch = curl_init();

// Establecer la URL
curl_setopt($ch, CURLOPT_URL, $url);

// Establecer opciones adicionales según sea necesario, por ejemplo:
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Si deseas recibir la respuesta en una variable en lugar de imprimir directamente

// Ejecutar la solicitud
$response = curl_exec($ch);

// Verificar si hubo algún error en la solicitud
if (curl_errno($ch)) {
    echo 'Error en la solicitud: ' . curl_error($ch);
} else {
    // Procesar la respuesta
    //echo json_encode($response);

    //$objResponse = array();

        // // $objResponse = [
        // //     'local' => '',
        // //     'visitante' => ''
        // // ];

        // if($response->json()['results']){

        //     $datosLocal = $response->json()['results']['home']['startinglineup'];

        //     $datosVisitante = $response->json()['results']['away']['startinglineup'];

        //     $objResponse = [
        //         'local' => $datosLocal,
        //         'visitante' => $datosVisitante
        //     ];         
        // }

        return json_encode($response);
}

// Cerrar la conexión cURL
curl_close($ch);
?>


<!-- $data = $_POST['id'];

$objResponse = [
    'local' => '',
    'visitante' => ''
];

$response = Http::get('https://api.b365api.com/v1/event/lineup?token=153716-4djEyj4e6JZVou&LNG_ID=3&event_id='.$data);

if($response->json()['results']){

    $datosLocal = $response->json()['results']['home']['startinglineup'];

    $datosVisitante = $response->json()['results']['away']['startinglineup'];

    $objResponse = [
        'local' => $datosLocal,
        'visitante' => $datosVisitante
    ];         
}

return \json_encode($objResponse); -->
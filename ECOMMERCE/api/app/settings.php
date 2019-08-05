<?php
    //Configuración de la base de datos
    $db = require $contexto_app . '/app/database/config.php';

    //key de encriptación
    $jwt = array ('key' => 'r-9U3G?:/Az>F,Un', 'algorithms' => array('HS256'));

    //configuración de la app
    $settings = array (
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => true,
        'db' => $db,
        'jwt' => $jwt
    );

    // se agrega el contexto de la app
    $settings['contexto'] = $contexto_app;

   // var_dump($settings); //Retorna el arreglo 
    return $settings;
?>

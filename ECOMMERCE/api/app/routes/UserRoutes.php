<?php
    $app->get('/greetings', 'UserController:helloUser');
    $app->get('/HelloUser/{name}', 'UserController:helloUserdos');
?>
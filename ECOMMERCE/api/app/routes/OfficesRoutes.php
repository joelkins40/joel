<?php

$app->get( '/offices','OfficesController:selectOffices');
$app->post('/offices','OfficesController:insertOffices');
$app->get( '/offices/{id}','OfficesController:selectOfficesID');
//$app->pull('/offices/{id}','OfficesController:updateOffices');
?>
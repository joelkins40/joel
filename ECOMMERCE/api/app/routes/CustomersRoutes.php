<?php

$app->get( '/customers','CustomersController:selectCustomers');
$app->get( '/customers/{id}','CustomersController:selectCustomersID');
$app->post('/customers','CustomersController:insertCustomers');
?>
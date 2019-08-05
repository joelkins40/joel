<?php

$app->get( '/employees','EmployeesController:selectEmployees');
$app->get( '/employees/{id}','EmployeesController:selectEmployeesID');
$app->post('/employees','EmployeesController:insertEmployees');

?>
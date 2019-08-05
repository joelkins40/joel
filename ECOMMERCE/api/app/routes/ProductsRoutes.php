<?php

$app->get( '/products','ProductsController:selectProducts');
$app->get( '/productline','ProductsController:selectproductline');
$app->post('/products','ProductsController:insertProducts');
?>
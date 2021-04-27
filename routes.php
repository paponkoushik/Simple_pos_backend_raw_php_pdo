<?php

//Products
$router->get('products', 'ProductController@index');
$router->get('product/show', 'ProductController@show');
$router->post('product/store', 'ProductController@store');
$router->post('product/update', 'ProductController@update');
$router->post('product/delete', 'ProductController@delete');

//Categories

$router->get('categories', 'CategoryController@index');

<?php

//Auth
$router->get('login/index', 'LoginController@index');
$router->post('login', 'LoginController@login');
$router->get('logout', 'LoginController@logout');

//Products
$router->get('products', 'ProductController@index');
$router->post('product/show', 'ProductController@show');
$router->post('product/store', 'ProductController@store');
$router->post('product/update', 'ProductController@update');
$router->post('product/delete', 'ProductController@delete');

//Categories
$router->get('categories', 'CategoryController@index');

//orders
$router->get('orders', 'OrderController@index');
$router->post('order/show', 'OrderController@show');
$router->post('order/store', 'OrderController@store');
$router->post('order/update', 'OrderController@update');

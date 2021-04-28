<?php


namespace App\Controllers;


use App\Config\App;

class CategoryController
{
    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $categories = App::get('database')->selectAll('categories');

        echo json_encode($categories);
    }
}
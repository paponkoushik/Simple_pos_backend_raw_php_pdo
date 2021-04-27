<?php


namespace App\Controllers;


use App\Config\App;

class CategoryController
{
    public function index()
    {
        $categories = App::get('database')->selectAll('categories');

        header('Content-Type: application/json');

        echo json_encode($categories);
    }
}
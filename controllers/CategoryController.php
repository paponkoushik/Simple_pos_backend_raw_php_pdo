<?php

namespace App\Controllers;

use App\Config\App;
use App\Controllers\Traits\Helper;

class CategoryController
{
    Use Helper;

    public function __construct()
    {
        $this->setHeader();
    }

    public function index()
    {
        $categories = App::get('database')->selectAll('categories');

        echo json_encode($categories);
    }
}
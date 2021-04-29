<?php

namespace App\Controllers;

use App\Config\App;
use App\Controllers\Traits\Helper;

class CategoryController
{
    Use Helper;

    public function index()
    {
        $this->setHeader();

        $categories = App::get('database')->selectAll('categories');

        echo json_encode($categories);
    }
}
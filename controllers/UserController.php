<?php

namespace App\Controllers;


use App\Config\App;
use http\Header;


class UserController
{
    public function index()
    {
        $user = App::get('database')->query('select * from products');
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    public function store()
    {
        $params = (array) json_decode(file_get_contents('php://input'), TRUE);
        var_dump($params['name']);
//        header('Content-Type: application/json');
//        var_dump($_POST['name']);
//        App::get('database')->insert('test', [
//
//        ]);
    }
}
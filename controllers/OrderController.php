<?php


namespace App\Controllers;


use App\Config\App;

class OrderController
{
    public function index()
    {
        $orders = App::get('database')->selectAll('orders');

        header('Content-Type: application/json');

        echo json_encode($orders);
    }

    public function store()
    {
        $orders = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $create = App::get('database')->insert('orders', $orders);

        echo json_encode("Orders placed successfully");
    }

}
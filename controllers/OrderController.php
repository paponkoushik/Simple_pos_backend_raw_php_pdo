<?php


namespace App\Controllers;


use App\Config\App;
use App\Controllers\Traits\ProductHelper;

class OrderController
{
    use ProductHelper;

    public function index()
    {
        $orders = App::get('database')->selectAll('orders');

        header('Content-Type: application/json');

        echo json_encode($orders);
    }

    public function store()
    {
        $order = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $create = App::get('database')->insert('orders', $order);

        echo json_encode("Orders placed successfully");
    }

    public function update()
    {
        $data = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $order = [
            'status' => $data['status'],
            'id' => $data['id']
        ];

        $query ='UPDATE orders SET status=:status WHERE id=:id';

        $update = App::get('database')->query($query, $order);

        echo json_encode("Order has been updated successfully");
    }

}
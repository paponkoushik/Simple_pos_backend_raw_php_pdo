<?php


namespace App\Controllers;


use App\Config\App;
use App\Config\Session;
use App\Controllers\Traits\Helper;

class OrderController
{
    use Helper;

    public function __construct()
    {
//        die(var_dump($root));
//        Session::init();
//        $auth = Session::get('user_id');
//        $is_admin = Session::get('is_admin');
//
//        if (!($auth && $is_admin == '1')) {
//            header("Location: http://localhost:8088/login/index");
//        }

        $this->setHeader();
    }

    public function index()
    {
        $orders = App::get('database')->selectAll('orders');

        echo json_encode($orders);
    }

    public function show()
    {
        $order_id = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $query = "Select * from orders where id=:id";

        $order = App::get('database')->query($query, $order_id, true);

        echo json_encode($order);
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

        $query ='UPDATE orders SET status=:status WHERE id=:id';

        $update = App::get('database')->query($query, $data);

        echo json_encode("Order has been updated successfully");
    }

}
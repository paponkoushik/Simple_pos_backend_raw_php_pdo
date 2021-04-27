<?php


namespace App\Controllers;


use App\Config\App;
use App\Config\Session;
use App\Controllers\Traits\Helper;

class LoginController
{
    use Helper;

    public function index()
    {
        echo "logout successfully";
    }

    public function login()
    {
        $user = (array) json_decode(file_get_contents('php://input'), TRUE);

        $data = [
            'email' => $user['email'],
            'password' => md5($user['password'])
        ];

        $query = "Select * from users where email=:email and password=:password";

        $user_data = App::get('database')->userSelect($query, $data);

        if ($user_data) {
            Session::init();
            Session::set('user_id', $user_data[0]->id);
            Session::set('user_name', $user_data[0]->name);
            Session::set('is_admin', $user_data[0]->is_admin);

            header("Location: ". $this->baseUrl() ."/orders");
        }
    }

    public function logout()
    {

        Session::remove('user_id');
        Session::remove('user_name');
        Session::remove('is_admin');
        Session::destroy();

        header("Location: " . $this->baseUrl(). "/login/index");
    }
}
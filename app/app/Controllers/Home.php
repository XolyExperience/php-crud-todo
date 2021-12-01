<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function test() {
        $user_model = model("UserModel");

        $data = [
            "users" => $user_model->get_users()
        ];

        echo view("show_users", $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\UsersModel;

class User extends BaseController
{

    protected $users;

    public function __construct()
    {
        $this->users = new UsersModel();
    }
    public function index()

    {
        // dd($this->users->procedureGetNamaPemberiORPenerima(3));
        // dd(user_id());
        $getInLogin= user_id();
        
        $data = [
            'testing' => $this->users->procedureGetNamaPemberiORPenerima($getInLogin),
            
            
        ];
        return view('surat-tugas/index',$data);
    }
}

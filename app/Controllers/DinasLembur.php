<?php

namespace App\Controllers;

class DinasLembur extends BaseController
{

    public function __construct()
    {


    }
    public function index(){

        return view("dinas-lembur/index");
    }

}
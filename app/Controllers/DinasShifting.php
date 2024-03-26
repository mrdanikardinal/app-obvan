<?php

namespace App\Controllers;

class DinasShifting extends BaseController
{
    
    public function __construct()
    {


    }
    public function index(){

        return view("dinas-shifting/index");
    }


}
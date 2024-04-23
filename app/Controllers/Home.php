<?php
/**
 * 2.Fitur Crew OB CRUD
 * 3.Fitur Print Surat Tugas
 * 4.Fitur Kas OBVAN
 * 5.Upload Foto
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
namespace App\Controllers;

use App\Models\CrewDinasShiftingModel;
use App\Models\UsersModel;
use App\Models\InventarisModel;
use App\Models\CrewObModel;
use App\Models\PeminjamanAlatModel;

class Home extends BaseController

{
  
    public function index(){
        
        return view('home');

    }

  
}

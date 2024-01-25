<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\PeminjamanAlatModel;

class User extends BaseController
{

    protected $users;
    protected $peminjaman_alat;

    public function __construct()
    {
        $this->users = new UsersModel();
        $this->peminjaman_alat= new PeminjamanAlatModel();
    }
    public function index()

    {
        
        return view('surat-tugas/index');
      
    }
    public function pemberi_pinjam()
    {
        $getInLogin = user_id();
        $data = [
            'AllShowNamaPemberi' => $this->users->procedureGetNamaPemberi($getInLogin),
            'getNamaPenerimaPinjam'=>$this->users->getUsers()
        ];
        return view('surat-tugas/pemberi_pinjam', $data);
    }

    public function penerima_pinjam()
    {
        $getInLogin = user_id();
        $data = [
            'AllShowNamaPenerima' => $this->users->procedureGetNamaPenerima($getInLogin),
            'getNamaPemberiPinjam'=>$this->users->getUsers()
        ];
        return view('surat-tugas/penerima_pinjam', $data);
    }

}

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
        //surat tugas outbroadcast
        // dd($this->users->procedureGetNamaPemberiORPenerima(3));
        // dd(user_id());
        $getInLogin = user_id();

        $data = [
            'AllShowNamaPemberi' => $this->users->procedureGetNamaPenerima($getInLogin),
            


        ];
        return view('surat-tugas/index', $data);
    }

    public function penerima_pinjam()
    {
        // dd($this->users->procedureGetNamaPemberiORPenerima(3));
        // dd(user_id());
        $getInLogin = user_id();

        $data = [
            'AllShowNamaPenerima' => $this->users->procedureGetNamaPenerima($getInLogin),
        ];
        return view('surat-tugas/penerima_pinjam', $data);
    }
    public function pemberi_pinjam()
    {
        // dd($this->users->procedureGetNamaPemberiORPenerima(3));
        // dd(user_id());
        $getInLogin = user_id();

        $data = [
            'AllShowNamaPemberi' => $this->users->procedureGetNamaPemberi($getInLogin),
            // 'getNamaPemberi'=> $this->users->procedureGetNamaPemberi(null)
        ];
        return view('surat-tugas/pemberi_pinjam', $data);
    }

    // public function print($idTest)
    // {
    //     // dd($idPjm);
    //     // $test=$idPjm;
    //     // $test='PJM-0001';
    //     // $parameter = $_GET['primary_key'];
    //     // echo $parameter;
    //     // return view('user/credit_note_sample');
    //     // dd($idPjm);
    //     // dd($this->users->proceduregetPrintIdPJM($test));
    //     dd($this->users->getTest($idTest));
    //     // getPrintIDPinjam
    // }
}

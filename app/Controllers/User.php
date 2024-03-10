<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\PeminjamanAlatModel;
use App\Models\OutBroadcastModel;
use App\Models\CrewObModel;

class User extends BaseController
{

    protected $users;
    protected $peminjaman_alat;
    protected $outBroadcast;
    protected $crewOb;

    public function __construct()
    {
        $this->users = new UsersModel();
        $this->peminjaman_alat= new PeminjamanAlatModel();
        $this->outBroadcast = new OutBroadcastModel();
        $this->crewOb = new CrewObModel();

    }
    public function index()

    {

        $getInLogin = user_id();
        $data = [
            'AllShowNamaPemberi' => $this->users->procedureGetNamaPemberi($getInLogin),
            'getNamaPenerimaPinjam'=>$this->users->getUsers(),
            'AllShowNamaPenerima' => $this->users->procedureGetNamaPenerima($getInLogin),
            'getNamaPemberiPinjam'=>$this->users->getUsers(),
            // 'getCrewDinasOBByIDUser' => $this->users->procedureGetCrewDinasByIDUser($getInLogin),
            'getAcaraOBFromIDUser' => $this->users->proceduregetAcaraOBFromIDUser($getInLogin),
            'showAllJoinsOBKategori'=> $this->outBroadcast->getOBJointKategori(),
            'allDataOutBroadcast'=> $this->crewOb->getIdOutBroadcast(),
            'allUsers'=>$this->users->getUsers(),

        ];
        
        return view('surat-tugas/index',$data);
      
    }
    // public function pemberi_pinjam()
    // {
    //     $getInLogin = user_id();
    //     $data = [
    //         'AllShowNamaPemberi' => $this->users->procedureGetNamaPemberi($getInLogin),
    //         'getNamaPenerimaPinjam'=>$this->users->getUsers()
    //     ];
    //     return view('surat-tugas/pemberi_pinjam', $data);
    // }

    // public function penerima_pinjam()
    // {
    //     $getInLogin = user_id();
    //     $data = [
    //         'AllShowNamaPenerima' => $this->users->procedureGetNamaPenerima($getInLogin),
    //         'getNamaPemberiPinjam'=>$this->users->getUsers()
    //     ];
    //     return view('surat-tugas/penerima_pinjam', $data);
    // }

}

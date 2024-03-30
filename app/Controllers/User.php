<?php

namespace App\Controllers;

use App\Models\AcaraDinasShiftingModel;
use App\Models\CrewDinasShiftingModel;
use App\Models\UsersModel;
use App\Models\PeminjamanAlatModel;
use App\Models\OutBroadcastModel;
use App\Models\CrewObModel;
use App\Models\DinasShiftingModel;

class User extends BaseController
{

    protected $users;
    protected $peminjaman_alat;
    protected $outBroadcast;
    protected $crewOb;
    protected $dinasShifting;
    protected $crewDinasShif;
  


    public function __construct()
    {
        $this->users = new UsersModel();
        $this->peminjaman_alat = new PeminjamanAlatModel();
        $this->outBroadcast = new OutBroadcastModel();
        $this->crewOb = new CrewObModel();
        $this->dinasShifting = new DinasShiftingModel();
        $this->crewDinasShif = new CrewDinasShiftingModel();

    }
    public function index()

    {

        $getInLogin = user_id();
        $data = [
            'AllShowNamaPemberi' => $this->users->procedureGetNamaPemberi($getInLogin),
            'getNamaPenerimaPinjam' => $this->users->getUsers(),
            'AllShowNamaPenerima' => $this->users->procedureGetNamaPenerima($getInLogin),
            'getNamaPemberiPinjam' => $this->users->getUsers(),
            // 'getCrewDinasOBByIDUser' => $this->users->procedureGetCrewDinasByIDUser($getInLogin),
            'getAcaraOBFromIDUser' => $this->users->proceduregetAcaraOBFromIDUser($getInLogin),
            'showAllJoinsOBKategori' => $this->outBroadcast->getOBJointKategori(),
            'allDataOutBroadcast' => $this->crewOb->getIdOutBroadcast(),
            'allUsers' => $this->users->getUsers(),

        ];

        return view('surat-tugas/index', $data);
    }
    public function shifting($idUser)
    {
        $data = [
            'allDataJoinShiftDanJoinNamaAcara' => $this->dinasShifting->procedureShowAllDinasShifting($idUser),
            'allDataDinasShifting' => $this->crewDinasShif->getIdCrewDinasShifting(),
            'allUsers' => $this->users->getUsers()
        ];
        return view('surat-tugas/shifting',$data);

    }
    public function lembur($idUsers)
    {
        $data = [
            'allDataJoinShiftDanJoinNamaAcara' => $this->dinasShifting->procedureShowAllDinasLembur($idUsers),
            'allDataDinasShifting' => $this->crewDinasShif->getIdCrewDinasShifting(),
            'allUsers' => $this->users->getUsers()
        ];
        return view('surat-tugas/lembur',$data);

    }
}

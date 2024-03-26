<?php

namespace App\Controllers;

use App\Models\AcaraDinasShiftingModel;
use App\Models\CrewDinasShiftingModel;
use App\Models\DinasShiftingModel;
use App\Models\UsersModel;
use App\Models\KategoriShiftingModel;


class DinasShifting extends BaseController
{
    protected $allUser;
    protected $allKategoriDinasShif;
    protected $allNamaAcaraShif;
    protected $dinasShifting;
    protected $crewDinasShif;
    public function __construct()
    {
        $this->allUser= new UsersModel();
        $this->allKategoriDinasShif= new KategoriShiftingModel();
        $this->allNamaAcaraShif= new AcaraDinasShiftingModel();
        $this->dinasShifting= new DinasShiftingModel();
        $this->crewDinasShif= new CrewDinasShiftingModel();


    }
    public function index(){
        // dd($this->crewDinasShif->getIdCrewDinasShifting());
        $data = [
            'allDataJoinShiftDanJoinNamaAcara'=>$this->dinasShifting->getDinasShifJoinJenisShifJoinNamaAcara(),
            'allDataDinasShifting'=> $this->crewDinasShif->getIdCrewDinasShifting(),
            'allUsers' => $this->allUser->getUsers()

        ];

        return view("dinas-shifting/index",$data);
    }
    public function create(){

        $data = [
            'allKategoriDinasShif' => $this->allKategoriDinasShif->getIdKategoriShifting(),
            'allDataUsers' => $this->allUser->getUsers(),
            'allNamaAcaraShif' => $this->allNamaAcaraShif->getIdNamaAcaraShif(),
            'title' => 'Input Data Dinas Shifting'
        ];

        return view("dinas-shifting/create",$data);
    }
    public function save(){

        $idAutoDinasShif = $this->dinasShifting->autoNumberId();
   
        $converttgl = $this->request->getVar('tanggalDinas');
        $date = str_replace('/', '-', $converttgl);
        $tanggalconvert = date('Y-m-d', strtotime($date));
        // dd($this->request->getVar('kategoriDinasShif'));

        $this->dinasShifting->save([
            'id_dinas_shifting' => $idAutoDinasShif,
            'id_kategori_dinas_shif' => $this->request->getVar('kategoriDinasShif'),
            'tanggal' => $tanggalconvert,
            'id_acara' => $this->request->getVar('namaAcaraDinasShif'),
            'lokasi' => $this->request->getVar('lokasiDinasShif')
        ]);

        $idUser = $this->request->getVar('id_user');
        $jumlahDataInput = count($idUser);
        for ($i = 0; $i < $jumlahDataInput; $i++) {

            $this->crewDinasShif->save([
                'id_dinas_shif' => $idAutoDinasShif,
                'id_users' => $idUser[$i]
            ]);
        }

        session()->setFlashdata('pesan', 'Berhasil,input dinas shifting ID ' . $idAutoDinasShif);
        return redirect()->to('dinas-shifting');
    }


}
<?php

namespace App\Controllers;

use App\Models\AutoNomorSuratTugasShiftingLemburModel;
use App\Models\CrewDinasShiftingModel;
use App\Models\UsersModel;
use App\Models\DinasShiftingModel;


class KelolaSuratTugasShifting extends BaseController
{

    protected $users;
    protected $dinasShifting;
    protected $crewDinasShif;
    protected $autoNomorSuratShifLembur;
    protected $helpers = (['form']);



    public function __construct()
    {
        $this->users = new UsersModel();
        $this->dinasShifting = new DinasShiftingModel();
        $this->crewDinasShif = new CrewDinasShiftingModel();
        $this->autoNomorSuratShifLembur= new AutoNomorSuratTugasShiftingLemburModel();
    }

    public function index()
    {
        $data = [
            'allDataJoinShiftDanJoinNamaAcara' => $this->dinasShifting->proceduregetShowAllDinasShiftingForKelolaShifting(),
            'allDataDinasShifting' => $this->crewDinasShif->getIdCrewDinasShifting(),
            'allUsers' => $this->users->getUsers(),
            'contekanNomorSuratShifLembur'=>$this->autoNomorSuratShifLembur->autoNomorSuratShiftingLembur()
        ];
        return view('admin/kelola-surat-tugas-shifting/index', $data);
    }



    public function edit_no_surat_shifting($idShifting)
    {
        $data = [
            'getIdDataShifting' => $this->dinasShifting->getIdDinasShifting($idShifting)
        ];
        return view('admin/kelola-surat-tugas-shifting/edit-no-surat-shifting', $data);
    }

    public function update_nomor_surat_shifting($idShifting)
    {
        $rules = [
            'no_surat_shifting' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nomor surat harus di isi.'

                ]
            ]

        ];
        $nomorSuratShifting = $this->request->getVar('no_surat_shifting');

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }

        $this->dinasShifting->save([
            'id_dinas_shifting'=> $idShifting,
            'nomor_surat' => $nomorSuratShifting,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,edit nomor surat Shifting ' . $nomorSuratShifting);
        return redirect()->to('admin/kelola-surat-tugas-shifting');
    }
}

<?php

namespace App\Controllers;

use App\Models\AutoNomorSuratTugasShiftingLemburModel;
use App\Models\CrewDinasShiftingModel;
use App\Models\UsersModel;
use App\Models\DinasShiftingModel;


class KelolaSuratTugasLembur extends BaseController
{

    protected $users;
    protected $dinasShifting;
    protected $crewDinasShif;
    protected $autoNomorSuratShifLembur;
    protected $helpers = (['form','auth']);




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
            'allDataJoinShiftDanJoinNamaAcara' => $this->dinasShifting->proceduregetShowAllDinasLemburForKelolaLembur(),
            'allDataDinasShifting' => $this->crewDinasShif->getIdCrewDinasShifting(),
            'allUsers' => $this->users->getUsers(),
            'contekanNomorSuratShifLembur'=>$this->autoNomorSuratShifLembur->autoNomorSuratShiftingLembur()
        ];
        return view('admin/kelola-surat-tugas-lembur/index', $data);
    }



    public function edit_no_surat_lembur($idLembur)
    {
        $data = [
            'getIdDataLembur' => $this->dinasShifting->getIdDinasShifting($idLembur)
        ];
        return view('admin/kelola-surat-tugas-lembur/edit-no-surat-lembur', $data);
    }

    public function update_nomor_surat_lembur($idLembur)
    {
        $rules = [
            'no_surat_lembur' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nomor surat harus di isi.'

                ]
            ]

        ];
        $nomorSuratLembur = $this->request->getVar('no_surat_lembur');

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }

        $this->dinasShifting->save([
            'id_dinas_shifting'=> $idLembur,
            'nomor_surat_lembur' => $nomorSuratLembur,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,edit nomor surat lembur ' . $nomorSuratLembur);
        return redirect()->to('admin/kelola-surat-tugas-lembur');
    }
}

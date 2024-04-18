<?php

namespace App\Controllers;

use App\Models\AcaraDinasShiftingModel;
use App\Models\CrewDinasShiftingModel;
use App\Models\UsersModel;
use App\Models\PeminjamanAlatModel;
use App\Models\OutBroadcastModel;
use App\Models\CrewObModel;
use App\Models\DinasShiftingModel;
use Myth\Auth\Password;
use App\Models\NomorSuratTugasModel;
class KelolaSuratTugasObPeminjaman extends BaseController
{

    protected $users;
    protected $peminjaman_alat;
    protected $outBroadcast;
    protected $crewOb;
    protected $dinasShifting;
    protected $crewDinasShif;
    // protected $contekanNomorSuratManualModel;
    protected $nomorSuratTugasModel;
    protected $helpers = (['form']);



    public function __construct()
    {
        $this->users = new UsersModel();
        $this->peminjaman_alat = new PeminjamanAlatModel();
        $this->outBroadcast = new OutBroadcastModel();
        $this->crewOb = new CrewObModel();
        $this->dinasShifting = new DinasShiftingModel();
        $this->crewDinasShif = new CrewDinasShiftingModel();
        // $this->contekanNomorSuratManualModel= new NomorSuratManualModel();
        $this->nomorSuratTugasModel = new NomorSuratTugasModel();
    }

    public function index()

    {
        $getInLogin = user_id();
        // dd($this->users->proceduregetAcaraOBFromIDUser($getInLogin));
       
        $data = [
            // 'AllShowNamaPemberi' => $this->users->procedureGetNamaPemberi($getInLogin),
            'AllShowNamaPemberi' => $this->users->proceduregetALLNamaPemberiPinjamanForKelola(),
            'getNamaPenerimaPinjam' => $this->users->getUsers(),
            // 'AllShowNamaPenerima' => $this->users->procedureGetNamaPenerima($getInLogin),
            'AllShowNamaPenerima' => $this->users->proceduregetAllNamaPenerimaPinjamanForKelola(),
            'getNamaPemberiPinjam' => $this->users->getUsers(),
            // 'getCrewDinasOBByIDUser' => $this->users->procedureGetCrewDinasByIDUser($getInLogin),
            'getAcaraOBFromIDUser' => $this->users->proceduregetAcaraOBFromIDUser($getInLogin),
            'showAllJoinsOBKategori' => $this->outBroadcast->getOBJointKategori(),
            'allDataOutBroadcast' => $this->crewOb->getIdOutBroadcast(),
            'allUsers' => $this->users->getUsers(),
            // 'contekanNomorSuratTerakhir'=> $this->contekanNomorSuratManualModel->dataNomorSuratManual(),
            'contekanNomorSuratAuto'=> $this->nomorSuratTugasModel->autoNomorSurat()

        ];
        return view('admin/kelola-surat-tugas-ob-dan-peminjaman/index', $data);
    }

    public function edit_nomor_surat_tugas_pemberi_pinjam($idPeminjamanAlat)
    {
        // dd($this->peminjaman_alat->getPeminjamanAlat($idPeminjamanAlat));
        $data=[
            'getIdPeminjamanAlat'=>$this->peminjaman_alat->getPeminjamanAlat($idPeminjamanAlat)
        ];

        return view('admin/kelola-surat-tugas-ob-dan-peminjaman/edit-nomor-surat-tugas-pemberi-pinjam',$data);
    }


    public function update_nomor_surat_tugas_pemberi_pinjam($idPinjam)
    {
        $rules = [
            'no_surat_pemberi_pinjam' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nomor surat harus di isi.'

                ]
            ]

        ];
        
        $nomorSuratDiPeminjamanAlat = $this->request->getVar('no_surat_pemberi_pinjam');

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }

        $this->peminjaman_alat->save([
            'id_pinjam'=> $idPinjam,
            'nomor_surat_pemberi' => $nomorSuratDiPeminjamanAlat,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,edit nomor surat pemberi ' . $nomorSuratDiPeminjamanAlat);
        return redirect()->to('admin/kelola-surat-tugas-ob-dan-peminjaman');
    }


    public function edit_nomor_surat_tugas_penerima_pinjam($idPeminjamanAlat)
    {
        // dd($this->peminjaman_alat->getPeminjamanAlat($idPeminjamanAlat));
        $data=[
            'getIdPeminjamanAlatForPenerima'=>$this->peminjaman_alat->getPeminjamanAlat($idPeminjamanAlat)
        ];

        return view('admin/kelola-surat-tugas-ob-dan-peminjaman/edit-nomor-surat-tugas-penerima-pinjam',$data);
    }
    public function update_nomor_surat_tugas_penerima_pinjam($idPinjam)
    {
        $rules = [
            'no_surat_penerima_pinjam' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nomor surat harus di isi.'

                ]
            ]

        ];
        
        $nomorSuratDiPeminjamanAlat = $this->request->getVar('no_surat_penerima_pinjam');

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }

        $this->peminjaman_alat->save([
            'id_pinjam'=> $idPinjam,
            'nomor_surat_penerima' => $nomorSuratDiPeminjamanAlat,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,edit nomor surat penerima ' . $nomorSuratDiPeminjamanAlat);
        return redirect()->to('admin/kelola-surat-tugas-ob-dan-peminjaman');
    }

    public function edit_nomor_surat_tugas_ob($idOb)
    {
        // dd($this->outBroadcast->getShowOutBroadcast($idOb));
        $data=[
            'getIdOutBroadcast'=>$this->outBroadcast->getShowOutBroadcast($idOb)
        ];

        return view('admin/kelola-surat-tugas-ob-dan-peminjaman/edit-nomor-surat-tugas-out-broadcast',$data);
    }
    public function update_nomor_surat_tugas_ob($idOB)
    {
        $rules = [
            'no_surat_ob' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nomor surat harus di isi.'

                ]
            ]

        ];
        
        $nomorSuratOutBroadcast = $this->request->getVar('no_surat_ob');

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }

        $this->outBroadcast->save([
            'id_ob'=> $idOB,
            'nomor_surat' => $nomorSuratOutBroadcast,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,edit nomor surat out broadcast ' . $nomorSuratOutBroadcast);
        return redirect()->to('admin/kelola-surat-tugas-ob-dan-peminjaman');
    }

    
}
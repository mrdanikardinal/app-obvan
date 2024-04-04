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

class User extends BaseController
{

    protected $users;
    protected $peminjaman_alat;
    protected $outBroadcast;
    protected $crewOb;
    protected $dinasShifting;
    protected $crewDinasShif;
    protected $helpers = (['form']);



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
        if (user_id() === $idUser) {
            $data = [
                'allDataJoinShiftDanJoinNamaAcara' => $this->dinasShifting->procedureShowAllDinasShifting($idUser),
                'allDataDinasShifting' => $this->crewDinasShif->getIdCrewDinasShifting(),
                'allUsers' => $this->users->getUsers()
            ];
            return view('surat-tugas/shifting', $data);
        }
        return redirect()->to('surat-tugas');
    }
    public function lembur($idUsers)
    {
        if (user_id() === $idUsers) {
            $data = [
                'allDataJoinShiftDanJoinNamaAcara' => $this->dinasShifting->procedureShowAllDinasLembur($idUsers),
                'allDataDinasShifting' => $this->crewDinasShif->getIdCrewDinasShifting(),
                'allUsers' => $this->users->getUsers()
            ];
            return view('surat-tugas/lembur', $data);
        }
        return redirect()->to('surat-tugas');
    }
    public function setting_user($idUser)
    {

        // 'validation' => \Config\Services::validation(),
        if ($idUser === user_id()) {
            session();
            $data = [
                'validation' => \Config\Services::validation()
            ];
            return view('user/settings_user', $data);
        }
        return redirect()->back()->withInput();
    }
    public function update_password($idUser)
    {

        session();

        //========================benar

        if (user_id() === $idUser) {
            $passwordLama = $this->request->getVar('password_lama');
            $passwordBaru = $this->request->getVar('password_baru');
            $passwordKonfirmasi = $this->request->getVar('password_konfirmasi');

            if($passwordLama||$passwordBaru||$passwordKonfirmasi==''){
                dd("text field ada yang kosong");
            }

       
            $passwordLama = $this->request->getVar('password_lama');
            $passwordBaru = $this->request->getVar('password_baru');
            $varHash = $this->users->getUsers($idUser);

            if (Password::verify($passwordLama, $varHash['password_hash'])) {
                $this->users->save([
                    'id' => $idUser,
                    'password_hash' => Password::hash($passwordBaru)
                ]);
                session()->setFlashdata('pesan', 'Berhasil,Update Password');
                redirect()->back()->withInput();
                // return redirect()->to(base_url('logout'));
            }else if(!Password::verify($passwordLama, $varHash['password_hash'])){
                session()->setFlashdata('passwordLamaSalah', 'Gagal!, password lama anda salah, periksalah kembali');
                return redirect()->back()->withInput();
            }
            return redirect()->back()->withInput();
        }

        // ============================EndBenar

    }
}

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

        // $entity = new User();
        // $newPassword = $this->request->getPost('new_password');
        // $entity->setPassword($newPassword);
        // $hash  = $entity->password_hash;
        // $users->update($idUser,['password_hash' => $hash]);


        if (user_id() === $idUser) {
            $idUserReset = $this->users->getUsers($idUser);

            return view('user/settings_user');
        }
        return redirect()->to('surat-tugas');
    }
    public function update_password($idUser)

    {

        // Ambil hash password dari database
        $hashed_password_from_database = '$2y$10$g/IR8wj9ULqfF8..AVFk3.Nmc9y2OeqQ9rJm2sBcdiPT5HlM.JJTO';
        $hashed_password_from_database = '$2y$10$g/IR8wj9ULqfF8..AVFk3.Nmc9y2OeqQ9rJm2sBcdiPT5HlM.JJTO';
        

        // Verifikasi password saat pengguna mencoba masuk
        $login_password = "password_pengguna"; // Password yang diinputkan oleh pengguna pada form login

        // Debugging: Tampilkan nilai hash password dan sandi yang dimasukkan oleh pengguna
        echo "Hash password dari database: " . $hashed_password_from_database . "<br>";
        echo "Sandi yang dimasukkan oleh pengguna: " . $login_password . "<br>";

        if (password_verify($login_password, $hashed_password_from_database)) {
            // Password cocok, izinkan pengguna untuk masuk
            echo "Selamat datang!";
        } else {
            // Password tidak cocok
            echo "Username atau password salah.";
        }

        dd();








        // $validation->setRules([
        //     'username' => 'required',
        //     'password' => 'required|strong_password'
        // ]);


        // $hashed = '$2y$10$nbWWdduwmxJBhj12LeTg3.wvH9tIPMvDsaZVsRUpLxzMZhzEszzMW';

        // $hashed = password_hash($hashed, PASSWORD_BCRYPT);
        // $password = 'n3ngg4l4';

        // if (password_verify($password, $hashed)) {
        //     echo 'success';
        // } else {
        //     echo 'fail';
        // }
        // dd();




        $idUserReset = $this->users->getUsers($idUser);
        // $hashed = $idUserReset['password_hash'];
        $hashed = '$2y$10$nbWWdduwmxJBhj12LeTg3.wvH9tIPMvDsaZVsRUpLxzMZhzEszzMW';
        $passwordLama = $this->request->getVar('password');
        $passwordBaru = $this->request->getVar('Bpassword');
        dd(password_verify('n3ngg4l4', $hashed));


        if (user_id() === $idUser) {

            // $rules = [
            //     'password' => 'required',
            //     'Bpassword' => 'required|strong_password',
            //     'KBpassword' => 'required|matches[Bpassword]',

            // ];
            // if (!$this->validate($rules)) {

            //     return redirect()->back()->withInput();
            // }


            if (password_verify($passwordBaru, $hashed)) {
                $this->users->save([
                    'id' => $idUserReset,
                    'password_hash' => Password::hash($this->request->getVar($passwordBaru))
                ]);
                session()->setFlashdata('pesan', 'Berhasil,Update Password');
                return redirect()->to(base_url('logout'));
            }


            // return view('user/settings_user');
        }
    }
}

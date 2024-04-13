<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Myth\Auth\Password;

class KelolaPengguna extends BaseController
{
    protected $modelUsers;


    public function __construct()
    {
        $this->modelUsers = new UsersModel();
    }


    public function index()
    {
        $getDataUser = $this->modelUsers->getUsers();
        // dd($getDataUser);
        $data = [
            'allGetDataUsers' => $getDataUser
        ];

        return view("admin/kelola-pengguna/index", $data);
    }
    public function setting($idUser)
    {

        $getDataUser = $this->modelUsers->getUsers($idUser);
        // dd($getDataUser);
        $data = [
            'getData' => $getDataUser
        ];

        return view('admin/kelola-pengguna/setting', $data);
    }
    public function update($iduser)
    {

        // dd($this->mod)
        // $getDataUser= $this->modelUsers->getUsers($iduser);
        // dd($this->request->getVar('setting'));

        $this->modelUsers->save([
            'id' => $iduser,
            'active' => $this->request->getVar('setting')
        ]);
        session()->setFlashdata('pesan', 'Berhasil,Update pengguna ID ' . $iduser);
        return redirect()->to('admin/kelola-pengguna');
    }


    public function reset_password()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/kelola-pengguna/reset-password', $data);

        return redirect()->back()->withInput();
    }
    public function update_password($idUser)
    {
        session();
        $passwordLama = $this->request->getVar('token');
        $passwordBaru = $this->request->getVar('password_baru');
        $passwordKonfirmasi = $this->request->getVar('password_konfirmasi');
        //========================benar
        $rules = [
            'token' => 'required',
            'password_baru' => 'required',
            'password_konfirmasi' => 'required|matches[password_baru]'
        ];
        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }

            // $passwordLama = $this->request->getVar('password_lama');
            // $passwordBaru = $this->request->getVar('password_baru');
            // $passwordKonfirmasi = $this->request->getVar('password_konfirmasi');
            $varHash = $this->modelUsers->getUsers($idUser);

            if (Password::verify($passwordLama, $varHash['password_hash'])) {
                $this->modelUsers->save([
                    'id' => $idUser,
                    'password_hash' => Password::hash($passwordBaru)
                ]);
                // session()->setFlashdata('pesan', 'Berhasil,Update Password');
                // redirect()->back()->withInput();
                return redirect()->to(base_url('logout'));
            } else if (!Password::verify($passwordLama, $varHash['password_hash'])) {
                // dd('password lama salah');
                session()->setFlashdata('pesanGagal', 'Gagal, password lama salah!');
            }
            return redirect()->back()->withInput();
        
    }
}

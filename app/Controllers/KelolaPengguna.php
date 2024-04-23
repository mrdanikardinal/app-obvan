<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Myth\Auth\Password;
use Myth\Auth\Models\UserModel;

class KelolaPengguna extends BaseController
{
    protected $modelUsers;
    protected $modelUserForMyauth;
    protected $helpers = (['form','auth']);


    public function __construct()
    {
        $this->modelUsers = new UsersModel();
        $this->modelUserForMyauth= new UserModel();
    }


    public function index()
    {
        $getDataUser = $this->modelUsers->getUsers();
        $data = [
            'allGetDataUsers' => $getDataUser
        ];

        return view("admin/kelola-pengguna/index", $data);
    }
    public function setting($idUser)
    {

        $getDataUser = $this->modelUsers->getUsers($idUser);
        $data = [
            'getData' => $getDataUser
        ];

        return view('admin/kelola-pengguna/setting', $data);
    }
    public function update($iduser)
    {

        $this->modelUsers->save([
            'id' => $iduser,
            'active' => $this->request->getVar('setting')
        ]);
        session()->setFlashdata('pesan', 'Berhasil,Update pengguna ID ' . $iduser);
        return redirect()->to('admin/kelola-pengguna');
    }


    public function reset_password($idUser)
    {
        session();
        $getDataUser = $this->modelUsers->getUsers($idUser);

        $data = [
            'validation' => \Config\Services::validation(),
            'getIdUser' => $getDataUser
        ];
        return view('admin/kelola-pengguna/reset-password', $data);
    }
    
    public function update_password($idUser)
    {
        session();
        $passToken = $this->request->getVar('token');
        $passwordBaru = $this->request->getVar('password_baru');
        $rules = [
            'token' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'token harus di isi !'

                ]
            ],
            'password_baru' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'password baru harus di isi !',

                ]
            ],
            'password_konfirmasi' => [
                'rules'  => 'required|matches[password_baru]',
                'errors' => [
                    'required' => 'konfirmasi password harus di isi !',
                    'matches' => 'konfirmasi password tidak cocok !'

                ]
            ]

        ];

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
        $tokenDinamis = "212021202120212021202120212";
        $getDataUserName = $this->modelUsers->getUsers($idUser);
        if ($tokenDinamis === $passToken) {
            $this->modelUsers->save([
                'id' => $idUser,
                'password_hash' => Password::hash($passwordBaru)
            ]);
            session()->setFlashdata('pesan', 'Berhasil, reset password! '.$getDataUserName['fullname']);
            return redirect()->to('admin/kelola-pengguna');

        }else {
            session()->setFlashdata('pesanGagal', 'Gagal, reset password! '.$getDataUserName['fullname']);
               return redirect()->back()->withInput();

        }

    }
}

<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Myth\Auth\Password;
use Myth\Auth\Models\UserModel;

class KelolaPengguna extends BaseController
{
    protected $modelUsers;
    protected $modelUserForMyauth;
    protected $helpers = (['form']);


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


    // public function reset_password($idUser)
    // {
    //     session();
    //     $getDataUser = $this->modelUsers->getUsers($idUser);

    //     $data = [
    //         'validation' => \Config\Services::validation(),
    //         'getIdUser' => $getDataUser
    //     ];
    //     return view('admin/kelola-pengguna/reset-password', $data);
    // }
    public function reset_password($userId)
    {
        // Pastikan ada validasi izin di sini sesuai kebutuhan Anda
// =============================================
        // $db = \Config\Database::connect();
        // $query = $db->table('auth_groups_users')->where(['user_id' => $idUser, 'group_id' => 1])->get();
        // $isAdmin = $query->getResult() ? true : false;
        // dd()
// ==============================================
//         $db = \Config\Database::connect();

// $userId = 1; // ID pengguna yang ingin Anda periksa
// $groupId = 1; // ID grup yang Anda ingin cek (misalnya, ID grup admin)

// $query = $db->table('auth_groups_users')
//             ->where('user_id', $idUser)
//             ->where('group_id', $groupId)
//             ->limit(1);

// $result = $query->get()->getRow();

// if ($result) {
//     // Pengguna adalah bagian dari grup admin
//     echo "User Admin.";
// } else {
//     echo "Bukan Admin.";
// }
//   ==============================================================
   // Pastikan ada validasi izin di sini sesuai kebutuhan Anda
     // Pastikan ada validasi izin di sini sesuai kebutuhan Anda

      // Pastikan ada validasi izin di sini sesuai kebutuhan Anda
    //   $userModel = new UserModel();
    //     $db = \Config\Database::connect();

    //     // Lakukan query ke tabel auth_groups_users
    //     $query = $db->table('auth_groups_users')
    //                 ->where('user_id', $userId)
    //                 ->where('group_id', 1) // Ganti dengan ID grup admin
    //                 ->countAllResults();

    //     // Jika pengguna belum menjadi admin, tambahkan ke grup admin
    //     if ($query == 0) {
    //         $db->table('auth_groups_users')->insert(['user_id' => $userId, 'group_id' => 1]); // Ganti dengan ID grup admin
    //         return redirect()->to('/dashboard')->with('success', 'User role changed to admin successfully.');
    //     } else {
    //         // Jika sudah admin, kembalikan dengan pesan peringatan
    //         return redirect()->to('/dashboard')->with('warning', 'User is already an admin.');
    //     }

// ===========================================================================
  // Pastikan ada validasi izin di sini sesuai kebutuhan Anda

  $userModel = new UserModel();

  // Periksa apakah pengguna sudah menjadi admin
  $user = $userModel->find($userId);
  if (!$user) {
      return redirect()->to('/dashboard')->with('error', 'User not found.');
  }

  if ($user->hasPermission('admin')) {
      return redirect()->to('/dashboard')->with('warning', 'User is already an admin.');
  }

  // Tambahkan peran admin ke pengguna
  $userModel->withPermission('admin')->addPermissionToUser($userId);

  // Perbarui sesi pengguna
  $userModel->updateSession($userId, $user);

  return redirect()->to('/dashboard')->with('success', 'User role changed to admin successfully.');


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

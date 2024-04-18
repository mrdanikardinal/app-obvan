<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        // Anda dapat menambahkan logika login kustom di sini jika diperlukan

        // Alihkan ke metode kontroler login Myth/Auth
        return redirect()->route('login');
    }
}

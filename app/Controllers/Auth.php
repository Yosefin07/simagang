<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function logout()
    {
        session()->destroy(); // Menghapus semua session
        return redirect()->to('/registrasi'); // Redirect ke halaman login
    }
}

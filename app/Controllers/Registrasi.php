<?php

namespace App\Controllers;

use App\Models\UserModel;

class Registrasi extends BaseController
{
    public function index()
    {
        return view('simagang/registrasi'); // sesuai lokasi file
    }

    public function save()
    {
        $userModel = new UserModel();
        $password = $this->request->getPost('password');
        $repassword = $this->request->getPost('repassword');

        if ($password !== $repassword) {
            return redirect()->back()->with('error', 'Password tidak sama');
        }

        $userModel->insert([
        'nickname' => $this->request->getPost('nickname'),
        'username' => $this->request->getPost('username'),
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role'     => $this->request->getPost('role')
        ]);


        return redirect()->to('/masuk')->with('success', 'Registrasi berhasil, silakan login');
    }
}

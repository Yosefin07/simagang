<?php

namespace App\Controllers;

use App\Models\UserModel;

class Masuk extends BaseController
{
    public function index()
    {
        return view('simagang/masuk'); // sesuai lokasi file
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'isLoggedIn' => true,
                 'user_id'    => $user['id'], 
                'username'   => $user['username'],
                'role'       => $user['role'],
            ]);

            //  dd($user, session()->get());

            // arahkan sesuai role
            if ($user['role'] === 'mahasiswa') {
            return redirect()->to('/mahasiswa');
            } elseif ($user['role'] === 'mitra') {
            return redirect()->to('/mitra');
        }
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }
}

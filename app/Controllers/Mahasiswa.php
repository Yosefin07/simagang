<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    public function index(): string
    {
       
        return view('mhs/mahasiswa');
        
    }
    public function indexx()
{
    if (!session()->get('isLoggedIn') || session()->get('role') !== 'mahasiswa') {
        return redirect()->to('/masuk')->with('error', 'Akses ditolak.');
    }

    return view('mahasiswa/index'); // ganti dengan view kamu
}

}

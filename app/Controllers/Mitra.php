<?php

namespace App\Controllers;

use App\Models\MitraModel;

class Mitra extends BaseController
{
    public function index(): string
    {
        return view('mitra/mitra');
    }

    public function listLowongan()
    {
        $mitraId = session()->get('user_id');
        $model = new MitraModel();
        $mitra = $model->find($mitraId);

        // Cek apakah sudah di-ACC
        if ($mitra['status_acc'] != 1) {
            return redirect()->to('/validasiformulir')->with('error', 'Akun Anda belum di-ACC');
        }

        return view('mitra/listLowongan'); // Buat view untuk lowongan
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/register');
    }
    
}

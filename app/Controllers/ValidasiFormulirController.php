<?php

namespace App\Controllers;

use App\Models\MitraModel;

class ValidasiFormulirController extends BaseController
{
    public function index(): string
{
    $model = new \App\Models\MitraModel();

    // Ambil role dari session
    $role = session()->get('role');
    $user_id = session()->get('user_id');

    // Jika mitra, tampilkan hanya data miliknya
    if ($role === 'mitra') {
        $data['mitra'] = $model->where('user_id', $user_id)->findAll();
    } else {
        // Admin bisa melihat semua
        $data['mitra'] = $model->findAll();
    }

    return view('mitra/validasiformulir', $data);
}

    // Fungsi untuk ACC mitra
    public function acc($id)
    {
        $model = new MitraModel();
        $model->update($id, ['status_acc' => 1]); // Ubah status jadi ACC
        return redirect()->to('/validasiformulir')->with('success', 'Mitra berhasil di-ACC');
    }
}

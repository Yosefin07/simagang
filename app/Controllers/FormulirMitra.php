<?php

namespace App\Controllers;
use App\Models\MitraModel;

class FormulirMitra extends BaseController
{
    // Tampilkan form input mitra
    public function index()
    {
        return view('mitra/formulir_mitra');
    }

    // Simpan data dan langsung tampilkan view validasi
    public function simpan()
    {
        $nama = $this->request->getPost('nama');
        $deskripsi = $this->request->getPost('deskripsi');
        $posisi = $this->request->getPost('posisi');

        $model = new MitraModel();
        $model->save([
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'posisi' => $posisi,
            'user_id' => session()->get('user_id')

        ]);

        // Langsung redirect ke form dengan pesan sukses
        return redirect()->to('/formulir-mitra')->with('success', 'Pendaftaran berhasil! Silakan tunggu validasi.');
    }

    // Akses langsung ke halaman validasi
    public function validasi()
    {
        $model = new MitraModel();
        $data['mitra'] = $model->findAll();
        return view('mitra/validasi', $data);
    }
}

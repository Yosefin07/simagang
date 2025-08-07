<?php

namespace App\Controllers;

use App\Models\MitraModel;

class ValidasiController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new MitraModel();
    }

    public function index(): string
    {
        $data['mitra'] = $this->model->findAll();
        return view('admin/validasiacc', $data);
    }

    public function acc($id)
    {
        // Pastikan data mitra ada

    $mitra = $this->model->find($id);
    if (!$mitra) {
        return redirect()->to('validasi')->with('error', 'Data mitra tidak ditemukan.');
    }

    // Ubah string 'Sudah Diacc' jadi angka 1
    $this->model->update($id, [
        'status_acc' => 1
    ]);

    return redirect()->to('validasi')->with('success', 'Mitra berhasil di-ACC.');
}


    public function delete($id)
    {
        // Cek apakah data mitra ada
        $mitra = $this->model->find($id);
        if (!$mitra) {
            return redirect()->to('validasi')->with('error', 'Data mitra tidak ditemukan.');
        }

        // Hapus data
         $this->model->delete($id);
        return redirect()->to('validasi')->with('success', 'Data mitra berhasil dihapus.');
    
    }
  
}

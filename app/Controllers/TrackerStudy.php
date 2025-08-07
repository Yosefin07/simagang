<?php

namespace App\Controllers;

use App\Models\TrackerStudyModel;

class TrackerStudy extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TrackerStudyModel();
    }

    // Menampilkan form tracker study
    public function index()
    {
        return view('mhs/trackerstudy');
    }

    // Menyimpan data tracker study
    public function store()
    {
        $data = [
            'nama'  => $this->request->getPost('nama'),
            'bulan' => $this->request->getPost('bulan'),
            'skill' => $this->request->getPost('skill')
        ];

        $this->model->insert($data);

        return redirect()->to('/validasiview');
    }

    // Menampilkan semua data untuk validasi
    public function validasi()
    {
        $data['tracker'] = $this->model->findAll();
        return view('mitra/validasiview', $data);
    }
    
}

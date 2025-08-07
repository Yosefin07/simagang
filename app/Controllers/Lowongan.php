<?php

namespace App\Controllers;

use App\Models\MitraModel;

class Lowongan extends BaseController
{
    public function index()
    {
        $model = new MitraModel();
        // Ambil hanya mitra yang sudah di-ACC
       $data['mitra'] = $model->findAll();

        return view('mhs/listLowonganMitra', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\MitraModel;

class DataMitra extends BaseController
{
    public function index(): string
    {
        $model = new MitraModel();
    $data['mitra'] = $model->findAll(); // ✅ nama disamakan
    return view('admin/DataMitra', $data);
    }
}

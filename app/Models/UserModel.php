<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'client'; // GANTI dari 'users' ke 'client'
    protected $primaryKey       = 'id';
    protected $returnType       = 'array'; // Bisa juga 'object' kalau mau
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nickname', 'username', 'password', 'role'];
    protected $useTimestamps    = true;

    protected $validationRules = [
        'username' => 'required|is_unique[client.username,id,{id}]',
        'password' => 'required',
        'nickname' => 'required',
        'role'     => 'required|in_list[mahasiswa,mitra]'
    ];

    protected $validationMessages = [];
    protected $skipValidation     = false;
}

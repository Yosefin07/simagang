<?php

namespace App\Models;

use CodeIgniter\Model;

class MitraModel extends Model
{
    protected $table = 'mitra';
    protected $primaryKey = 'id';
 protected $allowedFields = ['nama', 'deskripsi', 'posisi', 'status_acc', 'user_id'];}

<?php

namespace App\Models;

use CodeIgniter\Model;

class TrackerStudyModel extends Model
{
    protected $table = 'tracker_study';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'bulan', 'skill'];
}

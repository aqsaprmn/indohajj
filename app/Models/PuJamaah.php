<?php

namespace App\Models;

use \CodeIgniter\Model;

class PuJamaah extends Model
{
    protected $table = 'pu_jamaah';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_jamaah', 'kd_booking', 'nama', 'pob', 'dob', 'address', 'nationality', 'sex', 'nik', 'img_ktp'];
}

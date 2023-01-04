<?php

namespace App\Models;

use \CodeIgniter\Model;

class PuJamaahPaspor extends Model
{
    protected $table = 'pu_jamaah_paspor';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_jamaah', 'kd_booking', 'nama', 'pob', 'dob', 'tipe', 'nationality', 'sex', 'no_paspor', 'image', 'tgl_keluar', 'tgl_berakhir', 'kd_mrz', 'no_reg'];
}

<?php

namespace App\Models;

// use App\Models;
use CodeIgniter\Model;

class PuJamaahHarga extends Model
{
    protected $table = 'pu_jamaah_harga';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_jamaah', 'kd_booking', 'tipe', 'harga'];
}

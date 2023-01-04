<?php

namespace App\Models;

use CodeIgniter\Model;

class HoHotel extends Model
{
    protected $table = 'ho_hotel';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_hotel', 'desk', 'embed_map', 'j_makkah', 'j_madinah', 'gambar', 'harga_mulai'];
}

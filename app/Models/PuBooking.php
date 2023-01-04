<?php

namespace App\Models;

use \CodeIgniter\Model;

class PuBooking extends Model
{
    protected $table = 'pu_booking';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_pu', 'kd_booking', 'username', 'total_paket', 'total_jamaah', 'status'];
}

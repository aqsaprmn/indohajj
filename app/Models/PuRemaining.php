<?php

namespace App\Models;

use \CodeIgniter\Model;

class PuRemaining extends Model
{
    protected $table = 'pu_paket_remaining';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_pu', 'remaining'];
}

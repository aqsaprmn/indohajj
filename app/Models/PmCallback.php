<?php

namespace App\Models;

use CodeIgniter\Model;

class PmCallback extends Model
{
    protected $table = 'pm_callback';
    protected $useTimestamps = true;
    protected $allowedFields = ['payload', 'received_date'];
}

<?php

namespace App\Models;

use \CodeIgniter\Model;

class VisaModel extends Model
{
    protected $table = 'vs_passport';
    // protected $useTimestamps = true;
    protected $allowedFields = ['reg_id', 'pass_no', 'nationality', 'place_issued', 'date_issued', 'date_expired', 'pass_file'];
}

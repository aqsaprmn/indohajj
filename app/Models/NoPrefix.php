<?php

namespace App\Models;

use \CodeIgniter\Model;

class NoPrefix extends Model
{
    protected $table = 'no_prefix';
    protected $useTimestamps = true;
    protected $allowedFields = ['prefix_cd', 'nama', 'numb'];
}

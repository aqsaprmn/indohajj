<?php

namespace App\Models;

use \CodeIgniter\Model;

class UserDataModel extends Model
{
    protected $table = 'us_user_data';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'name', 'nik', 'dob', 'pob', 'sex', 'address', 'nationality', 'image', 'ktp'];
    // protected $createdField = 'created_at';
}

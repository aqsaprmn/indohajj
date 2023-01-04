<?php

namespace App\Models;

use \CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'us_user';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'email', 'hp', 'password', 'role_id', 'status_approval', 'kd_referral', 'sb_referral'];
}

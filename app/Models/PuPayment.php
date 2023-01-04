<?php

namespace App\Models;

use \CodeIgniter\Model;

class PuPayment extends Model
{
    protected $table = 'pu_payment';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_booking', 'username', 'request_status', 'message', 'status', 'payment_ref_id', 'payment_ref_merchant', 'amount', 'channel', 'time_request', 'payload_request', 'updated_time_callback', 'updated_status_callback', 'updated_payload_callback'];
}

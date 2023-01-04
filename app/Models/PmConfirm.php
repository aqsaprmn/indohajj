<?php

namespace App\Models;

use CodeIgniter\Model;

class PmConfirm extends Model
{
    protected $table = 'pm_confirm';
    protected $useTimestamps = true;
    protected $allowedFields = ['payment_ref_id', 'payment_ref_merchant', 'payment_method', 'payment_method_code', 'total_amount', 'fee_merchant', 'fee_customer', 'total_fee', 'amount_received', 'is_closed_payment', 'status', 'paid_at', 'note'];
}

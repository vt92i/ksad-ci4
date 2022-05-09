<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model {
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'no_customer',
        'gender',
        'address',
        'email',
        'phone',
    ];
}
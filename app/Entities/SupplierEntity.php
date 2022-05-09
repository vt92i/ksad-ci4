<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SupplierEntity extends Entity {
    protected $datamap = [
        'nama' => 'name',
        'alamat' => 'address',
        'email' => 'email',
        'telepon' => 'phone',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [];

    public function setEmail($email) {
        return $this->attributes['email'] = strtolower($email);
    }

    public function getName() {
        return strtoupper($this->attributes['name']);
    }
}
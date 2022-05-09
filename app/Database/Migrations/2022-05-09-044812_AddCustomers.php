<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCustomers extends Migration {
    public function up() {
        $this->forge->addField([
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => false,
            ],
            'no_customer' => [
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => false,
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
                'null' => false,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => false,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('customer_id', true);
        $this->forge->createTable('customers');
    }

    public function down() {
        $this->forge->dropTable('customers');
    }
}
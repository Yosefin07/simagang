<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormMitra extends Migration
{
   public function up()
{
    $this->forge->addField([
        'id' => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'nama' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'deskripsi' => [
            'type' => 'TEXT',
        ],
        'posisi' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
         'status_acc' => [ // tambahkan kolom ini
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
        'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('FormMitra');
}

public function down()
{
    $this->forge->dropTable('FormMitra');
}
}

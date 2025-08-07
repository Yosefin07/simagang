<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTrackerStudy extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'bulan' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'skill' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tracker_study');
    }

    public function down()
    {
        $this->forge->dropTable('tracker_study');
    }
}

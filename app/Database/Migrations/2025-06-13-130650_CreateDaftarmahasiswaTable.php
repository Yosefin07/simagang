<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDaftarmahasiswaTable extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 15,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'username' => [
            'type'       => 'VARCHAR',
            'constraint' => '50',
            ],
            
            'tempat_tanggal_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'posisi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'mitra' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'status_acc' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'default' => 'Belum Diacc',
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('daftarmahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('daftarmahasiswa');
    }
}

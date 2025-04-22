<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WanderLust extends Migration
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
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'desc' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'image' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'price' => [
                'type' => 'INT',
                'null' => true,
            ],
            'location' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'country' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('wanderLustData');
    }

    public function down()
    {
        //
    }
}

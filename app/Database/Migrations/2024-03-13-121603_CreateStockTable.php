<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStockTable extends Migration
{
    protected $DBGroup = 'default';
    protected $table = 'stock';

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'serial'
            ],
            'item_name' => [
                'type' => 'varchar',
                'constrain' => 20,
            ],
            'stock' => [
                'type' => 'int',
                'unsigned' => true
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => 'NOW()'
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => 'NOW()'
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}

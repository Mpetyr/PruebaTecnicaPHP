<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HistoriasMedicas extends Migration
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
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
            ],
            'fecha_nacimiento' => [
                'type'       => 'date',
            ],
            'sexo' => [
                'type'       => 'CHAR',
                'constraint' => '10',
            ],
            'estatura' => [
                'type'       => 'FLOAT',
            ],
            'peso' => [
                'type'       => 'FLOAT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('historias_medicas');
    }

    public function down()
    {
        $this->forge->dropTable('historias_medicas');
    }
}

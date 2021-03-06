<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idkategori'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'icon'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '120',
			],
			'icon_color'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '120',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'     		 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'     		 => true,
			],
		]);
		$this->forge->addKey('idkategori', true);
		$this->forge->createTable('kategori');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('kategori');
	}
}

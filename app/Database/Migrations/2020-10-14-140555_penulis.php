<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penulis extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idpenulis'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'alamat' => [
				'type'           => 'TEXT',
			],
			'kota' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'no_telp' => [
				'type'           => 'VARCHAR',
				'constraint'     => '15',
			],
			'tgl_insert' => [
				'type'           => 'DATETIME',
				'null'     		 => true,
			],
			'tgl_update' => [
				'type'           => 'DATETIME',
				'null'     		 => true,
			],
		]);
		$this->forge->addKey('idpenulis', true);
		$this->forge->createTable('penulis');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('penulis');
	}
}

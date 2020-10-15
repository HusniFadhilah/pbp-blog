<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idadmin'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
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
		$this->forge->addKey('idadmin', true);
		$this->forge->createTable('admin');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('admin');
	}
}

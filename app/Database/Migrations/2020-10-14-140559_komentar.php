<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Komentar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idkomentar'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'idpost'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'idpenulis'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'isi' => [
				'type'           => 'TEXT',
			],
			'tgl_update' => [
				'type'           => 'DATETIME',
				'null'     		 => true,
			],
		]);
		$this->forge->addKey('idkomentar', true);
		$this->forge->createTable('komentar');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('komentar');
	}
}

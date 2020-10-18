<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idpost'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'idkategori'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'idpenulis'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'slug'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			],
			'isi_post'       => [
				'type'           => 'text',
			],
			'file_gambar'       => [
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
		$this->forge->addKey('idpost', true);
		// $this->forge->addForeignKey('idkategori', 'kategori', 'idkategori', 'RESTRICT', 'RESTRICT');
		// $this->forge->addForeignKey('idpenulis', 'penulis', 'idpenulis', 'RESTRICT', 'RESTRICT');
		$this->forge->createTable('post');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('post');
	}
}

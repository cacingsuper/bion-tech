<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MediaUplod extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'title'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'alt' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'filename' => [
				'type' => 'TEXT',
			],
			'path' => [
				'type' => 'TEXT',
			],
			'size' => [
				'type' => 'INT',
			],
			'ext_file' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('media_upload');
	}

	public function down()
	{
		$this->forge->dropTable('media_upload');
	}
}

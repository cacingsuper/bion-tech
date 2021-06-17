<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Setting extends Migration
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
			'logo_url' => [
				'type'           => 'TEXT',
				'null'			=> true,
			],
			'brand_url' => [
				'type'           => 'TEXT',
				'null'			=> true,
			],
			'title' => [
				'type'           => 'TEXT',
				'null'			=> true,
			],
			'email' => [
				'type'      => 'VARCHAR',
				'null'		=> true,
				'constraint' => 50,
			],
			'phone' => [
				'type'	=> 'VARCHAR',
				'constraint' => 15,
				'null'	=> true
			],
			'address' => [
				'type'	=> 'TEXT',
				'null'	=> true
			],
			'country' => [
				'type'	=> 'VARCHAR',
				'null'	=> true,
				'constraint' => 50,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('setting');
	}

	public function down()
	{
		$this->forge->dropTable('setting');
	}
}

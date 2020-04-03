<?php

namespace Fuel\Migrations;

class Create_clients
{
	public function up()
	{
		\DBUtil::create_table('clients', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'client_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'client_kana' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'client_remarks' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'is_deleted' => array('null' => false, 'type' => 'boolean'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('clients');
	}
}
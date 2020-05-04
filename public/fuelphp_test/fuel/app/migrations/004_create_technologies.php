<?php

namespace Fuel\Migrations;

class Create_technologies
{
	public function up()
	{
		\DBUtil::create_table('technologies', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'technology_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'is_deleted' => array('null' => false, 'type' => 'boolean'),
			'created_at' => array('null' => false, 'type' => 'datetime'),
			'updated_at' => array('null' => false, 'type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('technologies');
	}
}
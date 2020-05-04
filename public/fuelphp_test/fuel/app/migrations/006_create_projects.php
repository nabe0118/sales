<?php

namespace Fuel\Migrations;

class Create_projects
{
	public function up()
	{
		\DBUtil::create_table('projects', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'project_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'client_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'technology' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'development' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'start_date' => array('null' => false, 'type' => 'date'),
			'delivery_date' => array('null' => false, 'type' => 'date'),
			'price' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'price_section' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'price_flag' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'order_expectation' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'order_status' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'employee_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'user' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'memo' => array('null' => false, 'type' => 'text'),
			'is_deleted' => array('null' => false, 'type' => 'boolean'),
			'created_at' => array('null' => false, 'type' => 'datetime'),
			'updated_at' => array('null' => false, 'type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('projects');
	}
}
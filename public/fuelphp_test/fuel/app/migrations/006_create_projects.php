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
			'technology_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'development_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'start_date' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'delivery_date' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'price' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'price_section' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'order_expectation' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'order_status' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'project_manager' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'employee_id' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'memo' => array('null' => false, 'type' => 'text'),
			'is_deleted' => array('null' => false, 'type' => 'boolean'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('projects');
	}
}
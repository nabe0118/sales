<?php

namespace Fuel\Migrations;

class Create_employees
{
	public function up()
	{
		\DBUtil::create_table('employees', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'full_name' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'name_kana' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'affiliation' => array('constraint' => 255, 'null' => false, 'type' => 'int'),
			'tenure_flag' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'user_remarks' => array('null' => false, 'type' => 'text'),
			'hire_date' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'is_deleted' => array('null' => false, 'type' => 'boolean'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('employees');
	}
}
<?php

namespace Fuel\Migrations;

class Create_members
{
	public function up()
	{
		\DBUtil::create_table('members', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'employee_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'full_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'name_kana' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'email' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'password' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'authority' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'affiliation' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'tenure_flag' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'user_remarks' => array('null' => false, 'type' => 'text'),
			'hire_date' => array('null' => false, 'type' => 'date'),
			'is_deleted' => array('null' => false, 'type' => 'boolean'),
			'created_at' => array('null' => false, 'type' => 'datetime'),
			'updated_at' => array('null' => false, 'type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('members');
	}
}
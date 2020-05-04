<?php

namespace Fuel\Migrations;

class Create_posts
{
	public function up()
	{
		\DBUtil::create_table('posts', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'title' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'slug' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'summary' => array('null' => false, 'type' => 'text'),
			'body' => array('null' => false, 'type' => 'text'),
			'user_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'created_at' => array('null' => false, 'type' => 'datetime'),
			'updated_at' => array('null' => false, 'type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('posts');
	}
}
<?php
use Orm\Model;

class Model_Technology extends Model
{
	protected static $_properties = array(
		'id',
		'technology_name',
		'is_deleted',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('technology_name', 'Technology Name', 'required|max_length[255]');
		// $val->add_field('is_deleted', 'Is Deleted', 'required');

		return $val;
	}

}

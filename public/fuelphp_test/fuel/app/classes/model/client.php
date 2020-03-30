<?php
use Orm\Model;

class Model_Client extends Model
{
	protected static $_properties = array(
		'id',
		'client_name',
		'client_kana',
		'client_remarks',
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
		$val->add_field('client_name', 'Client Name', 'required|max_length[255]');
		$val->add_field('client_kana', 'Client Kana', 'required|max_length[255]');
		$val->add_field('client_remarks', 'Client Remarks', 'required|max_length[255]');
		// $val->add_field('is_deleted', 'Is Deleted', 'required');

		return $val;
	}

}

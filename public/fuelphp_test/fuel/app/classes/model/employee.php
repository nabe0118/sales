<?php
use Orm\Model;

class Model_Employee extends Model
{
	protected static $_properties = array(
		'id',
		'full_name',
		'name_kana',
		'email',
		'affiliation',
		'tenure_flag',
		'user_remarks',
		'hire_date',
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



	public static $affiliation = [
		1 => '東京スタッフ',
		2 => '九州スタッフ',
		3 => '派遣',
		4 => '外注',
		5 => 'その他',
	];

	public static $tenure_flag = [
		1 => '退職',
		2 => '在職',
	];



	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('full_name', 'Full Name', 'required|max_length[255]');
		$val->add_field('name_kana', 'Name Kana', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('affiliation', 'Affiliation', 'required|valid_string[numeric]');
		$val->add_field('tenure_flag', 'Tenure Flag', 'required|valid_string[numeric]');
		$val->add_field('user_remarks', 'User Remarks', 'required');
		$val->add_field('hire_date', 'Hire Date', 'required|valid_string[numeric]');
		// $val->add_field('is_deleted', 'Is Deleted', 'required');

		return $val;
	}

}

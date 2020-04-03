<?php
use Orm\Model;

class Model_Member extends Model
{
	protected static $_properties = array(
		'id',
		'employee_id',
		'full_name',
		'name_kana',
		'email',
		'password',
		'authority',
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

	public static $authority = [
		1 => '管理',
		2 => '一般',
	];

	protected static $_table_name = 'members';
	protected static $_primary_key = array('id');
	protected static $_belongs_to = array(
        // リレーションの関係性を示す名前を指定
			'member' => array(
            // 紐付けられるモデル  
            'model_to' => 'Model_Project',
            // このモデルのキー  :id
            'key_from' => 'employee_id',
            // 関連するモデルでのキー  :id
            'key_to' => 'employee_id',
            // 関係するテーブルが保存されるときに同時にアップデートするか
            'cascade_save' => false,
            // 親テーブルの関連レコードが削除されるときに同時に削除するか
            'cascade_delete' => false,
        ),
    );

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('employee_id', 'Employee Id', 'required|valid_string[numeric]');
		$val->add_field('full_name', 'Full Name', 'required|max_length[255]');
		$val->add_field('name_kana', 'Name Kana', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('password', 'Password', 'required|max_length[255]');
		$val->add_field('authority', 'Authority', 'required|valid_string[numeric]');
		// $val->add_field('affiliation', 'Affiliation', 'required|valid_string[numeric]');
		// $val->add_field('tenure_flag', 'Tenure Flag', 'required|valid_string[numeric]');
		// $val->add_field('user_remarks', 'User Remarks', 'required');
		// $val->add_field('hire_date', 'Hire Date', 'required|valid_string[numeric]');
		// $val->add_field('is_deleted', 'Is Deleted', 'required');

		return $val;
	}

}

<?php
use Orm\Model;

class Model_Project extends Model
{
	protected static $_properties = array(
		'id',
		'project_name',
		'client_id',
		'technology',
		'development',
		'start_date',
		'delivery_date',
		'price',
		'price_section',
		'price_flag',
		'order_expectation',
		'order_status',
		'employee_id',
		'user',
		'memo',
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



	public static $development = [
		1 => 'フルスクラッチ',
		2 => 'カスタマイズ',
		3 => 'パッケージ',
	];

	public static $price_section = [
		1 => '請負',
		2 => '保守',
		3 => '社内保持',
	];

	public static $price_flag = [
		1 => '確定',
		2 => '未確定',
	];

	public static $order_expectation = [
		1 => '低',
		2 => '中',
		3 => '高',
		4 => '注文済み',
	];

	public static $order_status = [
		1 => '商談中',
		2 => '進行中',
		3 => '請求済',
		4 => '完了',
		5 => '失注',
	];


	protected static $_primary_key = array('id');

	protected static $_table_name = 'projects';

	protected static $_has_many = array(
        // リレーション指定する際の関係性を示す名前を付ける
        'client' => array(
		// 紐づけるモデル  
		'model_to'       => 'Model_Client',
		// このモデルのキー
		// 反対側のモデルとの結合条件となる項目を示す
		'key_from'       => 'id',
		// 関連するモデルでのキー
		// 反対側のモデルで結合条件となる項目を示す
		'key_to'         => 'client_id',
		// 関係するテーブルが保存されるときに同時にアップデートするか
		'cascade_save'   => false,
		// 親テーブルの関連レコードが削除されるときに同時に削除するか
		'cascade_delete' => false,
        ),
    );



	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('project_name', 'Project Name', 'required|max_length[255]');
		$val->add_field('client_id', 'Client Id', 'required|valid_string[numeric]');
		$val->add_field('technology', 'Technology', 'required|max_length[255]');
		$val->add_field('development', 'Development', 'required|valid_string[numeric]');
		$val->add_field('start_date', 'Start Date', 'required|valid_string[numeric]');
		$val->add_field('delivery_date', 'Delivery Date', 'required|valid_string[numeric]');
		$val->add_field('price', 'Price', 'required|valid_string[numeric]');
		$val->add_field('price_section', 'Price Section', 'required|valid_string[numeric]');
		$val->add_field('price_flag', 'Price Flag', 'required|valid_string[numeric]');
		$val->add_field('order_expectation', 'Order Expectation', 'required|valid_string[numeric]');
		$val->add_field('order_status', 'Order Status', 'required|valid_string[numeric]');
		$val->add_field('employee_id', 'Employee Id', 'required|valid_string[numeric]');
		$val->add_field('memo', 'Memo', 'required');
		// $val->add_field('user', 'User', 'required|max_length[255]');
		// $val->add_field('is_deleted', 'Is Deleted', 'required');

		return $val;
	}

}

<?php
use Orm\Model;

class Model_Project extends Model
{
	protected static $_properties = array(
		'id',
		'project_name',
		'client_id',
		'technology_id',
		'development_id',
		'start_date',
		'delivery_date',
		'price',
		'price_section',
		'order_expectation',
		'order_status',
		'project_manager',
		'employee_id',
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

	public static $development_id = [
		1 => 'フルスクラッチ',
		2 => 'カスタマイズ',
		3 => 'パッケージ',
	];

	public static $price_section = [
		1 => '請負',
		2 => '社内',
	];

	public static $order_expectation = [
		1 => 'なし',
		2 => '低',
		3 => '高',
		4 => '内示',
		5 => '確定',
	];

	public static $order_status = [
		1 => '受注時',
		2 => '進行中',
		3 => '請求済',
		4 => '完了',
		5 => '失注',
	];

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('project_name', 'Project Name', 'required|max_length[255]');
		$val->add_field('client_id', 'Client Id', 'required|valid_string[numeric]');
		$val->add_field('technology_id', 'Technology Id', 'required|valid_string[numeric]');
		$val->add_field('development_id', 'Development Id', 'required|valid_string[numeric]');
		$val->add_field('start_date', 'Start Date', 'required|valid_string[numeric]');
		$val->add_field('delivery_date', 'Delivery Date', 'required|valid_string[numeric]');
		$val->add_field('price', 'Price', 'required|valid_string[numeric]');
		$val->add_field('price_section', 'Price Section', 'required|valid_string[numeric]');
		$val->add_field('order_expectation', 'Order Expectation', 'required|valid_string[numeric]');
		$val->add_field('order_status', 'Order Status', 'required|valid_string[numeric]');
		$val->add_field('project_manager', 'Project Manager', 'required|valid_string[numeric]');
		$val->add_field('employee_id', 'Employee Id', 'required|max_length[255]');
		$val->add_field('memo', 'Memo', 'required');
		// $val->add_field('is_deleted', 'Is Deleted', 'required');

		return $val;
	}

}

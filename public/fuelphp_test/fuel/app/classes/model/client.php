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
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);

	protected static $_created_at = 'created_at';
	protected static $_updated_at = 'updated_at';
	protected static $_mysql_timestamp = true;

	protected static $_table_name = 'clients';

	protected static $_primary_key = array('id');

    protected static $_belongs_to = array(
        // リレーションの関係性を示す名前を指定
        'client' => array(
            // 紐付けられるモデル  
            'model_to' => 'Model_Project',
            // このモデルのキー  :id
            'key_from' => 'id',
            // 関連するモデルでのキー  :id
            'key_to' => 'client_id',
            // 関係するテーブルが保存されるときに同時にアップデートするか
            'cascade_save' => false,
            // 親テーブルの関連レコードが削除されるときに同時に削除するか
            'cascade_delete' => false,
        ),
    );

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('client_name', 'Client Name', 'required|max_length[255]');
		$val->add_field('client_kana', 'Client Kana', 'required|max_length[255]');
		$val->add_field('client_remarks', 'Client Remarks', 'max_length[255]');
		// $val->add_field('is_deleted', 'Is Deleted', 'required');

		return $val;
	}

}

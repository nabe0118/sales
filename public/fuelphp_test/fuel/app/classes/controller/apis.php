<?php
/**
 * WebAPIとして機能する
 *
 */
class Controller_Apis extends \Controller_Rest
{
    
	public function put_refineday()
	{
		$this->format = 'json';
		$request = Input::get('all');
		// $data = array('data'=>var_dump($request));
		$data = array('hello'=>'こんにちは','status' => 200);

		return $this->response($data) ;
	}
}

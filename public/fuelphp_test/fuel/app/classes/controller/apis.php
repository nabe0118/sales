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
		$request = Input::json('all');
		// $data = array('data'=>var_dump($request));		
		// 'form' => input::post('form'),
		// 'to' =>input::post('to')
		
		// $data['projects'] = Model_Project::find('all');
		$data = Model_Project::find('all');

		// $data['index_order_status'] = Model_Project::$order_status;
		// $data['index_order_expectation'] = Model_Project::$order_expectation;

		$viewData = $this->createViewData();
		// $data['client_data'] = $viewData['client_data'];
		// $data['members_name'] = $viewData['members_name'];

		foreach((array)$data as $value)
		{

			foreach($viewData['members_name'] as $employee_id => $members_name)
			{
				// \Log::info($value['employee_id'].':'.$employee_id);

				if($value['employee_id']== $employee_id)
				{
					
					$value['members_name'] = $members_name;
					// \Log::info($value['members_name']);

				break;
				} 
			}


			foreach($viewData['client_data'] as $client_id => $client_name)
			{
				if($value['client_id']== $client_id)
				{
					$value['client_name'] = $client_name;
				break;
				} 
			}

			$value['price_kari'] = $value['price'];

			if($value['price_flag'])
			{
				$value['price_kari'] = '---------';
			}else{
				$value['price'] = '---------';
			}
			\Log::info($value['price_kari'].':'.$value['price']);



			// \Log::info($value['price_flag']);




			switch($value['order_status'])
			{
				case 1;
				$value['order_status'] = '商談中';
				break;
				case 2;
				$value['order_status'] = '進行中';
				break;
				case 3;
				$value['order_status'] = '請求済';
				break;
				case 4;
				$value['order_status'] = '完了';
				break;
				case 5;
				$value['order_status'] = '失注';
				break;
			}

			switch($value['order_expectation'])
			{
				case 1;
				$value['order_expectation'] = '低';
				break;
				case 2;
				$value['order_expectation'] = '中';
				break;
				case 3;
				$value['order_expectation'] = '高';
				break;
				case 4;
				$value['order_expectation'] = '内示';
				break;
				case 5;
				$value['order_expectation'] = '注文有';
				break;
			}



		}
		
		


		// //日付絞り込み
		// // $refineStartDay = '';
		// // $refineEndDay = '';
		// // $period = DB::select('id')->from('projects')->where('start_date','<',$refineStartDay)->where('delivery_date','<',$refineEndDay)->execute();

		// $period = DB::select('id')->from('projects')->where('start_date','>=',20200407)->where('delivery_date','<=',20200430)->execute();

		// var_dump($period);

		return $this->response($data) ;
	}

		//viewで渡すデーターをオブジェクト化
		public function createViewData()
		{
			$tmp=Model_Client::find('all',['select'=>['id','client_name']]);
			foreach($tmp as $value){
				$data['client_data'][$value['id']] = $value['client_name'];
			}
	
			$members=Model_Member::find('all',['select'=>['employee_id','full_name']]);
			foreach($members as $member){
				$data['members_name'][$member['employee_id']] = $member['full_name'];
			}
	
			return $data;
		}
}


<?php
/**
 * WebAPIとして機能する
 *
 */
class Controller_Apis extends \Controller_Rest
{
    
	public function get_refineday()
	{
		$this->format = 'json';
		$request = Input::json('all');
		$input_cond =  Input::get('cond');
		$input_order_by = input::get('order_by');


		//日付絞り込み
		$refineStart = $input_cond['from'];
		$refineEnd = $input_cond['to'];
		$order_expectation = $input_cond['order_expectation'];
		$order_status = $input_cond['order_status'];
	
		$query = DB::select()
					->from('projects')
					//クライアントテーブルを結合
					->join('clients', 'INNER')
					->on('clients.id', '=', 'projects.client_id')
					//メンバーテーブルを結合
					->join('members', 'INNER')
					->on('members.employee_id', '=', 'projects.employee_id')
					->where('members.tenure_flag','=',1)
					->where('clients.is_deleted', '=', 0);

		if ($refineStart) {
			$query->where('projects.delivery_date','>=',$refineStart);
		}
		if ($refineEnd) {
			$query->where('projects.delivery_date','<=',$refineEnd);
		}
		if ($order_expectation) {
			$query->where('projects.order_expectation','in',$order_expectation);
		}
		if ($order_status) {
			$query->where('projects.order_status','in',$order_status);
		}
		if($input_order_by){
			$query->order_by($input_order_by['field'],$input_order_by['order_by']);
		}

		$data = $query->execute();

		
		$viewData = $this->createViewData();

		$data2 = [];
		foreach($data as $value)
		{

			foreach($viewData['members_name'] as $employee_id => $members_name)
			{
				if($value['employee_id']== $employee_id)
				{
					$value['members_name'] = $members_name;
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


			//日付に/を入れる
			$value['start_date'] = date('Y/m/d',strtotime($value['start_date']));
			$value['delivery_date'] = date('Y/m/d',strtotime($value['delivery_date']));

			//金額に,を入れる
			// $value['price_kari'] = number_format($value['price']);
			// $value['price'] = number_format($value['price']);

			$value['price_kari'] = $value['price'];

			if($value['order_status'] == 1 ||$value['order_status'] == 5)
			{
				$value['price'] = 0;
			}else{
				$value['price_kari'] = 0;
			}


			switch($value['order_status'])
			{
				case 1;
				$value['order_status'] = '商談中';
				break;
				case 2;
				$value['order_status'] = '受注';
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

			$data2[] = $value; 

		}
		return $this->response($data2) ;
	}
		
		public function get_allmembers()
		{
			$this->format = 'json';
			$input_cond =  Input::get('cond');
			$input_order_by = input::get('order_by');

			$checked = $input_cond['flag'];
			$query = DB::select()->from('members')->where('id','>',0);
			

			if($checked != 1){
				$query->where('tenure_flag','=',1);
			}		
			if($input_order_by){
				$query->order_by($input_order_by['field'],$input_order_by['order_by']);
			}

			$membersdata = $query->execute();


			Log::info(print_r($membersdata,true));

			$data3 = [];
			foreach($membersdata as $value)
			{

				if($value['authority'] == 1)
				{
					$value['authority'] = '管理';
				}else{
					$value['authority'] = '一般';
				}


				if($value['tenure_flag'] == 1)
				{
					$value['tenure_flag'] = '在籍';
				}else{
					$value['tenure_flag'] = '退職';
				}
				$data3[] = $value; 
			}
		return $this->response($data3) ;
		}

		public function get_allclients()
		{
			$this->format = 'json';
			$input_order_by = input::get('order_by');

			$query = DB::select()->from('clients')->where('id','>',0);
				
			if($input_order_by){
				$query->order_by($input_order_by['field'],$input_order_by['order_by']);
			}

			$clientsdata = $query->execute();

			Log::info(print_r($clientsdata,true));

			$data4 = [];
			foreach($clientsdata as $value)
			{
				$data4[] = $value; 
			}

		return $this->response($data4) ;

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


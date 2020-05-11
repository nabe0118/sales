<?php

use Fuel\Core\DB;
use Fuel\Core\Model;

class Controller_Projects extends Controller_Template
{

	public function action_index()
	{

		$query = DB::select(
					'projects.*','clients.client_name','members.full_name'
		)
					->from('projects')
					//クライアントテーブルを結合
					->join('clients', 'INNER')
					->on('clients.id', '=', 'projects.client_id')
					//メンバーテーブルを結合
					->join('members', 'INNER')
					->on('members.employee_id', '=', 'projects.employee_id')
					->where('members.tenure_flag','=',1)
					->where('clients.is_deleted', '=', 0)
					->where('projects.order_status','in',[1,2,3]);

		$data['projects'] = $query->as_object()->execute();

		$data['index_order_status'] = Model_Project::$order_status;
		$data['index_order_expectation'] = Model_Project::$order_expectation;

		$viewData = $this->createViewData();
		$data['client_data'] = $viewData['client_data'];
		$data['members_name'] = $viewData['members_name'];
		
		//プロジェクトの合計金額
		$data['totalPriceConfirm'] = 0;
		$data['totalPriceEstimate'] = 0;

		foreach($data['projects'] as $v){
			if($v->order_status == 1 ||$v->order_status == 5){
				$data['totalPriceEstimate'] += $v->price;
			}else{
				$data['totalPriceConfirm']+= $v->price;

			}
		}

		$this->template->title = "Projects";
		$this->template->content = View::forge('projects/index', $data);
	}

	public function action_create()
	{
		$viewData = $this->createViewData();
		$data['client_data'] = $viewData['client_data'];
		$data['members_name'] = $viewData['members_name'];
		// $data['members_name'] = array_merge([null => '選択してください'],$data['members_name']);
		// $data['client_data'] = array_merge([null => '選択してください'],$data['client_data']);

		$data['today'] = date("Ymd");
		$data['lastDayOfMonth'] = date("Ymt");

		if (Input::method() == 'POST')
		{
			$val = Model_Project::validate('create');

			if ($val->run())
			{
				$project = Model_Project::forge(array(
					'project_name' => Input::post('project_name'),
					'client_id' => Input::post('client_id'),
					'technology' => Input::post('technology'),
					'development' => Input::post('development'),
					'start_date' => Input::post('start_date'),
					'delivery_date' => Input::post('delivery_date'),
					'price' => Input::post('price'),
					'price_section' => Input::post('price_section'),
					'price_flag' => Input::post('price_flag'),
					'order_expectation' => Input::post('order_expectation'),
					'order_status' => Input::post('order_status'),
					'employee_id' => Input::post('employee_id'),
					'memo' => Input::post('memo'),
					'user' => false,
					'is_deleted' => false,
				));

				//checkboxにcheckが入らなかったら
				if($project['price_flag'] == null){
					$project['price_flag'] = 0;
				}

				//radioボタンにcheckが入らなかったら
				if($project['development'] == 0){
					$project['development'] = 4;
				}

				//ステータスでの処理分け
				if($project['order_status'] == 2){
					$project['price_flag'] = 1;
				}

				if($project['price_flag'] == 3){
					$project['price_flag'] = 1;
				}

				if($project['price_flag'] == 4){
					$project['price_flag'] = 1;
				}


				if ($project and $project->save())
				{
					Session::set_flash('success', 'Added project #'.$project->id.'.');

					Response::redirect('projects');
				}

				else
				{
					Session::set_flash('error', 'Could not save project.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
				
			}
		}

		$this->template->title = "Projects";
		$this->template->content = View::forge('projects/create',$data);

	}

	public function action_edit($id = null)
	{
		$viewData = $this->createViewData();
		$data['client_data'] = $viewData['client_data'];
		$data['members_name'] = $viewData['members_name'];		

		$data['today'] = date("Ymd");
		$data['lastDayOfMonth'] = date("Ymt");

		is_null($id) and Response::redirect('projects');

		$query = DB::select()
					->from('projects')
					//クライアントテーブルを結合
					->join('clients', 'INNER')
					->on('clients.id', '=', 'projects.client_id')
					//メンバーテーブルを結合
					->join('members', 'INNER')
					->on('members.employee_id', '=', 'projects.employee_id')
					->where('members.tenure_flag','=',1)
					->where('clients.is_deleted', '=', 0)
					->where('projects.id', '=', $id);

		$project = $query->as_object()->execute();
		if (!$project)
		{
			Session::set_flash('error', 'Could not find project #'.$id);
			Response::redirect('projects');
		}

		$project =  Model_Project::find($id);


		$val = Model_Project::validate('edit');

		if ($val->run())
		{
			$project->project_name = Input::post('project_name');
			$project->client_id = Input::post('client_id');
			$project->technology = Input::post('technology');
			$project->development = Input::post('development');
			$project->start_date = Input::post('start_date');
			$project->delivery_date = Input::post('delivery_date');
			$project->price = Input::post('price');
			$project->price_section = Input::post('price_section');
			$project->price_flag = Input::post('price_flag');
			$project->order_expectation = Input::post('order_expectation');
			$project->order_status = Input::post('order_status');
			$project->employee_id = Input::post('employee_id');
			$project->memo = Input::post('memo');
			$project->user = false;
			$project->is_deleted = false;

			if($project['price_flag'] == null)
			{
				$project['price_flag'] = 0;
			}

			//radioボタンにcheckが入らなかったら
			if($project['development'] == 0){
				$project['development'] = 4;
			}

			if ($project->save())
			{
				Session::set_flash('success', 'Updated project #' . $id);

				Response::redirect('projects');
			}

			else
			{
				Session::set_flash('error', 'Could not update project #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$project->project_name = $val->validated('project_name');
				$project->client_id = $val->validated('client_id');
				$project->technology = $val->validated('technology');
				$project->development = $val->validated('development');
				$project->start_date = $val->validated('start_date');
				$project->delivery_date = $val->validated('delivery_date');
				$project->price = $val->validated('price');
				$project->price_section = $val->validated('price_section');
				$project->price_flag = $val->validated('price_flag');
				$project->order_expectation = $val->validated('order_expectation');
				$project->order_status = $val->validated('order_status');
				$project->employee_id = $val->validated('employee_id');
				$project->memo = $val->validated('memo');
				$project->user = $val->validated('user');
				$project->is_deleted = $val->validated('is_deleted');

				Session::set_flash('error', $val->error());
			}
			
			$this->template->set_global('project', $project, false);
		}

		$this->template->title = "Projects";
		$this->template->content = View::forge('projects/edit',$data);

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('projects');

		if ($project = Model_Project::find($id))
		{
			$project->delete();

			Session::set_flash('success', 'Deleted project #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete project #'.$id);
		}

		Response::redirect('projects');

	}

	//viewで渡すデーターをオブジェクト化
	public function createViewData()
	{
		// $tmp=Model_Client::find('all',['select'=>['id','client_name']],['order_by'=>['client_name'=>'asc']]);
		$client_names = DB::select()->from('clients')->order_by('client_kana','asc')->execute()->as_array();
		foreach($client_names as $value){
			$data['client_data'][$value['id']] = $value['client_name'];
		}

		// $members = Model_Member::find('all',['select'=>['employee_id','full_name']]);
		$members = DB::select()->from('members')->where('tenure_flag','=',1)->order_by('name_kana','asc')->execute()->as_array();

		foreach($members as $member){
			$data['members_name'][$member['employee_id']] = $member['full_name'];
		}

		return $data;
	}


}

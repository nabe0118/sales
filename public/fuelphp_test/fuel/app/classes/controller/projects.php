<?php

use Fuel\Core\Model;

class Controller_Projects extends Controller_Template
{

	public function action_index()
	{
		$data['projects'] = Model_Project::find('all');
		$data['index_order_status'] = Model_Project::$order_status;
		$data['index_order_expectation'] = Model_Project::$order_expectation;

		// $param = Input::get();
		// $data['client_date'] = Model_Client::find('all',array(
		// 	'select' => array('client_name'),
		// 	'related' => array('client'),
		// 	// 'where' => array(array('id',1))
		// )
		// );

		// $tmp=Model_Client::find('all',['select'=>['id','client_name']]);
		// foreach($tmp as $value){
		// 	$data['client_data'][$value['id']] = $value['client_name'];
		// }

		// $members=Model_Member::find('all',['select'=>['full_name']]);
		// foreach($members as $member){
		// 	$data['members_name'][] = $member['full_name'];
		// }

		$viewdata = $this->createViewData();
		$data['client_data'] = $viewdata['client_data'];
		$data['members_name'] = $viewdata['members_name'];

		var_dump($viewdata);

		$this->template->title = "Projects";
		$this->template->content = View::forge('projects/index', $data);
		
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('projects');

		if ( ! $data['project'] = Model_Project::find($id))
		{
			Session::set_flash('error', 'Could not find project #'.$id);
			Response::redirect('projects');
		}

		$this->template->title = "Project";
		$this->template->content = View::forge('projects/view', $data);
		

	}

	public function action_create()
	{


		// $tmp=Model_Client::find('all',['select'=>['id','client_name']]);
		// foreach($tmp as $value){
		// 	$data['client_data'][$value['id']] = $value['client_name'];
		// }

		// $members=Model_Member::find('all',['select'=>['full_name']]);
		// foreach($members as $member){
		// 	$data['members_name'][] = $member['full_name'];
		// }

		$viewdata = $this->createViewData();
		$data['client_data'] = $viewdata['client_data'];
		$data['members_name'] = $viewdata['members_name'];

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
		is_null($id) and Response::redirect('projects');

		if ( ! $project = Model_Project::find($id))
		{
			Session::set_flash('error', 'Could not find project #'.$id);
			Response::redirect('projects');
		}

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
		$this->template->content = View::forge('projects/edit');

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

	public function createViewData()
	{
		$tmp=Model_Client::find('all',['select'=>['id','client_name']]);
		foreach($tmp as $value){
			$data['client_data'][$value['id']] = $value['client_name'];
		}

		$members=Model_Member::find('all',['select'=>['full_name']]);
		foreach($members as $member){
			$data['members_name'][] = $member['full_name'];
		}

		return $data;
	}

}

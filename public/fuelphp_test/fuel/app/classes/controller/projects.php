<?php
class Controller_Projects extends Controller_Template
{

	public function action_index()
	{
		$data['projects'] = Model_Project::find('all');
		$data['development'] = Model_Project::$development_id;
		$data['price_section'] = Model_Project::$price_section;
		$data['order_expectation'] = Model_Project::$order_expectation;
		$data['order_status'] = Model_Project::$order_status;
		
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
		if (Input::method() == 'POST')
		{
			$val = Model_Project::validate('create');

			if ($val->run())
			{
				$project = Model_Project::forge(array(
					'project_name' => Input::post('project_name'),
					'client_id' => Input::post('client_id'),
					'technology_id' => Input::post('technology_id'),
					'development_id' => Input::post('development_id'),
					'start_date' => Input::post('start_date'),
					'delivery_date' => Input::post('delivery_date'),
					'price' => Input::post('price'),
					'price_section' => Input::post('price_section'),
					'order_expectation' => Input::post('order_expectation'),
					'order_status' => Input::post('order_status'),
					'project_manager' => Input::post('project_manager'),
					'employee_id' => Input::post('employee_id'),
					'memo' => Input::post('memo'),
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
		$this->template->content = View::forge('projects/create');

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
			$project->technology_id = Input::post('technology_id');
			$project->development_id = Input::post('development_id');
			$project->start_date = Input::post('start_date');
			$project->delivery_date = Input::post('delivery_date');
			$project->price = Input::post('price');
			$project->price_section = Input::post('price_section');
			$project->order_expectation = Input::post('order_expectation');
			$project->order_status = Input::post('order_status');
			$project->project_manager = Input::post('project_manager');
			$project->employee_id = Input::post('employee_id');
			$project->memo = Input::post('memo');
			// $project->is_deleted = Input::post('is_deleted');

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
				$project->technology_id = $val->validated('technology_id');
				$project->development_id = $val->validated('development_id');
				$project->start_date = $val->validated('start_date');
				$project->delivery_date = $val->validated('delivery_date');
				$project->price = $val->validated('price');
				$project->price_section = $val->validated('price_section');
				$project->order_expectation = $val->validated('order_expectation');
				$project->order_status = $val->validated('order_status');
				$project->project_manager = $val->validated('project_manager');
				$project->employee_id = $val->validated('employee_id');
				$project->memo = $val->validated('memo');
				// $project->is_deleted = $val->validated('is_deleted');

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

}

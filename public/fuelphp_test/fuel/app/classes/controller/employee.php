<?php
class Controller_Employee extends Controller_Template
{

	public function action_index()
	{
		$data['employees'] = Model_Employee::find('all');

		//DBの数字を文字に変換
		$data['zaisyoku'] = Model_Employee::$tenure_flag;
		$data['test'] = Model_Employee::$affiliation;
		$this->template->title = "Employees";
		$this->template->content = View::forge('employee/index', $data);
		

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('employee');

		if ( ! $data['employee'] = Model_Employee::find($id))
		{
			Session::set_flash('error', 'Could not find employee #'.$id);
			Response::redirect('employee');
		}

		$this->template->title = "Employee";
		$this->template->content = View::forge('employee/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Employee::validate('create');

			if ($val->run())
			{
				$employee = Model_Employee::forge(array(
					'full_name' => Input::post('full_name'),
					'name_kana' => Input::post('name_kana'),
					'email' => Input::post('email'),
					'affiliation' => Input::post('affiliation'),
					'tenure_flag' => Input::post('tenure_flag'),
					'user_remarks' => Input::post('user_remarks'),
					'hire_date' => Input::post('hire_date'),
					'is_deleted' => false,
				));

				if ($employee and $employee->save())
				{
					Session::set_flash('success', 'Added employee #'.$employee->id.'.');

					Response::redirect('employee');
				}

				else
				{
					Session::set_flash('error', 'Could not save employee.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Employees";
		$this->template->content = View::forge('employee/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('employee');

		if ( ! $employee = Model_Employee::find($id))
		{
			Session::set_flash('error', 'Could not find employee #'.$id);
			Response::redirect('employee');
		}

		$val = Model_Employee::validate('edit');

		if ($val->run())
		{
			$employee->full_name = Input::post('full_name');
			$employee->name_kana = Input::post('name_kana');
			$employee->email = Input::post('email');
			$employee->affiliation = Input::post('affiliation');
			$employee->tenure_flag = Input::post('tenure_flag');
			$employee->user_remarks = Input::post('user_remarks');
			$employee->hire_date = Input::post('hire_date');
			// $employee->is_deleted = Input::post('is_deleted');

			if ($employee->save())
			{
				Session::set_flash('success', 'Updated employee #' . $id);

				Response::redirect('employee');
			}

			else
			{
				Session::set_flash('error', 'Could not update employee #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$employee->full_name = $val->validated('full_name');
				$employee->name_kana = $val->validated('name_kana');
				$employee->email = $val->validated('email');
				$employee->affiliation = $val->validated('affiliation');
				$employee->tenure_flag = $val->validated('tenure_flag');
				$employee->user_remarks = $val->validated('user_remarks');
				$employee->hire_date = $val->validated('hire_date');
				// $employee->is_deleted = $val->validated('is_deleted');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('employee', $employee, false);
		}

		$this->template->title = "Employees";
		$this->template->content = View::forge('employee/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('employee');

		if ($employee = Model_Employee::find($id))
		{
			$employee->delete();

			Session::set_flash('success', 'Deleted employee #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete employee #'.$id);
		}

		Response::redirect('employee');

	}

}

<?php
class Controller_Members extends Controller_Template
{

	public function action_index()
	{
		$data['members'] = Model_Member::find('all');
		//権限を数字から文字に変更
		$data['kenngen'] = Model_Member::$authority;
		$this->template->title = "Members";
		$this->template->content = View::forge('members/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('members');

		if ( ! $data['member'] = Model_Member::find($id))
		{
			Session::set_flash('error', 'Could not find member #'.$id);
			Response::redirect('members');
		}

		$this->template->title = "Member";
		$this->template->content = View::forge('members/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Member::validate('create');

			if ($val->run())
			{
				$member = Model_Member::forge(array(
					'employee_id' => Input::post('employee_id'),
					'full_name' => Input::post('full_name'),
					'name_kana' => Input::post('name_kana'),
					'email' => Input::post('email'),
					'password' => Input::post('password'),
					'authority' => Input::post('authority'),
					'affiliation' => false,
					'tenure_flag' => false,
					'user_remarks' => false,
					'hire_date' => false,
					'is_deleted' => false,
				));

				if ($member and $member->save())
				{
					Session::set_flash('success', 'Added member #'.$member->id.'.');

					Response::redirect('members');
				}

				else
				{
					Session::set_flash('error', 'Could not save member.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Members";
		$this->template->content = View::forge('members/create');

	}

	public function action_edit($id = null)
	{
		$data['members'] = Model_Member::find('all');
		is_null($id) and Response::redirect('members');

		if ( ! $member = Model_Member::find($id))
		{
			Session::set_flash('error', 'Could not find member #'.$id);
			Response::redirect('members');
		}

		$val = Model_Member::validate('edit');

		if ($val->run())
		{
			$member->employee_id = Input::post('employee_id');
			$member->full_name = Input::post('full_name');
			$member->name_kana = Input::post('name_kana');
			$member->email = Input::post('email');
			$member->password = Input::post('password');
			$member->authority = Input::post('authority');
			$member->affiliation = false;
			$member->tenure_flag = false;
			$member->user_remarks = false;
			$member->hire_date = false;
			$member->is_deleted = false;

			if ($member->save())
			{
				Session::set_flash('success', 'Updated member #' . $id);

				Response::redirect('members');
			}

			else
			{
				Session::set_flash('error', 'Could not update member #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$member->employee_id = $val->validated('employee_id');
				$member->full_name = $val->validated('full_name');
				$member->name_kana = $val->validated('name_kana');
				$member->email = $val->validated('email');
				$member->password = $val->validated('password');
				$member->authority = $val->validated('authority');
				$member->affiliation = $val->validated('affiliation');
				$member->tenure_flag = $val->validated('tenure_flag');
				$member->user_remarks = $val->validated('user_remarks');
				$member->hire_date = $val->validated('hire_date');
				$member->is_deleted = $val->validated('is_deleted');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('member', $member, false);
		}

		$this->template->title = "Members";
		$this->template->content = View::forge('members/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('members');

		if ($member = Model_Member::find($id))
		{
			$member->delete();

			Session::set_flash('success', 'Deleted member #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete member #'.$id);
		}

		Response::redirect('members');

	}

}

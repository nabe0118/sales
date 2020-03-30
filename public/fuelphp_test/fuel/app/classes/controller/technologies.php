<?php
class Controller_Technologies extends Controller_Template
{

	public function action_index()
	{
		$data['technologies'] = Model_Technology::find('all');
		$this->template->title = "Technologies";
		$this->template->content = View::forge('technologies/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('technologies');

		if ( ! $data['technology'] = Model_Technology::find($id))
		{
			Session::set_flash('error', 'Could not find technology #'.$id);
			Response::redirect('technologies');
		}

		$this->template->title = "Technology";
		$this->template->content = View::forge('technologies/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Technology::validate('create');

			if ($val->run())
			{
				$technology = Model_Technology::forge(array(
					'technology_name' => Input::post('technology_name'),
					'is_deleted' => false,
				));

				if ($technology and $technology->save())
				{
					Session::set_flash('success', 'Added technology #'.$technology->id.'.');

					Response::redirect('technologies');
				}

				else
				{
					Session::set_flash('error', 'Could not save technology.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Technologies";
		$this->template->content = View::forge('technologies/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('technologies');

		if ( ! $technology = Model_Technology::find($id))
		{
			Session::set_flash('error', 'Could not find technology #'.$id);
			Response::redirect('technologies');
		}

		$val = Model_Technology::validate('edit');

		if ($val->run())
		{
			$technology->technology_name = Input::post('technology_name');
			$technology->is_deleted = Input::post('is_deleted');

			if ($technology->save())
			{
				Session::set_flash('success', 'Updated technology #' . $id);

				Response::redirect('technologies');
			}

			else
			{
				Session::set_flash('error', 'Could not update technology #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$technology->technology_name = $val->validated('technology_name');
				$technology->is_deleted = $val->validated('is_deleted');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('technology', $technology, false);
		}

		$this->template->title = "Technologies";
		$this->template->content = View::forge('technologies/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('technologies');

		if ($technology = Model_Technology::find($id))
		{
			$technology->delete();

			Session::set_flash('success', 'Deleted technology #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete technology #'.$id);
		}

		Response::redirect('technologies');

	}

}

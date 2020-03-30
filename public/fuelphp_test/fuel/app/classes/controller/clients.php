<?php
class Controller_Clients extends Controller_Template
{

	public function action_index()
	{
		$data['clients'] = Model_Client::find('all');
		$this->template->title = "Clients";
		$this->template->content = View::forge('clients/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('clients');

		if ( ! $data['client'] = Model_Client::find($id))
		{
			Session::set_flash('error', 'Could not find client #'.$id);
			Response::redirect('clients');
		}

		$this->template->title = "Client";
		$this->template->content = View::forge('clients/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Client::validate('create');

			if ($val->run())
			{
				$client = Model_Client::forge(array(
					'client_name' => Input::post('client_name'),
					'client_kana' => Input::post('client_kana'),
					'client_remarks' => Input::post('client_remarks'),
					'is_deleted' => false,
				));

				if ($client and $client->save())
				{
					Session::set_flash('success', 'Added client #'.$client->id.'.');

					Response::redirect('clients');
				}

				else
				{
					Session::set_flash('error', 'Could not save client.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Clients";
		$this->template->content = View::forge('clients/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('clients');

		if ( ! $client = Model_Client::find($id))
		{
			Session::set_flash('error', 'Could not find client #'.$id);
			Response::redirect('clients');
		}

		$val = Model_Client::validate('edit');

		if ($val->run())
		{
			$client->client_name = Input::post('client_name');
			$client->client_kana = Input::post('client_kana');
			$client->client_remarks = Input::post('client_remarks');
			$client->is_deleted = Input::post('is_deleted');

			if ($client->save())
			{
				Session::set_flash('success', 'Updated client #' . $id);

				Response::redirect('clients');
			}

			else
			{
				Session::set_flash('error', 'Could not update client #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$client->client_name = $val->validated('client_name');
				$client->client_kana = $val->validated('client_kana');
				$client->client_remarks = $val->validated('client_remarks');
				$client->is_deleted = $val->validated('is_deleted');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('client', $client, false);
		}

		$this->template->title = "Clients";
		$this->template->content = View::forge('clients/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('clients');

		if ($client = Model_Client::find($id))
		{
			$client->delete();

			Session::set_flash('success', 'Deleted client #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete client #'.$id);
		}

		Response::redirect('clients');

	}

}

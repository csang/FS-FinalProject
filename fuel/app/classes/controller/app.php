<?php

class Controller_App extends Controller_Base
{
	public function before()
	{
		parent::before();

		$this->_init_user();
		$this->_init_template();
	}


	protected function _init_user()
	{
		$user_id    = Session::get('user');
		$this->user = Model_User::get_by_id($user_id);
	}

	protected function _init_template()
	{
		if (! isset($this->template))
		{
			return;
		}

		if ($this->user)
		{
			$this->template->user_nav = View::forge('user/user');
		}
		else
		{
			$this->template->user_nav = View::forge('user/guest');
		}

		$this->template->set_global('user', $this->user, false);
	}

	public function is_logged_in()
	{
		return isset($this->user);
	}

	public function require_login($location = 'world/recent', $type = null, $message = null)
	{
		if (! $this->is_logged_in())
		{
			$this->redirect($location, $type, $message);
		}
	}

	public function require_user_verification($user, $author, $location = 'world/recent', $type = null, $message = null)
	{
		if ($user != $author)
		{
			$this->redirect($location, $type, $message);
		}
	}
}
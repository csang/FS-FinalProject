<?php

class Controller_User extends Controller_Template
{
	public function get_login()
	{
		$this->template->body = View::forge('user/login');
	}

	public function get_signup()
	{
		$this->template->body = View::forge('user/signup');
	}

	public function get_profile()
	{
		$this->template->detail = View::forge('user/profile');
		$this->template->body    = View::forge('site/index');
	}
}
<?php

class Controller_User extends Controller_App
{

// Login page: 		carsignite.com/login/
// Signup page: 	carsignite.com/signup/
// Settings: 		carsignite.com/settings/

	public function get_login()
	{
		$this->template->body = View::forge('user/login');
	}

	public function get_signup()
	{
		$this->template->body = View::forge('user/signup');
	}

	public function get_create()
	{
		$this->template->body = View::forge('user/create_profile');
	}
}
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

	public function post_create()
	{
		$username = Input::post('username');
		$email    = Input::post('email');
		$password = Input::post('password');

		if($password == Input::post('password_repeat'))
		{
			$user_profile = Model_User::forge()->set(array(
				'username' => $username,
				'email'    => $email,
				'password' => MD5($password),
			));

			$result = $user_profile->save();

			$user = Model_User::query()->where('username', $username)->get_one();

			Session::create();
			Session::set('user', $user);

			Response::redirect('user/profile');

		}else{

			Response::redirect('signup');

		}

		
	}

	public function post_user()
	{
		$username = Input::post('username');
		$password = Input::post('password');
			
		$user = Model_User::query()->where(array(
			'username' => $username,
			'password' => MD5($password),
			))->get_one();

		if(!$user)
		{
			Response::redirect('login');

		}else{

			Session::create();
			Session::set('user', $user);

			Response::redirect('recent');

		}
	}

	public function get_create_profile()
	{
		$this->template->body = View::forge('user/create_profile');
	}

	public function get_logout()
	{
		Session::delete('user');
		Session::destroy();

		Response::redirect('recent');
	}
}
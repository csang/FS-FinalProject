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

	public function get_signup($flash = "")
	{
		if($flash != ""){
			$this->template->body = View::forge('user/signup', array(
				'flash' => $flash,
			));
		}else{
			$this->template->body = View::forge('user/signup');
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

		Response::redirect('world/recent');
	}

	public function post_create()
	{
		$username = Input::post('username');
		$email    = Input::post('email');
		$password = Input::post('password');

		if($password == Input::post('password_repeat')
			and strlen($password) > 6
			and strlen($username) > 6)
		{
			$user = Model_User::forge()->set(array(
				'username'	 => $username,
				'email'		 => $email,
				'password'	 => MD5($password),
				'created_at' => time(),
			));

			$result = $user->save();

			$user 	= Model_User::query()->where('username', $username)->get_one();

			Session::create();
			Session::set('user', $user->id);

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
			Session::set('user', $user->id);

			$user = Model_User::find_by_username($username);

			$user->last_login = time();

			$user->save();

			Response::redirect('world/recent');

		}
	}

	public function post_profile_update()
	{
		$name 	= Input::post('name');
		$email 	= Input::post('email');
		$avatar = Input::post('currentAvatar');
		$poster = Input::post('currentPoster');
		$site 	= Input::post('site');
		$bio 	= Input::post('bio');
		$user = Model_User::get_by_id($this->user->id);

		$config = array(
			'path' 			=> DOCROOT.'assets/img/users',
			'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
			'randomize' 	=> true,
			'auto_process'	=> false,
		);

		Upload::process($config);

		if (Upload::is_valid())
		{
			Upload::save();

			if(Upload::get_files(0)){
				$avatar = Upload::get_files(0);
				$user->avatar 		= $avatar['saved_as'];
				// $filename = DOCROOT.'assets/img/users/'.$avatar['saved_as'];

				// Image::load($filename)->crop_resize(125,125)->save($filename);
			}

			if(Upload::get_files(1)){
				$poster = Upload::get_files(1);
				$user->poster 		= $poster['saved_as'];
			}
		}

		$user->name			= $name;
		$user->email 		= $email;		
		$user->site   		= $site;
		$user->bio	 		= $bio;
		$user->updated_at 	= time();

		$user->save();

		foreach (Upload::get_errors() as $file)
		{
		    // $file is an array with all file information,
		    // $file['errors'] contains an array of all error occurred
		    // each array element is an array containing 'error' and 'message'
		}

		Response::redirect('world/recent');

	}
}
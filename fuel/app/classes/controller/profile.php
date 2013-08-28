<?php

class Controller_Profile extends Controller_App
{

// User Profile:	carsignite.com/username/

// Post Detail: 	carsignite.com/username/article/post-title/
// Friends: 		carsignite.com/username/friends/
// Followers: 		carsignite.com/username/followers/
// Following: 		carsignite.com/username/following/
// Car list: 		carsignite.com/username/cars/

	public function get_view($username)
	{
		$user = Model_User::query()->where('username', $username)->get_one();

		if (! isset($user))
		{
			throw new HttpNotFoundException;
		}

		$this->template->detail = View::forge('profile/profile', array(
			'user' => $user,
		));

		$this->template->body 	= View::forge('profile/post_list');
	}

	public function get_cars($username)
	{
		$this->template->body   = View::forge('profile/car_list');
	}

	public function get_friends()
	{

	}

	public function get_article()
	{
		$this->template->body   = View::forge('profile/post_detail');
	}
 
	public function get_followers()
	{
		$this->template->body   = View::forge('profile/user_list');
	}
}
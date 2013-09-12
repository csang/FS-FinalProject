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

	public function get_article($username, $article_id)
	{
		$article = Model_Article::query()->where('id', $article_id)->get_one();
		$liked = "";

		if(isset($this->user)){
			$liked = Model_Like::query()->where(array('article_id'=> $article_id, 'user_id'=> $this->user->id))->get_one();			
		}

		$this->template->body   = View::forge('profile/post_detail', array(
			'article' 	=> $article,
			'liked'		=> $liked,
		));
	}

	public function get_article_edit($username, $article_id)
	{
		$article = Model_Article::query()->where('id', $article_id)->get_one();
		$user = $this->user;

		$this->template->body = View::forge('profile/post_edit', array(
			'article' => $article,
			'user' => $user,
		));
	}
 
	public function get_followers()
	{
		$this->template->body   = View::forge('profile/user_list');
	}
}
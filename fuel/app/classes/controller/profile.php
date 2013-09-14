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
		$profile 			= Model_User::query()->where('username', $username)->get_one();
		$articles 			= Model_Article::query()->where('user_id', $profile->id)->order_by('created_at', 'desc')->get();
		$total_cars 		= Model_Car::total_cars($profile->id);
		$total_followings 	= Model_Follow::total_followings($profile->id);
		$total_followers 	= Model_Follow::total_followers($profile->id);
		$following 			= "";

		if(isset($this->user)){
			$following = Model_Follow::query()->where(array('follower'=> $this->user->id, 'follow'=> $profile->id))->get_one();			
		}

		if (! isset($profile))
		{
			throw new HttpNotFoundException;
		}

		$this->template->detail = View::forge('profile/profile', array(
			'profile'			=> $profile,
			'following'			=> $following,
			'total_cars'		=> $total_cars,
			'total_followings'	=> $total_followings,
			'total_followers'	=> $total_followers,
		));

		$this->template->body 	= View::forge('profile/post_list', array(
			'articles' => $articles,
		));
	}

	public function get_cars($username)
	{
		$this->template->body = View::forge('profile/car_list');
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
			'article' 	=> $article,
			'user'		=> $user,
		));
	}
 
	public function get_followers()
	{
		$this->template->body   = View::forge('profile/user_list');
	}
}
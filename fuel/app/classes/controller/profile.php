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

	public function get_car($username, $make, $model, $year){
		
		$profile = Model_User::get_user($username);
		$make = Model_Vehicle_Make::get_make($make);
		$model = Model_Vehicle_Model::get_model($model);

		$car = Model_Car::query()->where(array(
			'user_id' => $profile->id,
			'make_id' => $make->id,
			'model_id' => $model->id,
			'year' => $year
		))->get_one();

		$cars = Model_Car::query()->where(array(
			'user_id' => $profile->id
		))->get();

		$articles = Model_Article::query()->where(array(
			'car_id' => $car->id,
			'user_id' => $profile->id
		))->get();

		$this->template->detail = View::forge('car/car_detail', array(
			'car' => $car,
			'cars' => $cars,
			'profile' => $profile,
		));

		$this->template->body = View::forge('car/car_post_list', array(
			'articles' => $articles,
		));
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

	public function get_article_delete($username, $article_id)
	{
		$article = Model_Article::query()->where('id', $article_id)->get_one();
		$article->delete();

		Response::redirect('world/recent');
	}

	public function post_article_update($username, $article_id)
	{
		$poster = NULL;

		$config = array(
			'path' 			=> DOCROOT.'assets/img/post_images',
			'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
			'randomize' 	=> true,
			'auto_process'	=> false,
		);

		Upload::process($config);

		if (Upload::is_valid())
		{
		    Upload::save();

		    $poster = Upload::get_files(0)['saved_as'];

		    // Image::load(DOCROOT.'assets/img/post_images/'.$avatar)->preset('test');
		}

		$article = Model_Article::query()->where('id', $article_id)->get_one();

		$article->title 	 = Input::post('title');
		$article->content 	 = Input::post('content');
		
		if($poster != NULL){
			$article->images = $poster;
		}
		
		$article->updated_at = time();

		$article->save();

		Response::redirect($article->user->username.'/article/'.$article->id);
	}
 
	public function get_followers()
	{
		$this->template->body   = View::forge('profile/user_list');
	}


}
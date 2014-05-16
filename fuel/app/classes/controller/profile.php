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

	public function get_settings($username)
	{
		$this->require_login($username);
		$profile = Model_User::get_user($username);
		$this->template->body = View::forge('profile/settings', array(
			'profile' => $profile,
		));
	}

	public function get_cars($username)
	{
		$profile = Model_User::get_user($username);
		$cars    = Model_Car::query()->where('user_id', $profile->id)->get();
		$this->template->body = View::forge('profile/car_list', array(
			'profile' => $profile,
			'cars'    => $cars,
		));
	}

	public function get_friends($username)
	{
		$profile = Model_User::get_user($username);
		$profiles = $profile->friends();

		$this->template->body   = View::forge('profile/user_list', array(
			'profiles'  => $profiles,
		));
	}

	public function get_followers($username)
	{
		$profile = Model_User::get_user($username);
		$profiles = $profile->followings();

		$this->template->body   = View::forge('profile/user_list', array(
			'profiles'  => $profiles,
		));
	}

	public function get_car($username, $make, $model, $year){
		
		$profile = Model_User::get_user($username);
		$make    = Model_Vehicle_Make::get_make($make);
		$model   = Model_Vehicle_Model::get_model($model);

		$car = Model_Car::query()->where(array(
			'user_id'	 => $profile->id,
			'make_id'	 => $make->id,
			'model_id'	 => $model->id,
			'year'		 => $year
		))->get_one();

		$cars = Model_Car::query()->where(array(
			'user_id'	 => $profile->id
		))->order_by('id', 'asc')->get();

		$articles = Model_Article::query()->where(array(
			'car_id'	 => $car->id,
			'user_id'	 => $profile->id
		))->get();

		$this->template->detail = View::forge('car/car_detail', array(
			'car'		 => $car,
			'cars'		 => $cars,
			'profile'	 => $profile,
		));

		$this->template->body = View::forge('car/car_post_list', array(
			'articles'	 => $articles,
		));
	}

	public function get_car_edit($username, $make, $model, $year)
	{
		$this->require_login($username.'/car/'.$make.'/'.$model.'/'.$year);
		$this->require_user_verification($this->user->username, $username, $username.'/car/'.$make.'/'.$model.'/'.$year, 'error', 'You are not the owner of this car');

		$car = $this->user->get_car($make, $model, $year);

		$this->template->body = View::forge('profile/car_edit', array(
			'car' 	=> $car,
		));
	}

	public function get_car_delete($username, $make, $model, $year)
	{
		$this->require_login($username.'/car/'.$make.'/'.$model.'/'.$year);
		$this->require_user_verification($this->user->username, $username, $username.'/car/'.$make.'/'.$model.'/'.$year, 'error', 'You are not the owner of this car');

		$car = $this->user->get_car($make, $model, $year);

		$car->delete();

		Response::redirect('world/recent');
	}

	public function post_car_update($username, $make, $model, $year)
	{
		$this->require_login("{$username}/car/{$make}/{$model}/{$year}");

		$car = $this->user->get_car($make, $model, $year);

		if (is_null($car))
		{
			$this->redirect($car->user->username.'/car/'.$car->make().'/'.$car->model().'/'.$car->year.'/edit');
		}

		$car->make->name  = Input::post('make');
		$car->model->name = Input::post('model');
		$car->trim        = Input::post('trim');
		$car->year        = Input::post('year');
		$car->about       = Input::post('about');
		

		$car->save();

		Response::redirect($car->user->username.'/car/'.$car->make().'/'.$car->model().'/'.$car->year);
	}

	public function get_article($username, $article_id)
	{
		$article = Model_Article::query()->where('id', $article_id)->get_one();
		$liked = "";
		$flagged = "";

		if(isset($this->user)){
			$liked = Model_Like::query()->where(array('article_id'=> $article_id, 'user_id'=> $this->user->id))->get_one();
			$flagged = Model_Flag::query()->where(array('article_id'=> $article_id, 'user_id'=> $this->user->id))->get_one();			
		}

		$this->template->body = View::forge('profile/post_detail', array(
			'article' 	=> $article,
			'liked'		=> $liked,
			'flagged'   => $flagged,
		));
	}

	public function get_article_edit($username, $article_id)
	{
		$this->require_login($username.'/article/'.$article_id);
		$this->require_user_verification($this->user->username, $username, $username.'/article/'.$article_id, 'error', 'You are not the author of this article');

		$article = Model_Article::query()->where('id', $article_id)->get_one();

		$this->template->body = View::forge('profile/post_edit', array(
			'article' 	=> $article,
		));
	}

	public function get_article_delete($username, $article_id)
	{
		$this->require_login($username.'/article/'.$article_id);
		$this->require_user_verification($this->user->username, $username, $username.'/article/'.$article_id, 'error', 'You are not the author of this article');

		$article = Model_Article::query()->where('id', $article_id)->get_one();
		$article->delete();

		Response::redirect('world/recent');
	}

	public function post_article_update($username, $article_id)
	{
		$image = NULL;

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

		    $image = Upload::get_files(0)['saved_as'];

		    // $filename = DOCROOT.'assets/img/post_images/'.$image;

		    // Image::load($filename)->crop_resize(960, 640)->save($filename);
		}

		$article = Model_Article::query()->where('id', $article_id)->get_one();

		$article->title 	 = Input::post('title');
		$article->content 	 = Input::post('content');
		
		if($image != NULL)
		{
			$article->images = $image;
		}
		
		$article->updated_at = time();

		$article->save();

		Response::redirect($article->user->username.'/article/'.$article->id);
	}

}
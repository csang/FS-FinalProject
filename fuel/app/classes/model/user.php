<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'name',
		'password',
		'email',
		'site',
		'bio',
		'birth',
		'avatar',
		'poster',
		'last_login',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array(
		'articles' => array(
			'key_from'		 => 'id',
			'model_to'		 => 'Model_Article',
			'key_to'		 => 'user_id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		),
		'cars' => array(
			'key_from'		 => 'id',
			'model_to'		 => 'Model_Car',
			'key_to'		 => 'user_id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		),
		'follows' => array(
			'key_from'		 => 'id',
			'model_to'		 => 'Model_Follow',
			'key_to'		 => 'follower',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		),
		'likes' => array(
			'key_from'		 => 'id',
			'model_to'		 => 'Model_Like',
			'key_to'		 => 'user_id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		)
	);

	public function profile_url()
	{
		return Uri::create($this->username);
	}

	public function settings_url()
	{
		return Uri::create($this->username.'/settings');
	}

	public function avatar_url()
	{
		if($this->avatar)
		{
			return "avatars/".$this->avatar;
		
		}else{

			return "icons/avatar.png";
		}
	}

	public function follows()
	{
		return Model_Follow::query()->where('follower', $this->id)->get();
	}

	public function following()
	{
		return Model_Follow::query()->where('follow', $this->id)->get();
	}

	public function friends()
	{
		$friends = array();
		foreach ($this->follows() as $follow)
		{
			array_push($friends, $follow->friend);
		}
		return $friends;
	}

	public function followings()
	{
		$following = array();
		foreach ($this->following() as $follow)
		{
			array_push($following, $follow->user);
		}
		return $following;
	}

	public function friend_ids()
	{
		$ids = array();
		foreach ($this->friends() as $friend)
		{
			array_push($ids, $friend->id);
		}
		return $ids;
	}

	public function check_follow($user_id)
	{
		 return Model_Follow::query()->where(array('follower'=> $user_id, 'follow'=> $this->id))->get_one();
	}

	public function total_cars()
	{
		return Model_Car::total_cars($this->id);
	}

	public function total_followings()
	{
		return Model_Follow::total_followings($this->id);
	}

	public function total_followers()
	{
		return Model_Follow::total_followers($this->id);
	}

	public function get_car($make, $model, $year)
	{
		$make    = Model_Vehicle_Make::get_make($make);
		$model   = Model_Vehicle_Model::get_model($model);

		if (is_null($make) or is_null($model))
		{
			return;
		}

		return Model_Car::query()->where(array(
			'user_id'	 => $this->id,
			'make_id'	 => $make->id,
			'model_id'	 => $model->id,
			'year'		 => $year
		))->get_one();
	}

	public static function get_by_id($id)
	{
		return static::query()->where('id', $id)->get_one();
	}

	public static function get_user($username)
	{
		return static::query()->where('username', $username)->get_one();
	}
}
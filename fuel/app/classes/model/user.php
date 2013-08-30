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
		'birth',
		'avatar',
		'poster',
		'last_login',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array(
		'articles' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Article',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'cars' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Car',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);


	public function profile_url()
	{
		return Uri::create($this->username);
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

	public static function get_by_id($id)
	{
		return static::query()->where('id', $id)->get_one();
	}
}
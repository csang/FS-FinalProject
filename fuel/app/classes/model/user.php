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
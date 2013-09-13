<?php

class Model_Follow extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'follower',
		'follow',
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from'		 => 'follower',
			'model_to'		 => 'Model_User',
			'key_to'		 => 'id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		)
	);

	protected static $_has_one = array(
		'friend' => array(
			'key_from'		 => 'follow',
			'model_to'		 => 'Model_User',
			'key_to'		 => 'id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		)
	);

	public static function total_followings($id)
	{
		return static::query()->where('follower', $id)->count();
	}

	public static function total_followers($id)
	{
		return static::query()->where('follow', $id)->count();
	}
}
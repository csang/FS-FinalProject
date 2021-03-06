<?php

class Model_Article extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'car_id',
		'mods',
		'title',
		'content',	
		'image',
		'likes',
		'flags',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from'		 => 'user_id',
			'model_to'		 => 'Model_User',
			'key_to'		 => 'id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		),
		'car' => array(
			'key_from'		 => 'car_id',
			'model_to'		 => 'Model_Car',
			'key_to'		 => 'id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		)
	);

	protected static $_has_many = array(
		'likes' => array(
			'key_from'		 => 'id',
			'model_to'		 => 'Model_Like',
			'key_to'		 => 'article_id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		),
		'flags' => array(
			'key_from'		 => 'id',
			'model_to'		 => 'Model_Like',
			'key_to'		 => 'article_id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		)
	);

	protected static $_observers = array(
		'Orm\\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
			'property' => 'created_at',
		),
		'Orm\\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
			'property' => 'updated_at',
		),
	);

	public function content_short($length = 175)
	{
		if(strlen($this->content) > $length){
			return substr($this->content, 0, $length) . '...';			
		}else{
			return substr($this->content, 0, $length);
		}
	}

	public static function get_recent()
	{
		return static::query()->order_by('created_at','desc')->get();
	}

	public static function get_popular()
	{
		return static::query()->order_by('likes','desc')->order_by('created_at','desc')->get();
	}

	public static function get_featured()
	{
		$last_week = substr(strval(time() - (21 * 24 * 60 * 60)), 0, 4);
		return static::query()->where('created_at', 'like', $last_week.'%')->order_by('likes','desc')->order_by('created_at','desc')->get();
	}

	public static function get_friends_recent($friends)
	{
		return static::query()->where('user_id', 'in', $friends)->order_by('created_at','desc')->get();
	}

	public static function get_friends_popular($friends)
	{
		return static::query()->where('user_id', 'in', $friends)->order_by('likes','desc')->order_by('created_at','desc')->get();
	}

	public static function get_friends_featured($friends)
	{
		$last_week = substr(strval(time() - (21 * 24 * 60 * 60)), 0, 4);
		return static::query()->where('user_id', 'in', $friends)->where('created_at', 'like', $last_week.'%')->order_by('likes','desc')->order_by('created_at','desc')->get();
	}
}
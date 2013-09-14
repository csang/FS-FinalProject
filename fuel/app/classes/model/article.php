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
		'images',
		'likes',
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
		)
	);

	public function content_short($length = 175)
	{
		if(strlen($this->content) > $length){
			return substr($this->content, 0, $length) . '...';			
		}else{
			return substr($this->content, 0, $length);
		}
	}

	// public function total_likes()
	// {
	// 	return Model_Like::query()->where('article_id', $this->id)->count();
	// }

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
		return static::query()->order_by('likes','desc')->order_by('created_at','desc')->get();
	}
}
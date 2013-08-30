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
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'car' => array(
			'key_from' => 'car_id',
			'model_to' => 'Model_Car',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);


	public function content_short($length = 175)
	{
		return substr($this->content, 0, $length) . '...';
	}

	public static function get_index()
	{
		return static::query()->get();
	}
}
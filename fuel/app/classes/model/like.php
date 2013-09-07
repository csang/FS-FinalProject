<?php

class Model_Like extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'article_id',
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from'		 => 'user_id',
			'model_to'		 => 'Model_User',
			'key_to'		 => 'id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		),
		'post' => array(
			'key_from'		 => 'article_id',
			'model_to'		 => 'Model_Article',
			'key_to'		 => 'id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		)
	);
}
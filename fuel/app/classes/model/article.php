<?php

class Model_Article extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user',
		'car',
		'mods',
		'title',
		'content',	
		'images',
		'created_at',
		'updated_at',
	);
}
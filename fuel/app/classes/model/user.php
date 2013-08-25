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
}
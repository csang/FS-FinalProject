<?php

class Model_Car extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'make_id',
		'model_id',
		'trim',
		'year',
		'mods',
		'about',
		'image',
		'carname',
		'created_at',
	);

	protected static $_has_many = array(
		'articles' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Article',
			'key_to' => 'car_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	protected static $_belongs_to = array(
		'user' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'make' => array(
			'key_from' => 'make_id',
			'model_to' => 'Model_Vehicle_Make',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'model' => array(
			'key_from' => 'model_id',
			'model_to' => 'Model_Vehicle_Model',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	public function make()
	{
		return $this->make->name;
	}

	public function model()
	{
		return $this->model->name;
	}
}
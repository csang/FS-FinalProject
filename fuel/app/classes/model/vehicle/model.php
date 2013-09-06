<?php

class Model_Vehicle_Model extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'make_id',
		'name',
	);

	protected static $_has_many = array(
		'cars' => array(
			'key_from'		 => 'id',
			'model_to'		 => 'Model_Car',
			'key_to'		 => 'model_id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		)
	);

	protected static $_has_one = array(
		'make' => array(
			'key_from'		 => 'make_id',
			'model_to'		 => 'Model_Vehicle_Make',
			'key_to'		 => 'id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		)
	);
}
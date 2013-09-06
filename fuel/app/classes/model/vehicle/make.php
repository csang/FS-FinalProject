<?php

class Model_Vehicle_Make extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
	);

	protected static $_has_many = array(
		'cars' => array(
			'key_from'		 => 'id',
			'model_to'		 => 'Model_Car',
			'key_to'		 => 'make_id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		),
		'models' => array(
			'key_from'		 => 'id',
			'model_to'		 => 'Model_Vehicle_Model',
			'key_to'		 => 'make_id',
			'cascade_save'	 => true,
			'cascade_delete' => false,
		)
	);
}
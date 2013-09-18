<?php

class Controller_Base extends Controller_Template
{
	public function before()
	{
		parent::before();

		$this->_init_notice();
	}


	#
	#
	#
	public function redirect($location, $type = null, $message = null)
	{
		if (!is_null($type) and !is_null($message))
		{
			Session::set_flash($type, $message);
		}

		Response::redirect($location);
	}
	

	private function _init_notice()
	{
		foreach (array('error', 'success', 'info') as $type)
		{
			$notice = Session::get_flash($type);

			if (isset($notice))
			{
				$this->template->notice = (object) array('type' => $type, 'message' => $notice);
				break;
			}
		}
	}

}
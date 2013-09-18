<?php

class Controller_Debug extends Controller
{
	public function get_info()
	{
		echo phpinfo();
	}
}
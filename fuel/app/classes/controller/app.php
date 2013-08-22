<?php

class Controller_App extends Controller_Template
{
	public function before()
	{
		parent::before();

		$this->template->user_nav = View::forge('user/guest');
	}
}
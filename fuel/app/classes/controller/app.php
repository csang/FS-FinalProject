<?php

class Controller_App extends Controller_Template
{
	public function before()
	{
		parent::before();
		
		if(!Session::get('user')){
			$this->template->user_nav = View::forge('user/guest');
		}else{
			$this->template->user_nav = View::forge('user/user');
		}
			

	}
}
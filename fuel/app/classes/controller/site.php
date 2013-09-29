<?php

class Controller_Site extends Controller_App
{
	public function get_about_us()
	{
		$this->template->body = View::forge('site/about_us');
	}

	public function get_help()
	{
		$this->template->body = View::forge('site/help');
	}

	public function get_contact_us()
	{
		$this->template->body = View::forge('site/contact_us');
	}
}
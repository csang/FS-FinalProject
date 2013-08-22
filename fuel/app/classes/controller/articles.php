<?php

class Controller_Articles extends Controller_App
{

// Post page: 		carsignite.com/articles/create
// Post Edit: 		carsignite.com/articles/edit/post-title

	public function get_post_create()
	{
		$this->template->body = View::forge('articles/post_create');
	}

	public function get_post_edit()
	{
		$this->template->body = View::forge('articles/post_edit');
	}
}
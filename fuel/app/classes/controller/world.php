<?php

class Controller_World extends Controller_App
{
	public function get_recent()
	{
		$articles = Model_Article::get_recent();
	
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index', array(
			'articles' 	=> $articles,
		));
	}

	public function get_popular()
	{
		$articles = Model_Article::get_popular();
	
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index', array(
			'articles' 	=> $articles,
		));
	}

	public function get_featured()
	{
		$articles = Model_Article::get_featured();
	
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index', array(
			'articles' 	=> $articles,
		));
	}

	public function get_search()
	{
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->sub_nav_cars 	= View::forge('nav/cars');
		$this->template->body    		= View::forge('site/index');
	}
}
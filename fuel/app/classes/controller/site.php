<?php

class Controller_Site extends Controller_App
{

// Home/World: 		carsignite.com/
//					carsignite.com/popular
//					carsignite.com/featured
//					carsignite.com/cars

	public function get_index()
	{
		$posts = Model_article::find_all(10,20);

		var_dump($posts);

		// $this->template->sub_nav 		= View::forge('nav/filters');
		// $this->template->body   		= View::forge('site/index');
	}

	public function get_cars()
	{
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->sub_nav_cars 	= View::forge('nav/cars');
		$this->template->body    		= View::forge('site/index');
	}
}
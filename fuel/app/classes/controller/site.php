<?php

class Controller_Site extends Controller_Template
{
	public function get_index()
	{
		$this->template->sub_nav = View::forge('nav/filters');
		$this->template->body    = View::forge('site/index');
	}

	public function get_cars()
	{
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->sub_nav_cars 	= View::forge('nav/cars');
		$this->template->body    		= View::forge('site/index');
	}

	public function get_car_detail()
	{
		$this->template->detail    	= View::forge('site/car_detail');
		$this->template->body    	= View::forge('site/index');
	}

	public function get_post_detail()
	{
		$this->template->body    = View::forge('site/post_detail');
	}

	public function get_post_create()
	{
		$this->template->body    = View::forge('site/post_create');
	}

	public function get_post_edit()
	{
		$this->template->body    = View::forge('site/post_edit');
	}
}
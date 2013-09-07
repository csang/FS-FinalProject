<?php

class Controller_Friends extends Controller_App
{
	public function get_recent()
	{
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index');

		if(isset($this->user)){
			$articles = Model_Article::query()->where('user_id', 'in', $this->user->friend_ids())->order_by('id','desc')->get();
			$this->template->body   	= View::forge('site/index', array(
				'articles' => $articles,
			));
		}
	}

	public function get_popular()
	{
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index');

		if(isset($this->user)){
			$articles = Model_Article::query()->where('user_id', 'in', $this->user->friend_ids())->order_by('likes','desc')->order_by('id','desc')->get();
			$this->template->body   	= View::forge('site/index', array(
				'articles' => $articles,
			));
		}
	}

	public function get_featured()
	{
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index');

		if(isset($this->user)){
			$articles = Model_Article::query()->where('user_id', 'in', $this->user->friend_ids())->order_by('likes','desc')->order_by('id','desc')->get();
			$this->template->body   	= View::forge('site/index', array(
				'articles' => $articles,
			));
		}
	}

	public function get_search()
	{
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->sub_nav_cars 	= View::forge('nav/cars');
		$this->template->body    		= View::forge('site/index');
	}
}
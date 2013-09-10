<?php

class Controller_Site extends Controller_App
{
	public function get_friends()
	{
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index');

		if(isset($this->user)){
			$articles = Model_Article::query()->where('user_id', 'in', $this->user->friend_ids())->get();
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
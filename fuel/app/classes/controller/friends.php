<?php

class Controller_Friends extends Controller_App
{
	public function get_recent()
	{
		$this->require_login('world/recent', 'info', 'You need to log in to access the \'Friends\' page');
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index');

		if(isset($this->user)){
			// $articles = Model_Article::query()->where('user_id', 'in', $this->user->friend_ids())->order_by('id','desc')->get();
			if($this->user->friend_ids() != 0){
				$articles = Model_Article::get_friends_recent($this->user->friend_ids());

				$this->template->body   	= View::forge('site/index', array(
					'articles' => $articles,

				));
			}
		}
	}

	public function get_popular()
	{
		$this->require_login('world/recent', 'info', 'You need to log in to access the \'Friends\' page');
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index');

		if(isset($this->user)){
			// $articles = Model_Article::query()->where('user_id', 'in', $this->user->friend_ids())->order_by('likes','desc')->order_by('id','desc')->get();
			if($this->user->friend_ids() != 0){
				$articles = Model_Article::get_friends_popular($this->user->friend_ids());
				
				$this->template->body   	= View::forge('site/index', array(
					'articles' => $articles,
				));
			}
		}
	}

	public function get_featured()
	{
		$this->require_login('world/recent', 'info', 'You need to log in to access the \'Friends\' page');
		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->body   		= View::forge('site/index');

		if(isset($this->user)){
			// $articles = Model_Article::query()->where('user_id', 'in', $this->user->friend_ids())->order_by('likes','desc')->order_by('id','desc')->get();
			if($this->user->friend_ids() != 0){
				$articles = Model_Article::get_friends_featured($this->user->friend_ids());
				$this->template->body   	= View::forge('site/index', array(
					'articles' => $articles,
				));
			}
		}
	}

	public function get_search()
	{
		$makes = Model_Vehicle_Make::query()->get();
		$models = Model_Vehicle_Model::query()->get();

		$this->template->sub_nav 		= View::forge('nav/filters');
		$this->template->sub_nav_cars 	= View::forge('nav/cars', array(
			'makes'  => $makes,
			'models' => $models,
		));
		$this->template->body    		= View::forge('site/index');
	}
}
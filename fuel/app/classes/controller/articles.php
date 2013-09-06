<?php

class Controller_Articles extends Controller_App
{

// Post page: 		carsignite.com/articles/create
// Post Edit: 		carsignite.com/articles/edit/post-title

	public function get_post_create()
	{
		$cars = Model_Car::find_by('user_id', $this->user->id);

		// var_dump($cars[1]->make->name);

		$this->template->body = View::forge('articles/post_create', array(
			'cars' => $cars,
		));
	}

	public function get_post_edit()
	{
		$this->template->body = View::forge('articles/post_edit');
	}

	public function post_create()
	{
		$car 	 = explode(":", Input::post('car'));

		$make	 =	$car[0];
		$model	 =	$car[1];
		$year	 =	$car[2];

		$title 	 = Input::post('title');
		$mods 	 = Input::post('mods');
		$content = Input::post('content');
		$image   = NULL;

		$config = array(
			'path' 			=> DOCROOT.'assets/img/post_images',
			'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
			'randomize' 	=> true,
			'auto_process'	=> false,
		);

		Upload::process($config);

		if (Upload::is_valid())
		{
		    Upload::save();

		    $image = Upload::get_files(0)['saved_as'];

		    // Image::load(DOCROOT.'assets/img/post_images/'.$avatar)->preset('test');
		}

		$search_car = Model_Car::find_by('user_id', $this->user->id);
		$search_car_count = 0;

		foreach ($search_car as $search)
		{
			if($search->make->name 	 == $make &&
				$search->model->name == $model &&
				$search->year 		 == $year)
			{
				$car_id = $search->id;

				$post = Model_Article::forge()->set(array(
					'user_id'	 => $this->user->id,
					'car_id'     => $car_id,
					'mods' 		 => $mods,
					'title' 	 => $title,
					'content' 	 => $content,
					'images' 	 => $image,
					'created_at' => time(),
				));

				$result = $post->save();

				Response::redirect('world/recent');
			}
			else
			{
				$search_car_count += 1;

				if(count($search_car) == $search_car_count){
					
					$search_make = Model_Vehicle_Make::find_by('name', $make);
					$search_model = Model_Vehicle_Model::find_by('name', $model);

					if($search_make && $search_model){
						
						$add_car = Model_Car::forge()->set(array(
							'user_id'	 => $this->user->id,
							'make_id'    => $search_make[1]['id'],
							'model_id' 	 => $search_model[1]['id'],
							'year' 	 	 => $year,
							'image' 	 => $image,
							'created_at' => time(),
						));

						$result = $add_car->save();

						$post = Model_Article::forge()->set(array(
							'user_id'	 => $this->user->id,
							'car_id'     => $add_car->id,
							'mods' 		 => $mods,
							'title' 	 => $title,
							'content' 	 => $content,
							'images' 	 => $image,
							'created_at' => time(),
						));

						$result = $post->save();

						Response::redirect('world/recent');
					}

					//var_dump('no match, Add car to user\'s car list if such car exists. If it doesn\'t exist, take user back to the post creation form');	
				}
			}
		}
	}
}
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

	public function post_create()
	{
		$car 	 = Input::post('car');

		$make	 = Input::post('make');
		$model	 = Input::post('model');
		$trim	 = Input::post('trim');
		$year	 = Input::post('year');

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
		
		if($car == 'NULL')
		{
			$search_make = Model_Vehicle_Make::find_by('name', $make);
			$search_model = Model_Vehicle_Model::find_by('name', $model);

			foreach ($search_make as $make_id) {
				$make_id = $make_id['id'];
			}

			foreach ($search_model as $model_id) {
				$model_id = $model_id['id'];
			}

			if($search_make && $search_model){
				
				$add_car = Model_Car::forge()->set(array(
					'user_id'	 => $this->user->id,
					'make_id'    => $make_id,
					'model_id' 	 => $model_id,
					'trim'		 => $trim,
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
					'likes'		 => 0,
					'created_at' => time(),
				));

				$result = $post->save();

				Response::redirect('world/recent');

				//var_dump('no match, Add car to user\'s car list if such car exists. If it doesn\'t exist, take user back to the post creation form');	
			}
		}
		else
		{
			$search_car = Model_Car::find_by('id', $car);

			if($search_car)
			{
				$post = Model_Article::forge()->set(array(
					'user_id'	 => $this->user->id,
					'car_id'     => $car,
					'mods' 		 => $mods,
					'title' 	 => $title,
					'content' 	 => $content,
					'images' 	 => $image,
					'created_at' => time(),
				));

				$result = $post->save();

				Response::redirect('world/recent');
			}
		}
	}
}
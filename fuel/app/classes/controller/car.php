<?php
class Controller_Car extends Controller_App
{

// Car Detail: 		carsignite.com/username/make/model/year/
// 					carsignite.com/username/make/model/year/carId/

	public function get_view($username, $make = "", $model = "", $year = "")
	{
		$this->template->detail = View::forge('car/car_detail');
		$this->template->body   = View::forge('car/car_post_list');
	}
}
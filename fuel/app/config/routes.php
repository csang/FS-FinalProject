<?php
return array(
	'_root_'  => 'site/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'login' => 'user/login',
	'signup' => 'user/signup',
	'user/create' => 'user/create',

	'(:segment)/cars'  => 'profile/cars/$1',
	'(:segment)/friends'  => 'profile/friends/$1',
	'(:segment)/followers'  => 'profile/followers/$1',
	'(:segment)/article/(:segment)'  => 'profile/article/$1/$2',

	'(:segment)/(:any)' => 'car/view/$1/$2',
	'(:segment)'  => 'profile/view/$1',
);
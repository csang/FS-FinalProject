<?php
return array(
	'_root_'  => 'site/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'world/recent' => 'site/index',
	'world/popular' => 'site/index',
	'world/featured' => 'site/index',
	'world/cars' => 'site/cars',

	'post' => 'articles/post_create',

	'login' => 'user/login',
	'logout' => 'user/logout',
	'signup' => 'user/signup',
	'user/create' => 'user/create',
	'user/profile' => 'user/create_profile',
	'user' => 'user/user',

	'post_detail'  => 'profile/article',
	'(:segment)/cars'  => 'profile/cars/$1',
	'(:segment)/friends'  => 'profile/friends/$1',
	'(:segment)/followers'  => 'profile/followers/$1',

	'(:segment)/article/(:segment)'  => 'profile/article/$1/$2',
	'(:segment)/(:any)' => 'car/view/$1/$2',
	'(:segment)'  => 'profile/view/$1',
);
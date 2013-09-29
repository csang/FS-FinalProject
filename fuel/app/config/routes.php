<?php
return array(
	'_root_' => 'world/recent',  // The default route
	'_404_'  => 'welcome/404',    // The main 404 route
	
	'debug/(:any)' => 'debug/$1',

	'about_us'   => 'site/about_us',
	'help'       => 'site/help',
	'contact_us' => 'site/contact_us',

	'world/recent'   => 'world/recent',
	'world/popular'  => 'world/popular',
	'world/featured' => 'world/featured',
	'world/search'   => 'world/search',

	'friends/recent'   => 'friends/recent',
	'friends/popular'  => 'friends/popular',
	'friends/featured' => 'friends/featured',
	'friends/search'   => 'friends/search',

	'post'        => 'articles/post_create',
	'post/create' => 'articles/create',

	'login'	 => 'user/login',
	'logout' => 'user/logout',
	'signup' => 'user/signup',

	'user/create'         => 'user/create',
	'user/profile'        => 'user/create_profile',
	'user/profile/update' => 'user/profile_update',
	'users'               => 'user/user',

	'post_detail'          => 'profile/article',
	'(:segment)/cars'      => 'profile/cars/$1',
	'(:segment)/friends'   => 'profile/friends/$1',
	'(:segment)/followers' => 'profile/followers/$1',
	'(:segment)/settings'  => 'profile/settings/$1',

	'(:segment)/car/(:segment)/(:segment)/(:segment)'        => 'profile/car/$1/$2/$3/$4',
	'(:segment)/car/(:segment)/(:segment)/(:segment)/edit'   => 'profile/car_edit/$1/$2/$3/$4',
	'(:segment)/car/(:segment)/(:segment)/(:segment)/update' => 'profile/car_update/$1/$2/$3/$4',
	'(:segment)/car/(:segment)/(:segment)/(:segment)/delete' => 'profile/car_delete/$1/$2/$3/$4',

	'(:segment)/article/(:segment)'        => 'profile/article/$1/$2',
	'(:segment)/article/(:segment)/edit'   => 'profile/article_edit/$1/$2',
	'(:segment)/article/(:segment)/update' => 'profile/article_update/$1/$2',
	'(:segment)/article/(:segment)/delete' => 'profile/article_delete/$1/$2',

	'(:segment)/(:any)' => 'car/view/$1/$2',
	'(:segment)'        => 'profile/view/$1',
);
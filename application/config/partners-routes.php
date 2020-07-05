<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	$route['default_controller'] = 'Login';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

	$route['login'] 	= 'Login';
	$route['signin'] 	= 'Login/signin';
	$route['logout'] 	= 'Login/logout';

	$route['forums'] 	= 'Forum';
	$route['forums/post']				= 'Forum/post';

	$route['students/confirm/list'] 	= 'Students';

	$route['students/results/(:num)']	= 'Students/profile/$1';

	$route['students/reports/ratings/(:num)'] = 'Students/rating/$1';
	$route['students/reports/attendance/(:num)'] = 'Students/attendance/$1';

	$route['students/evaluate/(:num)'] = 'Evaluate/evaluation/$1';

	$route['students/my-dtr/(:num)'] = 'Students/getdtr/$1';

	$route['profile'] 			= 'Home/profile';
	$route['settings'] 			= 'Home/profile';
	$route['change/password'] 	= 'Home/changePass';
	$route['profile/update'] 	= 'Home/update_profile';

	$route['student/add/dtr'] = 'Students/add_dtr';

	$route['user/list'] = 'User';
?>
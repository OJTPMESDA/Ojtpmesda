<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	$route['default_controller'] = 'Home';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

	$route['login'] 	= 'Login';
	$route['signin'] 	= 'Login/signin';
	$route['logout'] 	= 'Login/logout';

	$route['profile'] 					= 'Home/profile';
	$route['ojt/results'] 				= 'Home/ojt_results';
	$route['settings'] 					= 'Home/profile';
	$route['profile/update'] 			= 'Home/update_profile';
	$route['forums'] 					= 'Home/forum';
	$route['account/verify/(:any)'] 	= 'Home/account_verify/$1';

	$route['register'] 	= 'Register';
	$route['create'] 	= 'Register/create';

	$route['availability'] = 'Login/usernameAvailability';

	$route['upload/resume'] 			= 'Requirements/resume';
	$route['upload/clearance'] 			= 'Requirements/clearance';
	$route['upload/waiver'] 			= 'Requirements/waiver';
	$route['upload/good-moral'] 		= 'Requirements/good_moral';
	$route['upload/registration-form'] 	= 'Requirements/registration_form';
	$route['upload/consent'] 			= 'Requirements/consent';

	$route['availability'] 	= 'Login/usernameAvailability';

?>
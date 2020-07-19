<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	$route['default_controller'] = 'Home';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

	$route['login'] 	= 'Login';
	$route['signin'] 	= 'Login/signin';
	$route['logout'] 	= 'Login/logout';
	$route['availability'] 	= 'Login/usernameAvailability';

	$route['confirm/list'] 				= 'Home/confirm_list';
	$route['profile'] 					= 'Home/profile';
	$route['settings'] 					= 'Home/profile';
	$route['profile/update'] 			= 'Home/update_profile';
	$route['account/verify/(:any)'] 	= 'Home/account_verify/$1';
	$route['change/password'] 			= 'Home/changePass';

	$route['students/pending/list']			= 'Student/student_pending_list';
	$route['students/requirements/(:num)']	= 'Student/requirements/$1';
	$route['students/confirm/(:num)']		= 'Student/confirm_student/$1';

	$route['summary/report']		= 'Home/requirementBarGraph';

	$route['confirm/resume/(:num)'] 		= 'Requirements/confirm_resume/$1';
	$route['confirm/clearance/(:num)'] 		= 'Requirements/confirm_clearance/$1';
	$route['confirm/waiver/(:num)'] 		= 'Requirements/confirm_waiver/$1';
	$route['confirm/registration/(:num)'] 	= 'Requirements/confirm_registration/$1';
	$route['confirm/consent/(:num)'] 		= 'Requirements/confirm_consent/$1';
	$route['confirm/good-moral/(:num)'] 	= 'Requirements/confirm_good_moral/$1';
	
	$route['students/requirements/delete/(:num)'] 	= 'Requirements/deleteAll/$1';

	$route['decline/resume/(:num)'] 		= 'Requirements/decline_resume/$1';
	$route['decline/clearance/(:num)'] 		= 'Requirements/decline_clearance/$1';
	$route['decline/waiver/(:num)'] 		= 'Requirements/decline_waiver/$1';
	$route['decline/registration/(:num)'] 	= 'Requirements/decline_registration/$1';
	$route['decline/consent/(:num)'] 		= 'Requirements/decline_consent/$1';
	$route['decline/good-moral/(:num)'] 	= 'Requirements/decline_good_moral/$1';

	$route['forums/post']					= 'Forum/post';
	$route['forums'] 						= 'Forum';
	$route['forums/post/request'] 			= 'Forum/request';
	$route['forums/post/approved/(:num)']	= 'Forum/approved/$1';
	$route['forums/post/decline/(:num)']	= 'Forum/decline/$1';

	$route['students/profile/(:num)']	= 'Student/profile/$1';

	$route['company/list'] 				= 'Partners';
	$route['company/approved/(:num)'] 	= 'Partners/approved/$1';
	$route['company/decline/(:num)'] 	= 'Partners/decline/$1';
	$route['company/add'] 				= 'Partners/add';

?>
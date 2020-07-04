<?php defined('BASEPATH') OR exit('No direct script access allowed');

switch (APP) {
	case 'STUDENT':
		include_once 'student-routes.php';
		break;
	case 'ADMIN':
		include_once 'admin-route.php';
		break;
	case 'PARTNERS':
		include_once 'partners-routes.php';
		break;
}

// $route['home'] = 'Home';
// $route['register'] = 'Home/register';
// $route['new/student'] = 'Home/add_new_data';
// $route['profile/(:num)'] = 'Students/student_profile/$1';
// $route['student/confirm/list'] = 'Students/get_confirm_students';
// $route['profile/update/(:num)'] = 'students/update_student_profile/$1';
// $route['student/requirements/(:num)'] = 'Students/students_requirements/$1';
// $route['student/requirements/delete/(:num)'] = 'students/delete_request/$1';

// $route['evaluate/(:num)'] = 'Company/submitEvaluate/$1';

// $route['logout'] = 'Home/logout';

// $route['work/hours/(:num)'] = 'Students/add_hours/$1';

// $route['student/dtr/(:num)'] = 'Students/student_dtr/$1';
// $route['student/evaluate/(:num)'] = 'Company/evaluate/$1';
// $route['evaluate/(:num)'] = 'Company/submitEvaluate/$1';

// $route['availability'] = 'Home/check_email_availability';
// $route['account/verify/(:any)'] = 'Home/account_verify/$1';


// $route['confirm/resume/(:num)'] = 'Admin/confirm_resume/$1';
// $route['confirm/clearance/(:num)'] = 'Admin/confirm_clearance/$1';
// $route['confirm/waiver/(:num)'] = 'Admin/confirm_waiver/$1';
// $route['confirm/registration/(:num)'] = 'Admin/confirm_registration/$1';
// $route['confirm/consent/(:num)'] = 'Admin/confirm_consent/$1';
// $route['confirm/good-moral/(:num)'] = 'Admin/confirm_good_moral/$1';

// $route['decline/resume/(:num)'] = 'Admin/decline_resume/$1';
// $route['decline/clearance/(:num)'] = 'Admin/decline_clearance/$1';
// $route['decline/waiver/(:num)'] = 'Admin/decline_waiver/$1';
// $route['decline/registration/(:num)'] = 'Admin/decline_registration/$1';
// $route['decline/consent/(:num)'] = 'Admin/decline_consent/$1';
// $route['decline/good-moral/(:num)'] = 'Admin/decline_good_moral/$1';
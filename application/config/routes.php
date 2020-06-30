<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'Home';
$route['register'] = 'Home/register';
$route['new/student'] = 'Students/add_new_data';
$route['profile/(:num)'] = 'Students/student_profile/$1';
$route['student/confirm/list'] = 'Students/get_confirm_students';
$route['profile/update/(:num)'] = 'students/update_student_profile/$1';

$route['evaluate/(:num)'] = 'Company/submitEvaluate/$1';

$route['logout'] = 'Home/logout';

$route['work/hours/(:num)'] = 'Students/add_hours/$1';

$route['student/dtr/(:num)'] = 'Students/student_dtr/$1';
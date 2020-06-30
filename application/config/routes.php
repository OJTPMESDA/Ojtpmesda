<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'Home';
$route['register'] = 'Home/register';
$route['new/student'] = 'Students/add_new_data';

$route['evaluate/(:num)'] = 'Company/submitEvaluate/$1';

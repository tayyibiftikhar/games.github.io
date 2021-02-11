<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['gresponse'] = 'site/genResponse';
$route['quiz'] = 'site/quiz';
$route['quiz/(:any)'] = 'site/quiz/$1';
$route['challenge/(:any)'] = 'site/challenge/$1';
$route['save-challenge/(:any)'] = 'site/saveChallenge/$1';
$route['hash/(:any)'] = 'site/hash/$1';

$route['about-us'] = 'site/aboutUs';
$route['privacy-policy'] = 'site/privacyPolicy';
$route['contact-us'] = 'site/contactUs';

$route['test'] = 'site/test';

//Admin route
$route['admin'] = 'admin/admin/index';
$route['admin/login'] = 'admin/auth/index';
$route['admin/logout' ] = 'admin/auth/logout';
$route['admin/list-quiz'] = 'admin/admin/listQuiz';
$route['admin/del-quiz/(:num)'] = 'admin/admin/delQuiz/$1';


$route['admin/quiz'] = 'admin/admin/quiz';
$route['admin/question'] = 'admin/admin/question';
$route['admin/add-question'] = 'admin/admin/addQuestion';
$route['admin/edit-question/(:num)'] = 'admin/admin/editQuestion/$1';
$route['admin/list-question'] = 'admin/admin/listQuestion';
$route['admin/question-answer/(:num)'] = 'admin/admin/questionAnswer/$1';

$route['admin/add-answer/(:num)'] = 'admin/admin/addAnswer/$1';
$route['admin/edit-answer/(:num)'] = 'admin/admin/editAnswer/$1';


$route['admin/site-settings'] = 'admin/admin/siteSettings';
$route['admin/ad-settings'] = 'admin/admin/adSettings';
$route['admin/change-logo'] = 'admin/admin/changeLogo';
$route['admin/custom-header-footer'] = 'admin/admin/customHeaderFooter';
$route['admin/page'] = 'admin/admin/page';
$route['admin/account'] = 'admin/admin/account';



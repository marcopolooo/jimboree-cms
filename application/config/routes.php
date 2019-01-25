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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']['post'] = 'Auth/auth';
$route['logout'] = 'Auth/auth/logout';
$route['dashboard'] = 'dashboard';

// SUBJECTS
$route['master-data/subjects'] = 'subjects';
$route['master-data/subjects/add']= 'subjects/add';
$route['master-data/subjects/store']['post'] = 'subjects/store';
$route['master-data/subjects/edit/(:num)'] = 'subjects/edit/$1';
$route['master-data/subjects/update']['post'] = 'subjects/update';
$route['master-data/subjects/destroy']['post'] = 'subjects/destroy';

// CLASS
$route['master-data/class'] = 'classes';
$route['master-data/class/add']= 'classes/add';
$route['master-data/class/store']['post'] = 'classes/store';
$route['master-data/class/edit/(:num)'] = 'classes/edit/$1';
$route['master-data/class/update']['post'] = 'classes/update';
$route['master-data/class/destroy']['post'] = 'classes/destroy';

// STUDENTS
$route['master-data/students'] = 'students';
$route['master-data/students/add']= 'students/add';
$route['master-data/students/store']['post'] = 'students/store';
$route['master-data/students/edit/(:num)'] = 'students/edit/$1';
$route['master-data/students/update']['post'] = 'students/update';
$route['master-data/students/destroy']['post'] = 'students/destroy';

// TEACHERS
$route['master-data/teachers'] = 'teachers';
$route['master-data/teachers/add']= 'teachers/add';
$route['master-data/teachers/store']['post'] = 'teachers/store';
$route['master-data/teachers/edit/(:num)'] = 'teachers/edit/$1';
$route['master-data/teachers/update']['post'] = 'teachers/update';
$route['master-data/teachers/destroy']['post'] = 'teachers/destroy';

// PARENTS
$route['master-data/parents'] = 'parents';
$route['master-data/parents/add']= 'parents/add';
$route['master-data/parents/store']['post'] = 'parents/store';
$route['master-data/parents/edit/(:num)'] = 'parents/edit/$1';
$route['master-data/parents/update']['post'] = 'parents/update';
$route['master-data/parents/destroy']['post'] = 'parents/destroy';

// AGAMA
$route['master-data/agama'] = 'agama';
$route['master-data/agama/add']= 'agama/add';
$route['master-data/agama/store']['post'] = 'agama/store';
$route['master-data/agama/edit/(:num)'] = 'agama/edit/$1';
$route['master-data/agama/update']['post'] = 'agama/update';
$route['master-data/agama/destroy']['post'] = 'agama/destroy';

// CONTACTS
$route['master-data/contacts'] = 'contacts';
$route['master-data/contacts/add']= 'contacts/add';
$route['master-data/contacts/store']['post'] = 'contacts/store';
$route['master-data/contacts/edit/(:num)'] = 'contacts/edit/$1';
$route['master-data/contacts/update']['post'] = 'contacts/update';
$route['master-data/contacts/destroy']['post'] = 'contacts/destroy';

// EKSKUL
$route['master-data/extracuricullar'] = 'extracuricullar';
$route['master-data/extracuricullar/add']= 'extracuricullar/add';
$route['master-data/extracuricullar/store']['post'] = 'extracuricullar/store';
$route['master-data/extracuricullar/edit/(:num)'] = 'extracuricullar/edit/$1';
$route['master-data/extracuricullar/update']['post'] = 'extracuricullar/update';
$route['master-data/extracuricullar/destroy']['post'] = 'extracuricullar/destroy';

// ROLES
$route['master-data/roles'] = 'roles';
$route['master-data/roles/add']= 'roles/add';
$route['master-data/roles/store']['post'] = 'roles/store';
$route['master-data/roles/edit/(:num)'] = 'roles/edit/$1';
$route['master-data/roles/update']['post'] = 'roles/update';
$route['master-data/roles/destroy']['post'] = 'roles/destroy';

// TYPE NILAI
$route['master-data/typenilai'] = 'typenilai';
$route['master-data/typenilai/add']= 'typenilai/add';
$route['master-data/typenilai/store']['post'] = 'typenilai/store';
$route['master-data/typenilai/edit/(:num)'] = 'typenilai/edit/$1';
$route['master-data/typenilai/update']['post'] = 'typenilai/update';
$route['master-data/typenilai/destroy']['post'] = 'typenilai/destroy';

// EVENTS
$route['master-data/events'] = 'events';
$route['master-data/events/add']= 'events/add';
$route['master-data/events/store']['post'] = 'events/store';
$route['master-data/events/edit/(:num)'] = 'events/edit/$1';
$route['master-data/events/update']['post'] = 'events/update';
$route['master-data/events/destroy']['post'] = 'events/destroy';

// FOOD MENU
$route['master-data/foodmenu'] = 'foodmenu';
$route['master-data/foodmenu/add']= 'foodmenu/add';
$route['master-data/foodmenu/store']['post'] = 'foodmenu/store';
$route['master-data/foodmenu/edit/(:num)'] = 'foodmenu/edit/$1';
$route['master-data/foodmenu/update']['post'] = 'foodmenu/update';
$route['master-data/foodmenu/destroy']['post'] = 'foodmenu/destroy';

// SCHOOL
$route['master-data/school'] = 'school';
$route['master-data/school/add']= 'school/add';
$route['master-data/school/store']['post'] = 'school/store';
$route['master-data/school/edit/(:num)'] = 'school/edit/$1';
$route['master-data/school/update']['post'] = 'school/update';
$route['master-data/school/destroy']['post'] = 'school/destroy';

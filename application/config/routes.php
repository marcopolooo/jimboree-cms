<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']['post'] = 'Auth/auth';
$route['logout'] = 'Auth/auth/logout';
$route['dashboard'] = 'dashboard';

// SUBJECTS
$route['master-data/subjects'] = 'subjects';
$route['master-data/subjects/index-data'] = 'subjects/indexData';
$route['master-data/subjects/add']= 'subjects/add';
$route['master-data/subjects/store']['post'] = 'subjects/store';
$route['master-data/subjects/edit/(:num)'] = 'subjects/edit/$1';
$route['master-data/subjects/update']['post'] = 'subjects/update';
$route['master-data/subjects/destroy']['post'] = 'subjects/destroy';

// CLASS
$route['master-data/class'] = 'classes';
$route['master-data/class/index-data'] = 'classes/indexData';
$route['master-data/class/add']= 'classes/add';
$route['master-data/class/store']['post'] = 'classes/store';
$route['master-data/class/edit/(:num)'] = 'classes/edit/$1';
$route['master-data/class/update']['post'] = 'classes/update';
$route['master-data/class/destroy']['post'] = 'classes/destroy';

// STUDENTS
$route['master-data/students'] = 'students';
$route['master-data/students/index-data'] = 'students/indexData';
$route['master-data/students/add']= 'students/add';
$route['master-data/students/store']['post'] = 'students/store';
$route['master-data/students/edit/(:num)'] = 'students/edit/$1';
$route['master-data/students/update']['post'] = 'students/update';
$route['master-data/students/destroy']['post'] = 'students/destroy';

// TEACHERS
$route['master-data/teachers'] = 'teachers';
$route['master-data/teachers/index-data'] = 'teachers/indexData';
$route['master-data/teachers/add']= 'teachers/add';
$route['master-data/teachers/store']['post'] = 'teachers/store';
$route['master-data/teachers/edit/(:num)'] = 'teachers/edit/$1';
$route['master-data/teachers/update']['post'] = 'teachers/update';
$route['master-data/teachers/destroy']['post'] = 'teachers/destroy';

// PARENTS
$route['master-data/parents'] = 'parents';
$route['master-data/parents/index-data'] = 'parents/indexData';
$route['master-data/parents/add']= 'parents/add';
$route['master-data/parents/store']['post'] = 'parents/store';
$route['master-data/parents/edit/(:num)'] = 'parents/edit/$1';
$route['master-data/parents/update']['post'] = 'parents/update';
$route['master-data/parents/destroy']['post'] = 'parents/destroy';

// AGAMA
$route['master-data/agama'] = 'agama';
$route['master-data/agama/index-data'] = 'agama/indexData';
$route['master-data/agama/add']= 'agama/add';
$route['master-data/agama/store']['post'] = 'agama/store';
$route['master-data/agama/edit/(:num)'] = 'agama/edit/$1';
$route['master-data/agama/update']['post'] = 'agama/update';
$route['master-data/agama/destroy']['post'] = 'agama/destroy';

// CONTACTS
$route['master-data/contacts'] = 'contacts';
$route['master-data/contacts/index-data'] = 'contacts/indexData';
$route['master-data/contacts/add']= 'contacts/add';
$route['master-data/contacts/store']['post'] = 'contacts/store';
$route['master-data/contacts/edit/(:num)'] = 'contacts/edit/$1';
$route['master-data/contacts/update']['post'] = 'contacts/update';
$route['master-data/contacts/destroy']['post'] = 'contacts/destroy';

// EKSKUL
$route['master-data/extracuricullar'] = 'extracuricullar';
$route['master-data/extracuricullar/index-data'] = 'extracuricullar/indexData';
$route['master-data/extracuricullar/add']= 'extracuricullar/add';
$route['master-data/extracuricullar/store']['post'] = 'extracuricullar/store';
$route['master-data/extracuricullar/edit/(:num)'] = 'extracuricullar/edit/$1';
$route['master-data/extracuricullar/update']['post'] = 'extracuricullar/update';
$route['master-data/extracuricullar/destroy']['post'] = 'extracuricullar/destroy';

// ROLES
$route['master-data/roles'] = 'roles';
$route['master-data/roles/index-data'] = 'roles/indexData';
$route['master-data/roles/add']= 'roles/add';
$route['master-data/roles/store']['post'] = 'roles/store';
$route['master-data/roles/edit/(:num)'] = 'roles/edit/$1';
$route['master-data/roles/update']['post'] = 'roles/update';
$route['master-data/roles/destroy']['post'] = 'roles/destroy';

// TYPE NILAI
$route['master-data/typenilai'] = 'typenilai';
$route['master-data/typenilai/index-data'] = 'typenilai/indexData';
$route['master-data/typenilai/add']= 'typenilai/add';
$route['master-data/typenilai/store']['post'] = 'typenilai/store';
$route['master-data/typenilai/edit/(:num)'] = 'typenilai/edit/$1';
$route['master-data/typenilai/update']['post'] = 'typenilai/update';
$route['master-data/typenilai/destroy']['post'] = 'typenilai/destroy';

// EVENTS
$route['master-data/events'] = 'events';
$route['master-data/events/index-data'] = 'events/indexData';
$route['master-data/events/add']= 'events/add';
$route['master-data/events/store']['post'] = 'events/store';
$route['master-data/events/edit/(:num)'] = 'events/edit/$1';
$route['master-data/events/update']['post'] = 'events/update';
$route['master-data/events/destroy']['post'] = 'events/destroy';

// EVENTS TYPE
$route['master-data/events-type'] = 'eventstype';
$route['master-data/events-type/index-data'] = 'eventstype/indexData';
$route['master-data/events-type/add']= 'eventstype/add';
$route['master-data/events-type/store']['post'] = 'eventstype/store';
$route['master-data/events-type/edit/(:num)'] = 'eventstype/edit/$1';
$route['master-data/events-type/update']['post'] = 'eventstype/update';
$route['master-data/events-type/destroy']['post'] = 'eventstype/destroy';

// FOOD MENU
$route['master-data/foodmenu'] = 'foodmenu';
$route['master-data/foodmenu/index-data'] = 'foodmenu/indexData';
$route['master-data/foodmenu/add']= 'foodmenu/add';
$route['master-data/foodmenu/store']['post'] = 'foodmenu/store';
$route['master-data/foodmenu/edit/(:num)'] = 'foodmenu/edit/$1';
$route['master-data/foodmenu/update']['post'] = 'foodmenu/update';
$route['master-data/foodmenu/destroy']['post'] = 'foodmenu/destroy';

// SCHOOL
$route['master-data/school'] = 'school';
$route['master-data/school/index-data'] = 'school/indexData';
$route['master-data/school/add']= 'school/add';
$route['master-data/school/store']['post'] = 'school/store';
$route['master-data/school/edit/(:num)'] = 'school/edit/$1';
$route['master-data/school/update']['post'] = 'school/update';
$route['master-data/school/destroy']['post'] = 'school/destroy';

// ARTICLES TYPE
$route['master-data/articles-type'] = 'articlestype';
$route['master-data/articles-type/index-data'] = 'articlestype/indexData';
$route['master-data/articles-type/add']= 'articlestype/add';
$route['master-data/articles-type/store']['post'] = 'articlestype/store';
$route['master-data/articles-type/edit/(:num)'] = 'articlestype/edit/$1';
$route['master-data/articles-type/update']['post'] = 'articlestype/update';
$route['master-data/articles-type/destroy']['post'] = 'articlestype/destroy';

// ARTICLES TYPE
$route['master-data/articles'] = 'articles';
$route['master-data/articles/index-data'] = 'articles/indexData';
$route['master-data/articles/add']= 'articles/add';
$route['master-data/articles/store']['post'] = 'articles/store';
$route['master-data/articles/edit/(:num)'] = 'articles/edit/$1';
$route['master-data/articles/update']['post'] = 'articles/update';
$route['master-data/articles/destroy']['post'] = 'articles/destroy';
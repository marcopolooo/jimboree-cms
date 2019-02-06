<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//TEST
$route['test'] = 'test';

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']['post'] = 'Auth/auth';
$route['logout'] = 'Auth/auth/logout';
$route['dashboard'] = 'dashboard';

// SUBJECTS
$route['master-data/subjects'] = 'master-data/subjects';
$route['master-data/subjects/index-data'] = 'master-data/subjects/indexData';
$route['master-data/subjects/add']= 'master-data/subjects/add';
$route['master-data/subjects/store']['post'] = 'master-data/subjects/store';
$route['master-data/subjects/edit/(:num)'] = 'master-data/subjects/edit/$1';
$route['master-data/subjects/update']['post'] = 'master-data/subjects/update';
$route['master-data/subjects/destroy']['post'] = 'master-data/subjects/destroy';

// CLASS
$route['master-data/class'] = 'master-data/classes';
$route['master-data/class/index-data'] = 'master-data/classes/indexData';
$route['master-data/class/add']= 'master-data/classes/add';
$route['master-data/class/store']['post'] = 'master-data/classes/store';
$route['master-data/class/edit/(:num)'] = 'master-data/classes/edit/$1';
$route['master-data/class/update']['post'] = 'master-data/classes/update';
$route['master-data/class/destroy']['post'] = 'master-data/classes/destroy';

// STUDENTS
$route['master-data/students'] = 'master-data/students';
$route['master-data/students/index-data'] = 'master-data/students/indexData';
$route['master-data/students/add']= 'master-data/students/add';
$route['master-data/students/store']['post'] = 'master-data/students/store';
$route['master-data/students/edit/(:num)'] = 'master-data/students/edit/$1';
$route['master-data/students/update']['post'] = 'master-data/students/update';
$route['master-data/students/destroy']['post'] = 'master-data/students/destroy';

// TEACHERS
$route['master-data/teachers'] = 'master-data/teachers';
$route['master-data/teachers/index-data'] = 'master-data/teachers/indexData';
$route['master-data/teachers/add']= 'master-data/teachers/add';
$route['master-data/teachers/store']['post'] = 'master-data/teachers/store';
$route['master-data/teachers/edit/(:num)'] = 'master-data/teachers/edit/$1';
$route['master-data/teachers/update']['post'] = 'master-data/teachers/update';
$route['master-data/teachers/destroy']['post'] = 'master-data/teachers/destroy';

// PARENTS
$route['master-data/parents'] = 'master-data/parents';
$route['master-data/parents/index-data'] = 'master-data/parents/indexData';
$route['master-data/parents/add']= 'master-data/parents/add';
$route['master-data/parents/store']['post'] = 'master-data/parents/store';
$route['master-data/parents/edit/(:num)'] = 'master-data/parents/edit/$1';
$route['master-data/parents/update']['post'] = 'master-data/parents/update';
$route['master-data/parents/destroy']['post'] = 'master-data/parents/destroy';

// AGAMA
$route['master-data/agama'] = 'master-data/agama';
$route['master-data/agama/index-data'] = 'master-data/agama/indexData';
$route['master-data/agama/add']= 'master-data/agama/add';
$route['master-data/agama/store']['post'] = 'master-data/agama/store';
$route['master-data/agama/edit/(:num)'] = 'master-data/agama/edit/$1';
$route['master-data/agama/update']['post'] = 'master-data/agama/update';
$route['master-data/agama/destroy']['post'] = 'master-data/agama/destroy';

// CONTACTS
$route['master-data/contacts'] = 'master-data/contacts';
$route['master-data/contacts/index-data'] = 'master-data/contacts/indexData';
$route['master-data/contacts/add']= 'master-data/contacts/add';
$route['master-data/contacts/store']['post'] = 'master-data/contacts/store';
$route['master-data/contacts/edit/(:num)'] = 'master-data/contacts/edit/$1';
$route['master-data/contacts/update']['post'] = 'master-data/contacts/update';
$route['master-data/contacts/destroy']['post'] = 'master-data/contacts/destroy';

// EKSKUL
$route['master-data/extracuricullar'] = 'master-data/extracuricullar';
$route['master-data/extracuricullar/index-data'] = 'master-data/extracuricullar/indexData';
$route['master-data/extracuricullar/add']= 'master-data/extracuricullar/add';
$route['master-data/extracuricullar/store']['post'] = 'master-data/extracuricullar/store';
$route['master-data/extracuricullar/edit/(:num)'] = 'master-data/extracuricullar/edit/$1';
$route['master-data/extracuricullar/update']['post'] = 'master-data/extracuricullar/update';
$route['master-data/extracuricullar/destroy']['post'] = 'master-data/extracuricullar/destroy';

// ROLES
$route['master-data/roles'] = 'master-data/roles';
$route['master-data/roles/index-data'] = 'master-data/roles/indexData';
$route['master-data/roles/add']= 'master-data/roles/add';
$route['master-data/roles/store']['post'] = 'master-data/roles/store';
$route['master-data/roles/edit/(:num)'] = 'master-data/roles/edit/$1';
$route['master-data/roles/update']['post'] = 'master-data/roles/update';
$route['master-data/roles/destroy']['post'] = 'master-data/roles/destroy';

// TYPE NILAI
$route['master-data/typenilai'] = 'master-data/typenilai';
$route['master-data/typenilai/index-data'] = 'master-data/typenilai/indexData';
$route['master-data/typenilai/add']= 'master-data/typenilai/add';
$route['master-data/typenilai/store']['post'] = 'master-data/typenilai/store';
$route['master-data/typenilai/edit/(:num)'] = 'master-data/typenilai/edit/$1';
$route['master-data/typenilai/update']['post'] = 'master-data/typenilai/update';
$route['master-data/typenilai/destroy']['post'] = 'master-data/typenilai/destroy';

// EVENTS
$route['master-data/events'] = 'master-data/events';
$route['master-data/events/index-data'] = 'master-data/events/indexData';
$route['master-data/events/add']= 'master-data/events/add';
$route['master-data/events/store']['post'] = 'master-data/events/store';
$route['master-data/events/edit/(:num)'] = 'master-data/events/edit/$1';
$route['master-data/events/update']['post'] = 'master-data/events/update';
$route['master-data/events/destroy']['post'] = 'master-data/events/destroy';

// EVENTS TYPE
$route['master-data/events-type'] = 'master-data/eventstype';
$route['master-data/events-type/index-data'] = 'master-data/eventstype/indexData';
$route['master-data/events-type/add']= 'master-data/eventstype/add';
$route['master-data/events-type/store']['post'] = 'master-data/eventstype/store';
$route['master-data/events-type/edit/(:num)'] = 'master-data/eventstype/edit/$1';
$route['master-data/events-type/update']['post'] = 'master-data/eventstype/update';
$route['master-data/events-type/destroy']['post'] = 'master-data/eventstype/destroy';

// FOOD MENU
$route['master-data/foodmenu'] = 'master-data/foodmenu';
$route['master-data/foodmenu/index-data'] = 'master-data/foodmenu/indexData';
$route['master-data/foodmenu/add']= 'master-data/foodmenu/add';
$route['master-data/foodmenu/store']['post'] = 'master-data/foodmenu/store';
$route['master-data/foodmenu/edit/(:num)'] = 'master-data/foodmenu/edit/$1';
$route['master-data/foodmenu/update']['post'] = 'master-data/foodmenu/update';
$route['master-data/foodmenu/destroy']['post'] = 'master-data/foodmenu/destroy';

// SCHOOL
$route['master-data/school'] = 'master-data/school';
$route['master-data/school/index-data'] = 'master-data/school/indexData';
$route['master-data/school/add']= 'master-data/school/add';
$route['master-data/school/store']['post'] = 'master-data/school/store';
$route['master-data/school/edit/(:num)'] = 'master-data/school/edit/$1';
$route['master-data/school/update']['post'] = 'master-data/school/update';
$route['master-data/school/destroy']['post'] = 'master-data/school/destroy';

// ARTICLES TYPE
$route['master-data/articles-type'] = 'master-data/articlestype';
$route['master-data/articles-type/index-data'] = 'master-data/articlestype/indexData';
$route['master-data/articles-type/add']= 'master-data/articlestype/add';
$route['master-data/articles-type/store']['post'] = 'master-data/articlestype/store';
$route['master-data/articles-type/edit/(:num)'] = 'master-data/articlestype/edit/$1';
$route['master-data/articles-type/update']['post'] = 'master-data/articlestype/update';
$route['master-data/articles-type/destroy']['post'] = 'master-data/articlestype/destroy';

// ARTICLES TYPE
$route['master-data/articles'] = 'master-data/articles';
$route['master-data/articles/index-data'] = 'master-data/articles/indexData';
$route['master-data/articles/add']= 'master-data/articles/add';
$route['master-data/articles/store']['post'] = 'master-data/articles/store';
$route['master-data/articles/edit/(:num)'] = 'master-data/articles/edit/$1';
$route['master-data/articles/update']['post'] = 'master-data/articles/update';
$route['master-data/articles/destroy']['post'] = 'master-data/articles/destroy';

// EXPERIENCE
$route['master-data/experience'] = 'master-data/experience';
$route['master-data/experience/index-data'] = 'master-data/experience/indexData';
$route['master-data/experience/add']= 'master-data/experience/add';
$route['master-data/experience/store']['post'] = 'master-data/experience/store';
$route['master-data/experience/edit/(:num)'] = 'master-data/experience/edit/$1';
$route['master-data/experience/update']['post'] = 'master-data/experience/update';
$route['master-data/experience/destroy']['post'] = 'master-data/experience/destroy';

// NEWS
$route['master-data/news'] = 'master-data/news';
$route['master-data/news/index-data'] = 'master-data/news/indexData';
$route['master-data/news/add']= 'master-data/news/add';
$route['master-data/news/store']['post'] = 'master-data/news/store';
$route['master-data/news/edit/(:num)'] = 'master-data/news/edit/$1';
$route['master-data/news/update']['post'] = 'master-data/news/update';
$route['master-data/news/destroy']['post'] = 'master-data/news/destroy';

// SCHOOL & IMPROVEMENT
$route['master-data/schoolimprovement'] = 'master-data/schoolimprovement';
$route['master-data/schoolimprovement/index-data'] = 'master-data/schoolimprovement/indexData';
$route['master-data/schoolimprovement/add']= 'master-data/schoolimprovement/add';
$route['master-data/schoolimprovement/store']['post'] = 'master-data/schoolimprovement/store';
$route['master-data/schoolimprovement/edit/(:num)'] = 'master-data/schoolimprovement/edit/$1';
$route['master-data/schoolimprovement/update']['post'] = 'master-data/schoolimprovement/update';
$route['master-data/schoolimprovement/destroy']['post'] = 'master-data/schoolimprovement/destroy';

// CLASSES PROGRAM
$route['master-data/classesprogram'] = 'master-data/classesprogram';
$route['master-data/classesprogram/index-data'] = 'master-data/classesprogram/indexData';
$route['master-data/classesprogram/add']= 'master-data/classesprogram/add';
$route['master-data/classesprogram/store']['post'] = 'master-data/classesprogram/store';
$route['master-data/classesprogram/edit/(:num)'] = 'master-data/classesprogram/edit/$1';
$route['master-data/classesprogram/update']['post'] = 'master-data/classesprogram/update';
$route['master-data/classesprogram/destroy']['post'] = 'master-data/classesprogram/destroy';

// OTHER SERVICE
$route['master-data/otherservice'] = 'master-data/otherservice';
$route['master-data/otherservice/index-data'] = 'master-data/otherservice/indexData';
$route['master-data/otherservice/add']= 'master-data/otherservice/add';
$route['master-data/otherservice/store']['post'] = 'master-data/otherservice/store';
$route['master-data/otherservice/edit/(:num)'] = 'master-data/otherservice/edit/$1';
$route['master-data/otherservice/update']['post'] = 'master-data/otherservice/update';
$route['master-data/otherservice/destroy']['post'] = 'master-data/otherservice/destroy';

// ABOUT US
$route['master-data/about-us'] = 'master-data/aboutus';
$route['master-data/about-us/index-data'] = 'master-data/aboutus/indexData';
$route['master-data/about-us/add']= 'master-data/aboutus/add';
$route['master-data/about-us/store']['post'] = 'master-data/aboutus/store';
$route['master-data/about-us/edit/(:num)'] = 'master-data/aboutus/edit/$1';
$route['master-data/about-us/update']['post'] = 'master-data/aboutus/update';
$route['master-data/about-us/destroy']['post'] = 'master-data/aboutus/destroy';

// MENU TRANSACTION ==============================================================================================================

// SCHOOL YEAR
$route['transaction/schoolyear'] = 'transaction/schoolyear';
$route['transaction/schoolyear/index-data'] = 'transaction/schoolyear/indexData';
$route['transaction/schoolyear/add']= 'transaction/schoolyear/add';
$route['transaction/schoolyear/store']['post'] = 'transaction/schoolyear/store';
$route['transaction/schoolyear/edit/(:num)'] = 'transaction/schoolyear/edit/$1';
$route['transaction/schoolyear/update']['post'] = 'transaction/schoolyear/update';
$route['transaction/schoolyear/destroy']['post'] = 'transaction/schoolyear/destroy';

// EKSKUL STUDENT
$route['transaction/extracuricullar-student'] = 'transaction/extracuricullarstudent';
$route['transaction/extracuricullar-student/index-data'] = 'transaction/extracuricullarstudent/indexData';
$route['transaction/extracuricullar-student/add']= 'transaction/extracuricullarstudent/add';
$route['transaction/extracuricullar-student/store']['post'] = 'transaction/extracuricullarstudent/store';
$route['transaction/extracuricullar-student/edit/(:num)'] = 'transaction/extracuricullarstudent/edit/$1';
$route['transaction/extracuricullar-student/update']['post'] = 'transaction/extracuricullarstudent/update';
$route['transaction/extracuricullar-student/destroy']['post'] = 'transaction/extracuricullarstudent/destroy';

// TESTIMONI
$route['transaction/testimoni'] = 'transaction/testimoni';
$route['transaction/testimoni/index-data'] = 'transaction/testimoni/indexData';
$route['transaction/testimoni/add']= 'transaction/testimoni/add';
$route['transaction/testimoni/store']['post'] = 'transaction/testimoni/store';
$route['transaction/testimoni/edit/(:num)'] = 'transaction/testimoni/edit/$1';
$route['transaction/testimoni/update']['post'] = 'transaction/testimoni/update';
$route['transaction/testimoni/destroy']['post'] = 'transaction/testimoni/destroy';
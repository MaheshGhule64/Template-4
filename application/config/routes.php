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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'login/isValidUser';
$route['website_Data'] = 'Website/websiteData';
$route['page_details'] = 'Page/page_data';
$route['registration'] = 'Registration/NewRegistration';
$route['insert_website'] = 'Website/new_website';
$route['insert_page'] = 'Page/new_page';
$route['profile_update']['put'] = 'Update/profile_update';
$route['website_update']['put'] = 'Website/website_update';
$route['page_update']['put'] = 'Page/page_update';
$route['password_update']['patch'] = 'Update/password_update';
$route['update_percentage'] = 'Update/profile_update_percentage';
$route['insert_template_category'] = 'template/new_template_category';
$route['insert_template'] = 'template/new_template';
$route['update_template_category'] = 'template/update_template_category';
$route['update_template'] = 'template/update_template';
$route['get_template'] = 'template/template_data';
$route['upload_image'] = 'Media/image_upload';
$route['upload_video'] = 'Media/video_upload';
$route['get_page/(:any)/(:any)'] = 'Page/specific_page/$1/$2';
$route['get_timing/(:any)'] = 'Opening_Hours/get_resta_timing/$1';
$route['get_timing'] = 'Opening_Hours/validation';
$route['get_html/(:any)'] = 'Opening_Hours/html_tbl/$1';
$route['get_html'] = 'Opening_Hours/validation1';
$route['get_deals_html/(:any)'] = 'Our_Deals/deals_html/$1';
$route['get_deals_html'] = 'Our_Deals/validation';
$route['get_menu_details/(:any)'] = 'Our_Deals/menu_details/$1';
$route['get_menu_details'] = 'Our_Deals/validation1';
$route['get_header_menu/(:any)'] = 'Header_Menu/menu_data/$1';
$route['get_header_menu'] = 'Header_Menu/validation';
$route['get_header_html/(:any)'] = 'Header_Menu/header_html/$1';
$route['get_header_html'] = 'Header_Menu/validation1';
$route['get_header_html'] = 'Header_Menu/validation1';
$route['get_contact_html/(:any)'] = 'Contact/contact_html/$1';
$route['get_contact_html'] = 'Contact/validation';
$route['get_resta_contact'] = 'About_Us/validation';
$route['get_resta_contact/(:any)'] = 'About_Us/resta_contact/$1';
$route['get_about_us_contact_html/(:any)'] = 'About_Us/contact_html/$1';
$route['get_about_us_contact_html'] = 'About_Us/validation1';
$route['get_book_table_html/(:any)'] = 'Reservation/book_table_html/$1';
$route['get_book_table_html'] = 'Reservation/validation';
$route['get_gallery_html/(:any)'] = 'Gallery/gallery_html/$1';
$route['get_gallery_html'] = 'Gallery/validation';
$route['get_gallery_image_url/(:any)'] = 'Gallery/image_url/$1';
$route['get_gallery_image_url'] = 'Gallery/validation1';






































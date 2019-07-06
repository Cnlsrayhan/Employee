<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']    = 'pages/view';
$route['(:any)']                = 'pages/view/$1';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;


$route['authentication/login'] 		= 'user/tryLogin';
$route['authentication/logout'] 	= 'user/tryLogout';
$route['account/dashboard']			= 'pages/view';
$route['account/projects']			= 'pages/view/projects';
$route['account/projects/create']	= 'pages/view/projects_create';
$route['account/employees']			= 'pages/view/employee';
$route['account/employee/create']	= 'pages/view/employee_create';
$route['account/research']			= 'pages/view/research';
$route['account/research/create']	= 'pages/view/research_create';
$route['account/content']			= 'pages/view/content';
$route['account/content/create']	= 'pages/view/content_create';
$route['account/customer']			= 'pages/view/customer';
$route['account/customer/create']	= 'pages/view/customer_create';
$route['account/design']			= 'pages/view/design';
$route['account/design/create']	    = 'pages/view/design_create';
$route['employee_create/place']	 	= 'user/getRegencyByProvince'; 
$route['employee_create/save']		= 'user/addEmployee';

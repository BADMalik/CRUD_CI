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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

    $route['country'] = "country/index";
    $route['userStore']['post'] = "user/store";
    $route['allusers'] = "country/all_users";
    $route['deleteUser']['post']="user/delete";
    $route['editUser/(:any)']="user/edit/$1";
    $route['userUpdate']['post']='user/update';
    $route['print']='user/print';
    $route['import']="user/loadImportPage";
    $route['loadData']['post']='user/loadData';
    $route['importData']['post']="user/ImportData";
    $route['countryCreate']['post'] = "country/store";
    $route['insertProduct']="File/insertProduct";
    $route['insertInDB']['post']="File/insertInDB";
    $route['allproducts']="File/allProducts";
    $route['updatecart']="File/updateCart";
    $route['checkout']="File/checkout";
    $route['viewproduct/(:any)'] ="File/viewProduct/$1";
    // $route['my-stripe'] = "StripeController";
    $route['stripePost']['post'] = "File/stripePost";

    // $route['/country'] = "Auth/login";
    // $route['countryCreate']['post'] = "Auth/login";
    // $route['countryEdit/(:any)'] = "Auth/login";
    // $route['countryUpdate/(:any)']['put'] = "Auth/login";
    // $route['countryDelete/(:any)']['delete'] = "Auth/login";
    

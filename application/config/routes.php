<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome/masuk';
$route['Pelayanan'] = 'Welcome/masuk';
$route['Pelayanan/(:any)']='Welcome/catat/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['api/ktp/(:num)/(:num)']['GET'] = 'ktpController/getktp/$1/$2';
$route['api/ktp']['POST'] = 'ktpController/savektp';
$route['api/ktp/(:any)']['PUT'] = 'ktpController/updatektp/$1';
$route['api/ktp/(:any)']['DELETE'] = 'ktpController/deletektp/$1';
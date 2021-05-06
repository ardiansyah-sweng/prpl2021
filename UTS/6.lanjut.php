$route['api/mhs/(:num)/(:num)']['GET'] = 'MahasiswaController/getMahasiswa/$1/$2';
$route['api/mhs']['POST'] = 'MahasiswaController/saveMahasiswa';
$route['api/mhs/(:any)']['DELETE'] = 'MahasiswaController/deleteMahasiswa/$1';

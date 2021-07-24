$route['api/mahasiswa/(:num)/(:num)']['GET'] = 'MahasiswaController/getMahasiswa/$1/$2';
$route['api/mahasiswa']['POST'] = 'MahasiswaController/saveMahasiswa';
$route['api/mahasiswa/(:any)']['PUT'] = 'MahasiswaController/updateMahasiswa/$1';
$route['api/mahasiswa/(:any)']['DELETE'] = 'MahasiswaController/deleteMahasiswa/$1';
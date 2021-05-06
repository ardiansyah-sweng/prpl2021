$config['composer_autoload'] = FALSE;
↓
$config['composer_autoload'] = realpath(APPPATH . '../vendor/autoload.php');

#batas

$config['index_page'] = 'index.php';
↓
$config['index_page'] = '';
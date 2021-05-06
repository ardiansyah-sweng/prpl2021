<?php if ( ! defined('BASEPATH')) ;

class MhsController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mhs');
  }

  public function getMhs($page, $size)
  {

    $response = array(
      'content' => $this->Mhs->getMhs(($page - 1) * $size, $size)->result(),
      'totalPages' => ceil($this->Mhs>getCountMhs() / $size));

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function simpanMhs()
  {
      $data = (array)json_decode(file_get_contents('php://input'));
      $this->Mhs->insertMhs($data);

      $response = array(
        'Success' => true,
        'Info' => 'Tersimpan');

      $this->output
        ->set_status_header(201)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
        exit;
  }

  
  public function deleteMhs($nim)
  {
    $this->Mhs->deleteMhs($nim);

    $response = array(
      'Success' => true,
      'Info' => 'Berhasil di hapus');

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

}
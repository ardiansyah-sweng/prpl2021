<?php if ( ! defined('BASEPATH'));

class ktpController {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ktp');
  }

  public function getktp($page, $size)
  {

    $response = array(
      'content' => $this->ktp->getktp(($page - 1) * $size, $size)->result(),
      'totalPages' => ceil($this->ktp->getCountktp() / $size));

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function savektp()
  {
      $data = (array)json_decode(file_get_contents('php://input'));
      $this->ktp->insertktp($data);

      $response = array(
        'Success' => true,
        'Info' => 'Data Tersimpan');

      $this->output
        ->set_status_header(201)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
        exit;
  }

  public function updatektp($NIK)
  {
    $data = (array)json_decode(file_get_contents('php://input'));
    $this->ktp->updatektp($data, $NIK);

    $response = array(
      'Success' => true,
      'Info' => 'Data Berhasil di update');

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  public function deletektp($NIK)
  {
    $this->ktp->deletektp($NIK);

    $response = array(
      'Success' => true,
      'Info' => 'Data Berhasil di hapus');

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

}
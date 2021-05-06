<?php if ( ! defined('BASEPATH')) ;
class Mhs extends CI_Model {

  public function getCountMhs()
  {
      return $this->db->count_all_results('mhs', FALSE);
  }

  public function getHhs($page, $size)
  {
      return $this->db->get('mhs', $size, $page);
  }

  public function insertMhs($dataMahasiswa)
  {
      $nilai = array(
        'nim' => $dataMahasiswa['nim'],
        'nama' => $dataMahasiswa['nama'],
        'email' => $dataMahasiswa['email'],
      );
      $this->db->insert('mhs', $niali);
  }



  public function deleteMhs($nim)
  {
    $val = array(
      'nim' => $nim
    );
    $this->db->delete('mhs', $nilai);
  }

}
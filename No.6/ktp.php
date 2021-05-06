<?php if ( ! defined('BASEPATH'));

class ktp {

  public function getCountktp()
  {
      return $this->db->count_all_results('ktp', FALSE);
  }

  public function getktp($page, $size)
  {
      return $this->db->get('ktp', $size, $page);
  }

  public function insertktp($dataktp)
  {
      $val = array(
        'NIK' => $dataktp['3306102209000001'],
        'Nama' => $dataktp['Abyan Haidar Luthfi'],
        'tanggal lahir' => $dataktp['22 September 2000'],
        'alamat' => $dataktp['purwoejo'],
        'agama' => $dataktp['islam'],
        'jenis kelamin' => $dataktp['laki-laki'],
        'Status perkawinan' => $dataktp['belum kawin'],
        'Pekerjaan' => $dataktp['mahasiswa'],
        'Kewarganegaraan' => $dataktp['indonesia']
      );
      $this->db->insert('ktp', $val);
  }

  public function updatektp($dataktp, $NIK)
  {
    $val = array(
      'Nama' => $dataktp['Nama'],
      'tanggal lahir' => $dataktp['tanggal lahir'],
      'alamat' => $dataktp['alamat'],
      'agama' => $dataktp['agama'],
      'jenis kelamin' => $dataktp['jenis kelamin'],
      'Status perkawinan' => $dataktp['Status perkawinan'],
      'Pekerjaan' => $dataktp['Pekerjaan'],
      'Kewarganegaraan' => $dataktp['Kewarganegaraan']
    );
    $this->db->where('NIK', $NIK);
    $this->db->update('ktp', $val);
  }

  public function deletektp($NIK)
  {
    $val = array(
      'NIK' => $NIK
    );
    $this->db->delete('ktp', $val);
  }

}

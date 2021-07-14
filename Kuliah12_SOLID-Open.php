<?php

interface kalkulatorBangunRuang{
    public function hitungBangunRuang();
}

class LuasPersegiPanjang implements kalkulatorBangunRuang{
    public $panjang;
    public $lebar;

    public function hitungBangunRuang(){
        return $this->panjang * $this->lebar;
    }
}

class VolumeBola implements kalkulatorBangunRuang{
    public $jari;
    public $phi = 3.14;

    public function hitungBangunRuang()
    {
        return (4/3) * $this->phi * ($this->jari * $this->jari * $this->jari);
    }
}

class VolumeKerucut implements kalkulatorBangunRuang{
    public $tinggi;
    public $jari;
    public $phi = 13.4;

    public function hitungBangunRuang()
    {
        return (1/3) * $this->phi * ($this->jari * $this->jari) *  $this->tinggi;
    }
}

class VolumeKubus implements kalkulatorBangunRuang{
    public $rusuk = 12;

    public function hitungBangunRuang()
    {
        return $this->rusuk * $this->rusuk * $this->rusuk; 
    }
}

class KelilingLingkaran implements kalkulatorBangunRuang{
    public $jari;
    public $phi = 13.4;

    public function hitungBangunRuang()
    {
        return 2 * $this->phi * $this->jari;
    }
}

class kalkulatorBangunRuangFactory{
    public function initializeKalkulatorBangunRuang($type){
        if($type === 'LuasPersegiPanjang'){
            return new LuasPersegiPanjang();
        }
        if($type === 'VolumeBola'){
            return new VolumeBola();
        }
        if($type === 'VolumeKerucut'){
            return new VolumeKerucut();
        }
        if($type === 'volumeKubus'){
            return new VolumeKubus();
        }
        if($type === 'KelilingLingkaran'){
            return new KelilingLingkaran();
        }
        throw new Exception("Pilihan Salah");
    }
}

$satuan = ['rusuk' => 12, 'panjang'=>0, 'lebar'=>0, 'jari'=>0];
$pilihanKalkulatorBangunRuang = 'volumeKubus';
$kalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$kalkulatorBangunRuang = $kalkulatorBangunRuangFactory ->initializeKalkulatorBangunRuang($pilihanKalkulatorBangunRuang, $satuan);
$hasilKalkulatorBangunRuang = $kalkulatorBangunRuang ->hitungBangunRuang();
print_r($hasilKalkulatorBangunRuang );

?>
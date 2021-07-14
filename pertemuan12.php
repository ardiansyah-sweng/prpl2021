<?php

interface Shape
{
    public function area();
}

class LuasPersegiPanjang implements Shape
{
    public $panjang = 0;
    public $lebar = 0;

    public function area()
    {
        return [
            'Bangun Ruang :' => 'Luas Persegi Panjang',
            'Panjang :' => $this->panjang,
            'Lebar :' => $this->lebar,
            'Luas Persegi Panjang :' => ($this->panjang * $this->lebar)
        ];
    }
}

class VolumeBola implements Shape
{
    public $jariJari = 0;
    public $a = 4 / 3;
    public $PHI = 3.14;
    public function area()
    {
        return [
            'Bangun Ruang :' => 'Volume Bola',
            'Panjang Jari-jari :' => $this->jariJari,
            'Volume Bola :' => ($this->a * $this->PHI * $this->jariJari * $this->jariJari * $this->jariJari)
        ];
    }
}

class VolumeKerucut implements Shape
{
    public $a = 0.33;
    public $jariJari = 0;
    public $tinggi = 0;
    public $PHI = 3.14;

    public function area()
    {
        return [
            'Bangun Ruang :' => 'Volume Kerucut',
            'Panjang Jari-jari :' => $this->jariJari,
            'Tinggi :' => $this->tinggi,
            'Volume Kerucut :' => ($this->a * $this->PHI * $this->kuadrat($this->jariJari) * $this->tinggi)
        ];
    }
}

class VolumeKubus implements Shape
{
    public $rusuk = 12;

    public function area()
    {
        return [
            'Bangun Ruang :' => 'Volume Kubus',
            'Panjang Rusuk :' => $this->rusuk,
            'Volume Kubus :' => ($this->rusuk * $this->rusuk * $this->rusuk)
        ];
    }
}

class KelilingLingkaran implements Shape
{
    public $a = 2;
    public $jariJari = 0;
    public $PHI = 3.14;

    public function area()
    {
        return [
            'Bangun Ruang :' => 'Keliling Lingkaran',
            'Panjang Jari-jari :' => $this->jariJari,
            'Keliling Lingkaran :' => ($this->PHI * $this->a * $this->jariJari)
        ];
    }
}

class kalkulatorBangunRuangFactory
{
    public function initializekalkulatorBangunRuang($pilihanKalkulatorBangunRuang, $satuan)
    {
        if ($pilihanKalkulatorBangunRuang === 'luasPersegiPanjang') {
            return new LuasPersegiPanjang($satuan);
        }
        if ($pilihanKalkulatorBangunRuang === 'volumeBola') {
            return new VolumeBola($satuan);
        }
        if ($pilihanKalkulatorBangunRuang === 'volumeKerucut') {
            return new VolumeKerucut($satuan);
        }
        if ($pilihanKalkulatorBangunRuang === 'volumeKubus') {
            return new VolumeKubus($satuan);
        }
        if ($pilihanKalkulatorBangunRuang === 'kelilingLingkaran') {
            return new KelilingLingkaran($satuan);
        }
    }
}

$Satuan = ['Rusuk' => 12,'Panjang' => 0,'Lebar' => 0,'jariJari' => 0];
$pilihanKalkulatorBangunRuang = 'volumeKubus';
$kalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$kalkulatorBangunRuang = $kalkulatorBangunRuangFactory -> initializekalkulatorBangunRuang($pilihanKalkulatorBangunRuang, $Satuan);
$hasilKalkulatorBangunRuang = $kalkulatorBangunRuang -> area();
print_r($hasilKalkulatorBangunRuang);

?>
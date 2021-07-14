<?php

interface BangunRuang{
    public function ruang();
}


class PersegiPanjang implements BangunRuang{
    public function ruang($satuan)
    {
        $this->panjang = $satuan['panjang'];
        $this->lebar = $satuan['lebar'];

        $LuasPersegiPanjang = panjang * lebar;

        return $LuasPersegiPanjang;
    }
}

class Bola implements BangunRuang{
    public function ruang($satuan)
    {
        $this->jari_jari = $satuan['jari_jari'];
        $this->phi = $satuan['phi'];
        
        $VolumeBola = 4/3 * phi;

        return $VolumeBola;
    }
}

class Kerucut implements BangunRuang{
    public function ruang()
    {
        $this->jari_jari = $satuan['jari_jari'];
        $this->tinggi = $satuan['tinggi'];
        $this->phi = $satuan['phi'];

        $VolumeKerucut = 1/3 * phi * jari_jari * jari_jari * tinggi;
        
        return $VolumeKerucut;
    }
}

class Kubus implements BangunRuang{
    public function ruang()
    {
        $this->sisi = $satuan['sisi'];

        $VolumeKubus = sisi * sisi * sisi;

        return $VolumeKubus;
    }
}

class Lingkaran implements BangunRuang{
    public function ruang()
    {
        $this->jari_jari = $satuan['jari_jari'];
        $this->phi = $satuan['phi'];

        $KelilingLingkaran = phi * 2 * jari_jari;

        return $KelilingLingkaran;
    }
}

class BangunRuangFactory{
    public function initializeBangunRuang($type, $satuan){
        if($type === 'LuasPersegiPanjang'){
            return new PersegiPanjang($satuan);
        }
        if($type === 'VolumeBola'){
            return new Bola($satuan);
        }
        if($type === 'VolumeKerucut'){
            return new Kerucut($satuan);
        }
        if($type === 'VolumeKubus'){
            return new Kubus($satuan);
        }
        if($type === 'KelilingLingkaran'){
            return new Lingkaran($satuan);
        }

        throw new Exception("Unsupported Bangun Ruang Factory");
    }
}

$satuan = ['rusuk' => 12, 'panjang'=> 0, 'lebar'=> 0, 'jejari'=> 0];
$pilihanBangunRuang = 'VolumeKubus';
$bangunRuangFactory = new BangunRuangFactory();
$bangunRuang = $bangunRuangFactory->initializeBangunRuang($pilihanBangunRuang, $satuan);
print_r($bangunRuang->hitungBangunRuang());
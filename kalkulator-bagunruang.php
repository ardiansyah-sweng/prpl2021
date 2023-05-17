<?php

interface Kalkulator
{
    public function cal();
}

class L_PersegiP implements Kalkulator
{
    public $panjang;
    public $lebar;
    public function cal()
    {
        return [
            $this->panjang * $this->lebar
        ];
    }
}

class V_Bola implements Kalkulator
{
    public $jari;
    public $phi;
    public function cal()
    {
        return [
            (4/3) * $this->phi * $this->jari * $this->jari
        ];
    }
}

class V_Kerucut implements Kalkulator
{
    public $tinggi;
    public $jari;
    public $phi;
    public function cal()
    {
        return [
            (1/3) * $this->phi * $this->jari * $this->jari * $this->jari * $this->tinggi
        ];
    }
}

class V_Kubus implements Kalkulator
{
    public $rusuk;
    public function cal()
    {
        return [
            $this->rusuk * $this->rusuk * $this->rusuk
        ];
    }
}

class K_Lingkaran implements Kalkulator
{
    public $jari;
    public $phi;
    public function cal()
    {
        return [
            2 * $this->phi * $this->jari
        ];
    }
}

class BangunRuangFactory
{
    public function initializeBangunRuang($type,$pjg,$lbr)
    {
        if ($type === 'lpersegip') {


            $konz1 = new L_PersegiP();
            $konz1 -> panjang = $pjg  ;
            $konz1 -> lebar = $lbr ;

            return $konz1;
        }
        if ($type === 'vbola') {
            return new V_Bola();
        }
        if ($type === 'vkerucut') {
            return new V_Kerucut();
        }
        if ($type === 'vkubus') {
            return new V_Kubus();
        }
        if ($type === 'klingkaran') {
            return new K_Lingkaran();
        }

        throw new Exception("Try Again Slur!!!");
    }
}


$panjang = 30;
$lebar = 10;
$tinggi ;
$jari;

$pilihan = 'lpersegip';
$bangunRuangFactory = new BangunRuangFactory();
$bangunRuang = $bangunRuangFactory->initializeBangunRuang($pilihan,$panjang,$lebar);
print_r($bangunRuang->cal());

?>
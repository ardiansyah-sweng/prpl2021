<?php

interface Shape{
    public function area();
}
class PersegiPanjang implements Shape{
    public $panjang;
    public $lebar;

    public function area(){
        return $this->panjang * $this->lebar;
    }
}

class Bola implements Shape{
    public $jarijaribola;

    public function area(){
        return 4/3 * (pi() * $this->jarijaribola * $this->jarijaribola * $this->jarijaribola );
    }
}

class Kerucut implements Shape{
    public $jarijarikerucut;
    public $tinggikerucut;

    public function area(){
        return 1/3 * (pi() * $this->jarijarikerucut * $this->jarijarikerucut * $this->tinggikerucut );
    }
}

class Kubus implements Shape{
    public $sisi;

    public function area(){
        return $this->sisi * $this->sisi * $this->sisi;
    }
}

class Lingkaran implements Shape{
    public $jarijarilingkaran;

    public function area(){
        return 2 * (pi() * $this->jarijarilingkaran);
    }
}

class AreaKalkulator {
    public function kalkulator(Shape $shapes)
    {
        $area = [];

        foreach ($shapes as $shape) {
            $area[] = $shape->area();
        }

        return array_sum($area);
    }
}

?>
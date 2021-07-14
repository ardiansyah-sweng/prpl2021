<?php 

	abstract class CalBangunRuang
	{ 
		// public $satuan = ['panjang'=>0, 'lebar'=>0, 'jari'=>0, 'rusuk'=>0, 'tinggi'=0];
		public function initializeKalkulatorBangunRuang($jenis, $hitung, $satuan)
		{
			echo "Bangun ruang : ".$jenis;
			echo"<br><br>";
			foreach ($satuan as $s => $val) echo "$s = $val <br>";
			echo "<br>".$hitung." = ";
		}

		abstract public function hitung($jenis, $hitung, $satuan);
	}

	class KalkulatorBangunRuangFactory extends CalBangunRuang
	{
		
		public function hitung($jenis, $hitung, $satuan)
		{
			if($jenis == 'persegipanjang')
				if($hitung=='luas') echo PersegiPanjang::luas($satuan);
				else echo PersegiPanjang::keliling($satuan);
			else if($jenis =='bola')
				if($hitung == 'volume') echo Bola::volume($satuan);
				else echo Bola::keliling($satuan);
			else if($jenis =='kubus')
				if($hitung == 'volume') echo Kubus::volume($satuan);
				else echo Kubus::luas($satuan);
			else if($jenis =='kerucut')
				if($hitung == 'volume') echo Kerucut::volume($satuan);
				else echo Kerucut::luas($satuan);
			else if($jenis =='lingkaran')
				if($hitung=='luas') echo Lingkaran::luas($satuan);
				else echo Lingkaran::keliling($satuan);	

		}
	};

	class PersegiPanjang
	{
		function luas($satuan)
		{
			return $satuan['panjang']*$satuan['lebar'];
		}
		function keliling($satuan)
		{
			return 2*($satuan['panjang']+$satuan['lebar']);
		}
	}

	class Lingkaran 
	{
		
		function luas($satuan) 
		{
			return 3.14*$satuan['jari']*$satuan['jari'];
		}
		function keliling($satuan) 
		{
			return 3.14*2*$satuan['jari']; 
		}
		
	}

	class Bola
	{
		function volume($satuan)
		{
			return 4/3*3.14*pow($satuan['jari'],3);
		}
		function keliling($satuan) 
		{
			return 4/3*3.14*pow($satuan['jari'],2);
		}

	}

	class Kerucut
	{
		function luas($satuan)
		{
			$s=sqrt(pow($satuan['jari'],2)+pow($satuan['tinggi'],2));
			return 3.14*$satuan['jari']*($satuan['jari']+$s);
		}

		function volume($satuan)
		{
			return 1/3*3.14*pow($satuan['jari'],2)*$satuan['tinggi'];
		}
	}

	class Kubus
	{
		function luas($satuan)
		{
			return pow($satuan['rusuk'],2)*6;
		}
		function volume($satuan)
		{
			return pow($satuan['rusuk'],3);
		}
	}


	$satuan1=['panjang'=>0, 'lebar'=>0, 'jari'=>10, 'rusuk'=>0, 'tinggi'=>8];
	$br='kerucut';
	$h='volume';

	$bangunruang=new KalkulatorBangunRuangFactory;
	$bangunruang->initializeKalkulatorBangunRuang($br,$h, $satuan1);
	$bangunruang->hitung($br, $h, $satuan1);

 ?>
<!DOCTYPE html> //adalah suatu deklarasi yang digunakan untuk mengidentifikasi jenis dokumen HTML
<html>
<head>
	<title>SIGN-UP</title> //judul
	<link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
	<div align="center"><strong><font size="6" face="Courier New, Courier, mono">PENDAFTARAN </font></strong></div>

	<form action="proses.php" method="post">// menampung elemen, post(digunakan untuk mengirim data pada database)
		<center>
		<table width="58%"border="0"align="center"> // membuat tabel dengan ukuran lebar 58%
		<tr>  //untuk mendefinisikan pembuatan baris pada tabel.
			<td>First Name</td>   //membuat kolom firs name atau sel di setiap baris pada tabel
			<td><input type="text" name="Nama" id="Nama"></td> // penginputan dengan tipe teks
		</tr>

		<tr>
			<td>Last Name</td> //membuat kolom Last name atau sel di setiap baris pada tabel
			<td><input type="text" name="Last Name" id="Last Name"></td>
		</tr>

		<tr>
			<td>Email</td> //membuat email atau sel di setiap baris pada tabel
			<td><input type="text" name="Email" id="E-Mail"></td>
		</tr>

		<tr>
			<td>Password</td> //membuat kolom password atau sel di setiap baris pada tabel
			<td><input type="text" name="Password" id="Password"></td>
		</tr>

		<tr>
			<td>Confirm Password</td> //membuat kolom config password atau sel di setiap baris pada tabel
			<td><input type="text" name="Confirm Password" id="Confirm Password"></td>
		</tr>

		<tr>
			<td>Phone</td> //membuat kolom phone atau sel di setiap baris pada tabel
			<td><input type="text" name="Phone" id="Phone "></td>
		</tr>

		<tr>
			<td> 
			<button type="submit" name="submit" class="menu">submit</button> //membuat tombol submit didalam form
			<button type="submit" name="submit" class="menu">reset</button> //membuat tombol reset didalam form
			</td>
		</tr>
		</table>
		</center>
	</form>
	<div align="center"><strong><a href="Pweb.php">Halaman Pertama</a></strong></div>

</body>
</html>
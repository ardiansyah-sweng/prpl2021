<?php
$c = new mysqli("localhost", "root", "", "alumni");
if ($c->connect_errno) {
	echo json_encode(array('result' => 'ERROR', 'message' => 'Failed to connect DB'));
	die();
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Input Alumni</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.table_a {
			border-color: #ebbd34;
			align-content: center;
			padding: 5;
			word-spacing: 10;
		}
		.container {
			padding: 20px;
		}
		body{
			background: #16c79a;
		}
	</style>
</head>

<body>
	<div class='container'>
	<form action="" method="post">
		<table class="table_a" align="center" cellpadding="3" cellspacing="10">
			<tr>

				<?php

				if (isset($_POST['idparam'])) {
					$id = $_POST['idparam'];
					$nama = "";
					$jurusan = "";
					$tahun_lulus = "";
					$idpass = 0;
					$sql = "SELECT * from alumni where id=$id";
					$result = $c->query($sql);
					if ($result->num_rows > 0) {
						while ($obj = $result->fetch_assoc()) {
							$nama = $obj['nama'];
							$jurusan = $obj['jurusan'];
							$tahun_lulus = $obj['tahun_lulus'];
							$idpass = $obj['id'];
						}
					} else {
						echo $sql;
					}

				?>
					<td colspan="3" align="center">
						<h3><b>FORMULIR EDIT DATA ALUMNI</b></h3>
					</td>
			</tr>

			<tr>
				<input type="hidden" name="idp" value="<?= $idpass ?>">
				<td width="75">Nama</td>
				<td width="10">:</td>
				<td width="356"><input name="nama" size="50" value="<?= $nama ?>"></td>
			</tr>
			<tr>
				<td width="75">Jurusan</td>
				<td width="10">:</td>
				<td width="356"><input name="jurusan" size="50" value="<?= $jurusan ?>"></td>
			</tr>
			<tr>
				<td width="75">Tahun Lulus</td>
				<td width="10">:</td>
				<td width="356"><input name="tahun_lulus" size="50" value="<?= $tahun_lulus ?>"></td>
			</tr>
			<tr>
				<td colspan="6" align="center" style="padding-bottom:10px">
					<div>
						<button type="submit" name="submit" style="background: #F4E1E1; border: 0; borderradius: 10px;">Simpan Edit</button>
						<button type="reset" style="background: #F4E1E1; border: 0; borderradius: 10px;">Ulangi</button>
					</div>
				</td>
			</tr>
		</table>
		</div>

	<?php
				}
				if (isset($_POST['submit'])) {
					$nama = $_POST['nama'];
					$jurusan = $_POST['jurusan'];
					$tahun_lulus = $_POST['tahun_lulus'];
					$id = $_POST['idp'];
					$sql6 = "UPDATE alumni SET nama='$nama', jurusan='$jurusan', tahun_lulus=$tahun_lulus WHERE id=$id";

					if ($c->query($sql6) === TRUE) {
						echo "database berhasil diubah. Silahkan kunjungi tautan <a href='dinamis.php'>ini</a> untuk melihat perubahan";
					} else {
						echo "error" . $sql6;
					}
				}
	?>

</body>

</html>
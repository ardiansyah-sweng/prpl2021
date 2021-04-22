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
			border-color: #16c79a;
			align-content: center;
			padding: 5;
			word-spacing: 10;

		}
		.container {
			padding: 20px;
		}
		.tablec{
			background: #bee5d3;
		}
		body{
			background: #16c79a;
		}
	</style>
</head>

<body>
	<div class="container">
	<form action="" method="post">
		<table class="table_a" align="center" cellpadding="3" cellspacing="10">
			<tr>
				<td colspan="3" align="center">
					<h3><b>FORMULIR INPUT DATA ALUMNI</b></h3>
				</td>
			</tr>

			<tr>
				<td width="75">Nama</td>
				<td width="10">:</td>
				<td width="356"><input name="nama" size="50"></td>
			</tr>
			<tr>
				<td width="75">Jurusan</td>
				<td width="10">:</td>
				<td width="356"><input name="jurusan" size="50"></td>
			</tr>
			<tr>
				<td width="75">Tahun Lulus</td>
				<td width="10">:</td>
				<td width="356"><input name="tahun_lulus" size="50"></td>
			</tr>
			<tr>
				<td colspan="6" align="center" style="padding-bottom:10px">
					<div>
						<button type="submit" name="submit" style="background: #F4E1E1; border: 0; borderradius: 10px;">Simpan</button>
						<button type="reset" style="background: #F4E1E1; border: 0; borderradius: 10px;">Ulangi</button>
					</div>
				</td>
			</tr>
		</table>
	</form>
	<br><br>
	<table class="table table-striped tablec">
		<tr>
			<td>ID Alumni</td>
			<td>Nama</td>
			<td>Jurusan</td>
			<td>Tahun Lulus</td>
			<td>Action</td>
			<td>Action</td>
		</tr>

		<?php
		error_reporting(E_ERROR | E_PARSE);

		$c = new mysqli("localhost", "root", "", "alumni");
		if ($c->connect_errno) {
			echo json_encode(array('result' => 'ERROR', 'message' => 'Failed to connect DB'));
			die();
		}

		$sql = "SELECT * from alumni";
		$result = $c->query($sql);
		if ($result->num_rows > 0) {
			while ($obj = $result->fetch_assoc()) {
		?>
				<tr>
					<td><?= $obj['id'] ?></td>
					<td><?= $obj['nama'] ?></td>
					<td><?= $obj['jurusan'] ?></td>
					<td><?= $obj['tahun_lulus'] ?></td>
					<td>
						<form action="edit_alumni.php" method="post">
							<input type="hidden" name="idparam" value="<?= $obj['id'] ?>">
							<button type="submit" name="edit" style="background: #F4E1E1; border: 0; borderradius: 10px;">Edit</button>
						</form>
					</td>
					<td>
						<form action="" method="post">
							<input type="hidden" name="idparam" value="<?= $obj['id'] ?>">
							<button type="submit" name="delete" style="background: #F4E1E1; border: 0; borderradius: 10px;">Hapus</button>
						</form>
					</td>
				</tr>

		<?php

			}
		}

		if (isset($_POST['submit'])) {


			$nama = $_POST['nama'];
			$jurusan = $_POST['jurusan'];
			$tahun_lulus = $_POST['tahun_lulus'];
			echo $nama . " " . $jurusan . " " . $tahun_lulus;
			$sql = "INSERT INTO alumni (nama, jurusan, tahun_lulus) VALUES(?,?,?)";
			$stmt = $c->prepare($sql);
			$stmt->bind_param("ssi", $nama, $jurusan, $tahun_lulus);
			$stmt->execute();
			if ($stmt->affected_rows > 0) {
				echo "Insert Data Mahasiswa berhasil. untuk memperbarui data, silahkan <a href='dinamis.php'>reload</a> halaman";
			} else {
				echo "error " . $sql;
			}
		} else if (isset($_POST['edit'])) {
			echo "edit checked, id=" . $_POST['idparam'];
		} else if (isset($_POST['delete'])) {
			$id = $_POST['idparam'];
			$sql5 = "DELETE FROM alumni WHERE id = (?)";
			$stmt = $c->prepare($sql5);
			$stmt->bind_param("i", $id);
			$stmt->execute();

			if ($stmt->affected_rows > 0) {
				echo "delete berhasil. Silahkan silahkan <a href='dinamis.php'>reload</a> halaman";
			}
		}

		?>

	</table>
	</div>
</body>

</html>
<?php

require 'function.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan ID
$kar = query("SELECT * FROM karyawan WHERE id_karyawan = $id")[0];

// cek tombol submit sdh ditekan atau belum
if (isset($_POST["submit"])) {
	// cek apakah data berhasil di ubah atau tidak
	if (ubah_karyawan($_POST) > 0) {
		echo "
				<script>
					alert('data berhasil diubah!');
					document.location.href = 'tampil_karyawan.php';
				</script>
		";
	} else {
		echo "
		<script>
					alert('data gagal diubah!');
					document.location.href = 'tampil_karyawan.php';
				</script>
		";
	} 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
		<div class="logo">
            <h3>Edit Data Karyawan</h3>
			<br>
        </div>
		<form method="POST" action="">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-6">
					<input type="text" name="nip" class="form-control"
					required value="<?php echo $kar["nip"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Golongan</label>
				<div class="col-sm-6">
					<input type="text" name="golongan_id" class="form-control"
					required value="<?php echo $kar["golongan_id"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-6">
					<input type="text" name="nama" class="form-control"
					required value="<?php echo $kar["nama"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-6">
					<select name="jk" class="form-control">
						<option selected>Jenis Kelamin</option>
						<option value="Perempuan">Perempuan</option>
						<option value="Laki-Laki">Laki-Laki</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-6">
					<input type="text" name="tempatlahir" class="form-control"
					required value="<?php echo $kar["tempatlahir"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-6">
					<input type="text" name="tanggallahir" class="form-control"
					required value="<?php echo $kar["tanggallahir"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<input type="text" name="agama" class="form-control"
					required value="<?php echo $kar["agama"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-6">
				<select name="status" class="form-control">
						<option selected>Status</option>
						<option  value="Menikah">Menikah</option>
						<option  value="Belum Menikah">Belum Menikah</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" name="alamat" class="form-control"
					required value="<?php echo $kar["alamat"]; ?>">
				</div>
			</div>
			<div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
		<br>
		<a href="tampil_karyawan.php">Kembali</a>
	</div>
</body>
</html>
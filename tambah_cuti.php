<?php
require 'function.php';

if (isset($_POST["submit"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah_cuti($_POST) > 0) {
        echo "
				<script>
					alert('data berhasil ditambahkan!');
					document.location.href = 'tampil_cuti.php';
				</script>
		";
    } else {
        echo "
				<script>
					alert('data gagal ditambahkan!');
					document.location.href = 'tampil_cuti.php';
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
    <title>Tambah Data Cuti</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="logo">
            <h3>Tambah Data Cuti Karyawan</h3>
			<br>
        </div>
		<form method="POST" action="">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Karyawan</label>
				<div class="col-sm-6">
					<input type="text" name="karyawan_id" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Cuti</label>
				<div class="col-sm-6">
					<input type="date" name="tanggal_cuti" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah (Rp.)</label>
				<div class="col-sm-6">
					<input type="text" name="jumlah" class="form-control">
				</div>
			</div>
			<div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
		<br>
		<a href="tampil_cuti.php">Kembali</a>
	</div>
</body>
</html>
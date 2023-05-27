<?php
require 'function.php';

if (isset($_POST["submit"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah_gaji($_POST) > 0) {
        echo "
				<script> 
					alert('data berhasil ditambahkan!');
					document.location.href = 'tampil_gaji.php';
				</script>
		";
    } else {
        echo "
				<script>
					alert('data gagal ditambahkan!');
					document.location.href = 'tampil_gaji.php';
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
    <title>Tambah Data Gaji</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head> 
<body>
	<div class="container">
		<div>
            <h3>Tambah Data Gaji</h3>
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
				<label class="col-sm-2 col-form-label">Tanggal Gajihan</label>
				<div class="col-sm-6">
					<input type="date" name="tanggal" class="form-control">
				</div>
			</div>
			<div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
		<br>
		<a href="tampil_golongan.php">Kembali</a>
	</div>
</body> 
</html>
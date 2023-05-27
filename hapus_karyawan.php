<?php 

require 'function.php';

$id = $_GET["id"];

if(hapus_karyawan($id) >0 ){
	echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = 'tampil_karyawan.php';
				</script>
		";
	} else {
		echo "
			<script>
					alert('data gagal dihapus!');
					document.location.href = 'tampil_karyawan.php';
				</script>
		";
	}
 ?>
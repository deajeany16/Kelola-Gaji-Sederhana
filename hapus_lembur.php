<?php 

require 'function.php';

$id = $_GET["id"];

if(hapus_lembur($id) >0 ){
	echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = 'tampil_lembur.php';
				</script>
		";
	} else {
		echo "
			<script>
					alert('data gagal dihapus!');
					document.location.href = 'tampil_lembur.php';
				</script>
		";
	}
 ?>
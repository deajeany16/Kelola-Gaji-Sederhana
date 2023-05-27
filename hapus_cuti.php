<?php 

require 'function.php';

$id = $_GET["id"];

if(hapus_cuti($id) >0 ){
	echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = 'tampil_cuti.php';
				</script>
		";
	} else {
		echo "
			<script>
					alert('data gagal dihapus!');
					document.location.href = 'tampil_cuti.php';
				</script>
		";
	}
 ?>
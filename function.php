<?php

$db = mysqli_connect("localhost", "root", "", "gaji_karyawan");


function query($query)
{
	global $db;
	$result = mysqli_query($db, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah_golongan($data)
{
	global $db;
	// ambil data dari tiap elemen dalam form
    $nama_golongan = htmlspecialchars($data["nama_golongan"]);
	$gaji_pokok = htmlspecialchars($data["gaji_pokok"]);
    $tunjangan_transportasi = htmlspecialchars($data["tunjangan_transportasi"]);
    $tunjangan_makan = htmlspecialchars($data["tunjangan_makan"]);
	// query insert data
	mysqli_query($db, "CALL insert_golongan('$nama_golongan', $gaji_pokok, $tunjangan_transportasi, 
						$tunjangan_makan);");

	return mysqli_affected_rows($db);
}

function tambah_karyawan($data)
{
	global $db;
	// ambil data dari tiap elemen dalam form
    $nip = htmlspecialchars($data["nip"]);
	$nama = htmlspecialchars($data["nama"]);
    $jk = htmlspecialchars($data["jk"]);
    $tempatlahir = htmlspecialchars($data["tempatlahir"]);
	$tanggallahir = $data["tanggallahir"];
	$agama = htmlspecialchars($data["agama"]);
	$status = htmlspecialchars($data["status"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$golongan_id = htmlspecialchars($data["golongan_id"]);
	// query insert data
	mysqli_query($db, "CALL insert_karyawan('$nip', '$nama', 
				'$jk', '$tempatlahir', '$tanggallahir', '$agama',
				'$status', '$alamat', $golongan_id);");

	return mysqli_affected_rows($db);
}

function tambah_cuti($data)
{
	global $db;
	// ambil data dari tiap elemen dalam form
    $tanggal_cuti = $data["tanggal_cuti"];
	$jumlah = htmlspecialchars($data["jumlah"]);
	$karyawan_id = htmlspecialchars($data["karyawan_id"]);
	// query insert data
	mysqli_query($db, "CALL insert_cuti('$tanggal_cuti', $jumlah, $karyawan_id)");

	return mysqli_affected_rows($db);
}

function tambah_lembur($data)
{
	global $db;
	// ambil data dari tiap elemen dalam form
    $tanggal_cuti = $data["tanggal_lembur"];
	$jumlah = htmlspecialchars($data["jumlah"]);
	$karyawan_id = htmlspecialchars($data["karyawan_id"]);
	// query insert data
	mysqli_query($db, "CALL insert_lembur('$tanggal_lembur', $jumlah, $karyawan_id)");

	return mysqli_affected_rows($db);
}

function tambah_gaji($data)
{
	global $db;
	// ambil data dari tiap elemen dalam form
    $tanggal = $data["tanggal"];
	$karyawan_id = htmlspecialchars($data["karyawan_id"]);
	// query insert data
	mysqli_query($db, "CALL insert_gaji('$tanggal', $karyawan_id)");

	return mysqli_affected_rows($db);
}

function hapus_golongan($id)
{
	global $db;
	mysqli_query($db, "CALL delete_golongan($id);");
	return mysqli_affected_rows($db);
}

function hapus_karyawan($id)
{
	global $db;
	mysqli_query($db, "CALL delete_karyawan($id);");
	return mysqli_affected_rows($db);
}

function hapus_cuti($id)
{
	global $db;
	mysqli_query($db, "CALL delete_cuti($id);");
	return mysqli_affected_rows($db);
}

function hapus_lembur($id)
{
	global $db;
	mysqli_query($db, "CALL delete_lembur($id);");
	return mysqli_affected_rows($db);
}

function hapus_gaji($id)
{
	global $db;
	mysqli_query($db, "CALL delete_gaji($id)");
	return mysqli_affected_rows($db);
}

function ubah_golongan($data)
{
	global $db;
	$id = $data["id_golongan"];
	// ambil data dari tiap elemen dalam form
	$nama_golongan = htmlspecialchars($data["nama_golongan"]);
	$gaji_pokok = htmlspecialchars($data["gaji_pokok"]);
    $tunjangan_transportasi = htmlspecialchars($data["tunjangan_transportasi"]);
    $tunjangan_makan = htmlspecialchars($data["tunjangan_makan"]);
	// query insert data
	mysqli_query($db, "CALL update_golongan($id, '$nama_golongan', $gaji_pokok, $tunjangan_transportasi, 
						$tunjangan_makan);");

	return mysqli_affected_rows($db);
}

function ubah_karyawan($data)
{
	global $db;
	$id = $data["id_karyawan"];
	// ambil data dari tiap elemen dalam form
	$nip = htmlspecialchars($data["nip"]);
	$nama = htmlspecialchars($data["nama"]);
    $jk = htmlspecialchars($data["jk"]);
    $tempatlahir = htmlspecialchars($data["tempatlahir"]);
	$tanggallahir = $data["tanggallahir"];
	$agama = htmlspecialchars($data["agama"]);
	$status = htmlspecialchars($data["status"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$golongan_id = htmlspecialchars($data["golongan_id"]);
	// query insert data
	mysqli_query($db, "CALL update_karyawan($id, $nip, '$nama', '$jk', '$tempatlahir', '$tanggallahir',
											'$agama', '$status', '$alamat', $golongan_id);");

	return mysqli_affected_rows($db);
}

function ubah_cuti($data)
{
	global $db;
	$id = $data["id_cuti"];
	// ambil data dari tiap elemen dalam form
	$tanggal_cuti = $data["tanggal"];
	$jumlah = htmlspecialchars($data["jumlah"]);
	$karyawan_id = htmlspecialchars($data["karyawan_id"]);
	// query insert data
	mysqli_query($db, "CALL update_cuti($id, '$tanggal_cuti', $jumlah, $karyawan_id);");

	return mysqli_affected_rows($db);
}

function ubah_lembur($data)
{
	global $db;
	$id = $data["id_lembur"];
	// ambil data dari tiap elemen dalam form
	$tanggal_cuti = $data["tanggal_lembur"];
	$jumlah = htmlspecialchars($data["jumlah"]);
	$karyawan_id = htmlspecialchars($data["karyawan_id"]);
	// query insert data
	mysqli_query($db, "CALL update_lembur($id, '$tanggal_lembur', $jumlah, $karyawan_id);");

	return mysqli_affected_rows($db);
}

function ubah_gaji($data)
{
	global $db;
	$id = $data["id_gaji"];
	// ambil data dari tiap elemen dalam form
	$tanggal_cuti = $data["tanggal"];
	$karyawan_id = htmlspecialchars($data["karyawan_id"]);
	// query insert data
	mysqli_query($db, "CALL update_gaji($id, '$tanggal', $karyawan_id);");

	return mysqli_affected_rows($db);
}

?>
<?php
require 'function.php';

$kar = query("SELECT * FROM karyawan");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                    data-target="#example-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">---------</a>
                </div>

                <div class="collapse navbar-collapse" id="example-1">
                    <ul class="nav navbar-nav">
                    <li><a href="index.php">Daftar Gaji Karyawan<span class="sr-only">(current)</span></a></li>
                    <li><a href="tampil_gaji.php">Data Gaji</a></li>
                    <li><a href="tampil_golongan.php">Data Golongan</a></li>
                    <li class="active"><a href="tampil_karyawan.php">Data Karyawan</a></li>
                    <li><a href="tampil_cuti.php">Data Cuti</a></li>
                    <li><a href="tampil_lembur.php">Data Lembur</a></li>
                    </ul>
		        </div>
            </div>
        </nav>

        <div class="text-center">
            <br>
            <h1>Data Karyawan</h1>
        </div>
        <a href="tambah_karyawan.php">[+]Tambah Data Karyawan</a>
	    <br><br>
        <div>
            <table border=1 class="table table-striped table-bordered">
                <tr>
                    <th>No.</th>
                    <th>ID Karyawan</th>
                    <th>ID Golongan</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                <?php 
                    $no=1;
                    foreach($kar as $row){ ?>
                <tr>    
                    <td><?php echo $no++;?></td>
                    <td><?php echo $row['id_karyawan'];?></td>
                    <td><?php echo $row['golongan_id'];?></td>
                    <td><?php echo $row['nip'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['jk'];?></td>
                    <td><?php echo $row['tempatlahir'];?></td>
                    <td><?php echo $row['tanggallahir'];?></td>
                    <td><?php echo $row['agama'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['alamat'];?></td>
                    <td>
                        <a href="edit_karyawan.php?id=<?php echo $row['id_karyawan'];?>">
                            <button type="button"> Edit </button>
                        </a>
                        <a href="hapus_karyawan.php?id=<?php echo $row['id_karyawan'];?>">
                            <button type="button"> Hapus </button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
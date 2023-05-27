<?php
require 'function.php';

$gaaji = query("SELECT karyawan_id, nama, nama_golongan, tanggal, potongan, jumlah_gaji,
                jumlah_lembur, jumlah_gajiditerima FROM gaji JOIN karyawan
                ON gaji.karyawan_id = karyawan.id_karyawan JOIN golongan 
                ON karyawan.golongan_id=golongan.id_golongan");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaji Karyawan</title>
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
                    <li class="active"><a href="index.php">Daftar Gaji Karyawan<span class="sr-only">(current)</span></a></li>
                    <li><a href="tampil_gaji.php">Data Gaji</a></li>
                    <li><a href="tampil_golongan.php">Data Golongan</a></li>
                    <li><a href="tampil_karyawan.php">Data Karyawan</a></li>
                    <li><a href="tampil_cuti.php">Data Cuti</a></li>
                    <li><a href="tampil_lembur.php">Data Lembur</a></li>
                    </ul>
		        </div>
            </div>
        </nav>

        <div class="text-center">
            <br>
            <h1>Daftar Gaji Karyawan</h1>
            <br>
        </div>
            <div>
                <table border=1 class="table table-striped table-bordered">
                    <tr>
                        <th scope="col">No.</th>
                        <th>ID Karyawan</th>
                        <th>Nama</th>
                        <th>Golongan</th>
                        <th>Tanggal</th>
                        <th>Potongan</th>
                        <th>Jumlah Gaji (Rp.) </th>
                        <th>Jumlah Lembur (Rp.)</th>
                        <th>Jumlah Gaji yang Diterima (Rp.)</th>
                    </tr>
                    <?php
                        $no=1;
                        foreach($gaaji as $row){ ?>
                    <tr>    
                            <td><?php echo $no++;?></td>
                            <td><?php echo $row['karyawan_id'];?></td>
                            <td><?php echo $row['nama'];?></td>
                            <td><?php echo $row['nama_golongan'];?></td>
                            <td><?php echo $row['tanggal'];?></td>
                            <td><?php echo $row['potongan'];?></td>
                            <td><?php echo $row['jumlah_gaji'];?></td>
                            <td><?php echo $row['jumlah_lembur'];?></td>
                            <td><?php echo $row['jumlah_gajiditerima'];?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
</body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</html>
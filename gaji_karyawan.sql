/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.21-MariaDB : Database - gaji_karyawan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gaji_karyawan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gaji_karyawan`;

/*Table structure for table `cuti` */

DROP TABLE IF EXISTS `cuti`;

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_cuti` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cuti`),
  KEY `karyawan_id` (`karyawan_id`),
  CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cuti` */

insert  into `cuti`(`id_cuti`,`tanggal_cuti`,`jumlah`,`karyawan_id`) values 
(1,'2022-03-29',32000,1),
(2,'2022-03-28',32000,2),
(3,'2022-04-04',35000,1);

/*Table structure for table `gaji` */

DROP TABLE IF EXISTS `gaji`;

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `jumlah_gaji` int(11) DEFAULT NULL,
  `jumlah_lembur` int(11) DEFAULT NULL,
  `jumlah_gajiditerima` int(11) DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  KEY `id_gaji` (`id_gaji`),
  KEY `karyawan_id` (`karyawan_id`),
  CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `gaji` */

insert  into `gaji`(`id_gaji`,`tanggal`,`potongan`,`jumlah_gaji`,`jumlah_lembur`,`jumlah_gajiditerima`,`karyawan_id`) values 
(27,'2022-04-05',32000,2450000,35000,2453000,2),
(29,'2022-04-08',32000,2850000,105000,2923000,1);

/*Table structure for table `golongan` */

DROP TABLE IF EXISTS `golongan`;

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_golongan` varchar(50) DEFAULT NULL,
  `gaji_pokok` int(11) DEFAULT NULL,
  `tunjangan_transportasi` int(11) DEFAULT NULL,
  `tunjangan_makan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_golongan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `golongan` */

insert  into `golongan`(`id_golongan`,`nama_golongan`,`gaji_pokok`,`tunjangan_transportasi`,`tunjangan_makan`) values 
(1,'Golongan Ia',1700000,250000,300000),
(2,'Golongan Ib',1900000,250000,300000),
(3,'Golongan IIa',2200000,300000,350000),
(4,'Golongan IIb',2400000,300000,350000),
(5,'Golongan IIIa',2700000,350000,370000),
(7,'Golongan IIIb',3000000,350000,370000),
(8,'Golongan IIIc',3200000,350000,370000);

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `tempatlahir` varchar(50) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `golongan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`),
  KEY `golongan_id` (`golongan_id`),
  CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`golongan_id`) REFERENCES `golongan` (`id_golongan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`id_karyawan`,`nip`,`nama`,`jk`,`tempatlahir`,`tanggallahir`,`agama`,`status`,`alamat`,`golongan_id`) values 
(1,'19810712 201304 1 001','Bejo Sutejo','Laki-Laki','Magelang','1981-07-12','Kristen','Menikah','JL. Ahmad Yani',3),
(2,'19830817 201404 2 002','Wati Sutarni','Perempuan','Palangka Raya','1983-08-17','Kristen','Menikah','JL. G.Obos',2);

/*Table structure for table `lembur` */

DROP TABLE IF EXISTS `lembur`;

CREATE TABLE `lembur` (
  `id_lembur` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_lembur` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lembur`),
  KEY `karyawan_id` (`karyawan_id`),
  CONSTRAINT `lembur_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `lembur` */

insert  into `lembur`(`id_lembur`,`tanggal_lembur`,`jumlah`,`karyawan_id`) values 
(1,'2022-03-31',35000,2),
(4,'2022-04-05',70000,1),
(5,'2022-04-07',35000,1);

/* Function  structure for function  `jumlah_gaji` */

/*!50003 DROP FUNCTION IF EXISTS `jumlah_gaji` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_gaji`(id int) RETURNS int(11)
BEGIN
	declare a int;
	declare b int;
	declare c int;
	declare hasil int;
	
	select gaji_pokok from golongan join karyawan 
	on karyawan.`golongan_id` = golongan.`id_golongan`
	where id_karyawan=id into a;
	
	SELECT tunjangan_makan FROM golongan JOIN karyawan 
	ON karyawan.`golongan_id` = golongan.`id_golongan` 
	where id_karyawan=id into b;
	
	SELECT tunjangan_transportasi FROM golongan 
	JOIN karyawan ON karyawan.`golongan_id` = golongan.`id_golongan` 
	where id_karyawan=id into c;
	
	set hasil = a+b+c;
	return hasil;
    END */$$
DELIMITER ;

/* Function  structure for function  `jumlah_lembur` */

/*!50003 DROP FUNCTION IF EXISTS `jumlah_lembur` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_lembur`(id int) RETURNS int(11)
BEGIN
	declare a int;
	declare b int;
	select sum(jumlah) from lembur where karyawan_id=id into a;
	select IF(a<=NULL, 0, a) into b;
	return b;
    END */$$
DELIMITER ;

/* Function  structure for function  `potongan` */

/*!50003 DROP FUNCTION IF EXISTS `potongan` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `potongan`(id int) RETURNS int(11)
BEGIN
	DECLARE a INT;
	declare b int;
	SELECT SUM(jumlah) FROM cuti WHERE karyawan_id=id INTO a;
	SELECT IF(a<=NULL, 0, a) INTO b;
	RETURN b;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_cuti` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_cuti` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_cuti`(id int)
BEGIN
		delete from cuti where id_cuti = id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_gaji` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_gaji` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_gaji`(id int)
BEGIN
		delete from gaji where id_gaji=id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_golongan` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_golongan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_golongan`(id int)
BEGIN
		delete from golongan where id_golongan = id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_karyawan` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_karyawan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_karyawan`(id int)
BEGIN
		delete from karyawan where id_karyawan = id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_lembur` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_lembur` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_lembur`(id int)
BEGIN
		delete from lembur where id_lembur = id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_cuti` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_cuti` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_cuti`(tanggal_cuti date, jumlah int, karyawan_id int)
BEGIN
		insert into cuti(tanggal_cuti, jumlah, karyawan_id) values(tanggal_cuti, jumlah, karyawan_id);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_gaji` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_gaji` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_gaji`(tanggal date, karyawan_id int)
BEGIN
		declare a int;
		declare b int;
		declare c int;
		declare total_gaji int;
		select potongan(karyawan_id) into a;
		SELECT jumlah_lembur(karyawan_id) into b;
		SELECT jumlah_gaji(karyawan_id) into c;
		
		set total_gaji = ((c+b)-a);
		
		insert into gaji(tanggal, potongan, jumlah_gaji, jumlah_lembur, jumlah_gajiditerima, karyawan_id) 
		values(tanggal, a, c, b, total_gaji, karyawan_id);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_golongan` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_golongan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_golongan`(nama_golongan varchar(50), gaji_pokok int,
						tunjangan_transportasi int, tunjangan_makan int)
BEGIN
		insert into golongan(nama_golongan, gaji_pokok, tunjangan_transportasi, tunjangan_makan) 
		values(nama_golongan, gaji_pokok, tunjangan_transportasi, tunjangan_makan);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_karyawan` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_karyawan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_karyawan`(nip varchar(20), nama varchar(50), jk Varchar(20), 
						tempatlahir varchar(50), tanggallahir date, agama varchar(30), 
						status Varchar(20), alamat varchar(100), golongan_id int)
BEGIN
		insert into karyawan(nip, nama, jk, tempatlahir, tanggallahir,
		agama, status, alamat, golongan_id) 
		VALUES(nip, nama, jk, tempatlahir, tanggallahir,
		agama, status, alamat, golongan_id);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_lembur` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_lembur` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_lembur`(tanggal_lembur DATE, jumlah INT, karyawan_id INT)
BEGIN
		INSERT INTO lembur(tanggal_lembur, jumlah, karyawan_id) 
		VALUES(tanggal_lembur, jumlah, karyawan_id);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_cuti` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_cuti` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_cuti`(id int, tanggal_cuti DATE, jumlah INT, karyawan_id INT)
BEGIN
		update cuti set tanggal_cuti = tanggal_cuti, jumlah = jumlah, karyawan_id = karyawan_id where id_cuti = id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_gaji` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_gaji` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_gaji`(id int, tanggal date, karyawan_id int)
BEGIN
		UPDATE gaji SET tanggal = tanggal, karyawan_id = karyawan_id
		WHERE id_gaji = id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_golongan` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_golongan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_golongan`(id int, nama_golongan VARCHAR(50), gaji_pokok INT, 
					tunjangan_transportasi INT, tunjangan_makan INT)
BEGIN
		update golongan set nama_golongan = nama_golongan, gaji_pokok = gaji_pokok,
		tunjangan_transportasi = tunjangan_transportasi, tunjangan_makan = tunjangan_makan 
		where id_golongan = id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_karyawan` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_karyawan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_karyawan`(id int, nip varchar(20), nama VARCHAR(50), jk varchar(20), 
						tempatlahir VARCHAR(50), tanggallahir DATE, agama VARCHAR(30), 
						STATUS varchar(20), alamat VARCHAR(100), golongan_id INT)
BEGIN
		update karyawan set nip = nip, nama = nama, jk = jk, 
		tempatlahir = tempatlahir, tanggallahir = tanggallahir,
		agama = agama, status = status, alamat = alamat, 
		golongan_id = golongan_id where id_karyawan = id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_lembur` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_lembur` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_lembur`(id int,tanggal_lembur DATE, jumlah INT, karyawan_id INT)
BEGIN
		update lembur set tanggal_lembur = tanggal_lembur, 
		jumlah = jumlah , karyawan_id = karyawan_id where id_lembur = id;
	END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

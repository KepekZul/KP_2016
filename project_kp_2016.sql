/*
SQLyog Ultimate v8.6 Beta2
MySQL - 5.5.45 : Database - project_kp_2016
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin` */

CREATE TABLE `admin` (
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(128) NOT NULL,
  PRIMARY KEY (`username_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`username_admin`,`password_admin`) values ('admin','2e3817293fc275dbee74bd71ce6eb056');
insert  into `admin`(`username_admin`,`password_admin`) values ('ayu','2e3817293fc275dbee74bd71ce6eb056');
insert  into `admin`(`username_admin`,`password_admin`) values ('lala','2e3817293fc275dbee74bd71ce6eb056');

/*Table structure for table `admin_permohonan` */

CREATE TABLE `admin_permohonan` (
  `username_admin_antara` varchar(30) DEFAULT NULL,
  `kode_permohonan_antara` varchar(17) NOT NULL,
  PRIMARY KEY (`kode_permohonan_antara`),
  KEY `FK_admin_permohonan` (`username_admin_antara`),
  CONSTRAINT `FK_admin_permohonan` FOREIGN KEY (`username_admin_antara`) REFERENCES `admin` (`username_admin`) ON UPDATE CASCADE,
  CONSTRAINT `FK_admin_permohonan_permohonan` FOREIGN KEY (`kode_permohonan_antara`) REFERENCES `daftar_permohonan` (`kode_permohonan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin_permohonan` */

insert  into `admin_permohonan`(`username_admin_antara`,`kode_permohonan_antara`) values ('ayu','96900620425887745');
insert  into `admin_permohonan`(`username_admin_antara`,`kode_permohonan_antara`) values ('ayu','96900620425887746');
insert  into `admin_permohonan`(`username_admin_antara`,`kode_permohonan_antara`) values ('ayu','96900620425887747');
insert  into `admin_permohonan`(`username_admin_antara`,`kode_permohonan_antara`) values ('ayu','96901790317936640');

/*Table structure for table `agenda` */

CREATE TABLE `agenda` (
  `isi_agenda` varchar(300) NOT NULL,
  `tanggal_mulai_agenda` date NOT NULL,
  `admin` varchar(20) NOT NULL,
  `tanggal_selesai_agenda` date NOT NULL,
  `timestamp_agenda` datetime NOT NULL,
  PRIMARY KEY (`timestamp_agenda`),
  KEY `FK_agenda` (`admin`),
  CONSTRAINT `FK_agenda` FOREIGN KEY (`admin`) REFERENCES `admin` (`username_admin`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `agenda` */

insert  into `agenda`(`isi_agenda`,`tanggal_mulai_agenda`,`admin`,`tanggal_selesai_agenda`,`timestamp_agenda`) values ('Evaluasi AUN','2016-12-03','ayu','2016-12-05','0000-00-00 00:00:00');
insert  into `agenda`(`isi_agenda`,`tanggal_mulai_agenda`,`admin`,`tanggal_selesai_agenda`,`timestamp_agenda`) values ('kunjungan dari SMA blablabla','2016-11-07','ayu','2016-11-07','2016-11-06 15:39:16');

/*Table structure for table `aktivitas` */

CREATE TABLE `aktivitas` (
  `catatan_aktivitas` varchar(100) NOT NULL,
  `waktu_aktivitas` datetime NOT NULL,
  `username_aktivitas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`waktu_aktivitas`),
  KEY `FK_aktivitas` (`username_aktivitas`),
  CONSTRAINT `FK_aktivitas` FOREIGN KEY (`username_aktivitas`) REFERENCES `admin` (`username_admin`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aktivitas` */

insert  into `aktivitas`(`catatan_aktivitas`,`waktu_aktivitas`,`username_aktivitas`) values ('ayu mengisi agenda','0000-00-00 00:00:00','ayu');
insert  into `aktivitas`(`catatan_aktivitas`,`waktu_aktivitas`,`username_aktivitas`) values ('ayu mengisi agenda','2016-11-06 15:39:16','ayu');
insert  into `aktivitas`(`catatan_aktivitas`,`waktu_aktivitas`,`username_aktivitas`) values ('Admin ayu menghapus jadwal dengan kode 96900620425887745','2016-12-03 23:33:42','ayu');
insert  into `aktivitas`(`catatan_aktivitas`,`waktu_aktivitas`,`username_aktivitas`) values ('ayu menyetujui permohonan dengan kode 96900620425887746','2016-12-03 23:44:52','ayu');
insert  into `aktivitas`(`catatan_aktivitas`,`waktu_aktivitas`,`username_aktivitas`) values ('ayu menyetujui permohonan dengan kode 96900620425887747','2016-12-04 00:06:32','ayu');
insert  into `aktivitas`(`catatan_aktivitas`,`waktu_aktivitas`,`username_aktivitas`) values ('ayu mengubah peminjaman 96900620425887747','2016-12-04 00:10:18','ayu');
insert  into `aktivitas`(`catatan_aktivitas`,`waktu_aktivitas`,`username_aktivitas`) values ('ayu menyetujui permohonan dengan kode 96901790317936640','2016-12-04 14:45:05','ayu');

/*Table structure for table `daftar_permohonan` */

CREATE TABLE `daftar_permohonan` (
  `nama_pemohon_peminjaman` varchar(100) NOT NULL,
  `kode_permohonan` varchar(17) NOT NULL,
  `status_permohonan` varchar(20) NOT NULL DEFAULT 'Diproses',
  `nama_kegiatan` varchar(200) NOT NULL,
  `tanggal_masuk_permohonan` datetime NOT NULL,
  `tanggal_mulai_permohonan_peminjaman` date NOT NULL,
  `waktu_mulai_permohonan_peminjaman` time NOT NULL,
  `waktu_selesai_permohonan_peminjaman` time NOT NULL,
  `badan_pelaksana_kegiatan` varchar(100) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `rutinitas_peminjaman` int(11) NOT NULL,
  `kali_peminjaman` int(11) NOT NULL,
  PRIMARY KEY (`kode_permohonan`),
  KEY `FK_daftar_permohonan` (`nama_pemohon_peminjaman`),
  KEY `FK_daftar_permohonan_ruangan` (`nama_ruangan`),
  KEY `FK_daftar_permohonan_rutinitas` (`rutinitas_peminjaman`),
  CONSTRAINT `FK_daftar_permohonan` FOREIGN KEY (`nama_pemohon_peminjaman`) REFERENCES `pemohon` (`nama_pemohon`) ON UPDATE CASCADE,
  CONSTRAINT `FK_daftar_permohonan_ruangan` FOREIGN KEY (`nama_ruangan`) REFERENCES `ruangan` (`nama_ruangan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_daftar_permohonan_rutinitas` FOREIGN KEY (`rutinitas_peminjaman`) REFERENCES `rutinitas` (`frekwensi_rutinitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daftar_permohonan` */

insert  into `daftar_permohonan`(`nama_pemohon_peminjaman`,`kode_permohonan`,`status_permohonan`,`nama_kegiatan`,`tanggal_masuk_permohonan`,`tanggal_mulai_permohonan_peminjaman`,`waktu_mulai_permohonan_peminjaman`,`waktu_selesai_permohonan_peminjaman`,`badan_pelaksana_kegiatan`,`nama_ruangan`,`rutinitas_peminjaman`,`kali_peminjaman`) values ('Kevin Zulkarnain Yuseti','96900620425887745','Dihapus','Kuliah Umum','2016-12-03 23:13:12','2016-12-05','09:00:00','15:00:00','Jurusan','Aula',1,1);
insert  into `daftar_permohonan`(`nama_pemohon_peminjaman`,`kode_permohonan`,`status_permohonan`,`nama_kegiatan`,`tanggal_masuk_permohonan`,`tanggal_mulai_permohonan_peminjaman`,`waktu_mulai_permohonan_peminjaman`,`waktu_selesai_permohonan_peminjaman`,`badan_pelaksana_kegiatan`,`nama_ruangan`,`rutinitas_peminjaman`,`kali_peminjaman`) values ('Kevin Zulkarnai Yuseti','96900620425887746','Disetujui','OKKBK','2016-12-03 23:44:44','2016-12-06','07:00:00','10:00:00','Jurusan','Aula',1,1);
insert  into `daftar_permohonan`(`nama_pemohon_peminjaman`,`kode_permohonan`,`status_permohonan`,`nama_kegiatan`,`tanggal_masuk_permohonan`,`tanggal_mulai_permohonan_peminjaman`,`waktu_mulai_permohonan_peminjaman`,`waktu_selesai_permohonan_peminjaman`,`badan_pelaksana_kegiatan`,`nama_ruangan`,`rutinitas_peminjaman`,`kali_peminjaman`) values ('Kevin Zulkarnain Yuseti','96900620425887747','Disetujui','Senam Indoor','2016-12-04 00:06:27','2016-12-07','06:00:00','09:00:00','Jurusan','IF-105',7,4);
insert  into `daftar_permohonan`(`nama_pemohon_peminjaman`,`kode_permohonan`,`status_permohonan`,`nama_kegiatan`,`tanggal_masuk_permohonan`,`tanggal_mulai_permohonan_peminjaman`,`waktu_mulai_permohonan_peminjaman`,`waktu_selesai_permohonan_peminjaman`,`badan_pelaksana_kegiatan`,`nama_ruangan`,`rutinitas_peminjaman`,`kali_peminjaman`) values ('Kevin ZUlkarnain Yuseti','96901790317936640','Disetujui','ini itu','2016-12-04 14:44:55','2016-12-08','17:00:00','19:00:00','Jurusan','Ruang Sidang',1,100);

/*Table structure for table `daftar_status` */

CREATE TABLE `daftar_status` (
  `NIDN_daftar` varchar(10) NOT NULL,
  `status_dosen` varchar(50) NOT NULL,
  PRIMARY KEY (`status_dosen`),
  KEY `FK_daftar_status` (`NIDN_daftar`),
  CONSTRAINT `FK_daftar_status` FOREIGN KEY (`NIDN_daftar`) REFERENCES `dosen` (`NIDN_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daftar_status` */

/*Table structure for table `dosen` */

CREATE TABLE `dosen` (
  `nama_dosen` varchar(60) NOT NULL,
  `NIDN_dosen` varchar(10) NOT NULL,
  `status_terkini` varchar(50) DEFAULT NULL,
  `pengumuman_terkini` varchar(300) DEFAULT NULL,
  `password_dosen` varchar(32) NOT NULL,
  PRIMARY KEY (`NIDN_dosen`),
  KEY `FK_dosen` (`status_terkini`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dosen` */

insert  into `dosen`(`nama_dosen`,`NIDN_dosen`,`status_terkini`,`pengumuman_terkini`,`password_dosen`) values ('ayu','5113100072','di ruangan','-','2e3817293fc275dbee74bd71ce6eb056');

/*Table structure for table `kegiatan_rutin` */

CREATE TABLE `kegiatan_rutin` (
  `nidn_dosen` varchar(10) DEFAULT NULL,
  `hari_rutin` varchar(10) DEFAULT NULL,
  `waktu_rutin` time DEFAULT NULL,
  `kegiatan_rutin` varchar(300) DEFAULT NULL,
  `id_rutin` int(11) NOT NULL AUTO_INCREMENT,
  `hari_angka_rutin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rutin`),
  KEY `FK_kegiatan_rutin` (`nidn_dosen`),
  CONSTRAINT `FK_kegiatan_rutin` FOREIGN KEY (`nidn_dosen`) REFERENCES `dosen` (`NIDN_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `kegiatan_rutin` */

insert  into `kegiatan_rutin`(`nidn_dosen`,`hari_rutin`,`waktu_rutin`,`kegiatan_rutin`,`id_rutin`,`hari_angka_rutin`) values ('5113100072','Senin','07:00:00','paa f',1,1);
insert  into `kegiatan_rutin`(`nidn_dosen`,`hari_rutin`,`waktu_rutin`,`kegiatan_rutin`,`id_rutin`,`hari_angka_rutin`) values ('5113100072','Kamis','08:00:00','ini',3,4);
insert  into `kegiatan_rutin`(`nidn_dosen`,`hari_rutin`,`waktu_rutin`,`kegiatan_rutin`,`id_rutin`,`hari_angka_rutin`) values ('5113100072','Sabtu','09:00:00','kakak',4,6);
insert  into `kegiatan_rutin`(`nidn_dosen`,`hari_rutin`,`waktu_rutin`,`kegiatan_rutin`,`id_rutin`,`hari_angka_rutin`) values ('5113100072','Kamis','09:00:00','aduh',5,4);

/*Table structure for table `pemohon` */

CREATE TABLE `pemohon` (
  `nama_pemohon` varchar(100) NOT NULL,
  `nomor_telepon_pemohon` varchar(14) DEFAULT NULL,
  `email_pemohon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nama_pemohon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemohon` */

insert  into `pemohon`(`nama_pemohon`,`nomor_telepon_pemohon`,`email_pemohon`) values ('Kevin Zulkarnai Yuseti','08563649409','kevinyuseti@yahoo.com');
insert  into `pemohon`(`nama_pemohon`,`nomor_telepon_pemohon`,`email_pemohon`) values ('Kevin Zulkarnain Yuseti','08563649409','kevinyuseti@yahoo.com');

/*Table structure for table `pengumuman` */

CREATE TABLE `pengumuman` (
  `isi_pengumuman` varchar(300) NOT NULL,
  `NIDN_pengumuman` varchar(10) DEFAULT NULL,
  `waktu_pengumuman` datetime NOT NULL,
  PRIMARY KEY (`waktu_pengumuman`),
  KEY `FK_pengumuman` (`NIDN_pengumuman`),
  CONSTRAINT `FK_pengumuman` FOREIGN KEY (`NIDN_pengumuman`) REFERENCES `dosen` (`NIDN_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman` */

/*Table structure for table `ruangan` */

CREATE TABLE `ruangan` (
  `nama_ruangan` varchar(100) NOT NULL,
  PRIMARY KEY (`nama_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ruangan` */

insert  into `ruangan`(`nama_ruangan`) values ('Aula');
insert  into `ruangan`(`nama_ruangan`) values ('IF-105');
insert  into `ruangan`(`nama_ruangan`) values ('Ruang Sidang');

/*Table structure for table `rutinitas` */

CREATE TABLE `rutinitas` (
  `frekwensi_rutinitas` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan_rutinitas` varchar(15) NOT NULL,
  PRIMARY KEY (`frekwensi_rutinitas`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `rutinitas` */

insert  into `rutinitas`(`frekwensi_rutinitas`,`keterangan_rutinitas`) values (1,'Tiap Hari');
insert  into `rutinitas`(`frekwensi_rutinitas`,`keterangan_rutinitas`) values (7,'Tiap Minggu');
insert  into `rutinitas`(`frekwensi_rutinitas`,`keterangan_rutinitas`) values (14,'Tiap Dua Minggu');

/*Table structure for table `waktu_kegiatan` */

CREATE TABLE `waktu_kegiatan` (
  `kode_permohonan` varchar(17) NOT NULL,
  `waktu_mulai_kegiatan` time NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `waktu_selesai_kegiatan` time NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL,
  UNIQUE KEY `waktu_mulai_kegiatan` (`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`nama_ruangan`),
  KEY `FK_waktu_kegiatan_ruangan` (`nama_ruangan`),
  KEY `FK_waktu_kegiatan` (`kode_permohonan`),
  CONSTRAINT `FK_waktu_kegiatan` FOREIGN KEY (`kode_permohonan`) REFERENCES `daftar_permohonan` (`kode_permohonan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `waktu_kegiatan` */

insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96900620425887747','06:00:00','2016-12-07','09:00:00','IF-105');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96900620425887747','06:00:00','2016-12-14','09:00:00','IF-105');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96900620425887747','06:00:00','2016-12-21','09:00:00','IF-105');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96900620425887747','06:00:00','2016-12-28','09:00:00','IF-105');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96900620425887746','07:00:00','2016-12-06','10:00:00','Aula');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-08','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-09','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-10','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-11','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-12','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-13','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-14','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-15','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-16','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-17','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-18','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-19','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-20','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-21','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-22','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-23','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-24','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-25','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-26','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-27','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-28','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-29','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-30','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2016-12-31','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-01','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-02','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-03','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-04','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-05','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-06','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-07','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-08','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-09','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-10','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-11','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-12','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-13','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-14','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-15','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-16','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-17','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-18','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-19','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-20','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-21','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-22','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-23','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-24','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-25','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-26','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-27','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-28','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-29','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-30','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-01-31','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-01','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-02','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-03','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-04','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-05','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-06','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-07','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-08','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-09','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-10','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-11','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-12','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-13','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-14','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-15','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-16','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-17','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-18','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-19','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-20','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-21','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-22','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-23','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-24','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-25','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-26','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-27','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-02-28','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-01','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-02','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-03','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-04','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-05','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-06','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-07','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-08','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-09','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-10','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-11','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-12','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-13','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-14','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-15','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-16','19:00:00','Ruang Sidang');
insert  into `waktu_kegiatan`(`kode_permohonan`,`waktu_mulai_kegiatan`,`tanggal_kegiatan`,`waktu_selesai_kegiatan`,`nama_ruangan`) values ('96901790317936640','17:00:00','2017-03-17','19:00:00','Ruang Sidang');

/* Procedure structure for procedure `editAgenda` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `editAgenda`(isiAgenda VARCHAR(300), tanggalMulai DATE, usernameAdmin VARCHAR(20), tanggalSelesai DATE, timelogAgenda datetime)
BEGIN
	start transaction;
	delete from agenda where timestamp_agenda = timelogAgenda;
	call isiAgenda(isiAgenda, tanggalMulai, usernameAdmin, tanggalSelesai);
	insert into aktivitas (catatan_aktivitas, username_aktivitas)
	values (concat(usernamAdmin, ' mengubah agenda dengan kode',timelogAgenda), usernameAdmin);
	insert into aktivitas(catatan_aktivitas, username_aktivitas, waktu_aktivitas)
	values(concat(usernameAdmin, ' menyunting agenda ', timelogAgenda), usernameAdmin, current_timestamp());
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `gantiPassword` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `gantiPassword`(passwordLama varchar(32), passwordBaru varchar(32), usernameAdmin varchar(20))
BEGIN
	start transaction;
	set @pass = (select password_admin from admin where username_admin=usernameAdmin);
	if(@pass = md5(passwordLama))
	then
		update admin
		set password_admin = md5(passwordBaru)
		where username_admin = usernameAdmin;
		insert into aktivitas(catatan_aktivitas, username_aktivitas, waktu_aktivitas)
		values(concat(usernameAdmin,' mengganti password'), usernameAdmin, current_timestamp());
		select 'Password berhasil diganti' as message;
	else
		select 'Password salah' as message;
		INSERT INTO aktivitas(catatan_aktivitas, username_aktivitas, waktu_aktivitas)
		VALUES(concat(usernameAdmin,' gagal mengganti password'), usernameAdmin, current_timestamp());
	end if;
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `gantiPasswordDosen` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `gantiPasswordDosen`(passwordLama varchar(100), passwordBaru varchar(100), nidnDosen varchar(100))
BEGIN
	START TRANSACTION;
	SET @pass = (SELECT password_dosen FROM dosen WHERE nidnDosen=NIDN_dosen);
	IF(@pass = MD5(passwordLama))
	THEN
		UPDATE dosen
		SET password_dosen = MD5(passwordBaru)
		WHERE NIDN_dosen = nidnDosen;
		SELECT 'Password berhasil diganti' AS message;
	ELSE
		SELECT 'Password salah' AS message;
	END IF;
	COMMIT;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `getListDosen` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getListDosen`(keyword varchar(30))
BEGIN
	select nama_dosen, NIDN_dosen, status_terkini, pengumuman_terkini
	from dosen
	where nama_dosen like (select(concat('%',keyword,'%'))) or nidn_dosen like (SELECT(CONCAT('%',keyword,'%')));
    END */$$
DELIMITER ;

/* Procedure structure for procedure `hapusPeminjaman` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusPeminjaman`(kodePinjam varchar(17), userAdmin varchar(100))
BEGIN
	start transaction;
	delete from waktu_kegiatan
	where kode_permohonan = kodePinjam and tanggal_kegiatan >= curdate();
	update daftar_permohonan
	set status_permohonan = 'Dihapus'
	where kode_permohonan=kodePinjam;
	insert into aktivitas(catatan_aktivitas, username_aktivitas, waktu_aktivitas)
	value(concat('Admin ',userAdmin,' menghapus jadwal dengan kode ',kodePinjam),userAdmin, current_timestamp());
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `isiAgenda` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `isiAgenda`(isiAgenda varchar(300), tanggalMulai date, usernameAdmin varchar(20), tanggalSelesai date)
BEGIN
    start transaction;
	insert into agenda (isi_agenda, tanggal_mulai_agenda, admin, tanggal_selesai_agenda, timestamp_agenda)
	values (isiAgenda, tanggalMulai, usernameAdmin, tanggalSelesai, current_timestamp());
	insert into aktivitas(catatan_aktivitas, username_aktivitas, waktu_aktivitas)
	values (concat(usernameAdmin, ' mengisi agenda'), usernameAdmin, current_timestamp());
	select 'Pengisian agenda telah berasil' as 'Pesan';
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `isiPemohon` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `isiPemohon`(nama varchar(100), telepon varchar(14), email varchar(100))
BEGIN
	IF(nama NOT IN (SELECT nama_pemohon FROM pemohon))
	THEN
		INSERT INTO pemohon(nama_pemohon, nomor_telepon_pemohon, email_pemohon)
		VALUES (nama, telepon, email);
	ELSE
		UPDATE pemohon
		SET nomor_telepon_pemohon=telepon, email_pemohon=email
		WHERE nama = nama_pemohon;
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `isiPermohonan` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `isiPermohonan`(namaPemohon varchar(100),
						namaKegiatan varchar(160),
						tanggalMulai date,
						waktuMulai time,
						waktuSelesai time,
						badanPelaksana varchar(60),
						namaRuangan varchar(20),
						rutinitas int,
						kaliPinjam int)
BEGIN
	start transaction;
	set @iter = 0;
	set @flag = 1;
	set @tanggal = tanggalMulai;
	iniLoop:while @iter<kaliPinjam
	do
		IF(SELECT 1 FROM waktu_kegiatan WHERE
			tanggal_kegiatan = @tanggal
			AND 
			nama_ruangan = namaRuangan
			AND
			(
			(waktu_mulai_kegiatan>=waktuMulai AND waktu_mulai_kegiatan<=waktuSelesai)
			OR
			(waktu_selesai_kegiatan>=waktuMulai AND waktu_selesai_kegiatan<=waktuSelesai)
			OR
			(waktu_mulai_kegiatan<=waktuMulai AND waktu_selesai_kegiatan>=waktuSelesai)
			)
			= 1)
		THEN
			SET @flag=0;
			LEAVE iniLoop;
		ELSE
			SET @iter=@iter+1;
			SET @tanggal = DATE_ADD(@tanggal, INTERVAL @rutinitas DAY);
		END IF;
	end while;
	if(@flag=1)
	then
		set @uid = uuid_short();
		insert into daftar_permohonan (nama_pemohon_peminjaman,
						kode_permohonan,
						nama_kegiatan,
						tanggal_mulai_permohonan_peminjaman,
						waktu_mulai_permohonan_peminjaman,
						waktu_selesai_permohonan_peminjaman,
						badan_pelaksana_kegiatan,
						nama_ruangan,
						rutinitas_peminjaman,
						kali_peminjaman,
						tanggal_masuk_permohonan)
				values (namaPemohon,
					@uid,
					namaKegiatan,
					tanggalMulai,
					waktuMulai,
					waktuSelesai,
					badanPelaksana,
					namaRuangan,
					rutinitas,
					kaliPinjam,
					current_timestamp);
		select 1 as 'pesan', @uid as 'Kode_Pemesanan';
	else
		select 0 as 'pesan';
	end if;
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `lihatAgenda` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatAgenda`()
BEGIN
	select isi_agenda, tanggal_mulai_agenda, tanggal_selesai_agenda from agenda where tanggal_selesai_agenda >= curdate() order by tanggal_mulai_agenda ASC limit 5;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `lihatKegiatanBerikut` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatKegiatanBerikut`(namaRuangan varchar(100))
BEGIN
	SELECT dp.nama_kegiatan, dp.waktu_mulai_permohonan_peminjaman, dp.waktu_selesai_permohonan_peminjaman
	FROM daftar_permohonan dp
	WHERE(
	SELECT wk.kode_permohonan 
	FROM waktu_kegiatan wk
	WHERE wk.waktu_mulai_kegiatan > CURTIME() AND wk.tanggal_kegiatan = CURDATE() AND wk.nama_ruangan = namaRuangan ORDER BY wk.waktu_mulai_kegiatan ASC LIMIT 1) = dp.kode_permohonan;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `lihatKegiatanSekarang` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatKegiatanSekarang`(namaRuangan varchar(100))
BEGIN
	SELECT dp.nama_kegiatan, dp.waktu_mulai_permohonan_peminjaman, dp.waktu_selesai_permohonan_peminjaman
	FROM daftar_permohonan dp
	WHERE (
	SELECT wk.kode_permohonan
	FROM waktu_kegiatan wk
	WHERE wk.waktu_mulai_kegiatan <= CURTIME() AND wk.waktu_selesai_kegiatan >= CURTIME() AND wk.tanggal_kegiatan= CURDATE() AND wk.nama_ruangan =namaRuangan) = dp.kode_permohonan;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `loginAdmin` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `loginAdmin`(adminName varchar(20), adminPass varchar(128))
BEGIN
	if((select 1 from admin where username_admin = adminName and password_admin = md5(adminPass)) = 1)
	then
		select 1 as 'pesan';
	else
		select 0 as 'pesan';
	end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `loginDosen` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `loginDosen`(nidn varchar(10), pass varchar(32))
BEGIN
	if((select 1 from dosen where nidn=NIDN_dosen and password_dosen=md5(pass))=1)
	then 
		select 1 as 'Pesan';
	else
		select 0 as 'Pesan';
	end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `setujuiPermohonan` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `setujuiPermohonan`(kodePermohonan varchar(17),
							userAdmin varchar(20))
BEGIN
	set @tanggalMulaiKegiatan = (select tanggal_mulai_permohonan_peminjaman from daftar_permohonan where kode_permohonan=kodePermohonan);
	SET @waktuMulai = (SELECT waktu_mulai_permohonan_peminjaman FROM daftar_permohonan WHERE kode_permohonan=kodePermohonan);
	SET @waktuSelesai = (SELECT waktu_selesai_permohonan_peminjaman FROM daftar_permohonan WHERE kode_permohonan=kodePermohonan);
	SET @rutinitas = (SELECT rutinitas_peminjaman FROM daftar_permohonan WHERE kode_permohonan=kodePermohonan);
	set @kaliPinjam = (SELECT kali_peminjaman FROM daftar_permohonan WHERE kode_permohonan=kodePermohonan);
	SET @ruangan = (SELECT nama_ruangan FROM daftar_permohonan WHERE kode_permohonan=kodePermohonan);
	set @iterasi = 0;
	set @tanggal = @tanggalMulaiKegiatan;
	set @flag = 1;
	
	CekLoop: while @iterasi<@kaliPinjam
	do
		if(select 1 from waktu_kegiatan where
			tanggal_kegiatan = @tanggal
			and 
			nama_ruangan = @ruangan
			and
			(
			(waktu_mulai_kegiatan>=@waktuMulai and waktu_mulai_kegiatan<=@waktuSelesai)
			or
			(waktu_selesai_kegiatan>=@waktuMulai and waktu_selesai_kegiatan<=@waktuSelesai)
			or
			(waktu_mulai_kegiatan<=@waktuMulai and waktu_selesai_kegiatan>=@waktuSelesai)
			)
			= 1)
		then
			SET @flag=0;
			LEAVE CekLoop;
		else
			SET @iterasi=@iterasi+1;
			SET @tanggal = DATE_ADD(@tanggal, INTERVAL @rutinitas DAY);
		end if;
	end while;
	set @tanggal=@tanggalMulaiKegiatan;
	set @iterasi=0;
	start transaction;
	if(@flag=1)
	then
		InsertLoop:while @iterasi<@kaliPinjam
		do
			insert into waktu_kegiatan (kode_permohonan, waktu_mulai_kegiatan, tanggal_kegiatan, waktu_selesai_kegiatan, nama_ruangan)
			values (kodePermohonan, @waktuMulai, @tanggal, @waktuSelesai, @ruangan);
			set @iterasi = @iterasi+1;
			set @tanggal = date_add(@tanggal, interval @rutinitas day);
		end while;
			
		update daftar_permohonan
		set status_permohonan = 'Disetujui'
		where kode_permohonan = kodePermohonan;
		
		insert into admin_permohonan(username_admin_antara, kode_permohonan_antara)
		values(userAdmin, kodePermohonan);
		
		insert into aktivitas (catatan_aktivitas, username_aktivitas, waktu_aktivitas)
		values (concat(userAdmin,' menyetujui permohonan dengan kode ', kodePermohonan), userAdmin, CURRENT_TIMESTAMP());
		
		select 'Permohonan pemesanan telah disetujui.' as 'pesan', 1 as 'status';
	else
		select 'Permohonan tidak dapat disetujui karena pada waktu yang sama ada kegiatan lain.' as 'pesan', 0 as 'status';
	end if;
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `tambahDosen` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahDosen`(namaDosen varchar(60), nidnDosen varchar(10), passwordDosen varchar(32), usernameAdmin varchar(30))
BEGIN
	start transaction;
	INSERT INTO aktivitas(catatan_aktivitas, username_aktivitas, waktu_aktivitas)
	VALUES (CONCAT(usernameAdmin, ' menambah ', namaDosen), usernameAdmin, current_timestamp());
	insert into dosen(nama_dosen, NIDN_dosen, password_dosen)
	values(namaDosen, nidnDosen, md5(passwordDosen));
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `tambahRuangan` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahRuangan`(namaRuangan varchar(20))
BEGIN
	if(namaRuangan not in (select nama_ruangan from ruangan))
	then
		insert into ruangan
		value (namaRuangan);
		select 1 as 'pesan';
	else
		select 0 as 'pesan';
	end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `tambahRutinitas` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahRutinitas`(frekwensi int, keterangan varchar(15), adminName varchar(20))
BEGIN
	start transaction;
	insert into rutinitas(frekwensi_rutinitas, keterangan_rutinitas)
	values (frekwensi, keterangan)
	on duplicate key update keterangan_rutinitas=keterangan;
	
	insert into aktivitas (catatan_aktivitas, username_aktivitas, waktu_aktivitas)
	values (concat(adminName, ' menambahkan frekwensi rutinitas baru'), adminName, current_timestamp());
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `tolakPermohonan` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tolakPermohonan`(userAdmin varchar(20), kodePermohonan varchar(17))
BEGIN
    start transaction;
	update daftar_permohonan
	set status_permohonan = 'Ditolak'
	where kode_permohonan = kodePermohonan;
	
	insert into aktivitas(catatan_aktivitas, username_aktivitas, waktu_aktivitas)
	values(concat(userAdmin, ' menolak permohonan dengan kode ', kodePermohonan), userAdmin, current_timestamp());
	
	insert into admin_permohonan(username_admin_antara, kode_permohonan_antara)
	values(userAdmin, kodePermohonan);
	SELECT 'Berhasil' AS 'Pesan';
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `updatePeminjaman` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePeminjaman`(userAdmin varchar(100),
						kodePermohonan varchar(17),
						namaKegiatan VARCHAR(160),
						tanggalMulai DATE,
						waktuMulai TIME,
						waktuSelesai TIME,
						namaRuangan VARCHAR(20),
						rutinitas INT,
						kaliPinjam INT)
BEGIN
	start transaction;
	SET @telahselesai = (SELECT COUNT(*) FROM waktu_kegiatan WHERE kode_permohonan=kodePermohonan AND (tanggal_kegiatan<CURDATE() OR (tanggal_kegiatan=CURDATE() AND waktu_mulai_kegiatan<=CURTIME())));
	SET @iter = 0;
	SET @flag = 1;
	SET @tanggal = tanggalMulai;
	
	DELETE FROM waktu_kegiatan
	WHERE kode_permohonan = kodePermohonan AND tanggal_kegiatan > CURDATE() OR (tanggal_kegiatan = CURDATE() AND waktu_mulai_kegiatan >CURTIME());
	
	ffTangga:while @iter<@telahselesai
	do
		SET @tanggal = DATE_ADD(@tanggal, INTERVAL rutinitas DAY);
		set @iter = @iter+1;
	end while;
	set @tanggalMulaiRevisi = @tanggal;
	iniLoop:WHILE @iter<kaliPinjam
	DO
		IF(SELECT 1 FROM waktu_kegiatan WHERE
			tanggal_kegiatan = @tanggal
			AND 
			nama_ruangan = namaRuangan
			AND
			(
			(waktu_mulai_kegiatan>=waktuMulai AND waktu_mulai_kegiatan<=waktuSelesai)
			OR
			(waktu_selesai_kegiatan>=waktuMulai AND waktu_selesai_kegiatan<=waktuSelesai)
			OR
			(waktu_mulai_kegiatan<=waktuMulai AND waktu_selesai_kegiatan>=waktuSelesai)
			)
			= 1)
		THEN
			SET @flag=0;
			LEAVE iniLoop;
		ELSE
			SET @iter=@iter+1;
			SET @tanggal = DATE_ADD(@tanggal, INTERVAL rutinitas DAY);
		END IF;
	END WHILE;
	IF(@flag=1)
	THEN
		update daftar_permohonan
		set 	nama_kegiatan = namaKegiatan,
			tanggal_mulai_permohonan_peminjaman = tanggalMulai,
			waktu_mulai_permohonan_peminjaman = waktuMulai,
			waktu_selesai_permohonan_peminjaman = waktuSelesai,
			nama_ruangan = namaRuangan,
			rutinitas_peminjaman = rutinitas,
			kali_peminjaman = kaliPinjam
		where kode_permohonan = kodePermohonan;
		
		set @iter = @telahselesai;
		set @tanggal = @tanggalMulaiRevisi;
		
		loopIsiUpdate:while @iter<kaliPinjam
		do
			insert into waktu_kegiatan(kode_permohonan, waktu_mulai_kegiatan, tanggal_kegiatan, waktu_selesai_kegiatan, nama_ruangan)
			values(kodePermohonan, waktuMulai, @tanggal, waktuSelesai, namaRuangan);
			set @iter=@iter+1;
			SET @tanggal = DATE_ADD(@tanggal, INTERVAL rutinitas DAY);
		end while;
		insert into aktivitas(catatan_aktivitas, username_aktivitas, waktu_aktivitas)
		value(concat(userAdmin,' mengubah peminjaman ', kodePermohonan), userAdmin, current_timestamp());
		
		select 1 as 'pesan';
		commit;
	else
		select 0 as 'pesan';
		rollback;
	end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `updateStatus` */

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStatus`(nidnDosen varchar(10), statusDosen varchar(50), pengumumanBaru varchar(300))
BEGIN
    start transaction;
    if(statusDosen != '')
    then
	if(statusDosen not in (select status_dosen from daftar_status where nidnDosen=NIDN_daftar))
	then
		INSERT INTO daftar_status(NIDN_daftar, status_dosen)
		VALUES(nidnDosen, statusDosen);
	end if;
	UPDATE dosen
	SET status_terkini = statusDosen
	WHERE NIDN_dosen = nidnDosen;
    end if;
    if(pengumumanBaru!='')
    then
	update dosen
	set pengumuman_terkini = pengumumanBaru
	where NIDN_dosen=nidnDosen;
    
	insert into pengumuman(isi_pengumuman, NIDN_pengumuman)
	values(pengumumanBaru, nidnDosen);
    end if;
    commit;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

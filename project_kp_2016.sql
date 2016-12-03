/*
SQLyog Ultimate v8.6 Beta2
MySQL - 5.5.5-10.1.10-MariaDB : Database - project_kp_2016
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(128) NOT NULL,
  PRIMARY KEY (`username_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`username_admin`,`password_admin`) values ('admin','admin'),('ayu','29c65f781a1068a41f735e1b092546de'),('lala','lala');

/*Table structure for table `admin_permohonan` */

DROP TABLE IF EXISTS `admin_permohonan`;

CREATE TABLE `admin_permohonan` (
  `username_admin_antara` varchar(30) DEFAULT NULL,
  `kode_permohonan_antara` varchar(17) NOT NULL,
  PRIMARY KEY (`kode_permohonan_antara`),
  KEY `FK_admin_permohonan` (`username_admin_antara`),
  CONSTRAINT `FK_admin_permohonan` FOREIGN KEY (`username_admin_antara`) REFERENCES `admin` (`username_admin`) ON UPDATE CASCADE,
  CONSTRAINT `FK_admin_permohonan_permohonan` FOREIGN KEY (`kode_permohonan_antara`) REFERENCES `daftar_permohonan` (`kode_permohonan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin_permohonan` */

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

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

insert  into `agenda`(`isi_agenda`,`tanggal_mulai_agenda`,`admin`,`tanggal_selesai_agenda`,`timestamp_agenda`) values ('kunjungan dari SMA blablabla','2016-11-07','ayu','2016-11-07','2016-11-06 15:39:16');

/*Table structure for table `aktivitas` */

DROP TABLE IF EXISTS `aktivitas`;

CREATE TABLE `aktivitas` (
  `catatan_aktivitas` varchar(100) NOT NULL,
  `waktu_aktivitas` datetime NOT NULL,
  `username_aktivitas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`waktu_aktivitas`),
  KEY `FK_aktivitas` (`username_aktivitas`),
  CONSTRAINT `FK_aktivitas` FOREIGN KEY (`username_aktivitas`) REFERENCES `admin` (`username_admin`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aktivitas` */

insert  into `aktivitas`(`catatan_aktivitas`,`waktu_aktivitas`,`username_aktivitas`) values ('ayu mengisi agenda','2016-11-06 15:39:16','ayu');

/*Table structure for table `calendar_events` */

DROP TABLE IF EXISTS `calendar_events`;

CREATE TABLE `calendar_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `all_day` tinyint(1) DEFAULT NULL,
  `border_color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `calendar_events` */

/*Table structure for table `calendar_events_repeat_dates` */

DROP TABLE IF EXISTS `calendar_events_repeat_dates`;

CREATE TABLE `calendar_events_repeat_dates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `calendar_event_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `calendar_events_repeat_dates_calendar_event_id_foreign` (`calendar_event_id`),
  CONSTRAINT `calendar_events_repeat_dates_calendar_event_id_foreign` FOREIGN KEY (`calendar_event_id`) REFERENCES `calendar_events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `calendar_events_repeat_dates` */

/*Table structure for table `daftar_permohonan` */

DROP TABLE IF EXISTS `daftar_permohonan`;

CREATE TABLE `daftar_permohonan` (
  `nama_pemohon_peminjaman` varchar(100) NOT NULL,
  `kode_permohonan` varchar(17) NOT NULL,
  `status_permohonan` varchar(20) NOT NULL DEFAULT 'Diproses',
  `nama_kegiatan` varchar(200) NOT NULL,
  `tanggal_masuk_permohonan` datetime NOT NULL ,
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

/*Table structure for table `daftar_status` */

DROP TABLE IF EXISTS `daftar_status`;

CREATE TABLE `daftar_status` (
  `NIDN_daftar` varchar(10) NOT NULL,
  `status_dosen` varchar(50) NOT NULL,
  PRIMARY KEY (`status_dosen`),
  KEY `FK_daftar_status` (`NIDN_daftar`),
  CONSTRAINT `FK_daftar_status` FOREIGN KEY (`NIDN_daftar`) REFERENCES `dosen` (`NIDN_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daftar_status` */

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

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

insert  into `dosen`(`nama_dosen`,`NIDN_dosen`,`status_terkini`,`pengumuman_terkini`,`password_dosen`) values ('ayu','5113100072','di ruangan','-','29c65f781a1068a41f735e1b092546de');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pemohon` */

DROP TABLE IF EXISTS `pemohon`;

CREATE TABLE `pemohon` (
  `nama_pemohon` varchar(100) NOT NULL,
  `nomor_telepon_pemohon` varchar(14) DEFAULT NULL,
  `email_pemohon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nama_pemohon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemohon` */

/*Table structure for table `pengumuman` */

DROP TABLE IF EXISTS `pengumuman`;

CREATE TABLE `pengumuman` (
  `isi_pengumuman` varchar(300) NOT NULL,
  `NIDN_pengumuman` varchar(10) DEFAULT NULL,
  `waktu_pengumuman` datetime NOT NULL ,
  PRIMARY KEY (`waktu_pengumuman`),
  KEY `FK_pengumuman` (`NIDN_pengumuman`),
  CONSTRAINT `FK_pengumuman` FOREIGN KEY (`NIDN_pengumuman`) REFERENCES `dosen` (`NIDN_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman` */

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `nama_ruangan` varchar(100) NOT NULL,
  PRIMARY KEY (`nama_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ruangan` */

/*Table structure for table `rutinitas` */

DROP TABLE IF EXISTS `rutinitas`;

CREATE TABLE `rutinitas` (
  `frekwensi_rutinitas` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan_rutinitas` varchar(15) NOT NULL,
  PRIMARY KEY (`frekwensi_rutinitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rutinitas` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

/*Table structure for table `waktu_kegiatan` */

DROP TABLE IF EXISTS `waktu_kegiatan`;

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

/* Procedure structure for procedure `editAgenda` */

/*!50003 DROP PROCEDURE IF EXISTS  `editAgenda` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `editAgenda`(isiAgenda VARCHAR(300), tanggalMulai DATE, usernameAdmin VARCHAR(20), tanggalSelesai DATE, timelogAgenda datetime)
BEGIN
	start transaction;
	delete from agenda where timestamp_agenda = timelogAgenda;
	call isiAgenda(isiAgenda, tanggalMulai, usernameAdmin, tanggalSelesai);
	insert into aktivitas (catatan_aktivitas, username_aktivitas)
	values (concat(usernamAdmin, ' mengubah agenda dengan kode',timelogAgenda), usernameAdmin);
	insert into aktivitas(catatan_aktivitas, username_aktivitas)
	values(concat(usernameAdmin, ' menyunting agenda ', timelogAgenda), usernameAdmin);
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `gantiPassword` */

/*!50003 DROP PROCEDURE IF EXISTS  `gantiPassword` */;

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
		insert into aktivitas(catatan_aktivitas, username_aktivitas)
		values(concat(usernameAdmin,' mengganti password'), usernameAdmin);
		select 'Password berhasil diganti' as message;
	else
		select 'Password salah' as message;
		INSERT INTO aktivitas(catatan_aktivitas, username_aktivitas)
		VALUES(concat(usernameAdmin,' gagal mengganti password'), usernameAdmin);
	end if;
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `getListDosen` */

/*!50003 DROP PROCEDURE IF EXISTS  `getListDosen` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getListDosen`(keyword varchar(30))
BEGIN
	select nama_dosen, NIDN_dosen, status_terkini, pengumuman_terkini
	from dosen
	where nama_dosen like (select(concat('%',keyword,'%'))) or nidn_dosen like (SELECT(CONCAT('%',keyword,'%')));
    END */$$
DELIMITER ;

/* Procedure structure for procedure `hapusPeminjaman` */

/*!50003 DROP PROCEDURE IF EXISTS  `hapusPeminjaman` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusPeminjaman`(kodePinjam varchar(17), userAdmin varchar(100))
BEGIN
	start transaction;
	delete from waktu_kegiatan
	where kode_permohonan = kodePinjam and tanggal_kegiatan >= curdate();
	update daftar_permohonan
	set status_permohonan = 'Dihapus'
	where kode_permohonan=kodePinjam;
	insert into aktivitas(catatan_aktivitas, username_aktivitas)
	value(concat('Admin ',userAdmin,' menghapus jadwal dengan kode ',kodePinjam),userAdmin);
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `isiAgenda` */

/*!50003 DROP PROCEDURE IF EXISTS  `isiAgenda` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `isiAgenda`(isiAgenda varchar(300), tanggalMulai date, usernameAdmin varchar(20), tanggalSelesai date)
BEGIN
    start transaction;
	insert into agenda (isi_agenda, tanggal_mulai_agenda, admin, tanggal_selesai_agenda)
	values (isiAgenda, tanggalMulai, usernameAdmin, tanggalSelesai);
	insert into aktivitas(catatan_aktivitas, username_aktivitas)
	values (concat(usernameAdmin, ' mengisi agenda'), usernameAdmin);
	select 'Pengisian agenda telah berasil' as 'Pesan';
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `isiPemohon` */

/*!50003 DROP PROCEDURE IF EXISTS  `isiPemohon` */;

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

/*!50003 DROP PROCEDURE IF EXISTS  `isiPermohonan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `isiPermohonan`(namaPemohon varchar(30),
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
						kali_peminjaman)
				values (namaPemohon,
					@uid,
					namaKegiatan,
					tanggalMulai,
					waktuMulai,
					waktuSelesai,
					badanPelaksana,
					namaRuangan,
					rutinitas,
					kaliPinjam);
		select 1 as 'pesan', @uid as 'Kode_Pemesanan';
	else
		select 0 as 'pesan';
	end if;
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `lihatAgenda` */

/*!50003 DROP PROCEDURE IF EXISTS  `lihatAgenda` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `lihatAgenda`()
BEGIN
	select isi_agenda, tanggal_mulai_agenda, tanggal_selesai_agenda from agenda where tanggal_mulai_agenda > now() order by tanggal_mulai_agenda ASC limit 5;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `lihatKegiatanBerikut` */

/*!50003 DROP PROCEDURE IF EXISTS  `lihatKegiatanBerikut` */;

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

/*!50003 DROP PROCEDURE IF EXISTS  `lihatKegiatanSekarang` */;

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

/*!50003 DROP PROCEDURE IF EXISTS  `loginAdmin` */;

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

/*!50003 DROP PROCEDURE IF EXISTS  `loginDosen` */;

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

/*!50003 DROP PROCEDURE IF EXISTS  `setujuiPermohonan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `setujuiPermohonan`(	kodePermohonan varchar(17),
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
		
		insert into aktivitas (catatan_aktivitas, username_aktivitas)
		values (concat(userAdmin,' menyetujui permohonan dengan kode ', kodePermohonan), userAdmin);
		
		select 'Permohonan pemesanan telah disetujui.' as 'pesan', 1 as 'status';
	else
		select 'Permohonan tidak dapat disetujui karena pada waktu yang sama ada kegiatan lain.' as 'pesan', 0 as 'status';
	end if;
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `tambahDosen` */

/*!50003 DROP PROCEDURE IF EXISTS  `tambahDosen` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahDosen`(namaDosen varchar(60), nidnDosen varchar(10), passwordDosen varchar(32), usernameAdmin varchar(30))
BEGIN
	start transaction;
	INSERT INTO aktivitas(catatan_aktivitas, username_aktivitas)
	VALUES (CONCAT(usernameAdmin, ' menambah ', namaDosen), usernameAdmin);
	insert into dosen(nama_dosen, NIDN_dosen, password_dosen)
	values(namaDosen, nidnDosen, md5(passwordDosen));
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `tambahRuangan` */

/*!50003 DROP PROCEDURE IF EXISTS  `tambahRuangan` */;

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

/*!50003 DROP PROCEDURE IF EXISTS  `tambahRutinitas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahRutinitas`(frekwensi int, keterangan varchar(15), adminName varchar(20))
BEGIN
	start transaction;
	insert into rutinitas(frekwensi_rutinitas, keterangan_rutinitas)
	values (frekwensi, keterangan)
	on duplicate key update keterangan_rutinitas=keterangan;
	
	insert into aktivitas (catatan_aktivitas, username_aktivitas)
	values (concat(adminName, ' menambahkan frekwensi rutinitas baru'), adminName);
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `tolakPermohonan` */

/*!50003 DROP PROCEDURE IF EXISTS  `tolakPermohonan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tolakPermohonan`(userAdmin varchar(20), kodePermohonan varchar(17))
BEGIN
    start transaction;
	update daftar_permohonan
	set status_permohonan = 'Ditolak'
	where kode_permohonan = kodePermohonan;
	
	insert into aktivitas(catatan_aktivitas, username_aktivitas)
	values(concat(userAdmin, ' menolak permohonan dengan kode ', kodePermohonan), userAdmin);
	
	insert into admin_permohonan(username_admin_antara, kode_permohonan_antara)
	values(userAdmin, kodePermohonan);
	SELECT 'Berhasil' AS 'Pesan';
	commit;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `updatePeminjaman` */

/*!50003 DROP PROCEDURE IF EXISTS  `updatePeminjaman` */;

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
		insert into aktivitas(catatan_aktivitas, username_aktivitas)
		value(concat(userAdmin,' mengubah peminjaman ', kodePermohonan), userAdmin);
		
		select 1 as 'pesan';
		commit;
	else
		select 0 as 'pesan';
		rollback;
	end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `updateStatus` */

/*!50003 DROP PROCEDURE IF EXISTS  `updateStatus` */;

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

CREATE DATABASE  IF NOT EXISTS `eoffice` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `eoffice`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: eoffice
-- ------------------------------------------------------
-- Server version	5.1.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `airport_list`
--

DROP TABLE IF EXISTS `airport_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airport_list` (
  `id` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `id_country` varchar(4) NOT NULL,
  `country` varchar(50) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airport_list`
--

LOCK TABLES `airport_list` WRITE;
/*!40000 ALTER TABLE `airport_list` DISABLE KEYS */;
INSERT INTO `airport_list` VALUES ('ABU','Atambua','Atambua','ID','Indonesia','',''),('AEG','Aek Godang','Sibolga','ID','Indonesia','',''),('AGD','Anggi','Anggi','ID','Indonesia','',''),('AHI','Amahai','Amahai','ID','Indonesia','',''),('AMI','Selaparang','Mataram','ID','Indonesia','',''),('AMQ','Pattimura','Ambon','ID','Indonesia','',''),('AOR','Alor Setar','Alor Setar','ID','Indonesia','',''),('ARD','Alor Island','Alor Island','ID','Indonesia','',''),('AUT','Atauro','Atauro','ID','Indonesia','',''),('AYW','Ayawasi','Ayawasi','ID','Indonesia','',''),('BDJ','Sjamsudin Noor','Banjarmasin','ID','Indonesia','',''),('BDO','Husein Sastranegara','Bandung','ID','Indonesia','',''),('BEJ','Kalimaru','Tanjung Redep','ID','Indonesia','',''),('BIK','Frans Kaisepo','Biak','ID','Indonesia','',''),('BJG','Bolaang','Bolaang','ID','Indonesia','',''),('BJK','Benjina','Benjina','ID','Indonesia','',''),('BJW','Bajawa','Bajawa','ID','Indonesia','',''),('BKI','Kota-Kinabalu International  ','Kota-Kinabalu','ID','Indonesia','',''),('BKK','Suvarnabhumi International','Bangkok','ID','Indonesia','',''),('BKS','Fatmawatih','Bengkulu','ID','Indonesia','',''),('BLR','Bangalore International  ','Bangalore','ID','Indonesia','',''),('BMU','Bima','Bima','ID','Indonesia','',''),('BOM','Chhatrapati Shivaji International','Mumbai','ID','Indonesia','',''),('BPN','Sepingan','Balikpapan','ID','Indonesia','',''),('BTH','Hang Nadim','Batam','ID','Indonesia','',''),('BTJ','Sultan Lskandarmuda  ','Banda Aceh','ID','Indonesia','',''),('BTU','Bintulu','Bintulu','ID','Indonesia','',''),('BTW','Batu Licin','Batu Licin','ID','Indonesia','',''),('BUI','Bokondini','Bokondini','ID','Indonesia','',''),('BUW','Baubau','Baubau','ID','Indonesia','',''),('BWN','Bandar Seri Begwan International  ','Bandar Seri Begawan','ID','Indonesia','',''),('BWW','Blimbingsari','Banyuwangi','ID','Indonesia','',''),('BXB','Babo','Babo','ID','Indonesia','',''),('BXD','Bade','Bade','ID','Indonesia','',''),('BXT','Bontang','Bontang','ID','Indonesia','',''),('BYQ','Bunyu','Bunyu','ID','Indonesia','',''),('CAN','New Baiyun','Guangzhou','ID','Indonesia','',''),('CBN','Penggung','Cirebon','ID','Indonesia','',''),('CCU','Netaji Subhas Chandra','Kolkata','ID','Indonesia','',''),('CEI','Chiang Rai','Chiang Rai','ID','Indonesia','',''),('CGK','Soekarno-Hatta International','Jakarta','ID','Indonesia','',''),('CHC','Christchurch International','Christchurch','ID','Indonesia','',''),('CMB','Bandaranayake','Colombo','ID','Indonesia','',''),('CNX','Chiang Mai International','Chiang Mai','ID','Indonesia','',''),('COK','Cochin International','Kochi','ID','Indonesia','',''),('CPF','Cepu','Cepu','ID','Indonesia','',''),('CRK','Diosdado Macapagal International','Angeles City','ID','Indonesia','',''),('CXP','Tunggul Wulung','Cilacap','ID','Indonesia','',''),('DAD','Da Nang','Da Nang','ID','Indonesia','',''),('DEL','Indira Gandhi Intl','New Delhi','ID','Indonesia','',''),('DIL','Presidente Nicolau Lobato','Dili','ID','East Timor','',''),('DJB','Sultan Taha Syarifudn','Jambi','ID','Indonesia','',''),('DJJ','Sentani','Jayapura','ID','Indonesia','',''),('DKI','Dekai','Dekai','ID','Indonesia','',''),('DMK','Don Mueang','Bangkok','ID','Indonesia','',''),('DPS','Ngurah Rai International','Denpasar, Bali','ID','Indonesia','',''),('DQJ','Blimbingsari','Banyuwangi','ID','Indonesia','',''),('DRH','Dabra','Dabra','ID','Indonesia','',''),('DRW','Darwin','Darwin','ID','Indonesia','',''),('DTD','Datadawai','Datadawai','ID','Indonesia','',''),('DUM','Pinang Kampai','Dumai','ID','Indonesia','',''),('ELR','Elelim','Elelim','ID','Indonesia','',''),('ENE','Ende','Ende','ID','Indonesia','',''),('EWE','Ewer','Ewer','ID','Indonesia','',''),('EWI','Enarotali','Enarotali','ID','Indonesia','',''),('FKQ','Fak Fak','Fak Fak','ID','Indonesia','',''),('FLQ','Dr.F L Tobing','Sibolga','ID','Indonesia','',''),('FOO','Numfoor','Numfoor','ID','Indonesia','',''),('GAV','Gag Island','Gag Island','ID','Indonesia','',''),('GEB','Gebe','Gebe','ID','Indonesia','',''),('GLX','Galela','Galela','ID','Indonesia','',''),('GNS','Binaka','Gunungsitoli','ID','Indonesia','',''),('GTO','Tolotio','Gorontalo','ID','Indonesia','',''),('HAN','Noibai International','Hanoi','ID','Indonesia','',''),('HDY','Hat Yai','Hat Yai','ID','Indonesia','',''),('HGN','Mae Hong Son','Mae Hong Son','ID','Indonesia','',''),('HKG','Hong Kong International','Hong Kong','ID','Indonesia','',''),('HKT','Phuket International','Phuket','ID','Indonesia','',''),('HLP','Halim Perdana Kusuma','Jakarta, Halim','ID','Indonesia','',''),('HND','Tokyo Haneda International','Tokyo','ID','Indonesia','',''),('ICN','Incheon International','Seoul','ID','Indonesia','',''),('ILA','Illaga','Illaga','ID','Indonesia','',''),('INX','Inanwatan','Inanwatan','ID','Indonesia','',''),('IUL','Ilu','Ilu','ID','Indonesia','',''),('JHB','Sultan Ismail Intl','Johor Bahru','ID','Indonesia','',''),('JOG','Adisutjipto','Yogyakarta','ID','Indonesia','',''),('KAZ','Kau','Kau','ID','Indonesia','',''),('KBF','Karubaga','Karubaga','ID','Indonesia','',''),('KBR','Sultan Ismail Petra','Kota Bharu','ID','Indonesia','',''),('KBU','Kotabaru','Kotabaru','ID','Indonesia','',''),('KBV','Krabi','Krabi','ID','Indonesia','',''),('KBX','Kambuaya','Kambuaya','ID','Indonesia','',''),('KCD','Kamur','Kamur','ID','Indonesia','',''),('KCH','Kuching','Kuching','ID','Indonesia','',''),('KCI','Kon','Kon','ID','Indonesia','',''),('KDI','Wolter Monginsidi','Kendari','ID','Indonesia','',''),('KEA','Keisah','Keisah','ID','Indonesia','',''),('KEI','Kepi','Kepi','ID','Indonesia','',''),('KEQ','Kebar','Kebar','ID','Indonesia','',''),('KIX','Kansai International','Osaka','ID','Indonesia','',''),('KLQ','Keluang','Keluang','ID','Indonesia','',''),('KMM','Kimam','Kimam','ID','Indonesia','',''),('KNG','Kaimana','Kaimana','ID','Indonesia','',''),('KNO','Kualanamu','Medan','ID','Indonesia','',''),('KOD','Sabiha GÃƒÆ’Ã‚Â¶kÃƒÆ’Ã‚Â§en HavaalanÃƒâ€žÃ‚Â±','Kotabangun','ID','Indonesia','',''),('KOE','Eltari','Kupang','ID','Indonesia','',''),('KOP','Nakhon Phanom','Nakhon Phanom','ID','Indonesia','',''),('KOX','Kokonao','Kokonao','ID','Indonesia','',''),('KRC','Kerinci','Kerinci','ID','Indonesia','',''),('KTG','Ketapang','Ketapang','ID','Indonesia','',''),('KUL','Kuala Lumpur International  ','Kuala Lumpur','ID','Malaysia','',''),('KWB','Karimunjawa','Karimunjawa','ID','Indonesia','',''),('KWL','Guilin','Guilin','ID','Indonesia','',''),('LAH','Labuha','Labuha','ID','Indonesia','',''),('LBJ','Mutiara','Labuan Bajo','ID','Indonesia','',''),('LBU','Labuan','Labuan','ID','Indonesia','',''),('LBW','Long Bawan','Long Bawan','ID','Indonesia','',''),('LGK','Langakawi Intl','Langkawi','ID','Indonesia','',''),('LHI','Lereh','Lereh','ID','Indonesia','',''),('LII','Mulia','Mulia','ID','Indonesia','',''),('LKA','Larantuka','Larantuka','ID','Indonesia','',''),('LLG','Silampari','Lubuk Linggau','ID','Indonesia','',''),('LLN','Kelila','Kelila','ID','Indonesia','',''),('LOP','Lombok International','Mataram','ID','Indonesia','',''),('LPU','Long Apung','Long Apung','ID','Indonesia','',''),('LSW','Lhoksumawe','Lhoksumawe','ID','Indonesia','',''),('LUV','Langgur','Tual','ID','Indonesia','',''),('LUW','Luwuk','Luwuk','ID','Indonesia','',''),('LWE','Lewoleba','Lewoleba','ID','Indonesia','',''),('LYK','Lunyuk','Lunyuk','ID','Indonesia','',''),('MAA','Madras International','Chennai/Madras','ID','Indonesia','',''),('MAL','Mangole','Mangole','ID','Indonesia','',''),('MDC','Samratulangi','Manado','ID','Indonesia','',''),('MDP','Mindiptana','Mindiptana','ID','Indonesia','',''),('MEL','Tullamarine','Melbourne','ID','Indonesia','',''),('MEQ','Seunagan','Meulaboh','ID','Indonesia','',''),('MES','Polonia','Medan','ID','Indonesia','',''),('MFM','Macau International','Macau','ID','Indonesia','',''),('MJU','Mamuju','Mamuju','ID','Indonesia','',''),('MJY','Mangunjaya','Mangunjaya','ID','Indonesia','',''),('MKQ','Mopah','Merauke','ID','Indonesia','',''),('MKW','Rendani','Manokwari','ID','Indonesia','',''),('MKZ','Batu Berendam','Malacca','ID','Malaysia','',''),('MLG','Abdul Rahman Saleh','Malang','ID','Indonesia','',''),('MLK','Melak','Melak','ID','indonesia','',''),('MLN','Malinau','Malinau','ID','indonesia','',''),('MNA','Melangguane','Melangguane','ID','Indonesia','',''),('MOF','Waioti','Maumere','ID','Indonesia','',''),('MPC','Muko-Muko','Muko-Muko','ID','Indonesia','',''),('MPT','Maliana','Maliana','ID','Indonesia','',''),('MSI','Masalembo','Masalembo','ID','Indonesia','',''),('MUF','Muting','Muting','ID','Indonesia','',''),('MWK','Matak','Matak','ID','Indonesia','',''),('MXB','Masamba','Masamba','ID','Indonesia','',''),('MYY','Miri','Miri','ID','Indonesia','',''),('NAF','Banaina','Banaina','ID','Indonesia','',''),('NAH','Naha','Tahuna','ID','Indonesia','',''),('NAM','Namlea','Namlea','ID','Indonesia','',''),('NAW','Narathiwat','Narathiwat','ID','Indonesia','',''),('NBX','Nabire','Nabire','ID','Indonesia','',''),('NDA','Bandanaira','Bandanaira','ID','Indonesia','',''),('NKD','Sinak','Sinak','ID','Indonesia','',''),('NNX','Nunukan','Nunukan','ID','Indonesia','',''),('NPO','Nangapinoh','Nangapinoh','ID','Indonesia','',''),('NRT','Narita','Tokyo','ID','indonesia','',''),('NST','Nakhon Si Thammarat','Nakhon Si Thammarat','ID','Indonesia','',''),('NTI','Bintuni','Bintuni','ID','Indonesia','',''),('NTX','Natuna Ranai','Natuna Ranai','ID','Indonesia','',''),('OBD','Obano','Obano','ID','Indonesia','',''),('OEC','Ocussi','Ocussi','ID','Indonesia','',''),('OKL','Oksibil','Oksibil','ID','Indonesia','',''),('OKQ','Okaba','Okaba','ID','Indonesia','',''),('ONI','Moanamani','Moanamani','ID','Indonesia','',''),('OOL','Gold Coast','Gold Coast','ID','Indonesia','',''),('ORY','Orly','Paris','ID','Indonesia','',''),('OTI','Morotai Island','Pitu, Morotai Island','ID','Indonesia','',''),('PBW','Palibelo','Palibelo','ID','Indonesia','',''),('PDG','Minangkabau International  ','Padang','ID','Indonesia','',''),('PDO','Pendopo','Pendopo','ID','Indonesia','',''),('PEK','Beijing Capital Int.','Beijing','ID','China','',''),('PEN','Penang International','Penang','ID','Indonesia','',''),('PER','Perth International','Perth','ID','Indonesia','',''),('PGK','Pangkalpinang','Pangkalpinang','ID','Indonesia','',''),('PKN','Pangkalanbuun','Pangkalanbuun','ID','Indonesia','',''),('PKU','Sultan Syarif Kasim Ii','Pekanbaru','ID','Indonesia','',''),('PKY','Palangkaraya','Palangkaraya','ID','Indonesia','',''),('PLM','Mahmud Badaruddin Ii','Palembang','ID','Indonesia','',''),('PLW','Mutiara','Palu','ID','Indonesia','',''),('PNH','Phnom Penh International','Phnom Penh','ID','Indonesia','',''),('PNK','Supadio','Pontianak','ID','Indonesia','',''),('PPJ','Pulau Panjang','Pulau Panjang','ID','Indonesia','',''),('PPR','Pasir Pangarayan','Pasir Pangarayan','ID','Indonesia','',''),('PSJ','Poso','Poso','ID','Indonesia','',''),('PSU','Putussibau','Putussibau','ID','Indonesia','',''),('PUM','Pomala','Pomala','ID','Indonesia','',''),('PUS','Busan','Busan','ID','indonesia','',''),('PVG','Pu Dong','Shanghai','ID','China','',''),('PWL','Purwokerto','Purwokerto','ID','Indonesia','',''),('RAQ','Sugimanuru','Raha','ID','Indonesia','',''),('RDE','Merdey','Merdey','ID','Indonesia','',''),('REP','Siem Reap','Siem Reap','ID','Indonesia','',''),('RGN','Mingaladon','Yangon','ID','Indonesia','',''),('RGT','Japura','Rengat','ID','Indonesia','',''),('RKI','Rokot','Rokot','ID','Indonesia','',''),('RKO','Sipora','Sipora','ID','Indonesia','',''),('RRZ','Sibolga','Sibolga','ID','Indonesia','',''),('RSK','Ransiki','Ransiki','ID','Indonesia','',''),('RTG','Ruteng','Ruteng','ID','Indonesia','',''),('RTI','Roti','Roti','ID','Indonesia','',''),('SAE','Sangir','Sangir','ID','Indonesia','',''),('SAU','Sawu','Sawu','ID','Indonesia','',''),('SBG','Narita','Sabang','ID','Indonesia','',''),('SBW','Sibu','Sibu','ID','Indonesia','',''),('SDK','Sandakan','Sandakan','ID','Indonesia','',''),('SEH','Senggeh','Senggeh','ID','Indonesia','',''),('SEQ','Sungai Pakning','Sungai Pakning','ID','Indonesia','',''),('SGN','Tan Son Nhat International','Ho Chi Minh City','ID','Indonesia','',''),('SGQ','Sanggata','Sanggata','ID','Indonesia','',''),('SIN','Changi','Singapore','ID','Indonesia','',''),('SIQ','Dabo','Singkep','ID','Indonesia','',''),('SIX','Sibolaga ','Sibolaga ','ID','Indonesia','',''),('SLY','Selayar','Selayar','ID','Indonesia','',''),('SMQ','Sampit','Sampit','ID','Indonesia','',''),('SNB','Sinabang','Sinabang','ID','Indonesia','',''),('SNX','sinabang','sinabang','ID','Indonesia','',''),('SOC','Adi Sumarmo','Solo City','ID','Indonesia','',''),('SOQ','Jefman','Sorong','ID','Indonesia','',''),('SQG','Sintang','Sintang','ID','Indonesia','',''),('SQI','Silangit','Silangit','ID','Indonesia','',''),('SQN','Sanana','Sanana','ID','Indonesia','',''),('SQR','Inco Soroako Waws','Soroako','ID','Indonesia','',''),('SQT','Silangit','Siborong-borong','ID','indonesia','',''),('SRG','Achmad Yani','Semarang','ID','Indonesia','',''),('SRI','Samarinda','Samarinda','ID','Indonesia','',''),('SUB','Juanda','Surabaya','ID','Indonesia','',''),('SUP','Trunojoyo','Sumenep','ID','Indonesia','',''),('SWQ','Brang Bidji','Sumbawa','ID','Indonesia','',''),('SXK','Saumlaki','Saumlaki','ID','Indonesia','',''),('SYD','NWS','Sydney','ID','Indonesia','',''),('SZH','Senipah','Senipah','ID','Indonesia','',''),('SZX','Shenzhen','Shenzhen','ID','Indonesia','',''),('TAX','Taliabu','Taliabu','ID','Indonesia','',''),('TBM','Tumbang Samba','Tumbang Samba','ID','Indonesia','',''),('TGG','Sultan Mahmood','Kuala Terengganu','ID','Indonesia','',''),('TIM','Tembagapura','Timika','ID','Indonesia','',''),('TJB','Tanjung Balai','Tanjung Balai','ID','Indonesia','',''),('TJG','Tanjung Warukin','Tanjung Warukin','ID','Indonesia','',''),('TJQ','Bulutumbang','Tanjung Pandan','ID','Indonesia','',''),('TJS','Tanjung Selor','Tanjung Selor','ID','Indonesia','',''),('TKG','Branti','Bandar Lampung','ID','Indonesia','',''),('TLI','Tolitoli','Tolitoli','ID','Indonesia','',''),('TMC','Tjilik Riwut','Tambolaka','ID','Indonesia','',''),('TMH','Tanahmerah','Tanahmerah','ID','Indonesia','',''),('TMY','Tiom','Tiom','ID','Indonesia','',''),('TNB','Tanah Grogot','Tanah Grogot','ID','Indonesia','',''),('TNJ','Kidjang','Tanjung Pinang','ID','Indonesia','',''),('TPE','Taiwan Taoyuan International','Taipei','ID','Indonesia','',''),('TPK','Tapaktuan','Tapaktuan','ID','Indonesia','',''),('TRK','Juwata','Tarakan','ID','Indonesia','',''),('TRZ','Civil','Tiruchirapally','ID','Indonesia','',''),('TST','Trang','Trang','ID','Indonesia','',''),('TTE','Babullah','Ternate','ID','Indonesia','',''),('TTR','Tana Toraja','Tana Toraja','ID','Indonesia','',''),('TWU','Tawau','Tawau','ID','Indonesia','',''),('TXM','Teminabuan','Teminabuan','ID','Indonesia','',''),('UAI','Suai','Suai','ID','Indonesia','',''),('UBP','Muang Ubon','Ubon Ratchathni','ID','Indonesia','',''),('UBR','Ubrub','Ubrub','ID','Indonesia','',''),('UGU','Zugapa','Zugapa','ID','Indonesia','',''),('UOL','Buol','Buol','ID','Indonesia','',''),('UPG','Hasanudin','Ujung Pandang','ID','Indonesia','',''),('URT','Surat Thani','Surat Thani','ID','Indonesia','',''),('UTH','Udon Thani','Udon Thani','ID','Indonesia','',''),('VIQ','Viqueque','Viqueque','ID','Indonesia','',''),('VTE','Wattay','Vientiane','ID','Indonesia','',''),('WAR','Waris','Waris','ID','Indonesia','',''),('WET','Wagethe','Wagethe','ID','Indonesia','',''),('WGI','Wangi-Wangi','Wakatobi','ID','Indonesia','',''),('WGP','Waingapu','Waingapu','ID','Indonesia','',''),('WMX','Wamena','Wamena','ID','Indonesia','',''),('WNI','Wakatobi','Wakatobi','ID','Indonesia','',''),('WSR','Wasior','Wasior','ID','Indonesia','',''),('WUB','Buli','Buli','ID','Indonedia','',''),('ZEG','Senggo','Senggo','ID','Indonesia','',''),('ZKL','Steenkool','Steenkool','ID','Indonesia','',''),('ZRI','Serui','Serui','ID','Indonesia','',''),('ZRM','Sarmi','Sarmi','ID','Indonesia','','');
/*!40000 ALTER TABLE `airport_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_anggaran`
--

DROP TABLE IF EXISTS `detail_anggaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_anggaran` (
  `kode_anggaran` int(10) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `years` date NOT NULL,
  `anggaran` int(11) NOT NULL,
  PRIMARY KEY (`kode_anggaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_anggaran`
--

LOCK TABLES `detail_anggaran` WRITE;
/*!40000 ALTER TABLE `detail_anggaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_anggaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_telp`
--

DROP TABLE IF EXISTS `emp_telp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_telp` (
  `emp_num` int(11) NOT NULL,
  `telp_no` varchar(15) NOT NULL,
  UNIQUE KEY `telp_no` (`telp_no`),
  KEY `emp_num` (`emp_num`),
  CONSTRAINT `emp_telp_ibfk_1` FOREIGN KEY (`emp_num`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_telp`
--

LOCK TABLES `emp_telp` WRITE;
/*!40000 ALTER TABLE `emp_telp` DISABLE KEYS */;
INSERT INTO `emp_telp` VALUES (25,'0225415551'),(25,'081224515300'),(26,'081'),(31,'123'),(32,'456'),(33,'789'),(34,'987'),(35,'654'),(36,'321'),(37,'1234'),(38,'12345'),(39,'3213211'),(40,'78789'),(41,'4565');
/*!40000 ALTER TABLE `emp_telp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flight_passanger_data`
--

DROP TABLE IF EXISTS `flight_passanger_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight_passanger_data` (
  `flight_res_id` int(11) NOT NULL,
  `pas_title` varchar(5) DEFAULT NULL,
  `pas_firstname` varchar(50) DEFAULT NULL,
  `pas_lastname` varchar(50) DEFAULT NULL,
  KEY `flight_res_id` (`flight_res_id`),
  CONSTRAINT `flight_passanger_data_ibfk_1` FOREIGN KEY (`flight_res_id`) REFERENCES `sppd_flight_res` (`flight_res_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flight_passanger_data`
--

LOCK TABLES `flight_passanger_data` WRITE;
/*!40000 ALTER TABLE `flight_passanger_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `flight_passanger_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flow_fitur`
--

DROP TABLE IF EXISTS `flow_fitur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flow_fitur` (
  `fitur_id` int(11) NOT NULL AUTO_INCREMENT,
  `fitur_name` varchar(10) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`fitur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flow_fitur`
--

LOCK TABLES `flow_fitur` WRITE;
/*!40000 ALTER TABLE `flow_fitur` DISABLE KEYS */;
INSERT INTO `flow_fitur` VALUES (1,'Cuti',1),(2,'Cuti',2),(3,'SPPD',1),(4,'SPPD',2),(5,'Nodin',1),(6,'Nodin',2);
/*!40000 ALTER TABLE `flow_fitur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flow_sppd`
--

DROP TABLE IF EXISTS `flow_sppd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flow_sppd` (
  `flow_id` int(11) NOT NULL AUTO_INCREMENT,
  `fitur_id` int(11) NOT NULL,
  `emp_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`flow_id`),
  KEY `fitur_id` (`fitur_id`,`emp_num`),
  KEY `emp_num` (`emp_num`),
  CONSTRAINT `flow_sppd_ibfk_1` FOREIGN KEY (`fitur_id`) REFERENCES `flow_fitur` (`fitur_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `flow_sppd_ibfk_2` FOREIGN KEY (`emp_num`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flow_sppd`
--

LOCK TABLES `flow_sppd` WRITE;
/*!40000 ALTER TABLE `flow_sppd` DISABLE KEYS */;
INSERT INTO `flow_sppd` VALUES (88,4,24);
/*!40000 ALTER TABLE `flow_sppd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hrms_config`
--

DROP TABLE IF EXISTS `hrms_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrms_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_title` varchar(255) NOT NULL,
  `tech_support` varchar(255) NOT NULL,
  `banner_url` varchar(255) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `link1` varchar(255) NOT NULL,
  `link2` varchar(255) NOT NULL,
  `link1_desc` varchar(150) NOT NULL,
  `link2_desc` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hrms_config`
--

LOCK TABLES `hrms_config` WRITE;
/*!40000 ALTER TABLE `hrms_config` DISABLE KEYS */;
INSERT INTO `hrms_config` VALUES (1,'Integra Office Business Suite','info@integramediatech.com','css/back.jpg','css/main-logo.jpg','www.integramediatech.com','www.integramediatech.com','Integra Media Tech','Integra');
/*!40000 ALTER TABLE `hrms_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hrms_counter`
--

DROP TABLE IF EXISTS `hrms_counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrms_counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_start_num` int(10) NOT NULL,
  `emp_counter_id` int(5) NOT NULL,
  `sppd_start_num` int(10) NOT NULL,
  `sppd_counter_id` int(5) NOT NULL,
  `job_start_num` int(10) NOT NULL,
  `job_counter_id` int(5) NOT NULL,
  `org_start_num` int(3) NOT NULL,
  `org_counter_id` int(10) NOT NULL,
  `app_title` varchar(255) NOT NULL,
  `tech_support` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hrms_counter`
--

LOCK TABLES `hrms_counter` WRITE;
/*!40000 ALTER TABLE `hrms_counter` DISABLE KEYS */;
INSERT INTO `hrms_counter` VALUES (1,1000000,38,3000,26,2000,42,2000,16,'HRM Application','support@telkom.co.id');
/*!40000 ALTER TABLE `hrms_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hrms_employees`
--

DROP TABLE IF EXISTS `hrms_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrms_employees` (
  `emp_num` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(50) NOT NULL,
  `emp_firstname` varchar(30) NOT NULL,
  `emp_lastname` varchar(30) NOT NULL,
  `emp_gender` varchar(2) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_street` varchar(100) NOT NULL,
  `emp_email` varchar(30) NOT NULL,
  `emp_cutah` int(2) NOT NULL,
  `emp_trip` int(2) NOT NULL,
  `emp_cubes` int(2) NOT NULL,
  `emp_status` smallint(6) NOT NULL,
  `emp_job` int(11) DEFAULT NULL,
  `job_code` varchar(10) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `org_code` varchar(10) NOT NULL,
  `pic_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`emp_num`),
  UNIQUE KEY `emp_id` (`emp_id`),
  KEY `emp_job` (`emp_job`),
  KEY `org_id` (`org_id`),
  CONSTRAINT `hrms_employees_ibfk_4` FOREIGN KEY (`emp_job`) REFERENCES `hrms_job` (`job_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hrms_employees_ibfk_5` FOREIGN KEY (`org_id`) REFERENCES `hrms_organization` (`org_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hrms_employees`
--

LOCK TABLES `hrms_employees` WRITE;
/*!40000 ALTER TABLE `hrms_employees` DISABLE KEYS */;
INSERT INTO `hrms_employees` VALUES (1,'0000000','Administrator','','','0000-00-00','','sgsfs',0,0,0,0,NULL,'',NULL,'',''),(2,'9998','Admin Reservation','','','0000-00-00','','',0,0,0,0,NULL,NULL,NULL,'',NULL),(24,'9999','DEF','','','0000-00-00','','',0,0,0,0,45,NULL,8,'',NULL),(25,'1000025','TAUFIK','ZAMZAMI','L','0000-00-00','BANDUNG','taufikzamzami@gmail.com',10,10,10,0,66,'JAB-110',15,'PTR-001',NULL),(26,'1000026','IRWAN','IRWAN','L','0000-00-00','JAKARTA','irwan@pointer.com',10,10,10,0,67,'JAB-210',16,'PTR-110',NULL),(31,'1000027','REFAD','REFAD','L','0000-00-00','JAKARTA','refad@pointer.co.id',10,10,10,0,70,'JAB-310',19,'PTR-120',NULL),(32,'1000028','ANDRE','ANDRE','L','0000-00-00','JAKARTA','andre@pointer.co.id',10,10,10,0,73,'JAB-410',22,'PTR-130',NULL),(33,'1000029','MONICA','SANJAYA','P','0000-00-00','BANDUNG','moccajaya@gmail.com',10,10,10,0,68,'JAB-211',17,'PTR-111',NULL),(34,'1000030','RIAN','AGUSTAMA','L','0000-00-00','BANDUNG','rianagustama@gmail.com',10,10,10,0,69,'JAB-212',18,'PTR-112',NULL),(35,'1000031','ALVIN','RESMANA','L','0000-00-00','JAKARTA','alvin.resmana@gmail.com',10,10,10,0,71,'JAB-311',20,'PTR-121',NULL),(36,'1000032','DEWI','MULANSARI','P','0000-00-00','BANDUNG','mulansaridewi@gmail.com',10,10,10,0,72,'JAB-312',21,'PTR-122',NULL),(37,'1000033','GIAN','DASUKI','L','0000-00-00','BANDUNG','gian.dasuki@gmail.com',10,10,10,0,74,'JAB-411',23,'PTR-131',NULL),(38,'1000034','ECHA','GOZALI','L','0000-00-00','BANDUNG','echa.echa@gmail.com',10,10,10,0,75,'JAB-412',24,'PTR-132',NULL),(39,'1000035','EKA','KELANA','L','0000-00-00','BANDUNG','kelanaeka@yahoo.com',10,10,10,0,76,'PTR-140',20,'PTR-121',NULL),(40,'1000036','BENGRIS','PASARIBU','L','0000-00-00','BANDUNG','pasaribu@gmail.com',10,10,10,0,77,'PTR-141',23,'PTR-131',NULL),(41,'1000037','WULAN','TRI','L','0000-00-00','BANDUNG','wulantri@gmail.com',10,10,10,0,78,'PTR-142',24,'PTR-132',NULL);
/*!40000 ALTER TABLE `hrms_employees` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`marketplace`@`localhost`*/ /*!50003 TRIGGER `insertNotaFolder` AFTER INSERT ON `hrms_employees`
 FOR EACH ROW begin

declare idUser int default new.emp_num;



insert into nota_folder(folder_name,emp_num) values('inbox',idUser);

insert into nota_folder(folder_name,emp_num) values('progress',idUser);

insert into nota_folder(folder_name,emp_num) values('draft',idUser);

insert into nota_folder(folder_name,emp_num) values('sent',idUser);

insert into nota_folder(folder_name,emp_num) values('archive',idUser);



end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `hrms_job`
--

DROP TABLE IF EXISTS `hrms_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrms_job` (
  `job_num` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` varchar(10) NOT NULL,
  `job_code` varchar(10) NOT NULL,
  `job_name` varchar(50) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `org_num` int(11) NOT NULL,
  PRIMARY KEY (`job_num`),
  UNIQUE KEY `job_id` (`job_id`),
  KEY `org_num` (`org_num`),
  KEY `org_num_2` (`org_num`),
  CONSTRAINT `hrms_job_ibfk_1` FOREIGN KEY (`org_num`) REFERENCES `hrms_organization` (`org_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hrms_job`
--

LOCK TABLES `hrms_job` WRITE;
/*!40000 ALTER TABLE `hrms_job` DISABLE KEYS */;
INSERT INTO `hrms_job` VALUES (37,'2001','FIA','Fiatur PT Telkom','Mengatur Keuangan',10),(38,'2002','SEKT','Sekretaris PT Telkom','Sekretaris Telkom',10),(39,'2003','RES','Researcher PT Telkom','Researcher PT Telkom',10),(40,'2004','MGRT','Manager Solution PT Telkom','Manager Solution PT Telkom',10),(41,'2005','DIRT','Direktur Utama PT Telkom','Direktur Utama PT Telkom',10),(42,'2006','WDIRT','Wakil Direktur PT Telkom','Wakil Direktur PT Telkom',10),(43,'2007','BNDT','Bendahara PT Telkom','Bendahara PT Telkom',10),(44,'2008','DIRC','Direktur Compliance','Direktur Compliance PT Telkom',10),(45,'9999','DEF','DEFAULT','',8),(46,'2009','FIA','Fiatur Telkom Metra','Keuangan Telkom Metra',11),(47,'2010','DIRM','Direktur Telkom Metra','Direktur Telkom Metra',11),(48,'2011','SYS','System Analyst','System Analyst Telkom Metra',11),(49,'2012','SEKM','Sekretaris Telkom Metra','Sekretaris Telkom Metra',11),(50,'2013','FIA','Fiatur Telkom Sigma','Fiatur Telkom Sigma',12),(51,'2014','FIA','Fiatur Telkom Testing','fiatur jabatan??',13),(52,'2015','FIA','FIATUR','testing',13),(53,'2016','RESV','reservation','reservasi online',13),(54,'2017','FIA','Fiatur Telkom Test','Manager Accounting',14),(55,'2018','234789','Manager HRD','HRD managing',14),(56,'2019','FIA','FIATUR POINTER','DESKRIPSI JABATAN FIATUR',15),(57,'2020','FIA','FIATUR SDM POINTER','DESKRIPSI JABATAN FIATUR SDM POINTER',16),(58,'2021','FIA','FIATUR HR MANAGEMENT','DESKRIPSI JABATAN FIATUR MANAGEMENT',17),(59,'2022','FIA','FIATUR HR TRAINING','DESKRIPSI JABATAN FIATUR HR TRAINING',18),(60,'2023','FIA','FIATUR MARKETING POINTER','DESKRIPSI JABATAN FIATUR MARKETING POINTER',19),(61,'2024','FIA','FIATUR PROMOSI','DESKRIPSI JABATAN FIATUR PROMOSI',20),(62,'2025','FIA','FIATUR KEUANGAN','DESKRIPSI JABATAN FIATUR KEUANGAN',21),(63,'2026','FIA','FIATUR ALPRO','DESKRIPSI JABATAN FIATUR ALPRO',22),(64,'2027','FIA','FIATUR PENGEMBANGAN','DESKRIPSI JABATAN FIATUR PENGEMBANGAN',23),(65,'2028','FIA','FIATUR QA','DESKRIPSI JABATAN FIATUR QA',24),(66,'2029','JAB-110','DIREKTUR','ABC',15),(67,'2030','JAB-210','GM SDM','ABC',16),(68,'2031','JAB-211','MANAGER HR MANAGEMENT','ABC',17),(69,'2032','JAB-212','MANAGER HR TRAINING','ABC',18),(70,'2033','JAB-310','GM MARKETING','ABC',19),(71,'2034','JAB-311','MANAGER PROMOSI','ABC',20),(72,'2035','JAB-312','MANAGER KEUANGAN','ABC',21),(73,'2036','JAB-410','GM ALPRO','ABC',22),(74,'2037','JAB-411','MANAGER PENGEMBANGAN','ABC',23),(75,'2038','JAB-412','MANAGER QA','ABC',24),(76,'2039','PTR-140','Karyawan Promosi','JABATAN DESKRIPSI',20),(77,'2040','PTR-141','Karyawan Pengembangan','ABC',23),(78,'2041','PTR-142','Karyawan QA','ABC',24);
/*!40000 ALTER TABLE `hrms_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hrms_notification`
--

DROP TABLE IF EXISTS `hrms_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrms_notification` (
  `notif_id` int(11) NOT NULL AUTO_INCREMENT,
  `notif_desc` varchar(255) NOT NULL,
  `notif_link` varchar(255) NOT NULL,
  `notif_type` int(11) NOT NULL,
  `emp_num` int(11) NOT NULL,
  `date_post` datetime NOT NULL,
  `time_post` time NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`notif_id`),
  KEY `notif_type` (`notif_type`),
  KEY `emp_num` (`emp_num`),
  CONSTRAINT `hrms_notification_ibfk_1` FOREIGN KEY (`notif_type`) REFERENCES `hrms_notification_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hrms_notification_ibfk_2` FOREIGN KEY (`emp_num`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hrms_notification`
--

LOCK TABLES `hrms_notification` WRITE;
/*!40000 ALTER TABLE `hrms_notification` DISABLE KEYS */;
INSERT INTO `hrms_notification` VALUES (1,'Nota Dinas Dengan ID 201405230001 Perlu Di Proses','201405230001',7,26,'2014-05-23 16:22:55','00:00:00',1),(2,'Nota Dinas Masuk,ID 201405230001','201405230001',8,31,'2014-05-23 16:24:49','00:00:00',1),(3,'Nota Dinas Masuk,ID 201405230001','201405230001',8,32,'2014-05-23 16:24:49','00:00:00',1),(4,'Nota Dinas Masuk,ID 201405230001','201405230001',8,35,'2014-05-23 16:24:49','00:00:00',1),(5,'Nota Dinas Masuk,ID 201405230001','201405230001',8,36,'2014-05-23 16:24:49','00:00:00',0),(6,'Nota Dinas Masuk,ID 201405230001','201405230001',8,37,'2014-05-23 16:24:49','00:00:00',0),(7,'Nota Dinas Masuk,ID 201405230001','201405230001',8,38,'2014-05-23 16:24:49','00:00:00',0),(8,'Nota Dinas Masuk,ID 201405230001','201405230001',8,39,'2014-05-23 16:24:49','00:00:00',1),(9,'Nota Dinas Masuk,ID 201405230001','201405230001',8,40,'2014-05-23 16:24:49','00:00:00',1),(10,'Nota Dinas Masuk,ID 201405230001','201405230001',8,41,'2014-05-23 16:24:49','00:00:00',0),(11,'Nota Dinas Dengan ID 201405230002 Perlu Di Proses','201405230002',7,35,'2014-05-23 16:28:54','00:00:00',1),(12,'Nota Dinas Dengan ID 201405230002 Perlu Di Proses','201405230002',7,31,'2014-05-23 16:31:16','00:00:00',1),(13,'Nota Dinas Masuk,ID 201405230002','201405230002',8,32,'2014-05-23 16:32:50','00:00:00',1),(14,'Nota Dinas Masuk,ID 201405230002','201405230002',8,37,'2014-05-23 16:32:50','00:00:00',0),(15,'Nota Dinas Masuk,ID 201405230002 Disposisi dari ANDRE/JAB-410/PTR-130','201405230002',8,38,'2014-05-23 16:39:49','00:00:00',1),(16,'Nota Dinas Masuk,ID 201405230002 Disposisi dari ECHA/JAB-412/PTR-132','201405230002',8,39,'2014-05-23 16:42:02','00:00:00',1),(17,'Nota Dinas Masuk,ID 201405230002 Disposisi dari ECHA/JAB-412/PTR-132','201405230002',8,40,'2014-05-23 16:42:02','00:00:00',1),(18,'Nota Dinas Masuk,ID 201405230002 Disposisi dari ECHA/JAB-412/PTR-132','201405230002',8,41,'2014-05-23 16:42:02','00:00:00',1),(19,'Nota Dinas Dengan ID 201405230003 Perlu Di Proses','201405230003',7,37,'2014-05-23 16:50:28','00:00:00',1),(20,'Nota Dinas Telah Di return, ID 201405230003 oleh GIAN/JAB-411/PTR-131','201405230003',7,40,'2014-05-23 16:52:22','00:00:00',1),(21,'Nota Dinas Dengan ID 201405230003 Perlu Di Proses','201405230003',7,37,'2014-05-23 16:53:21','00:00:00',1),(22,'Nota Dinas Dengan ID 201405230003 Perlu Di Proses','201405230003',7,32,'2014-05-23 16:53:57','00:00:00',1),(23,'Nota Dinas Telah Di Reject, ID 201405230003 oleh ANDRE/JAB-410/PTR-130','201405230003',7,40,'2014-05-23 16:54:48','00:00:00',1),(24,'Nota Dinas Telah Di Reject, ID 201405230003 oleh ANDRE/JAB-410/PTR-130','201405230003',7,37,'2014-05-23 16:54:48','00:00:00',1),(25,'Nota Dinas Telah Di Reject, ID 201405230003 oleh ANDRE/JAB-410/PTR-130','201405230003',7,32,'2014-05-23 16:54:48','00:00:00',1),(26,'Nota Dinas Dengan ID 201405230004 Perlu Di Proses','201405230004',7,35,'2014-05-23 17:33:02','00:00:00',1),(27,'Nota Dinas Dengan ID 201405230004 Perlu Di Proses','201405230004',7,31,'2014-05-23 17:34:48','00:00:00',1),(28,'Nota Dinas Masuk,ID 201405230004','201405230004',8,25,'2014-05-23 17:36:04','00:00:00',1),(29,'Nota Dinas Masuk,ID 201405230004','201405230004',8,32,'2014-05-23 17:36:04','00:00:00',1),(30,'Nota Dinas Masuk,ID 201405230004','201405230004',8,37,'2014-05-23 17:36:04','00:00:00',1),(31,'Nota Dinas Dengan ID 201405230005 Perlu Di Proses','201405230005',7,35,'2014-05-23 18:34:08','00:00:00',1),(32,'Nota Dinas Dengan ID 201405230005 Perlu Di Proses','201405230005',7,31,'2014-05-23 18:34:50','00:00:00',1),(33,'Nota Dinas Masuk,ID 201405230005','201405230005',8,32,'2014-05-23 18:35:56','00:00:00',1),(34,'Nota Dinas Dengan ID 201405230006 Perlu Di Proses','201405230006',7,35,'2014-05-23 19:16:55','00:00:00',1),(35,'Nota Dinas Masuk,ID 201405230006','201405230006',8,37,'2014-05-23 19:19:28','00:00:00',1),(36,'Nota Dinas Dengan ID 201405230007 Perlu Di Proses','201405230007',7,35,'2014-05-23 19:22:12','00:00:00',1),(37,'Nota Dinas Masuk,ID 201405230007','201405230007',8,33,'2014-05-23 19:23:13','00:00:00',1),(38,'Nota Dinas Dengan ID 201405230008 Perlu Di Proses','201405230008',7,26,'2014-05-23 19:38:13','00:00:00',1),(39,'Nota Dinas Masuk,ID 201405230008','201405230008',8,31,'2014-05-23 19:39:00','00:00:00',1),(40,'Nota Dinas Dengan ID 201406040001 Perlu Di Proses','201406040001',7,35,'2014-06-04 17:49:13','00:00:00',1),(41,'Nota Dinas Dengan ID 201406040001 Perlu Di Proses','201406040001',7,31,'2014-06-04 18:03:04','00:00:00',1),(42,'Nota Dinas Masuk,ID 201406040001','201406040001',8,32,'2014-06-04 18:04:04','00:00:00',1),(43,'Nota Dinas Masuk,ID 201406040001','201406040001',8,37,'2014-06-04 18:04:04','00:00:00',1),(44,'Nota Dinas Masuk,ID 201406040001 Disposisi dari ANDRE/JAB-410/PTR-130','201406040001',8,40,'2014-06-04 18:07:10','00:00:00',0),(45,'Nota Dinas Masuk,ID 201406040001 Disposisi dari ANDRE/JAB-410/PTR-130','201406040001',8,41,'2014-06-04 18:07:10','00:00:00',1),(46,'Nota Dinas Dengan ID 201406040002 Perlu Di Proses','201406040002',7,31,'2014-06-04 18:19:03','00:00:00',1),(47,'Nota Dinas Masuk,ID 201406040002','201406040002',8,32,'2014-06-04 18:21:17','00:00:00',0);
/*!40000 ALTER TABLE `hrms_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hrms_notification_type`
--

DROP TABLE IF EXISTS `hrms_notification_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrms_notification_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  `type_desc` varchar(50) NOT NULL,
  `type_url` varchar(100) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hrms_notification_type`
--

LOCK TABLES `hrms_notification_type` WRITE;
/*!40000 ALTER TABLE `hrms_notification_type` DISABLE KEYS */;
INSERT INTO `hrms_notification_type` VALUES (1,'SPPD','SPPD Perlu Diproses','index.php/sppd/view_sppd/id/'),(2,'SPPD','SPPD Telah Selesai','index.php/sppd/view_telah_proses_sppd/id/'),(3,'SPPD','SPPD Ditolak','index.php/sppd/view_sedang_proses_sppd/id/'),(4,'BOOK','Book Selesai','index.php/sppd/view_telah_proses_sppd/id/'),(5,'BOOK','Request Book','index.php/reservation/reservation_view/id/'),(6,'SPPD','SPPD Reject','index.php/sppd/view_sedang_proses_sppd/id/'),(7,'NODIN','NODIN PROSES','index.php/notadinas/index/perlu_progress/'),(8,'NODIN ','NODIN INBOX','index.php/notadinas/index/inbox/'),(9,'NODIN','NODIN REJECT','index.php/notadinas/index/reject/'),(10,'NODIN','NODIN RETURN','index.php/notadinas/index/return');
/*!40000 ALTER TABLE `hrms_notification_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hrms_organization`
--

DROP TABLE IF EXISTS `hrms_organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrms_organization` (
  `org_num` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` varchar(20) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_address` varchar(100) NOT NULL,
  `org_work_telp` varchar(25) NOT NULL,
  `org_email` varchar(50) NOT NULL,
  `org_fax` varchar(25) NOT NULL,
  `org_postal_code` varchar(7) NOT NULL,
  `org_sub` int(11) DEFAULT NULL,
  `fiatur_job_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`org_num`),
  KEY `org_sub` (`org_sub`),
  KEY `org_sub_2` (`org_sub`),
  KEY `org_sub_3` (`org_sub`),
  KEY `fiatur_job_num` (`fiatur_job_num`),
  CONSTRAINT `hrms_organization_ibfk_1` FOREIGN KEY (`org_sub`) REFERENCES `hrms_organization` (`org_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hrms_organization_ibfk_2` FOREIGN KEY (`fiatur_job_num`) REFERENCES `hrms_job` (`job_num`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hrms_organization`
--

LOCK TABLES `hrms_organization` WRITE;
/*!40000 ALTER TABLE `hrms_organization` DISABLE KEYS */;
INSERT INTO `hrms_organization` VALUES (8,'9999','ORG','Default','def','022-24234190','rdc@telkom.co.id','022-24234190','40111',NULL,NULL),(10,'2001','TLKM','PT. Telekomunikasi Indonesia','Jln. Gegerkalong Hilir No. 47','022-4574784','info@telkom.co.id','022-4574784','40222',NULL,37),(11,'2002','MTR','Telkom Metranet','Jl. Supratman 45','022-7563432','telkommetra@telkom.co.id','022-3454245','40222',10,46),(12,'2003','SIG','Telkom Sigma','Jalan MH Tamrin 30 Jakarta','021753443','info@telkomsigma.co.id','021445466','40222',10,50),(13,'2004','TT09','telkom testing','bla','0865555','blabla@yahoo.com','022-3454245','78890',NULL,51),(14,'2005','123567','telkom test','Geger kalong','5207719','telkom_gerlong@telkom.co.id','8594628','40231',NULL,54),(15,'2006','PTR-001','POINTER','Jakarta','02199887766','info@pointer.co.id','02111223344','40218',NULL,56),(16,'2007','PTR-110','SDM POINTER','JAKARTA','02199887766','info@pointer.co.id','02111223344','40218',15,56),(17,'2008','PTR-111','HR MANAGEMENT','JAKARTA','02199887766','info@pointer.co.id','02111223344','40218',16,58),(18,'2009','PTR-112','HR TRAINING','JAKARTA','02199887766','info@pointer.co.id','02111223344','40218',16,59),(19,'2010','PTR-120','MARKETING POINTER','JAKARTA','02199887766','info@pointer.co.id','02111223344','40218',15,60),(20,'2011','PTR-121','PROMOSI','JAKARTA','02199887766','info@pointer.co.id','02111223344','40218',19,61),(21,'2012','PTR-122','KEUANGAN','JAKARTA','02199887766','info@pointer.co.id','02111223344','40218',19,62),(22,'2013','PTR-130','ALPRO POINTER','JAKARTA','02199887766','info@pointer.co.id','02111223344','40218',15,63),(23,'2014','PTR-131','PENGEMBANGAN','JAKARTA','02199887766','info@pointer.co.id','02111223344','40217',22,64),(24,'2015','PTR-132','QA','JAKARTA','02199887766','info@pointer.co.id','02111223344','40218',22,65);
/*!40000 ALTER TABLE `hrms_organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hrms_role_user`
--

DROP TABLE IF EXISTS `hrms_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrms_role_user` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(40) NOT NULL,
  `role_description` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hrms_role_user`
--

LOCK TABLES `hrms_role_user` WRITE;
/*!40000 ALTER TABLE `hrms_role_user` DISABLE KEYS */;
INSERT INTO `hrms_role_user` VALUES (1,'Admin','System Administrator'),(2,'User','User with standard features'),(3,'Admin Reservation','Make Reservation for SPPD');
/*!40000 ALTER TABLE `hrms_role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hrms_user`
--

DROP TABLE IF EXISTS `hrms_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hrms_user` (
  `emp_id` int(11) NOT NULL,
  `emp_username` varchar(30) NOT NULL,
  `emp_password` varchar(100) NOT NULL,
  `emp_role` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL,
  UNIQUE KEY `emp_username` (`emp_username`),
  KEY `emp_num` (`emp_id`),
  KEY `emp_role` (`emp_role`),
  KEY `emp_id` (`emp_id`),
  KEY `emp_id_2` (`emp_id`),
  CONSTRAINT `hrms_user_ibfk_1` FOREIGN KEY (`emp_role`) REFERENCES `hrms_role_user` (`role_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `hrms_user_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hrms_user`
--

LOCK TABLES `hrms_user` WRITE;
/*!40000 ALTER TABLE `hrms_user` DISABLE KEYS */;
INSERT INTO `hrms_user` VALUES (25,'1000025','f85772ed39dfe9b374d86d12d4805156',NULL,1),(26,'1000026','c96f230a463e8acd768e1c9fc43defc1',NULL,1),(31,'1000027','827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(32,'1000028','827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(33,'1000029','2f25b940dc586c83b766de9142e5cf29',NULL,1),(34,'1000030','827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(35,'1000031','827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(36,'1000032','827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(37,'1000033','827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(38,'1000034','827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(39,'1000035','a685418c705a5da1156e476f399359b6',NULL,1),(40,'1000036','18a96165d6f87d8ad7d87300f0a61840',NULL,1),(41,'1000037','10271f9e8b3882fa01b409dc7873646d',NULL,1),(1,'admin','21232f297a57a5a743894a0e4a801fc3',1,1),(2,'reservation','827ccb0eea8a706c4c34a16891f84e7b',3,1);
/*!40000 ALTER TABLE `hrms_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `nota_archive_view`
--

DROP TABLE IF EXISTS `nota_archive_view`;
/*!50001 DROP VIEW IF EXISTS `nota_archive_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `nota_archive_view` (
  `nota_id` varchar(20),
  `nota_number` varchar(255),
  `nota_perihal` varchar(255),
  `nota_isi` text,
  `kode_masalah` varchar(10),
  `creator` varchar(100),
  `sender` varchar(100),
  `forwarder` varchar(100),
  `nota_read_status` tinyint(4),
  `emp_num` int(11),
  `nota_date` date,
  `create_date` datetime
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `nota_comment`
--

DROP TABLE IF EXISTS `nota_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_id` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `emp_num` int(11) NOT NULL,
  `status_disposisi` tinyint(4) NOT NULL DEFAULT '0',
  `exam_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `nota_comment_fk` (`nota_id`),
  KEY `nota_comment_fk2` (`emp_num`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_comment`
--

LOCK TABLES `nota_comment` WRITE;
/*!40000 ALTER TABLE `nota_comment` DISABLE KEYS */;
INSERT INTO `nota_comment` VALUES (1,'201405230001','Mohon','2014-05-23 09:23:19',33,0,NULL),(2,'201405230001','OK','2014-05-23 09:25:14',26,0,NULL),(3,'201405230002','Mohon','2014-05-23 09:29:18',39,0,NULL),(4,'201405230002','Ok','2014-05-23 09:31:41',35,0,NULL),(5,'201405230002','Ok','2014-05-23 09:33:15',31,0,NULL),(6,'201405230003','Mohon','2014-05-23 09:50:52',40,0,NULL),(7,'201405230003','Tolong diperbaiki','2014-05-23 09:52:46',37,0,NULL),(8,'201405230003','Sudah diperbaiki','2014-05-23 09:53:45',40,0,NULL),(9,'201405230003','Ok','2014-05-23 09:54:21',37,0,NULL),(10,'201405230003','Anggaran habis','2014-05-23 09:55:12',32,0,NULL),(11,'201405230004','Mohon','2014-05-23 10:33:26',39,0,NULL),(12,'201405230004','Ok','2014-05-23 10:35:13',35,0,NULL),(13,'201405230004','Ok','2014-05-23 10:36:29',31,0,NULL),(14,'201405230005','Mohon','2014-05-23 11:34:32',39,0,NULL),(15,'201405230005','Ok','2014-05-23 11:35:15',35,0,NULL),(16,'201405230005','Ok','2014-05-23 11:36:20',31,0,NULL),(17,'201405230006','Mohon','2014-05-23 12:17:19',39,0,NULL),(18,'201405230006','Ok','2014-05-23 12:19:53',35,0,NULL),(19,'201405230007','Mohon','2014-05-23 12:22:36',39,0,NULL),(20,'201405230007','Ok','2014-05-23 12:23:37',35,0,NULL),(21,'201405230008','Mohon','2014-05-23 12:38:37',33,0,NULL),(22,'201405230008','Ok','2014-05-23 12:39:25',26,0,NULL),(23,'201406040001','Mohon','2014-06-04 10:49:38',39,0,NULL),(24,'201406040001','Mohon','2014-06-04 11:03:28',35,0,NULL),(25,'201406040001','Ok','2014-06-04 11:04:29',31,0,NULL),(26,'201406040002','test','2014-06-04 11:19:27',39,0,NULL),(27,'201406040002','Ok','2014-06-04 11:21:42',31,0,NULL);
/*!40000 ALTER TABLE `nota_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `nota_custom_view`
--

DROP TABLE IF EXISTS `nota_custom_view`;
/*!50001 DROP VIEW IF EXISTS `nota_custom_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `nota_custom_view` (
  `mapping_id` int(11),
  `nota_id` varchar(20),
  `nota_number` varchar(255),
  `nota_perihal` varchar(255),
  `nota_isi` text,
  `nota_creator_num` int(11),
  `nota_sender_num` int(11),
  `nota_disposisi_num` int(11),
  `nota_read_status` tinyint(4),
  `nota_date` date,
  `nota_kode_masalah` varchar(10),
  `creator` varchar(100),
  `sender` varchar(100),
  `forwarder` varchar(100),
  `folder_name` varchar(45),
  `emp_num` int(11),
  `create_date` datetime,
  `segera` tinyint(1)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `nota_data`
--

DROP TABLE IF EXISTS `nota_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_data` (
  `nota_id` varchar(20) NOT NULL,
  `nota_number` varchar(255) NOT NULL,
  `nota_perihal` varchar(255) NOT NULL,
  `nota_isi` text NOT NULL,
  `nota_creator_num` int(11) NOT NULL,
  `nota_sender_num` int(11) NOT NULL,
  `nota_disposisi_num` int(11) DEFAULT NULL,
  `nota_read_status` tinyint(4) NOT NULL DEFAULT '0',
  `nota_date` date NOT NULL,
  `nota_kode_masalah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`nota_id`),
  KEY `nota_data_fk` (`nota_creator_num`),
  KEY `nota_data_fk2` (`nota_sender_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_data`
--

LOCK TABLES `nota_data` WRITE;
/*!40000 ALTER TABLE `nota_data` DISABLE KEYS */;
INSERT INTO `nota_data` VALUES ('201405230001',' 1 / PTR-110 / POINTER / 2014','Pemanggilan Training Budaya Perusahaan','<ol>\r\n	<li>Menunjuk:\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li>CSS 2012-2016 pada strategic initiative no 3 mengenai solusi Integrated Telkom Group</li>\r\n		<li>Ecosystem dimana Tourism Ecosystem merupakan strategi pertama untuk mengembangkan ekosistem bisnis.</li>\r\n		<li>Hasil riset Frost &amp; Sullivan tentang Ecosystem Service Strategy khususnya Tourism Ecosystem Go To Market Strategy yang menyampaikan bahwa pasar yang atraktif adalah booking portal, electronic directory, call center, booking software on cloud, online reservation &amp; web portal and cloud dan mobile portal &amp; apps.</li>\r\n		<li>Pengembangan Tourism Ecosystem oleh R&amp;D Center melalui program inkubasi eTourism yang telah disetujui oleh ITSS. Salah satu elemen dari Tourism Ecosystem tersebut adalah portal Hi Indonesia yang melayani kebutuhan turis dalam pemesanan tiket pesawat dan voucher hotel.</li>\r\n		<li>Arsitektur Hi Indonesia yang menempatkan SDP sebagai enabler untuk layanan Payment System dan Otentikasi User berbasis Telkom ID.</li>\r\n		<li>Hasil testing integrasi Hi-Indonesia Development dengan SDP Development terlampir.</li>\r\n	</ol>\r\n	</li>\r\n	<li>Berdasarkan hal tersebut di atas, maka tim Hi Indonesia membutuhkan bantuan, dukungan dan informasinya terkait dengan hal berikut:\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li>Pembukaan akses ke server SDP Production dari server Hi-Indonesia Production di Sigma sebagai berikut:\r\n		<ol style=\"list-style-type:lower-roman\">\r\n			<li>Hi- Indonesia Web Server &nbsp;( 192.168.6.15 / 180.250.80.51:60)</li>\r\n			<li>Hi Bali Web Server &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (&nbsp;192.168.6.14 / 180.250.80.51:50)</li>\r\n			<li>e-Tourism SocMed-SVR &nbsp; (192.168.6.13 / 180.250.80.51:40)</li>\r\n		</ol>\r\n		</li>\r\n		<li>Pembukaan koneksi dari server Hi-Indonesia Production di Sigma ke SDP Production melalui jalur Intranet Telkom. Sesuai informasi Sigma, saat ini link tersebut sudah tersedia antara Lembong - BSD namun dari sisi Telkom perlu dilakukan pembukaan akses dari server-server Hi-Indonesia Production tersebut ke SDP Production.</li>\r\n	</ol>\r\n	</li>\r\n	<li>Untuk koordinasi lebih lanjut dapat menghubungi Sdr. Monica Sanjaya (moccajaya@telkom.co.id/081221314444).</li>\r\n	<li>Demikian disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</li>\r\n</ol>\r\n',0,26,0,0,'2014-05-23','INS'),('201405230002',' 2 / PTR-120 / POINTER / 2014','Rapat Strategi Marketing Produk Pointer','<ol>\r\n	<li>Menunjuk:\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li>CSS 2012-2016 pada strategic initiative no 3 mengenai solusi Integrated Telkom Group</li>\r\n		<li>Ecosystem dimana Tourism Ecosystem merupakan strategi pertama untuk mengembangkan ekosistem bisnis.</li>\r\n		<li>Hasil riset Frost &amp; Sullivan tentang Ecosystem Service Strategy khususnya Tourism Ecosystem Go To Market Strategy yang menyampaikan bahwa pasar yang atraktif adalah booking portal, electronic directory, call center, booking software on cloud, online reservation &amp; web portal and cloud dan mobile portal &amp; apps.</li>\r\n		<li>Pengembangan Tourism Ecosystem oleh R&amp;D Center melalui program inkubasi eTourism yang telah disetujui oleh ITSS. Salah satu elemen dari Tourism Ecosystem tersebut adalah portal Hi Indonesia yang melayani kebutuhan turis dalam pemesanan tiket pesawat dan voucher hotel.</li>\r\n		<li>Arsitektur Hi Indonesia yang menempatkan SDP sebagai enabler untuk layanan Payment System dan Otentikasi User berbasis Telkom ID.</li>\r\n		<li>Hasil testing integrasi Hi-Indonesia Development dengan SDP Development terlampir.</li>\r\n	</ol>\r\n	</li>\r\n	<li>Berdasarkan hal tersebut di atas, maka tim Hi Indonesia membutuhkan bantuan, dukungan dan informasinya terkait dengan hal berikut:\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li>Pembukaan akses ke server SDP Production dari server Hi-Indonesia Production di Sigma sebagai berikut:\r\n		<ol style=\"list-style-type:lower-roman\">\r\n			<li>Hi- Indonesia Web Server &nbsp;( 192.168.6.15 / 180.250.80.51:60)</li>\r\n			<li>Hi Bali Web Server &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (&nbsp;192.168.6.14 / 180.250.80.51:50)</li>\r\n			<li>e-Tourism SocMed-SVR &nbsp; (192.168.6.13 / 180.250.80.51:40)</li>\r\n		</ol>\r\n		</li>\r\n		<li>Pembukaan koneksi dari server Hi-Indonesia Production di Sigma ke SDP Production melalui jalur Intranet Telkom. Sesuai informasi Sigma, saat ini link tersebut sudah tersedia antara Lembong - BSD namun dari sisi Telkom perlu dilakukan pembukaan akses dari server-server Hi-Indonesia Production tersebut ke SDP Production.</li>\r\n	</ol>\r\n	</li>\r\n	<li>Untuk koordinasi lebih lanjut dapat menghubungi Sdr. Eka Kelana (kelanaeka@telkom.co.id/081221315185).</li>\r\n	<li>Demikian disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</li>\r\n</ol>\r\n',0,31,0,0,'2014-05-23','INS'),('201405230003','','Permohonan Ijin Perjalanan Dinas LN','<p>Minta ijin bosss. Sudah dijinkan</p>\r\n',0,32,0,0,'2014-05-23','INS'),('201405230004',' 3 / PTR-120 / POINTER / 2014','Penyelenggaraan Kegiatan Marketing','<p>Ayo marketing bersama</p>\r\n',0,31,0,0,'2014-05-23','INS'),('201405230005',' 4 / PTR-120 / POINTER / 2014','test','<p>test</p>\r\n',39,31,0,0,'2014-05-23','INS'),('201405230006',' 5 / PTR-121 / POINTER / 2014','test','<p>test</p>\r\n',39,35,0,0,'2014-05-23','INS'),('201405230007',' 6 / PTR-121 / POINTER / 2014 RHS-PRIBADI','test','<p>test</p>\r\n',0,35,0,0,'2014-05-23','INS'),('201405230008',' 7 / PTR-110 / POINTER / 2014','Test','<p>Test</p>\r\n',33,26,0,0,'2014-05-23','INS'),('201406040001',' 8 / PTR-120 / POINTER / 2014','Test','<p>1.&nbsp;&nbsp; &nbsp;Merujuk kepada Program Kerja tahun 2014, Bidang Digital Solution Ecosystem c.q. Lab. Digital Supply Chain &amp; Utilities merencanakan untuk melakukan pengembangan fase 2 aplikasi Integrated Smart Metering (ISM). Pengembangan fase 2 aplikasi ISM ini meliputi Interkoneksi modul aplikasi Top Up ISM dengan sistem pembayaran diantaranya adalah Telkomsel T-cash dan Finnet, pembuatan modul AMR untuk pelanggan Post Paid sesuai requirement PLN Batam (Bright) dan Sumatra Utara serta pengembangan modul-modul tambahan sebagai berikut:<br />\r\n&nbsp; &nbsp; a. Customer Relationship Management<br />\r\n&nbsp;&nbsp; &nbsp;b. Business Intelligent<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Geographical Information System<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Load Forecasting<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Network Analysis<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Asset Management<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Grid Structure IS<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;OAM<br />\r\n&nbsp;&nbsp; &nbsp;Untuk keperluan ini diperlukan pengadaan jasa pengembangan fase 2 aplikasi ISM.&nbsp;<br />\r\n2.&nbsp;&nbsp; &nbsp;Sehubungan dengan hal tersebut di atas kami mendelegasikan wewenang untuk meng-create PR, proses procurement, serta proses-proses administrasi lainya untuk aktifitas pengadaan jasa pengembangan ini dimana seluruh prosesnya kami harapkan selesai pada TW IV 2014.&nbsp;<br />\r\n3.&nbsp;&nbsp; &nbsp;Akun biaya yang dialokasikan untuk aktifitas ini menggunakan alokasi RKAP dengan nilai sebesar Rp. 98.700.000, detail sebagai berikut:&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;a.&nbsp;&nbsp; &nbsp;GL account: 51508001&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;b.&nbsp;&nbsp; &nbsp;Activity code: 4ID566&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;c.&nbsp;&nbsp; &nbsp;Cost Center ID: T761F09&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;d.&nbsp;&nbsp; &nbsp;Periode: &nbsp;Desember 2014&nbsp;<br />\r\n4.&nbsp;&nbsp; &nbsp;Untuk proses koordinasi pengadaan ini dapat menghubungi Sdr. Eka Kelana melalui email: eka_k@telkom.co.id.&nbsp;<br />\r\n5.&nbsp;&nbsp; &nbsp;Demikian disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>\r\n\r\n<p>&nbsp;</p>\r\n',0,31,0,0,'2014-06-04','INS'),('201406040002',' 1 \\ 2014','test','<p>test</p>\r\n',39,31,0,0,'2014-06-04','INS');
/*!40000 ALTER TABLE `nota_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_default_code`
--

DROP TABLE IF EXISTS `nota_default_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_default_code` (
  `idnota_default_code` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(45) NOT NULL,
  `values` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idnota_default_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_default_code`
--

LOCK TABLES `nota_default_code` WRITE;
/*!40000 ALTER TABLE `nota_default_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota_default_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `nota_draft_view`
--

DROP TABLE IF EXISTS `nota_draft_view`;
/*!50001 DROP VIEW IF EXISTS `nota_draft_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `nota_draft_view` (
  `nota_id` varchar(20),
  `nota_number` varchar(255),
  `nota_perihal` varchar(255),
  `nota_isi` text,
  `kode_masalah` varchar(10),
  `creator` varchar(100),
  `forwarder` varchar(100),
  `nota_read_status` tinyint(4),
  `emp_num` int(11),
  `nota_date` date,
  `create_date` datetime
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `nota_examine`
--

DROP TABLE IF EXISTS `nota_examine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_examine` (
  `examine_id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_id` varchar(20) NOT NULL,
  `examiner_id` int(11) NOT NULL,
  `exam_queue` int(11) NOT NULL,
  `exam_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ok_status` tinyint(4) NOT NULL DEFAULT '0',
  `return_status` tinyint(4) NOT NULL DEFAULT '0',
  `reject_status` tinyint(4) NOT NULL DEFAULT '0',
  `read_status` tinyint(4) NOT NULL DEFAULT '0',
  `sent_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` enum('AKTIF','TIDAK AKTIF') NOT NULL DEFAULT 'TIDAK AKTIF',
  PRIMARY KEY (`examine_id`),
  KEY `fk_nota_examine` (`examiner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_examine`
--

LOCK TABLES `nota_examine` WRITE;
/*!40000 ALTER TABLE `nota_examine` DISABLE KEYS */;
INSERT INTO `nota_examine` VALUES (1,'201405230001',33,0,'2014-05-23 09:24:49',1,0,0,1,1,'AKTIF'),(2,'201405230001',26,1,'2014-05-23 09:24:49',1,0,0,1,1,'AKTIF'),(3,'201405230002',39,0,'2014-05-23 09:32:50',1,0,0,1,1,'AKTIF'),(4,'201405230002',35,1,'2014-05-23 09:32:50',1,0,0,1,1,'AKTIF'),(5,'201405230002',31,2,'2014-05-23 09:32:50',1,0,0,1,1,'AKTIF'),(6,'201405230003',40,0,'2014-05-23 09:55:53',1,0,1,1,0,'AKTIF'),(7,'201405230003',37,1,'2014-05-23 12:15:04',1,0,1,1,0,'AKTIF'),(8,'201405230003',32,2,'2014-05-23 09:54:53',0,0,1,1,0,'AKTIF'),(9,'201405230004',39,0,'2014-05-23 10:36:04',1,0,0,1,1,'AKTIF'),(10,'201405230004',35,1,'2014-05-23 10:36:04',1,0,0,1,1,'AKTIF'),(11,'201405230004',31,2,'2014-05-23 10:36:04',1,0,0,1,1,'AKTIF'),(12,'201405230005',39,0,'2014-05-23 11:35:56',1,0,0,1,1,'AKTIF'),(13,'201405230005',35,1,'2014-05-23 11:35:56',1,0,0,1,1,'AKTIF'),(14,'201405230005',31,2,'2014-05-23 11:35:56',1,0,0,1,1,'AKTIF'),(15,'201405230006',39,0,'2014-05-23 12:19:28',1,0,0,1,1,'AKTIF'),(16,'201405230006',35,1,'2014-05-23 12:19:28',1,0,0,1,1,'AKTIF'),(17,'201405230007',39,0,'2014-05-23 12:23:12',1,0,0,1,1,'AKTIF'),(18,'201405230007',35,1,'2014-05-23 12:23:12',1,0,0,1,1,'AKTIF'),(19,'201405230008',33,0,'2014-05-23 12:39:00',1,0,0,1,1,'AKTIF'),(20,'201405230008',26,1,'2014-05-23 12:39:00',1,0,0,1,1,'AKTIF'),(22,'201406040001',39,0,'2014-06-04 11:04:04',1,0,0,1,1,'AKTIF'),(23,'201406040001',35,1,'2014-06-04 11:04:04',1,0,0,1,1,'AKTIF'),(24,'201406040001',31,2,'2014-06-04 11:04:04',1,0,0,1,1,'AKTIF'),(25,'201406040002',39,0,'2014-06-04 11:21:17',1,0,0,1,1,'AKTIF'),(26,'201406040002',31,1,'2014-06-04 11:21:17',1,0,0,1,1,'AKTIF');
/*!40000 ALTER TABLE `nota_examine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_folder`
--

DROP TABLE IF EXISTS `nota_folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_folder` (
  `folder_id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(45) NOT NULL,
  `emp_num` int(11) NOT NULL,
  PRIMARY KEY (`folder_id`),
  KEY `nota_folder_fk` (`emp_num`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_folder`
--

LOCK TABLES `nota_folder` WRITE;
/*!40000 ALTER TABLE `nota_folder` DISABLE KEYS */;
INSERT INTO `nota_folder` VALUES (104,'inbox',1),(105,'progress',1),(106,'draft',1),(107,'sent',1),(108,'inbox',2),(109,'progress',2),(110,'draft',2),(111,'sent',2),(112,'inbox',24),(113,'progress',24),(114,'draft',24),(115,'sent',24),(116,'inbox',25),(117,'progress',25),(118,'draft',25),(119,'sent',25),(120,'inbox',26),(121,'progress',26),(122,'draft',26),(123,'sent',26),(129,'inbox',31),(130,'progress',31),(131,'draft',31),(132,'sent',31),(133,'archive',31),(134,'inbox',32),(135,'progress',32),(136,'draft',32),(137,'sent',32),(138,'archive',32),(139,'inbox',33),(140,'progress',33),(141,'draft',33),(142,'sent',33),(143,'archive',33),(144,'inbox',34),(145,'progress',34),(146,'draft',34),(147,'sent',34),(148,'archive',34),(149,'inbox',35),(150,'progress',35),(151,'draft',35),(152,'sent',35),(153,'archive',35),(154,'inbox',36),(155,'progress',36),(156,'draft',36),(157,'sent',36),(158,'archive',36),(159,'inbox',37),(160,'progress',37),(161,'draft',37),(162,'sent',37),(163,'archive',37),(164,'inbox',38),(165,'progress',38),(166,'draft',38),(167,'sent',38),(168,'archive',38),(169,'inbox',39),(170,'progress',39),(171,'draft',39),(172,'sent',39),(173,'archive',39),(174,'inbox',40),(175,'progress',40),(176,'draft',40),(177,'sent',40),(178,'archive',40),(179,'inbox',41),(180,'progress',41),(181,'draft',41),(182,'sent',41),(183,'archive',41);
/*!40000 ALTER TABLE `nota_folder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_folder_mapping`
--

DROP TABLE IF EXISTS `nota_folder_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_folder_mapping` (
  `mapping_id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_id` varchar(20) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `archive_status` tinyint(4) NOT NULL DEFAULT '0',
  `nota_create_date` datetime NOT NULL,
  PRIMARY KEY (`mapping_id`),
  KEY `nota_folder_mappning_fk` (`nota_id`),
  KEY `nota_folder_mapping_fk2` (`folder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_folder_mapping`
--

LOCK TABLES `nota_folder_mapping` WRITE;
/*!40000 ALTER TABLE `nota_folder_mapping` DISABLE KEYS */;
INSERT INTO `nota_folder_mapping` VALUES (1,'201405230001',121,0,'2014-05-23 16:22:55'),(2,'201405230001',129,0,'2014-05-23 16:24:49'),(3,'201405230001',134,0,'2014-05-23 16:24:49'),(4,'201405230001',153,0,'2014-05-23 16:24:49'),(5,'201405230001',154,0,'2014-05-23 16:24:49'),(6,'201405230001',159,0,'2014-05-23 16:24:49'),(7,'201405230001',164,0,'2014-05-23 16:24:49'),(8,'201405230001',169,0,'2014-05-23 16:24:49'),(9,'201405230001',178,0,'2014-05-23 16:24:49'),(10,'201405230001',183,0,'2014-05-23 16:24:49'),(11,'201405230001',142,0,'2014-05-23 16:24:49'),(12,'201405230001',0,0,'2014-05-23 16:24:49'),(13,'201405230002',150,0,'2014-05-23 16:28:54'),(14,'201405230002',130,0,'2014-05-23 16:28:54'),(15,'201405230002',134,0,'2014-05-23 16:32:50'),(16,'201405230002',159,0,'2014-05-23 16:32:50'),(17,'201405230002',172,0,'2014-05-23 16:32:51'),(18,'201405230002',153,0,'2014-05-23 16:32:51'),(19,'201405230002',132,0,'2014-05-23 16:32:51'),(20,'201405230002',164,0,'2014-05-23 16:39:49'),(21,'201405230002',169,0,'2014-05-23 16:42:02'),(22,'201405230002',178,0,'2014-05-23 16:42:02'),(23,'201405230002',183,0,'2014-05-23 16:42:02'),(24,'201405230003',160,0,'2014-05-23 16:50:28'),(25,'201405230003',135,0,'2014-05-23 16:50:28'),(26,'201405230004',150,0,'2014-05-23 17:33:02'),(27,'201405230004',130,0,'2014-05-23 17:33:02'),(28,'201405230004',116,0,'2014-05-23 17:36:04'),(29,'201405230004',134,0,'2014-05-23 17:36:04'),(30,'201405230004',159,0,'2014-05-23 17:36:04'),(31,'201405230004',172,0,'2014-05-23 17:36:04'),(32,'201405230004',153,0,'2014-05-23 17:36:05'),(33,'201405230004',132,0,'2014-05-23 17:36:05'),(34,'201405230005',150,0,'2014-05-23 18:34:08'),(35,'201405230005',130,0,'2014-05-23 18:34:08'),(36,'201405230005',134,0,'2014-05-23 18:35:56'),(37,'201405230005',172,0,'2014-05-23 18:35:56'),(38,'201405230005',152,0,'2014-05-23 18:35:56'),(39,'201405230005',132,0,'2014-05-23 18:35:56'),(43,'201405230005',184,0,'2014-05-23 18:54:00'),(44,'201405230006',150,0,'2014-05-23 19:16:55'),(45,'201405230006',159,0,'2014-05-23 19:19:28'),(46,'201405230006',172,0,'2014-05-23 19:19:28'),(47,'201405230006',152,0,'2014-05-23 19:19:28'),(48,'201405230007',150,0,'2014-05-23 19:22:12'),(49,'201405230007',139,0,'2014-05-23 19:23:12'),(50,'201405230007',172,0,'2014-05-23 19:23:13'),(51,'201405230007',152,0,'2014-05-23 19:23:13'),(52,'201405230008',121,0,'2014-05-23 19:38:13'),(53,'201405230008',129,0,'2014-05-23 19:39:00'),(54,'201405230008',142,0,'2014-05-23 19:39:00'),(55,'201405230008',123,0,'2014-05-23 19:39:00'),(57,'201406040001',150,0,'2014-06-04 17:49:13'),(58,'201406040001',130,0,'2014-06-04 17:49:14'),(59,'201406040001',134,0,'2014-06-04 18:04:04'),(60,'201406040001',159,0,'2014-06-04 18:04:04'),(61,'201406040001',172,0,'2014-06-04 18:04:05'),(62,'201406040001',152,0,'2014-06-04 18:04:05'),(63,'201406040001',132,0,'2014-06-04 18:04:05'),(64,'201406040001',174,0,'2014-06-04 18:07:10'),(65,'201406040001',179,0,'2014-06-04 18:07:10'),(67,'201406040002',130,0,'2014-06-04 18:19:03'),(68,'201406040002',134,0,'2014-06-04 18:21:17'),(69,'201406040002',172,0,'2014-06-04 18:21:17'),(70,'201406040002',132,0,'2014-06-04 18:21:17');
/*!40000 ALTER TABLE `nota_folder_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_format_code`
--

DROP TABLE IF EXISTS `nota_format_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_format_code` (
  `id_format_code` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) NOT NULL,
  `tipe` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  `skip_delimiter` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_format_code`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_format_code`
--

LOCK TABLES `nota_format_code` WRITE;
/*!40000 ALTER TABLE `nota_format_code` DISABLE KEYS */;
INSERT INTO `nota_format_code` VALUES (110,0,'delimiter','\\',1),(111,1,'auto increment','',0),(112,2,'tahun','',0);
/*!40000 ALTER TABLE `nota_format_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `nota_inbox_view`
--

DROP TABLE IF EXISTS `nota_inbox_view`;
/*!50001 DROP VIEW IF EXISTS `nota_inbox_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `nota_inbox_view` (
  `nota_id` varchar(20),
  `nota_number` varchar(255),
  `nota_perihal` varchar(255),
  `nota_isi` text,
  `nota_creator_num` int(11),
  `nota_sender_num` int(11),
  `nota_disposisi_num` int(11),
  `nota_read_status` tinyint(4),
  `nota_date` date,
  `nota_kode_masalah` varchar(10),
  `creator` varchar(100),
  `sender` varchar(100),
  `forwarder` varchar(100),
  `emp_num` int(11),
  `create_date` datetime,
  `segera` tinyint(1)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `nota_kode_masalah`
--

DROP TABLE IF EXISTS `nota_kode_masalah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_kode_masalah` (
  `id_kode_masalah` int(11) NOT NULL,
  `kode_masalah` varchar(10) NOT NULL,
  `masalah` varchar(45) NOT NULL,
  PRIMARY KEY (`id_kode_masalah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_kode_masalah`
--

LOCK TABLES `nota_kode_masalah` WRITE;
/*!40000 ALTER TABLE `nota_kode_masalah` DISABLE KEYS */;
INSERT INTO `nota_kode_masalah` VALUES (1,'INS','Intruksi'),(2,'KEP','Keputusan'),(3,'MLM','Maklumat/Pengumuman'),(4,'EDR','Edaran'),(5,'PER','Pernyataan'),(6,'TGS','Tugas'),(7,'KET','Keterangan'),(8,'REK','Rekomendasi');
/*!40000 ALTER TABLE `nota_kode_masalah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_lampiran`
--

DROP TABLE IF EXISTS `nota_lampiran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_lampiran` (
  `lampiran_id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_id` varchar(20) NOT NULL,
  `lampiran_link` varchar(100) NOT NULL,
  `lampiran_name` varchar(45) NOT NULL,
  PRIMARY KEY (`lampiran_id`),
  KEY `nota_lampiran_fk` (`nota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_lampiran`
--

LOCK TABLES `nota_lampiran` WRITE;
/*!40000 ALTER TABLE `nota_lampiran` DISABLE KEYS */;
INSERT INTO `nota_lampiran` VALUES (1,'201405230001','2014052300012.docx','teguran asimetris I.docx'),(2,'201405230001','2014052300012.xls','elti.xls'),(3,'201405230001','2014052300012.pdf','boardingpasssby30des2013.pdf'),(4,'201405230002','2014052300021.xls','elti.xls'),(5,'201406040001','201406040001.xls','anggaran.xls');
/*!40000 ALTER TABLE `nota_lampiran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_nomor`
--

DROP TABLE IF EXISTS `nota_nomor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_nomor` (
  `nota_id` varchar(50) NOT NULL,
  `format_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_nomor`
--

LOCK TABLES `nota_nomor` WRITE;
/*!40000 ALTER TABLE `nota_nomor` DISABLE KEYS */;
INSERT INTO `nota_nomor` VALUES ('201405230001',106,'1'),('201405230001',107,'PTR-110'),('201405230001',108,'POINTER'),('201405230001',109,'2014'),('201405230002',106,'2'),('201405230002',107,'PTR-120'),('201405230002',108,'POINTER'),('201405230002',109,'2014'),('201405230004',106,'3'),('201405230004',107,'PTR-120'),('201405230004',108,'POINTER'),('201405230004',109,'2014'),('201405230005',106,'4'),('201405230005',107,'PTR-120'),('201405230005',108,'POINTER'),('201405230005',109,'2014'),('201405230006',106,'5'),('201405230006',107,'PTR-121'),('201405230006',108,'POINTER'),('201405230006',109,'2014'),('201405230007',106,'6'),('201405230007',107,'PTR-121'),('201405230007',108,'POINTER'),('201405230007',109,'2014'),('201405230008',106,'7'),('201405230008',107,'PTR-110'),('201405230008',108,'POINTER'),('201405230008',109,'2014'),('201406040001',106,'8'),('201406040001',107,'PTR-120'),('201406040001',108,'POINTER'),('201406040001',109,'2014'),('201406040002',111,'1'),('201406040002',112,'2014');
/*!40000 ALTER TABLE `nota_nomor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_options`
--

DROP TABLE IF EXISTS `nota_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_options` (
  `nota_id` varchar(20) NOT NULL,
  `segera` tinyint(1) NOT NULL,
  `return_receipt` tinyint(1) NOT NULL,
  `document_options` enum('DOKUMEN BIASA','DOKUMEN RAHASIA','DOKUMEN RAHASIA & PRIBADI') NOT NULL,
  `jabatan_pengirim` varchar(50) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `nik_pengirim` varchar(50) NOT NULL,
  `unit_pengirim` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_options`
--

LOCK TABLES `nota_options` WRITE;
/*!40000 ALTER TABLE `nota_options` DISABLE KEYS */;
INSERT INTO `nota_options` VALUES ('201405230001',0,0,'DOKUMEN BIASA','GM SDM','IRWAN IRWAN','1000026','SDM POINTER','Bandung'),('201405230002',0,0,'DOKUMEN BIASA','GM MARKETING','REFAD REFAD','1000027','MARKETING POINTER','Bandung'),('201405230003',0,0,'DOKUMEN BIASA','GM ALPRO','ANDRE ANDRE','1000028','ALPRO POINTER','Bandung'),('201405230004',0,0,'DOKUMEN BIASA','GM MARKETING','REFAD REFAD','1000027','MARKETING POINTER','Bandung'),('201405230005',0,0,'DOKUMEN BIASA','GM MARKETING','REFAD REFAD','1000027','MARKETING POINTER','Bandung'),('201405230006',1,0,'DOKUMEN BIASA','MANAGER PROMOSI TELKOM','ALVIN RESMANA','1000031','PROMOSI','Bandung'),('201405230007',0,0,'DOKUMEN RAHASIA & PRIBADI','MANAGER PROMOSI','ALVIN RESMANA','1000031','PROMOSI','Bandung'),('201405230008',0,0,'DOKUMEN BIASA','GM SDM Telkom','IRWAN IRWAN','1000026','SDM POINTER','Jakarta'),('<br /><b>Fatal error',0,0,'DOKUMEN BIASA','GM MARKETING','REFAD REFAD','1000027','MARKETING POINTER','Jakarta'),('201406040001',0,0,'DOKUMEN BIASA','GM MARKETING','REFAD REFAD','1000027','MARKETING POINTER','Bandung'),('201406040002',0,0,'DOKUMEN BIASA','GM MARKETING','REFAD REFAD','1000027','MARKETING POINTER','Bandung');
/*!40000 ALTER TABLE `nota_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `nota_progress_view`
--

DROP TABLE IF EXISTS `nota_progress_view`;
/*!50001 DROP VIEW IF EXISTS `nota_progress_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `nota_progress_view` (
  `examine_id` int(11),
  `exam_date` timestamp,
  `exam_queue` int(11),
  `nota_id` varchar(20),
  `nota_perihal` varchar(255),
  `nota_date` date,
  `examiner_id` int(11),
  `emp_firstname` varchar(30),
  `ok_status` tinyint(4),
  `return_status` tinyint(4),
  `reject_status` tinyint(4),
  `read_status` tinyint(4),
  `sent_status` tinyint(4),
  `status` enum('AKTIF','TIDAK AKTIF'),
  `segera` tinyint(1)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `nota_receiver`
--

DROP TABLE IF EXISTS `nota_receiver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_receiver` (
  `receiver_id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_id` varchar(20) NOT NULL,
  `emp_num` int(11) NOT NULL,
  `cc_status` int(11) NOT NULL DEFAULT '0',
  `disposisi_status` int(11) NOT NULL DEFAULT '0',
  `nota_tindakan` varchar(255) NOT NULL,
  `emp_from` int(11) NOT NULL,
  PRIMARY KEY (`receiver_id`),
  KEY `nota_receiver_fk` (`nota_id`),
  KEY `nota_receiver_fk2` (`emp_num`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_receiver`
--

LOCK TABLES `nota_receiver` WRITE;
/*!40000 ALTER TABLE `nota_receiver` DISABLE KEYS */;
INSERT INTO `nota_receiver` VALUES (10,'201405230001',31,0,0,'',0),(11,'201405230001',32,0,0,'',0),(12,'201405230001',35,1,0,'',0),(13,'201405230001',36,1,0,'',0),(14,'201405230001',37,1,0,'',0),(15,'201405230001',38,1,0,'',0),(16,'201405230001',39,1,0,'',0),(17,'201405230001',40,1,0,'',0),(18,'201405230001',41,1,0,'',0),(20,'201405230002',32,0,0,'',0),(21,'201405230002',37,1,0,'',0),(22,'201405230002',38,0,1,'Untuk dihadiri',32),(23,'201405230002',39,0,1,'Untuk dihadiri',38),(24,'201405230002',40,0,1,'Untuk dihadiri',38),(25,'201405230002',41,0,1,'Untuk dihadiri',38),(29,'201405230003',25,0,0,'',0),(30,'201405230003',26,1,0,'',0),(31,'201405230003',34,1,0,'',0),(38,'201405230004',25,0,0,'',0),(39,'201405230004',32,1,0,'',0),(40,'201405230004',37,1,0,'',0),(41,'201405230005',32,0,0,'',0),(42,'201405230006',37,0,0,'',0),(44,'201405230007',33,0,0,'',0),(45,'201405230008',31,0,0,'',0),(52,'201406040001',32,0,0,'',0),(53,'201406040001',37,1,0,'',0),(54,'201406040001',40,0,1,'Untuk dihadiri',32),(55,'201406040001',41,0,1,'Untuk dihadiri',32),(56,'201406040002',32,0,0,'',0);
/*!40000 ALTER TABLE `nota_receiver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_referensi`
--

DROP TABLE IF EXISTS `nota_referensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_referensi` (
  `referensi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_id` varchar(20) NOT NULL,
  `nota_referensi` varchar(20) NOT NULL,
  PRIMARY KEY (`referensi_id`),
  KEY `nota_referensi_fk` (`nota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_referensi`
--

LOCK TABLES `nota_referensi` WRITE;
/*!40000 ALTER TABLE `nota_referensi` DISABLE KEYS */;
INSERT INTO `nota_referensi` VALUES (3,'201405230004','201405230002');
/*!40000 ALTER TABLE `nota_referensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `nota_sent_view`
--

DROP TABLE IF EXISTS `nota_sent_view`;
/*!50001 DROP VIEW IF EXISTS `nota_sent_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `nota_sent_view` (
  `nota_id` varchar(20),
  `nota_number` varchar(255),
  `nota_perihal` varchar(255),
  `nota_isi` text,
  `kode_masalah` varchar(10),
  `creator` varchar(100),
  `forwarder` varchar(100),
  `nota_read_status` tinyint(4),
  `emp_num` int(11),
  `nota_date` date,
  `create_date` datetime,
  `segera` tinyint(1)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prof_detail`
--

DROP TABLE IF EXISTS `prof_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prof_detail` (
  `prof_id` int(11) NOT NULL,
  `emp_num` int(11) NOT NULL,
  `prof_order` int(2) NOT NULL,
  PRIMARY KEY (`prof_id`,`emp_num`),
  KEY `prof_id` (`prof_id`,`emp_num`),
  KEY `emp_num` (`emp_num`),
  CONSTRAINT `prof_detail_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `prof_sppd` (`prof_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prof_detail_ibfk_2` FOREIGN KEY (`emp_num`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prof_detail`
--

LOCK TABLES `prof_detail` WRITE;
/*!40000 ALTER TABLE `prof_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `prof_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prof_sppd`
--

DROP TABLE IF EXISTS `prof_sppd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prof_sppd` (
  `prof_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_num` int(11) NOT NULL,
  `prof_name` varchar(50) NOT NULL,
  PRIMARY KEY (`prof_id`),
  KEY `emp_num` (`emp_num`),
  CONSTRAINT `prof_sppd_ibfk_1` FOREIGN KEY (`emp_num`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prof_sppd`
--

LOCK TABLES `prof_sppd` WRITE;
/*!40000 ALTER TABLE `prof_sppd` DISABLE KEYS */;
/*!40000 ALTER TABLE `prof_sppd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_data`
--

DROP TABLE IF EXISTS `reservation_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_data` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_num` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `res_type` int(11) NOT NULL,
  `booking_id` varchar(11) NOT NULL,
  `booking_date` datetime NOT NULL,
  `limit_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `contact_title` varchar(4) NOT NULL,
  `contact_firstname` varchar(50) NOT NULL,
  `contact_lastname` varchar(50) NOT NULL,
  `contact_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`res_id`),
  KEY `sppd_num` (`req_id`),
  KEY `emp_num` (`emp_num`),
  KEY `sppd_num_2` (`req_id`),
  CONSTRAINT `reservation_data_ibfk_1` FOREIGN KEY (`emp_num`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservation_data_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `reservation_req` (`req_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_data`
--

LOCK TABLES `reservation_data` WRITE;
/*!40000 ALTER TABLE `reservation_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_req`
--

DROP TABLE IF EXISTS `reservation_req`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_req` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `sppd_num` int(11) NOT NULL,
  `flight_desc` varchar(500) NOT NULL,
  `time_desc` varchar(500) NOT NULL,
  `hotel_desc` varchar(500) NOT NULL,
  `send_date` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`req_id`),
  KEY `sppd_num` (`sppd_num`),
  CONSTRAINT `reservation_req_ibfk_1` FOREIGN KEY (`sppd_num`) REFERENCES `sppd_data` (`sppd_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_req`
--

LOCK TABLES `reservation_req` WRITE;
/*!40000 ALTER TABLE `reservation_req` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sppd_anggaran`
--

DROP TABLE IF EXISTS `sppd_anggaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sppd_anggaran` (
  `anggaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(4) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`anggaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sppd_anggaran`
--

LOCK TABLES `sppd_anggaran` WRITE;
/*!40000 ALTER TABLE `sppd_anggaran` DISABLE KEYS */;
INSERT INTO `sppd_anggaran` VALUES (1,'2013',497445500);
/*!40000 ALTER TABLE `sppd_anggaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sppd_comment`
--

DROP TABLE IF EXISTS `sppd_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sppd_comment` (
  `sppd_num` int(11) NOT NULL,
  `emp_num` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date_comment` datetime NOT NULL,
  `time_comment` time NOT NULL,
  `comment_type` int(1) NOT NULL,
  KEY `sppd_num` (`sppd_num`,`emp_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sppd_comment`
--

LOCK TABLES `sppd_comment` WRITE;
/*!40000 ALTER TABLE `sppd_comment` DISABLE KEYS */;
INSERT INTO `sppd_comment` VALUES (32,8,'test ','2013-06-21 00:00:00','09:43:00',0),(33,5,'','2013-06-24 00:00:00','10:00:00',0),(24,5,'kkkk ','2013-06-24 00:00:00','07:50:00',0),(24,5,'sss ','2013-06-24 00:00:00','07:51:00',0),(24,5,'aaa ','2013-06-24 00:00:00','08:35:00',0),(36,5,'Mohon Di Approve','2013-06-24 00:00:00','10:00:00',0),(37,5,'Mohon Di Approve','2013-06-24 00:00:00','10:00:00',0),(38,5,'Mohon Di Approve','2013-06-25 00:00:00','10:00:00',0),(38,5,'tes ','2013-06-25 04:16:41','00:00:00',0),(38,23,'ok ','2013-06-25 04:36:38','00:00:00',0),(38,22,'aaaa ','2013-06-25 04:36:57','00:00:00',0),(38,8,'ok ','2013-06-25 04:38:30','00:00:00',0),(39,5,'test','2013-06-25 00:00:00','10:00:00',0),(39,23,'ok ','2013-06-25 05:00:06','00:00:00',0),(39,22,'test2 ','2013-06-25 05:00:30','00:00:00',0),(39,12,'ok ','2013-06-25 05:01:18','00:00:00',0),(39,8,'sip ','2013-06-25 05:01:37','00:00:00',0),(40,5,'Mohon di Approve','2013-06-25 00:00:00','10:00:00',0),(40,23,'ok ','2013-06-25 05:04:02','00:00:00',0),(40,12,'test ','2013-06-25 05:04:45','00:00:00',0),(40,8,'approve ','2013-06-25 05:05:05','00:00:00',0),(42,5,'test','2013-06-25 00:00:00','10:00:00',0),(42,23,'ok ','2013-06-25 05:25:53','00:00:00',0),(42,12,'test ','2013-06-25 05:26:11','00:00:00',0),(42,5,'test ','2013-06-25 06:36:36','00:00:00',0),(43,5,'test','2013-06-25 00:00:00','10:00:00',0),(44,5,'test','2013-06-25 00:00:00','10:00:00',0),(45,5,'test','2013-06-25 00:00:00','10:00:00',0),(46,5,'test','2013-06-25 00:00:00','10:00:00',0),(44,23,'Ok ','2013-06-25 14:55:55','00:00:00',0),(44,23,'test ','2013-06-25 15:02:10','00:00:00',0),(46,23,'ok ','2013-06-25 15:39:28','00:00:00',0),(48,5,'test','2013-06-25 00:00:00','10:00:00',0),(48,23,'tes ','2013-06-25 15:51:42','00:00:00',0),(49,5,'test','2013-06-25 00:00:00','10:00:00',0),(49,23,'ok ','2013-06-25 15:55:25','00:00:00',0),(49,22,'cek lagi ','2013-06-25 15:55:49','00:00:00',0),(50,5,'test','2013-06-25 00:00:00','10:00:00',0),(50,23,'aaa ','2013-06-25 16:30:20','00:00:00',0),(51,5,'test','2013-06-25 00:00:00','10:00:00',0),(51,23,'test ','2013-06-25 17:08:21','00:00:00',0),(51,23,'dfrgtbht ','2013-06-25 17:08:31','00:00:00',0),(57,5,'test','2013-06-26 11:34:31','00:00:00',0),(57,23,'aaaa ','2013-06-26 11:47:51','00:00:00',0),(58,5,'test','2013-06-26 12:09:30','00:00:00',0),(59,5,'test','2013-06-26 12:58:39','00:00:00',0),(59,23,'test ','2013-06-26 14:17:15','00:00:00',0),(59,23,'aaa ','2013-06-26 14:19:23','00:00:00',0),(60,28,'Mohon Di Approve','2013-06-26 18:53:27','00:00:00',0),(60,5,'Ok saya sudah approve ','2013-06-26 18:56:45','00:00:00',0),(60,23,'saya approve ','2013-06-26 19:05:18','00:00:00',0),(60,22,'sudah approve ','2013-06-26 19:07:58','00:00:00',0),(62,5,'','2013-06-26 22:25:44','00:00:00',0),(63,5,'','2013-06-27 09:40:11','00:00:00',0),(64,32,'Tolong di Approve','2013-06-27 16:17:18','00:00:00',0),(67,32,'test','2013-06-28 10:06:03','00:00:00',0),(0,0,'0','2013-06-28 10:06:04','00:00:00',0),(0,0,'0','2013-06-28 10:30:51','00:00:00',0),(0,0,'0','2013-06-28 10:46:00','00:00:00',0),(0,0,'0','2013-06-28 10:50:32','00:00:00',0),(72,32,'test','2013-06-28 10:51:29','00:00:00',0),(0,0,'0','2013-06-28 10:51:29','00:00:00',0),(0,0,'0','2013-06-28 10:52:26','00:00:00',0),(67,33,'ok','2013-06-28 11:14:09','00:00:00',0),(0,0,'0','2013-06-28 15:21:12','00:00:00',0),(74,32,'0','2013-06-28 16:05:27','00:00:00',0),(0,0,'0','2013-06-28 16:05:27','00:00:00',0),(74,37,'Approve - Ok Setuju','2013-06-28 16:05:51','00:00:00',0),(74,35,'Approve - Ok Setuju','2013-06-28 16:06:07','00:00:00',0),(76,32,'0','2013-06-28 16:20:57','00:00:00',0),(76,32,'Submit - Tolong di approve','2013-06-28 16:20:57','00:00:00',0),(77,32,'Submit - Mohon Di Approve','2013-06-28 16:24:43','00:00:00',0),(77,33,'Approve - Ok Approve','2013-06-28 16:25:30','00:00:00',0),(77,35,'Approve - Ok Approve','2013-06-28 16:25:46','00:00:00',0),(78,32,'Submit - Mohon Di Approve','2013-06-28 16:37:05','00:00:00',0),(78,32,'Approve - Ok setuju','2013-06-28 16:37:19','00:00:00',0),(78,38,'Approve - Setuju','2013-06-28 16:37:33','00:00:00',0),(79,32,'Submit - Mohon Approve','2013-06-28 17:36:21','00:00:00',0),(79,33,'Approve - Ok Approve','2013-06-28 17:37:13','00:00:00',0),(79,38,'Approve - Approve','2013-06-28 17:38:07','00:00:00',0),(84,32,'Approve - test','2013-07-01 13:20:39','00:00:00',0),(82,37,'Approve - ','2013-07-01 13:37:50','00:00:00',0),(84,37,'Approve - Ok Approve','2013-07-01 14:15:57','00:00:00',0),(83,37,'Approve - test','2013-07-01 14:16:25','00:00:00',0),(85,32,'Submit - aaa','2013-07-01 14:57:19','00:00:00',0),(85,1000014,'Reject - ','2013-07-01 14:59:21','00:00:00',0),(86,32,'Submit - test','2013-07-01 15:08:02','00:00:00',0),(86,32,'Reject - ','2013-07-01 15:08:16','00:00:00',0),(86,32,'Reject - ','2013-07-01 15:09:16','00:00:00',0),(87,32,'Submit - ','2013-07-02 09:02:42','00:00:00',0),(88,32,'Submit - ','2013-07-02 09:07:33','00:00:00',0),(89,32,'Submit - mohon di approve','2013-07-03 10:17:04','00:00:00',0),(89,39,'Approve - OK','2013-07-03 10:19:36','00:00:00',0),(89,38,'Approve - OK','2013-07-03 10:20:44','00:00:00',0),(89,35,'Approve - OK','2013-07-03 10:21:00','00:00:00',0),(89,33,'Approve - OK','2013-07-03 10:22:26','00:00:00',0),(90,32,'Submit - Mohon Di Approve','2013-07-04 08:46:45','00:00:00',0),(90,37,'Approve - Ok','2013-07-04 08:48:49','00:00:00',0),(90,38,'Approve - Ok','2013-07-04 08:49:13','00:00:00',0),(90,35,'Approve - Ok Setuju','2013-07-04 08:49:43','00:00:00',0),(91,32,'Submit - test','2013-07-04 08:59:03','00:00:00',0),(91,37,'Approve - Ok','2013-07-04 08:59:45','00:00:00',0),(92,32,'Submit - ','2013-07-04 09:19:17','00:00:00',0),(91,37,'Approve - SPPD sudah saya edit','2013-07-04 10:07:22','00:00:00',0),(91,38,'Approve - ','2013-07-04 10:08:53','00:00:00',0),(94,32,'Submit - test','2013-07-04 11:09:58','00:00:00',0),(95,32,'Submit - test','2013-07-04 11:33:55','00:00:00',0),(95,32,'Approve - cccc','2013-07-04 11:35:49','00:00:00',0),(96,32,'Submit - test','2013-07-04 11:59:30','00:00:00',0),(96,32,'Approve - Ok sudah di edit','2013-07-04 12:08:33','00:00:00',0),(96,37,'Approve - csada','2013-07-04 12:08:57','00:00:00',0),(97,39,'Submit - Mohon Di Approve','2013-07-05 15:43:12','00:00:00',0),(97,37,'Approve - Ok','2013-07-05 15:44:06','00:00:00',0),(97,38,'Approve - Ok','2013-07-05 15:44:22','00:00:00',0),(97,38,'Approve - tes','2013-07-05 15:46:21','00:00:00',0),(97,38,'Approve - Ok sudah diubah','2013-07-05 15:47:03','00:00:00',0),(97,39,'Approve - Ok diubah lagi','2013-07-05 15:50:51','00:00:00',0),(97,37,'Return - test2222','2013-07-05 16:09:56','00:00:00',0),(96,38,'Approve - ','2013-07-05 16:10:46','00:00:00',0),(98,32,'Submit - test','2013-07-05 16:11:26','00:00:00',0),(98,37,'Approve - ok','2013-07-05 16:11:46','00:00:00',0),(98,38,'Return - Mohon diubah lagi','2013-07-05 16:12:06','00:00:00',0),(98,37,'Approve - Ok sudah diubah','2013-07-05 16:12:34','00:00:00',0),(98,38,'Approve - Ok','2013-07-05 16:12:48','00:00:00',0),(98,35,'Return - Mohon diubah','2013-07-05 16:13:12','00:00:00',0),(98,38,'Approve - aaaaaaa','2013-07-05 16:13:29','00:00:00',0),(98,35,'Approve - Ok','2013-07-05 16:13:41','00:00:00',0),(99,32,'Submit - Mohon Di Approve','2013-07-05 18:04:12','00:00:00',0),(99,37,'Return - ','2013-07-05 18:09:05','00:00:00',0),(99,32,'Approve - Ok sudah diubah','2013-07-05 18:09:34','00:00:00',0),(99,37,'Approve - Ok approve','2013-07-05 18:09:57','00:00:00',0),(99,38,'Approve - Ok','2013-07-05 18:10:43','00:00:00',0),(99,35,'Approve - Ok','2013-07-05 18:11:15','00:00:00',0),(100,32,'Approve - Mohon Di Approve','2013-07-05 18:16:02','00:00:00',0),(106,32,'Submit - adsad','2013-07-08 12:13:00','00:00:00',0),(106,37,'Approve - Ok','2013-07-08 12:13:28','00:00:00',0),(106,35,'Return - ','2013-07-08 14:55:15','00:00:00',0),(106,37,'Approve - Ok','2013-07-08 14:55:48','00:00:00',0),(106,35,'Approve - ','2013-07-08 15:11:07','00:00:00',0),(96,35,'Approve - ','2013-07-08 15:17:17','00:00:00',0),(107,32,'Submit - mohon approve','2013-07-10 15:37:55','00:00:00',0),(107,37,'Approve - Ok','2013-07-10 15:38:15','00:00:00',0),(107,32,'Submit - test','2013-07-10 20:49:33','00:00:00',0),(107,32,'Reject - ','2013-07-10 21:09:04','00:00:00',0),(108,32,'Submit - Mohon Di Approve','2013-07-11 09:27:30','00:00:00',0),(108,32,'Reject - ','2013-07-11 09:27:45','00:00:00',0),(108,1000014,'Reject - ','2013-07-11 09:32:41','00:00:00',0),(109,32,'Submit - test','2013-07-11 09:34:10','00:00:00',0),(109,1000014,'Reject - ','2013-07-11 09:34:24','00:00:00',0),(110,32,'Submit - test','2013-07-11 09:40:45','00:00:00',0),(110,1000014,'Reject - aaa','2013-07-11 09:40:58','00:00:00',0),(110,32,'Reject - aa','2013-07-11 09:49:50','00:00:00',0),(111,32,'Submit - test','2013-07-11 10:02:16','00:00:00',0),(112,32,'Submit - test','2013-07-11 10:43:40','00:00:00',0),(112,32,'Reject - reject','2013-07-11 10:44:47','00:00:00',0),(113,32,'Submit - test','2013-07-11 10:47:32','00:00:00',0),(113,37,'Reject - test2','2013-07-11 10:47:47','00:00:00',0),(114,32,'Submit - asdsad','2013-07-11 11:25:18','00:00:00',0),(115,32,'Submit - test','2013-07-11 11:36:09','00:00:00',0),(115,37,'Reject - saya tolak','2013-07-11 11:36:29','00:00:00',0),(118,32,'Submit - aaa','2013-07-11 11:46:33','00:00:00',0),(118,37,'Approve - ok','2013-07-11 11:49:18','00:00:00',0),(118,35,'Approve - Ok','2013-07-11 11:51:50','00:00:00',0),(118,32,'Approve - ','2013-07-11 12:20:58','00:00:00',0),(118,32,'Approve - ','2013-07-11 12:30:32','00:00:00',0),(119,32,'Approve - ','2013-07-11 15:23:57','00:00:00',0),(119,32,'Approve - ','2013-07-11 15:24:55','00:00:00',0),(118,32,'Approve - ','2013-07-11 15:42:25','00:00:00',0),(120,32,'Submit - test','2013-07-12 09:43:48','00:00:00',0),(120,37,'Approve - test','2013-07-12 09:56:55','00:00:00',0),(120,35,'Approve - Ok','2013-07-12 10:00:57','00:00:00',0),(121,32,'Submit - test','2013-07-12 10:41:59','00:00:00',0),(121,37,'Reject - saya tolak','2013-07-12 10:42:15','00:00:00',0),(122,32,'Submit - test','2013-07-12 10:47:45','00:00:00',0),(122,37,'Reject - ','2013-07-12 10:48:00','00:00:00',0),(123,32,'Submit - test','2013-07-12 10:53:36','00:00:00',0),(124,32,'Submit - test','2013-07-12 10:56:48','00:00:00',0),(124,37,'Reject - ','2013-07-12 10:56:58','00:00:00',0),(125,32,'Submit - test','2013-07-12 14:20:44','00:00:00',0),(125,37,'Approve - Ok','2013-07-12 14:20:56','00:00:00',0),(125,35,'Approve - ok','2013-07-12 14:21:41','00:00:00',0),(126,32,'Submit - test','2013-07-12 14:26:24','00:00:00',0),(126,37,'Approve - test','2013-07-12 14:27:26','00:00:00',0),(126,35,'Approve - Ok','2013-07-12 14:28:27','00:00:00',0),(127,32,'Submit - test','2013-07-12 14:34:39','00:00:00',0),(127,37,'Approve - test','2013-07-12 14:34:57','00:00:00',0),(127,35,'Approve - ok','2013-07-12 14:35:36','00:00:00',0),(128,32,'Submit - test','2013-07-12 14:41:38','00:00:00',0),(128,37,'Approve - test','2013-07-12 14:41:48','00:00:00',0),(128,35,'Approve - Ok','2013-07-12 14:42:38','00:00:00',0),(129,32,'Submit - test','2013-07-12 14:43:42','00:00:00',0),(129,35,'Approve - Ok','2013-07-12 14:44:25','00:00:00',0),(131,32,'Submit - test','2013-07-12 14:55:15','00:00:00',0),(131,37,'Approve - ok','2013-07-12 14:55:33','00:00:00',0),(130,37,'Approve - test','2013-07-12 14:55:51','00:00:00',0),(131,35,'Approve - ok','2013-07-12 14:56:51','00:00:00',0),(132,32,'Submit - test','2013-07-12 15:19:26','00:00:00',0),(132,35,'Approve - test','2013-07-12 15:21:38','00:00:00',0),(133,32,'Submit - test','2013-07-12 15:25:56','00:00:00',0),(133,37,'Approve - ok','2013-07-12 15:26:08','00:00:00',0),(133,35,'Approve - ok','2013-07-12 15:26:48','00:00:00',0),(134,32,'Submit - test','2013-07-12 15:31:55','00:00:00',0),(134,37,'Approve - test','2013-07-12 15:32:08','00:00:00',0),(134,35,'Approve - test','2013-07-12 15:32:48','00:00:00',0),(135,32,'Submit - test','2013-07-12 15:45:23','00:00:00',0),(135,37,'Approve - test','2013-07-12 15:45:36','00:00:00',0),(135,35,'Approve - test','2013-07-12 15:46:24','00:00:00',0),(136,32,'Submit - test','2013-07-12 15:51:47','00:00:00',0),(137,32,'Submit - test','2013-07-12 17:45:07','00:00:00',0),(137,35,'Approve - Ok Approve','2013-07-12 17:46:26','00:00:00',0),(138,32,'Submit - test','2013-07-12 17:47:44','00:00:00',0),(139,32,'Submit - test','2013-08-16 17:48:40','00:00:00',0),(139,37,'Reject - saya tolak','2013-08-16 17:48:52','00:00:00',0),(140,32,'Submit - mohon di approve','2013-07-15 17:20:28','00:00:00',0),(140,37,'Approve - Ok Approve','2013-07-15 17:21:19','00:00:00',0),(140,39,'Approve - Ok','2013-07-15 17:21:57','00:00:00',0),(140,35,'Approve - Ok Approve','2013-07-15 17:22:59','00:00:00',0),(141,32,'Submit - test','2013-07-16 13:40:24','00:00:00',0),(142,32,'Approve - ','2013-07-17 09:43:08','00:00:00',0),(143,32,'Submit - test','2013-07-17 15:46:24','00:00:00',0),(144,32,'Submit - test','2013-07-18 10:02:13','00:00:00',0),(145,32,'Submit - test','2013-07-18 10:06:37','00:00:00',0),(146,32,'Submit - test','2013-07-18 10:27:39','00:00:00',0),(147,32,'Submit - tes','2013-07-18 10:38:13','00:00:00',0),(151,32,'Submit - test','2013-07-18 11:07:22','00:00:00',0),(152,32,'Submit - test','2013-07-18 11:08:29','00:00:00',0),(153,32,'Submit - test','2013-07-18 11:09:06','00:00:00',0),(154,32,'Submit - aaa','2013-07-18 11:10:30','00:00:00',0),(155,32,'Submit - aaa','2013-07-18 11:12:08','00:00:00',0),(156,32,'Submit - test','2013-07-18 11:16:24','00:00:00',0),(157,32,'Submit - aaa','2013-07-18 11:17:21','00:00:00',0),(158,32,'Submit - test','2013-07-18 13:32:47','00:00:00',0),(159,32,'Submit - test','2013-07-18 13:34:25','00:00:00',0),(160,32,'Submit - test','2013-07-18 13:41:22','00:00:00',0),(161,32,'Submit - aaa','2013-07-18 13:46:45','00:00:00',0),(163,32,'Submit - aaa','2013-07-18 13:48:15','00:00:00',0),(164,32,'Submit - aaa','2013-07-18 13:57:53','00:00:00',0),(165,32,'Submit - aaa','2013-07-18 14:00:06','00:00:00',0),(166,32,'Submit - aaa','2013-07-18 14:00:59','00:00:00',0),(167,32,'Submit - aaa','2013-07-19 13:07:59','00:00:00',0),(167,35,'Approve - Ok','2013-07-19 14:08:03','00:00:00',0),(168,32,'Submit - test','2013-07-19 17:56:53','00:00:00',0),(168,35,'Approve - ok','2013-07-19 18:06:43','00:00:00',0),(169,32,'Submit - aaa','2013-07-20 20:26:14','00:00:00',0),(170,32,'Submit - aaa','2013-07-20 20:47:34','00:00:00',0),(171,32,'Submit - asdsa','2013-07-20 20:59:09','00:00:00',0),(172,32,'Submit - aa','2013-07-20 21:13:06','00:00:00',0),(172,35,'Approve - aaa','2013-07-20 21:13:44','00:00:00',0),(173,32,'Submit - aaa','2013-07-21 08:53:43','00:00:00',0),(176,32,'Submit - sadsad','2013-07-21 19:49:07','00:00:00',0),(177,32,'Submit - aaa','2013-07-21 20:59:36','00:00:00',0),(1,32,'Submit - test','2013-07-22 08:56:39','00:00:00',0),(1,35,'Reject - ','2013-07-22 08:58:09','00:00:00',0),(2,32,'Submit - aaa','2013-07-22 09:03:29','00:00:00',0),(2,35,'Reject - reject sppd','2013-07-22 09:03:51','00:00:00',0),(3,32,'Submit - test','2013-07-22 09:46:05','00:00:00',0),(4,32,'Submit - aaaa','2013-07-22 09:46:59','00:00:00',0),(5,32,'Submit - asdsa','2013-07-22 09:47:29','00:00:00',0),(6,32,'Submit - asdasd','2013-07-22 09:48:49','00:00:00',0),(7,32,'Submit - asdasd','2013-07-22 09:49:12','00:00:00',0),(8,32,'Submit - aaasd','2013-07-22 10:17:44','00:00:00',0),(9,32,'Submit - aaasd','2013-07-22 10:20:18','00:00:00',0),(10,32,'Submit - aaasd','2013-07-22 10:21:09','00:00:00',0),(11,32,'Submit - aaasd','2013-07-22 10:21:19','00:00:00',0),(12,32,'Submit - aaasd','2013-07-22 10:21:27','00:00:00',0),(13,32,'Submit - aaasd','2013-07-22 10:21:36','00:00:00',0),(14,32,'Submit - aaasd','2013-07-22 10:21:46','00:00:00',0),(15,32,'Submit - aaasd','2013-07-22 10:21:53','00:00:00',0),(16,32,'Submit - aaasd','2013-07-22 10:22:01','00:00:00',0),(17,32,'Submit - aaasd','2013-07-22 10:22:20','00:00:00',0),(18,32,'Submit - aaasd','2013-07-22 10:22:37','00:00:00',0),(24,32,'Approve - tsdfsadasdsad','2013-07-22 11:16:15','00:00:00',0),(25,32,'Submit - tes','2013-07-22 18:04:36','00:00:00',0),(26,32,'Submit - asdsad','2013-07-23 10:10:34','00:00:00',0),(18,35,'Approve - test','2013-07-23 11:42:28','00:00:00',0),(21,32,'Approve - TEST','2013-07-23 11:52:40','00:00:00',0),(23,32,'Approve - asdsa','2013-07-23 11:54:17','00:00:00',0),(22,32,'Approve - adsad','2013-07-23 11:55:28','00:00:00',0),(20,32,'Approve - dasda','2013-07-23 12:27:22','00:00:00',0),(27,32,'Submit - test','2013-07-23 18:02:07','00:00:00',0),(27,35,'Approve - aadasd','2013-07-23 18:02:49','00:00:00',0),(28,32,'Submit - test','2013-07-23 23:59:39','00:00:00',0),(29,32,'Submit - test','2013-07-24 00:01:08','00:00:00',0),(19,32,'Approve - test','2013-07-24 10:40:49','00:00:00',0),(19,35,'Reject - ','2013-07-24 10:41:06','00:00:00',0),(30,32,'Submit - test','2013-07-24 18:19:30','00:00:00',0),(31,32,'Submit - sadsad','2013-07-24 18:20:09','00:00:00',0),(36,32,'Submit - asdasd','2013-07-29 14:16:53','00:00:00',0),(19,35,'Approve - ok','2013-07-29 21:52:02','00:00:00',0),(37,32,'Submit - asd','2013-07-29 23:07:32','00:00:00',0),(37,35,'Approve - asdasd','2013-07-29 23:11:09','00:00:00',0),(33,32,'Approve - ','2013-07-30 07:00:52','00:00:00',0),(32,32,'Approve - ','2013-07-30 07:00:59','00:00:00',0),(38,32,'Submit - test','2013-07-30 07:01:56','00:00:00',0),(39,32,'Approve - ','2013-07-30 07:03:33','00:00:00',0),(40,32,'Approve - ','2013-07-30 07:05:13','00:00:00',0),(32,32,'Approve - ','2013-07-30 09:57:17','00:00:00',0),(32,35,'Approve - test','2013-07-30 10:53:37','00:00:00',0),(42,32,'Submit - test','2013-07-30 10:56:33','00:00:00',0),(42,35,'Approve - test','2013-07-30 10:57:01','00:00:00',0),(43,32,'Submit - test','2013-08-30 11:36:26','00:00:00',0),(43,37,'Approve - ok approve','2013-08-30 11:46:03','00:00:00',0),(44,32,'Submit - test','2013-07-30 18:11:21','00:00:00',0),(45,32,'Submit - test','2013-07-30 18:13:42','00:00:00',0),(45,35,'Approve - ok','2013-07-30 21:22:45','00:00:00',0),(2,44,'Submit - test','2013-07-31 11:34:55','00:00:00',0),(2,43,'Approve - test','2013-07-31 11:36:11','00:00:00',0),(2,42,'Approve - test','2013-07-31 11:45:27','00:00:00',0),(3,44,'Submit - test','2013-08-01 10:08:18','00:00:00',0),(3,43,'Approve - ok','2013-08-01 10:08:33','00:00:00',0),(3,42,'Approve - tes','2013-08-01 10:13:46','00:00:00',0),(4,44,'Submit - test','2013-08-01 10:14:24','00:00:00',0),(4,43,'Approve - test','2013-08-01 10:15:39','00:00:00',0),(4,42,'Approve - test','2013-08-01 10:17:22','00:00:00',0),(5,44,'Submit - test','2013-08-01 10:53:29','00:00:00',0),(5,43,'Approve - test','2013-08-01 10:53:50','00:00:00',0),(5,42,'Approve - test','2013-08-01 10:55:20','00:00:00',0),(6,44,'Submit - test','2013-08-01 11:23:19','00:00:00',0),(6,43,'Approve - tets','2013-08-01 11:24:31','00:00:00',0),(6,42,'Approve - test','2013-08-01 11:25:08','00:00:00',0),(7,44,'Submit - test','2013-08-01 13:17:38','00:00:00',0),(7,42,'Approve - test','2013-08-01 13:18:27','00:00:00',0),(8,44,'Submit - test','2013-08-01 13:55:31','00:00:00',0),(8,42,'Approve - test','2013-08-01 13:56:20','00:00:00',0),(11,43,'Submit - test','2013-08-02 11:31:05','00:00:00',0),(11,42,'Return - test','2013-08-02 11:37:13','00:00:00',0),(12,43,'Approve - test','2013-08-02 11:52:05','00:00:00',0),(12,43,'Approve - test','2013-08-02 11:52:13','00:00:00',0),(13,43,'Approve - test','2013-08-02 11:57:18','00:00:00',0),(13,44,'Reject - ','2013-08-02 11:57:40','00:00:00',0),(14,43,'Submit - test','2013-08-02 12:06:00','00:00:00',0),(14,44,'Return - ','2013-08-02 12:06:21','00:00:00',0),(14,43,'Approve - asad','2013-08-02 12:18:02','00:00:00',0),(14,44,'Approve - asdsada','2013-08-02 12:20:39','00:00:00',0),(14,42,'Return - fsadsad','2013-08-02 12:21:17','00:00:00',0),(14,44,'Approve - ','2013-08-02 12:54:11','00:00:00',0),(15,43,'Submit - test','2013-08-02 13:01:09','00:00:00',0),(15,42,'Return - aaaa','2013-08-02 13:02:13','00:00:00',0),(16,43,'Submit - test','2013-08-02 13:03:41','00:00:00',0),(16,42,'Return - return','2013-08-02 13:04:12','00:00:00',0),(16,43,'Approve - asdsad','2013-08-02 13:09:49','00:00:00',0),(15,43,'Approve - qwewqewq','2013-08-02 13:10:02','00:00:00',0),(15,42,'Approve - sadasdsa','2013-08-02 13:11:22','00:00:00',0),(17,49,'Submit - test','2013-08-02 15:39:37','00:00:00',0),(17,46,'Approve - ok','2013-08-02 15:41:06','00:00:00',0),(18,49,'Submit - test','2013-08-02 16:10:01','00:00:00',0),(18,46,'Return - tolak','2013-08-02 16:10:22','00:00:00',0),(18,49,'Approve - ok','2013-08-02 16:10:36','00:00:00',0),(18,46,'Approve - test','2013-08-02 16:12:05','00:00:00',0),(19,49,'Submit - test','2013-08-07 10:34:25','00:00:00',0),(19,46,'Approve - ok','2013-08-07 11:23:01','00:00:00',0),(20,49,'Submit - test','2013-08-07 12:10:02','00:00:00',0),(20,50,'Approve - test','2013-08-07 12:10:20','00:00:00',0),(20,46,'Approve - test','2013-08-07 12:10:58','00:00:00',0),(23,49,'Approve - test','2013-08-11 19:15:56','00:00:00',0),(24,49,'Approve - test','2013-08-11 19:17:13','00:00:00',0),(25,51,'Submit - test','2013-09-30 09:56:40','00:00:00',0),(25,50,'Approve - Ok Approve','2013-09-30 10:00:18','00:00:00',0),(25,52,'Approve - test','2013-09-30 10:00:32','00:00:00',0),(26,51,'Submit - test','2013-09-30 14:09:26','00:00:00',0),(26,50,'Return - ','2013-09-30 14:13:47','00:00:00',0),(26,51,'Approve - mohon di approve','2013-09-30 14:14:49','00:00:00',0),(26,50,'Approve - test','2013-09-30 14:21:18','00:00:00',0),(26,52,'Return - ','2013-09-30 14:21:42','00:00:00',0),(26,50,'Approve - test','2013-09-30 14:22:09','00:00:00',0),(26,52,'Approve - ok','2013-09-30 14:27:27','00:00:00',0),(27,53,'Submit - Mohon di approve','2013-10-04 01:09:28','00:00:00',0),(27,55,'Approve - approve','2013-10-04 01:10:19','00:00:00',0),(27,54,'Approve - Setuju','2013-10-04 01:12:12','00:00:00',0),(27,52,'Approve - setuju','2013-10-04 01:13:48','00:00:00',0),(28,53,'Approve - test','2013-10-04 01:26:11','00:00:00',0),(28,56,'Return - tolong di revisi lagi','2013-10-04 01:26:49','00:00:00',0),(28,53,'Approve - sudah di revisi','2013-10-04 01:27:10','00:00:00',0),(28,56,'Approve - ok setuju','2013-10-04 01:27:30','00:00:00',0),(28,54,'Reject - ditolak','2013-10-04 01:27:45','00:00:00',0),(29,53,'Approve - test','2013-10-04 01:28:53','00:00:00',0),(30,55,'Submit - test','2013-10-04 01:30:15','00:00:00',0),(31,53,'Submit - ok approve','2013-10-04 11:17:44','00:00:00',0),(31,55,'Approve - Ok','2013-10-04 11:19:56','00:00:00',0),(31,54,'Approve - Ok','2013-10-04 11:20:49','00:00:00',0),(31,52,'Approve - Ok','2013-10-04 11:27:04','00:00:00',0),(32,53,'Submit - ','2013-10-14 11:50:57','00:00:00',0),(32,55,'Approve - boleh nih!','2013-10-14 11:55:10','00:00:00',0),(32,56,'Return - perbaiki lampiran!','2013-10-14 11:56:18','00:00:00',0),(32,55,'Approve - sudah boss!','2013-10-14 11:56:54','00:00:00',0),(32,56,'Approve - sip','2013-10-14 11:57:12','00:00:00',0),(32,54,'Approve - OK!','2013-10-14 12:01:19','00:00:00',0),(32,52,'Approve - silahkan berangkat','2013-10-14 12:06:59','00:00:00',0),(32,53,'Approve - ','2013-10-14 12:23:26','00:00:00',0),(34,53,'Submit - Harap diperiksa','2013-10-14 20:01:07','00:00:00',0),(34,55,'Approve - Maju gan','2013-10-14 20:32:07','00:00:00',0),(34,56,'Approve - yuk mari','2013-10-14 20:44:34','00:00:00',0),(34,54,'Return - periksa ulang','2013-10-14 20:45:27','00:00:00',0),(35,55,'Submit - Sent!','2013-10-15 07:09:36','00:00:00',0),(35,53,'Approve - ok','2013-10-15 07:10:38','00:00:00',0),(35,56,'Return - periksa ulang','2013-10-15 07:12:10','00:00:00',0),(35,53,'Approve - ','2013-10-15 08:15:59','00:00:00',0),(36,53,'Submit - mohon di cek','2013-10-15 11:33:04','00:00:00',0),(36,55,'Approve - maju','2013-10-15 11:33:50','00:00:00',0),(36,56,'Return - mohon di cek ulang','2013-10-15 11:35:00','00:00:00',0),(37,53,'Submit - Cek segera','2013-10-15 11:55:59','00:00:00',0),(37,55,'Approve - yok cepat di proses meeting penting','2013-10-15 11:56:32','00:00:00',0),(38,55,'Submit - Segera diproses','2013-10-15 12:11:59','00:00:00',0),(38,56,'Approve - Setuju','2013-10-15 12:12:32','00:00:00',0),(38,53,'Return - Tolong diperiksa keperluannya!','2013-10-15 12:13:12','00:00:00',0),(38,56,'Return - periksa lagi!','2013-10-15 12:13:52','00:00:00',0),(38,55,'Approve - oke sudah diperbaiki','2013-10-15 12:21:35','00:00:00',0),(39,53,'Submit - Mohon di cek','2013-10-15 16:43:12','00:00:00',0),(39,55,'Approve - OKe berangkat gan!','2013-10-15 16:43:52','00:00:00',0),(40,53,'Submit - Tolong di periksa','2013-10-15 17:00:31','00:00:00',0),(40,55,'Approve - berangkat gan!','2013-10-15 17:03:34','00:00:00',0),(38,53,'Approve - ','2013-10-15 17:03:59','00:00:00',0),(40,56,'Approve - capcus!','2013-10-15 17:08:02','00:00:00',0),(40,54,'Approve - oke approved','2013-10-15 17:12:36','00:00:00',0),(41,53,'Submit - mohon di cek','2013-10-16 09:12:50','00:00:00',0),(41,55,'Approve - approved!','2013-10-16 09:13:17','00:00:00',0),(41,56,'Return - periksa lagi','2013-10-16 09:13:35','00:00:00',0),(41,55,'Approve - approved!','2013-10-16 09:16:46','00:00:00',0),(41,56,'Return - balikin','2013-10-16 09:17:01','00:00:00',0),(41,56,'Return - balikin','2013-10-16 09:18:01','00:00:00',0),(42,53,'Submit - approve','2013-10-16 09:19:09','00:00:00',0),(42,55,'Approve - go','2013-10-16 09:19:26','00:00:00',0),(42,56,'Return - return','2013-10-16 09:19:40','00:00:00',0),(42,55,'Return - return','2013-10-16 09:20:35','00:00:00',0),(43,53,'Submit - dicek','2013-10-18 15:20:18','00:00:00',0),(43,55,'Approve - diperiksa, approved','2013-10-18 15:20:44','00:00:00',0),(43,56,'Approve - approved!','2013-10-18 15:21:35','00:00:00',0),(43,54,'Approve - maju','2013-10-18 15:21:54','00:00:00',0),(43,52,'Approve - maju','2013-10-18 15:23:35','00:00:00',0),(44,53,'Submit - lanjut ','2013-10-18 17:59:50','00:00:00',0),(44,55,'Approve - approved!','2013-10-18 18:00:24','00:00:00',0),(44,54,'Return - periksa ulang','2013-10-18 18:00:43','00:00:00',0),(44,55,'Return - periksa lagi','2013-10-18 18:02:02','00:00:00',0),(44,54,'Approve - sudah boss!','2013-10-18 18:03:17','00:00:00',0),(47,53,'Submit - tolong diperiksa','2013-10-24 14:43:50','00:00:00',0),(47,55,'Approve - approved!','2013-10-24 14:47:37','00:00:00',0),(47,54,'Approve - approved!','2013-10-24 14:49:04','00:00:00',0),(47,52,'Approve - OK!','2013-10-24 14:51:32','00:00:00',0),(1,64,'Submit - tes','2014-02-14 16:01:29','00:00:00',0),(2,64,'Submit - balasjdflajskl','2014-02-14 16:24:53','00:00:00',0);
/*!40000 ALTER TABLE `sppd_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sppd_data`
--

DROP TABLE IF EXISTS `sppd_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sppd_data` (
  `sppd_num` int(11) NOT NULL AUTO_INCREMENT,
  `sppd_id` varchar(50) NOT NULL,
  `sppd_tgl` date NOT NULL,
  `sppd_dest` varchar(100) NOT NULL,
  `sppd_catt` varchar(255) NOT NULL,
  `sppd_tuj` varchar(255) NOT NULL,
  `sppd_dsr` varchar(255) NOT NULL,
  `sppd_ket` varchar(255) NOT NULL,
  `sppd_depart` date NOT NULL,
  `sppd_arrive` date NOT NULL,
  `sppd_status` int(1) NOT NULL,
  `sppd_desc` varchar(255) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_create_id` int(11) NOT NULL,
  `sppd_read_stat` int(1) NOT NULL,
  `reserve_status` int(1) NOT NULL,
  `temp_comment` varchar(255) NOT NULL,
  `fix_date` int(1) NOT NULL,
  PRIMARY KEY (`sppd_num`),
  UNIQUE KEY `sppd_id` (`sppd_id`),
  KEY `emp_id` (`emp_id`),
  KEY `emp_id_2` (`emp_id`),
  KEY `emp_id_3` (`emp_id`),
  KEY `emp_create_id` (`emp_create_id`),
  CONSTRAINT `sppd_data_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sppd_data_ibfk_2` FOREIGN KEY (`emp_create_id`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sppd_data`
--

LOCK TABLES `sppd_data` WRITE;
/*!40000 ALTER TABLE `sppd_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `sppd_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sppd_day_fee`
--

DROP TABLE IF EXISTS `sppd_day_fee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sppd_day_fee` (
  `fee_day_id` int(11) NOT NULL AUTO_INCREMENT,
  `sppd_num` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `lama` int(3) NOT NULL,
  `day_amount` double NOT NULL,
  `percentage` int(3) NOT NULL,
  PRIMARY KEY (`fee_day_id`),
  KEY `sppd_num` (`sppd_num`),
  CONSTRAINT `sppd_day_fee_ibfk_1` FOREIGN KEY (`sppd_num`) REFERENCES `sppd_data` (`sppd_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sppd_day_fee`
--

LOCK TABLES `sppd_day_fee` WRITE;
/*!40000 ALTER TABLE `sppd_day_fee` DISABLE KEYS */;
/*!40000 ALTER TABLE `sppd_day_fee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sppd_examine`
--

DROP TABLE IF EXISTS `sppd_examine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sppd_examine` (
  `sppd_num` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pem_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `order` int(2) NOT NULL,
  `flag` int(1) NOT NULL,
  `final` int(1) NOT NULL,
  `send_status` int(1) NOT NULL,
  `return_status` int(1) NOT NULL,
  PRIMARY KEY (`sppd_num`,`emp_id`,`pem_id`),
  KEY `sppd_id` (`sppd_num`),
  KEY `emp_id` (`emp_id`),
  KEY `pem_id` (`pem_id`),
  KEY `pem_id_2` (`pem_id`),
  CONSTRAINT `sppd_examine_ibfk_1` FOREIGN KEY (`sppd_num`) REFERENCES `sppd_data` (`sppd_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sppd_examine_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sppd_examine_ibfk_3` FOREIGN KEY (`pem_id`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sppd_examine`
--

LOCK TABLES `sppd_examine` WRITE;
/*!40000 ALTER TABLE `sppd_examine` DISABLE KEYS */;
/*!40000 ALTER TABLE `sppd_examine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sppd_flight_res`
--

DROP TABLE IF EXISTS `sppd_flight_res`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sppd_flight_res` (
  `flight_res_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_num` int(11) NOT NULL,
  `sppd_num` int(11) NOT NULL,
  `flight_name` varchar(100) NOT NULL,
  `flight_code` varchar(15) NOT NULL,
  `flight_number` varchar(20) NOT NULL,
  `from_city` varchar(50) NOT NULL,
  `to_city` varchar(50) NOT NULL,
  `depart_time` varchar(6) NOT NULL,
  `arrive_time` varchar(6) NOT NULL,
  `depart_date` varchar(10) NOT NULL,
  `arrive_date` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `confirm` int(1) NOT NULL,
  `class` varchar(3) NOT NULL,
  PRIMARY KEY (`flight_res_id`),
  KEY `emp_id` (`emp_num`,`sppd_num`),
  KEY `emp_id_2` (`emp_num`),
  KEY `sppd_id` (`sppd_num`),
  KEY `emp_id_3` (`emp_num`),
  KEY `sppd_id_2` (`sppd_num`),
  KEY `flight_res_id` (`flight_res_id`),
  KEY `from_city` (`from_city`),
  KEY `to_city` (`to_city`),
  CONSTRAINT `sppd_flight_res_ibfk_1` FOREIGN KEY (`emp_num`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sppd_flight_res_ibfk_2` FOREIGN KEY (`sppd_num`) REFERENCES `sppd_data` (`sppd_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sppd_flight_res_ibfk_3` FOREIGN KEY (`flight_res_id`) REFERENCES `reservation_data` (`res_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sppd_flight_res_ibfk_4` FOREIGN KEY (`from_city`) REFERENCES `airport_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sppd_flight_res_ibfk_5` FOREIGN KEY (`to_city`) REFERENCES `airport_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sppd_flight_res`
--

LOCK TABLES `sppd_flight_res` WRITE;
/*!40000 ALTER TABLE `sppd_flight_res` DISABLE KEYS */;
/*!40000 ALTER TABLE `sppd_flight_res` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sppd_hotel_res`
--

DROP TABLE IF EXISTS `sppd_hotel_res`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sppd_hotel_res` (
  `hotel_res_id` int(11) NOT NULL AUTO_INCREMENT,
  `sppd_num` int(11) NOT NULL,
  `emp_num` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `duration` int(2) NOT NULL,
  `rooms` int(2) NOT NULL,
  PRIMARY KEY (`hotel_res_id`),
  KEY `sppd_id` (`sppd_num`,`emp_num`),
  KEY `sppd_id_2` (`sppd_num`),
  KEY `emp_id` (`emp_num`),
  KEY `sppd_num` (`sppd_num`),
  CONSTRAINT `sppd_hotel_res_ibfk_1` FOREIGN KEY (`sppd_num`) REFERENCES `sppd_data` (`sppd_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sppd_hotel_res_ibfk_2` FOREIGN KEY (`emp_num`) REFERENCES `hrms_employees` (`emp_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sppd_hotel_res`
--

LOCK TABLES `sppd_hotel_res` WRITE;
/*!40000 ALTER TABLE `sppd_hotel_res` DISABLE KEYS */;
/*!40000 ALTER TABLE `sppd_hotel_res` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sppd_transport_fee`
--

DROP TABLE IF EXISTS `sppd_transport_fee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sppd_transport_fee` (
  `fee_trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `sppd_num` int(11) NOT NULL,
  `transport_name` varchar(40) NOT NULL,
  `from_dest` varchar(255) NOT NULL,
  `to_dest` varchar(255) NOT NULL,
  `transport_amount` double NOT NULL,
  `transport_fee` double NOT NULL,
  PRIMARY KEY (`fee_trans_id`),
  KEY `sppd_id` (`sppd_num`),
  KEY `sppd_id_2` (`sppd_num`),
  CONSTRAINT `sppd_transport_fee_ibfk_1` FOREIGN KEY (`sppd_num`) REFERENCES `sppd_data` (`sppd_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sppd_transport_fee`
--

LOCK TABLES `sppd_transport_fee` WRITE;
/*!40000 ALTER TABLE `sppd_transport_fee` DISABLE KEYS */;
/*!40000 ALTER TABLE `sppd_transport_fee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_komen_detail`
--

DROP TABLE IF EXISTS `view_komen_detail`;
/*!50001 DROP VIEW IF EXISTS `view_komen_detail`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_komen_detail` (
  `comment_id` int(11),
  `comment` text,
  `nota_id` varchar(20),
  `comment_date` timestamp,
  `emp_num` int(11),
  `status_disposisi` tinyint(4),
  `emp_firstname` varchar(30),
  `emp_lastname` varchar(30)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_nomor_nota`
--

DROP TABLE IF EXISTS `view_nomor_nota`;
/*!50001 DROP VIEW IF EXISTS `view_nomor_nota`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_nomor_nota` (
  `urutan` int(11),
  `tipe` varchar(45),
  `skip_delimiter` tinyint(1),
  `nota_id` varchar(50),
  `format_id` int(11),
  `value` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_nota_disposisi`
--

DROP TABLE IF EXISTS `view_nota_disposisi`;
/*!50001 DROP VIEW IF EXISTS `view_nota_disposisi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_nota_disposisi` (
  `cc_status` int(11),
  `disposisi_status` int(11),
  `nota_id` varchar(20),
  `emp_num` int(11),
  `emp_firstname` varchar(30),
  `emp_lastname` varchar(30),
  `emp_job` int(11),
  `job_code` varchar(100),
  `nota_tindakan` varchar(255),
  `sender` varchar(100)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_nota_employees`
--

DROP TABLE IF EXISTS `view_nota_employees`;
/*!50001 DROP VIEW IF EXISTS `view_nota_employees`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_nota_employees` (
  `emp_num` int(11),
  `emp_id` varchar(50),
  `emp_firstname` varchar(30),
  `emp_lastname` varchar(30),
  `emp_job` int(11),
  `job_name` varchar(50),
  `job_code` varchar(10),
  `job_id` varchar(10),
  `job_description` varchar(255),
  `org_num` int(11),
  `org_name` varchar(50),
  `org_code` varchar(10)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_nota_examiner`
--

DROP TABLE IF EXISTS `view_nota_examiner`;
/*!50001 DROP VIEW IF EXISTS `view_nota_examiner`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_nota_examiner` (
  `examine_id` int(11),
  `nota_id` varchar(20),
  `examiner_id` int(11),
  `emp_firstname` varchar(30),
  `emp_lastname` varchar(30),
  `emp_job` int(11),
  `job_name` varchar(50),
  `job_code` varchar(10),
  `job_description` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_nota_kepada`
--

DROP TABLE IF EXISTS `view_nota_kepada`;
/*!50001 DROP VIEW IF EXISTS `view_nota_kepada`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_nota_kepada` (
  `cc_status` int(11),
  `disposisi_status` int(11),
  `nota_id` varchar(20),
  `emp_num` int(11),
  `emp_firstname` varchar(30),
  `emp_lastname` varchar(30),
  `emp_job` int(11),
  `job_code` varchar(10),
  `job_name` varchar(50)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_nota_referensi`
--

DROP TABLE IF EXISTS `view_nota_referensi`;
/*!50001 DROP VIEW IF EXISTS `view_nota_referensi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_nota_referensi` (
  `referensi_id` int(11),
  `nota_id` varchar(20),
  `nota_referensi` varchar(20),
  `nota_number` varchar(255)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_nota_tembusan`
--

DROP TABLE IF EXISTS `view_nota_tembusan`;
/*!50001 DROP VIEW IF EXISTS `view_nota_tembusan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_nota_tembusan` (
  `cc_status` int(11),
  `disposisi_status` int(11),
  `nota_id` varchar(20),
  `emp_num` int(11),
  `emp_firstname` varchar(30),
  `emp_lastname` varchar(30),
  `emp_job` int(11),
  `job_code` varchar(10),
  `job_name` varchar(50)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'eoffice'
--

--
-- Dumping routines for database 'eoffice'
--
/*!50003 DROP FUNCTION IF EXISTS `getEmpName` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 FUNCTION `getEmpName`(empNum int) RETURNS varchar(100) CHARSET latin1
    READS SQL DATA
    DETERMINISTIC
begin
    declare name varchar(100) default '-';
    select concat(emp_firstname,' ',emp_lastname) into name
    from hrms_employees
    where emp_num = empNum;
    
    return name;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getJobName` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 FUNCTION `getJobName`(empNum int) RETURNS varchar(100) CHARSET latin1
    READS SQL DATA
    DETERMINISTIC
begin

    declare name varchar(100) default '-';

    select (job_name) into name

    from hrms_job

    where job_num in (select emp_job from hrms_employees where emp_num = empNum);

    

    return name;

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `settingFolder` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `settingFolder`()
BEGIN
DECLARE record_not_found INTEGER DEFAULT 0;
declare idUser int;
Declare c1 cursor for 
select emp_num from hrms_employees;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET record_not_found = 1; 

OPEN c1;
allUser: LOOP 
fetch c1 into idUser;

IF record_not_found THEN
    LEAVE allUser; 
END IF;

insert into nota_folder(folder_name,emp_num) values('inbox',idUser);
insert into nota_folder(folder_name,emp_num) values('progress',idUser);
insert into nota_folder(folder_name,emp_num) values('draft',idUser);
insert into nota_folder(folder_name,emp_num) values('sent',idUser);

END LOOP allUser;
close c1;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `nota_archive_view`
--

/*!50001 DROP TABLE IF EXISTS `nota_archive_view`*/;
/*!50001 DROP VIEW IF EXISTS `nota_archive_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nota_archive_view` AS select `d`.`nota_id` AS `nota_id`,`d`.`nota_number` AS `nota_number`,`d`.`nota_perihal` AS `nota_perihal`,`d`.`nota_isi` AS `nota_isi`,`d`.`nota_kode_masalah` AS `kode_masalah`,`getJobName`(`d`.`nota_creator_num`) AS `creator`,`getJobName`(`d`.`nota_sender_num`) AS `sender`,`getJobName`(`d`.`nota_disposisi_num`) AS `forwarder`,`d`.`nota_read_status` AS `nota_read_status`,`f`.`emp_num` AS `emp_num`,`d`.`nota_date` AS `nota_date`,`fm`.`nota_create_date` AS `create_date` from ((`nota_data` `d` join `nota_folder` `f`) join `nota_folder_mapping` `fm`) where ((`d`.`nota_id` = `fm`.`nota_id`) and (`fm`.`archive_status` = 1) and (`fm`.`folder_id` = `f`.`folder_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `nota_custom_view`
--

/*!50001 DROP TABLE IF EXISTS `nota_custom_view`*/;
/*!50001 DROP VIEW IF EXISTS `nota_custom_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nota_custom_view` AS select `fm`.`mapping_id` AS `mapping_id`,`d`.`nota_id` AS `nota_id`,`d`.`nota_number` AS `nota_number`,`d`.`nota_perihal` AS `nota_perihal`,`d`.`nota_isi` AS `nota_isi`,`d`.`nota_creator_num` AS `nota_creator_num`,`d`.`nota_sender_num` AS `nota_sender_num`,`d`.`nota_disposisi_num` AS `nota_disposisi_num`,`d`.`nota_read_status` AS `nota_read_status`,`d`.`nota_date` AS `nota_date`,`d`.`nota_kode_masalah` AS `nota_kode_masalah`,`getJobName`(`d`.`nota_creator_num`) AS `creator`,`getJobName`(`d`.`nota_sender_num`) AS `sender`,`getJobName`(`d`.`nota_disposisi_num`) AS `forwarder`,`f`.`folder_name` AS `folder_name`,`f`.`emp_num` AS `emp_num`,`fm`.`nota_create_date` AS `create_date`,`o`.`segera` AS `segera` from (((`nota_data` `d` join `nota_folder` `f`) join `nota_folder_mapping` `fm`) join `nota_options` `o`) where ((`d`.`nota_id` = `fm`.`nota_id`) and (`fm`.`archive_status` = 0) and (`fm`.`folder_id` = `f`.`folder_id`) and (`d`.`nota_id` = `o`.`nota_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `nota_draft_view`
--

/*!50001 DROP TABLE IF EXISTS `nota_draft_view`*/;
/*!50001 DROP VIEW IF EXISTS `nota_draft_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nota_draft_view` AS select `d`.`nota_id` AS `nota_id`,`d`.`nota_number` AS `nota_number`,`d`.`nota_perihal` AS `nota_perihal`,`d`.`nota_isi` AS `nota_isi`,`d`.`nota_kode_masalah` AS `kode_masalah`,`getJobName`(`d`.`nota_creator_num`) AS `creator`,`getJobName`(`d`.`nota_disposisi_num`) AS `forwarder`,`d`.`nota_read_status` AS `nota_read_status`,`f`.`emp_num` AS `emp_num`,`d`.`nota_date` AS `nota_date`,`fm`.`nota_create_date` AS `create_date` from ((`nota_data` `d` join `nota_folder` `f`) join `nota_folder_mapping` `fm`) where ((`d`.`nota_id` = `fm`.`nota_id`) and (`fm`.`archive_status` = 0) and (`fm`.`folder_id` = `f`.`folder_id`) and (`f`.`folder_name` like 'draft')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `nota_inbox_view`
--

/*!50001 DROP TABLE IF EXISTS `nota_inbox_view`*/;
/*!50001 DROP VIEW IF EXISTS `nota_inbox_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nota_inbox_view` AS select `d`.`nota_id` AS `nota_id`,`d`.`nota_number` AS `nota_number`,`d`.`nota_perihal` AS `nota_perihal`,`d`.`nota_isi` AS `nota_isi`,`d`.`nota_creator_num` AS `nota_creator_num`,`d`.`nota_sender_num` AS `nota_sender_num`,`d`.`nota_disposisi_num` AS `nota_disposisi_num`,`d`.`nota_read_status` AS `nota_read_status`,`d`.`nota_date` AS `nota_date`,`d`.`nota_kode_masalah` AS `nota_kode_masalah`,`getEmpName`(`d`.`nota_creator_num`) AS `creator`,`getJobName`(`d`.`nota_sender_num`) AS `sender`,`getJobName`(`d`.`nota_disposisi_num`) AS `forwarder`,`f`.`emp_num` AS `emp_num`,`fm`.`nota_create_date` AS `create_date`,`o`.`segera` AS `segera` from (((`nota_data` `d` join `nota_folder` `f`) join `nota_folder_mapping` `fm`) join `nota_options` `o`) where ((`d`.`nota_id` = `fm`.`nota_id`) and (`fm`.`archive_status` = 0) and (`fm`.`folder_id` = `f`.`folder_id`) and (`f`.`folder_name` like 'inbox') and (`d`.`nota_id` = `o`.`nota_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `nota_progress_view`
--

/*!50001 DROP TABLE IF EXISTS `nota_progress_view`*/;
/*!50001 DROP VIEW IF EXISTS `nota_progress_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nota_progress_view` AS select `ex`.`examine_id` AS `examine_id`,`ex`.`exam_date` AS `exam_date`,`ex`.`exam_queue` AS `exam_queue`,`ex`.`nota_id` AS `nota_id`,`n`.`nota_perihal` AS `nota_perihal`,`n`.`nota_date` AS `nota_date`,`ex`.`examiner_id` AS `examiner_id`,`emp`.`emp_firstname` AS `emp_firstname`,`ex`.`ok_status` AS `ok_status`,`ex`.`return_status` AS `return_status`,`ex`.`reject_status` AS `reject_status`,`ex`.`read_status` AS `read_status`,`ex`.`sent_status` AS `sent_status`,`ex`.`status` AS `status`,`o`.`segera` AS `segera` from (((`nota_data` `n` join `hrms_employees` `emp`) join `nota_examine` `ex`) join `nota_options` `o`) where ((`ex`.`nota_id` = `n`.`nota_id`) and (`ex`.`examiner_id` = `emp`.`emp_num`) and (`n`.`nota_id` = `o`.`nota_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `nota_sent_view`
--

/*!50001 DROP TABLE IF EXISTS `nota_sent_view`*/;
/*!50001 DROP VIEW IF EXISTS `nota_sent_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nota_sent_view` AS select `d`.`nota_id` AS `nota_id`,`d`.`nota_number` AS `nota_number`,`d`.`nota_perihal` AS `nota_perihal`,`d`.`nota_isi` AS `nota_isi`,`d`.`nota_kode_masalah` AS `kode_masalah`,`getEmpName`(`d`.`nota_creator_num`) AS `creator`,`getEmpName`(`d`.`nota_disposisi_num`) AS `forwarder`,`d`.`nota_read_status` AS `nota_read_status`,`f`.`emp_num` AS `emp_num`,`d`.`nota_date` AS `nota_date`,`fm`.`nota_create_date` AS `create_date`,`o`.`segera` AS `segera` from (((`nota_data` `d` join `nota_folder` `f`) join `nota_folder_mapping` `fm`) join `nota_options` `o`) where ((`d`.`nota_id` = `fm`.`nota_id`) and (`fm`.`archive_status` = 0) and (`fm`.`folder_id` = `f`.`folder_id`) and (`f`.`folder_name` like 'sent') and (`d`.`nota_id` = `o`.`nota_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_komen_detail`
--

/*!50001 DROP TABLE IF EXISTS `view_komen_detail`*/;
/*!50001 DROP VIEW IF EXISTS `view_komen_detail`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_komen_detail` AS select `n`.`comment_id` AS `comment_id`,`n`.`comment` AS `comment`,`n`.`nota_id` AS `nota_id`,`n`.`comment_date` AS `comment_date`,`n`.`emp_num` AS `emp_num`,`n`.`status_disposisi` AS `status_disposisi`,`e`.`emp_firstname` AS `emp_firstname`,`e`.`emp_lastname` AS `emp_lastname` from (`nota_comment` `n` join `hrms_employees` `e`) where (`e`.`emp_num` = `n`.`emp_num`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_nomor_nota`
--

/*!50001 DROP TABLE IF EXISTS `view_nomor_nota`*/;
/*!50001 DROP VIEW IF EXISTS `view_nomor_nota`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_nomor_nota` AS select `n`.`urutan` AS `urutan`,`n`.`tipe` AS `tipe`,`n`.`skip_delimiter` AS `skip_delimiter`,`c`.`nota_id` AS `nota_id`,`c`.`format_id` AS `format_id`,`c`.`value` AS `value` from (`nota_format_code` `n` join `nota_nomor` `c`) where (`n`.`id_format_code` = `c`.`format_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_nota_disposisi`
--

/*!50001 DROP TABLE IF EXISTS `view_nota_disposisi`*/;
/*!50001 DROP VIEW IF EXISTS `view_nota_disposisi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_nota_disposisi` AS select `r`.`cc_status` AS `cc_status`,`r`.`disposisi_status` AS `disposisi_status`,`r`.`nota_id` AS `nota_id`,`r`.`emp_num` AS `emp_num`,`e`.`emp_firstname` AS `emp_firstname`,`e`.`emp_lastname` AS `emp_lastname`,`e`.`emp_job` AS `emp_job`,`getJobName`(`r`.`emp_num`) AS `job_code`,`r`.`nota_tindakan` AS `nota_tindakan`,`getJobName`(`r`.`emp_from`) AS `sender` from (`nota_receiver` `r` join `hrms_employees` `e`) where ((`r`.`emp_num` = `e`.`emp_num`) and (`r`.`cc_status` = 0) and (`r`.`disposisi_status` = 1)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_nota_employees`
--

/*!50001 DROP TABLE IF EXISTS `view_nota_employees`*/;
/*!50001 DROP VIEW IF EXISTS `view_nota_employees`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_nota_employees` AS select `e`.`emp_num` AS `emp_num`,`e`.`emp_id` AS `emp_id`,`e`.`emp_firstname` AS `emp_firstname`,`e`.`emp_lastname` AS `emp_lastname`,`e`.`emp_job` AS `emp_job`,`j`.`job_name` AS `job_name`,`j`.`job_code` AS `job_code`,`j`.`job_id` AS `job_id`,`j`.`job_description` AS `job_description`,`o`.`org_num` AS `org_num`,`o`.`org_name` AS `org_name`,`e`.`org_code` AS `org_code` from ((`hrms_organization` `o` join `hrms_employees` `e`) join `hrms_job` `j`) where ((`e`.`emp_job` = `j`.`job_num`) and (`e`.`emp_firstname` <> 'DEF') and (`o`.`org_code` = `e`.`org_code`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_nota_examiner`
--

/*!50001 DROP TABLE IF EXISTS `view_nota_examiner`*/;
/*!50001 DROP VIEW IF EXISTS `view_nota_examiner`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_nota_examiner` AS select `ex`.`examine_id` AS `examine_id`,`ex`.`nota_id` AS `nota_id`,`ex`.`examiner_id` AS `examiner_id`,`e`.`emp_firstname` AS `emp_firstname`,`e`.`emp_lastname` AS `emp_lastname`,`e`.`emp_job` AS `emp_job`,`j`.`job_name` AS `job_name`,`j`.`job_code` AS `job_code`,`j`.`job_description` AS `job_description` from ((`hrms_employees` `e` join `hrms_job` `j`) join `nota_examine` `ex`) where ((`e`.`emp_num` = `ex`.`examiner_id`) and (`e`.`emp_job` = `j`.`job_num`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_nota_kepada`
--

/*!50001 DROP TABLE IF EXISTS `view_nota_kepada`*/;
/*!50001 DROP VIEW IF EXISTS `view_nota_kepada`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_nota_kepada` AS select `r`.`cc_status` AS `cc_status`,`r`.`disposisi_status` AS `disposisi_status`,`r`.`nota_id` AS `nota_id`,`r`.`emp_num` AS `emp_num`,`e`.`emp_firstname` AS `emp_firstname`,`e`.`emp_lastname` AS `emp_lastname`,`e`.`emp_job` AS `emp_job`,`e`.`job_code` AS `job_code`,`j`.`job_name` AS `job_name` from ((`nota_receiver` `r` join `hrms_employees` `e`) join `hrms_job` `j`) where ((`r`.`emp_num` = `e`.`emp_num`) and (`r`.`cc_status` = 0) and (`r`.`disposisi_status` = 0) and (`e`.`emp_job` = `j`.`job_num`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_nota_referensi`
--

/*!50001 DROP TABLE IF EXISTS `view_nota_referensi`*/;
/*!50001 DROP VIEW IF EXISTS `view_nota_referensi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_nota_referensi` AS select `r`.`referensi_id` AS `referensi_id`,`r`.`nota_id` AS `nota_id`,`r`.`nota_referensi` AS `nota_referensi`,`n`.`nota_number` AS `nota_number` from (`nota_data` `n` join `nota_referensi` `r`) where (`n`.`nota_id` = `r`.`nota_referensi`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_nota_tembusan`
--

/*!50001 DROP TABLE IF EXISTS `view_nota_tembusan`*/;
/*!50001 DROP VIEW IF EXISTS `view_nota_tembusan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_nota_tembusan` AS select `r`.`cc_status` AS `cc_status`,`r`.`disposisi_status` AS `disposisi_status`,`r`.`nota_id` AS `nota_id`,`r`.`emp_num` AS `emp_num`,`e`.`emp_firstname` AS `emp_firstname`,`e`.`emp_lastname` AS `emp_lastname`,`e`.`emp_job` AS `emp_job`,`e`.`job_code` AS `job_code`,`j`.`job_name` AS `job_name` from ((`nota_receiver` `r` join `hrms_employees` `e`) join `hrms_job` `j`) where ((`r`.`emp_num` = `e`.`emp_num`) and (`r`.`cc_status` = 1) and (`r`.`disposisi_status` = 0) and (`e`.`emp_job` = `j`.`job_num`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-09  8:58:48


-- create view vw_absensi as
-- select m.id,m.emp_num,m.absen_emp_num, a.waktu,a.keterangan,a.status,e.emp_firstname,e.emp_lastname,j.job_name
-- from absensi_monitor m, absensi a, hrms_employees e,hrms_job j
-- where
-- m.absen_emp_num = a.emp_num and
-- a.emp_num = e.emp_num and
-- e.emp_job = j.job_num
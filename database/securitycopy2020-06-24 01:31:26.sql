
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,'Registro de Entrada de una Visita'),(2,'Registro de Salida de una Visita'),(3,'Modificacion a su Perfil'),(4,'Visualizo los Reportes de Visita'),(5,'Descarga de Reportes de Visita');
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `bitacores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `action_id` bigint(20) unsigned DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bitacores_user_id_foreign` (`user_id`),
  KEY `bitacores_action_id_foreign` (`action_id`),
  CONSTRAINT `bitacores_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bitacores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `bitacores` WRITE;
/*!40000 ALTER TABLE `bitacores` DISABLE KEYS */;
INSERT INTO `bitacores` VALUES (1,2,1,'hizo un registro de entrada del visitante Carlos Francisco a la zona de FUNDABIT','2020-06-24 05:30:59');
/*!40000 ALTER TABLE `bitacores` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `direction_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direction_tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `direction_id` bigint(20) unsigned DEFAULT NULL,
  `ticket_id` bigint(20) unsigned DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `direction_tickets_direction_id_foreign` (`direction_id`),
  KEY `direction_tickets_ticket_id_foreign` (`ticket_id`),
  CONSTRAINT `direction_tickets_direction_id_foreign` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `direction_tickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `direction_tickets` WRITE;
/*!40000 ALTER TABLE `direction_tickets` DISABLE KEYS */;
INSERT INTO `direction_tickets` VALUES (1,1,1,'8pr7ept0e9ukrdkgoxd5'),(2,1,2,'ys04rm486f2yv8qs6stj'),(3,1,3,'xgihognd9z0z0neov9ca'),(4,2,1,'zal5jqiuvecynfvyu41g'),(5,2,2,'okg987h6467tyfidpvvv'),(6,2,3,'72rmwne78xsguq9y1s14'),(7,3,1,'blenq6icawiazilwjhvb'),(8,3,2,'r4kspcqngm2pyxmdlxx0'),(9,3,3,'k3dusx7cs6qxs82ccag5'),(10,4,1,'ycy2gy4moedwj4zhxwwr'),(11,4,2,'6gq3cb83ob9k3kjfxbrz'),(12,4,3,'kbjb2fnakpy9ky1fx0uy'),(13,5,1,'h0vvqt3qfvkge780p0qc'),(14,5,2,'05aws98d9yvw8l1sb8bc'),(15,5,3,'ofu2b49somo3k1faymm6'),(16,6,1,'ga7dkgsx3bpnmm1ksdfu'),(17,6,2,'zuzrej4wlzzo47bocwzy'),(18,6,3,'kd1j757nlbp7jzfe408b'),(19,7,1,'wbtp38focsra0gil4xsp'),(20,7,2,'e6doj03rr0inndu5z0nf'),(21,7,3,'1nejkogxxe9b0gxktg89'),(22,8,1,'g1qlzm32zdi8fjik1epb'),(23,8,2,'2s2afj0u7m70ibetdm0u'),(24,8,3,'x2w9an2j7hosqyst4pi2'),(25,9,1,'yufj9xl4zbyzytvunvbz'),(26,9,2,'yt4qs9rf6bht2m23sgzp'),(27,9,3,'xlrkb0q5wqd5luzmwzji'),(28,10,1,'dwit19kqyhy5pwcxj2wh'),(29,10,2,'7ia4ffsnwsewkep3uzo7'),(30,10,3,'18f2vtpbwm8mrpr8o1dp'),(31,11,1,'ntdc7k9o1l12d10jzd64'),(32,11,2,'iootbciclq5rttfpj1y8'),(33,11,3,'20ed1cl15mh1cepnrkpr'),(34,12,1,'o94sow737vluvpggtcco'),(35,12,2,'4zod8iqhkyb73qxndhju'),(36,12,3,'htzved8g9i4v4c05ls9g'),(37,13,1,'30e1pze0vbo3e3e0icd0'),(38,13,2,'dgv6n5d6e4k58jie2b0e'),(39,13,3,'x8kcb471oljnnzh7xfml'),(40,14,1,'9m626v2jnwbs1oe9xw3y'),(41,14,2,'k422bsostvkmyncpysiu'),(42,14,3,'vwllyh4llmw04h5t1af9'),(43,15,1,'khu5w8duuxjola61ls13'),(44,15,2,'o9ijhgc6wgwc5tugxdpz'),(45,15,3,'j8kqk528b153w4ug5snz'),(46,16,1,'flzcrbh8escr5426vf2n'),(47,16,2,'wwa2t2l0dhvcfmqm1zu3'),(48,16,3,'pis6b35gjq4xsnyssbnc'),(49,17,1,'pbxw1vd2udvru41ihcw7'),(50,17,2,'womq9gygsjytvvafe85g'),(51,17,3,'34wjurpmbg6gnx48nrq3'),(52,18,1,'vw8gjb11x5jo4s4q3ai8'),(53,18,2,'1n88opg60mcbm3oxdakw'),(54,18,3,'e0wwg73mtgrwbzqxxlg0'),(55,19,1,'46n02g99rszjjy6yu12q'),(56,19,2,'69eedv19ymlt7khzne92'),(57,19,3,'icow2rfknlf1i63b9mcl'),(58,20,1,'z281qiw5dfidtz1smtwo'),(59,20,2,'gzk4rl9q1zhhymowgnna'),(60,20,3,'jz6opbo3da6xcu3jmx7j'),(61,21,1,'9tsq6rjq1fda41tycszg'),(62,21,2,'f50lpa0cyxp7zoxidymu'),(63,21,3,'aozh459jzs4ftz2f54dw'),(64,22,1,'scdigtgwpm7r5xjj0fdm'),(65,22,2,'noxz1iezfojk6g52nfdy'),(66,22,3,'xccri56vus3ezhcibxhc'),(67,23,1,'kyvhtuotsg3sy98zj8s5'),(68,23,2,'k0azx22a9kdbhamq6r2x'),(69,23,3,'vz4a98axn63jx9lwm6p6'),(70,24,1,'uriyk1zyeuyeoherwynr'),(71,24,2,'tf4spe2swyfoar5huiaw'),(72,24,3,'i4ou7kves7yk6vk2035i'),(73,25,1,'9fifgwvlfl03lvygkr5n'),(74,25,2,'xddqb8h0yqrut0fjrjde'),(75,25,3,'4nah55sc3x9dfb9avpot'),(76,26,1,'42k0uxxrj1zth1abjob4'),(77,26,2,'3w8ztb6dtgtpqntpavti'),(78,26,3,'ngnqu7zzww9xpplzx263'),(79,27,1,'8xamj1eomu3lr7c43xtz'),(80,27,2,'4wm1t69abu4d94fu7rs6'),(81,27,3,'3dncm355u59buo56ff9s'),(82,28,1,'4uu5231ofun153d6fy85'),(83,28,2,'2tpf4oy4bl3enhvmt2z9'),(84,28,3,'luh0q15a87voneg4ylm5'),(85,29,1,'6ratm6w9e12zhqjhhfmb'),(86,29,2,'3hr1n0ymgo8psx6e162p'),(87,29,3,'3188tmeou5pb9xs5e1qz'),(88,30,1,'wf466jh1ny5uilnp50lj'),(89,30,2,'3g602xa9zqhrky0miytd'),(90,30,3,'3r9vkwiyrdspxmez87lh'),(91,31,1,'li5nla8hrp9834ulzyt2'),(92,31,2,'bsicxuf3tbwye6hbfp56'),(93,31,3,'vqfifl7u42fzmcsbzkwc'),(94,32,1,'stpibkqtk1x5uuiyd15n'),(95,32,2,'tyqzhslxguu0d6cvvuz5'),(96,32,3,'dhwmg2jj2gvl54my5ex3'),(97,33,1,'hv0tek5971h3lthsm5x6'),(98,33,2,'vb4fma6tziuevnl542w6'),(99,33,3,'j27gburug1y5q4v9tv4n'),(100,34,1,'rvgu3lgdvhi1ousgtfbk'),(101,34,2,'c84p8anmj49m299mvvna'),(102,34,3,'1wsec1uryp60mocusej8'),(103,35,1,'ouuf7bhw6lwxvbgyxs6p'),(104,35,2,'gijci554pdz8lkj14lg6'),(105,35,3,'j369c2ly63yw11j4m8j0'),(106,36,1,'rh8dn2qde64hh646gao6'),(107,36,2,'htzhegz6jigkhzu9s5nw'),(108,36,3,'8zd2ls6a4t8wb9hv7i7x'),(109,37,1,'hsmzif0nu20mczj3afr9'),(110,37,2,'pmgdlyuudu4rtcrd5qt5'),(111,37,3,'2fxcpavuq1t2rja8uoac'),(112,38,1,'1gvij1aoabe875hv9g50'),(113,38,2,'6m3t4kyasqn4edd2efbk'),(114,38,3,'vsery6njl4mi6ufci34h'),(115,39,1,'hvt8jleb4iw55s06t42y'),(116,39,2,'986xj8oet794i28xipqk'),(117,39,3,'430jfw8u9ihxzysz110b'),(118,40,1,'y82md8rpqsg1dk9jhtnl'),(119,40,2,'ojpid3ge7xp83nw366fd'),(120,40,3,'7q8vbpoqm69cfa9itlzf'),(121,41,1,'ioxlfku9e4fyp0y4or9x'),(122,41,2,'n6d22ns719d9h0kscrp9'),(123,41,3,'iucep7tlcl6wdr6azz0g'),(124,42,1,'klqfxwdkhcgr3g6d2h3b'),(125,42,2,'g8z0p1a1ou4a19qfbocw'),(126,42,3,'b60zexdr6wi6xh37afnt'),(127,43,1,'8nlc91o87q5kyhl9cv4i'),(128,43,2,'t0p7yhtg8eumwshpvatk'),(129,43,3,'0y1yroa49huhrbsb33f7'),(130,44,1,'99hzjf6qjkogp9sb6lss'),(131,44,2,'70vlekjivdhksv63qc11'),(132,44,3,'zw6wmp2olxzlyaqi501u'),(133,45,1,'k0o5asjgavl3zmwlalgk'),(134,45,2,'r08wvgell4t26vx33a9s'),(135,45,3,'a3gdr4p5ni0vo9izbx95');
/*!40000 ALTER TABLE `direction_tickets` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `directions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `floor_id` bigint(20) unsigned DEFAULT NULL,
  `zone_id` bigint(20) unsigned DEFAULT NULL,
  `sector_id` bigint(20) unsigned DEFAULT NULL,
  `dependence` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `directions_floor_id_foreign` (`floor_id`),
  KEY `directions_zone_id_foreign` (`zone_id`),
  KEY `directions_sector_id_foreign` (`sector_id`),
  CONSTRAINT `directions_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `directions_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `directions_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `directions` WRITE;
/*!40000 ALTER TABLE `directions` DISABLE KEYS */;
INSERT INTO `directions` VALUES (1,1,1,1,1),(2,1,1,2,1),(3,1,1,3,1),(4,1,2,4,1),(5,1,2,5,1),(6,1,2,6,1),(7,1,2,7,1),(8,1,2,8,1),(9,2,3,9,1),(10,2,3,10,1),(11,2,3,11,1),(12,2,3,12,1),(13,2,3,13,1),(14,2,4,14,1),(15,2,4,15,1),(16,2,4,16,1),(17,2,4,17,1),(18,2,4,18,1),(19,2,4,19,1),(20,2,5,20,1),(21,2,5,21,1),(22,2,5,22,1),(23,2,5,23,1),(24,2,5,24,1),(25,2,5,25,1),(26,2,5,26,1),(27,2,5,27,1),(28,3,6,28,1),(29,3,6,29,1),(30,3,6,30,1),(31,3,3,31,1),(32,3,3,32,1),(33,3,3,33,1),(34,3,3,34,1),(35,3,4,35,1),(36,3,4,36,1),(37,3,4,37,1),(38,3,4,38,1),(39,3,4,39,1),(40,3,4,40,1),(41,4,3,41,1),(42,4,4,42,1),(43,4,4,43,1),(44,4,5,44,1),(45,4,5,45,1);
/*!40000 ALTER TABLE `directions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `floors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `floors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `floor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `floors` WRITE;
/*!40000 ALTER TABLE `floors` DISABLE KEYS */;
INSERT INTO `floors` VALUES (1,'planta baja','a'),(2,'piso 1','b'),(3,'piso 2','c'),(4,'piso 3','d');
/*!40000 ALTER TABLE `floors` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `handling_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `handling_times` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `input` timestamp NULL DEFAULT NULL,
  `output` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `handling_times` WRITE;
/*!40000 ALTER TABLE `handling_times` DISABLE KEYS */;
INSERT INTO `handling_times` VALUES (1,'2020-06-24 05:30:58',NULL),(2,'2020-06-24 05:30:58',NULL),(3,'2020-06-24 05:30:58',NULL),(4,'2020-06-24 05:30:58',NULL),(5,'2020-06-24 05:30:58',NULL);
/*!40000 ALTER TABLE `handling_times` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (169,'2014_10_12_000000_create_users_table',1),(170,'2019_11_13_133216_create_rols_table',1),(171,'2019_11_13_133852_add_rol_id_to_users',1),(172,'2020_01_03_003809_create_visitors_table',1),(173,'2020_01_03_003934_create_handling_times_table',1),(174,'2020_01_03_004159_create_tickets_table',1),(175,'2020_01_03_004343_create_floors_table',1),(176,'2020_01_03_010044_create_sectors_table',1),(177,'2020_01_03_010152_create_zones_table',1),(178,'2020_01_03_020051_add_user_id_to_visitors_table',1),(179,'2020_01_22_233258_create_directions_table',1),(180,'2020_01_22_233748_add_floor_id_to_directions_table',1),(181,'2020_01_22_233901_add_zone_id_to_directions_table',1),(182,'2020_01_22_233952_add_sector_id_to_directions_table',1),(183,'2020_01_23_120016_add_handling_time_id_to_visitors_table',1),(184,'2020_01_29_092758_add_dependeci_to_directions_table',1),(185,'2020_02_10_032530_create_password_recovers_table',1),(186,'2020_02_16_122814_add_nick_name_to_users_table',1),(187,'2020_05_13_233552_create_bitacores_table',1),(188,'2020_05_13_233637_add_user_id_to_bitacores_table',1),(189,'2020_05_17_155438_create_actions_table',1),(190,'2020_05_26_215629_create_direction_tickets_table',1),(191,'2020_05_26_215732_add_direction_id_to_direction_tickets_table',1),(192,'2020_05_26_220420_add_ticket_id_to_direction_tickets_table',1),(193,'2020_05_26_220827_add_action_id_to_bitacores_table',1),(194,'2020_06_06_225204_add_direction_ticket_id_to_visitors_table',1),(195,'2020_06_22_051955_add_sign_to_users_table',1),(196,'2020_06_23_210311_create_sistems_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_recovers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_recovers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_recovers_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_recovers` WRITE;
/*!40000 ALTER TABLE `password_recovers` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_recovers` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rols` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `rols` WRITE;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
INSERT INTO `rols` VALUES (1,'Super Admin'),(2,'Admin'),(3,'visitante'),(4,'Jefe de Zona');
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sectors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sectors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sectors` WRITE;
/*!40000 ALTER TABLE `sectors` DISABLE KEYS */;
INSERT INTO `sectors` VALUES (1,'Atención al Ciudadano','a'),(2,'División de Educación Niños, Niñas y Población con Necesidades Educativas\nEspeciales','b'),(3,'Seguridad Social/SISME','c'),(4,'División de Supervisión','a'),(5,'Coordinación de Registro Control de Estudio','b'),(6,'Coordinación de Planteles Privados','c'),(7,'Coordinación de Municipios Escolares','d'),(8,'Archivo y Tipeo','e'),(9,'División de Gestión Interna','a'),(10,'Coordinación de Gestión Humana','b'),(11,'Oficina de Gremiales, Reposo, Vacaciones y Suplencias','c'),(12,'Oficina de Permisos y Área Social','d'),(13,'Analistas de Gestión Humana','d'),(14,'División de Adolescentes, Jóvenes y Población Adulta','a'),(15,'Auditoria Interna','b'),(16,'Coordinación de Media Técnica','c'),(17,'Coordinación de Media General','d'),(18,'Coordinación Modalidad Adultos','e'),(19,'Coordinación de Educación Física y Recreación','f'),(20,'División de Comunidades Educativas y Unión con el Pueblo','a'),(21,'Coordinación de Administración','b'),(22,'Oficina de Planificación y Presupuesto','c'),(23,'Coordinación de Defensoría y Orientación Educativa','d'),(24,'Oficina OPSU','e'),(25,'Coordinación de Participación Estudiantil','f'),(26,'Coordinación del Programa Todas las Manos a la Siembra','g'),(27,'Centro de Reproducción, Impresión y Copiado','h'),(28,'Despacho','a'),(29,'Asistente del Despacho','b'),(30,'Sala Situacional','c'),(31,'Sala Video Conferencia','a'),(32,'FUNDABIT','b'),(33,'Informática','c'),(34,'Prensa','d'),(35,'División de Instalaciones y Logística','a'),(36,'Coordinación de Seguridad','b'),(37,'Coordinación de Instalaciones','c'),(38,'Coordinación de Logística','d'),(39,'Coordinación de Protección Socio-Económica y Salud','e'),(40,'Coordinación de Cultura','e'),(41,'Archivo','a'),(42,'Coordinación de Consultoría Jurídica','a'),(43,'División de Investigación y Formación Docente','b'),(44,'Oficina de Misión Robinson','a'),(45,'Archivo de Auditoria Interna','b');
/*!40000 ALTER TABLE `sectors` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sistems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sistems` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `copy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sistems` WRITE;
/*!40000 ALTER TABLE `sistems` DISABLE KEYS */;
/*!40000 ALTER TABLE `sistems` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ticket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'visitante'),(2,'provisional'),(3,'video conferencia');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nick_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol_id` bigint(20) unsigned DEFAULT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_identification_card_unique` (`identification_card`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gabriel Antonio','Viloria Aparicio','27167028','gabriel.viloria0812@gmail.com',NULL,'04149017184','$2y$10$7Cn/miD00POFBqnPSfzO..oiKBqhw8VhvPeI87bGBkkLJ2UF3tdEa',NULL,1,NULL),(2,'Miguel','Padron','26666666','miguelpadron1234@gmail.com',NULL,'04149017183','$2y$10$RrYP.jxjqMeo4C/PVOD5XuTK7Sswzp1o4r29jBF13RoWUkUwMZPZq',NULL,2,NULL),(3,'Delta','Cassin','9245907','judson44@example.com',NULL,'7848931','$2y$10$B2i/OjjoLCY4P62GuCRwruuXAhrVchO5hU.zpnJ4cNXXJ/QSfNQ22',NULL,3,NULL),(4,'Noe','Corwin','1938551','genoveva46@example.net',NULL,'992680','$2y$10$cQ7mISaOq.f9q2p.oqDntOGvG8I5De.vzi8b3e43DXE2Rjtj3Xffq',NULL,3,NULL),(5,'Mireille','Kuvalis','5041423','herman38@example.com',NULL,'3996392','$2y$10$ds60wvX4su/ODl7vQpUqrOff6axx5Mg5ndRNn5oPfYjkHYcmWfnJG',NULL,4,NULL),(6,'Janie','Botsford','8325870','tmccullough@example.org',NULL,'848308','$2y$10$ny0V80r9tH//j09Mx2UWxeTzx9zeFO8ND2tjyI7oeggpGVAvVP7rq',NULL,2,NULL),(7,'Leon','Torp','4159229','pacocha.deanna@example.com',NULL,'154425','$2y$10$0X8FyD45OitLECJWb.HEyOdCA6m8.szB8saLv21qnRKZQjbQpxc7K',NULL,4,NULL),(8,'Thurman','Botsford','4881977','tyra.dach@example.net',NULL,'6110919','$2y$10$.cvBw4eq0ui7//C/KZME1.g0LFRDK9/JefXiZgfN0BZVqii4TddSW',NULL,4,NULL),(9,'Velma','Pagac','4717078','rippin.helga@example.org',NULL,'2665514','$2y$10$0hKzr.YIGS/bLbdsVQdmauBN4waRBt5uYa8LpjCqb0m4ZUPR3EqHq',NULL,2,NULL),(10,'Eldon','Olson','4825999','ulebsack@example.net',NULL,'3884115','$2y$10$vnYRDpfbzz1aWlW.D1Y1yuCAuG3eLSW8bUi6Z3p9vou1aCD7Gnckq',NULL,2,NULL),(11,'Angelita','Turner','9398438','percy58@example.org',NULL,'9066250','$2y$10$kdLApoa9mcBfDgrtKIpt9uVx.RrPFqxJj9prStrtl5UvuSCFYGMSS',NULL,4,NULL),(12,'Maritza','Greenholt','2598642','jordan.yundt@example.org',NULL,'4180648','$2y$10$Ynm5GDSvgENg829LeBsfC.ilgPtdDNLItiG700vhe1ga0XjlILcYG',NULL,3,NULL),(13,'Jovany','Connelly','286257','maynard63@example.org',NULL,'88847','$2y$10$5qdAedKx/Upfsqgk6aRlmuURQ/0r/pFwBvGVcxU6rY0MSfxkCjAUy',NULL,3,NULL),(14,'Bobby','Powlowski','1324761','koepp.edyth@example.com',NULL,'5567906','$2y$10$swUxvVshetOmlrjWgqJNo..Yta3uZ5X.0tKo23heMDGBhe94IJPsW',NULL,3,NULL),(15,'Evert','Franecki','1196117','osborne.oconnell@example.com',NULL,'561634','$2y$10$aHYfZfWDWjFitcWrJw8GQe1pygGSTIRUBv0CjrET3LyffYSNLe.fe',NULL,3,NULL),(16,'Emmy','Murphy','132746','koby.abbott@example.org',NULL,'3193458','$2y$10$1YoUbO8Nz9GAZr2RCtqBeurxsQhVLe1gJKurjTPlsVHgFrUEK9bb6',NULL,4,NULL),(17,'Asia','Feest','4156691','abbott.brionna@example.net',NULL,'3389228','$2y$10$5uNJWEb.b5vSg8DZCi6bIu/SZWgf.41ITWa6WE10tZS6q9fh0vVoS',NULL,3,NULL),(18,'Levi','Parisian','3942952','dach.esta@example.com',NULL,'4213802','$2y$10$98RXbr2l6.ketWeucM811uM.3aL4J04jyBG0Ij4zP7fU1XkicWuEq',NULL,3,NULL),(19,'Noemy','Herman','3141415','jordy99@example.com',NULL,'664278','$2y$10$8ppLM93Mji0XsSO.7idghucFd8Y8b5lhKQpURv0DRgEnywGLkytqO',NULL,4,NULL),(20,'Shanie','Larson','330517','lehner.gianni@example.net',NULL,'7266627','$2y$10$Z0Ae5qWPDXkbuVBnLOIwL.aYHFJv9fS0abOKGVH0oXoPD0lt2dD2a',NULL,4,NULL),(21,'Keely','Balistreri','2620347','hand.alanis@example.com',NULL,'8577040','$2y$10$uRF49XF9smtMd/7ycnMEB.3JIjkp5e8RquVsi9aAABG/51xP.1uHO',NULL,4,NULL),(22,'Dennis','Brekke','5459146','camren.upton@example.com',NULL,'8365665','$2y$10$Rra4IvkwePSogbFVZYBQqO5WSm.6eLHQ5vzmkLuM.mnNlp4GJeaxm',NULL,3,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `handling_time_id` bigint(20) unsigned DEFAULT NULL,
  `direction_ticket_id` bigint(20) unsigned DEFAULT NULL,
  `provenance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `belongings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `visitors_user_id_foreign` (`user_id`),
  KEY `visitors_handling_time_id_foreign` (`handling_time_id`),
  KEY `visitors_direction_ticket_id_foreign` (`direction_ticket_id`),
  CONSTRAINT `visitors_direction_ticket_id_foreign` FOREIGN KEY (`direction_ticket_id`) REFERENCES `direction_tickets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `visitors_handling_time_id_foreign` FOREIGN KEY (`handling_time_id`) REFERENCES `handling_times` (`id`) ON DELETE CASCADE,
  CONSTRAINT `visitors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `visitors` WRITE;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
INSERT INTO `visitors` VALUES (1,20,1,130,'895 Miller Cove Suite 430\nNorth Hectortown, NM 12040-5018','','Voluptatem harum aspernatur molestiae quo impedit. Vitae suscipit non sequi libero. Nam ut ut tempore sit sapiente. Nostrum ratione dicta perspiciatis.','330517-99hzjf6qjkogp9sb6lss'),(2,15,2,30,'514 Hollis Centers Suite 868\nThompsonfort, NV 87947','','Eos nobis repellat incidunt ut eaque culpa non. Vel beatae consequuntur qui facilis vel delectus. Ea illum nihil et cumque hic aut est.','1196117-18f2vtpbwm8mrpr8o1dp'),(3,18,3,72,'6685 Paucek Valleys\nPort Presley, AR 40976','','Nihil voluptates enim necessitatibus incidunt quo rerum voluptatum. Voluptatem sed voluptas modi qui ut. Qui quis laborum incidunt autem quia quo. Harum animi accusamus odit sunt ea commodi.','3942952-i4ou7kves7yk6vk2035i'),(4,12,4,113,'99701 Zechariah Valleys Apt. 159\nLake Watsonfort, IL 03873','','Nobis recusandae esse nihil sapiente perspiciatis et. Fugit necessitatibus pariatur non ut. Odio maiores possimus ducimus eum dolor veritatis. Rerum architecto a enim dolore qui.','2598642-6m3t4kyasqn4edd2efbk'),(5,17,5,120,'8550 Little Knoll Suite 006\nLake Eloymouth, MA 67984','','Est culpa praesentium necessitatibus libero officiis. Id nam perspiciatis qui sint magnam mollitia. Quod et soluta laboriosam sequi eum vitae eos vero. Maiores fugiat qui minima inventore perferendis corrupti.','4156691-7q8vbpoqm69cfa9itlzf');
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,'ZONA 1'),(2,'ZONA 2'),(3,'ZONA A'),(4,'ZONA B'),(5,'ZONA C'),(6,'DESPACHO');
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


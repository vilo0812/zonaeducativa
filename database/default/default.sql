
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `bitacores` WRITE;
/*!40000 ALTER TABLE `bitacores` DISABLE KEYS */;
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
INSERT INTO `direction_tickets` VALUES (1,1,1,'0baopdumljx0lxalfn6v'),(2,1,2,'8f9u3xfwg9mipc6gbcsl'),(3,1,3,'97jvtq0l4cmwok8j65d8'),(4,2,1,'hu03bxrb5teib1iwh9vm'),(5,2,2,'du6z864z91esddd1pwc0'),(6,2,3,'dq4cz8xlg1to0e84ofkn'),(7,3,1,'kxevtjb9bu316cqqtepg'),(8,3,2,'ofa1ddf2fi8m7di79b6k'),(9,3,3,'uhmsuuxkbbrvufgrppi0'),(10,4,1,'qqdrtsgx0o7fttujvbzm'),(11,4,2,'1potof1kzpf7akh6buan'),(12,4,3,'j962k9uztrfkphh8una9'),(13,5,1,'3adamjgmx8e50yuvy0tz'),(14,5,2,'nw8y53fly62uc0tmzlty'),(15,5,3,'bgda6jzg7v1yjvopndhx'),(16,6,1,'f8eyou0urb06jygp4f7a'),(17,6,2,'5iqinwo85ayb5a0tggr2'),(18,6,3,'q8q2smtqw8w9zqdv5p0o'),(19,7,1,'zcqkdavlva6s7g828t26'),(20,7,2,'b90f2hvcs1qv3b4vno1q'),(21,7,3,'j22w5wh6coejw6b6g45p'),(22,8,1,'vyscit3gxr0ffkdcbjjb'),(23,8,2,'jzavf956b2oy1yj84tgg'),(24,8,3,'yihry4t1ljtfuxul1808'),(25,9,1,'94csuedpjq4fnkyylxxs'),(26,9,2,'xew8ugoaaa2cnn2xm9ez'),(27,9,3,'6ajc3ckz0awuqq1wzbi5'),(28,10,1,'bzepixe2576y6u5nb9hg'),(29,10,2,'1zqf7zsuxi8svc9a9i5l'),(30,10,3,'c3guqystw3157bo3rnvy'),(31,11,1,'dn05t21pexcvyeee6jpa'),(32,11,2,'zs1grtk4w017xntfozvi'),(33,11,3,'g6fvgw1d291ratjwl6te'),(34,12,1,'lcyicuku9shxiebcx4rn'),(35,12,2,'7poo9hu6dslsnf2nuqyp'),(36,12,3,'qaar82un176b952smoo1'),(37,13,1,'sb7g8tac1csxb5hdn0jk'),(38,13,2,'r0fjw0ee4270bi7un6n8'),(39,13,3,'3fflgr1aohy61z3aqmph'),(40,14,1,'t2lqxehl4469oaa0ebbn'),(41,14,2,'6eks6n3c7p06dvurdvec'),(42,14,3,'ec8l40faikrk6janjbzv'),(43,15,1,'8xcq7s4d5ydd7wzrsqf9'),(44,15,2,'49j88sh16lgff55xmji8'),(45,15,3,'uce7chwwzsjk9lsgrvy0'),(46,16,1,'bv8vsoukv898onnkf6dd'),(47,16,2,'87hfcwxoh80qbb9cc5u6'),(48,16,3,'w1ciovavtyx8d4yax9nz'),(49,17,1,'kuq6ndye0fv65e8f9nuf'),(50,17,2,'pvjjnli5lhx5ven9egwv'),(51,17,3,'2mrl8x1ezkhn6kja5tfw'),(52,18,1,'gfds4clet78hodr8k223'),(53,18,2,'wzyes6darn99k24njbwd'),(54,18,3,'cv3rjnvctpziqv1er4wx'),(55,19,1,'opjkl3paq12hwiu70k2m'),(56,19,2,'zu093uorg6i8gp79d4t9'),(57,19,3,'chult6v2kem74qo54cdr'),(58,20,1,'j2d5shz8b0ct3uf1115q'),(59,20,2,'fd1veqb99ix9brnhkjv6'),(60,20,3,'p8c1rlsj9vd84mtm0i3u'),(61,21,1,'if1ol4dcl9ey8t7yv7q8'),(62,21,2,'ct8pg5pi2t5xfg7op31s'),(63,21,3,'oqhn4s0g7n54cr7g803i'),(64,22,1,'n4oja8q0mjcgt037vabc'),(65,22,2,'ouztizy9nstx7n8e9htl'),(66,22,3,'kck831roly59636j5r3z'),(67,23,1,'yqaaesvb15ehwn0svzs6'),(68,23,2,'fopmyo1kwrpz79qx2cf7'),(69,23,3,'t8cftwad3t83w381johm'),(70,24,1,'azkglb3sa6rkox0mbh4e'),(71,24,2,'yrtu8mvpu37dztbhwk6d'),(72,24,3,'zd6m9focccgt5tigaw02'),(73,25,1,'2j4kbacjs7lgtf8p0a9q'),(74,25,2,'38lb6ntfhyoko3j1uktp'),(75,25,3,'xxdf6hzmr76ydzx0sma0'),(76,26,1,'vz8skdnrpwlzyeqhkps0'),(77,26,2,'80al8k92ai9nkpj1jszr'),(78,26,3,'c98grc6lzxfkpnbg57jo'),(79,27,1,'65i3fuy7c34ucyut9zl0'),(80,27,2,'z5p2unnnbdksa27sqxwy'),(81,27,3,'petnfrhufih2fxdn78ot'),(82,28,1,'xc9l35xlc50osfgfqa2l'),(83,28,2,'ygxvnoogf1wjwowvem1u'),(84,28,3,'jcjpqpyqx5h5ydvnf8wg'),(85,29,1,'txmk3lc5pvdq8inak5sl'),(86,29,2,'oczcy74b5n6e9mngxpf7'),(87,29,3,'hni7ivwq4gvn0v6qpo76'),(88,30,1,'bo3hnjiep34nkm371kcd'),(89,30,2,'74merunoyg2fw4eh861v'),(90,30,3,'9ir2ufbjb1lwksbcuy9w'),(91,31,1,'jjp0fn0bbjsvowgsv29t'),(92,31,2,'w652w93svn4q5u6ckpwo'),(93,31,3,'kjjimsqr25lj62egeg04'),(94,32,1,'ev87acdlxyu3o9o1vzn2'),(95,32,2,'j6x4ygpxz17yn52yvlib'),(96,32,3,'7i43moxqp15silk9brdg'),(97,33,1,'34azz7z24vmq6f9ioj3u'),(98,33,2,'7fiqsu0p8h3xucxutjl7'),(99,33,3,'3ggi29ovhdejmrbat01b'),(100,34,1,'9lhoqbj5ntmhmqvwhdq8'),(101,34,2,'9chsnxotbc287snbtw9y'),(102,34,3,'mt05uxhejcijy04tfu4u'),(103,35,1,'cthiihbrlm6m3lsf9os8'),(104,35,2,'m5k43mdyr1yx0cv79txe'),(105,35,3,'etaf9bunnpk2hslznq45'),(106,36,1,'58kltwpna5m9fa4cidtu'),(107,36,2,'grc4vvse84a3o0cfceq0'),(108,36,3,'lb93cwp7zmwx96t1acn3'),(109,37,1,'lhua09x9tjoi36v7zyrh'),(110,37,2,'6sy6yciwkzecic9ou7nv'),(111,37,3,'s9hb5dwl3q5v4xxfqzk4'),(112,38,1,'ey4x5nynrp8fewzadz3r'),(113,38,2,'1pjhg4mciwpayl1gmvvd'),(114,38,3,'end2ca8ggzzbf3h9crmf'),(115,39,1,'v11y23k9xl7tkzyyj7vz'),(116,39,2,'6qzf0ciy90gqg8amycb2'),(117,39,3,'9kmndu52eia1jivz7w9w'),(118,40,1,'5m3zou7f9loab93p1wsy'),(119,40,2,'pyvwquzfr7domaebyyzo'),(120,40,3,'m6e8r29lleb8u82rykl6'),(121,41,1,'f1zyxxoj6l2vqa3ggx2c'),(122,41,2,'ordssal0jptkl3toiw1l'),(123,41,3,'d3l72sn0eafj1cv1oxkq'),(124,42,1,'fbpjj7wwzlm0872p9pb8'),(125,42,2,'fut74aia8g70yajm86h6'),(126,42,3,'bhxleuwa4jnzgb6zol0x'),(127,43,1,'729nps6gre8rrkgbk5ct'),(128,43,2,'azpk0v6kaes5gfeu8mai'),(129,43,3,'jm2k1yw6gedi9cd5cut1'),(130,44,1,'wh17z886l0bpmlw56h19'),(131,44,2,'mha3ed9pdhle0iux546j'),(132,44,3,'u4gh2m1326zn3g9m2vrc'),(133,45,1,'vor0jz6gpulsjuh8ubnm'),(134,45,2,'ntibhu11pm26kggv9coc'),(135,45,3,'nrjadg5xt9r7r0rjsmvr');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `handling_times` WRITE;
/*!40000 ALTER TABLE `handling_times` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=325 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (298,'2014_10_12_000000_create_users_table',1),(299,'2019_11_13_133216_create_rols_table',1),(300,'2019_11_13_133852_add_rol_id_to_users',1),(301,'2020_01_03_003809_create_visitors_table',1),(302,'2020_01_03_003934_create_handling_times_table',1),(303,'2020_01_03_004159_create_tickets_table',1),(304,'2020_01_03_004343_create_floors_table',1),(305,'2020_01_03_010044_create_sectors_table',1),(306,'2020_01_03_010152_create_zones_table',1),(307,'2020_01_03_020051_add_user_id_to_visitors_table',1),(308,'2020_01_22_233258_create_directions_table',1),(309,'2020_01_22_233748_add_floor_id_to_directions_table',1),(310,'2020_01_22_233901_add_zone_id_to_directions_table',1),(311,'2020_01_22_233952_add_sector_id_to_directions_table',1),(312,'2020_01_23_120016_add_handling_time_id_to_visitors_table',1),(313,'2020_01_29_092758_add_dependeci_to_directions_table',1),(314,'2020_02_10_032530_create_password_recovers_table',1),(315,'2020_05_13_233552_create_bitacores_table',1),(316,'2020_05_13_233637_add_user_id_to_bitacores_table',1),(317,'2020_05_17_155438_create_actions_table',1),(318,'2020_05_26_215629_create_direction_tickets_table',1),(319,'2020_05_26_215732_add_direction_id_to_direction_tickets_table',1),(320,'2020_05_26_220420_add_ticket_id_to_direction_tickets_table',1),(321,'2020_05_26_220827_add_action_id_to_bitacores_table',1),(322,'2020_06_06_225204_add_direction_ticket_id_to_visitors_table',1),(323,'2020_06_22_051955_add_sign_to_users_table',1),(324,'2020_06_23_210311_create_sistems_table',1);
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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol_id` bigint(20) unsigned DEFAULT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_identification_card_unique` (`identification_card`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gabriel Antonio','Viloria Aparicio','27167028','gabriel.viloria0812@gmail.com','04149017184','default.jpg','$2y$10$r4H0ftyrtMsMphpy8Dkb0u/aU6Rz2yD8twHQGQHvfXHcVRghWvBXy',NULL,1,NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `visitors` WRITE;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
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


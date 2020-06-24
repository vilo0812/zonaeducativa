
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
INSERT INTO `direction_tickets` VALUES (1,1,1,'ku242bdfq515lvodony5'),(2,1,2,'65tjx8224hjtq8iiw6av'),(3,1,3,'juzup7qv5ssjcgstn3cu'),(4,2,1,'hdhd34o6iakte7175ela'),(5,2,2,'0303zma13qatxd6s8wsb'),(6,2,3,'4zah5ezgm7p5d83yohtq'),(7,3,1,'adx4z12uav97rncphtdc'),(8,3,2,'t52scdku12oa8q1vut0f'),(9,3,3,'jmby8nv4kwfgtasupsbg'),(10,4,1,'40db72rmjw48i32jsgv3'),(11,4,2,'iwscbkzj42htt4spku4n'),(12,4,3,'iuxcanaomfko1ri0hsuv'),(13,5,1,'cjzxrayldx42twvngslw'),(14,5,2,'z0y3gcp7lia3joqqrcag'),(15,5,3,'zu4mvvbk93xa34u249bl'),(16,6,1,'22ye0o2kc3rpva9yk93c'),(17,6,2,'7yxkq5agoucrse2rwxkv'),(18,6,3,'dq90uuzsx9nn1r8jirhv'),(19,7,1,'er00ag4196g2yjy3vveo'),(20,7,2,'b0b0zz64vy3xsanyw276'),(21,7,3,'yn0kt09z29ccqu89x10n'),(22,8,1,'wbqs4jktj9tnmhu2ji6d'),(23,8,2,'hspbdbktm4mxgjl0uepi'),(24,8,3,'spy9gr4zdxnht72t3xrz'),(25,9,1,'bagfkbarwzpkcuha6tb3'),(26,9,2,'2vm4o97bnt5e4iig55ug'),(27,9,3,'ds139b8s4zwb3l3ywz9c'),(28,10,1,'mdtsdbh6eordfey1gkcq'),(29,10,2,'o86s8qtwa944f547dmuf'),(30,10,3,'9t50eoozhjqbhx3lkagn'),(31,11,1,'1gdwfict258sb5j3hrjb'),(32,11,2,'y75hgo5q3r6897rexfk7'),(33,11,3,'hc1rcdfaofa36i75ykx1'),(34,12,1,'flslkqq0j0xau5roznrd'),(35,12,2,'szl5z5s08ctk3psc13q3'),(36,12,3,'g2eqprap5c7ijjug3i5l'),(37,13,1,'afsi404l6t2ogopjra10'),(38,13,2,'5fabzez7s0w4ewjagqpy'),(39,13,3,'dhqljwm5kdi0rg5lcy8d'),(40,14,1,'vajcdj5igey05oszkjnz'),(41,14,2,'a3brrxxxqn7pb2opahxj'),(42,14,3,'ta56bl6ei6h4eptjlr9k'),(43,15,1,'j2tvea08e5r69zw961z2'),(44,15,2,'oa2dpqie2vo2ak4h8vnf'),(45,15,3,'j4xxr9hmkubgbzsfqi9i'),(46,16,1,'cz60167qvjm83vjp5bg1'),(47,16,2,'9dglszjt231tigbjb5ku'),(48,16,3,'vee7uwspsi6uyqobki3x'),(49,17,1,'y53yb31xd601uhhaceuk'),(50,17,2,'tje3kwedrnfly7bopjkc'),(51,17,3,'he44zytbe2i619crs5ae'),(52,18,1,'egctb5cqfzih1p68iqho'),(53,18,2,'ujtay0o7q3u495r2fjtr'),(54,18,3,'ghn7dfqv4hizklbrhlfy'),(55,19,1,'7u7iblv9ko2432xm2h1e'),(56,19,2,'goxtbza311g96ekc3f6g'),(57,19,3,'91ajg45f8boxmyklkou5'),(58,20,1,'drazibo3fwurvks1nsc3'),(59,20,2,'ny0wsb2nddsr2uteoxmi'),(60,20,3,'onpac2mg2vjdr6bqwop3'),(61,21,1,'2ix9jsmii29d8ysoukz0'),(62,21,2,'181x7mtr1opmbfyo0ne2'),(63,21,3,'hfaruxyhrykub0rqvr4u'),(64,22,1,'5jkw3nep95fdjvy59nyv'),(65,22,2,'3yihuvuzp1qiyv40y221'),(66,22,3,'avj47yqz0elizcfx74xu'),(67,23,1,'bsppnfpu163knj73z7uv'),(68,23,2,'037ll1qtp2efvwnj1m4z'),(69,23,3,'ibi0qqws5fvgje19yyp0'),(70,24,1,'nx52s4pap1slqk8djilj'),(71,24,2,'aeoo34y3nckf7c171j5w'),(72,24,3,'r9v3jo3yf1knhm6aqb4d'),(73,25,1,'0ybcgb8q2nfbfdyy5wjd'),(74,25,2,'9eh8pfo72dcqd4xqlra8'),(75,25,3,'df6pmdpa0egefl04dmhu'),(76,26,1,'rt3fafuehpee7c1816ae'),(77,26,2,'bgp7o248z7yybgk34ipw'),(78,26,3,'ivze1ucfdk05hc95uplf'),(79,27,1,'3cnzv0qn6ribv1q15633'),(80,27,2,'sbl8trhwi3fzciru09d1'),(81,27,3,'yw3bv1bn4yqypi0xlo8v'),(82,28,1,'ofp6mh1zqlol5qzq2jqw'),(83,28,2,'pzghp60v6nnqf2ca6xw3'),(84,28,3,'rspu7rwrbjlnewjmj2fb'),(85,29,1,'vuv0b1mqfq4wv7slabae'),(86,29,2,'ycn9wpy24oje2faqsndc'),(87,29,3,'borzt9r5bcboo07e9rr9'),(88,30,1,'orj2mowbocrx9juv5ks5'),(89,30,2,'lr5a93wp26aw7pto9ix7'),(90,30,3,'zvb9w7xgrtci8qo20o46'),(91,31,1,'pndfnl8dpfxzv6b9huqw'),(92,31,2,'rbl8pl9qkpuzghs56tov'),(93,31,3,'pjn1jhgyesl6w704au5j'),(94,32,1,'0uqqdwz2jrxqfucqlp8t'),(95,32,2,'zqy6rh8ypkhlmk0tm6e4'),(96,32,3,'0hayaa0cb0ho1ohp5jvm'),(97,33,1,'qjbhz3kumz37sogzec3d'),(98,33,2,'hs2j53em1dwxyjeqsgmz'),(99,33,3,'svkxsobdf8jj9r090h25'),(100,34,1,'14hz92qlvr06rhdntaa2'),(101,34,2,'pybryfzgxu5vo5pgzdq7'),(102,34,3,'pmmyj0s9hhpkybu54pix'),(103,35,1,'ltgpwcvp42aqirwyhci3'),(104,35,2,'edekg8tyspdnndd56keq'),(105,35,3,'cwbgyopwsj9dl2dy9pw9'),(106,36,1,'5lm6a75c5ahbuz5h1y6l'),(107,36,2,'5pg885y5n6q3twwd2ee6'),(108,36,3,'mfc5f0bdct5yw36kjk3h'),(109,37,1,'5iemp0czuqpx4mveugdj'),(110,37,2,'tc26v3ccxdnrcp3snpf0'),(111,37,3,'bk7uq159lupwozxn5fkw'),(112,38,1,'cz41qhrsbh4ujxwv16fz'),(113,38,2,'x5vgk81lonjwrcxqga92'),(114,38,3,'ynensgm9oywhilyj37ib'),(115,39,1,'qgnb2alm3nkfmat9euul'),(116,39,2,'qzkoh2pu97zgpkrjwc3n'),(117,39,3,'u7hphqzxjn40pq3picsi'),(118,40,1,'k5etvbiwbn9kejc60nvy'),(119,40,2,'gimcptb9n1skqrg1h5n2'),(120,40,3,'fuzxeh9cip4e38abtzh1'),(121,41,1,'czfx1axb0zwwml86bev5'),(122,41,2,'80gotdbpb5b2bn79z3e8'),(123,41,3,'cqys3s66tt2isnynl00t'),(124,42,1,'4yclsrladd24luzw7nwq'),(125,42,2,'g9gba1o2w3f1ic9d7fts'),(126,42,3,'adtz1ach6irlv4cj8uq7'),(127,43,1,'6zsxfz30xl2kgqvjwv50'),(128,43,2,'tp6bie0cu1d4tubppps9'),(129,43,3,'slfngy6axwbp6hgg1rpw'),(130,44,1,'wjoxxuhbl4smmgj608ai'),(131,44,2,'8ezcc3f1b8rp6cylncbm'),(132,44,3,'u4gshlrnbiefuv9sgc3w'),(133,45,1,'8flh7y1xa28j5h9m4nym'),(134,45,2,'b5d5mz0tqig7szwokreb'),(135,45,3,'njjbwfh5my9vfs3jnqi6');
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
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gabriel Antonio','Viloria Aparicio','27167028','gabriel.viloria0812@gmail.com',NULL,'04149017184','$2y$10$/.ZK9tyHnJgLnwQpMXJ69ekLwFUdj3tMKGK9j7cQ0wZi6rd/ycAhK',NULL,1,NULL);
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


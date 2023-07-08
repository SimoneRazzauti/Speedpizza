-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: fantaball
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Current Database: `fantaball`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `fantaball` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `fantaball`;

--
-- Table structure for table `calciatori`
--

DROP TABLE IF EXISTS `calciatori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calciatori` (
  `idCalciatore` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCalciatore` char(45) NOT NULL,
  `ruolo` char(1) NOT NULL,
  `club` char(45) NOT NULL,
  `valore` int(11) NOT NULL,
  PRIMARY KEY (`idCalciatore`)
) ENGINE=InnoDB AUTO_INCREMENT=527 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calciatori`
--

LOCK TABLES `calciatori` WRITE;
/*!40000 ALTER TABLE `calciatori` DISABLE KEYS */;
INSERT INTO `calciatori` VALUES (1,'ALFONSO','P','Brescia',1),(2,'ANDRENACCI','P','Brescia',1),(3,'AUDERO','P','Sampdoria',5),(4,'AVOGADRI','P','Sampdoria',1),(5,'BEGOVIC','P','Milan',3),(6,'BERARDI A','P','Verona',1),(7,'BERISHA E','P','Spal',9),(8,'BERNI','P','Inter',1),(9,'BRANCOLINI','P','Fiorentina',1),(10,'BREZA','P','Bologna',1),(11,'BUFFON','P','Juventus',5),(12,'CHIRONI','P','Lecce',1),(13,'COLOMBI','P','Parma',4),(14,'CONSIGLI','P','Sassuolo',9),(15,'CRAGNO','P','Cagliari',1),(16,'DA COSTA','P','Bologna',1),(17,'DONNARUMMA AN','P','Milan',1),(18,'DONNARUMMA G','P','Milan',13),(19,'DRAGOWSKI','P','Fiorentina',11),(20,'FALCONE','P','Sampdoria',1),(21,'FUZATO','P','Roma',1),(22,'GABRIEL','P','Lecce',5),(23,'GOLLINI','P','Atalanta',9),(24,'GUERRIERI','P','Lazio',1),(25,'HANDANOVIC','P','Inter',14),(26,'ICHAZO','P','Genoa',1),(27,'JORONEN','P','Brescia',7),(28,'KARNEZIS','P','Napoli',1),(29,'LETICA','P','Spal',1),(30,'MARCHETTI','P','Genoa',1),(31,'MERET','P','Napoli',7),(32,'MIRANTE','P','Roma',1),(33,'MUSSO','P','Udinese',11),(34,'NICOLAS','P','Udinese',1),(35,'OLSEN','P','Cagliari',8),(36,'OSPINA','P','Napoli',6),(37,'PADELLI','P','Inter',1),(38,'PAU LOPEZ','P','Roma',10),(39,'PEGOLO','P','Sassuolo',2),(40,'PERIN','P','Genoa',6),(41,'PERISAN','P','Udinese',1),(42,'PINSOGLIO','P','Juventus',1),(43,'PROTO','P','Lazio',1),(44,'RADU I','P','Parma',2),(45,'RADUNOVIC','P','Verona',1),(46,'RAFAEL','P','Cagliari',1),(47,'ROSATI','P','Torino',1),(48,'ROSSI F','P','Atalanta',1),(49,'RUSSO A','P','Sassuolo',1),(50,'SARR M','P','Bologna',1),(51,'SECULIN','P','Sampdoria',1),(52,'SEPE','P','Parma',11),(53,'SILVESTRI','P','Verona',12),(54,'SIRIGU','P','Torino',9),(55,'SKORUPSKI','P','Bologna',7),(56,'SPORTIELLO','P','Atalanta',2),(57,'STRAKOSHA','P','Lazio',15),(58,'SZCZESNY','P','Juventus',15),(59,'TERRACCIANO','P','Fiorentina',1),(60,'THIAM D','P','Spal',1),(61,'TURATI','P','Sassuolo',1),(62,'UJKANI','P','Torino',1),(63,'VIGORITO','P','Lecce',1),(64,'VODISEK','P','Genoa',1),(65,'ACERBI','D','Lazio',17),(66,'ADJAPONG','D','Verona',2),(67,'AINA','D','Torino',2),(68,'ALEX SANDRO','D','Juventus',9),(69,'ANKERSEN','D','Genoa',4),(70,'ARMINI','D','Lazio',1),(71,'ASAMOAH','D','Inter',5),(72,'AUGELLO','D','Sampdoria',1),(73,'BANI','D','Bologna',10),(74,'BARRECA','D','Genoa',2),(75,'BASTONI','D','Inter',7),(76,'BASTOS','D','Lazio',3),(77,'BELLANOVA','D','Atalanta',1),(78,'BERESZYNSKI','D','Sampdoria',3),(79,'BIANDA','D','Roma',1),(80,'BIRAGHI','D','Inter',6),(81,'BIRASCHI','D','Genoa',4),(82,'BOCCHETTI','D','Verona',1),(83,'BONIFAZI','D','Spal',6),(84,'BONUCCI','D','Juventus',19),(85,'BOUAH','D','Roma',1),(86,'BREMER','D','Torino',3),(87,'BRUNO ALVES','D','Parma',8),(88,'BRUNO PERES','D','Roma',4),(89,'CACCIATORE','D','Cagliari',2),(90,'CACERES','D','Fiorentina',8),(91,'CALABRIA','D','Milan',3),(92,'CALDARA','D','Atalanta',1),(93,'CALDERONI','D','Lecce',8),(94,'CASTAGNE','D','Atalanta',8),(95,'CECCHERINI','D','Fiorentina',1),(96,'CEPPITELLI','D','Cagliari',5),(97,'CETIN','D','Roma',1),(98,'CHABOT','D','Sampdoria',1),(99,'CHANCELLOR','D','Brescia',8),(100,'CHIELLINI','D','Juventus',10),(101,'CHIRICHES','D','Sassuolo',1),(102,'CIONEK','D','Spal',3),(103,'CIPRIANO','D','Lazio',1),(104,'CISTANA','D','Brescia',5),(105,'COLLEY','D','Sampdoria',4),(106,'CONTI','D','Milan',3),(107,'CORBO','D','Bologna',1),(108,'CRISCITO','D','Genoa',16),(109,'CZYBORRA','D','Atalanta',1),(110,'DALBERT','D','Fiorentina',7),(111,'D\'AMBROSIO','D','Inter',5),(112,'DANILO','D','Juventus',7),(113,'DANILO LAR','D','Bologna',5),(114,'DARMIAN','D','Parma',8),(115,'DAWIDOWICZ','D','Verona',3),(116,'DE LIGT','D','Juventus',9),(117,'DE MAIO','D','Udinese',3),(118,'DE SCIGLIO','D','Juventus',1),(119,'DE SILVESTRI','D','Torino',4),(120,'DE VRIJ','D','Inter',18),(121,'DELL\'ORCO','D','Lecce',1),(122,'DEMIRAL','D','Juventus',2),(123,'DENSWIL','D','Bologna',3),(124,'DEPAOLI','D','Sampdoria',4),(125,'DERMAKU','D','Parma',5),(126,'DI LORENZO','D','Napoli',12),(127,'DIJKS','D','Bologna',1),(128,'DIMARCO','D','Verona',1),(129,'DJIDJI','D','Torino',1),(130,'DJIMSITI','D','Atalanta',10),(131,'DONATI','D','Lecce',7),(132,'DUARTE','D','Milan',1),(133,'EMPEREUR','D','Verona',1),(134,'FARAONI','D','Verona',15),(135,'FAZIO','D','Roma',2),(136,'FELIPE','D','Spal',2),(137,'FERRARI A','D','Sampdoria',2),(138,'FERRARI G','D','Sassuolo',3),(139,'GABBIA','D','Milan',3),(140,'GAGLIOLO','D','Parma',11),(141,'GASOLINA WESLEY','D','Juventus',1),(142,'GASTALDELLO','D','Brescia',1),(143,'GHIGLIONE','D','Genoa',10),(144,'GHOULAM','D','Napoli',1),(145,'GODIN','D','Inter',6),(146,'GOLDANIGA','D','Genoa',1),(147,'GOSENS','D','Atalanta',29),(148,'GUNTER','D','Verona',5),(149,'HATEBOER','D','Atalanta',5),(150,'HERNANDEZ T','D','Milan',19),(151,'HYSAJ','D','Napoli',2),(152,'IACOPONI','D','Parma',10),(153,'IBANEZ','D','Roma',1),(154,'IGOR','D','Fiorentina',5),(155,'IZZO','D','Torino',6),(156,'JORGE SILVA','D','Lazio',1),(157,'JUAN JESUS','D','Roma',1),(158,'KJAER','D','Milan',2),(159,'KLAVAN','D','Cagliari',3),(160,'KOLAROV','D','Roma',15),(161,'KOULIBALY','D','Napoli',3),(162,'KUMBULLA','D','Verona',9),(163,'KYRIAKOPOULOS','D','Sassuolo',7),(164,'LAURINI','D','Parma',1),(165,'LIROLA','D','Fiorentina',8),(166,'LUCIONI','D','Lecce',5),(167,'LUIZ FELIPE','D','Lazio',7),(168,'LUKAKU J','D','Lazio',1),(169,'LUPERTO','D','Napoli',1),(170,'LYANCO','D','Torino',2),(171,'LYKOGIANNIS','D','Cagliari',1),(172,'MAGNANI','D','Sassuolo',1),(173,'MAKSIMOVIC','D','Napoli',7),(174,'MALCUIT','D','Napoli',1),(175,'MANCINI G','D','Roma',8),(176,'MANGRAVITI','D','Brescia',1),(177,'MANOLAS','D','Napoli',12),(178,'MARIO RUI','D','Napoli',3),(179,'MARLON','D','Sassuolo',4),(180,'MARTELLA','D','Brescia',3),(181,'MASIELLO A','D','Genoa',4),(182,'MATEJU','D','Brescia',3),(183,'MATTIELLO','D','Cagliari',2),(184,'MBAYE','D','Bologna',2),(185,'MECCARIELLO','D','Lecce',1),(186,'MILENKOVIC','D','Fiorentina',15),(187,'MULDUR','D','Sassuolo',4),(188,'MURRU','D','Sampdoria',2),(189,'MUSACCHIO','D','Milan',3),(190,'N\'KOULOU','D','Torino',3),(191,'NUYTINCK','D','Udinese',9),(192,'OKOLI','D','Atalanta',1),(193,'PAJAC','D','Genoa',1),(194,'PALOMINO','D','Atalanta',7),(195,'PAPETTI','D','Brescia',2),(196,'PATRIC','D','Lazio',5),(197,'PAZ','D','Lecce',3),(198,'PELLEGRINI LU','D','Cagliari',7),(199,'PELUSO','D','Sassuolo',2),(200,'PEZZELLA GER','D','Fiorentina',9),(201,'PEZZELLA GIU','D','Parma',2),(202,'PIROLA','D','Inter',1),(203,'PISACANE','D','Cagliari',7),(204,'PRODL','D','Udinese',1),(205,'RADU','D','Lazio',7),(206,'RANOCCHIA','D','Inter',1),(207,'RECA','D','Spal',4),(208,'REGINI','D','Parma',1),(209,'RISPOLI','D','Lecce',3),(210,'RODRIGO BECAO','D','Udinese',5),(211,'ROGERIO','D','Sassuolo',1),(212,'ROMAGNA','D','Sassuolo',5),(213,'ROMAGNOLI A','D','Milan',9),(214,'ROMERO C','D','Genoa',5),(215,'ROSSETTINI','D','Lecce',5),(216,'RRAHMANI','D','Verona',8),(217,'RUGANI','D','Juventus',1),(218,'SABELLI','D','Brescia',7),(219,'SALA','D','Spal',2),(220,'SALAMON','D','Spal',1),(221,'SAMIR','D','Udinese',1),(222,'SANTON','D','Roma',2),(223,'SEMPRINI','D','Brescia',1),(224,'SINGO','D','Torino',1),(225,'SKRINIAR','D','Inter',9),(226,'SMALLING','D','Roma',15),(227,'SOUMAORO','D','Genoa',10),(228,'SPINAZZOLA','D','Roma',7),(229,'STRYGER LARSEN','D','Udinese',10),(230,'SUTALO','D','Atalanta',1),(231,'TER AVEST','D','Udinese',1),(232,'TERZIC','D','Fiorentina',1),(233,'TOLJAN','D','Sassuolo',8),(234,'TOLOI','D','Atalanta',12),(235,'TOMIYASU','D','Bologna',6),(236,'TOMOVIC','D','Spal',2),(237,'TONELLI','D','Sampdoria',2),(238,'TRIPALDELLI','D','Sassuolo',1),(239,'TROOST-EKONG','D','Udinese',5),(240,'VAVRO','D','Lazio',2),(241,'VENUTI','D','Fiorentina',1),(242,'VERA','D','Lecce',1),(243,'VICARI','D','Spal',5),(244,'WALUKIEWICZ','D','Cagliari',1),(245,'YOSHIDA','D','Sampdoria',5),(246,'YOUNG','D','Inter',14),(247,'ZAPATA C','D','Genoa',1),(248,'ZAPPACOSTA','D','Roma',1),(249,'ZEEGELAAR','D','Udinese',3),(250,'ZUKANOVIC','D','Spal',3),(251,'AGOUME','C','Inter',1),(252,'AGUDELO','C','Fiorentina',2),(253,'ALLAN','C','Napoli',6),(254,'AMRABAT','C','Verona',10),(255,'ANDERSON A','C','Lazio',1),(256,'ANSALDI','C','Torino',17),(257,'BADELJ','C','Fiorentina',4),(258,'BADU','C','Verona',1),(259,'BARAK','C','Lecce',5),(260,'BARELLA','C','Inter',10),(261,'BARILLA\'','C','Parma',5),(262,'BARRETO','C','Sampdoria',1),(263,'BASELLI','C','Torino',6),(264,'BEHRAMI','C','Genoa',3),(265,'BENASSI','C','Fiorentina',7),(266,'BENNACER','C','Milan',3),(267,'BENTANCUR','C','Juventus',11),(268,'BERENGUER','C','Torino',19),(269,'BERNARDESCHI','C','Juventus',3),(270,'BERTOLACCI','C','Sampdoria',1),(271,'BIGLIA','C','Milan',1),(272,'BIRSA','C','Cagliari',1),(273,'BISOLI','C','Brescia',7),(274,'BJARNASON','C','Brescia',4),(275,'BONAVENTURA','C','Milan',11),(276,'BORINI','C','Verona',5),(277,'BORJA VALERO','C','Inter',4),(278,'BOURABIA','C','Sassuolo',2),(279,'BROZOVIC','C','Inter',19),(280,'BRUGMAN','C','Parma',6),(281,'CALHANOGLU','C','Milan',13),(282,'CALLEJON','C','Napoli',14),(283,'CANDREVA','C','Inter',17),(284,'CASSATA','C','Genoa',5),(285,'CASTILLEJO','C','Milan',8),(286,'CASTRO','C','Spal',11),(287,'CASTROVILLI','C','Fiorentina',20),(288,'CATALDI','C','Lazio',6),(289,'CHIESA','C','Fiorentina',22),(290,'CIGARINI','C','Cagliari',8),(291,'COLLEY E','C','Atalanta',1),(292,'CRISTANTE','C','Roma',5),(293,'CUADRADO','C','Juventus',10),(294,'DABO','C','Spal',1),(295,'D\'ALESSANDRO','C','Spal',1),(296,'DANZI','C','Verona',1),(297,'DE PAUL','C','Udinese',18),(298,'DE ROON','C','Atalanta',11),(299,'DEIOLA','C','Lecce',4),(300,'DEMME','C','Napoli',10),(301,'DESSENA','C','Brescia',2),(302,'DI FRANCESCO F','C','Spal',9),(303,'DIAWARA','C','Roma',5),(304,'DJURICIC','C','Sassuolo',15),(305,'DOMINGUEZ','C','Bologna',5),(306,'DOUGLAS COSTA','C','Juventus',9),(307,'DUNCAN','C','Fiorentina',10),(308,'EKDAL','C','Sampdoria',7),(309,'ELMAS','C','Napoli',4),(310,'ERIKSEN','C','Inter',18),(311,'ERIKSSON','C','Genoa',1),(312,'EYSSERIC','C','Verona',2),(313,'FAGIOLI','C','Juventus',1),(314,'FARAGO\'','C','Cagliari',5),(315,'FARES','C','Spal',2),(316,'FOFANA','C','Udinese',11),(317,'FREULER','C','Atalanta',13),(318,'GAGLIARDINI','C','Inter',10),(319,'GHEZZAL','C','Fiorentina',1),(320,'GOMEZ A','C','Atalanta',33),(321,'GRASSI','C','Parma',4),(322,'HERNANI','C','Parma',7),(323,'IONITA','C','Cagliari',4),(324,'JAGIELLO','C','Genoa',1),(325,'JAJALO','C','Udinese',3),(326,'JANKTO','C','Sampdoria',8),(327,'JONY','C','Lazio',3),(328,'KESSIE\'','C','Milan',4),(329,'KHEDIRA','C','Juventus',4),(330,'KLUIVERT','C','Roma',14),(331,'KREJCI','C','Bologna',5),(332,'KRUNIC','C','Milan',1),(333,'KUCKA','C','Parma',15),(334,'KULUSEVSKI','C','Parma',25),(335,'KURTIC','C','Parma',12),(336,'LAXALT','C','Milan',2),(337,'LAZOVIC','C','Verona',13),(338,'LAZZARI M','C','Lazio',11),(339,'LERAGER','C','Genoa',1),(340,'LERIS','C','Sampdoria',1),(341,'LINETTY','C','Sampdoria',11),(342,'LOBOTKA','C','Napoli',5),(343,'LOCATELLI M','C','Sassuolo',8),(344,'LUCAS FELIPPE','C','Verona',1),(345,'LUCAS LEIVA','C','Lazio',7),(346,'LUIS ALBERTO','C','Lazio',29),(347,'LUKIC','C','Torino',3),(348,'LULIC','C','Lazio',6),(349,'MAGNANELLI','C','Sassuolo',2),(350,'MAJER','C','Lecce',7),(351,'MALDINI','C','Milan',1),(352,'MALINOVSKYI','C','Atalanta',15),(353,'MANCOSU','C','Lecce',25),(354,'MANDRAGORA','C','Udinese',7),(355,'MARONI','C','Sampdoria',1),(356,'MARUSIC','C','Lazio',8),(357,'MATUIDI','C','Juventus',7),(358,'MEDEL','C','Bologna',2),(359,'MEITE\'','C','Torino',3),(360,'MIGUEL VELOSO','C','Verona',15),(361,'MILINKOVIC-SAVIC','C','Lazio',19),(362,'MISSIROLI','C','Spal',8),(363,'MKHITARYAN','C','Roma',21),(364,'MOSES','C','Inter',9),(365,'MURGIA','C','Spal',4),(366,'NAINGGOLAN','C','Cagliari',25),(367,'NANDEZ','C','Cagliari',14),(368,'NDOJ','C','Brescia',2),(369,'OBIANG','C','Sassuolo',3),(370,'OLIVA','C','Cagliari',8),(371,'PAQUETA\'','C','Milan',3),(372,'PAROLO','C','Lazio',5),(373,'PASALIC','C','Atalanta',20),(374,'PASTORE','C','Roma',2),(375,'PELLEGRINI LO','C','Roma',16),(376,'PEREIRO','C','Cagliari',8),(377,'PEROTTI','C','Roma',13),(378,'PESSINA','C','Verona',12),(379,'PETRICCIONE','C','Lecce',6),(380,'PJANIC','C','Juventus',16),(381,'POLI','C','Bologna',9),(382,'PORTANOVA','C','Juventus',1),(383,'PULGAR','C','Fiorentina',16),(384,'RABIOT','C','Juventus',3),(385,'RADOVANOVIC','C','Genoa',4),(386,'RAMIREZ','C','Sampdoria',17),(387,'RAMSEY','C','Juventus',12),(388,'RIBERY','C','Fiorentina',17),(389,'RICCARDI','C','Roma',1),(390,'RINCON','C','Torino',8),(391,'ROG','C','Cagliari',8),(392,'ROMULO','C','Brescia',9),(393,'ROVELLA','C','Genoa',1),(394,'RUIZ','C','Napoli',10),(395,'SAELEMAEKERS','C','Milan',2),(396,'SAPONARA','C','Lecce',3),(397,'SCHONE','C','Genoa',8),(398,'SCHOUTEN','C','Bologna',2),(399,'SCOZZARELLA','C','Parma',8),(400,'SEMA','C','Udinese',8),(401,'SENSI','C','Inter',15),(402,'SHAKHOV','C','Lecce',4),(403,'SORIANO','C','Bologna',14),(404,'SPALEK','C','Brescia',3),(405,'STREFEZZA','C','Spal',7),(406,'STURARO','C','Genoa',5),(407,'SVANBERG','C','Bologna',4),(408,'TACHTSIDIS','C','Lecce',2),(409,'TAMEZE','C','Atalanta',3),(410,'THORSBY','C','Sampdoria',2),(411,'TONALI','C','Brescia',14),(412,'TRAORE\' HJ','C','Sassuolo',14),(413,'TUNJOV','C','Spal',1),(414,'UNDER','C','Roma',13),(415,'VALDIFIORI','C','Spal',5),(416,'VALOTI','C','Spal',7),(417,'VECINO','C','Inter',9),(418,'VERDI','C','Torino',8),(419,'VERETOUT','C','Roma',13),(420,'VERRE','C','Verona',12),(421,'VIEIRA','C','Sampdoria',3),(422,'VILLAR','C','Roma',2),(423,'VIVIANI M','C','Brescia',1),(424,'WALACE','C','Udinese',2),(425,'YOUNES','C','Napoli',1),(426,'ZACCAGNI','C','Verona',13),(427,'ZANIOLO','C','Roma',15),(428,'ZENNARO','C','Genoa',1),(429,'ZIELINSKI','C','Napoli',11),(430,'ZMRHAL','C','Brescia',1),(431,'ADEKANYE','A','Lazio',4),(432,'ADORANTE','A','Parma',1),(433,'AYE\'','A','Brescia',2),(434,'BABACAR','A','Lecce',2),(435,'BALOTELLI','A','Brescia',15),(436,'BARROW','A','Bologna',11),(437,'BELOTTI','A','Torino',28),(438,'BERARDI','A','Sassuolo',30),(439,'BOGA','A','Sassuolo',26),(440,'BONAZZOLI','A','Sampdoria',7),(441,'CAICEDO','A','Lazio',25),(442,'CAMBIAGHI','A','Atalanta',1),(443,'CANGIANO','A','Bologna',1),(444,'CAPRARI','A','Parma',9),(445,'CAPUTO','A','Sassuolo',34),(446,'CARLES PEREZ','A','Roma',7),(447,'CERRI','A','Spal',4),(448,'CLEONISE','A','Genoa',1),(449,'CORNELIUS','A','Parma',22),(450,'CORREA','A','Lazio',24),(451,'CUTRONE','A','Fiorentina',10),(452,'DEFREL','A','Sassuolo',7),(453,'DESTRO','A','Genoa',1),(454,'DI CARMINE','A','Verona',7),(455,'DONNARUMMA AL','A','Brescia',12),(456,'DYBALA','A','Juventus',31),(457,'DZEKO','A','Roma',33),(458,'EDERA','A','Torino',4),(459,'ESPOSITO SE','A','Inter',4),(460,'FALCO','A','Lecce',19),(461,'FARIAS','A','Lecce',6),(462,'FAVILLI','A','Genoa',2),(463,'FLOCCARI','A','Spal',2),(464,'GABBIADINI','A','Sampdoria',19),(465,'GERVINHO','A','Parma',16),(466,'HARASLIN','A','Sassuolo',2),(467,'HIGUAIN','A','Juventus',22),(468,'IAGO FALQUE','A','Genoa',1),(469,'IBRAHIMOVIC','A','Milan',28),(470,'ILICIC','A','Atalanta',43),(471,'IMMOBILE','A','Lazio',50),(472,'INGLESE','A','Parma',4),(473,'INSIGNE','A','Napoli',20),(474,'JOAO PEDRO','A','Cagliari',34),(475,'JUWARA','A','Bologna',1),(476,'KALINIC','A','Roma',6),(477,'KARAMOH','A','Parma',4),(478,'KOUAME\'','A','Fiorentina',17),(479,'LA GUMINA','A','Sampdoria',4),(480,'LAPADULA','A','Lecce',18),(481,'LASAGNA','A','Udinese',10),(482,'LLORENTE','A','Napoli',15),(483,'LOZANO','A','Napoli',8),(484,'LUKAKU R','A','Inter',40),(485,'MARTINEZ L','A','Inter',29),(486,'MERTENS','A','Napoli',22),(487,'MILIK','A','Napoli',30),(488,'MILLICO','A','Torino',1),(489,'MURIEL','A','Atalanta',32),(490,'NESTOROVSKI','A','Udinese',6),(491,'OKAKA','A','Udinese',18),(492,'ORSOLINI','A','Bologna',21),(493,'PALACIO','A','Bologna',22),(494,'PALOSCHI','A','Cagliari',2),(495,'PANDEV','A','Genoa',23),(496,'PAVOLETTI','A','Cagliari',3),(497,'PAZZINI','A','Verona',11),(498,'PETAGNA','A','Spal',22),(499,'PICCOLI','A','Atalanta',1),(500,'PINAMONTI','A','Genoa',8),(501,'POLITANO','A','Napoli',4),(502,'QUAGLIARELLA','A','Sampdoria',22),(503,'RAFAEL LEAO','A','Milan',9),(504,'RAGATZU','A','Cagliari',2),(505,'RASPADORI','A','Sassuolo',1),(506,'REBIC','A','Milan',15),(507,'RONALDO','A','Juventus',50),(508,'SALCEDO E','A','Verona',6),(509,'SANABRIA','A','Genoa',11),(510,'SANCHEZ A','A','Inter',11),(511,'SANSONE N','A','Bologna',11),(512,'SANTANDER','A','Bologna',3),(513,'SILIGARDI','A','Parma',1),(514,'SIMEONE','A','Cagliari',21),(515,'SKOV OLSEN','A','Bologna',5),(516,'SKRABB','A','Brescia',3),(517,'SOTTIL','A','Fiorentina',1),(518,'SPROCATI','A','Parma',6),(519,'STEPINSKI','A','Verona',5),(520,'TEODORCZYK','A','Udinese',1),(521,'THEREAU','A','Fiorentina',1),(522,'TORREGROSSA','A','Brescia',14),(523,'TRAORE\' AM','A','Atalanta',1),(524,'VLAHOVIC','A','Fiorentina',18),(525,'ZAPATA D','A','Atalanta',41),(526,'ZAZA','A','Torino',10);
/*!40000 ALTER TABLE `calciatori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendario`
--

DROP TABLE IF EXISTS `calendario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendario` (
  `idPartita` int(11) NOT NULL AUTO_INCREMENT,
  `idTorneo` int(11) DEFAULT NULL,
  `dataPartita` datetime DEFAULT NULL,
  `nGiornata` int(11) NOT NULL,
  `etichettaA` varchar(45) NOT NULL,
  `etichettaB` varchar(45) NOT NULL,
  `squadraA` varchar(45) DEFAULT NULL,
  `squadraB` varchar(45) DEFAULT NULL,
  `votoA` decimal(11,1) DEFAULT NULL,
  `votoB` decimal(11,1) DEFAULT NULL,
  `goalA` int(11) DEFAULT NULL,
  `goalB` int(11) DEFAULT NULL,
  `stato` tinyint(4) DEFAULT '1' COMMENT 'SE 0 NON PUOI MODIFICARE LA FORMAZIONE: QUANDO E'' 0 COMPARE NELLA SCHERMATA DELL''ADMIN, QUANDO UNA GIORNATA VIENE CALCOLATA VIENE SETTATA A 2 E L''ADMIN NON PUO'' PIU'' RICALCOLARLA',
  `risultato` int(11) DEFAULT NULL COMMENT '1 = vittoria A 0 = pareggio 2  = vittoria B, trigger che setta questi campi dopo che ho settato entrambi i goal ',
  PRIMARY KEY (`idPartita`),
  KEY `squadra1_idx` (`squadraA`),
  KEY `squadra2_idx` (`squadraB`),
  KEY `calendario_torneo_idx` (`idTorneo`),
  CONSTRAINT `calendario_torneo` FOREIGN KEY (`idTorneo`) REFERENCES `tornei` (`idTorneo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `squadraCasa` FOREIGN KEY (`squadraA`) REFERENCES `squadre` (`nomeSquadra`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `squadraTrasferta` FOREIGN KEY (`squadraB`) REFERENCES `squadre` (`nomeSquadra`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendario`
--

LOCK TABLES `calendario` WRITE;
/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
INSERT INTO `calendario` VALUES (1,1,'2020-05-01 15:00:00',1,'B','E','DarioFC','MicheleFC',79.0,49.0,3,0,2,1),(2,1,'2020-05-01 15:00:00',1,'C','F','FranceFC','PaoloFC',0.0,0.0,2,2,2,0),(3,1,'2020-05-01 15:00:00',1,'D','A','GiovaFC','SandroFC',NULL,NULL,NULL,NULL,0,NULL),(4,1,'2020-05-12 15:00:00',2,'A','C','SandroFC','FranceFC',3.0,1.0,1,0,2,1),(5,1,'2020-05-12 15:00:00',2,'E','D','MicheleFC','GiovaFC',0.0,0.0,0,1,2,2),(6,1,'2020-05-12 15:00:00',2,'F','B','PaoloFC','DarioFC',0.0,38.0,3,0,2,1),(7,1,'2020-05-19 15:00:00',3,'B','A','DarioFC','SandroFC',2.0,2.0,3,2,1,1),(8,1,'2020-05-19 15:00:00',3,'C','D','FranceFC','GiovaFC',NULL,NULL,NULL,NULL,1,NULL),(9,1,'2020-05-19 15:00:00',3,'F','E','PaoloFC','MicheleFC',NULL,NULL,NULL,NULL,1,NULL),(10,1,'2020-05-26 15:00:00',4,'A','F','SandroFC','PaoloFC',NULL,NULL,NULL,NULL,1,NULL),(11,1,'2020-05-26 15:00:00',4,'C','E','FranceFC','MicheleFC',NULL,NULL,NULL,NULL,1,NULL),(12,1,'2020-05-26 15:00:00',4,'D','B','GiovaFC','DarioFC',NULL,NULL,NULL,NULL,1,NULL),(13,1,'2020-06-02 15:00:00',5,'B','C','DarioFC','FranceFC',NULL,NULL,NULL,NULL,1,NULL),(14,1,'2020-06-02 15:00:00',5,'E','A','MicheleFC','SandroFC',NULL,NULL,NULL,NULL,1,NULL),(15,1,'2020-06-02 15:00:00',5,'F','D','PaoloFC','GiovaFC',NULL,NULL,NULL,NULL,1,NULL),(16,1,'2020-06-09 15:00:00',6,'A','D','SandroFC','GiovaFC',NULL,NULL,NULL,NULL,1,NULL),(17,1,'2020-06-09 15:00:00',6,'E','B','MicheleFC','DarioFC',NULL,NULL,NULL,NULL,1,NULL),(18,1,'2020-06-09 15:00:00',6,'F','C','PaoloFC','FranceFC',NULL,NULL,NULL,NULL,1,NULL),(19,1,'2020-06-16 15:00:00',7,'B','F','DarioFC','PaoloFC',NULL,NULL,NULL,NULL,1,NULL),(20,1,'2020-06-16 15:00:00',7,'C','A','FranceFC','SandroFC',NULL,NULL,NULL,NULL,1,NULL),(21,1,'2020-06-16 15:00:00',7,'D','E','GiovaFC','MicheleFC',NULL,NULL,NULL,NULL,1,NULL),(22,1,'2020-06-23 15:00:00',8,'A','B','SandroFC','DarioFC',NULL,NULL,NULL,NULL,1,NULL),(23,1,'2020-06-23 15:00:00',8,'D','C','GiovaFC','FranceFC',NULL,NULL,NULL,NULL,1,NULL),(24,1,'2020-06-23 15:00:00',8,'E','F','MicheleFC','PaoloFC',NULL,NULL,NULL,NULL,1,NULL),(25,1,'2020-06-30 15:00:00',9,'B','D','DarioFC','GiovaFC',NULL,NULL,NULL,NULL,1,NULL),(26,1,'2020-06-30 15:00:00',9,'E','C','MicheleFC','FranceFC',NULL,NULL,NULL,NULL,1,NULL),(27,1,'2020-06-30 15:00:00',9,'F','A','PaoloFC','SandroFC',NULL,NULL,NULL,NULL,1,NULL),(28,1,'2020-07-07 15:00:00',10,'A','E','SandroFC','MicheleFC',NULL,NULL,NULL,NULL,1,NULL),(29,1,'2020-07-07 15:00:00',10,'C','B','FranceFC','DarioFC',NULL,NULL,NULL,NULL,1,NULL),(30,1,'2020-07-07 15:00:00',10,'D','F','GiovaFC','PaoloFC',NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `calendario` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `fantaball`.`update_risulato` BEFORE UPDATE ON `calendario` FOR EACH ROW
BEGIN
IF(NEW.goalA IS NOT NULL AND NEW.goalB IS NOT NULL) THEN

SET NEW.risultato = (SELECT CASE WHEN NEW.goalA > NEW.goalB THEN 1
														WHEN NEW.goalA < NEW.goalB THEN 2
                                                        ELSE 0 END
								FROM calendario 
                                WHERE idPartita = NEW.idPartita
                                LIMIT 1);

END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `calendario10`
--

DROP TABLE IF EXISTS `calendario10`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendario10` (
  `nGiornata` int(11) NOT NULL,
  `etichettaA` varchar(45) NOT NULL,
  `etichettaB` varchar(45) NOT NULL,
  PRIMARY KEY (`nGiornata`,`etichettaA`,`etichettaB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendario10`
--

LOCK TABLES `calendario10` WRITE;
/*!40000 ALTER TABLE `calendario10` DISABLE KEYS */;
INSERT INTO `calendario10` VALUES (1,'A','H'),(1,'B','C'),(1,'D','G'),(1,'E','F'),(1,'L','I'),(2,'C','A'),(2,'F','L'),(2,'G','E'),(2,'H','D'),(2,'I','B'),(3,'A','I'),(3,'B','F'),(3,'D','C'),(3,'H','G'),(3,'L','E'),(4,'C','H'),(4,'E','B'),(4,'F','A'),(4,'G','L'),(4,'I','D'),(5,'A','E'),(5,'B','L'),(5,'C','G'),(5,'D','F'),(5,'H','I'),(6,'E','D'),(6,'F','H'),(6,'G','B'),(6,'I','C'),(6,'L','A'),(7,'A','B'),(7,'C','F'),(7,'D','L'),(7,'H','E'),(7,'I','G'),(8,'A','G'),(8,'B','D'),(8,'E','C'),(8,'F','I'),(8,'L','H'),(9,'C','L'),(9,'D','A'),(9,'G','F'),(9,'H','B'),(9,'I','E'),(10,'C','B'),(10,'F','E'),(10,'G','D'),(10,'H','A'),(10,'I','L'),(11,'A','C'),(11,'B','I'),(11,'D','H'),(11,'E','G'),(11,'L','F'),(12,'C','D'),(12,'E','L'),(12,'F','B'),(12,'G','H'),(12,'I','A'),(13,'A','F'),(13,'B','E'),(13,'D','I'),(13,'H','C'),(13,'L','G'),(14,'E','A'),(14,'F','D'),(14,'G','C'),(14,'I','H'),(14,'L','B'),(15,'A','L'),(15,'B','G'),(15,'C','I'),(15,'D','E'),(15,'H','F'),(16,'B','A'),(16,'E','H'),(16,'F','C'),(16,'G','I'),(16,'L','D'),(17,'C','E'),(17,'D','B'),(17,'G','A'),(17,'H','L'),(17,'I','F'),(18,'A','D'),(18,'B','H'),(18,'E','I'),(18,'F','G'),(18,'L','C');
/*!40000 ALTER TABLE `calendario10` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendario6`
--

DROP TABLE IF EXISTS `calendario6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendario6` (
  `nGiornata` int(11) NOT NULL,
  `etichettaA` varchar(45) NOT NULL,
  `etichettaB` varchar(45) NOT NULL,
  PRIMARY KEY (`nGiornata`,`etichettaA`,`etichettaB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendario6`
--

LOCK TABLES `calendario6` WRITE;
/*!40000 ALTER TABLE `calendario6` DISABLE KEYS */;
INSERT INTO `calendario6` VALUES (1,'B','E'),(1,'C','F'),(1,'D','A'),(2,'A','C'),(2,'E','D'),(2,'F','B'),(3,'B','A'),(3,'C','D'),(3,'F','E'),(4,'A','F'),(4,'C','E'),(4,'D','B'),(5,'B','C'),(5,'E','A'),(5,'F','D'),(6,'A','D'),(6,'E','B'),(6,'F','C'),(7,'B','F'),(7,'C','A'),(7,'D','E'),(8,'A','B'),(8,'D','C'),(8,'E','F'),(9,'B','D'),(9,'E','C'),(9,'F','A'),(10,'A','E'),(10,'C','B'),(10,'D','F');
/*!40000 ALTER TABLE `calendario6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendario8`
--

DROP TABLE IF EXISTS `calendario8`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendario8` (
  `nGiornata` int(11) NOT NULL,
  `etichettaA` varchar(45) NOT NULL,
  `etichettaB` varchar(45) NOT NULL,
  PRIMARY KEY (`nGiornata`,`etichettaA`,`etichettaB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendario8`
--

LOCK TABLES `calendario8` WRITE;
/*!40000 ALTER TABLE `calendario8` DISABLE KEYS */;
INSERT INTO `calendario8` VALUES (1,'A','B'),(1,'C','H'),(1,'D','G'),(1,'F','E'),(2,'B','F'),(2,'E','D'),(2,'G','C'),(2,'H','A'),(3,'C','E'),(3,'D','B'),(3,'F','A'),(3,'G','H'),(4,'A','D'),(4,'B','C'),(4,'E','G'),(4,'H','F'),(5,'C','A'),(5,'D','F'),(5,'E','H'),(5,'G','B'),(6,'A','G'),(6,'B','E'),(6,'D','H'),(6,'F','C'),(7,'C','D'),(7,'E','A'),(7,'G','F'),(7,'H','B'),(8,'B','A'),(8,'E','F'),(8,'G','D'),(8,'H','C'),(9,'A','H'),(9,'C','G'),(9,'D','E'),(9,'F','B'),(10,'A','F'),(10,'B','D'),(10,'E','C'),(10,'H','G'),(11,'C','B'),(11,'D','A'),(11,'F','H'),(11,'G','E'),(12,'A','C'),(12,'B','G'),(12,'F','D'),(12,'H','E'),(13,'C','F'),(13,'E','B'),(13,'G','A'),(13,'H','D'),(14,'A','E'),(14,'B','H'),(14,'D','C'),(14,'F','G');
/*!40000 ALTER TABLE `calendario8` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classifica`
--

DROP TABLE IF EXISTS `classifica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classifica` (
  `squadra` varchar(45) NOT NULL,
  `punti` int(2) NOT NULL DEFAULT '0',
  `giocate` int(11) NOT NULL DEFAULT '0',
  `vittorie` int(2) NOT NULL DEFAULT '0',
  `pareggi` int(2) NOT NULL DEFAULT '0',
  `sconfitte` int(2) NOT NULL DEFAULT '0',
  `goalFatti` int(11) NOT NULL DEFAULT '0',
  `goalSubiti` int(11) NOT NULL DEFAULT '0',
  `votiTot` decimal(11,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`squadra`),
  KEY `classificaSquadra_idx` (`squadra`),
  CONSTRAINT `classificaSquadra` FOREIGN KEY (`squadra`) REFERENCES `squadre` (`nomeSquadra`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classifica`
--

LOCK TABLES `classifica` WRITE;
/*!40000 ALTER TABLE `classifica` DISABLE KEYS */;
INSERT INTO `classifica` VALUES ('DarioFC',9,3,3,0,0,6,5,119.0),('FranceFC',4,2,1,1,0,2,3,1.0),('GiovaFC',0,1,0,0,1,1,0,0.0),('MicheleFC',3,2,1,0,1,0,4,49.0),('PaoloFC',4,2,1,1,0,5,2,0.0),('RazzaFC',0,0,0,0,0,0,0,0.0),('SandroFC',6,2,2,0,0,3,3,5.0);
/*!40000 ALTER TABLE `classifica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `classifica_leghe`
--

DROP TABLE IF EXISTS `classifica_leghe`;
/*!50001 DROP VIEW IF EXISTS `classifica_leghe`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `classifica_leghe` AS SELECT 
 1 AS `squadra`,
 1 AS `punti`,
 1 AS `G`,
 1 AS `V`,
 1 AS `P`,
 1 AS `S`,
 1 AS `GF`,
 1 AS `GS`,
 1 AS `DR`,
 1 AS `TOT`,
 1 AS `lega`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `formazioni`
--

DROP TABLE IF EXISTS `formazioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formazioni` (
  `idPartita` int(11) NOT NULL,
  `squadra` varchar(45) NOT NULL,
  `calciatore` int(11) NOT NULL,
  `voto` decimal(11,1) DEFAULT NULL,
  `goal` int(11) DEFAULT '0' COMMENT 'quanti goal',
  `assist` int(11) DEFAULT '0',
  `giallo` tinyint(1) DEFAULT '0',
  `rosso` tinyint(1) DEFAULT '0',
  `autorete` int(11) DEFAULT '0',
  `rigoreSbagliato` int(11) DEFAULT '0',
  `goalSubito` int(11) DEFAULT '0',
  `rigoreParato` int(11) DEFAULT '0',
  `stato` tinyint(4) DEFAULT '1' COMMENT '1=titolare 2=panchina 3=tribuna',
  `maglia` int(11) DEFAULT '0',
  PRIMARY KEY (`idPartita`,`squadra`,`calciatore`),
  KEY `squadraFormazione_idx` (`squadra`),
  KEY `giocatoreSchierato_idx` (`calciatore`),
  CONSTRAINT `giocatoreSchierato` FOREIGN KEY (`calciatore`) REFERENCES `calciatori` (`idCalciatore`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `partita` FOREIGN KEY (`idPartita`) REFERENCES `calendario` (`idPartita`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `squadraFormazione` FOREIGN KEY (`squadra`) REFERENCES `squadre` (`nomeSquadra`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formazioni`
--

LOCK TABLES `formazioni` WRITE;
/*!40000 ALTER TABLE `formazioni` DISABLE KEYS */;
INSERT INTO `formazioni` VALUES (1,'DarioFC',7,7.0,0,0,0,0,0,0,0,0,2,0),(1,'DarioFC',9,12.0,0,0,0,0,0,0,0,0,1,0),(1,'DarioFC',82,14.0,2,3,2,0,0,0,0,0,1,0),(1,'DarioFC',83,NULL,0,0,0,0,0,0,0,0,2,0),(1,'DarioFC',85,6.0,0,0,0,0,0,0,0,0,1,0),(1,'DarioFC',87,6.0,0,0,0,0,0,0,0,0,1,0),(1,'DarioFC',88,7.0,0,0,0,0,0,0,0,0,2,0),(1,'DarioFC',267,NULL,0,0,0,0,0,0,0,0,2,0),(1,'DarioFC',268,7.0,0,0,0,0,0,0,0,0,1,0),(1,'DarioFC',269,6.0,0,0,0,0,0,0,0,0,1,0),(1,'DarioFC',271,7.0,0,0,0,0,0,0,0,0,1,0),(1,'DarioFC',272,NULL,0,0,0,0,0,0,0,0,2,0),(1,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,1,0),(1,'DarioFC',274,7.0,0,0,0,0,0,0,0,0,1,0),(1,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,0),(1,'DarioFC',444,7.0,0,0,0,0,0,0,0,0,1,0),(1,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,2,0),(1,'DarioFC',447,7.0,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',17,7.0,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(1,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',107,NULL,0,0,0,0,0,0,0,0,2,0),(1,'MicheleFC',109,7.0,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',111,7.0,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',112,NULL,0,0,0,0,0,0,0,0,2,0),(1,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,2,0),(1,'MicheleFC',292,7.0,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',293,NULL,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',295,NULL,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,2,0),(1,'MicheleFC',297,7.0,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',298,7.0,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,2,0),(1,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,1,0),(1,'MicheleFC',465,NULL,0,0,0,0,0,0,0,0,2,0),(1,'MicheleFC',467,7.0,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',17,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(5,'MicheleFC',105,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',108,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',109,NULL,0,0,0,0,0,0,0,0,2,0),(5,'MicheleFC',110,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',111,NULL,0,0,0,0,0,0,0,0,2,0),(5,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',292,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',294,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',295,NULL,0,0,0,0,0,0,0,0,2,0),(5,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',297,NULL,0,0,0,0,0,0,0,0,2,0),(5,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,1,0),(5,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,2,0),(5,'MicheleFC',466,NULL,0,0,0,0,0,0,0,0,2,0),(5,'MicheleFC',468,NULL,0,0,0,0,0,0,0,0,1,0),(6,'DarioFC',7,2.0,0,0,0,0,0,0,0,0,1,1),(6,'DarioFC',8,NULL,0,0,0,0,0,0,0,0,2,12),(6,'DarioFC',81,1.0,0,0,0,0,0,0,0,0,1,5),(6,'DarioFC',82,NULL,0,0,0,0,0,0,0,0,2,14),(6,'DarioFC',83,10.0,0,0,0,0,0,0,0,0,1,3),(6,'DarioFC',84,NULL,0,0,0,0,0,0,0,0,1,2),(6,'DarioFC',86,NULL,0,0,0,0,0,0,0,0,2,13),(6,'DarioFC',88,10.0,0,0,0,0,0,0,0,0,1,4),(6,'DarioFC',267,6.0,0,0,0,0,0,0,0,0,1,8),(6,'DarioFC',268,NULL,0,0,0,0,0,0,0,0,2,15),(6,'DarioFC',269,NULL,0,0,0,0,0,0,0,0,1,6),(6,'DarioFC',270,1.0,0,0,0,0,0,0,0,0,1,9),(6,'DarioFC',272,3.0,0,0,0,0,0,0,0,0,1,10),(6,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,2,16),(6,'DarioFC',274,5.0,0,0,0,0,0,0,0,0,1,7),(6,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,17),(6,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,1,11),(6,'DarioFC',446,NULL,0,0,0,0,0,0,0,0,2,18),(7,'DarioFC',7,NULL,0,0,0,0,0,0,0,0,1,1),(7,'DarioFC',8,NULL,0,0,0,0,0,0,0,0,2,12),(7,'DarioFC',81,NULL,0,0,0,0,0,0,0,0,1,5),(7,'DarioFC',82,NULL,0,0,0,0,0,0,0,0,2,13),(7,'DarioFC',83,NULL,0,0,0,0,0,0,0,0,1,3),(7,'DarioFC',84,NULL,0,0,0,0,0,0,0,0,1,2),(7,'DarioFC',86,NULL,0,0,0,0,0,0,0,0,2,14),(7,'DarioFC',88,NULL,0,0,0,0,0,0,0,0,1,4),(7,'DarioFC',267,NULL,0,0,0,0,0,0,0,0,1,9),(7,'DarioFC',268,NULL,0,0,0,0,0,0,0,0,2,15),(7,'DarioFC',269,NULL,0,0,0,0,0,0,0,0,1,7),(7,'DarioFC',270,NULL,0,0,0,0,0,0,0,0,1,6),(7,'DarioFC',272,NULL,0,0,0,0,0,0,0,0,1,10),(7,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,2,16),(7,'DarioFC',274,NULL,0,0,0,0,0,0,0,0,1,8),(7,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,18),(7,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,1,11),(7,'DarioFC',446,NULL,0,0,0,0,0,0,0,0,2,17),(9,'MicheleFC',17,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(9,'MicheleFC',105,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',108,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',109,NULL,0,0,0,0,0,0,0,0,2,0),(9,'MicheleFC',110,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',111,NULL,0,0,0,0,0,0,0,0,2,0),(9,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',292,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',294,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',295,NULL,0,0,0,0,0,0,0,0,2,0),(9,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',297,NULL,0,0,0,0,0,0,0,0,2,0),(9,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,1,0),(9,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,2,0),(9,'MicheleFC',466,NULL,0,0,0,0,0,0,0,0,2,0),(9,'MicheleFC',468,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',17,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(11,'MicheleFC',105,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',108,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',109,NULL,0,0,0,0,0,0,0,0,2,0),(11,'MicheleFC',110,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',111,NULL,0,0,0,0,0,0,0,0,2,0),(11,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',292,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',294,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',295,NULL,0,0,0,0,0,0,0,0,2,0),(11,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',297,NULL,0,0,0,0,0,0,0,0,2,0),(11,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,1,0),(11,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,2,0),(11,'MicheleFC',466,NULL,0,0,0,0,0,0,0,0,2,0),(11,'MicheleFC',468,NULL,0,0,0,0,0,0,0,0,1,0),(12,'DarioFC',7,NULL,0,0,0,0,0,0,0,0,1,1),(12,'DarioFC',8,NULL,0,0,0,0,0,0,0,0,2,12),(12,'DarioFC',81,NULL,0,0,0,0,0,0,0,0,1,5),(12,'DarioFC',82,NULL,0,0,0,0,0,0,0,0,2,13),(12,'DarioFC',83,NULL,0,0,0,0,0,0,0,0,1,3),(12,'DarioFC',84,NULL,0,0,0,0,0,0,0,0,1,2),(12,'DarioFC',86,NULL,0,0,0,0,0,0,0,0,2,14),(12,'DarioFC',88,NULL,0,0,0,0,0,0,0,0,1,4),(12,'DarioFC',267,NULL,0,0,0,0,0,0,0,0,1,9),(12,'DarioFC',268,NULL,0,0,0,0,0,0,0,0,2,15),(12,'DarioFC',269,NULL,0,0,0,0,0,0,0,0,1,7),(12,'DarioFC',270,NULL,0,0,0,0,0,0,0,0,1,6),(12,'DarioFC',272,NULL,0,0,0,0,0,0,0,0,1,10),(12,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,2,16),(12,'DarioFC',274,NULL,0,0,0,0,0,0,0,0,1,8),(12,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,18),(12,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,1,11),(12,'DarioFC',446,NULL,0,0,0,0,0,0,0,0,2,17),(13,'DarioFC',7,NULL,0,0,0,0,0,0,0,0,1,1),(13,'DarioFC',8,NULL,0,0,0,0,0,0,0,0,2,12),(13,'DarioFC',81,NULL,0,0,0,0,0,0,0,0,1,5),(13,'DarioFC',82,NULL,0,0,0,0,0,0,0,0,2,13),(13,'DarioFC',83,NULL,0,0,0,0,0,0,0,0,1,3),(13,'DarioFC',84,NULL,0,0,0,0,0,0,0,0,1,2),(13,'DarioFC',86,NULL,0,0,0,0,0,0,0,0,2,14),(13,'DarioFC',88,NULL,0,0,0,0,0,0,0,0,1,4),(13,'DarioFC',267,NULL,0,0,0,0,0,0,0,0,1,9),(13,'DarioFC',268,NULL,0,0,0,0,0,0,0,0,2,15),(13,'DarioFC',269,NULL,0,0,0,0,0,0,0,0,1,7),(13,'DarioFC',270,NULL,0,0,0,0,0,0,0,0,1,6),(13,'DarioFC',272,NULL,0,0,0,0,0,0,0,0,1,10),(13,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,2,16),(13,'DarioFC',274,NULL,0,0,0,0,0,0,0,0,1,8),(13,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,18),(13,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,1,11),(13,'DarioFC',446,NULL,0,0,0,0,0,0,0,0,2,17),(14,'MicheleFC',17,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(14,'MicheleFC',105,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',108,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',109,NULL,0,0,0,0,0,0,0,0,2,0),(14,'MicheleFC',110,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',111,NULL,0,0,0,0,0,0,0,0,2,0),(14,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',292,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',294,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',295,NULL,0,0,0,0,0,0,0,0,2,0),(14,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',297,NULL,0,0,0,0,0,0,0,0,2,0),(14,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,1,0),(14,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,2,0),(14,'MicheleFC',466,NULL,0,0,0,0,0,0,0,0,2,0),(14,'MicheleFC',468,NULL,0,0,0,0,0,0,0,0,1,0),(17,'DarioFC',7,NULL,0,0,0,0,0,0,0,0,1,1),(17,'DarioFC',8,NULL,0,0,0,0,0,0,0,0,2,12),(17,'DarioFC',81,NULL,0,0,0,0,0,0,0,0,1,5),(17,'DarioFC',82,NULL,0,0,0,0,0,0,0,0,2,13),(17,'DarioFC',83,NULL,0,0,0,0,0,0,0,0,1,3),(17,'DarioFC',84,NULL,0,0,0,0,0,0,0,0,1,2),(17,'DarioFC',86,NULL,0,0,0,0,0,0,0,0,2,14),(17,'DarioFC',88,NULL,0,0,0,0,0,0,0,0,1,4),(17,'DarioFC',267,NULL,0,0,0,0,0,0,0,0,1,9),(17,'DarioFC',268,NULL,0,0,0,0,0,0,0,0,2,15),(17,'DarioFC',269,NULL,0,0,0,0,0,0,0,0,1,7),(17,'DarioFC',270,NULL,0,0,0,0,0,0,0,0,1,6),(17,'DarioFC',272,NULL,0,0,0,0,0,0,0,0,1,10),(17,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,2,16),(17,'DarioFC',274,NULL,0,0,0,0,0,0,0,0,1,8),(17,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,18),(17,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,1,11),(17,'DarioFC',446,NULL,0,0,0,0,0,0,0,0,2,17),(17,'MicheleFC',17,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(17,'MicheleFC',105,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',108,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',109,NULL,0,0,0,0,0,0,0,0,2,0),(17,'MicheleFC',110,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',111,NULL,0,0,0,0,0,0,0,0,2,0),(17,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',292,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',294,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',295,NULL,0,0,0,0,0,0,0,0,2,0),(17,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',297,NULL,0,0,0,0,0,0,0,0,2,0),(17,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,1,0),(17,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,2,0),(17,'MicheleFC',466,NULL,0,0,0,0,0,0,0,0,2,0),(17,'MicheleFC',468,NULL,0,0,0,0,0,0,0,0,1,0),(19,'DarioFC',7,NULL,0,0,0,0,0,0,0,0,1,1),(19,'DarioFC',8,NULL,0,0,0,0,0,0,0,0,2,12),(19,'DarioFC',81,NULL,0,0,0,0,0,0,0,0,1,5),(19,'DarioFC',82,NULL,0,0,0,0,0,0,0,0,2,13),(19,'DarioFC',83,NULL,0,0,0,0,0,0,0,0,1,3),(19,'DarioFC',84,NULL,0,0,0,0,0,0,0,0,1,2),(19,'DarioFC',86,NULL,0,0,0,0,0,0,0,0,2,14),(19,'DarioFC',88,NULL,0,0,0,0,0,0,0,0,1,4),(19,'DarioFC',267,NULL,0,0,0,0,0,0,0,0,1,9),(19,'DarioFC',268,NULL,0,0,0,0,0,0,0,0,2,15),(19,'DarioFC',269,NULL,0,0,0,0,0,0,0,0,1,7),(19,'DarioFC',270,NULL,0,0,0,0,0,0,0,0,1,6),(19,'DarioFC',272,NULL,0,0,0,0,0,0,0,0,1,10),(19,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,2,16),(19,'DarioFC',274,NULL,0,0,0,0,0,0,0,0,1,8),(19,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,18),(19,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,1,11),(19,'DarioFC',446,NULL,0,0,0,0,0,0,0,0,2,17),(21,'MicheleFC',17,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(21,'MicheleFC',105,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',108,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',109,NULL,0,0,0,0,0,0,0,0,2,0),(21,'MicheleFC',110,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',111,NULL,0,0,0,0,0,0,0,0,2,0),(21,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',292,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',294,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',295,NULL,0,0,0,0,0,0,0,0,2,0),(21,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',297,NULL,0,0,0,0,0,0,0,0,2,0),(21,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,1,0),(21,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,2,0),(21,'MicheleFC',466,NULL,0,0,0,0,0,0,0,0,2,0),(21,'MicheleFC',468,NULL,0,0,0,0,0,0,0,0,1,0),(22,'DarioFC',7,NULL,0,0,0,0,0,0,0,0,1,1),(22,'DarioFC',8,NULL,0,0,0,0,0,0,0,0,2,12),(22,'DarioFC',81,NULL,0,0,0,0,0,0,0,0,1,5),(22,'DarioFC',82,NULL,0,0,0,0,0,0,0,0,2,13),(22,'DarioFC',83,NULL,0,0,0,0,0,0,0,0,1,3),(22,'DarioFC',84,NULL,0,0,0,0,0,0,0,0,1,2),(22,'DarioFC',86,NULL,0,0,0,0,0,0,0,0,2,14),(22,'DarioFC',88,NULL,0,0,0,0,0,0,0,0,1,4),(22,'DarioFC',267,NULL,0,0,0,0,0,0,0,0,1,9),(22,'DarioFC',268,NULL,0,0,0,0,0,0,0,0,2,15),(22,'DarioFC',269,NULL,0,0,0,0,0,0,0,0,1,7),(22,'DarioFC',270,NULL,0,0,0,0,0,0,0,0,1,6),(22,'DarioFC',272,NULL,0,0,0,0,0,0,0,0,1,10),(22,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,2,16),(22,'DarioFC',274,NULL,0,0,0,0,0,0,0,0,1,8),(22,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,18),(22,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,1,11),(22,'DarioFC',446,NULL,0,0,0,0,0,0,0,0,2,17),(24,'MicheleFC',17,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(24,'MicheleFC',105,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',107,NULL,0,0,0,0,0,0,0,0,2,0),(24,'MicheleFC',108,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',109,NULL,0,0,0,0,0,0,0,0,2,0),(24,'MicheleFC',110,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',111,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',292,NULL,0,0,0,0,0,0,0,0,2,0),(24,'MicheleFC',294,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',297,NULL,0,0,0,0,0,0,0,0,2,0),(24,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,1,0),(24,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,2,0),(24,'MicheleFC',466,NULL,0,0,0,0,0,0,0,0,2,0),(24,'MicheleFC',468,NULL,0,0,0,0,0,0,0,0,1,0),(25,'DarioFC',7,NULL,0,0,0,0,0,0,0,0,1,1),(25,'DarioFC',8,NULL,0,0,0,0,0,0,0,0,2,12),(25,'DarioFC',81,NULL,0,0,0,0,0,0,0,0,1,5),(25,'DarioFC',82,NULL,0,0,0,0,0,0,0,0,2,13),(25,'DarioFC',83,NULL,0,0,0,0,0,0,0,0,1,3),(25,'DarioFC',84,NULL,0,0,0,0,0,0,0,0,1,2),(25,'DarioFC',86,NULL,0,0,0,0,0,0,0,0,2,14),(25,'DarioFC',88,NULL,0,0,0,0,0,0,0,0,1,4),(25,'DarioFC',267,NULL,0,0,0,0,0,0,0,0,1,9),(25,'DarioFC',268,NULL,0,0,0,0,0,0,0,0,2,15),(25,'DarioFC',269,NULL,0,0,0,0,0,0,0,0,1,7),(25,'DarioFC',270,NULL,0,0,0,0,0,0,0,0,1,6),(25,'DarioFC',272,NULL,0,0,0,0,0,0,0,0,1,10),(25,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,2,16),(25,'DarioFC',274,NULL,0,0,0,0,0,0,0,0,1,8),(25,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,18),(25,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,1,11),(25,'DarioFC',446,NULL,0,0,0,0,0,0,0,0,2,17),(26,'MicheleFC',17,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(26,'MicheleFC',105,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',107,NULL,0,0,0,0,0,0,0,0,2,0),(26,'MicheleFC',108,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',109,NULL,0,0,0,0,0,0,0,0,2,0),(26,'MicheleFC',110,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',111,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',292,NULL,0,0,0,0,0,0,0,0,2,0),(26,'MicheleFC',294,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',297,NULL,0,0,0,0,0,0,0,0,2,0),(26,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,1,0),(26,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,2,0),(26,'MicheleFC',466,NULL,0,0,0,0,0,0,0,0,2,0),(26,'MicheleFC',468,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',17,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',18,NULL,0,0,0,0,0,0,0,0,2,0),(28,'MicheleFC',105,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',106,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',107,NULL,0,0,0,0,0,0,0,0,2,0),(28,'MicheleFC',108,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',109,NULL,0,0,0,0,0,0,0,0,2,0),(28,'MicheleFC',110,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',111,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',291,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',292,NULL,0,0,0,0,0,0,0,0,2,0),(28,'MicheleFC',294,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',296,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',297,NULL,0,0,0,0,0,0,0,0,2,0),(28,'MicheleFC',463,NULL,0,0,0,0,0,0,0,0,1,0),(28,'MicheleFC',464,NULL,0,0,0,0,0,0,0,0,2,0),(28,'MicheleFC',466,NULL,0,0,0,0,0,0,0,0,2,0),(28,'MicheleFC',468,NULL,0,0,0,0,0,0,0,0,1,0),(29,'DarioFC',7,NULL,0,0,0,0,0,0,0,0,1,1),(29,'DarioFC',8,NULL,0,0,0,0,0,0,0,0,2,12),(29,'DarioFC',81,NULL,0,0,0,0,0,0,0,0,1,5),(29,'DarioFC',82,NULL,0,0,0,0,0,0,0,0,2,13),(29,'DarioFC',83,NULL,0,0,0,0,0,0,0,0,1,3),(29,'DarioFC',84,NULL,0,0,0,0,0,0,0,0,1,2),(29,'DarioFC',86,NULL,0,0,0,0,0,0,0,0,2,14),(29,'DarioFC',88,NULL,0,0,0,0,0,0,0,0,1,4),(29,'DarioFC',267,NULL,0,0,0,0,0,0,0,0,1,9),(29,'DarioFC',268,NULL,0,0,0,0,0,0,0,0,2,15),(29,'DarioFC',269,NULL,0,0,0,0,0,0,0,0,1,7),(29,'DarioFC',270,NULL,0,0,0,0,0,0,0,0,1,6),(29,'DarioFC',272,NULL,0,0,0,0,0,0,0,0,1,10),(29,'DarioFC',273,NULL,0,0,0,0,0,0,0,0,2,16),(29,'DarioFC',274,NULL,0,0,0,0,0,0,0,0,1,8),(29,'DarioFC',443,NULL,0,0,0,0,0,0,0,0,2,18),(29,'DarioFC',445,NULL,0,0,0,0,0,0,0,0,1,11),(29,'DarioFC',446,NULL,0,0,0,0,0,0,0,0,2,17);
/*!40000 ALTER TABLE `formazioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `parzialeandata`
--

DROP TABLE IF EXISTS `parzialeandata`;
/*!50001 DROP VIEW IF EXISTS `parzialeandata`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `parzialeandata` AS SELECT 
 1 AS `squadra`,
 1 AS `punti`,
 1 AS `giocate`,
 1 AS `vittorie`,
 1 AS `pareggi`,
 1 AS `sconfitte`,
 1 AS `goalFatti`,
 1 AS `goalSubiti`,
 1 AS `votiTot`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `parzialeritorno`
--

DROP TABLE IF EXISTS `parzialeritorno`;
/*!50001 DROP VIEW IF EXISTS `parzialeritorno`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `parzialeritorno` AS SELECT 
 1 AS `squadra`,
 1 AS `punti`,
 1 AS `giocate`,
 1 AS `vittorie`,
 1 AS `pareggi`,
 1 AS `sconfitte`,
 1 AS `goalFatti`,
 1 AS `goalSubiti`,
 1 AS `votiTot`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `rose`
--

DROP TABLE IF EXISTS `rose`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rose` (
  `squadra` varchar(45) NOT NULL,
  `calciatore` int(11) NOT NULL,
  `goalTot` int(11) DEFAULT '0' COMMENT 'serve per le analytics, prima inserisco una tupla con i giocatori che inserisce l''utente per una partita poi modifico la tupla con il voto e i goal se il giocatore ha giocato o meno, scatta il trigger di analytics per quel giocatore',
  `puntiTot` decimal(11,1) DEFAULT '0.0' COMMENT 'serve per le analytics, prima inserisco una tupla con i giocatori che inserisce l''utente per una partita poi modifico la tupla con il voto e i goal se il giocatore ha giocato o meno, scatta il trigger di analytics per quel giocatore',
  `assistTot` int(11) DEFAULT '0',
  `gialliTot` int(11) DEFAULT '0',
  `rossiTot` int(11) DEFAULT '0',
  `autoretiTot` int(11) DEFAULT '0',
  `goalSubitiTot` int(11) DEFAULT '0',
  `rigoriSbagliatiTot` int(11) DEFAULT '0',
  `rigoriParatiTot` int(11) DEFAULT '0',
  PRIMARY KEY (`squadra`,`calciatore`),
  KEY `calciatoreRosa_idx` (`calciatore`),
  CONSTRAINT `calciatoreRosa` FOREIGN KEY (`calciatore`) REFERENCES `calciatori` (`idCalciatore`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `nomeRosa` FOREIGN KEY (`squadra`) REFERENCES `squadre` (`nomeSquadra`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rose`
--

LOCK TABLES `rose` WRITE;
/*!40000 ALTER TABLE `rose` DISABLE KEYS */;
INSERT INTO `rose` VALUES ('DarioFC',7,0,9.0,0,0,0,0,0,0,0),('DarioFC',8,0,1.0,0,0,0,0,0,0,0),('DarioFC',9,0,12.0,0,0,0,0,0,0,0),('DarioFC',81,0,1.0,0,0,0,0,0,0,0),('DarioFc',82,2,14.0,3,0,0,0,0,0,0),('DarioFC',83,0,10.0,0,0,0,0,0,0,0),('DarioFC',84,0,0.0,0,0,0,0,0,0,0),('DarioFC',85,0,6.0,0,0,0,0,0,0,0),('DarioFC',86,0,0.0,0,0,0,0,0,0,0),('DarioFC',87,0,6.0,0,0,0,0,0,0,0),('DarioFC',88,0,17.0,0,0,0,0,0,0,0),('DarioFC',267,0,6.0,0,0,0,0,0,0,0),('DarioFC',268,0,7.0,0,0,0,0,0,0,0),('DarioFC',269,0,6.0,0,0,0,0,0,0,0),('DarioFC',270,0,1.0,0,0,0,0,0,0,0),('DarioFC',271,0,7.0,0,0,0,0,0,0,0),('DarioFC',272,0,3.0,0,0,0,0,0,0,0),('DarioFC',273,0,0.0,0,0,0,0,0,0,0),('DarioFC',274,0,12.0,0,0,0,0,0,0,0),('DarioFC',443,0,0.0,0,0,0,0,0,0,0),('DarioFC',444,0,7.0,0,0,0,0,0,0,0),('DarioFC',445,0,6.0,0,0,0,0,0,0,0),('DarioFC',446,0,0.0,0,0,0,0,0,0,0),('DarioFC',447,0,7.0,0,0,0,0,0,0,0),('DarioFC',448,0,0.0,0,0,0,0,0,0,0),('FranceFC',10,0,0.0,0,0,0,0,0,0,0),('FranceFC',11,0,0.0,0,0,0,0,0,0,0),('FranceFC',12,0,0.0,0,0,0,0,0,0,0),('FranceFC',89,0,0.0,0,0,0,0,0,0,0),('FranceFC',90,0,0.0,0,0,0,0,0,0,0),('FranceFC',91,0,0.0,0,0,0,0,0,0,0),('FranceFC',92,0,0.0,0,0,0,0,0,0,0),('FranceFC',93,0,0.0,0,0,0,0,0,0,0),('FranceFC',94,0,0.0,0,0,0,0,0,0,0),('FranceFC',95,0,0.0,0,0,0,0,0,0,0),('FranceFC',96,0,0.0,0,0,0,0,0,0,0),('FranceFC',275,0,0.0,0,0,0,0,0,0,0),('FranceFC',276,0,0.0,0,0,0,0,0,0,0),('FranceFC',277,0,0.0,0,0,0,0,0,0,0),('FranceFC',278,0,0.0,0,0,0,0,0,0,0),('FranceFC',279,0,0.0,0,0,0,0,0,0,0),('FranceFC',280,0,0.0,0,0,0,0,0,0,0),('FranceFC',281,0,0.0,0,0,0,0,0,0,0),('FranceFC',282,0,0.0,0,0,0,0,0,0,0),('FranceFC',451,0,0.0,0,0,0,0,0,0,0),('FranceFC',452,0,0.0,0,0,0,0,0,0,0),('FranceFC',453,0,0.0,0,0,0,0,0,0,0),('FranceFC',454,0,0.0,0,0,0,0,0,0,0),('FranceFC',455,0,0.0,0,0,0,0,0,0,0),('FranceFC',456,0,0.0,0,0,0,0,0,0,0),('GiovaFC',13,0,0.0,0,0,0,0,0,0,0),('GiovaFC',14,0,0.0,0,0,0,0,0,0,0),('GiovaFC',15,0,0.0,0,0,0,0,0,0,0),('GiovaFC',97,0,0.0,0,0,0,0,0,0,0),('GiovaFC',98,0,0.0,0,0,0,0,0,0,0),('GiovaFC',99,0,0.0,0,0,0,0,0,0,0),('GiovaFC',100,0,0.0,0,0,0,0,0,0,0),('GiovaFC',101,0,0.0,0,0,0,0,0,0,0),('GiovaFC',102,0,0.0,0,0,0,0,0,0,0),('GiovaFC',103,0,0.0,0,0,0,0,0,0,0),('GiovaFC',104,0,0.0,0,0,0,0,0,0,0),('GiovaFC',283,0,0.0,0,0,0,0,0,0,0),('GiovaFC',284,0,0.0,0,0,0,0,0,0,0),('GiovaFC',285,0,0.0,0,0,0,0,0,0,0),('GiovaFC',286,0,0.0,0,0,0,0,0,0,0),('GiovaFC',287,0,0.0,0,0,0,0,0,0,0),('GiovaFC',288,0,0.0,0,0,0,0,0,0,0),('GiovaFC',289,0,0.0,0,0,0,0,0,0,0),('GiovaFC',290,0,0.0,0,0,0,0,0,0,0),('GiovaFC',457,0,0.0,0,0,0,0,0,0,0),('GiovaFC',458,0,0.0,0,0,0,0,0,0,0),('GiovaFC',459,0,0.0,0,0,0,0,0,0,0),('GiovaFC',460,0,0.0,0,0,0,0,0,0,0),('GiovaFC',461,0,0.0,0,0,0,0,0,0,0),('GiovaFC',462,0,0.0,0,0,0,0,0,0,0),('MicheleFC',16,0,0.0,0,0,0,0,0,0,0),('MicheleFC',17,0,7.0,0,0,0,0,0,0,0),('MicheleFC',18,0,0.0,0,0,0,0,0,0,11),('MicheleFC',105,0,0.0,0,0,0,0,0,0,0),('MicheleFC',106,0,6.0,0,0,0,0,0,0,0),('MicheleFC',107,0,0.0,0,0,0,0,0,0,0),('MicheleFC',108,0,0.0,0,0,0,0,0,0,0),('MicheleFC',109,0,7.0,0,0,0,0,0,0,0),('MicheleFC',110,0,0.0,0,0,0,0,0,0,0),('MicheleFC',111,0,7.0,0,0,0,0,0,0,0),('MicheleFC',112,0,0.0,0,0,0,0,0,0,0),('MicheleFC',291,0,5.0,0,0,0,0,0,0,0),('MicheleFC',292,0,7.0,0,0,0,0,0,0,0),('MicheleFC',293,0,0.0,0,0,0,0,0,0,0),('MicheleFC',294,0,0.0,0,0,0,0,0,0,0),('MicheleFC',295,0,6.0,0,0,0,0,0,0,0),('MicheleFC',296,0,0.0,0,0,0,0,0,0,0),('MicheleFC',297,0,7.0,0,0,0,0,0,0,0),('MicheleFC',298,0,7.0,0,0,0,0,0,0,0),('MicheleFC',463,0,0.0,0,0,0,0,0,0,0),('MicheleFC',464,0,0.0,0,0,0,0,0,0,0),('MicheleFC',465,0,7.0,0,0,0,0,0,0,0),('MicheleFC',466,0,0.0,0,0,0,0,0,0,0),('MicheleFC',467,0,7.0,0,0,0,0,0,0,0),('MicheleFC',468,0,0.0,0,0,0,0,0,0,0),('PaoloFC',2,0,0.0,0,0,0,0,0,0,0),('PaoloFC',5,0,0.0,0,0,0,0,0,0,0),('PaoloFC',6,0,0.0,0,0,0,0,0,0,0),('PaoloFC',66,0,0.0,0,0,0,0,0,0,0),('PaoloFC',68,0,0.0,0,0,0,0,0,0,0),('PaoloFC',69,0,0.0,0,0,0,0,0,0,0),('PaoloFC',70,0,0.0,0,0,0,0,0,0,0),('PaoloFC',72,0,0.0,0,0,0,0,0,0,0),('PaoloFC',74,0,0.0,0,0,0,0,0,0,0),('PaoloFC',75,0,0.0,0,0,0,0,0,0,0),('PaoloFC',76,0,0.0,0,0,0,0,0,0,0),('PaoloFC',251,0,0.0,0,0,0,0,0,0,0),('PaoloFC',252,0,0.0,0,0,0,0,0,0,0),('PaoloFC',253,0,0.0,0,0,0,0,0,0,0),('PaoloFC',254,0,0.0,0,0,0,0,0,0,0),('PaoloFC',255,0,0.0,0,0,0,0,0,0,0),('PaoloFC',256,0,0.0,0,0,0,0,0,0,0),('PaoloFC',257,0,0.0,0,0,0,0,0,0,0),('PaoloFC',258,0,0.0,0,0,0,0,0,0,0),('PaoloFC',431,0,0.0,0,0,0,0,0,0,0),('PaoloFC',432,0,0.0,0,0,0,0,0,0,0),('PaoloFC',433,0,0.0,0,0,0,0,0,0,0),('PaoloFC',434,0,0.0,0,0,0,0,0,0,0),('PaoloFC',435,0,0.0,0,0,0,0,0,0,0),('PaoloFC',436,0,0.0,0,0,0,0,0,0,0),('RazzaFC',1,0,0.0,0,0,0,0,0,0,0),('RazzaFC',3,0,0.0,0,0,0,0,0,0,0),('RazzaFC',4,0,0.0,0,0,0,0,0,0,0),('RazzaFC',65,0,0.0,0,0,0,0,0,0,0),('RazzaFC',67,0,0.0,0,0,0,0,0,0,0),('RazzaFC',71,0,0.0,0,0,0,0,0,0,0),('RazzaFC',73,0,0.0,0,0,0,0,0,0,0),('RazzaFC',79,0,0.0,0,0,0,0,0,0,0),('RazzaFC',80,0,0.0,0,0,0,0,0,0,0),('RazzaFC',81,0,0.0,0,0,0,0,0,0,0),('RazzaFC',82,0,0.0,0,0,0,0,0,0,0),('RazzaFC',259,0,0.0,0,0,0,0,0,0,0),('RazzaFC',260,0,0.0,0,0,0,0,0,0,0),('RazzaFC',261,0,0.0,0,0,0,0,0,0,0),('RazzaFC',262,0,0.0,0,0,0,0,0,0,0),('RazzaFC',263,0,0.0,0,0,0,0,0,0,0),('RazzaFC',264,0,0.0,0,0,0,0,0,0,0),('RazzaFC',265,0,0.0,0,0,0,0,0,0,0),('RazzaFC',266,0,0.0,0,0,0,0,0,0,0),('RazzaFC',437,0,0.0,0,0,0,0,0,0,0),('RazzaFC',438,0,0.0,0,0,0,0,0,0,0),('RazzaFC',439,0,0.0,0,0,0,0,0,0,0),('RazzaFC',440,0,0.0,0,0,0,0,0,0,0),('RazzaFC',441,0,0.0,0,0,0,0,0,0,0),('RazzaFC',442,0,0.0,0,0,0,0,0,0,0),('SandroFC',4,0,0.0,0,0,0,0,0,0,0),('SandroFC',5,0,0.0,0,0,0,0,0,0,0),('SandroFC',6,0,0.0,0,0,0,0,0,0,0),('SandroFC',73,0,0.0,0,0,0,0,0,0,0),('SandroFC',74,0,0.0,0,0,0,0,0,0,0),('SandroFC',75,0,0.0,0,0,0,0,0,0,0),('SandroFC',76,0,0.0,0,0,0,0,0,0,0),('SandroFC',77,0,0.0,0,0,0,0,0,0,0),('SandroFC',78,0,0.0,0,0,0,0,0,0,0),('SandroFC',79,0,0.0,0,0,0,0,0,0,0),('SandroFC',80,0,0.0,0,0,0,0,0,0,0),('SandroFC',259,0,0.0,0,0,0,0,0,0,0),('SandroFC',260,0,0.0,0,0,0,0,0,0,0),('SandroFC',261,0,0.0,0,0,0,0,0,0,0),('SandroFC',262,0,0.0,0,0,0,0,0,0,0),('SandroFC',263,0,0.0,0,0,0,0,0,0,0),('SandroFC',264,0,0.0,0,0,0,0,0,0,0),('SandroFC',265,0,0.0,0,0,0,0,0,0,0),('SandroFC',266,0,0.0,0,0,0,0,0,0,0),('SandroFC',437,0,0.0,0,0,0,0,0,0,0),('SandroFC',438,0,0.0,0,0,0,0,0,0,0),('SandroFC',439,0,0.0,0,0,0,0,0,0,0),('SandroFC',440,0,0.0,0,0,0,0,0,0,0),('SandroFC',441,0,0.0,0,0,0,0,0,0,0),('SandroFC',442,0,0.0,0,0,0,0,0,0,0),('SaverioFC',1,0,0.0,0,0,0,0,0,0,0),('SaverioFC',2,0,0.0,0,0,0,0,0,0,0),('SaverioFC',3,0,0.0,0,0,0,0,0,0,0),('SaverioFC',65,0,0.0,0,0,0,0,0,0,0),('SaverioFC',66,0,0.0,0,0,0,0,0,0,0),('SaverioFC',67,0,0.0,0,0,0,0,0,0,0),('SaverioFC',68,0,0.0,0,0,0,0,0,0,0),('SaverioFC',69,0,0.0,0,0,0,0,0,0,0),('SaverioFC',70,0,0.0,0,0,0,0,0,0,0),('SaverioFC',71,0,0.0,0,0,0,0,0,0,0),('SaverioFC',72,0,0.0,0,0,0,0,0,0,0),('SaverioFC',251,0,0.0,0,0,0,0,0,0,0),('SaverioFC',252,0,0.0,0,0,0,0,0,0,0),('SaverioFC',253,0,0.0,0,0,0,0,0,0,0),('SaverioFC',254,0,0.0,0,0,0,0,0,0,0),('SaverioFC',255,0,0.0,0,0,0,0,0,0,0),('SaverioFC',256,0,0.0,0,0,0,0,0,0,0),('SaverioFC',257,0,0.0,0,0,0,0,0,0,0),('SaverioFC',258,0,0.0,0,0,0,0,0,0,0),('SaverioFC',431,0,0.0,0,0,0,0,0,0,0),('SaverioFC',432,0,0.0,0,0,0,0,0,0,0),('SaverioFC',433,0,0.0,0,0,0,0,0,0,0),('SaverioFC',434,0,0.0,0,0,0,0,0,0,0),('SaverioFC',435,0,0.0,0,0,0,0,0,0,0),('SaverioFC',436,0,0.0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `rose` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `squadre`
--

DROP TABLE IF EXISTS `squadre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `squadre` (
  `nomeSquadra` varchar(45) NOT NULL,
  `giocatore` varchar(45) NOT NULL,
  `lega` int(11) NOT NULL,
  PRIMARY KEY (`nomeSquadra`),
  KEY `proprietario_idx` (`giocatore`),
  KEY `lega_idx` (`lega`),
  CONSTRAINT `torneoTabellaSquadre` FOREIGN KEY (`lega`) REFERENCES `tornei` (`idTorneo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `usernameTabellaSquadre` FOREIGN KEY (`giocatore`) REFERENCES `utenti` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `squadre`
--

LOCK TABLES `squadre` WRITE;
/*!40000 ALTER TABLE `squadre` DISABLE KEYS */;
INSERT INTO `squadre` VALUES ('DarioFC','d.verdi',1),('FranceFC','f.gialli',1),('GiovaFC','g.rosi',1),('MicheleFC','m.rossi',1),('PaoloFC','p.neri',1),('RazzaFC','s.razzauti',2),('SandroFC','s.bianchi',1);
/*!40000 ALTER TABLE `squadre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tornei`
--

DROP TABLE IF EXISTS `tornei`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tornei` (
  `idTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTorneo` varchar(45) NOT NULL,
  `dataInizio` datetime NOT NULL,
  `dataFine` datetime DEFAULT NULL,
  `numeroMaxPartecipanti` int(11) NOT NULL,
  PRIMARY KEY (`idTorneo`),
  UNIQUE KEY `nome_UNIQUE` (`nomeTorneo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tornei`
--

LOCK TABLES `tornei` WRITE;
/*!40000 ALTER TABLE `tornei` DISABLE KEYS */;
INSERT INTO `tornei` VALUES (1,'Gli Amici Toscani','2020-04-28 23:58:50',NULL,6),(2,'Livornesi DOC','2020-04-29 00:07:41',NULL,8);
/*!40000 ALTER TABLE `tornei` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utenti`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utenti` (
  `username` varchar(45) NOT NULL,
  `nome` char(45) NOT NULL,
  `cognome` char(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utenti`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` VALUES ('admin','admin','admin','admin','admin'),('d.verdi','Dario','Verdi','dario@verdi.it','123'),('f.gialli','Francesco','Gialli','francesco@gialli.it','123'),('g.rosi','Giovanni','Rosi','giovanni@rosi.it','123'),('m.rossi','Michele','Rossi','michele@rossi.it','123'),('p.neri','Paolo','Neri','paolo@neri.it','123'),('s.bianchi','Sandro','Bianchi','sandro@bianchi.it','123'),('s.razzauti','Simone','Razzauti','simone@razzauti.it','123');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'fantaball'
--
/*!50003 DROP FUNCTION IF EXISTS `goal_squadra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `goal_squadra`(voto DECIMAL) RETURNS int(11)
BEGIN
DECLARE goal INT DEFAULT 0;

IF(voto >= 66) THEN
set @a = voto - 66;
set @b = floor(@a/6);
set goal= floor(@b) + 1;
end if;

RETURN goal;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `calcolo_Voti` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `calcolo_Voti`(IN _partita INT, IN _squadra VARCHAR(45))
BEGIN
/* modulo */
SET @nD =  (SELECT D.quanti FROM (SELECT ruolo, count(*) AS quanti
						FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						WHERE idPartita = _partita AND squadra = _squadra AND stato = 1
						GROUP BY ruolo) AS D
						WHERE ruolo = 'D');
                    
SET @nC =  (SELECT D.quanti FROM (SELECT ruolo, count(*) AS quanti
						FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						WHERE idPartita = _partita AND squadra = _squadra AND stato = 1
						GROUP BY ruolo) AS D
						WHERE ruolo = 'C');
SET @nA = 10 - @nC - @nD;
SET @nP = 1;

/* contatori */
SET @votoTot = 0;
SET @cambi_disponibili = 3;

/* analisi portieri:
se il portiere titolare gioca si incrementa il votoTot altrimenti si valuta se gioca la riserva e in caso giochi si incrementa il votoTot e si decrementa i cambi_disponibili fino a che non si esauriscono i cambi, 
i cambi vengono effettuati per ordine di maglia ovvero prima i P->D->C->A nell'ordine di inserimento scelto dagli utenti che hanno inserito la formazione*/

/* salvo in @nTG il numero dei titolari per ruolo che giocano*/
SET @nTG =  (SELECT IFNULL(count(*), 0) AS quanti
						  FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						  WHERE idPartita = _partita AND squadra = _squadra AND stato = 1 AND voto IS NOT NULL AND ruolo = 'P');

/*salvo in @par il totale dei voti per ruolo dei titolari, se nessun titolare gioca per un determinato ruolo allora @par è 0*/
SET @par = (SELECT IFNULL(SUM(voto), 0) AS voti
						FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						WHERE idPartita = _partita AND squadra = _squadra AND stato = 1 AND voto IS NOT NULL AND  ruolo = 'P');

/* aggiorno i voti toali con il numero dei voti dei titolari per ruolo*/ 
SET @votoTot = @votoTot + @par;

/*select @nTG, @par, @nC, @cambi_disponibili;*/ 
/* se giocano meno titolari di quanti ne dovrebbero giocare nel modulo e ci sono ancora cambi disponibili si effettua una sostituizione per ordine di maglia  */
IF(@nTG <> @nP AND @cambi_disponibili > 0) THEN

/* salvo la differenza di quanti giocatori mancano per arrivare al numero del modulo qdnv = quanti differenza non voto se la differenza è maggiore prelevo il massimo dai cambi fino a saturarli*/
SET @qdnv = @nP - @nTG;
/*select @qdnv as differenza; */

IF(@qdnv > @cambi_disponibili) THEN
	SET @qdnv = @cambi_disponibili;
END IF;
/*select @qdnv; */

/*salvo il totale dei voti dei giocatori riserve con voto fino ad un massimo di @qdnv in ordine di maglia, se nessuna riserva gioca sommo 0*/
SET @sql = (SELECT CONCAT('SET @par =  ( SELECT IFNULL(SUM(D.voto), 0)
																					  FROM(
																								SELECT IFNULL(voto, 0) AS voto
																								FROM  formazioni INNER JOIN calciatori ON calciatore = idCalciatore
																							    WHERE idPartita =', _partita, ' AND squadra = ''', _squadra, ''' AND stato = 2 AND voto IS NOT NULL AND ruolo = ''P''
                                                                                                ORDER BY maglia
																							    LIMIT ?) AS D
																					)'));
PREPARE stmt FROM @sql;
    
EXECUTE stmt USING @qdnv;

/*salvo il totale dei giocatori riserve con voto fino ad un massimo di @qdnv in ordine di maglia, se nessuna riserva gioca cambio 0 giocatori*/
SET @sql = (SELECT CONCAT('SET @cambi = ( SELECT IFNULL(COUNT(D.voto), 0)
																						  FROM(
																								     SELECT IFNULL(voto, 0) AS voto
																								     FROM  formazioni INNER JOIN calciatori ON calciatore = idCalciatore
																							         WHERE idPartita =', _partita, ' AND squadra = ''', _squadra, ''' AND stato = 2 AND voto IS NOT NULL AND ruolo = ''P''
                                                                                                     ORDER BY maglia
																							         LIMIT ?) AS D
																						)'));
PREPARE stmt FROM @sql;
    
EXECUTE stmt USING @qdnv;

/* aggiorno i contatori, se non ho trovato nessun giocatore con voto nelle riserve sommo o sottraggo 0 rispettivamente ai voti totali e ai cambi totali disponibili */
SET @cambi_disponibili = @cambi_disponibili - @cambi;
SET @votoTot = @votoTot + @par;
	
END IF;


/* analisi difensori */
/* salvo in @nTG il numero dei titolari per ruolo che giocano*/
SET @nTG =  (SELECT IFNULL(count(*), 0) AS quanti
						  FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						  WHERE idPartita = _partita AND squadra = _squadra AND stato = 1 AND voto IS NOT NULL AND ruolo = 'D');

/*salvo in @par il totale dei voti per ruolo dei titolari, se nessun titolare gioca per un determinato ruolo allora @par è 0*/
SET @par = (SELECT IFNULL(SUM(voto), 0) AS voti
						FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						WHERE idPartita = _partita AND squadra = _squadra AND stato = 1 AND voto IS NOT NULL AND  ruolo = 'D');

/* aggiorno i voti toali con il numero dei voti dei titolari per ruolo*/ 
SET @votoTot = @votoTot + @par;

/*select @nTG, @par, @nC, @cambi_disponibili;*/ 
/* se giocano meno titolari di quanti ne dovrebbero giocare nel modulo e ci sono ancora cambi disponibili si effettua una sostituizione per ordine di maglia  */
IF(@nTG <> @nD AND @cambi_disponibili > 0) THEN

/* salvo la differenza di quanti giocatori mancano per arrivare al numero del modulo qdnv = quanti differenza non voto se la differenza è maggiore prelevo il massimo dai cambi fino a saturarli*/
SET @qdnv = @nD - @nTG;
/*select @qdnv as differenza; */

IF(@qdnv > @cambi_disponibili) THEN
	SET @qdnv = @cambi_disponibili;
END IF;
/*select @qdnv; */

/*salvo il totale dei voti dei giocatori riserve con voto fino ad un massimo di @qdnv in ordine di maglia, se nessuna riserva gioca sommo 0*/
SET @sql = (SELECT CONCAT('SET @par =  ( SELECT IFNULL(SUM(D.voto), 0)
																					  FROM(
																								SELECT IFNULL(voto, 0) AS voto
																								FROM  formazioni INNER JOIN calciatori ON calciatore = idCalciatore
																							    WHERE idPartita =', _partita, ' AND squadra = ''', _squadra, ''' AND stato = 2 AND voto IS NOT NULL AND ruolo = ''D''
                                                                                                ORDER BY maglia
																							    LIMIT ?) AS D
																					)'));
PREPARE stmt FROM @sql;
    
EXECUTE stmt USING @qdnv;

/*salvo il totale dei giocatori riserve con voto fino ad un massimo di @qdnv in ordine di maglia, se nessuna riserva gioca cambio 0 giocatori*/
SET @sql = (SELECT CONCAT('SET @cambi = ( SELECT IFNULL(COUNT(D.voto), 0)
																						  FROM(
																								     SELECT IFNULL(voto, 0) AS voto
																								     FROM  formazioni INNER JOIN calciatori ON calciatore = idCalciatore
																							         WHERE idPartita =', _partita, ' AND squadra = ''', _squadra, ''' AND stato = 2 AND voto IS NOT NULL AND ruolo = ''D''
                                                                                                     ORDER BY maglia
																							         LIMIT ?) AS D
																						)'));
PREPARE stmt FROM @sql;
    
EXECUTE stmt USING @qdnv;

/* aggiorno i contatori, se non ho trovato nessun giocatore con voto nelle riserve sommo o sottraggo 0 rispettivamente ai voti totali e ai cambi totali disponibili */
SET @cambi_disponibili = @cambi_disponibili - @cambi;
SET @votoTot = @votoTot + @par;
	
END IF;


/* analisi centrocampisti */
/* salvo in @nTG il numero dei titolari per ruolo che giocano*/
SET @nTG =  (SELECT IFNULL(count(*), 0) AS quanti
						  FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						  WHERE idPartita = _partita AND squadra = _squadra AND stato = 1 AND voto IS NOT NULL AND ruolo = 'C');

/*salvo in @par il totale dei voti per ruolo dei titolari, se nessun titolare gioca per un determinato ruolo allora @par è 0*/
SET @par = (SELECT IFNULL(SUM(voto), 0) AS voti
						FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						WHERE idPartita = _partita AND squadra = _squadra AND stato = 1 AND voto IS NOT NULL AND  ruolo = 'C');

/* aggiorno i voti toali con il numero dei voti dei titolari per ruolo*/ 
SET @votoTot = @votoTot + @par;

/*select @nTG, @par, @nC, @cambi_disponibili;*/ 
/* se giocano meno titolari di quanti ne dovrebbero giocare nel modulo e ci sono ancora cambi disponibili si effettua una sostituizione per ordine di maglia  */
IF(@nTG <> @nC AND @cambi_disponibili > 0) THEN

/* salvo la differenza di quanti giocatori mancano per arrivare al numero del modulo qdnv = quanti differenza non voto se la differenza è maggiore prelevo il massimo dai cambi fino a saturarli*/
SET @qdnv = @nC - @nTG;
/*select @qdnv as differenza; */

IF(@qdnv > @cambi_disponibili) THEN
	SET @qdnv = @cambi_disponibili;
END IF;
/*select @qdnv; */

/*salvo il totale dei voti dei giocatori riserve con voto fino ad un massimo di @qdnv in ordine di maglia, se nessuna riserva gioca sommo 0*/
SET @sql = (SELECT CONCAT('SET @par =  ( SELECT IFNULL(SUM(D.voto), 0)
																					  FROM(
																								SELECT IFNULL(voto, 0) AS voto
																								FROM  formazioni INNER JOIN calciatori ON calciatore = idCalciatore
																							    WHERE idPartita =', _partita, ' AND squadra = ''', _squadra, ''' AND stato = 2 AND voto IS NOT NULL AND ruolo = ''C''
                                                                                                ORDER BY maglia
																							    LIMIT ?) AS D
																					)'));
PREPARE stmt FROM @sql;
    
EXECUTE stmt USING @qdnv;

/*salvo il totale dei giocatori riserve con voto fino ad un massimo di @qdnv in ordine di maglia, se nessuna riserva gioca cambio 0 giocatori*/
SET @sql = (SELECT CONCAT('SET @cambi = ( SELECT IFNULL(COUNT(D.voto), 0)
																						  FROM(
																								     SELECT IFNULL(voto, 0) AS voto
																								     FROM  formazioni INNER JOIN calciatori ON calciatore = idCalciatore
																							         WHERE idPartita =', _partita, ' AND squadra = ''', _squadra, ''' AND stato = 2 AND voto IS NOT NULL AND ruolo = ''C''
                                                                                                     ORDER BY maglia
																							         LIMIT ?) AS D
																						)'));
PREPARE stmt FROM @sql;
    
EXECUTE stmt USING @qdnv;

/* aggiorno i contatori, se non ho trovato nessun giocatore con voto nelle riserve sommo o sottraggo 0 rispettivamente ai voti totali e ai cambi totali disponibili */
SET @cambi_disponibili = @cambi_disponibili - @cambi;
SET @votoTot = @votoTot + @par;
	
END IF;

/* analisi attaccanti */
/* salvo in @nTG il numero dei titolari per ruolo che giocano*/
SET @nTG =  (SELECT IFNULL(count(*), 0) AS quanti
						  FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						  WHERE idPartita = _partita AND squadra = _squadra AND stato = 1 AND voto IS NOT NULL AND ruolo = 'A');

/*salvo in @par il totale dei voti per ruolo dei titolari, se nessun titolare gioca per un determinato ruolo allora @par è 0*/
SET @par = (SELECT IFNULL(SUM(voto), 0) AS voti
						FROM formazioni INNER JOIN calciatori ON calciatore = idCalciatore
						WHERE idPartita = _partita AND squadra = _squadra AND stato = 1 AND voto IS NOT NULL AND  ruolo = 'A');

/* aggiorno i voti toali con il numero dei voti dei titolari per ruolo*/ 
SET @votoTot = @votoTot + @par;

/*select @nTG, @par, @nC, @cambi_disponibili;*/ 
/* se giocano meno titolari di quanti ne dovrebbero giocare nel modulo e ci sono ancora cambi disponibili si effettua una sostituizione per ordine di maglia  */
IF(@nTG <> @nA AND @cambi_disponibili > 0) THEN

/* salvo la differenza di quanti giocatori mancano per arrivare al numero del modulo qdnv = quanti differenza non voto se la differenza è maggiore prelevo il massimo dai cambi fino a saturarli*/
SET @qdnv = @nA - @nTG;
/*select @qdnv as differenza; */

IF(@qdnv > @cambi_disponibili) THEN
	SET @qdnv = @cambi_disponibili;
END IF;
/*select @qdnv; */

/*salvo il totale dei voti dei giocatori riserve con voto fino ad un massimo di @qdnv in ordine di maglia, se nessuna riserva gioca sommo 0*/
SET @sql = (SELECT CONCAT('SET @par =  ( SELECT IFNULL(SUM(D.voto), 0)
																					  FROM(
																								SELECT IFNULL(voto, 0) AS voto
																								FROM  formazioni INNER JOIN calciatori ON calciatore = idCalciatore
																							    WHERE idPartita =', _partita, ' AND squadra = ''', _squadra, ''' AND stato = 2 AND voto IS NOT NULL AND ruolo = ''A''
                                                                                                ORDER BY maglia
																							    LIMIT ?) AS D
																					)'));
PREPARE stmt FROM @sql;
    
EXECUTE stmt USING @qdnv;

/*salvo il totale dei giocatori riserve con voto fino ad un massimo di @qdnv in ordine di maglia, se nessuna riserva gioca cambio 0 giocatori*/
SET @sql = (SELECT CONCAT('SET @cambi = ( SELECT IFNULL(COUNT(D.voto), 0)
																						  FROM(
																								     SELECT IFNULL(voto, 0) AS voto
																								     FROM  formazioni INNER JOIN calciatori ON calciatore = idCalciatore
																							         WHERE idPartita =', _partita, ' AND squadra = ''', _squadra, ''' AND stato = 2 AND voto IS NOT NULL AND ruolo = ''A''
                                                                                                     ORDER BY maglia
																							         LIMIT ?) AS D
																						)'));
PREPARE stmt FROM @sql;
    
EXECUTE stmt USING @qdnv;

/* aggiorno i contatori, se non ho trovato nessun giocatore con voto nelle riserve sommo o sottraggo 0 rispettivamente ai voti totali e ai cambi totali disponibili */
SET @cambi_disponibili = @cambi_disponibili - @cambi;
SET @votoTot = @votoTot + @par;
	
END IF;


UPDATE calendario SET goalA = goal_squadra(@votoTot), votoA = @votoTot, stato = 2
WHERE idPartita = _partita AND squadraA = _squadra;

UPDATE calendario SET goalB = goal_squadra(@votoTot), votoB = @votoTot, stato = 2
WHERE idPartita = _partita AND squadraB = _squadra;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `classifica_lega` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `classifica_lega`(IN legaIN INT)
BEGIN
SELECT *
FROM classifica_leghe
where lega = legaIN;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crea_Calendario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crea_Calendario`(IN idTorneoNEW INT)
BEGIN
SET @idTorneo =  idTorneoNEW;
SET @data1 = (select date(dataInizio) from tornei where idTorneo = idTorneoNEW);
SET @dataCreazione = date_add((@data1), interval 15 hour);
SET @nPartecipanti = (select numeroMaxPartecipanti from tornei where idTorneo = idTorneoNEW);

IF(@nPartecipanti = 6) THEN
insert into calendario (idTorneo, dataPartita, nGiornata, etichettaA, etichettaB)
(							
	select @idTorneo as idTorneo, date_add(@dataCreazione, interval 7*nGiornata day) as dataPartita, nGiornata, etichettaA, etichettaB
	from calendario6
	order by nGiornata	
);
END IF;

IF(@nPartecipanti = 8) THEN
insert into calendario (idTorneo, dataPartita, nGiornata, etichettaA, etichettaB)
(							
	select @idTorneo as idTorneo, date_add(@dataCreazione, interval 7*nGiornata day) as dataPartita, nGiornata, etichettaA, etichettaB
	from calendario8
	order by nGiornata	
);
END IF;

IF(@nPartecipanti = 10) THEN
insert into calendario (idTorneo, dataPartita, nGiornata, etichettaA, etichettaB)
(							
	select @idTorneo as idTorneo, date_add(@dataCreazione, interval 7*nGiornata day) as dataPartita, nGiornata, etichettaA, etichettaB
	from calendario10
	order by nGiornata	
);
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Current Database: `fantaball`
--

USE `fantaball`;

--
-- Final view structure for view `classifica_leghe`
--

/*!50001 DROP VIEW IF EXISTS `classifica_leghe`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `classifica_leghe` AS select `classifica`.`squadra` AS `squadra`,`classifica`.`punti` AS `punti`,`classifica`.`giocate` AS `G`,`classifica`.`vittorie` AS `V`,`classifica`.`pareggi` AS `P`,`classifica`.`sconfitte` AS `S`,`classifica`.`goalFatti` AS `GF`,`classifica`.`goalSubiti` AS `GS`,(`classifica`.`goalFatti` - `classifica`.`goalSubiti`) AS `DR`,`classifica`.`votiTot` AS `TOT`,`squadre`.`lega` AS `lega` from (`classifica` join `squadre` on((`classifica`.`squadra` = `squadre`.`nomeSquadra`))) order by `classifica`.`punti` desc,`classifica`.`votiTot` desc,(`classifica`.`goalFatti` - `classifica`.`goalSubiti`) desc,`classifica`.`squadra` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `parzialeandata`
--

/*!50001 DROP VIEW IF EXISTS `parzialeandata`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `parzialeandata` AS select `c`.`squadraA` AS `squadra`,((3 * (select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 1) and (`calendario`.`squadraA` = `c`.`squadraA`)))) + (1 * (select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 0) and (`calendario`.`squadraA` = `c`.`squadraA`))))) AS `punti`,ifnull(count(`c`.`votoA`),0) AS `giocate`,(select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 1) and (`calendario`.`squadraA` = `c`.`squadraA`))) AS `vittorie`,(select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 0) and (`calendario`.`squadraA` = `c`.`squadraA`))) AS `pareggi`,(select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 2) and (`calendario`.`squadraA` = `c`.`squadraA`))) AS `sconfitte`,(select ifnull(sum(`calendario`.`goalA`),0) from `calendario` where ((`calendario`.`squadraA` = `c`.`squadraA`) and (`calendario`.`risultato` is not null))) AS `goalFatti`,(select ifnull(sum(`calendario`.`goalB`),0) from `calendario` where ((`calendario`.`squadraA` = `c`.`squadraA`) and (`calendario`.`risultato` is not null))) AS `goalSubiti`,(select ifnull(sum(`calendario`.`votoA`),0) from `calendario` where ((`calendario`.`squadraA` = `c`.`squadraA`) and (`calendario`.`risultato` is not null))) AS `votiTot` from `calendario` `c` group by `c`.`squadraA` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `parzialeritorno`
--

/*!50001 DROP VIEW IF EXISTS `parzialeritorno`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `parzialeritorno` AS select `c`.`squadraB` AS `squadra`,((3 * (select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 1) and (`calendario`.`squadraB` = `c`.`squadraB`)))) + (1 * (select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 0) and (`calendario`.`squadraB` = `c`.`squadraB`))))) AS `punti`,ifnull(count(`c`.`votoB`),0) AS `giocate`,(select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 1) and (`calendario`.`squadraB` = `c`.`squadraB`))) AS `vittorie`,(select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 0) and (`calendario`.`squadraB` = `c`.`squadraB`))) AS `pareggi`,(select count(`calendario`.`risultato`) from `calendario` where ((`calendario`.`risultato` = 2) and (`calendario`.`squadraB` = `c`.`squadraB`))) AS `sconfitte`,(select ifnull(sum(`calendario`.`goalB`),0) from `calendario` where ((`calendario`.`squadraB` = `c`.`squadraB`) and (`calendario`.`risultato` is not null))) AS `goalFatti`,(select ifnull(sum(`calendario`.`goalA`),0) from `calendario` where ((`calendario`.`squadraB` = `c`.`squadraB`) and (`calendario`.`risultato` is not null))) AS `goalSubiti`,(select ifnull(sum(`calendario`.`votoB`),0) from `calendario` where ((`calendario`.`squadraB` = `c`.`squadraB`) and (`calendario`.`risultato` is not null))) AS `votiTot` from `calendario` `c` group by `c`.`squadraB` */;
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

-- Dump completed on 2020-05-10  0:54:17

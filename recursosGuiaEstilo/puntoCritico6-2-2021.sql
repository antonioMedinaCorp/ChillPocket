DROP DATABASE IF EXISTS `puntocritico`;
CREATE DATABASE  IF NOT EXISTS `puntocritico` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `puntocritico`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: puntocritico
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `obra`
--

DROP TABLE IF EXISTS `obra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obra` (
  `id` int NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `subtitulo` varchar(100) DEFAULT NULL,
  `sinopsis` varchar(5000) DEFAULT NULL,
  `critica` varchar(8000) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `img_min` varchar(255) DEFAULT NULL,
  `point_adm` float(4,3) DEFAULT NULL,
  `point_avg` float(4,3) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `genre` varchar(45) DEFAULT NULL,
  `id_adm` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_adm_idx` (`id_adm`),
  CONSTRAINT `id_adm` FOREIGN KEY (`id_adm`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obra`
--

LOCK TABLES `obra` WRITE;
/*!40000 ALTER TABLE `obra` DISABLE KEYS */;
INSERT INTO `obra` VALUES (1,'UnaObra',NULL,NULL,NULL,'pelicula','/res/kk.png','/res/kkmin.png',4.000,4.000,'video','miedo',1),(2,'The Umbrella Academy','Steve Blackman',' <p>The Umbrella Academy sigue a los miembros separados de una familia disfuncional de superhéroes, nacidos en circunstancias extrañas, llamada The Umbrella Academy — The Spaceboy, The Kraken, The Rumor, The Séance, The Boy, The Horror y White Violin—, que trabajan juntos para resolver la misteriosa muerte de su padre (the monocle) mientras se enfrentan a muchas dificultades, debido a sus personalidades y habilidades divergentes.2​ Además, deben enfrentarse a la amenaza del apocalipsis</p>','<p>De entre todas las adaptaciones que iban a llegar este año en forma de serie, probablemente la de ‘The Umbrella Academy’ sea una de las que, a priori, capta más la atención. Basada en el cómic homónimo de Gerard Way, vocalista de My Chemichal Romance y Gabriel Bá, la serie llegará a Netflix el próximo 15 de febrero y en Espinof ya hemos podido ver la mitad de su primera temporada de 10 episodios.</p><p>El encargado de desarrollar para televisión ‘The Umbrella Academy’ es Steve Blackman, que cuenta con unos créditos de guionista bastante eclécticos trabajando en dramas médicos como ‘Sin cita previa’, la criminal ‘Fargo’ y la ciencia ficción de ‘Altered Carbon’. Series tan distintas entre sí que no nos da una pista clara sobre lo que nos podríamos encontrar aquí.</p><p>Y ver el primer episodio no ayuda a crearnos una imagen clara. Pero no nos adelantemos a los acontecimientos y hagamos una pequeña recapitulación, sin spoilers, de esta primera mitad de la temporada. La serie comienza con la muerte de Sir Reginald Hargreeves (Colm Feore), un extraño y millonario filántropo que hace 17 años presentó en sociedad la Academia Umbrella, un grupo de niños superhéroes con algo en común.</p><p>Forman parte del grupo de 43 niños que nacieron en extrañas circunstancias (ninguna de sus madres estaba embarazada cuando se puso de parto) en 1989. Hargreeves se dedicó a rastrear y a comprar siete de estos niños, que resultaron tener habilidades especiales excepto Vanya (Ellen Page) que, literalmente, “no hay nada de extraordinario” en ella.</p><p>Este grupo de superhéroes, una especie de X-Men en alma, se disolvió durante los años de la adolescencia, después de la desaparición de Cinco (Aidan Gallagher) y la muerte de Seis. Cada uno decidió llevar una nueva vida separado de los demás hasta que llegó el funeral de “su padre”, que reúne a tan disfuncional familia, con rencillas y rencores pendientes mientras se avecina el Apocalipsis.</p>','serie','/media/images/serie2.jpg','/media/images/serie2.jpg',3.000,4.000,'https://www.youtube.com/embed/KHucKOK-Vik','suspense',1);
/*!40000 ALTER TABLE `obra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `apel1` varchar(255) DEFAULT NULL,
  `apel2` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `cod_post` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'antonio','1234','antonio','antonio','antonio','1997-04-26','ES','14950','669669669','1');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valoracion`
--

DROP TABLE IF EXISTS `valoracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valoracion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usu` int DEFAULT NULL,
  `id_obra` int DEFAULT NULL,
  `point` float(4,3) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_obra_idx` (`id_obra`),
  KEY `id_usu_idx` (`id_usu`),
  CONSTRAINT `id_obra` FOREIGN KEY (`id_obra`) REFERENCES `obra` (`id`),
  CONSTRAINT `id_usu` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valoracion`
--

LOCK TABLES `valoracion` WRITE;
/*!40000 ALTER TABLE `valoracion` DISABLE KEYS */;
INSERT INTO `valoracion` VALUES (1,1,1,3.000,'eikepasa'),(2,1,2,3.000,'<p>la <strong>definitiva coññññño</strong></p>'),(3,1,2,4.000,'<p>la polla en verda</p>'),(4,1,2,1.000,'<p>pf yo ke se</p>');
/*!40000 ALTER TABLE `valoracion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-06 11:52:18

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
  `id` int NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obra`
--

LOCK TABLES `obra` WRITE;
/*!40000 ALTER TABLE `obra` DISABLE KEYS */;
INSERT INTO `obra` VALUES (1,'UnaObra',NULL,NULL,NULL,'pelicula','/res/kk.png','/res/kkmin.png',4.000,4.000,'video','miedo',1),(2,'The Umbrella Academy','Steve Blackman',' <p>The Umbrella Academy sigue a los miembros separados de una familia disfuncional de superhéroes, nacidos en circunstancias extrañas, llamada The Umbrella Academy — The Spaceboy, The Kraken, The Rumor, The Séance, The Boy, The Horror y White Violin—, que trabajan juntos para resolver la misteriosa muerte de su padre (the monocle) mientras se enfrentan a muchas dificultades, debido a sus personalidades y habilidades divergentes.2​ Además, deben enfrentarse a la amenaza del apocalipsis</p>','<p>De entre todas las adaptaciones que iban a llegar este año en forma de serie, probablemente la de ‘The Umbrella Academy’ sea una de las que, a priori, capta más la atención. Basada en el cómic homónimo de Gerard Way, vocalista de My Chemichal Romance y Gabriel Bá, la serie llegará a Netflix el próximo 15 de febrero y en Espinof ya hemos podido ver la mitad de su primera temporada de 10 episodios.</p><p>El encargado de desarrollar para televisión ‘The Umbrella Academy’ es Steve Blackman, que cuenta con unos créditos de guionista bastante eclécticos trabajando en dramas médicos como ‘Sin cita previa’, la criminal ‘Fargo’ y la ciencia ficción de ‘Altered Carbon’. Series tan distintas entre sí que no nos da una pista clara sobre lo que nos podríamos encontrar aquí.</p><p>Y ver el primer episodio no ayuda a crearnos una imagen clara. Pero no nos adelantemos a los acontecimientos y hagamos una pequeña recapitulación, sin spoilers, de esta primera mitad de la temporada. La serie comienza con la muerte de Sir Reginald Hargreeves (Colm Feore), un extraño y millonario filántropo que hace 17 años presentó en sociedad la Academia Umbrella, un grupo de niños superhéroes con algo en común.</p><p>Forman parte del grupo de 43 niños que nacieron en extrañas circunstancias (ninguna de sus madres estaba embarazada cuando se puso de parto) en 1989. Hargreeves se dedicó a rastrear y a comprar siete de estos niños, que resultaron tener habilidades especiales excepto Vanya (Ellen Page) que, literalmente, “no hay nada de extraordinario” en ella.</p><p>Este grupo de superhéroes, una especie de X-Men en alma, se disolvió durante los años de la adolescencia, después de la desaparición de Cinco (Aidan Gallagher) y la muerte de Seis. Cada uno decidió llevar una nueva vida separado de los demás hasta que llegó el funeral de “su padre”, que reúne a tan disfuncional familia, con rencillas y rencores pendientes mientras se avecina el Apocalipsis.</p>','serie','/media/images/serie2.jpg','/media/images/serie2.jpg',3.000,4.000,'https://www.youtube.com/embed/KHucKOK-Vik','suspense',1),(3,'The Joker','Conoce el origen de este mítico villano','    <p>Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora.</p>','<p>Ha arrasado. No tiene rival. \'Joker\' es la película del año y ha puesto de acuerdo a los espectadores del mundo, aunque la crítica se ha mostrado bastante más dividida. Mientras se acerca a los 300 millones de dólares en su primera semana, convertida ya en un fenómeno de masas, intentaré explicar las razones por las que, sinceramente, pienso que nos estamos dejando llevar por el entusiasmo.</p><p>Cuando se anunció el proyecto, se vendió solo y de manera inmediata: \"Martin Scorsese estará detrás de una película para adultos (eso ha sonado porno) sobre el Joker ambientada en los setenta\". Wow, desde ese momento DC ya había ganado una batalla. A partir de ahí, un desfile de nombres con posibilidades de usar el blanco maquillaje del protagonista, hasta que Joaquin Phoenix se confirmó a las órdenes de Todd Phillips, el cerebro detrás de la jugada maestra.</p><p>El director de la trilogía de \'Resacón en Las Vegas\', \'Aquellas juergas universitarias\' o \'Starsky & Hutch\' (por aquello de seguir en los setenta), se marcaba un reto imposible de creer hace unos años si no tenemos en cuenta su muy tenue intento de cambiar de registro con \'Juego de armas\', una película que ya intentó jugar en la liga del Scorsese más moderno, pero cuyo resultado ni siquiera se aproximó al (excelso) trabajo de Michael Bay en \'Pain & Gain\', curiosamente, mucho más goodfelliana, mucho más Scorsese que la película de moda.</p><p>La famosa incompatibilidad de agendas hollywoodiense impidió la participación del director de \'Taxi Driver\' en la producción, pero la maniobra salió bien, y ahora no hay nadie que no mencione sus trabajos más obvios (porque en \'Joker\' casi todo es bastante obvio) a la salida de la proyección de la película.</p>','pelicula','/media/images/joker.jpg','/media/images/joker.jpg',4.000,5.000,'https://www.youtube.com/watch?v=ECtK_IR4j5I','drama',1),(4,'El principito','Antoine de Saint-Exupéry','<p>Un aviador queda incomunicado en el desierto tras sufrir una avería en su avión a mil millas de cualquier región habitada. Allí se encontrará con un pequeño príncipe de cabellos de oro que afirma vivir en el asteroide B 612 (donde hay una rosa y tres volcanes) con el que no tardará en congeniar. En sus conversaciones, el principito le relatará su visión sobre la vida y la gente, de esa sabiduría que se pierde cuando las personas abandonamos la infancia.</p>','<p>La historia de la génesis de El principito quizás sea una de mis favoritas de todos los tiempos, a la altura de la propia obra, si se me permite. Tras ser llamado a filas en 1939 y participar en varias arriesgadas misiones aéreas, Antoine de Saint-Exupéry abandona Francia una vez producida la ocupación alemana, instalándose en Estados Unidos con el firme objetivo de convencer a los norteamericanos para que entren en el conflicto mundial. El autor francés será requerido por el ejército cuatro años después, pero en ese lapso, aparte de incesantes intentos por volver al frente, Antoine escribió El principito.</p><p>No se me ocurre un momento mejor (o quizás sea más preciso decir idóneo) para escribir una obra de la sensibilidad y el calado filosófico de El principito que durante una guerra. Imagino que pocos contextos deben trastocarnos tanto por dentro como una contienda de la magnitud de la Segunda Guerra Mundial. El estado emocional de aquellos que lo vivieron desde dentro se me antoja inaccesible, y quizás por ello no deja de fascinarme que de una situación tan horripilante puedan nacer historias tan hermosas como la que Saint-Exupéry cuenta en El principito.</p><p>El principito es la historia de los niños y las personas grandes, del extenso mundo que nos rodea, de los pequeños mundos en los que a veces aterrizamos. Una oda a la vida, una crítica a esas cosas que tanto nos preocupan y que tanto nos limitan cuando llegamos a la edad adulta. Es el mundo visto desde los ojos de un niño, el que somos o el que fuimos, también el que siempre seremos por dentro.</p><p>Un catálogo de inspiradoras frases, hermosas metáforas y surrealistas escenas en las que se suceden variados y capitales temas universales tales como la amistad, el amor, la inocencia, la responsabilidad o la relación del ser humano con la naturaleza. Una historia tan entrañable como rica en sabiduría, apta para todas las edades y que no caduca ni pasa de moda. Un clásico con todas las letras que es capaz de acariciarnos el alma.</p>','libro','/media/images/elprincipito.jpg','/media/images/elprincipito.jpg',5.000,5.000,'https://www.youtube.com/embed/_LyQH01rfo8','infantil',1),(5,'Kingdom Come','Mark Waid & Alex Ross','<p>Kingdom Come plantea una humanidad repleta de metahumanos (seres con superpoderes), los cuales utilizan sus habilidades para su beneficio o para aplicar una forma distorsionada de justicia. Esto los enfrenta con los miembros de la Liga de la Justicia, contando la nueva generación y el apoyo de los héroes originales: Superman, la Mujer Maravilla, Batman, Linterna Verde y Flash, entre otros, que regresan después que una explosión nuclear destruyera Kansas (el hogar de Superman) este hecho los devuelve a la palestra en medio de una nueva sociedad de villanos liderada por Lex Luthor y las Organización de las Naciones Unidas en contra de los metahumanos. </p>','<p>Kingdom Come es uno de los cómics más influyentes de todos los tiempos, una carta de amor a los superhéroes escrita por Mark Waid e ilustrada como los ángeles por un portento del pincel como Alex Ross. Si todavía no has leído este cómic, no sabemos a qué estás esperando... </p><p>Si tuviéramos que intentar explicar qué son los superhéroes para nosotros, cómo nos han podido influir de esta manera, por qué los consideramos dioses modernos como los antiguos griegos consideraban así a los Olímpicos... Entonces diríamos que deberían leer Kingdom Come. Probablemente, en toda la historia del noveno arte, no se ha escrito jamás una carta de amor tan profunda, melancólica y esperanzadora como la que Mark Waid escribió y Alex Ross dibujó en 1996. Y decimos \"dibujó\" cuando, probablemente, deberíamos estar hablando de obra de arte en mayúsculas por parte del ilustrador, quien tanto a nivel de diseños de personajes como a nivel de escenarios alcanza la absoluta perfección y nos regala la Capilla Sixtina del mundo del cómic (entiéndase la referencia).</p><p>Y eso que la historia de Kingdom Come (no confundir con el videojuego) no tiene nada de especial, sobre todo si la valoramos ahora, con todas las historias de superhéroes que ha habido después de ella. El cómic de Kingdom Come parte de la premisa de que una nueva generación de héroes ha dejado atrás a los componentes de la Liga de la Justicia, la Sociedad de la Justicia de América y compañía. Todos los grandes superhéroes del Universo DC, a excepción de un omnipresente Batman que se niega a dejar Gotham City al amparo de nadie que no sea él, han tirado la toalla. Y todo, a raíz del adiós de Superman y la decisión de abandonar la capa roja en favor de las nuevas generaciones. Un relevo generacional duro que no es, ni mucho menos, el tema central del cómic.</p><p>Así pues, el cómic Kingdom Come parte de la base de un cansancio generacional de los héroes del pasado y un abandono de la profesión. Uno podría decirse que, como antesala, la premisa es sensacional, especialmente por todas las lecturas humanas que podemos desprender acerca del paso del tiempo y la aceptación del mismo. Sin embargo, pronto Mark Waid nos descubre que no, que el cómic no va de eso, que los superhéroes del pasado siempre han sido los superhéroes del futuro y que las generaciones no están para ser enterradas en la arena, sino para abrazarse mutuamente y progresar. Que solamente mirando hacia el futuro cuando coges la mano del pasado es cómo descubriremos la verdad y el camino para llegar a ella.</p><p>Es curioso cómo Kingdom Come vio la luz a mediados de los 90, la década en la que el cómic de superhéroes vivía una profunda crisis existencial, merced a años y años de publicaciones, a la sequía de ideas que pusieran fin a las repeticiones constantes de argumentos, tramas y sorpresas y a la vorágine de dibujantes que estaban más interesados de mostrarnos sus conocimientos anatómicos del cuerpo humano que de servir al guion con ilustraciones adecuadas, coherentes, lógicas y poderosas. Por eso resulta tan paradójico que la mayor carta de amor que se ha escrito jamás en la historia del cómic al mundo de los superhéroes se enmarque dentro de la producción comiquera de una década consagrada al olvido por parte de la mayoría de los lectores.</p><p>Pero es que Kingdom Come es una proeza literaria sin límites. Hablemos en términos de literatura. Mark Waid tenía claro que no quería hacer \"un cómic más\", una nueva producción de DC Comics con superhéroes, villanos, peleas masivas, diálogos mordaces y un largo etcétera de tropos usados hasta la extenuación en el noventa por ciento de las obras de la industrias. Para ello, Waid ideó una historia a gran escala y sometida al sello Elseworlds (Otros Mundos), para no tener que rendir cuentas ante el sagrado canon y la maldita continuidad. Partiendo de un cuadro en blanco sobre el que podía desarrollar con profundidad todos los temas que quería contar, se unió a un Alex Ross entregado, que ejerció un milagroso trabajo como ilustrador y llevó el gran guion de Waid a su máxima expresión. No se concibe Kingdom Come sin Waid y Ross, a pesar de que la fama que ha ganado el dibujante entre el público de masas gracias a este título sea completamente merecida.</p>','comic','/media/images/kc.jpg','/media/images/kc.jpg',3.000,4.000,'https://www.youtube.com/embed/cQAwqzYsbOU','superheroes',1);
/*!40000 ALTER TABLE `obra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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

-- Dump completed on 2021-02-06 13:48:31

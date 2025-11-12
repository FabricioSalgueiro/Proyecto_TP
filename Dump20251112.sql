-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: libreria_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Cien Años de Soledad','Gabriel García Márquez',15.99,'978-0307455295'),(2,'El Señor de los Anillos','J.R.R. Tolkien',25.50,'978-0618260252'),(3,'1984','George Orwell',12.00,'978-0451524935'),(4,'El Principito','Antoine de Saint-Exupéry',10.50,'978-6075191986'),(5,'Don Quijote de la Mancha','Miguel de Cervantes',30.00,'978-8420412140'),(6,'Crimen y Castigo','Fyodor Dostoevsky',18.75,'978-0140449136'),(7,'Orgullo y Prejuicio','Jane Austen',14.25,'978-0141439518'),(8,'Rayuela','Julio Cortázar',22.99,'978-9500732104'),(9,'La Sombra del Viento','Carlos Ruiz Zafón',17.50,'978-8408043644'),(10,'Un Mundo Feliz','Aldous Huxley',13.99,'978-9504938640'),(11,'Moby Dick','Herman Melville',20.00,'978-0142437247'),(12,'El Código Da Vinci','Dan Brown',16.50,'978-0307277675'),(13,'Los Juegos del Hambre','Suzanne Collins',11.75,'978-0439023485'),(14,'Cumbres Borrascosas','Emily Brontë',15.00,'978-0141439556'),(15,'Doce Cuentos Peregrinos','Gabriel García Márquez',19.50,'978-6075191061'),(16,'Fundación','Isaac Asimov',24.99,'978-0553293357'),(17,'Fahrenheit 451','Ray Bradbury',13.00,'978-6073166874'),(18,'El Retrato de Dorian Gray','Oscar Wilde',16.75,'978-0141441863'),(19,'El Padrino','Mario Puzo',21.00,'978-0451167711'),(20,'Drácula','Bram Stoker',14.50,'978-0141439846'),(21,'Los Pilares de la Tierra','Ken Follett',28.50,'978-8408092475'),(22,'Cien sonetos de amor','Pablo Neruda',10.99,'978-8437604313'),(23,'La Odisea','Homero',17.00,'978-0140268863'),(24,'Matar a un Ruiseñor','Harper Lee',13.50,'978-0061120084'),(25,'El Amor en los Tiempos del Cólera','Gabriel García Márquez',19.00,'978-0307386742'),(26,'Veinte poemas de amor y una canción desesperada','Pablo Neruda',9.50,'978-8499890522'),(27,'Anna Karénina','León Tolstói',26.00,'978-0140449174'),(28,'El Nombre de la Rosa','Umberto Eco',23.50,'978-8426442655'),(29,'Siddhartha','Hermann Hesse',11.25,'978-0553208849'),(30,'Viaje al centro de la Tierra','Julio Verne',15.75,'978-8491051515'),(31,'Las Aventuras de Tom Sawyer','Mark Twain',12.00,'978-0143039145'),(32,'Guerra y Paz','León Tolstói',35.00,'978-0140449181'),(33,'Rebelión en la Granja','George Orwell',10.00,'978-0451526342'),(34,'El Perfume','Patrick Süskind',16.25,'978-8432205161'),(35,'IT (Eso)','Stephen King',27.99,'978-1501175412'),(36,'El Guardián entre el Centeno','J. D. Salinger',14.99,'978-0316769488'),(37,'Los Miserables','Victor Hugo',32.50,'978-0140444308'),(38,'Divina Comedia','Dante Alighieri',20.50,'978-0199537905'),(39,'Ficciones','Jorge Luis Borges',19.99,'978-8420473219'),(40,'El Aleph','Jorge Luis Borges',18.50,'978-8420412126'),(42,'Bestiario','Julio Cortázar',14.75,'978-9500732111'),(43,'Sobre héroes y tumbas','Ernesto Sábato',17.00,'978-9500735761'),(44,'El túnel','Ernesto Sábato',12.50,'978-9500735754'),(45,'Boquitas pintadas','Manuel Puig',16.00,'978-9500755914'),(46,'Adán Buenosayres','Leopoldo Marechal',25.00,'978-9500397576'),(47,'Martín Fierro','José Hernández',11.99,'978-9500397507'),(48,'Crónica de un niño solo','Ricardo Piglia',13.99,'978-9871136709'),(49,'El Diario de Ana Frank','Ana Frank',14.50,'978-0553296983'),(50,'El Juego de Ender','Orson Scott Card',14.50,'978-0812550702'),(51,'Crónicas Marcianas','Ray Bradbury',15.99,'978-9875807954'),(52,'Las Uvas de la Ira','John Steinbeck',18.25,'978-8499084777'),(53,'El Viejo y el Mar','Ernest Hemingway',11.75,'978-8420412133'),(54,'El Extranjero','Albert Camus',13.00,'978-8432205093'),(55,'Cien Sonetos de Amor','Pablo Neruda',10.99,'978-8437604314'),(56,'Mujercitas','Louisa May Alcott',16.00,'978-8491051516'),(57,'Lo que el Viento se Llevó','Margaret Mitchell',25.50,'978-8491051517'),(58,'El Hobbit','J.R.R. Tolkien',19.50,'978-8491051518'),(59,'Kafka en la Orilla','Haruki Murakami',22.00,'978-8491051519'),(60,'Ensayo sobre la Ceguera','José Saramago',17.50,'978-8491051520'),(61,'Los Hijos de la Medianoche','Salman Rushdie',21.00,'978-8491051521'),(62,'Trópico de Cáncer','Henry Miller',15.00,'978-8491051522'),(63,'El Nombre del Viento','Patrick Rothfuss',26.99,'978-8491051523'),(64,'La Carretera','Cormac McCarthy',14.75,'978-8491051524'),(65,'Tokio Blues (Norwegian Wood)','Haruki Murakami',16.50,'978-8491051525'),(66,'El Mundo de Sofía','Jostein Gaarder',18.99,'978-8491051526'),(67,'Sapiens: De animales a dioses','Yuval Noah Harari',23.50,'978-8491051527'),(68,'Homo Deus: Breve historia del mañana','Yuval Noah Harari',24.00,'978-8491051528'),(69,'Breve historia del tiempo','Stephen Hawking',17.00,'978-8491051529'),(70,'Cosmos','Carl Sagan',20.50,'978-8491051530'),(71,'Una Breve Historia de Casi Todo','Bill Bryson',19.75,'978-8491051531'),(72,'El Gen Egoísta','Richard Dawkins',16.99,'978-8491051532'),(73,'La Estructura de las Revoluciones Científicas','Thomas S. Kuhn',15.25,'978-8491051533'),(74,'La Metamorfosis','Franz Kafka',10.50,'978-8491051534'),(75,'El Proceso','Franz Kafka',13.50,'978-8491051535'),(76,'La Insoportable Levedad del Ser','Milan Kundera',16.75,'978-8491051536'),(77,'La Casa de los Espíritus','Isabel Allende',17.99,'978-8491051537'),(78,'Eva Luna','Isabel Allende',15.50,'978-8491051538'),(79,'Cuentos de Amor, de Locura y de Muerte','Horacio Quiroga',12.00,'978-8491051539'),(80,'Pedro Páramo','Juan Rulfo',14.00,'978-8491051540'),(81,'La Tregua','Mario Benedetti',11.50,'978-8491051541'),(82,'El Aleph y otros cuentos','Jorge Luis Borges',18.50,'978-8491051542'),(83,'Zama','Antonio Di Benedetto',16.25,'978-8491051543'),(84,'Sobre la Muerte y los Moribundos','Elisabeth Kübler-Ross',14.99,'978-8491051544'),(85,'El Arte de Amar','Erich Fromm',13.99,'978-8491051545'),(86,'Psicopatología de la Vida Cotidiana','Sigmund Freud',15.00,'978-8491051546'),(87,'El Poder del Ahora','Eckhart Tolle',17.75,'978-8491051547'),(88,'El Monje que Vendió su Ferrari','Robin Sharma',12.99,'978-8491051548'),(89,'El Alquimista','Paulo Coelho',11.00,'978-8491051549'),(90,'Las 48 Leyes del Poder','Robert Greene',21.50,'978-8491051550'),(91,'Piense y Hágase Rico','Napoleon Hill',10.50,'978-8491051551'),(92,'Padre Rico, Padre Pobre','Robert Kiyosaki',14.25,'978-8491051552'),(93,'El Código de la Abundancia','Deepak Chopra',15.75,'978-8491051553'),(94,'Cuentos de la Selva','Horacio Quiroga',9.99,'978-8491051554'),(95,'Poemas de Amor','Pablo Neruda',11.50,'978-8491051555'),(96,'El Cuarto Protocolo','Frederick Forsyth',16.50,'978-8491051556'),(97,'El Archipiélago Gulag','Aleksandr Solzhenitsyn',28.99,'978-8491051557'),(98,'La Guerra de los Mundos','H. G. Wells',13.00,'978-8491051558'),(99,'Veinte Mil Leguas de Viaje Submarino','Julio Verne',15.25,'978-8491051559'),(100,'Frankenstein','Mary Shelley',14.75,'978-8491051560'),(101,'Dr. Jekyll y Mr. Hyde','Robert Louis Stevenson',12.00,'978-8491051561'),(102,'Los Viajes de Gulliver','Jonathan Swift',16.00,'978-8491051562'),(103,'La Isla del Tesoro','Robert Louis Stevenson',13.50,'978-8491051563'),(104,'Robinson Crusoe','Daniel Defoe',14.00,'978-8491051564'),(105,'Las Aventuras de Huckleberry Finn','Mark Twain',15.00,'978-8491051565'),(106,'El Fantasma de la Ópera','Gaston Leroux',12.50,'978-8491051566'),(107,'Las Mil y Una Noches','Anónimo',20.00,'978-8491051567'),(108,'Seda','Alessandro Baricco',10.75,'978-8491051568'),(109,'Memorias de una Geisha','Arthur Golden',16.99,'978-8491051569'),(110,'El Lector','Bernhard Schlink',14.50,'978-8491051570'),(111,'La Chica del Tren','Paula Hawkins',15.50,'978-8491051571'),(112,'Perdida','Gillian Flynn',17.25,'978-8491051572'),(113,'El Paciente','Juan Gómez-Jurado',16.00,'978-8491051573'),(114,'Reina Roja','Juan Gómez-Jurado',18.50,'978-8491051574'),(115,'El Silencio de los Corderos','Thomas Harris',15.00,'978-8491051575'),(116,'El Resplandor','Stephen King',19.00,'978-8491051576'),(117,'Cementerio de Animales','Stephen King',17.99,'978-8491051577'),(118,'Misery','Stephen King',16.75,'978-8491051578'),(119,'La Cúpula','Stephen King',25.00,'978-8491051579'),(120,'Carrie','Stephen King',13.50,'978-8491051580'),(121,'La Llamada de Cthulhu','H. P. Lovecraft',14.25,'978-8491051581'),(122,'El Color que Cayó del Cielo','H. P. Lovecraft',12.00,'978-8491051582'),(123,'Cuentos de la Alhambra','Washington Irving',15.99,'978-8491051583'),(124,'Libro de Buen Amor','Juan Ruiz',18.00,'978-8491051584'),(125,'El Lazarillo de Tormes','Anónimo',11.00,'978-8491051585'),(126,'La Celestina','Fernando de Rojas',17.50,'978-8491051586'),(127,'Bodas de Sangre','Federico García Lorca',10.50,'978-8491051587'),(128,'Yerma','Federico García Lorca',10.50,'978-8491051588'),(129,'La Casa de Bernarda Alba','Federico García Lorca',10.50,'978-8491051589'),(130,'Rimas y Leyendas','Gustavo Adolfo Bécquer',12.99,'978-8491051590'),(131,'Poeta en Nueva York','Federico García Lorca',14.00,'978-8491051591'),(132,'Antología Poética','Antonio Machado',13.25,'978-8491051592'),(133,'Niebla','Miguel de Unamuno',15.00,'978-8491051593'),(134,'Tirano Banderas','Ramón del Valle-Inclán',16.75,'978-8491051594'),(135,'Platero y yo','Juan Ramón Jiménez',11.99,'978-8491051595'),(136,'La Regenta','Leopoldo Alas Clarín',20.50,'978-8491051596'),(137,'Fortunata y Jacinta','Benito Pérez Galdós',24.00,'978-8491051597'),(138,'Marianela','Benito Pérez Galdós',14.50,'978-8491051598'),(139,'Los Episodios Nacionales (Serie 1)','Benito Pérez Galdós',30.00,'978-8491051599'),(140,'Nada','Carmen Laforet',15.50,'978-8491051600'),(141,'Cinco Horas con Mario','Miguel Delibes',16.00,'978-8491051601'),(142,'La Colmena','Camilo José Cela',17.00,'978-8491051602'),(143,'La Familia de Pascual Duarte','Camilo José Cela',13.75,'978-8491051603'),(144,'El Hereje','Miguel Delibes',18.25,'978-8491051604'),(145,'Tiempo de Silencio','Luis Martín-Santos',19.00,'978-8491051605'),(146,'Los Santos Inocentes','Miguel Delibes',14.99,'978-8491051606'),(147,'El Siglo de las Luces','Alejo Carpentier',22.00,'978-8491051607'),(148,'Canto General','Pablo Neruda',19.50,'978-8491051608'),(149,'Libertad Bajo Fianza','John Grisham',15.75,'978-8491051609');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`book_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` VALUES (24,6,83,1),(25,6,128,1);
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `purchase_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_purchase` (`user_id`,`book_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,2,1,'2025-11-06 07:36:08'),(2,2,2,'2025-11-06 07:37:39'),(3,2,3,'2025-11-06 07:37:46'),(4,3,3,'2025-11-06 07:39:41'),(5,3,2,'2025-11-06 07:50:57'),(6,3,1,'2025-11-06 15:38:34'),(7,4,2,'2025-11-06 16:50:11'),(9,4,3,'2025-11-06 16:50:59'),(10,5,3,'2025-11-07 00:29:04'),(11,6,3,'2025-11-09 13:47:33'),(12,6,1,'2025-11-09 14:40:20'),(13,6,27,'2025-11-09 14:50:54'),(14,6,50,'2025-11-09 15:00:07'),(15,7,11,'2025-11-10 09:11:27'),(16,8,49,'2025-11-11 17:25:20');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'franco','fbrcsalgueiro@gmail.com','$2y$10$5FTHTzszZ7adHbvchGUR2u1R3.ukNpBEYln7VN9Q8QdcKzpAUcAJe','2025-11-06 09:11:35'),(2,'APROBAMEPORFA','fbrc@gmail.com','$2y$10$xqF06Rucyp33BU3rykTqteBRrD5YQWRVvTgtzCxMtKjaxDujXVlAm','2025-11-06 09:16:58'),(3,'Fabricio','fbrcsalgueiro2@gmail.com','$2y$10$B/kEBtTO00tOpJ1npFlr/uBgFao8FpDtGZgjWS/wmtRGyKdO.NocW','2025-11-06 10:39:21'),(4,'peregay','peregay@gmail.com','$2y$10$1R3jc9PYRSlXaUB0/5OXrusm0.C.nYSk5S0wMKNSr0SG09v9eUPvi','2025-11-06 19:49:13'),(5,'vincent','342@gmail.com','$2y$10$RQQrUaNVSndLJIQZZQAx0OeOSAu0dLFEEm0O/OQ97RmtIm1Pei/ge','2025-11-07 03:28:09'),(6,'holaa','asd@gmail.com','$2y$10$pEWnv4uiRhi7rZ2BCbDeBe3tHxVN2oLlvw/X8026MB8vJf3oLilxy','2025-11-09 16:46:37'),(7,'asdfg','asdfg@gmail.com','$2y$10$HwA2g7Np3PkK3OuT2J6G9.oxoq030qQc6enmWSIz0meT7ncc17d4q','2025-11-10 12:10:18'),(8,'poshogay','poshogay@gmail.com','$2y$10$omnyW6/eN.J11iqzsUJECOTg0IplQ3zh2BgS3tR1y49jbeCUO0hdy','2025-11-11 20:24:39'),(9,'1234','1234@gmail.com','$2y$10$SXArlDLjl4sQfHV7Qw9IyeSLRln1MVUrummdJ0x2QBP/NDKr9tPpe','2025-11-12 05:38:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-12  2:40:53

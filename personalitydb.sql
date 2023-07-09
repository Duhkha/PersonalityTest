-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: personalitytest
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `answerid` int NOT NULL AUTO_INCREMENT,
  `answer` mediumtext NOT NULL,
  `points` int NOT NULL,
  `question_id` int NOT NULL,
  PRIMARY KEY (`answerid`),
  UNIQUE KEY `answerid_UNIQUE` (`answerid`),
  KEY `question_id_idx` (`question_id`),
  CONSTRAINT `questionid_fk` FOREIGN KEY (`question_id`) REFERENCES `questions` (`questionsid`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (47,'I follow the already established guidelines',-1,1),(50,'I prefer to come up with creative solutions',1,1),(51,'I try to blend both creativity and established procedures',1,1),(52,'I usually ask for others\' opinions before deciding on a solution',-1,1),(53,'Carefully analyzing data and market trends',-1,5),(54,'Engaging in playful and imaginative activities',1,5),(55,'Seeking inspiration from various sources',1,5),(56,'Collaborating with others in brainstorming sessions',-1,5),(57,'Find alternative approaches that work within given constraints',-1,9),(58,'Embrace the challenge and see it as an opportunity for creative problem-solving',1,9),(59,'Seek feedback and input from others to explore innovative solutions',-1,9),(60,'Push the boundaries and challenge the limitations to find unconventional solutions',1,9),(61,'I prefer to have set work hours',-1,2),(62,'I like the idea of working whenever I choose',-1,2),(63,'I can work whenever I am needed',1,2),(64,'I’m okay with any schedule, as long as my work gets done',1,2),(65,'Work',1,6),(66,'Family',-1,6),(67,'Career',1,6),(68,'Free time',-1,6),(69,'I carefully plan and prioritize my personal commitments around my fixed work schedule',-1,10),(70,'My work takes priority over my personal commitments, and I adjust them based on my work schedule',1,10),(71,'I don’t like it when my job interferes with my personal time',-1,10),(72,'My personal time is my work time',1,10),(73,'I  prefer routine and stability',-1,3),(74,'I thrive in constantly changing environments',1,3),(75,'It depends on the situation, sometimes change can be good',1,3),(76,'I am indifferent about change',-1,3),(77,'Have a clear set of instructions',-1,7),(78,'Have the freedom to approach it in your own way',1,7),(79,'Mix established guidelines with your own ideas',1,7),(80,'Do routine work',-1,7),(81,'I stick to the initial plan as much as possible',-1,11),(82,'I enjoy the challenge and finding a new solution',1,11),(83,'I try to balance between following the plan and being flexible',1,11),(84,'I usually consult with my team before deciding on a solution',-1,11),(85,'I prefer to work alone',-1,4),(86,'I enjoy working in teams',1,4),(87,'I like to balance both',1,4),(88,'It depends on the project',-1,4),(89,'I prefer full control over my work',-1,8),(90,'I enjoy the input and ideas of others',1,8),(91,'I prefer collaboration on some parts and working alone on others',-1,8),(92,'I am comfortable with both, depending on the project',1,8),(93,'Take a leadership role',-1,12),(94,'Contribute as a team member',1,12),(95,'I am comfortable in either role depending on the situation',1,12),(96,'I prefer roles where I can work independently but still be part of the team',-1,12);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS `histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `histories` (
  `historiesid` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `typeid` int NOT NULL,
  `resultid` int NOT NULL,
  PRIMARY KEY (`historiesid`),
  UNIQUE KEY `historyid_UNIQUE` (`historiesid`),
  KEY `userid_fk_idx` (`userid`),
  KEY `typeid_fk_idx` (`typeid`),
  KEY `resultid_idx` (`resultid`),
  CONSTRAINT `resultid` FOREIGN KEY (`resultid`) REFERENCES `results` (`resultsid`),
  CONSTRAINT `typeid_fk` FOREIGN KEY (`typeid`) REFERENCES `types` (`typesid`),
  CONSTRAINT `userid_fk` FOREIGN KEY (`userid`) REFERENCES `users` (`usersid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histories`
--

LOCK TABLES `histories` WRITE;
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
INSERT INTO `histories` VALUES (1,3,NULL,1010,2),(2,1,NULL,10,1),(3,2,NULL,1111,3),(4,4,NULL,1011,4),(5,5,NULL,1111,5),(6,6,NULL,111,6);
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `questionsid` int NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`questionsid`),
  UNIQUE KEY `iduser_UNIQUE` (`questionsid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'How do you approach problem-solving in your work?','creativity'),(2,'How do you feel about having a flexible work schedule?','work-time'),(3,'How do you feel about change in your work environment?','aptitude'),(4,'Do you prefer work in teams or alone?','teamwork'),(5,'Which scenarios best reflect your approach to generating new ideas?','creativity'),(6,'What are your priorities in life/what would you like to spend most time on?','work-time'),(7,'When you are assigned a task, you prefer to:','aptitude'),(8,'How do you feel about collaborating with others?','teamwork'),(9,'How do you typically respond when faced with a limitation or constraint in a project?','creativity'),(10,'How do you typically manage your personal commitments or obligations that coincide with your fixed work schedule?','work-time'),(11,'How do you handle unexpected issues in a project?','aptitude'),(12,'When working in a team, do you prefer to:','teamwork');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `resultsid` int NOT NULL AUTO_INCREMENT,
  `categoryApoints` int NOT NULL DEFAULT '0',
  `categoryBpoints` int NOT NULL DEFAULT '0',
  `categoryCpoints` int NOT NULL DEFAULT '0',
  `categoryDpoints` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`resultsid`),
  UNIQUE KEY `resultsid_UNIQUE` (`resultsid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,-1,-1,1,-1),(2,1,-1,3,-1),(3,1,3,3,1),(4,1,-1,3,3),(5,1,1,1,3),(6,-1,1,1,3);
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types` (
  `typesid` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `responsibilities` longtext,
  `requirements` longtext NOT NULL,
  PRIMARY KEY (`typesid`),
  UNIQUE KEY `typeid_UNIQUE` (`typesid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (0,'Tech Support','Tech Support professionals ensure smooth operation of computer systems, hardware, and software. They provide essential assistance by diagnosing and resolving any technical issues that users might encounter, making tech support a vital component of any successful business.','Diagnose and troubleshoot software and hardware problems; Assist users in solving issues related to their systems and software; Maintain daily performance of computer systems; Respond to queries over the phone or via email;','Strong problem-solving and communication skills; Proficient in computer systems, hardware, and software; Excellent customer service skills; Patience and ability to guide users through steps to resolve their issues;'),(1,'Web Developer','Web Developers are responsible for designing, coding, and modifying websites to match client requirements. They ensure the site\'s user experience and user interface are set up to meet the company\'s objectives, whether it\'s functionality, speed, ease of navigation, or conversion.','Design, code, and modify websites according to client\'s specifications; Create visually appealing sites that feature user-friendly design and clear navigation; Regularly update the website and solve any bugs;','Proficient in web languages like HTML, CSS, JavaScript, and knowledge of web services and APIs; Experience with responsive and adaptive design; Excellent problem-solving skills, attention to detail, and creativity;'),(10,'QA Tester','QA Testers play a crucial role in software development. They perform regular checks on the quality and standard of software performance, identify and analyze any bugs or defects, and ensure that the final product is free from issues and meets the project requirements and goals.','Develop test plans, test cases, and testing scripts, mapping back to pre-determined criteria; Perform regular checks on software performance; Identify, analyze, and report bugs;','Strong knowledge of software QA methodologies, tools, and processes; Experience in writing clear and comprehensive test plans and test cases; Excellent problem-solving and analytical skills;'),(11,'Data Scientist','Data Scientists leverage vast amounts of raw data to help businesses make strategic decisions. They apply their analytical skills, technology and programming knowledge, and industry-specific knowledge to interpret complex data sets.','Analyze and interpret complex data sets; Use statistical techniques to build high-quality prediction systems; Develop custom data models and algorithms;','Proficiency with programming languages like Python, R, SQL; Strong experience using machine learning algorithms and statistical modeling techniques; Excellent analytical and problem-solving skills;'),(100,'Network Engineer','Network Engineers design, implement, and troubleshoot the infrastructure that allows data to flow through a network. They ensure the integrity of high availability network infrastructure to provide maximum performance for users.','Design and implement network infrastructure; Troubleshoot the network in case of any connectivity issues; Regularly monitor and upgrade the network','Strong knowledge of networking technologies, network protocols, and security; Excellent problem-solving and analytical skills; Ability to handle multiple tasks and work under pressure;'),(101,'Cloud Engineer','Cloud Engineers handle the planning, design, management, maintenance, and support of cloud-based system solutions. They have strong skills in cloud computing, as well as experience with various cloud services and providers, to ensure that businesses can fully utilize cloud resources.','Plan, design, and manage cloud-based system solutions; Maintain and monitor the performance of cloud systems; Resolve technical issues as they arise;','Proficiency in cloud services and cloud platform management; Strong problem-solving skills and ability to handle a fast-paced work environment; Knowledge of programming languages and operating systems;'),(110,'Cybersecurity Specialist','Cybersecurity Specialists protect the data and systems of a company against threats and cyber-attacks. They design, implement, and monitor security measures for the protection of computer systems, networks, and data.','Implement and monitor security measures for the protection of systems, networks, and data; Identify vulnerabilities and risks in hardware and software; Take necessary measures to ensure data security;','Strong knowledge of data encryption, network security, and vulnerability testing; Excellent problem-solving and analytical skills; Ability to respond to cybersecurity breaches and incidents;'),(111,'System Administrator','System Administrators are responsible for setting up and maintaining systems or servers. They ensure that the IT infrastructure of an organization is up-to-date and they run checks to ensure that systems are functioning effectively and securely.','Set up and maintain systems or servers; Ensure the integrity and confidentiality of the company\'s data; Regularly update the system as per the needs;','Strong knowledge of system security and data backup/recovery; Ability to manage multiple servers effectively; Excellent problem-solving skills;'),(1000,'Mobile Developer','Mobile Developers specialize in creating software for mobile devices. They are fluent in a variety of programming languages and platforms, understand user interface and user experience design, and ensure that the apps they develop are optimized for performance and usability.','Design and create software for mobile devices; Optimize applications for maximum speed and scalability; Work closely with the design team to implement user interface and experience;','Proficient in mobile programming languages such as Java, Swift, Kotlin or Flutter; Familiarity with OOP design principles; Excellent analytical and problem-solving skills;'),(1001,'UX/UI Designer','UX/UI Designers are responsible for designing and implementing the user interface and experience for software applications. They understand user needs, create wireframes and prototypes, and work closely with developers and other designers to ensure a seamless and visually appealing user experience.','Design and implement user interface for software applications; Create wireframes, prototypes, and mockups; Work closely with developers and product managers to implement designs;','Proficient in design software like Sketch, Adobe XD, Figma; Understanding of interaction design principles; Excellent communication and problem-solving skills;'),(1010,'AI Developer','AI Developers design and implement models for machine learning and artificial intelligence. They use programming and data analysis skills to develop algorithms that enable machines to take actions without being specifically directed to perform those tasks.','Design and implement models for machine learning; Develop algorithms that enable machines to perform tasks; Test and refine models and algorithms;','Proficient in AI-related programming languages such as Python, R, TensorFlow; Understanding of machine learning, deep learning, and neural networks; Excellent analytical and problem-solving skills;'),(1011,'Software Developer','Software Developers are responsible for designing, installing, testing, and maintaining software systems. They write efficient and testable code using the best software development practices and ensure that the software performs correctly and is properly maintained.','Design, install, test, and maintain software systems; Write efficient and testable code; Regularly update the software as per the requirements;','Proficient in programming languages such as Java, C#, Python; Understanding of algorithms and data structures; Excellent problem-solving skills;'),(1100,'IT Professor','IT Professors educate students in various technology fields, including computer science, information systems, and IT. They create lesson plans, evaluate student performance, conduct research in their field of expertise, and often contribute to the academic community by publishing their findings.','Teach students various technology subjects; Conduct research in the field of expertise; Contribute to the academic community;','Doctorate in IT or related field; Excellent communication and teaching skills; Ability to keep up with the developments in the field of expertise;'),(1101,'Game Developer','Game Developers design and create video games for computers, consoles, and mobile devices. They combine creativity, technical skills, and a passion for gaming to create new, exciting gaming experiences.','Design and develop video games; Create and manage game mechanics, assets, and resources; Regularly test the game to ensure smooth performance;','Proficient in game development tools and languages such as Unity, Unreal Engine, C++, C#; Understanding of 3D modeling software; Creative mindset and problem-solving skills;'),(1110,'IT Consultant','IT Consultants help businesses to utilize their technology effectively to meet their business objectives. They provide strategic guidance, implement technology solutions, and manage systems to ensure they are integrated and functioning efficiently.','Provide strategic guidance to clients regarding technology; Implement technology solutions that meet clients\' needs; Manage systems to ensure they function efficiently;','Strong knowledge of IT systems, architectures, and business processes; Excellent communication and problem-solving skills; Ability to handle multiple projects at a time;'),(1111,'Project Manager','Project Managers oversee all aspects of a project within a company. They plan, execute, monitor, control, and close projects while ensuring they are completed on time and on budget, meeting all project objectives.','Plan, execute, monitor, and close projects; Ensure projects are completed on time and on budget; Regularly report the project status to stakeholders;','Proficient in project management software like MS Project, Jira; Excellent communication, organization, and problem-solving skills; PMP certification is a plus;');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `usersid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`usersid`),
  UNIQUE KEY `userid_UNIQUE` (`usersid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Zehra','Grbovic','zehra.grbovic@stu.ibu.edu.ba','12345',1),(2,'Ismar','Kovacevic','ismar.kovacevic@stu.ibu.edu.ba','6789ok',1),(3,'Ilma','Gusinac','ilma.gusinac@stu.ibu.edu.ba','osnovno',1),(4,'Kan','Peljto','email1','password1',1),(5,'Burhan','Hosic','email2','password2',1),(6,'Abdulkadir','Akay','email3','password3',1);
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

-- Dump completed on 2023-07-09  2:37:15

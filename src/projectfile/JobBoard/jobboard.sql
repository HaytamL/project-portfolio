-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           11.6.2-MariaDB-log - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour jobboard
CREATE DATABASE IF NOT EXISTS `jobboard` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `jobboard`;

-- Listage de la structure de table jobboard. advertisement
CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `salary` int(11) NOT NULL,
  `workhours` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C95F6AEE979B1AD6` (`company_id`),
  CONSTRAINT `FK_C95F6AEE979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table jobboard.advertisement : ~100 rows (environ)
INSERT INTO `advertisement` (`id`, `company_id`, `title`, `description`, `salary`, `workhours`) VALUES
	(1, 37, 'Développeur Full Stack', 'Développement et maintenance d’applications web modernes pour nos clients tech.', 42000, 40),
	(2, 37, 'Chef de projet digital', 'Gestion de projets logiciels et coordination des équipes techniques.', 50000, 35),
	(3, 37, 'Designer UX/UI', 'Conception d’interfaces intuitives et attractives.', 38000, 35),
	(4, 37, 'Data Analyst', 'Analyse de données clients pour améliorer les performances produits.', 45000, 35),
	(5, 37, 'Technicien support', 'Assistance technique de niveau 1 et 2 pour les utilisateurs internes.', 32000, 35),
	(6, 38, 'Chocolatier', 'Fabrication artisanale de chocolats premium.', 28000, 39),
	(7, 38, 'Responsable boutique', 'Gestion quotidienne de la chocolaterie et du personnel.', 31000, 35),
	(8, 38, 'Assistant marketing', 'Aide à la communication et à la mise en avant des produits.', 29000, 35),
	(9, 38, 'Logisticien', 'Organisation des livraisons et gestion des stocks.', 30000, 35),
	(10, 38, 'Chargé de clientèle', 'Conseil et fidélisation des clients gourmets.', 28000, 35),
	(11, 39, 'Chef de produit', 'Pilotage de la gamme d’accessoires nautiques et stratégie marketing.', 46000, 35),
	(12, 39, 'Community Manager', 'Animation des réseaux sociaux autour du monde marin.', 34000, 35),
	(13, 39, 'Technicien maintenance', 'Entretien et réparation des équipements marins.', 37000, 39),
	(14, 39, 'Comptable', 'Gestion des finances et bilans annuels.', 41000, 35),
	(15, 39, 'Assistant administratif', 'Soutien à la direction pour les tâches quotidiennes.', 30000, 35),
	(16, 40, 'Développeur backend PHP', 'Création et optimisation d’API pour nos produits web.', 43000, 35),
	(17, 40, 'DevOps Engineer', 'Automatisation et déploiement sur serveurs cloud.', 52000, 35),
	(18, 40, 'QA Tester', 'Réalisation de tests manuels et automatisés.', 37000, 35),
	(19, 40, 'Lead developer', 'Encadrement d’une équipe de 4 développeurs.', 58000, 35),
	(20, 40, 'Stagiaire développeur', 'Participation aux projets web internes.', 12000, 35),
	(21, 41, 'Ingénieur énergie renouvelable', 'Développement de solutions solaires et éoliennes.', 47000, 35),
	(22, 41, 'Technicien panneaux solaires', 'Installation et maintenance de systèmes photovoltaïques.', 35000, 39),
	(23, 41, 'Chef de chantier', 'Supervision des installations sur site.', 42000, 40),
	(24, 41, 'Commercial B2B', 'Prospection de nouveaux clients pour nos offres vertes.', 39000, 35),
	(25, 41, 'Chargé RSE', 'Mise en œuvre des politiques environnementales.', 41000, 35),
	(26, 42, 'Développeur WordPress', 'Création de sites vitrines pour nos clients artisans.', 36000, 35),
	(27, 42, 'Chef de projet web', 'Coordination des freelances et respect des délais.', 43000, 35),
	(28, 42, 'Graphiste', 'Création de visuels modernes pour nos clients.', 34000, 35),
	(29, 42, 'Rédacteur SEO', 'Rédaction de contenus optimisés pour le web.', 31000, 35),
	(30, 42, 'Community Manager', 'Gestion des comptes réseaux sociaux.', 30000, 35),
	(31, 43, 'Conducteur VTC', 'Transport urbain premium pour clients réguliers.', 29000, 40),
	(32, 43, 'Responsable flotte', 'Gestion de véhicules et plannings de chauffeurs.', 34000, 35),
	(33, 43, 'Chargé de planification', 'Optimisation des trajets et de la logistique.', 32000, 35),
	(34, 43, 'Assistant RH', 'Gestion des recrutements et plannings.', 31000, 35),
	(35, 43, 'Développeur mobile', 'Amélioration de notre application de réservation.', 45000, 35),
	(36, 44, 'Graphiste motion design', 'Création d’animations pour les campagnes clients.', 37000, 35),
	(37, 44, 'Photographe', 'Shooting produits et retouche photo.', 34000, 35),
	(38, 44, 'Monteur vidéo', 'Montage et post-production de vidéos promotionnelles.', 36000, 35),
	(39, 44, 'Directeur artistique', 'Supervision de la direction visuelle des projets.', 52000, 35),
	(40, 44, 'Assistant studio', 'Aide logistique et technique aux équipes créa.', 28000, 35),
	(41, 45, 'Jardinier paysagiste', 'Entretien et création d’espaces verts.', 29000, 39),
	(42, 45, 'Responsable serre', 'Gestion de la production de plantes et fleurs.', 31000, 35),
	(43, 45, 'Agent de livraison', 'Livraison de bouquets et plantes à domicile.', 27000, 35),
	(44, 45, 'Assistant commercial', 'Gestion des commandes clients et devis.', 30000, 35),
	(45, 45, 'Chef d’équipe', 'Encadrement de 5 jardiniers sur site.', 35000, 39),
	(46, 46, 'Développeur React', 'Développement d’interfaces dynamiques.', 42000, 35),
	(47, 46, 'Chef de produit SaaS', 'Pilotage des fonctionnalités logicielles.', 50000, 35),
	(48, 46, 'Support technique', 'Assistance utilisateurs sur nos produits.', 34000, 35),
	(49, 46, 'Administrateur système', 'Maintenance des serveurs cloud.', 47000, 35),
	(50, 46, 'Stagiaire web', 'Participation aux projets front-end.', 12000, 35),
	(51, 47, 'Data Engineer', 'Mise en place d’architectures de données performantes.', 52000, 35),
	(52, 47, 'Data Scientist', 'Analyse et modélisation des jeux de données.', 56000, 35),
	(53, 47, 'Business Analyst', 'Traduction des besoins métiers en specs techniques.', 48000, 35),
	(54, 47, 'Consultant BI', 'Déploiement de tableaux de bord et KPI.', 46000, 35),
	(55, 47, 'Stagiaire data', 'Nettoyage et enrichissement de datasets.', 15000, 35),
	(56, 48, 'Technicien maintenance industrielle', 'Entretien des machines et outils de production.', 34000, 39),
	(57, 48, 'Chef d’équipe atelier', 'Coordination des techniciens et reporting.', 38000, 35),
	(58, 48, 'Opérateur de production', 'Assemblage et contrôle qualité.', 30000, 39),
	(59, 48, 'Ingénieur procédés', 'Optimisation des chaînes de fabrication.', 45000, 35),
	(60, 48, 'Magasinier', 'Gestion des pièces et consommables.', 28000, 35),
	(61, 49, 'Boulanger', 'Préparation de viennoiseries et pâtisseries.', 27000, 39),
	(62, 49, 'Responsable boutique', 'Gestion de l’équipe et de la caisse.', 31000, 35),
	(63, 49, 'Vendeur', 'Accueil et conseil client.', 26000, 35),
	(64, 49, 'Apprenti pâtissier', 'Formation au sein de notre laboratoire.', 18000, 35),
	(65, 49, 'Chargé communication', 'Promotion des nouveautés sur réseaux sociaux.', 29000, 35),
	(66, 50, 'Ingénieur cloud', 'Déploiement et sécurisation d’infrastructures cloud.', 52000, 35),
	(67, 50, 'Architecte système', 'Conception d’architectures multi-cloud.', 58000, 35),
	(68, 50, 'Développeur backend Node.js', 'Développement d’APIs performantes.', 47000, 35),
	(69, 50, 'Administrateur réseau', 'Maintenance du réseau interne.', 45000, 35),
	(70, 50, 'Support client technique', 'Assistance à nos clients B2B.', 33000, 35),
	(71, 51, 'Chef de rayon', 'Gestion du rayon fruits exotiques.', 29000, 35),
	(72, 51, 'Responsable logistique', 'Organisation des flux de marchandises.', 34000, 35),
	(73, 51, 'Chargé qualité', 'Contrôle de la fraîcheur et du conditionnement.', 31000, 35),
	(74, 51, 'Vendeur primeur', 'Accueil client et mise en avant produits.', 27000, 35),
	(75, 51, 'Graphiste packaging', 'Création d’étiquettes et supports visuels.', 33000, 35),
	(76, 52, 'Chef de projet communication', 'Pilotage des campagnes marketing clients.', 41000, 35),
	(77, 52, 'Concepteur-rédacteur', 'Création de contenus publicitaires.', 38000, 35),
	(78, 52, 'Community Manager', 'Animation des comptes clients.', 32000, 35),
	(79, 52, 'Assistant chef de projet', 'Support opérationnel aux campagnes.', 29000, 35),
	(80, 52, 'Graphiste', 'Création de supports visuels attractifs.', 34000, 35),
	(81, 53, 'Technicien traitement des eaux', 'Surveillance et maintenance des installations.', 33000, 39),
	(82, 53, 'Responsable site', 'Encadrement des équipes d’exploitation.', 45000, 35),
	(83, 53, 'Chauffeur poids lourd', 'Transport d’équipements et produits liquides.', 31000, 39),
	(84, 53, 'Ingénieur environnement', 'Études d’impact et amélioration des procédés.', 47000, 35),
	(85, 53, 'Assistant administratif', 'Soutien aux démarches administratives.', 29000, 35),
	(86, 54, 'Logisticien', 'Organisation du transport et stockage des marchandises.', 34000, 35),
	(87, 54, 'Chauffeur-livreur', 'Livraison régionale des produits.', 29000, 39),
	(88, 54, 'Planificateur', 'Optimisation des trajets et ressources.', 36000, 35),
	(89, 54, 'Responsable entrepôt', 'Gestion des stocks et du personnel.', 41000, 35),
	(90, 54, 'Cariste', 'Chargement et déchargement de palettes.', 28000, 35),
	(91, 55, 'Chef de projet digital', 'Gestion des campagnes marketing et communication.', 42000, 35),
	(92, 55, 'Monteur vidéo', 'Réalisation de contenus visuels pour nos clients.', 35000, 35),
	(93, 55, 'Photographe', 'Production de visuels pour les réseaux sociaux.', 33000, 35),
	(94, 55, 'Développeur web', 'Intégration de sites vitrines et e-commerce.', 40000, 35),
	(95, 55, 'Community Manager', 'Gestion des réseaux sociaux clients.', 32000, 35),
	(96, 56, 'Designer produit', 'Création d’objets innovants et écologiques.', 38000, 35),
	(97, 56, 'Chef de projet innovation', 'Pilotage des projets de conception.', 48000, 35),
	(98, 56, 'Technicien prototypage', 'Assemblage et test de nouveaux produits.', 34000, 35),
	(99, 56, 'Ingénieur mécanique', 'Conception et modélisation 3D.', 46000, 35),
	(100, 56, 'Assistant R&D', 'Support aux équipes d’ingénieurs.', 32000, 35);

-- Listage de la structure de table jobboard. application
CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertisement_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` longtext NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(180) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A45BDDC1A1FBF71B` (`advertisement_id`),
  KEY `IDX_A45BDDC1A76ED395` (`user_id`),
  CONSTRAINT `FK_A45BDDC1A1FBF71B` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_A45BDDC1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table jobboard.application : ~4 rows (environ)
INSERT INTO `application` (`id`, `advertisement_id`, `user_id`, `message`, `firstname`, `lastname`, `email`, `phone`) VALUES
	(29, 38, 1, 'Bonjour je suis intéressé par cette offre d\'emploi !', 'Victor', 'Buzenco', 'test@gmail.com', '078317'),
	(30, 13, 1, 'Je suis intéressé.', 'Victor', 'Buzenco', 'test@gmail.com', '078317'),
	(31, 37, 1, 'je suis intéressé.', 'Victor', 'Buzenco', 'test@gmail.com', '078317'),
	(32, 1, 1, 'test', 'Victor', 'Buzenco', 'test@gmail.com', '078317'),
	(33, 18, 12, 'Bonjour j\'aimerais être embauché par votre entreprise !', 'Damien', 'Pernot', 'damien@gmail.com', 'Non défini');

-- Listage de la structure de table jobboard. company
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table jobboard.company : ~29 rows (environ)
INSERT INTO `company` (`id`, `name`) VALUES
	(18, 'Haytaboulet'),
	(20, 'MagicDims'),
	(21, 'Gérard Mécanique'),
	(22, 'FromagerPaysan'),
	(23, 'DédéCouture'),
	(29, 'BananaFactory'),
	(34, 'ChevalSage'),
	(36, 'DidierCarSpotter'),
	(37, 'TechNova'),
	(38, 'ChocoDreams'),
	(39, 'BlueOcean'),
	(40, 'CodeSmith'),
	(41, 'GreenEnergy'),
	(42, 'BaguetteDigital'),
	(43, 'UrbanRide'),
	(44, 'PixelStudio'),
	(45, 'SweetGarden'),
	(46, 'RivieraSoft'),
	(47, 'DataHive'),
	(48, 'MoulinTech'),
	(49, 'CroissantCorp'),
	(50, 'CloudBusters'),
	(51, 'NeonFruits'),
	(52, 'PaprikaAgency'),
	(53, 'AquaVibe'),
	(54, 'ZenLogistics'),
	(55, 'SolarisMedia'),
	(56, 'MistralConcept');

-- Listage de la structure de table jobboard. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table jobboard.doctrine_migration_versions : ~1 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20251006150057', '2025-10-11 10:40:32', 43);

-- Listage de la structure de table jobboard. messenger_messages
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table jobboard.messenger_messages : ~0 rows (environ)

-- Listage de la structure de table jobboard. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table jobboard.user : ~4 rows (environ)
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `phone`) VALUES
	(1, 'victor@gmail.com', '["ROLE_ADMIN"]', '$2y$13$YmTdzNBcKsFfYIiu7a97b.1mO5z1Sx7lg.ceqLbyQt2x6oDf2Rj52', 'Victor', 'Buzenco', '078317'),
	(3, 'haytam@epitech.eu', '["ROLE_USER"]', '$2y$13$YmTdzNBcKsFfYIiu7a97b.1mO5z1Sx7lg.ceqLbyQt2x6oDf2Rj52', 'haytam', 'tamtam', NULL),
	(4, 'hector@epitech.eu', '["ROLE_USER"]', '$2y$13$YmTdzNBcKsFfYIiu7a97b.1mO5z1Sx7lg.ceqLbyQt2x6oDf2Rj52', 'hector', 'fun', NULL),
	(9, 'ad.laurent@gmail.com', '["ROLE_USER"]', '$2y$13$YmTdzNBcKsFfYIiu7a97b.1mO5z1Sx7lg.ceqLbyQt2x6oDf2Rj52', 'Adrien', 'Laurent', '19'),
	(12, 'damien@gmail.com', '[]', '$2y$13$ENyBXNSXgBFy3dtC1ZjbaeHuAxC.Q0bKaweA9RCWvYNNqJXP7EIj6', 'Damien', 'Pernot', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

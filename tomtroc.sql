-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20260222.470c4460d7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2026 at 04:31 PM
-- Server version: 8.4.3
-- PHP Version: 8.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
DROP TABLE IF EXISTS `message`;
DROP TABLE IF EXISTS `book`;
DROP TABLE IF EXISTS `user`;

--
-- Database: `tomtroc`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `picture` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` tinyint NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `description`, `author`, `picture`, `status`, `user_id`, `created_at`) VALUES
(1, 'The Kinkfolk Table', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'Nathan Williams', 'picture/book/the_kinfolk.png', 1, 1, '2026-04-21 16:59:11'),
(2, 'Esther', 'Dans un village reculé des Vosges, Esther découvre un vieux carnet dissimulé sous les lattes du grenier de sa grand-mère. Les pages jaunies racontent l\'histoire d\'une forêt qui aurait englouti tout un hameau au XVIIIe siècle — une légende que personne n\'ose plus évoquer. Poussée par la curiosité, elle s\'enfonce seule entre les arbres centenaires, là où les oiseaux se taisent et où le temps semble suspendu. Ce qu\'elle y trouve bouleversera à jamais ce qu\'elle croyait savoir sur sa propre famille.\r\nUn roman envoûtant, entre mystère, nature et mémoire.', 'Alabester', 'picture/book/esther.jpg', 1, 1, '2026-04-21 17:02:45'),
(3, 'Milk and honey', 'Un recueil de textes courts et de fragments poétiques qui explore quatre étapes d\'une vie de femme : la souffrance, l\'amour, la rupture et la guérison. À travers des mots simples et une écriture sans détour, l\'autrice met en lumière les blessures intimes, les violences silencieuses, mais aussi la force tranquille de celles qui se relèvent. Chaque page est une respiration, une confidence, un éclat de lumière après l\'orage.\r\n\r\nUn livre à garder près de soi, à relire dans les moments de doute, à offrir à celles et ceux qui en ont besoin.', 'Rupi Kaur', 'picture/book/milk_honney.jpg', 1, 1, '2026-04-21 17:05:46'),
(4, 'Psalms', 'Un recueil intime de prières modernes, de méditations et de chants silencieux, où la foi se mêle au doute et la lumière à l\'ombre. À travers des textes courts et ciselés, l\'autrice revisite la forme ancienne du psaume pour parler de nos vies contemporaines : la solitude urbaine, l\'amour imparfait, la quête de sens dans un monde pressé.\r\n\r\nChaque page est une halte, une respiration, un murmure adressé à soi-même autant qu\'au ciel.\r\n\r\nUn livre à lire lentement, au lever du jour ou à la tombée de la nuit, comme on feuillette un vieux livre de prières hérité d\'une aïeule.', 'Alabaster', 'picture/book/Psalms.jpg', 0, 1, '2026-04-21 17:15:58'),
(5, 'Narnia', 'Lorsque Lucy, Edmund, Susan et Peter se réfugient dans une vieille demeure de campagne durant la guerre, ils sont loin d\'imaginer ce qui les attend. Au fond d\'une armoire oubliée, un passage secret les entraîne dans un royaume enchanté où les animaux parlent, où la neige éternelle règne sous le pouvoir d\'une sorcière cruelle, et où un lion majestueux nommé Aslan attend le retour des héros prophétisés. Entre magie, amitié et batailles épiques, les quatre enfants vont devoir choisir leur camp et découvrir ce dont ils sont vraiment capables.\r\n\r\nUn classique intemporel de la littérature jeunesse, porté par une imagination débordante et des thèmes universels sur le courage, la loyauté et le pardon.', 'C.S Lewis', 'picture/book/Narnia.jpg', 1, 2, '2026-04-21 17:33:05'),
(6, 'Company Of One', 'Un polar urbain haletant. Inspecteur usé, Martin Roche enquête sur une série de disparitions dans le métro parisien. Chaque nuit, un train fantôme semble emporter ses passagers vers l\'oubli.\r\n\r\nUne descente glaçante dans les entrailles de la ville.', 'Paul Jarvis', 'picture/book/COO.jpg', 1, 2, '2026-04-21 17:37:51'),
(7, 'The Two Towers', 'Un essai poétique sur le lien entre les humains et la nature. À travers ses promenades dans les jardins botaniques d\'Europe, l\'autrice nous invite à redécouvrir la beauté discrète des plantes et ce qu\'elles peuvent nous enseigner sur la patience.', 'J.R.R Tolkien', 'picture/book/TTT.jpg', 0, 2, '2026-04-21 17:40:19'),
(8, 'Innovation', 'Meursault apprend la mort de sa mère sans verser une larme. Quelques jours plus tard, sur une plage écrasée de soleil, il commet un meurtre qu\'il ne s\'explique pas lui-même. Dans ce roman court et percutant, Camus dresse le portrait d\'un homme indifférent au monde, confronté à l\'absurdité de l\'existence et au jugement d\'une société qui ne le comprend pas.', 'Matt Ridley', 'picture/book/MR.jpg', 1, 2, '2026-04-21 17:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `content`, `sender_id`, `receiver_id`, `created_at`, `is_read`) VALUES
(1, 'Bonjour Alexandre ! J\'ai vu que tu proposais \"Narnia\" dans ta bibliothèque. Je cherche justement ce livre depuis un moment. Est-ce qu\'il est toujours disponible à l\'échange ?', 1, 2, '2026-04-21 18:20:58', 1),
(2, 'Bonjour Nathalie ! Oui il est toujours dispo. Tu as des livres à me proposer en échange ? Je suis plutôt branché essais et développement personnel en ce moment.', 2, 1, '2026-04-21 18:22:07', 1),
(3, 'Super ! J\'ai \"Sapiens\" de Yuval Noah Harari en très bon état. Est-ce qu\'il t\'intéresserait ?', 1, 2, '2026-04-21 18:23:59', 1),
(4, 'Sapiens me tente beaucoup ! Je ne l\'ai jamais lu et on me le recommande souvent. On pourrait se retrouver cette semaine pour faire l\'échange si ça te va ?', 2, 1, '2026-04-21 18:24:40', 1),
(5, 'Parfait pour moi ! Je suis dispo jeudi ou vendredi après 18h. Tu préfères un café en centre-ville ou on se retrouve près d\'une station de métro ?', 1, 2, '2026-04-21 18:25:12', 1),
(6, 'Vendredi 18h30 au café de la Mairie ça te va ? C\'est facile d\'accès en tram et il y a une petite terrasse sympa.', 2, 1, '2026-04-21 18:25:41', 1),
(7, 'Ça marche, à vendredi alors ! Je viendrai avec Sapiens. Bonne journée !', 1, 2, '2026-04-21 18:26:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `profile_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `pseudo`, `profile_photo`, `created_at`) VALUES
(1, 'nathalie@exemple.com', '$2y$12$anW4k.p0TCQpfEL2VG4UYuU5SSWENmDXJW4vQBK37L17BtAVM4pju', 'Nathalire', 'picture/users/PP.png', '2026-04-21 16:51:32'),
(2, 'alexandre@exemple.com', '$2y$12$hCJt3Zv8O3Q12Ip/8rrO/e4SIqsqzQlEyHahDSFjmlSQdcEpj//oa', 'Alexlecture', 'picture/users/photo.png', '2026-04-21 17:24:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

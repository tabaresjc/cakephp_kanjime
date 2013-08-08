-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2013 at 10:36 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sdcmob`
--
CREATE DATABASE IF NOT EXISTS `sdcmob` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sdcmob`;

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 94),
(2, 1, NULL, NULL, 'Admin', 2, 5),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 1, NULL, NULL, 'Admins', 6, 9),
(5, 4, NULL, NULL, 'index', 7, 8),
(6, 1, NULL, NULL, 'Collections', 10, 31),
(7, 6, NULL, NULL, 'index', 11, 12),
(8, 6, NULL, NULL, 'view', 13, 14),
(9, 6, NULL, NULL, 'add', 15, 16),
(10, 6, NULL, NULL, 'edit', 17, 18),
(11, 6, NULL, NULL, 'delete', 19, 20),
(12, 6, NULL, NULL, 'search', 21, 22),
(13, 6, NULL, NULL, 'findkanji', 23, 24),
(14, 6, NULL, NULL, 'mbStringToArray', 25, 26),
(15, 1, NULL, NULL, 'Groups', 32, 43),
(16, 15, NULL, NULL, 'index', 33, 34),
(17, 15, NULL, NULL, 'view', 35, 36),
(18, 15, NULL, NULL, 'add', 37, 38),
(19, 15, NULL, NULL, 'edit', 39, 40),
(20, 15, NULL, NULL, 'delete', 41, 42),
(21, 1, NULL, NULL, 'Pages', 44, 47),
(22, 21, NULL, NULL, 'display', 45, 46),
(23, 1, NULL, NULL, 'Posts', 48, 59),
(24, 23, NULL, NULL, 'index', 49, 50),
(25, 23, NULL, NULL, 'view', 51, 52),
(26, 23, NULL, NULL, 'add', 53, 54),
(27, 23, NULL, NULL, 'edit', 55, 56),
(28, 23, NULL, NULL, 'delete', 57, 58),
(29, 1, NULL, NULL, 'Users', 60, 77),
(31, 29, NULL, NULL, 'login', 61, 62),
(32, 29, NULL, NULL, 'logout', 63, 64),
(33, 29, NULL, NULL, 'index', 65, 66),
(34, 29, NULL, NULL, 'view', 67, 68),
(35, 29, NULL, NULL, 'add', 69, 70),
(36, 29, NULL, NULL, 'edit', 71, 72),
(37, 29, NULL, NULL, 'delete', 73, 74),
(38, 29, NULL, NULL, 'search', 75, 76),
(39, 1, NULL, NULL, 'AclExtras', 78, 79),
(40, 1, NULL, NULL, 'DebugKit', 80, 87),
(41, 40, NULL, NULL, 'ToolbarAccess', 81, 86),
(42, 41, NULL, NULL, 'history_state', 82, 83),
(43, 41, NULL, NULL, 'sql_explain', 84, 85),
(44, 1, NULL, NULL, 'Newsletters', 88, 91),
(45, 44, NULL, NULL, 'add', 89, 90),
(46, 1, NULL, NULL, 'Rest', 92, 93),
(56, 6, NULL, NULL, 'apiv1_index', 27, 28),
(57, 6, NULL, NULL, 'apiv1_view', 29, 30);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4),
(3, NULL, 'Group', 3, NULL, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 6, '1', '1', '1', '1'),
(4, 2, 21, '1', '1', '1', '1'),
(5, 3, 1, '-1', '-1', '-1', '-1'),
(6, 3, 21, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
CREATE TABLE IF NOT EXISTS `collections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `subtitle` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `title`, `subtitle`, `description`, `body`, `created`, `modified`) VALUES
(1, 'Juan', '富安', 'フアン', '{"Name":"Juan","Kanji":"富安","Katakana":"フアン","kanjiList":[{"kanji":"富","kunyomi":"と.む «to.mu», とみ «tomi»","onyomi":"*フ «fu»*, フウ «fuu»","meaning":"wealth, *enrich*, abundant"},{"kanji":"安","kunyomi":"やす.い «yasu.i», やす.まる «yasu.maru», やす «yasu», やす.らか «yasu.raka»","onyomi":"*アン «an»*","meaning":"relax, cheap, low, quiet, rested, contented, *peaceful*"}]}', '2013-07-20 08:00:09', '2013-07-25 20:30:03'),
(2, 'Alex', '在憐久守', 'アレックス', '{"Name":"Alex","Kanji":"在憐久守","Katakana":"アレックス","kanjiList":[{"kanji":"在","kunyomi":"*あ*.る «a-ru»","onyomi":"ザイ «zai»","meaning":"*exist*, outskirts, suburbs, located in"},{"kanji":"憐","kunyomi":"あわ.れむ «awa.remu», あわ.れ «awa.re»","onyomi":"*レン «ren»*","meaning":"pity, *have mercy*, sympathise, *compassion*"},{"kanji":"久","kunyomi":"ひさ.しい «hisa.shii»","onyomi":"キュウ «kyuu», *ク «ku»*","meaning":"*long time*, old story"},{"kanji":"守","kunyomi":"まも.る «mamo.ru», まも.り «mamo.ri», もり «mori», もり «mori», かみ «kami»","onyomi":"シュ «shu», *ス «su»*","meaning":"guard, *protect*, defend, obey"}]}', '2013-07-25 21:04:27', '2013-07-25 21:04:27'),
(3, 'Jane', '慈得園', 'ジェーン', '{"Name":"Jane","Kanji":"慈得園","Katakana":"ジェーン","kanjiList":[{"kanji":"慈","kunyomi":"いつく.しむ «itsuku.shimu»","onyomi":"*ジ «ji»*","meaning":"*mercy*"},{"kanji":"得","kunyomi":"*え.る «e-ru»*, う.る «u.ru»","onyomi":"トク «toku»","meaning":"*gain*, get, find, earn, acquire, can, may, able to, profit, advantage, benefit"},{"kanji":"園","kunyomi":"その «sono»","onyomi":"*エン «en»*","meaning":"park, *garden*, yard, farm"}]}', '2013-07-25 21:09:47', '2013-07-25 21:09:47'),
(4, 'Jacob', '慈英呼武', 'ジェイコブ', '{"Name":"Jacob","Kanji":"慈英呼武","Katakana":"ジェーコブ","kanjiList":[{"kanji":"慈","kunyomi":"いつく.しむ «itsuku.shimu»","onyomi":"*ジ «ji»*","meaning":"*mercy*"},{"kanji":"英","kunyomi":"はなぶさ «hanabusa»","onyomi":"*エイ «ei»*","meaning":"*England*, English"},{"kanji":"呼","kunyomi":"よ.ぶ «yo.bu»","onyomi":"*コ «ko»*","meaning":"*call*, call out to, invite"},{"kanji":"武","kunyomi":"たけ.し «take.shi»","onyomi":"*ブ «bu»*, ム «mu»","meaning":"*warrior*, military, chivalry, arms"}]}', '2013-07-26 10:21:31', '2013-07-26 10:21:50'),
(5, 'George', '如羽治', 'ジョージ', '{"Name":"George","Kanji":"如羽治","Katakana":"ジョージ","kanjiList":[{"kanji":"如","kunyomi":"ごと.し «goto.shi»","onyomi":"*ジョ «jo»*, ニョ «nyo»","meaning":"likeness, *like*, such as, as if, better, best, equal"},{"kanji":"羽","kunyomi":"は «wa», わ «wa», はね «hane»","onyomi":"*ウ «u»*","meaning":"*feathers*, counter for birds, rabbits"},{"kanji":"治","kunyomi":"おさ.める «osa.meru», おさ.まる «osa.maru», なお.る «nao.ru», なお.す «nao.su»","onyomi":"*ジ «ji»*, チ «chi»","meaning":"reign, *be at peace*, calm down, subdue, quell, govt, cure, heal, rule, conserve"}]}', '2013-07-26 10:28:21', '2013-07-26 10:28:21'),
(6, 'Benjamin', '勉者明', 'ベンジャミン', '{"Name":"Benjamin","Kanji":"勉者明","Katakana":"ベンジャミン","kanjiList":[{"kanji":"勉","kunyomi":"つと.める «tsuto.meru»","onyomi":"*ベン «ben»*","meaning":"exertion, endeavour, *encourage*, strive, make effort, *diligent*"},{"kanji":"者","kunyomi":"もの «mono»","onyomi":"シャ «sha», *ジャ «ja»*","meaning":"someone, *person*"},{"kanji":"明","kunyomi":"あ.かり «a.kari», あか.るい «aka.rui», あか.るむ «aka.rumu», あか.らむ «aka.ramu», あき.らか «aki.raka», あ.ける «a.keru», あ.け «a.ke», あ.く «a.ku», あ.くる «a.kuru», あ.かす «a.kasu»","onyomi":"メイ «mei», ミョウ «myou», *ミン «min»*","meaning":"*bright*, light"}]}', '2013-07-29 23:22:40', '2013-07-29 23:22:40'),
(7, 'Ian', '偉案', 'イアン', '{"Name":"Ian","Kanji":"偉案","Katakana":"イアン","kanjiList":[{"kanji":"偉","kunyomi":"えら.い «era.i»","onyomi":"*イ «i»*","meaning":"admirable, greatness, remarkable, *excellent*"},{"kanji":"案","kunyomi":"","onyomi":"*アン «an»*","meaning":"plan, suggestion, draft, ponder, proposition, *idea*, expectation"}]}', '2013-07-29 23:28:20', '2013-07-29 23:28:20'),
(8, 'Emma', '恵眞', 'エマ', '{"Name":"Emma","Kanji":"恵眞","Katakana":"エマ","kanjiList":[{"kanji":"恵","kunyomi":"めぐ.む «megu.mu», めぐ.み «megu.mi»","onyomi":"ケイ «kei», *エ «e»*","meaning":"favor, *blessing, grace*, kindness"},{"kanji":"眞","kunyomi":"*ま «ma»*, まこと «makoto»","onyomi":"シン «shin»","meaning":"*truth, reality*"}]}', '2013-07-29 23:30:44', '2013-07-29 23:30:44'),
(9, 'Olivia', '織美亜', 'オリビア', '{"Name":"Olivia","Kanji":"織美亜","Katakana":"オリビア","kanjiList":[{"kanji":"織","kunyomi":"お.る «o.ru», お.り «o.ri», おり «ori», *おり «ori»*, お.り «o.ri»","onyomi":"ショク «shoku», シキ «shiki»","meaning":"*weave*, fabric"},{"kanji":"美","kunyomi":"うつく.しい «utsuku.shii»","onyomi":"*ビ «bi»*, ミ «mi»","meaning":"*beauty, beautiful*"},{"kanji":"亜","kunyomi":"つ.ぐ «tsu.gu»","onyomi":"*ア «a»*","meaning":"*Asia*, rank next, come after, -ous"}]}', '2013-07-29 23:33:25', '2013-07-29 23:33:25'),
(10, 'Sofia', '素歩伊亜', 'ソフィア', '{"Name":"Sofia","Kanji":"素歩伊亜","Katakana":"ソフィア","kanjiList":[{"kanji":"素","kunyomi":"もと «moto»","onyomi":"*ソ «so»*, ス «su»","meaning":"elementary, *principle*, naked, uncovered"},{"kanji":"歩","kunyomi":"ある.く «aru.ku», あゆ.む «ayu.mu»","onyomi":"ホ «ho», ブ «bu», *フ «fu»*","meaning":"*walk*, counter for steps"},{"kanji":"伊","kunyomi":"かれ «kare»","onyomi":"*イ «i»*","meaning":"*Italy*, that one"},{"kanji":"亜","kunyomi":"つ.ぐ «tsu.gu»","onyomi":"*ア «a»*","meaning":"*Asia*, rank next, come after, -ous"}]}', '2013-07-30 00:41:34', '2013-07-30 00:41:34'),
(11, 'Jasmine', '蛇守民', 'ジャスミン', '{"Name":"Jasmine","Kanji":"蛇守民","Katakana":"ジャスミン","kanjiList":[{"kanji":"蛇","kunyomi":"へび «hebi»","onyomi":"*ジャ «ja»*, ダ «da», イ «i», ヤ «ya»","meaning":"*snake*"},{"kanji":"守","kunyomi":"まも.る «mamo.ru», まも.り «mamo.ri», もり «mori», もり «mori», かみ «kami»","onyomi":"シュ «shu», *ス «su»*","meaning":"*guard, protect*, defend"},{"kanji":"民","kunyomi":"たみ «tami»","onyomi":"*ミン «min»*","meaning":"*people*, nation, subjects"}]}', '2013-07-30 00:49:05', '2013-07-30 00:49:05'),
(12, 'Emily', '恵美理', 'エミリー', '{"Name":"Emily","Kanji":"恵美理","Katakana":"エミリー","kanjiList":[{"kanji":"恵","kunyomi":"めぐ.む «megu.mu», めぐ.み «megu.mi»","onyomi":"ケイ «kei», *エ «e»*","meaning":"favor, blessing, *grace*, kindness"},{"kanji":"美","kunyomi":"うつく.しい «utsuku.shii»","onyomi":"ビ «bi», *ミ «mi»*","meaning":"*beauty*, beautiful"},{"kanji":"理","kunyomi":"ことわり «kotowari»","onyomi":"*リ «ri»*","meaning":"logic, arrangement, reason, justice, *truth*"}]}', '2013-07-30 00:53:19', '2013-07-30 00:53:19'),
(13, 'William', '羽衣利編', 'ウィリアム', '{"Name":"William","Kanji":"羽衣利編","Katakana":"ウィリアム","kanjiList":[{"kanji":"羽","kunyomi":"は «wa», わ «wa», はね «hane»","onyomi":"*ウ «u»*","meaning":"*feathers*, counter for birds, rabbits"},{"kanji":"衣","kunyomi":"ころも «koromo», きぬ «kinu», ぎ «gi»","onyomi":"*イ «i»*, エ «e»","meaning":"garment, *clothes*, dressing"},{"kanji":"利","kunyomi":"き.く «ki.ku»","onyomi":"*リ «ri»*","meaning":"profit, *advantage, benefit*"},{"kanji":"編","kunyomi":"*あ.む «a.mu»*, あ.み «a.mi»","onyomi":"ヘン «hen»","meaning":"compilation, *knit*, plait, braid, twist, editing"}]}', '2013-07-30 01:01:55', '2013-07-30 01:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Administrators', '2013-08-02 13:46:27', '2013-08-02 16:45:44'),
(2, 'Managers', '2013-08-02 13:46:34', '2013-08-02 13:46:34'),
(3, 'Users', '2013-08-02 13:46:39', '2013-08-02 13:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created`, `modified`) VALUES
(1, 'juan.ctt@live.com', '2013-08-04 04:25:30', '2013-08-04 04:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `rest_logs`
--

DROP TABLE IF EXISTS `rest_logs`;
CREATE TABLE IF NOT EXISTS `rest_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `model_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `requested` datetime NOT NULL,
  `apikey` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `httpcode` smallint(3) unsigned NOT NULL,
  `error` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ratelimited` tinyint(1) unsigned NOT NULL,
  `data_in` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data_out` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `responded` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `account_sid` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `address`, `group_id`, `account_sid`, `created`, `modified`) VALUES
(1, 'admin', '4cdba7ae2cbaf2d8eaf52386f04a049a9f4ec49a', 'Administrator', 'kazue77@gmail.com', '', 1, '', '2013-08-02 13:47:25', '2013-08-03 04:29:03'),
(2, 'juanctt', '622411772bdd1ccfb05d5b990324d8f3de7ebea9', 'Juan Tabares', 'juan.ctt@live.com', '', 1, '', '2013-08-02 13:48:08', '2013-08-03 04:29:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

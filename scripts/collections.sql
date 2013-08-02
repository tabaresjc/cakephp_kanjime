-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2013 at 02:29 AM
-- Server version: 5.5.23
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kazue77_kanjime`
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

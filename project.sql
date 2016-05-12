-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2013 at 03:17 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `fb_member`
--

CREATE TABLE IF NOT EXISTS `fb_member` (
  `fbid` varchar(45) NOT NULL,
  `fbname` varchar(45) NOT NULL,
  PRIMARY KEY (`fbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberdata`
--

CREATE TABLE IF NOT EXISTS `memberdata` (
  `m_id` bigint(35) NOT NULL AUTO_INCREMENT,
  `m_firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_passwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_level` enum('admin','member','fb') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `m_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_login` int(11) unsigned NOT NULL DEFAULT '0',
  `m_logintime` datetime DEFAULT NULL,
  `m_jointime` datetime NOT NULL,
  PRIMARY KEY (`m_id`),
  UNIQUE KEY `m_username` (`m_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=100005772643747 ;

--
-- Dumping data for table `memberdata`
--

INSERT INTO `memberdata` (`m_id`, `m_firstname`, `m_name`, `m_username`, `m_passwd`, `m_level`, `m_email`, `m_url`, `m_phone`, `m_address`, `m_login`, `m_logintime`, `m_jointime`) VALUES
(1, 'SUN', 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, NULL, NULL, NULL, 66, '2013-05-07 20:52:48', '2008-10-20 16:36:15'),
(2, 'Zhida', 'SUN', 'a2345678', '25d55ad283aa400af464c76d713c07ad', 'member', 'asfd@sdf.df', '', '', '', 150, '2013-05-07 19:14:50', '2013-04-19 13:43:17'),
(3, 'Qian', 'WANG', 'wangqian', '1608330a4f8c52c5ebbeee18c40a07ed', 'member', '80579923@qq.com', '', '', '', 8, '2013-05-07 17:22:13', '2013-04-25 12:54:54'),
(5, 'Jiwei', 'Li', 'ljw30879785', 'd1d7313ed23e64b52318044fede26593', 'member', 'cxm170@gmail.com', '', '', '', 95, '2013-05-14 21:11:47', '2013-04-19 11:10:22'),
(9, 'Ssdf', 'Asdf', 'c2345678', '25d55ad283aa400af464c76d713c07ad', 'member', 'asdf@sdf.sadf', '', '', '', 2, '2013-04-28 12:42:26', '2013-04-28 12:33:16'),
(14, 'Nick', 'Mui', 'aaaaaaaa', '3dbe00a167653a1aaee01d93e77e730e', 'member', 'myz0323@gmail.com', '', '', '', 11, '2013-05-14 19:05:34', '2013-04-19 12:01:43'),
(16, 'Xuan', 'LIU', 'xuan_liu', '24f3e73ad030d259caabdb6e66b2e2e4', 'member', 'leiei8681@sina.com', '', '', '', 1, '2013-04-19 17:03:06', '2013-04-19 17:02:50'),
(17, 'Ou', 'Kk  Nn', 'abcd1234', '35e5ff80657b6744d43021c23043346d', 'member', '10618157g@connect.polyu.hk', '', '', '', 1, '2013-04-19 18:43:12', '2013-04-19 18:42:26'),
(19, 'Alex ', 'Hun', 'alexhun99', 'e0ec043b3f9e198ec09041687e4d4e8d', 'member', 'asecasdi@yahoo.com.hk', '', '', '', 274, '2013-05-14 20:39:21', '2013-04-25 22:43:55'),
(20, 'Ksdf', 'Sdadf', 'b2345678', '25d55ad283aa400af464c76d713c07ad', 'member', 'sdfg@sd.sd', '', '', '', 16, '2013-04-30 14:53:48', '2013-04-28 12:14:19'),
(543965414, 'TY Chan', '', 'TY Chan', '', 'fb', NULL, NULL, NULL, NULL, 0, NULL, '0000-00-00 00:00:00'),
(1075517295, 'Jiwei Li', '', 'Jiwei Li', '', 'fb', NULL, NULL, NULL, NULL, 0, NULL, '0000-00-00 00:00:00'),
(100002908727345, 'Jason Zhao', '', 'Jason Zhao', '', 'fb', NULL, NULL, NULL, NULL, 0, NULL, '0000-00-00 00:00:00'),
(100005304788226, 'Qian Wang', '', 'Qian Wang', '', 'fb', NULL, NULL, NULL, NULL, 0, NULL, '0000-00-00 00:00:00'),
(100005772643736, 'Sun', 'Zhibin', 'sunzhibin', '4428c6c474502e61151877825bb41961', 'member', 'doo@163.com', 'http://', '', '', 1, '2013-05-07 15:46:26', '2013-05-07 15:46:09'),
(100005772643737, 'Sun', 'Zhida', 'ab2345678', '25d55ad283aa400af464c76d713c07ad', 'member', 'sunzhida@gmail.com', 'http://', '', '', 0, NULL, '2013-05-07 19:14:26'),
(100005772643738, 'Suen', 'Guouo', 'test23456', '25d55ad283aa400af464c76d713c07ad', 'member', 'sun@gmail.com', 'http://', '', '', 0, NULL, '2013-05-07 19:31:12'),
(100005772643739, 'Sun', 'Zhida', 'test1234', '25d55ad283aa400af464c76d713c07ad', 'member', 'sun@gmail.com', 'http://', '', '', 1, '2013-05-07 20:00:03', '2013-05-07 19:59:28'),
(100005772643740, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'member', '', 'http://', '', '', 0, NULL, '2013-05-14 20:21:17'),
(100005772643741, '', '', 'ljw30879785ssas', '568b3eb6ae08b4ff9b6ab192f1b3ec74', 'member', '', 'http://', '', '', 0, NULL, '2013-05-14 20:22:25'),
(100005772643742, '', '', 'fjahs', 'd41d8cd98f00b204e9800998ecf8427e', 'member', '', 'http://', '', '', 0, NULL, '2013-05-14 20:22:58'),
(100005772643743, 'Asdasd', 'Asd', 'asdasdas', 'a8f5f167f44f4964e6c998dee827110c', 'member', 'asdasd', 'http://', '', 'adasd', 0, NULL, '2013-05-14 20:23:59'),
(100005772643744, 'Test', 'Test', 'ljw308797855', 'd1d7313ed23e64b52318044fede26593', 'member', 'cx@tes.com', 'http://', '', 'tesasdsadad', 3, '2013-05-14 20:49:55', '2013-05-14 20:30:52'),
(100005772643745, 'Test', 'Test', 'ljw308755', 'd1d7313ed23e64b52318044fede26593', 'member', 'sun@gmail.com', 'http://', '', 'asdasd', 0, NULL, '2013-05-14 20:35:38'),
(100005772643746, 'Tetete', 'Asdas', 'ljw308797', 'd1d7313ed23e64b52318044fede26593', 'member', 'cx@tes.com', 'http://', '', 'adasd', 0, NULL, '2013-05-14 20:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `m_category`
--

CREATE TABLE IF NOT EXISTS `m_category` (
  `CID` int(11) NOT NULL,
  `cname` text NOT NULL,
  PRIMARY KEY (`CID`),
  UNIQUE KEY `ID` (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_category`
--

INSERT INTO `m_category` (`CID`, `cname`) VALUES
(0, 'Others'),
(1, 'Food'),
(2, 'Electronics'),
(3, 'Clothes'),
(4, 'Travelling');

-- --------------------------------------------------------

--
-- Table structure for table `m_comments`
--

CREATE TABLE IF NOT EXISTS `m_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) NOT NULL,
  `comment_author_email` varchar(100) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_flickr` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`comment_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `m_comments`
--

INSERT INTO `m_comments` (`comment_ID`, `comment_post`, `user_id`, `comment_author_email`, `comment_date`, `comment_content`, `comment_flickr`) VALUES
(83, 432, 5, '', '2013-05-07 17:36:38', 'Thanks for sharing.', ''),
(84, 431, 5, '', '2013-05-07 17:37:25', 'è¿™ä¹ˆå¥½å—ï¼Ÿ', ''),
(85, 432, 100005304788226, '', '2013-05-07 17:37:57', 'I will join it!', ''),
(86, 432, 1075517295, '', '2013-05-07 17:38:14', 'I share this post with my Facebook friends now.', ''),
(87, 431, 100005304788226, '', '2013-05-07 17:38:27', 'å“‡~~', ''),
(88, 428, 1075517295, '', '2013-05-07 17:38:38', 'åˆšåˆšåŠžç†äº†ä¸€å¼ å¡ä¹Ÿ', ''),
(89, 427, 1075517295, '', '2013-05-07 17:38:53', 'å±…ç„¶æœ‰è¿™ä¹ˆä¾¿å®œçš„ç¡¬ç›˜ã€‚è°¢è°¢åˆ†äº«ã€‚', ''),
(90, 428, 100005304788226, '', '2013-05-07 17:38:59', 'Seems delicious!', ''),
(91, 432, 100005304788226, '', '2013-05-07 17:39:55', 'Share this information with your friends!', ''),
(92, 436, 5, '', '2013-05-07 19:25:26', '', ''),
(93, 424, 19, '', '2013-05-07 20:03:08', 'Good', ''),
(94, 432, 100005304788226, '', '2013-05-07 20:06:58', 'gggg', ''),
(95, 440, 1075517295, '', '2013-05-09 14:09:55', 'Like this.', ''),
(96, 447, 19, '', '2013-05-11 19:36:13', '.....................', ''),
(97, 448, 19, '', '2013-05-11 20:11:02', 'nice to see', ''),
(98, 448, 19, '', '2013-05-11 20:32:42', 'asdfadf\n', ''),
(99, 448, 19, '', '2013-05-11 20:32:42', 'asdfadf\n', ''),
(105, 440, 1075517295, '', '2013-05-13 11:30:18', 'Test', ''),
(106, 440, 1075517295, '', '2013-05-13 11:30:41', '', 'http://farm9.staticflickr.com/8262/8666657283_ec2c7738f6_m.jpg'),
(107, 451, 1075517295, '', '2013-05-13 12:54:18', 'Nice.', ''),
(108, 438, 19, '', '2013-05-14 01:35:30', '', ''),
(114, 427, 19, '', '2013-05-14 02:52:34', 'Thx\n', ''),
(115, 495, 19, '', '2013-05-14 02:55:41', 'nonhuman\n\n', ''),
(119, 495, 5, '', '2013-05-14 13:25:31', 'å®‰å¾½çš„å¾ˆå¤šå¾ˆå¤š', ''),
(120, 578, 5, '', '2013-05-14 13:34:09', 'nice. comment from phone', ''),
(125, 578, 19, '', '2013-05-14 13:36:12', 'Tasty ', ''),
(128, 578, 1075517295, '', '2013-05-14 13:44:42', 'Good.', ''),
(130, 582, 5, '', '2013-05-14 15:12:33', 'good', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_posts`
--

CREATE TABLE IF NOT EXISTS `m_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL DEFAULT '0',
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `post_flickrimg` int(2) DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `ID_2` (`ID`),
  UNIQUE KEY `ID_3` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=583 ;

--
-- Dumping data for table `m_posts`
--

INSERT INTO `m_posts` (`ID`, `category`, `post_author`, `post_date`, `post_content`, `post_title`, `post_image`, `post_flickrimg`) VALUES
(20, 0, 1075517295, '2013-05-04 01:14:41', 'Director / Artists:	DAVID O RUSSELL: BRADLEY COOPER/JENNIFER LAWRENCE<br>\nNumber of Discs:	1<br>\nAudio Format:	Dolby Digital 5.1<br>\nAspect Ratio:	16:9<br>\nVideo Format:	NTSC<br>\nDVD Region:	3<br>\nLanguages:	English<br>\nSubtitles:	English, Traditional Chinese<br>\nRating:	IIB<br>\nRunning Time:	122 minutes<br><br>\n\nPat Solatano (Bradley Cooper) has lost everything - his house, his job, and his wife. He now finds himself living back with his mother (Jacki Weaver) and father (Robert De Niro) after spending 8 months in a state institution on a plea bargain. Pat is determined to rebuild his life, remain positive and reunite with his wife, despite the challenging circumstances of their separation. All Pat''s parents want is for him to get back on his feet - and to share their family''s obsession with their favorite Philadelphia football team. When Pat meets Tiffany (Jennifer Lawrence), a mysterious girl with problems of her own, things get complicated. Tiffany offers to help Pat reconnect with his wife, but only if he''ll do something very important for her in return. As their deal plays out, an unexpected bond begins to form between them, and silver linings appear in both of their lives.\n<br><br>\n<iframe width="420" height="236.25" src="https://www.youtube.com/embed/p-KgdSWqUQo" frameborder="0" allowfullscreen=""></iframe><br><br>\n<a href="http://www.hmv.com.hk/product/dvd.asp?sku=808513">http://www.hmv.com.hk/product/dvd.asp?sku=808513</a>', 'SILVER LININGS PLAYBOOK å¤±æˆ€ è‡ªä½œæ¥­ HK$119.00', 'others/808513.jpg', 0),
(222, 0, 18, '2013-04-28 20:51:12', 'Now, we should allow the users who login with facebook account to post discount information~', 'Facebook Like Button', 'æœªå‘½å.jpg', 0),
(223, 0, 18, '2013-04-25 14:24:51', 'Click on the Title of one post, you will come to a new page which shows only the post you choosed. You can use the Like Button to share this discount information to your facebook page~ ', 'Link to a New Page~', 'like1.jpg', 0),
(291, 0, 543965414, '2013-04-29 17:39:52', '<a href="http://store.steampowered.com/sale/rockstarpublisherweekend_lanoire">[url]http://store.steampowered.com/sale/rockstarpublisherweekend_lanoire[/url]</a>', 'PC game GTA 75% off on steam!!! ', '1279847204999.jpg', 0),
(296, 0, 543965414, '2013-04-29 20:58:58', 'æ»…ç«æ»…äººå…©ç”¨!\nèžè¥¿è¨­è¨ˆç¶“å…¸ä¹‹ä½œ!!', 'æ»…äººå™¨ 85æŠ˜!!!', '1160829879565.jpg', 0),
(298, 0, 543965414, '2013-04-29 21:08:40', 'May the force with you, $USD 50', 'Jedi è¬ç”¨åˆ€', '1204880705728.jpg', 0),
(300, 0, 543965414, '2013-04-29 21:20:42', '$5 per roll', 'å¼·è€Œæœ‰åŠ›å»ç´™', '1291547006946.jpg', 0),
(305, 0, 543965414, '2013-04-29 21:34:15', 'æ­¦æž—çµ•å­¸å¥—è£\n120000 èµ·, æŽƒåœ°åƒ§æ´½', 'æ­¦æž—çµ•å­¸å¥—è£', '999.jpg', 0),
(306, 4, 543965414, '2013-04-29 21:35:01', 'æ±Ÿå—äº”å¤©éŠ\n$1200èµ·, æ±Ÿå—æ—…è¡Œç¤¾\né›»: 369 1999 2999', 'æ±Ÿå—äº”å¤©éŠ', 'http://farm9.staticflickr.com/8118/8648037728_87e6c97aa2_m.jpg', 1),
(310, 0, 543965414, '2013-04-29 22:01:49', 'Logic:\neach post can only have a file uploaded or a flickr image.\n\nmodified:\nshowPost.php\ncreatePost.php\njs/submitPost.js\n\nChange only can see @ index_terencecoding.php\n\nwhat to do next:\n1) enable flickr image show inside each post\n2) modify all, food, clothes,.. for the change\n3) Amend flickr function to able search my flickr account image or public flickr image\n4) when user choose upload file, disable flickr\n\n', 'Terence Change log#1', '', 0),
(312, 2, 12, '2013-05-02 16:42:49', 'Move fast, or Xiaomi will be sold out soon. Please go to <a href="http://www.xiaomi.hk/">xiaomi.hk</a> for further information.', '$2,499 buys you a Quad-core smartphone - Xiaomi', '153347_595273_0.jpg', 0),
(321, 3, 543965414, '2013-04-30 16:49:25', 'sale2222', 'text clothes', 'T1tBXPXq4gXXaCwpjX.png', 0),
(323, 1, 12, '2013-05-02 16:49:56', 'é¦™æ¸¯äººå°è‡ªåŠ©é¤æƒ…æœ‰ç¨é¾ï¼Œçš†å› ä¸€æ¬¡éŽå¯å“å˜—å¤šæ¬¾ä¸åŒåœ‹å®¶çš„ç¾Žé£Ÿï¼Œæ»¿è¶³å£è…¹ä¹‹æ¬²åŠè¦–è¦ºæ„Ÿå—ã€‚ä½†ä¸€èˆ¬çš„é…’åº—è‡ªåŠ©é¤å‹•è¼’å››ã€äº”ç™¾å…ƒï¼Œä»Šæ—¥ Groupon ç‚ºä½ å¸¶ä¾†æ›´æŠµé£Ÿä¹‹é¸ã€‚\n\né¦™æ¸¯éŠ…é‘¼ç£åˆ©æ™¯é…’åº—ä½è™•é¦™æ¸¯å³¶å¿ƒè‡Ÿåœ°å¸¶ - ç¹è¯çš„éŠ…é‘¼ç£åŠç£ä»”ä¹‹é–“ï¼Œæ¯—é„°é¦™æ¸¯ä¸»è¦å•†æ¥­å€åŸŸåŠè³¼ç‰©å¨›æ¨‚ä¸­å¿ƒï¼›æ­¥è¡Œå¾€è¿”æ™‚ä»£å»£å ´ã€éŠ…é‘¼ç£åœ°éµç«™åŠé¦™æ¸¯æœƒè­°å±•è¦½ä¸­å¿ƒåªæ¶ˆæ•¸åˆ†é˜ã€‚é€¸äº­é¤å»³è–ˆèšå„åœ‹ç²¾é¸ç¾Žé£Ÿï¼Œèª æ„ç‚ºä½ é å‚™äº†å…¨åŸŽç†±çˆ†çš„ä½³é¤šç¾Žé¥Œï¼ŒåŒ…æ‹¬ï¼šæ–°é®®é­šç”Ÿã€æ™‚ä»¤æµ·é®®å‡ç›¤ã€è‡ªå®¶è£½è–„é¤…ã€ç³–é†‹æŽ’éª¨ã€æµ·å—é›žé£¯ã€å–‡æ²™ã€å°åº¦å’–å–±ç­‰å¤šæ¬¾åœ°é“äºžæ´²ç¾Žå‘³ã€‚ç²¾ç·»ç”œå“å¦‚èŠå£«é¤…ã€æ¯”åˆ©æ™‚æœ±å¤åŠ›è›‹ç³•åŠç†±è¾£è¾£ç­æˆŸæ›´æ˜¯ç„¡æ³•æŠ—æ‹’ã€‚\n\nè¿™é‡Œæœ‰æ›´å¤šæ¶ˆæ¯ï¼š<a href="http://www.groupon.hk/deals/hongkong/Dinner-Buffet/716949652">http://www.groupon.hk/deals/hongkong/Dinner-Buffet/716949652</a>', 'å°åŸŽå¤§é¤ â”€â”€ $208 èµ·éŠ…é‘¼ç£åˆ©æ™¯é…’åº—é€¸äº­é¤å»³ 3 å°æ™‚è‡ªåŠ©æ™šé¤ (åƒ¹å€¼é«˜é” $338) è¶…éŽ 120 æ¬¾ç¾Žé£ŸåŒ…æ‹¬å„å¼é­šç”Ÿå£½å¸ã€é•·è…³èŸ¹ã€è—é’å£ã€éµè‚å·ã€ç‡’ä¹³è±¬ã€ç„—è ”ã€DREYERâ€™S é›ªç³•ç­‰', '1367219189650.jpg', 0),
(325, 2, 12, '2013-05-02 17:17:19', 'åªè¦26RMB\n<br>\nè¯·çŒ›å‡»<a href="http://ju.taobao.com/tg/home.htm?spm=0.0.0.0.Hd00vH&id=18109463633">è¿™é‡Œ</a>.', '[åŒ…é‚®][æ¸¯å°å°ˆå”®]æ¡çº¹æŽ§çˆ±å¿ƒå¹³æ¿ç”µè„‘ä¿æŠ¤å¥— ç®€çº¦ipad2ipad3è‹¹æžœå¹³æ¿ç”µè„‘è¢‹å­ï¼ˆæ¯ä¸ªIDé™è´­1ä»¶ï¼‰', 'T18qGgXtVcXXb1upjX.jpg_460x460.jpg', 0),
(375, 0, 543965414, '2013-05-01 19:12:15', 'index.php\n->top left corner "Quick Search"\n->*Autocomplete*\n->now just get the category type for demo. (e.g. input foo\n\nFlickr upload and gallery\n->next to Search button on top right corner\n->Gallery can enlarge photo\n\nComment post flickr\n->Comment can now search, select and post flickr image\n\nAll Flickr image mentioned is my account image.\nonly blank search, or search following term can have result:\ne.g. river, tree, island', 'Terence update log#2', '', 0),
(389, 1, 12, '2013-05-02 19:47:10', 'çš®è›‹èŠ«èŒœï¼Ÿå››å·éº»è¾£ï¼Ÿé‚„æ˜¯æ²™å—²æ¸…æ¹¯ï¼Ÿæˆ‘çš„å¤©ï¼Œå¯å¦å¤šä¸€é»žæ–°æ„ï¼Ÿè‹¥æžœä½ ä¸€æ¨£å°å‚³çµ±æ¹¯åº•åŽ­å€¦ï¼Œä½†åˆæƒ³ç¹¼çºŒäº«å—çƒšä¸‹çƒšä¸‹çš„æ»‹å‘³ï¼Œå°±è¦è²·ä¸‹ä»Šæ—¥ Groupon å¸¶ä¾†çš„å°ç£ä¸€å“èŠ±é›•é›žè±ªè¯æ™šé¤ï¼Œå…¶æƒ¹å‘³ç„¡æ¯”çš„ç§˜è£½é†¬æ±ï¼ŒåŒ…ä½ ä¸€è©¦ä¸Šç™®ã€‚\n\nå°ç£ä¸€å“èŠ±é›•é›žæ˜¯å°ç£è‘—åäººæ°£é£Ÿåº—ï¼Œåœ¨ç•¶åœ°é–‹æ¥­ 10 å¹´ï¼Œå·²æœ‰ 3 é–“åˆ†åº—ã€‚æœ€è¿‘ï¼Œå‰µè¾¦äººå°±å°‡ç¾Žå‘³çš„ä¸€å“èŠ±é›•é›žé‹å¸¶ä¾†é¦™æ¸¯ï¼Œæ–¼éŠ…é‘¼ç£é–‹è¨­äº†ç¬¬ä¸€é–“æµ·å¤–åˆ†åº—ï¼Œæ—‹å³äººæ°£çˆ†ç‡ˆï¼Œä¸ä½†å¼•ä¾†å‚³åª’çˆ­ç›¸å ±é“ï¼Œæ›´æˆç‚ºæœ€å—æ³¨ç›®çš„å°ç£é›žé‹å°ˆé–€åº—ã€‚ä¸€å“èŠ±é›•é›žé‹æ˜¯å°ç£ä¸€å“èŠ±é›•é›žçš„æ‹›ç‰Œåèœï¼ŒæŽ¡ç”¨æ–°é®®æœ¬åœ°é›žï¼ŒåŠ ä¸Šä¾†è‡ªå°ç£çš„ç§˜è£½é†¬æ±ã€è”¥ã€è’œã€æŒ‡å¤©æ¤’ä¹¾åŠèŠ±é›•çƒ¹ç…®ï¼Œæˆç‚ºé…’é¦™åè¶³ï¼Œå…¼æ¥µåº¦æƒ¹å‘³çš„ä¸€å“èŠ±é›•é›žé‹ï¼Œæ¯æž±é£Ÿå®¢éƒ½æŒ‡å®šè¦é»žçš„æ»‹å‘³ä½³é¤šã€‚\n<br>\n<a href="http://www.groupon.hk/deals/hongkong/Taiwan-Yiping-Huadiao-Chicken/716959906">http://www.groupon.hk/deals/hongkong/Taiwan-Yiping-Huadiao-Chicken/716959906<a>', 'å°ç£ä¸€å“é§•åˆ° â”€â”€ $388 äºŒäººå°ç£ä¸€å“èŠ±é›•é›žè±ªè¯æ™šé¤ï¼Œ$688 å››äººï¼Œ$988 å…­äºº (åƒ¹å€¼é«˜é” $1598) äº«ç”¨æ‹›ç‰Œä¸€å“èŠ±é›•é›žé‹ã€ç‰¹ç´šæµ·é®®ç›¤ã€æ¾³æ´² M10 ç‰›é ¸è„Šç­‰ï¼ŒåŒ…åŠ ä¸€', '1367315719305.jpg', 0),
(390, 4, 12, '2013-05-02 19:48:41', '1 å¼µé¦™æ¸¯èˆªç©ºä¾†å›žé¦™æ¸¯è‡³å°åŒ—ç¶“æ¿Ÿå®¢ä½æ©Ÿç¥¨ (HX)<br>\n3 æ™šå°åŒ—çš‡å®¶å­£ç¯€é…’åº—ä½å®¿ (æ¨™æº–å¤§åºŠé›™äººæˆ¿ï¼šä½”åŠæˆ¿)<br>\næ¯æ—¥é…’åº—æ—©é¤<br>\n0.15% é¦™æ¸¯æ—…éŠæ¥­è­°æœƒå°èŠ±ç¨…<br><br>\n \nèˆªç­æ™‚é–“ï¸°(åƒ…ä¾›åƒè€ƒ)<br>\né¦™æ¸¯ / å°åŒ— HX252 9:35am / 11:25am<br>\nå°åŒ— / é¦™æ¸¯ HX283 8:30pm / 10:15pm<br>\n\n<a href="http://www.groupon.hk/deals/_getaways/4D3N-Taipei/716955478">http://www.groupon.hk/deals/_getaways/4D3N-Taipei/716955478</a>', 'ç‰¹åƒ¹éŠå°åŒ— â”€â”€ $1680 å®‰é‹æ—…éŠå°åŒ— 4 å¤©æ—…éŠå¥—ç¥¨ (åƒ¹å€¼ $2959) å…¥ä½å¸‚ä¸­å¿ƒçš‡å®¶å­£ç¯€é…’åº—ï¼Œé€£ä¾†å›žæ©Ÿç¥¨åŠæ¯æ—¥æ—©é¤', '1367297484427.jpg', 0),
(391, 3, 12, '2013-05-02 19:57:45', 'å®è´åç§°ï¼šå¿ƒå¿ƒç›¸å°æ‚ç‰©è¢‹<br>\nå®è´å°ºå¯¸ï¼šæ‹‰é“¾å¤„å®½çº¦14cmï¼Œåº•å®½çº¦10cmï¼Œé«˜çº¦10cmï¼Œæ‰‹å¸¦é•¿çº¦14cm<br>\nå®è´æè´¨ï¼šè¢‹èº«é¢æ–™é‡‡ç”¨å…¨æ£‰æŸ“è‰²å¸†å¸ƒï¼Œé‡Œå¸ƒé‡‡ç”¨æ¶¤æ£‰<br>\nå®è´è¯´æ˜Žï¼šé€ åž‹ç®€çº¦ï¼Œä¿çš®å¯çˆ±ã€‚é€‚ç”¨æ‰€æœ‰äººç¾¤~~æ•£æ­¥è´­ç‰©å¿…å¤‡å•Šï¼<br>\nè¢‹å­å¯æ”¾ç½®4å¯¸åŠä»¥ä¸‹å±å¹•å¤§å°çš„æ‰‹æœºï¼ˆæµ‹è¯•ç”¨IPhone,I9000å¸¦è–„å¤–å£³çš„ï¼›å…¶ä»–æ‰‹æœºè¦è‡ªå·±å¯¹æ¯”ä¸‹æ‰‹æœºå¤§å°å’Œæˆ‘ä»¬çš„è¢‹å­å¤§å°å“¦ï¼Œ<br>\næ¯•ç«Ÿå’±æ²¡æœ‰é‚£ä¹ˆå¤šæ‰‹æœºå®žæµ‹^ ^ï¼‰ï¼Œè¿˜å¯ä»¥æ”¾ä¸€äº›é›¶é’±å•Šï¼Œé’¥åŒ™å•Šï¼Œè¿˜é…æœ‰æ‰‹å¸¦ï¼Œæºå¸¦ä¹Ÿå¾ˆæ–¹ä¾¿çš„~~<br>\næ¸…æ´—è¯´æ˜Žï¼šè¢‹èº«é‡‡ç”¨ä¼˜è´¨é¢æ–™ï¼Œä¸Žä¸€èˆ¬å¸ƒæ–™ç›¸ä¼¼çš„æ¸…æ´—å³å¯ã€‚<br>\nï¼ˆPSï¼šå’Œå…¶ä»–å¸ƒæ–™ä¸€æ ·ï¼Œæµ…è‰²çš„åŸºæœ¬ä¸ä¼šæŽ‰è‰²ï¼Œæ·±è‰²çš„æ¸…æ´—æ—¶å¯èƒ½ä¼šæœ‰äº›è®¸æŽ‰è‰²ï¼Œæ²¡æœ‰å¾ˆå¤§å½±å“çš„å“¦ï¼‰<br>\n åƒäººå¥½è¯„ï¼ï¼ä½ è¿˜éœ€è¦çŠ¹è±«å—ï¼Ÿ<br>\n\n<a href="http://ju.taobao.com/tg/home.htm?spm=0.0.0.0.rusy2h&id=12592769649">http://ju.taobao.com/tg/home.htm?spm=0.0.0.0.rusy2h&id=12592769649</a>', '[åŒ…é‚®][æ¸¯å°å°ˆå”®]å¿ƒå¿ƒç›¸å°æ‚ç‰©è¢‹ è¿·ä½ å¸†å¸ƒåŒ… æ¸…æ–°ç”œç¾Žæ·‘å¥³é£Žå¸ƒè‰ºæ‚ç‰©å°åŒ…ï¼ˆæ¯ä¸ªIDé™è´­3ä»¶ï¼‰', '2.jpg', 0),
(393, 2, 12, '2013-05-02 19:59:37', 'ä½œæ¥­ç³»çµ±:	Android 4.1<br>\nåˆ¶å¼:	4G å››é »<br>\né¡¯ç¤ºå±:	5.5å‹<br>\næ•¸ç¢¼é¡é ­:	800è¬åƒç´ <br>\né€šè¨Š:	WiFi/GPS/HSDPA/è—ç‰™3.0/FM<br>\næ“´å±•:	32GB MicroSD<br>\né‡é‡:	180g<br>\né«”ç©:	151.1 x 80.5 x 9.4 mm<br><br>\n\n(ä»¥ä¸Šç”¢å“è³‡æ–™åŠåƒ¹æ ¼åƒ…ä¾›åƒè€ƒ)<br>\n<a href="http://www.price.com.hk/product.php?p=144362">http://www.price.com.hk/product.php?p=144362</a>', 'Samsung GALAXY Note II 16GB ', '3.jpg', 0),
(394, 1, 12, '2013-05-02 20:01:46', 'æ‹›ç‰Œèœ	å·åŒ—æ¶¼ç²‰ã€å››å·å†’èœï¼ˆéº»è¾£ç‡™ï¼‰ã€ç´…æ²¹æ°´é¤ƒã€é›žçµ²å‡‰éºµ<br>\n\nç‡Ÿæ¥­æ™‚é–“	ï¼š	æ˜ŸæœŸä¸€è‡³æ—¥:11:00-23:00<br>\nä»˜æ¬¾æ–¹å¼	ï¼š	ç¾é‡‘<br>\nå®¤å¤–åº§ä½	ï¼š	æœ‰<br><br>\n\nåœ°å€ :	 	ç´…ç£¡æ˜Žå®‰è¡—9è™Ÿåœ°ä¸‹ <br>\né›»è©± : 6242 7751<br>\né¡žåˆ¥ :	 	å·èœ (å››å·)ã€å°é£Ÿ/ç†Ÿé£Ÿåº—<br>\næ¶ˆè²» : $40ä»¥ä¸‹<br>\n\n<a href="http://www.openrice.com/restaurant/sr2.htm?shopid=111483">http://www.openrice.com/restaurant/sr2.htm?shopid=111483</a>\n', 'å°ç«¹ç°å†’èœ Hot-pot Express', '5.jpg', 0),
(395, 4, 12, '2013-05-02 20:03:37', 'å¢¾ä¸åœ‹å®¶å…¬åœ’ä½æ–¼å°ç£å—éš…ï¼Œä¸‰é¢ç’°æµ·ï¼Œè‡ªç„¶è³‡æºéžå¸¸è±å¯ŒåŠ ä»¥æ°£å€™æº«æš–ï¼Œæ™¯ç·»æ€¡äººä¸”äº¤é€šä¾¿åˆ©ï¼Œ è¿‘å¹´å·²å¸å¼•è¿‘ä¸ƒç™¾è¬éŠå®¢åˆ°æ­¤é«”é©—å¤§è‡ªç„¶ä¹‹å¥§ç¥•ï¼›å¦åœ‹ç«‹æµ·æ´‹ç”Ÿç‰©åšç‰©é¤¨ä¹‹å°ç£æ°´åŸŸé¤¨ã€çŠç‘šçŽ‹åœ‹å±•ç¤ºé¤¨ã€ä¸–ç•Œæ°´åŸŸé¤¨çš†å®Œå·¥ç‡Ÿé‹ï¼Œæµ·ç”Ÿé¤¨å·²æˆç‚ºåœ‹éš›ç´šé¦–å±ˆä¸€æŒ‡çš„æµ·æ´‹ç”Ÿç‰©åšç‰©é¤¨ï¼Œæ›´èƒ½å¸å¼•çœ¾å¤šéŠå®¢æ‚ éŠå¢¾ä¸ï¼Œè€Œä¸”å¢¾ä¸åœ‹å®¶å…¬åœ’ç¾åœ¨å·²ç¶“æ˜¯å…¨å°ç£æœ€ç†±é–€çš„è§€å…‰è–åœ°å–” ï¼<br><br>\n       è»Šæ³æ–°ã€æ•´æ½”ã€è·¯ç·šç†Ÿã€å¸æ©Ÿç´ è³ªä½³(ç…™ã€é…’ã€æª³æ¦”ä¸æ²¾)ï¼Œæœå‹™è¦ªåˆ‡ï¼æ˜¯æ‚¨é€™è¶Ÿå¢¾ä¸æ—…éŠã€è³žå¿ƒæ‚…ç›®çš„é–‹å§‹ï¼Œå°±è®“æˆ‘å€‘å¸¶æ‚¨ä¾†ä¸€è¶Ÿå……æ»¿å–œæ‚…ã€å›žæ†¶çš„æ—…ç¨‹å§!<br>\n\n       æœ¬è»ŠéšŠå‚™æœ‰TOYOTAï¼ALITSäº”äººåº§ã€NISSAN-SERENAå…«äººåº§ä¼‘æ—…è»Šã€ç¦æ–¯T4ã€ç¦æ–¯T5ä¼‘æ—…è»Šç­‰å¤šè¼›ç‹€æ³æ–°è»Šï¼›æ–¼é«˜é›„æŽ¥éŠå®¢å‡ºç™¼è‡³å¢¾ä¸ï¼›åœ¨å¢¾ä¸åœ‹å®¶å…¬åœ’ç¯„åœå…§ï¼Œå„æ™¯é»žè² è²¬æŽ¥é§ï¼›ä»£è¾¦æµ·ä¸ŠéŠæ¨‚ä¸‰åˆä¸€ã€å››åˆä¸€(æµ®æ½›ã€é¦™è•‰èˆ¹ã€å¿«è‰‡ã€æ°´ä¸Šæ‘©æ‰˜è»Š)ï¼Œæœ‰å„ç¨®æµ·é™¸éŠæ¨‚å„ªæƒ ç¥¨åˆ¸å–”ï¼ä¸¦æä¾›è¡Œç¨‹å®‰æŽ’ã€å’¨è©¢ï¼Œæ—…éŠè³‡è¨Šã€ä½å®¿è³‡è¨Šã€ç¾Žé£ŸçŽ©æ¨‚ç­‰è³‡è¨Šï¼›å…é™¤æ‚¨å„æ™¯é»žï¼äº¤é€šæŽ¥é§ã€è·¯ç·šä¸ç†Ÿã€é–‹è»Šç–²ç´¯ã€ç§Ÿè»Šã€æ„›è»Šæ‰¿æ“”é¢¨éšªä¹‹æ†‚ï¼›è®“æ‚¨èƒ½è‡ªç”±è‡ªåœ¨ç›¡æƒ…æš¢éŠï¼Œ å¢žåŠ æ—…éŠæ™‚é–“ï¼Œå¤§å¤§æå‡æ—…éŠå“è³ªï¼›äº«å—é›£å¾—çš„ä¸€è¶Ÿâ€œæ‚ éŠå¢¾ä¸å‡æœŸ"ï¼Œè¡Œç¨‹çµæŸè¼‰å›žåˆ°é«˜é›„æ­¢ã€‚<br>\n\n<a href="http://www.sttf.idv.tw/">http://www.sttf.idv.tw/</a>', 'å—å°ç£å¢¾ä¸æ—…éŠç¶² ', '6.gif', 0),
(396, 2, 543965414, '2013-05-02 20:14:22', '<a href="http://www.amazon.com/SanDisk-MicroSDXC-Memory-Adapter-SDSDQU-064G-AFFP-/dp/B009QZH6JS/ref=sr_1_1?s=electronics&ie=UTF8&qid=1367496729&sr=1-1&keywords=todays+deals"/>http://www.amazon.com/SanDisk-MicroSDXC-Memory-Adapter-SDSDQU-064G-AFFP-/dp/B009QZH6JS/ref=sr_1_1?s=electronics&ie=UTF8&qid=1367496729&sr=1-1&keywords=todays+deals</a>', 'Amazon SanDisk Ultra 64 GB MicroSDXC Class $53.46 & FREE Shipping', 'Clipboard03.gif', 0),
(397, 3, 543965414, '2013-05-02 20:17:35', '<a href="http://item.taobao.com/item.htm?spm=a230r.1.10.62.t2vGkr&id=23560108571" />http://item.taobao.com/item.htm?spm=a230r.1.10.62.t2vGkr&id=23560108571</a>', 'æ·˜å® 2013æ­£å“ä¸ƒåŒ¹ç‹¼ç”·è£… ç”·å£«ä¼‘é—²çº¯æ£‰tæ¤é™æ—¶ç‰¹ä»·', 'Clipboard02cloth.gif', 0),
(398, 2, 543965414, '2013-05-02 20:21:49', 'New release, in Stock, fast free shipping! Max 5 Per \n\n<a href="http://www.ebay.com/itm/New-Samsung-I9500-Galaxy-S4-S-4-S-III-Unlocked-GSM-in-Black-or-White/130895748514?pt=LH_DefaultDomain_0&hash=item1e79fe9da2"/>http://www.ebay.com/itm/New-Samsung-I9500-Galaxy-S4-S-4-S-III-Unlocked-GSM-in-Black-or-White/130895748514?pt=LH_DefaultDomain_0&hash=item1e79fe9da2</a>', 'ebay Samsung Galaxy S4 Unlocked GSM in Black or White', 's4.gif', 0),
(399, 2, 543965414, '2013-05-02 20:29:10', 'å¯é¸è³¼ å»¶é•·ä¸€å¹´ä¿ä¿®Â¥39.57ï¼›é€²æ°´æ‘”å£žä¿ä¿®Â¥71.96 \næ­£å“ä¿ƒé”€ Â¥1699.00 \n<a herf="http://item.taobao.com/item.htm?spm=a230r.1.10.27.Lms85c&id=22225444913">http://item.taobao.com/item.htm?spm=a230r.1.10.27.Lms85c&id=22225444913</a>', 'æ·˜å® Asus/åŽç¡• Eee Pad MeMo171ç”µè¯å¹³æ¿ç”µè„‘GPSå¯¼èˆªåŒæ ¸1.2é™æ—¶åŒ…é‚®', 'Clipboard04asus.gif', 0),
(402, 0, 1075517295, '2013-05-02 21:00:21', 'å–®èº«å¥³å­æ–‡ä½³ä½³å¸¶è‘—ä¸€å€‹æµªæ¼«çš„å¤¢å’Œè‚šè£¡çš„å­©å­ï¼Œéš»èº«å‰å¾€è¥¿é›…åœ–ã€‚å¥¹å°æ­¤åœ°ä¸€ç„¡æ‰€çŸ¥ï¼ŒåªçŸ¥é“ï¼šæƒ…äººè€é˜çµ¦äº†å¥¹ç„¡ä¸Šé™çš„ä¿¡ç”¨å¡ã€é›»å½±ã€Šç·£ä»½çš„å¤©ç©ºã€‹ã€ä»¥åŠå­©å­çš„ç¾Žåœ‹åœ‹ç±ã€‚é¤Šå°Šè™•å„ªçš„å¥¹è¢«å®‰æŽ’åˆ°ç§äººåæœˆä¸­å¿ƒå¾…ç”¢ï¼Œå»é¦¬ä¸Šèˆ‡å…¶ä»–å­•å©¦é¬¥å¾—å‹¢æˆæ°´ç«ï¼Œå°±é€£æœå‹™å¥¹çš„å¸æ©ŸFrankï¼Œä¹Ÿçœ‹å¥¹ä¸é †çœ¼ã€‚ç„¶è€Œï¼Œè€é˜ä¸€æ¬¡åˆä¸€æ¬¡çš„é£Ÿè¨€å’Œå¤±ç´„ï¼Œäººç”Ÿè·¯ä¸ç†Ÿçš„æ–‡ä½³ä½³åªèƒ½ä¾é å¥¹æœ€çœ‹ä¸èµ·çš„Frankã€‚æ…¢æ…¢åœ°ï¼Œå¥¹æ‰ç™¼ç¾â€¦é€™å€‹ç”·äººçŠ§ç‰²è‡ªå·±çš„äº‹æ¥­ï¼Œåˆ°ç¾Žåœ‹ç…§é¡§å¥³å…’Julieé€™å€‹ç”·äººé¡§æ…®å¥³å…’æ„Ÿå—ï¼Œéš±çžžé›¢å©šçš„ç§˜å¯†é€™å€‹ç”·äººæ›´ä»£æ›¿è€é¾ï¼Œå®Œæˆå­©å­çˆ¸è©²åšçš„æœ¬ä»½â€¦<br>\n<a href="http://wmoov.com/movie/details/19856">http://wmoov.com/movie/details/19856</a>\n\n', 'åŒ—äº¬é‡ä¸Šè¥¿é›…åœ– (Finding Mr. Right)', '1.jpg', 0),
(403, 1, 1075517295, '2013-05-03 11:53:33', 'Yoppi çš„ä¹³é…ªé›ªç³•é…¸å‘³è¶³å¤ ï¼Œè³ªæ„Ÿé †æ»‘ï¼Œæ›´æœ‰ä»¥ä¸‹å¤šæ¬¾ä¸åŒå£å‘³é¸æ“‡ï¼Œæ¸…æ¶¼é€é ‚ã€‚<br><br>\n\nå£å‘³æŽ¨ä»‹ï¼š<br><br>\n\nåŽŸå‘³<br>\nè—èŽ“<br>\nå£«å¤šå•¤æ¢¨<br>\nç†±æƒ…æžœ<br>\næ°´èœœæ¡ƒ<br>\nçŸ³æ¦´<br>\né’æª¸<br>\næœ±å¤åŠ›<br>\næ³•å¼é›²å‘¢å—±<br>\n\n<a href="http://www.groupon.hk/deals/hongkong/Yoppi-Frozen-Yogurt/716963846">http://www.groupon.hk/deals/hongkong/Yoppi-Frozen-Yogurt/716963846</a>', ' å¤æ—¥é€å¿ƒæ¶¼ â”€â”€ $19 æ›è³¼ $40 Yoppi Frozen Yogurt ç¾é‡‘åˆ¸ï¼Œç²çŽç¾Žåœ‹å¥åº·ä¹³é…ªé›ªç³•ï¼Œå¤šæ¬¾å‘³é“åŠé…æ–™ä»»é¸ï¼ŒåŠå¹´æœ‰æ•ˆæœŸï¼Œ9 é–“åˆ†åº—é©ç”¨', '1366379507366.jpg', 0),
(405, 2, 1075517295, '2013-05-03 13:38:25', 'SAMSUNG GALAXY Note 8.0 LTEï¼ˆN5120ï¼‰è¦æ ¼ï¼š<br><br>\n\nè™•ç†å™¨é€Ÿåº¦ï¼š1.6GHzï¼Œå››æ ¸å¿ƒè™•ç†å™¨<br>\nä½œæ¥­å¹³å°ï¼šAndroid v4.1.2 ï¼ˆJelly Beanï¼‰<br>\nè¨˜æ†¶é«”ï¼šå…§ç½®16GBï¼Œ2GB RAMï¼Œæ”¯æ´é«˜é”64GB microSDHCè¨˜æ†¶å¡<br>\né‡é‡ï¼š340g ï¼ˆé€£é›»æ± ï¼‰<br>\nèž¢å¹•ï¼š8å‹ 1670è¬è‰² PLS å…¨è¼•è§¸å¼å±å¹•(1280 x 800åƒç´ )<br><br>\n\nåˆ¶å¼ï¼šLTE ï¼ˆ800/900/1800/2600MHzï¼‰/UMTSï¼ˆ850/900/1900/2100MHzï¼‰/GSM ï¼ˆ850/900/1800/1900MHzï¼‰<br>\né€£æŽ¥ï¼šAllShare Playã€All Share Castã€Mobile APæµå‹•å­˜å–é»žã€GPSã€Wi-Fiã€è—ç‰™v4.0ã€USB 2.0<br><br>\n\næ•¸æ“šå‚³è¼¸ï¼šLTE 100Mbps / HSDPA+ 42Mbps / HSUPA 5.76Mbps / 3G / EDGE / GPRS<br><br>\n\nå½±ç‰‡æ’­æ”¾æ ¼å¼ï¼šMPEG4 / WMV / DivX / H.264 / H.263 / RMVB / ASF / 3GP<br><br>\n\néŸ³æ¨‚æ’­æ”¾æ ¼å¼ï¼šMP3 / AAC / AMR / WAV / WMA / OGG / FLAC / MIDI / XMF / IMY / M4A / 3GA / MXMF / RTTTL / RTX / OTA / OGA / AWB / RA<br><br>\n\n<a href="http://www.price.com.hk/news.php?id=1756">http://www.price.com.hk/news.php?id=1756</a>\n\n ', 'Samsung Galaxy Note 8.0 LTEçŽ‡å…ˆè©¦çŽ©', '004.jpg', 0),
(406, 2, 1075517295, '2013-05-03 13:40:46', '<a href="http://www.mingo-hmw.com/market/forum.php">http://www.mingo-hmw.com/market/forum.php</a>', 'äº¦è»’è€³æ©ŸéŸ³æ¨‚ä¸–ç•ŒäºŒæ‰‹è²·è³£ç‰¹å€', 'logo111111.png', 0),
(407, 2, 1075517295, '2013-05-03 13:58:28', 'Raspberry Pi Linux Specs<br>\nSoC Broadcom BCM2835 (CPU, GPU, DSP, and SDRAM)<br>\nCPU: 700 MHz ARM1176JZF-S core (ARM11 family)<br>\nGPU: Broadcom VideoCore IV, OpenGL ES 2.0, 1080p30 h.264/MPEG-4 AVChigh-profile decoder<br>\nMemory (SDRAM): 512 Megabytes (MiB)<br>\nVideo outputs: Composite RCA, HDMI<br>\nAudio outputs: 3.5 mm jack, HDMI<br>\nOnboard storage: SD, MMC, SDIO card slot<br>\n10/100 Ethernet RJ45 onboard network<br>\nStorage via SD/ MMC/ SDIO card slot<br>\n<a href="http://downloads.element14.com/raspberryPi3.html?isRedirect=true#threeSixty">http://downloads.element14.com/raspberryPi3.html?isRedirect=true#threeSixty</a>', 'Raspberry Pi Model B 512MB RAM (only HK$279.00)', 'sony-rasp-pi.jpg', 0),
(408, 2, 1075517295, '2013-05-03 14:00:40', '-å°ˆç‡Ÿå„é¡žç›¸æ©ŸåŠé¡é ­, æ‰€æœ‰è²¨å“å‡ç‚ºåŽŸè£å¹³è¡Œé€²å£, ä¿è­‰å…¨æ–°, æ—ºè§’åœ°éµç«™E2å‡ºå£, å¾€ä¸­åœ‹æ—…è¡Œç¤¾æ–¹å‘(æ´—è¡£è¡—), ä¸­åœ‹æ—…è¡Œç¤¾å†ä¸‹ä¸€æ¢è¡—ç‚ºé»‘å¸ƒè¡—, è¾¦å…¬æ™‚é–“æ˜ŸæœŸä¸€è‡³äº”11:00-19:30, æ˜ŸæœŸå…­11:00-15:30<br>\n<br>\n<a href="http://hk.user.auctions.yahoo.com/hk/show/auctions?userID=shoppingltd2010&u=shoppingltd2010">http://hk.user.auctions.yahoo.com/hk/show/auctions?userID=shoppingltd2010&u=shoppingltd2010</a><br><br>\n<a href="http://www.price.com.hk/starshop.php?s=836">http://www.price.com.hk/starshop.php?s=836</a>', 'SHOPPING LIMITED', 'new_fd_lens_l.jpg', 0),
(424, 0, 543965414, '2013-05-03 14:58:48', 'ç‰¹æƒ é¦™æ¸¯å°åŒ—æˆ–é«˜é›„ä¾†å›žæ©Ÿç¥¨ï¼Œç¥¨åƒ¹ä½Žè‡³æ¸¯å¹£1,300å…ƒï¼Œæ‚¨æ›´å¯é¸æ“‡ä»¥å°ä¸­ä½œå›žç¨‹åœ°é»ž*ã€‚æŽ¨å»£æœŸæœ‰é™ï¼Œè«‹å³ç¶²ä¸Šè¨‚ç¥¨ï¼\nå‡ºç™¼æ—¥æœŸï¼š2013å¹´4æœˆ2æ—¥è‡³5æœˆ15æ—¥ï¼Œ5æœˆ18æ—¥è‡³6æœˆ27æ—¥åŠ6æœˆ30æ—¥è‡³7æœˆ10æ—¥\nå„ªæƒ æœŸè‡³ï¼š2013å¹´5æœˆ31æ—¥\n\n<a href="http://www.cathaypacific.com/cpa/zh_HK/offerspromotions/offerslanding?refID=27e71f3abcc21310VgnVCM1000000ad21c39____&cm_sp=HK-_-SALES-_-SMSA-HKGTPE-02APR13">Click here.</a>', 'åœ‹æ³° ç¶²ä¸Šè¨‚ é¦™æ¸¯å°ç£ä¾†å›žæ©Ÿç¥¨ åªéœ€æ¸¯å¹£1,300å…ƒèµ·', 'http://farm9.staticflickr.com/8417/8700868419_6c290ba3b2_m.jpg', 1),
(425, 3, 543965414, '2013-05-03 15:05:47', 'UNIQLO 7åˆ†è¤²&çŸ­è¤²,ç©¿è‘—èˆ’é©,è¼•é¬†æ‰“é€ å¤æ—¥æ¸…çˆ½é€ åž‹ã€‚\nå³æ—¥è‡³5æœˆ12æ—¥ ç”·å¥³è£æŒ‡å®šè¤²æ¬¾ é™å®šåƒ¹$149\n<a href="http://www.uniqlo.com/hk/corp/pressrelease/2013/05/croppedpant2013.html">Click here.</a>', 'UNIQLO ç”·å¥³è£æŒ‡å®šè¤²æ¬¾ é™å®šåƒ¹$149', 'Cropped Pants - webposter final.jpg', 0),
(426, 4, 543965414, '2013-05-03 15:16:22', 'Registration Period\nfor 1st lucky draw: 19 March 2013 - 30 April 2013\nfor 2nd lucky draw: 19 March 2013 - 14 June 2013\n* Customers must register before departure of outbound flight <br>\n\n<a href="http://www.hk.jal.com/hkl/en/spring2013/">Click here.</a>', 'JAL Spring Campaign to win special prizes!!', 'head01.jpg', 0),
(427, 2, 543965414, '2013-05-03 15:19:38', 'Toshiba 3TB $895 \nCentralfield, HK Golden Computer Arcade, Sham Shui Po ', 'Computer Arcade News: 3TB Harddisk $900', '26170630901838787843.jpg', 0),
(428, 1, 543965414, '2013-05-03 16:48:12', 'æ†ç”Ÿä¿¡ç”¨å¡ æŒ‡å®šé¤å»³ 5æŠ˜å„ªæƒ \nå„ª æƒ  æœŸ ç‚º 2013 å¹´ 5 æœˆ 1 æ—¥ è‡³ 2013 å¹´ 6 æœˆ 30 æ—¥\n<a href="http://www.hangseng.com/cms/emkt/pmo/grp05/p06/chi/index.html">Click here.</a>', 'æ†ç”Ÿä¿¡ç”¨å¡ æŒ‡å®šé¤å»³ 5æŠ˜å„ªæƒ ', 'top.gif', 0),
(431, 2, 543965414, '2013-05-07 17:31:29', 'http://www.hkgolden.com/article/article.aspx?id=11812&catid=19', '3é¦™æ¸¯é›¶æ©Ÿåƒ¹HTC One\nå¹«è¥¯$268è¨ˆåŠƒå°±å¾—ï¼', '', 0),
(432, 4, 3, '2013-05-07 17:32:02', 'ç”¢å“åŒ…æ‹¬ï¼š  é¦™æ¸¯è‡³å°åŒ—ä¾†å›žæ©Ÿç¥¨é€£é¦™æ¸¯æ©Ÿå ´ä¿å®‰ç¨… (ç¶“æ¿Ÿå®¢ä½)\n3æ™šé…’åº—é€£çºŒä½å®¿ (æ—©é¤å®‰æŽ’éœ€è¦–ä¹Žå€‹åˆ¥é…’åº—æˆ–æˆ¿é–“ç¨®é¡žè€Œå®š)\nç”¢å“ç‰¹è‰²ï¼š  \nå””ä½¿$1400å°±å¯çŽ©è½‰å°åŒ—4å¤©ï¼Œè¶…å€¼æ¿€ç­å„ªæƒ ï¼\nå‰µæ–°çŽ©æ³•ã€Žå°ç£å°ˆç”¨è§€å…‰çš„å£«éŠã€ï¼Œ2-4äººçš†å¯æˆè¡Œï¼Œä»¥å°Šäº«åƒ¹ä»£è¨‚ç²¾å¿ƒè¦åŠƒæ—…éŠè·¯ç·šï¼Œå¸¶æ‚¨é«”é©—ç‰¹è‰²ç•¶åœ°éŠ\nè±å¯Œé™„åŠ é …ç›®ä»»æ‚¨é¸æ“‡ï¼Œå¦‚ï¼šç‰¹è‰²ä¹ä»½é‡ŽæŸ³ã€æ•…å®®ã€é™½æ˜Žå±±åŠæ·¡æ°´ä¸€æ—¥éŠç­‰\nå°Šäº«åƒ¹ä»£è¨‚ä¾†å›žå°åŒ—æ¡ƒåœ’æ©Ÿå ´è‡³å°åŒ—å¸‚é…’åº—æŽ¥æ©Ÿæœå‹™(Seat-in-coach)\néƒ¨ä»½é…’åº—å¯å³æ™‚ç¢ºèªï¼Œéœ€è¦–ä¹Žé è¨‚æ™‚é…’åº—ä¾›æ‡‰é‡ç‚ºæº–\næœ‰é—œæ–‡ä»¶æ–¼å‡ºç™¼ç•¶å¤©æ–¼é¦™æ¸¯åœ‹éš›æ©Ÿå ´é ˜å–ï¼Œé›†åˆæ™‚é–“æ˜¯æ ¹æ“šèˆªç­èµ·é£›æ™‚é–“3å°æ™‚å‰åˆ°é”èˆªç©ºå…¬å¸æ«ƒå°è¾¦ç†ç™»æ©Ÿæ‰‹çºŒ\nå¦‚è¨‚è³¼è§€å…‰éŠ:è¡Œç¨‹å¯èƒ½å› æ‡‰ç•¶åœ°æƒ…æ³(å¦‚å¤©æ°£/äº¤é€š/æ™¯é»žé–‹æ”¾æ™‚é–“)æœ‰æ‰€è®Šå‹•,æ•ä¸å¦è¡Œé€šçŸ¥,å®¢äººä¸å¾—ç•°è­°\nå¦‚è¨‚è³¼äº¤é€šæŽ¥é§:èˆªç­æ™‚é–“/æ—¥æœŸé ˆèˆ‡é…’åº—å…¥ä½/é€€æˆ¿æ—¥æœŸä¸€è‡´ï¼Œå¦å‰‡ä¸€å¾‹è¦–ä½œæ”¾æ£„è«–\nå¦‚è¨‚è³¼äº¤é€šæŽ¥é§:ä¸åŒ…æ‹¬åŒ—æŠ•ã€å®œè˜­ç¤æºªã€å®œè˜­ç¾…æ±ã€çƒä¾†ã€é—œè¥¿å…­ç¦èŽŠã€é£›ç‰›ç‰§å ´ã€é™½æ˜Žå±±åœ°å€ \n', 'é•·æ¦®èˆªç©ºå°åŒ—ã€å·²é ç•™æ©Ÿä½ã€‘ 4å¤©', '20130426174301174.png', 0),
(440, 1, 100005304788226, '2013-05-07 20:07:36', 'rice', 'rice9', 'http://farm9.staticflickr.com/8538/8698216302_2ec4033f2c_m.jpg', 1),
(441, 0, 1075517295, '2013-05-10 14:27:49', '', 'Love Hong Kong', 'http://farm9.staticflickr.com/8257/8692243502_64884f1f58_m.jpg', 1),
(451, 4, 1075517295, '2013-05-12 19:05:56', '', 'This place looks cool.', 'http://farm9.staticflickr.com/8262/8666657283_ec2c7738f6_m.jpg', 1),
(495, 4, 19, '2013-05-14 02:18:22', 'asdfasdfadfasdf', 'asdf', 'others/dog.jpg', 0),
(578, 1, 19, '2013-05-14 19:37:03', ' duck \n', 'Duck', 'others/IMG-20130510-WA0002.jpg', 0),
(582, 2, 19, '2013-05-14 21:09:50', 'å¯é¸è³¼ å»¶é•·ä¸€å¹´ä¿ä¿®Â¥39.57ï¼›é€²æ°´æ‘”å£žä¿ä¿®Â¥71.96 æ­£å“ä¿ƒé”€ Â¥1699.00 <br><br><a href="http://item.taobao.com/item.htm?spm=a230r.1.10.27.Lms85c&id=22225444913">Click here for more info.</a>', 'æ·˜å® Asus/åŽç¡• Eee Pad MeMo171ç”µè¯å¹³æ¿ç”µè„‘GPSå¯¼èˆªåŒæ ¸1.2é™æ—¶åŒ…é‚®', 'others/Clipboard04asus.gif', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
